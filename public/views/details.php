<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/events.css">

    <title>Details #<?php echo $event['id'] ?></title>
</head>

<body>


<?php include 'views/partials/navbar.php' ?>

<div class="base-container">

    <div class="main">

        <div class="event">

            <div class="row">
                <div class="column">
                    <img src="<?php echo $event['image'] ?>">
                </div>

                <div class="column">
                    <h1><?php echo $event['name'] ?></h1>
                    <h2><?php echo $event['game'] ?></h2>
                    <h3><?php echo $event['match_type'] ?></h3>


                    <div class="row" style="align-items: center;">
                        <div class="column">
                            <?php echo $event['date'] ?> <br>
                            <?php echo $event['address'] ?> <br>
                        </div>
                        <div class="column">
                            <button>
                                <?php if ($is_signed) { ?>
                                    <a href="/withdraw/?id=<?php echo $event['id'] ?>">
                                        Withdraw
                                    </a>
                                <?php } else { ?>
                                    <a href="/join/?id=<?php echo $event['id'] ?>">
                                        Join
                                    </a>
                                <?php } ?>
                            </button>
                        </div>
                    </div>

                    <hr>

                    <div class="row event-bottom" style="align-items: center;">
                        <div class="column">
                            Prize: <?php echo $event['prize'] ?> PLN
                        </div>
                        <div class="column">
                            entry fee: <?php echo $event['fee'] ?> PLN
                        </div>
                    </div>

                </div>
            </div>

            <div class="event-users">
                <h2>Users:</h2>
                
                <?php if ($users) { ?>
                    <table style="width: 100%">
                        <thead>
                        <tr>
                            <th width="1">#</th>
                            <th width="100">Name</th>
                            <th>E-mail</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $lp => $user) { ?>
                            <tr>
                                <td><? echo $lp + 1 ?></td>
                                <td><? echo $user->getName() ?></td>
                                <td><? echo $user->getEmail() ?></td>

                            </tr>
                        <?php } ?>
                        </tbody>


                    </table>
                <?php } ?>
            </div>

        </div>

    </div>
    
    <?php include 'views/partials/sidebar.php' ?>
</div>


<?php include 'views/partials/footer.php' ?>
</body>

