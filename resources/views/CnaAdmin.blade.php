<x-mail::message>
<div>
<h3># Introduction</h3>

<p>Welcome, {{ config('app.name') }}!</p>

<p>A new user has registered for the Program: {{ $data['program_name'] }}.</p>

<h1>New Registration Alert</h1>
<p>A new user has registered:</p>
<ul>
    <li>Name: {{ $data['first_name'] }} {{ $data['last_name'] }}</li>
    <li>Email: {{ $data['email'] }}</li>
    <li>Program: {{ $data['program_name'] }}</li>
    <li>Course Start: {{ $data['course_start'] }}</li>
    <li>Course End: {{ $data['course_end'] }}</li>
</ul>


<p>You've started a -trial_length- day trial. You can upgrade to a paying account or cancel any time.</br>
Trial Start Date: -trial_start_date-</br>
Trial End Date: -trial_end_date-</p>

<p>If you have any questions, feel free to email our customer success team. (We're lightning quick at replying.) We also offer live chat during business hours.</p>

</p>Thanks,</br>
[Sender Name] and the [Product Name] Team</p>

</p><button type="btn" class="btn btn-danger" >Button Text</button></p>

Thanks,<br>
{{ config('app.name') }}

</div>

</x-mail::message>