<?php include('../../login/verify.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include('../includes/style-links.php'); ?>
</head>
<style>
    .h1,
    .card-title {
        color: white;
    }
</style>

<body style="background-color: #D7F1F6;">

    <?php
    if ($user['user_type'] === 'Admin' || $user['user_type'] === 'Optical') :
        include '../includes/nav2.php';
    elseif ($user['user_type'] === 'Staff') :
        include '../includes/nav3.php';
    endif;
    ?>

    <div class="px-4 pt-5 d-flex justify-content-end pe-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb pe-5">
                <li class="breadcrumb-item text-primary h5">Home</li>
                <li class="breadcrumb-item active h5" aria-current="page">Dashboard</li>
            </ol>
        </nav>
    </div>

    <?php
    if ($user['user_type'] === 'Staff') :
        include 'staff_card.php';
    elseif ($user['user_type'] === 'Dental' || 'Optical') :
        include 'dental_optic_card.php';
    endif;
    ?>

</body>

</html>
<?php include('../includes/script-links.php'); ?>