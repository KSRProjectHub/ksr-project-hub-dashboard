<!DOCTYPE html>
<html>
<head>
    <title>ksrprojecthub.com</title>
</head>
<body>
    <h2><?php echo e($mailD['title']); ?></h2>
    <h3>Project from <strong><?php echo e($mailD['name']); ?> (<?php echo e($mailD['customer_id']); ?>)</strong></h3>

    <h2>Details</h2>
    <ul>
        <li>Customer ID - <?php echo e($mailD['customer_id']); ?></li>
        <li>Email - <?php echo e($mailD['email']); ?></li>
        <li>Project Request For - <?php echo e($mailD['request_for']); ?></li>
        <li>Institute - <?php echo e($mailD['institute']); ?></li>
        <li>Project Module - <?php echo e($mailD['module']); ?></li>
        <li>No. of Members in the group - <?php echo e($mailD['noofmembers']); ?></li>
        <li>Contact No - <?php echo e($mailD['contact_no']); ?></li>
        <li><p><?php echo e($mailD['description']); ?></p></li>
    </ul>
    
    <p>Thank you</p>
</body>
</html><?php /**PATH C:\Users\supun\Documents\ksr-project-hub-dashboard\resources\views/emails/reqProjEmailAdmin.blade.php ENDPATH**/ ?>