<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="./welcome.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<body>
    <?php
        session_start();
     ?>

    <div class="content">
        <div class="title">
            Aplikasi Pengelolaan Keuangan
        </div>
        <div class="selamatDatang">
            Selamat Datang di Aplikasi Pengelolaan Keuangan
        </div>
        <div class="button">
            <div class="buttonItem" id="login">
                Login
            </div>
            <div class="buttonItem" id="register" >
                Register
                
            </div>
        </div>
    </div>
</body>
<script src="welcome.js"></script>
</html>