<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/events.css">

    <title>PROJECTS</title>
</head>

<body>


<?php include 'views/partials/navbar.php' ?>

<div class="base-container">
    
    <div class="main">
        <?php
        /** @var array $events */
        foreach ($events as $event) {
            include 'views/partials/event.php';
        }
        ?>
    </div>
    
    <?php include 'views/partials/sidebar.php' ?>
</div>



<?php include 'views/partials/footer.php' ?>
</body>