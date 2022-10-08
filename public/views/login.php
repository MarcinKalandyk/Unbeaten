<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <title>LOGIN</title>
</head>

<body>
<div class="base-container">

    <div class="logo">
        <img src="/images/logo.svg">
    </div>

    <div class="form-login">
        <form method="POST">
            
            <div class="form-control">
                <input type="text" placeholder="email" id="email" name="email" required value="<?php echo $_POST['email'] ?>">
            </div>

            <div class="form-control">
                <input type="password" placeholder="password" id="password" name="password" required>
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

            <button type="submit">Login</button>
        </form>
    </div>

</div>
</body>