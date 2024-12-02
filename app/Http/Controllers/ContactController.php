<?php

namespace App\Http\Controllers;
use App\Mail\ContactMail;  // Mail/
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia; // Import the Inertia facade
use Illuminate\Support\Facades\Http;  // To make the reCAPTCHA validation request

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'max:12'],
            'content' => ['required', 'max:1055'],
            'agree' => ['required', 'accepted'],
            'recaptcha' => ['required'],  // Add reCAPTCHA validation
        ]);

        // Verify the reCAPTCHA response
        $recaptchaSecret = env('RECAPTCHA_SECRET_KEY');  // Store your secret key in .env
        $recaptchaResponse = $request->input('recaptcha');

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $recaptchaSecret,
            'response' => $recaptchaResponse,
        ]);

        $recaptchaData = $response->json();

        // If the reCAPTCHA is not valid, return an error
        if (!$recaptchaData['success']) {
            return redirect()->route('contact')
                ->withErrors(['recaptcha' => 'reCAPTCHA verification failed. Please try again.']);
        }

        // Prepare the data for the email
        $emailData = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'content' => $validatedData['content'],
            
            'from' => ['Razor Inc'],
            'replyTo' => ['Razor@rhi.com'],
            'bcc' => ['ee2@aol.com'],
        ];
    
        // Send the email
        Mail::to('recipient@example.com')->send(new ContactMail($emailData));

        // Prepare the message for Telegram
        $telegramMessage = "New message from: " . $validatedData['name'] . "\n" .
                           "Email: " . $validatedData['email'] . "\n" .
                           "Phone: " . $validatedData['phone'] . "\n" .
                           "Message: " . $validatedData['content'];

        // Send message to Telegram
        $this->sendMessageToTelegram($telegramMessage);

        // Redirect to contact page with success messages
        return redirect()->route('contact')
            ->with('success', 'Thank You!')
            ->with('success_body', 'Your message has been successfully sent. We appreciate you reaching out and will get back to you as soon as possible.');
    }

    protected function sendMessageToTelegram($message)
    {
        $botToken = env('TELEGRAM_BOT_TOKEN'); // Get bot token from .env
        $chatId = env('TELEGRAM_CHAT_ID'); // Get chat ID from .env
        $url = str_replace('{TELEGRAM_BOT_TOKEN}', $botToken, env('TELEGRAM_API_URL')); // Construct URL

        $data = [
            'chat_id' => $chatId,
            'text' => $message,
        ];

        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ],
        ];
        
        $context  = stream_context_create($options);
        file_get_contents($url, false, $context);
    }
}

