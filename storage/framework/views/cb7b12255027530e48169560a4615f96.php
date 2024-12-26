<div>
<h3># Introduction</h3>

<p>Welcome, <?php echo e($data['name']); ?>!</p>

<p>Thanks for getting to us. We’re thrilled to have you on board. To get the most out of [Product Name], do this primary next step:.</p>

</p>For reference, here's your message information:</br>
Name: -<?php echo e($data['name']); ?>-</br>
eMail Page: -<?php echo e($data['email']); ?>-</br>
Phone Page: -<?php echo e($data['phone']); ?>-</br>
Message: -<?php echo e($data['content']); ?>-</p>

<p>You've started a -trial_length- day trial. You can upgrade to a paying account or cancel any time.</br>
Trial Start Date: -trial_start_date-</br>
Trial End Date: -trial_end_date-</p>

<p>If you have any questions, feel free to email our customer success team. (We're lightning quick at replying.) We also offer live chat during business hours.</p>

</p>Thanks,</br>
[Sender Name] and the [Product Name] Team</p>

</p><button type="btn" class="btn btn-danger" >Button Text</button></p>

Thanks,<br>
<?php echo e(config('app.name')); ?>


</div>
<?php /**PATH /var/www/html/resources/views/ContactSubmit.blade.php ENDPATH**/ ?>