<?php if (isset($component)) { $__componentOriginalaa758e6a82983efcbf593f765e026bd9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaa758e6a82983efcbf593f765e026bd9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => $__env->getContainer()->make(Illuminate\View\Factory::class)->make('mail::message'),'data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mail::message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<div>
<h3># Introduction</h3>

<p>Welcome, <?php echo e(config('app.name')); ?>!</p>

<p>A new user has registered for the Program: <?php echo e($data['program_name']); ?>.</p>

<h1>New Registration Alert</h1>
<p>A new user has registered:</p>
<ul>
    <li>Name: <?php echo e($data['first_name']); ?> <?php echo e($data['last_name']); ?></li>
    <li>Email: <?php echo e($data['email']); ?></li>
    <li>Program: <?php echo e($data['program_name']); ?></li>
    <li>Course Start: <?php echo e($data['course_start']); ?></li>
    <li>Course End: <?php echo e($data['course_end']); ?></li>
</ul>


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

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaa758e6a82983efcbf593f765e026bd9)): ?>
<?php $attributes = $__attributesOriginalaa758e6a82983efcbf593f765e026bd9; ?>
<?php unset($__attributesOriginalaa758e6a82983efcbf593f765e026bd9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaa758e6a82983efcbf593f765e026bd9)): ?>
<?php $component = $__componentOriginalaa758e6a82983efcbf593f765e026bd9; ?>
<?php unset($__componentOriginalaa758e6a82983efcbf593f765e026bd9); ?>
<?php endif; ?><?php /**PATH /var/www/html/resources/views/CnaAdmin.blade.php ENDPATH**/ ?>