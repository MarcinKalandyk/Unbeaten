<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/add-event.css">

    <title>PROJECTS</title>
</head>

<body>
<div class="base-container">

    <form method="POST">

        <div class="form-event">
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
                        <? foreach ($games as $game)
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

    </form>
</div>
</body>