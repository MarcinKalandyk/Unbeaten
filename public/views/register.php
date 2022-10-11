<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <title>Rejestracja</title>
</head>

<body>
<div class="base-container">

    <div class="logo">
        <img src="/images/logo.svg">
    </div>

    <div class="form-login">
        <form method="POST">
            
            <div class="form-control">
                <input type="text" placeholder="name" id="name" name="name" required value="<?php echo $_POST['name'] ?>">
            </div>
            
            <div class="form-control">
                <input type="email" placeholder="email" id="email" name="email" required value="<?php echo $_POST['email'] ?>">
            </div>

            <div class="form-control">
                <input type="password" placeholder="password" id="password" name="password" required >
            </div>

            <div class="form-control">
                <input type="password" placeholder="re-enter password" id="confirmedPassword" name="confirmedPassword" required>
            </div>
            
            <div class="form-errors">
                <?php
                if (isset($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>

            <button type="submit">Regsiter</button>
        </form>
    </div>

</div>
</body>