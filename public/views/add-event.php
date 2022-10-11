<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/add-event.css">
    <script type="text/javascript" src="../js/add-event.js" defer></script>

    <title>PROJECTS</title>
</head>

<body>


<?php include 'views/partials/navbar.php' ?>

<div class="base-container">

    <div class="main">
        <form method="POST" ENCTYPE="multipart/form-data">
            <div class="form-event">

                <div class="row">
                    <div class="column">
                        <h1>Create new event</h1>

                        <label class="file-input">
                            <input type="file" id="file" name="file">
                        </label>

                        <div class="form-control">
                            <label for="match_type">Match type</label>
                            <input type="text" id="match_type" name="match_type" required>
                        </div>

                        <div class="form-control">
                            <label for="prize">Prize</label>
                            <input type="text" id="prize" name="prize" required>
                        </div>
                    </div>
                    <div class="column">
                        <div class="form-control">
                            <label for="game_id">Game</label>
                            <select name="game_id" id="game_id">
                                <option value="">- select game -</option>
                                <? /** @var array $games */
                                foreach ($games as $game)
                                    echo "<option value='{$game['id']}'>{$game['name']}</option>";
                                ?>


                            </select>
                        </div>


                        <div class="form-control">
                            <label for="name">Tournament name</label>
                            <input type="text" id="name" name="name" required>
                        </div>

                        <div class="form-control">
                            <label for="date">Tournament Date</label>
                            <input type="date" id="date" name="date" required>
                        </div>

                        <div class="form-control">
                            <label for="address">Tournament place</label>
                            <input type="text" id="address" name="address" required>
                        </div>

                        <div class="form-control">
                            <label for="fee">Entry fee</label>
                            <input type="text" id="fee" name="fee" required>
                        </div>
                    </div>
                </div>

                <div class="messages">
                    <?php
                
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo '<i class="fa-solid fa-circle-exclamation"></i> ' . $message . '<br>';
                        }
                    }
                    ?>
                </div>

                <button type="submit" id="submit">Save</button>
            </div>




        </form>
    </div>
    
    <?php include 'views/partials/sidebar.php' ?>
</div>


<?php include 'views/partials/footer.php' ?>
</body>