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
                        <a href="/details/?id=<?php echo $event['id'] ?>">
                            Show
                        </a>
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

</div>