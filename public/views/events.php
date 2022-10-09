<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/events.css">

    <script type="text/javascript" src="../js/search.js" defer></script>
    
    <title>Events</title>
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


<template id="event-template">
    <div class="event">

        <div class="row">
            <div class="column">
                <img src="">
            </div>

            <div class="column">
                <h1>name</h1>
                <h2>game</h2>
                <h3>match_type</h3>


                <div class="row" style="align-items: center;">
                    <div class="column">
                        <span class="date">0</span>  <br>
                        <span class="address">0</span> <br>
                    </div>
                    <div class="column">
                        <button>
                            <a href="">Show</a>
                        </button>
                    </div>
                </div>

                <hr>

                <div class="row event-bottom" style="align-items: center;">
                    <div class="column">
                        Prize: <span class="prize">0</span> PLN
                    </div>
                    <div class="column">
                        entry fee: <span class="fee">0</span> PLN
                    </div>
                </div>

            </div>
        </div>

    </div>
</template>