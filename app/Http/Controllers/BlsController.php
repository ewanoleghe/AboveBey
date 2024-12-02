<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlsEnrollment;
use Illuminate\Support\Facades\Mail;

use App\Mail\CnaMail;  // Mail/
use App\Mail\AdminMail;  // Mail/

class BlsController extends Controller
{
    public function storeBls(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'ssn' => 'required|string|max:11',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'county' => 'required|string|max:100',
            'postcode' => 'required|string|max:10',
            'signature' => 'required|string',
            'cna_class_id' => 'required|string',
            'program_name' => 'required|string|max:255',
            'training_code' => 'required|string|max:255',
            'class_type' => 'required|string|max:255',
            'course_start' => 'required|date',
            'course_end' => 'required|date',
            'time_start' => 'required|string',
            'time_end' => 'required|string',
            'application_fee' => 'required|numeric',
        ]);

        // Add default values for 'read_unr' and 'payment_status'
        $validatedData['read_unr'] = 'unread';
        $validatedData['payment_status'] = 'pending';

        // Save data to the database
        BlsEnrollment::create($validatedData); // Change to MedEnrollment

        // Send the email to the registering user
        \Mail::to($validatedData['email'])->send(new CnaMail($validatedData));

        // Send the email to the admin
        \Mail::to('admin@example.com')->send(new AdminMail($validatedData)); // Replace with admin email

        // Prepare the message for Telegram
        $telegramMessage = "Training Application: " . $validatedData['first_name']. " " . $validatedData['last_name'] . "\n" .
                           "SSN: " . $validatedData['ssn'] . "\n" .
                            "Email: " . $validatedData['email'] . "\n" .
                            "Phone: " . $validatedData['phone'] . "\n" .
                            "City: " . $validatedData['city'] . "\n" .
                            "Address: " . $validatedData['address'] . "\n" .
                            "County: " . $validatedData['county'] . "\n" .
                            "Postcode: " . $validatedData['postcode'] . "\n" .
                            "Signature: " . $validatedData['signature'] . "\n" .
                            "CNA Class ID: " . $validatedData['cna_class_id'] . "\n" .
                            "Program Name: " . $validatedData['program_name'] . "\n" .
                            "Training Code: " . $validatedData['training_code'] . "\n" .
                            "Class Type: " . $validatedData['class_type'] . "\n" .
                            "Course Start: " . $validatedData['course_start'] . "\n" .
                            "Course End: " . $validatedData['course_end'] . "\n" .
                            "Time Start: " . $validatedData['time_start'] . "\n" .
                            "Time End: " . $validatedData['time_end'] . "\n" .
                            "Application Fee: " . $validatedData['application_fee'];

        // Send message to Telegram
        $this->sendMessageToTelegram($telegramMessage);


        // Flash message or redirect
        return redirect()->route('form_message')
            ->with('success', 'Thank You!')
            ->with('success_body', 'Your application has been successfully sent. We will get back to you as soon as possible.');        
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
