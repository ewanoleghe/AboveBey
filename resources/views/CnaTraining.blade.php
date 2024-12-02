<x-mail::message>
<div>
<h3># Introduction</h3>

<p>Welcome, {{ $data['first_name'] }}!</p>

<p>Thanks for getting to us. We’re thrilled to have you on board. To get the most out of [Product Name], do this primary next step:.</p>

</p>For reference, here's your message information:</br>
<h1>Welcome, {{ $data['first_name'] }}!</h1>
<p>Thank you for registering for the {{ $data['program_name'] }}.</p>
<p>Your course starts on {{ $data['course_start'] }} and ends on {{ $data['course_end'] }}.</p>


<p>You've started a -trial_length- day trial. You can upgrade to a paying account or cancel any time.</br>
Trial Start Date: -trial_start_date-</br>
Trial End Date: -trial_end_date-</p>

<p>If you have any questions, feel free to email our customer success team. (We're lightning quick at replying.) We also offer live chat during business hours.</p>

<h3>Download the following forms:</h3>
<p>Please click on the links below to download the required forms:</p>

<!-- Conditional block for 'NURSE AIDE/ASSISTANT' program -->
@if ($data['program_name'] === 'NURSE AIDE/ASSISTANT')
<div>
    <ul>
      <li><a href="{{ route('download.cna', 'ENROLLMENT FORM_1.docx') }}" target="_blank">Form 1: ENROLLMENT FORM</a> - Instructions for completing the enrollment form.</li>
      <li><a href="{{ route('download.cna', 'NEW FINGERPRINTING APP_2.pdf') }}" target="_blank">Form 2: NEW FINGERPRINTING APPLICATION</a> - Instructions for filling out the new fingerprinting application.</li>
      <li><a href="{{ route('download.cna', 'FINGERPRINTING INSTRUCTION_3.pdf') }}" target="_blank">Form 3: FINGERPRINTING INSTRUCTIONS</a> - Instructions for fingerprinting.</li>
      <li><a href="{{ route('download.cna', 'TB ATTESTATION FORM_4.docx') }}" target="_blank">Form 4: TB ATTESTATION FORM</a> - Instructions for the TB attestation form.</li>
      <li><a href="{{ route('download.cna', 'PSI BULLETIN_5.pdf') }}" target="_blank">Form 5: PSI BULLETIN</a> - Instructions for the PSI Bulletin.</li>
      <li><a href="{{ route('download.cna', 'CNA NATCEP HANDOUT_6.pdf') }}" target="_blank">Form 6: CNA NATCEP HANDOUT</a> - Instructions for the CNA NATCEP handout.</li>
    </ul>
</div>
@endif

@if ($data['program_name'] === 'Home Health Aid')
<div>
    <ul>
      <li><a href="{{ route('download.hha', 'STEPS TO OBTAINING YOUR LICENSE_1.docx') }}" target="_blank">Form 1: 11 STEPS TO OBTAINING YOUR LICENSE</a> - Instructions for completing the enrollment form.</li>
      <li><a href="{{ route('download.hha', 'ABCHS VIRTUAL AND WHATSAPP INSTRUCTION_2.docx') }}" target="_blank">Form 2: ABCHS VIRTUAL AND WHATSAPP INSTRUCTION</a> - Instructions for filling out the new fingerprinting application.</li>
      <li><a href="{{ route('download.hha', 'HHHA ENROLLMENT FORM UPDATED_3.docx') }}" target="_blank">Form 3: HHHA ENROLLMENT FORM UPDATED</a> - Instructions for fingerprinting.</li>
      <li><a href="{{ route('download.hha', 'HHA LIICENSE TIMELINE ENGLISH_4.docx') }}" target="_blank">Form 4: HHA LIICENSE TIMELINE ENGLISH</a> - Instructions for the TB attestation form.</li>
      <li><a href="{{ route('download.hha', 'SIGNATURE PAGE FOR STUDENTS_5.pdf') }}" target="_blank">Form 5: SIGNATURE PAGE FOR STUDENTS</a> - Instructions for the PSI Bulletin.</li>
    </ul>
</div>
@endif

@if ($data['program_name'] === 'Medication Admin')
<div>
    <ul>
      <li><a href="{{ route('download.med', 'ABCHS CMA - ENROLLMENT FORM.pdf') }}" target="_blank">Form 1: ABCHS CMA - ENROLLMENT FORM</a> - Instructions for completing the enrollment form.</li>
    </ul>
</div>
@endif

</p>Thanks,</br>
[Sender Name] and the [Product Name] Team</p>

</p><button type="btn" class="btn btn-danger" >Button Text</button></p>

Thanks,<br>
{{ config('app.name') }}

</div>

</x-mail::message>
