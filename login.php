<?php

session_start();

if(isset($_COOKIE['email'])){
    if($_COOKIE['email'] == "percobaan@gmail.com"){
        $_SESSION['submit'] = true;
    }
}

if(isset($_SESSION['submit'])){
    header('location: home.php');
}

$message = "";

if (isset($_POST['submit'])){
    if (empty($_POST['email']) || empty ($_POST['password'])){
        $message = "<div class='alert alert-danger'>Email dan Password Harus Diisi!</div>";
    } else {
        $email = "percobaan@gmail.com";
        $password = "12345";
        $type = "admin";

        if($_POST['email'] == $email){
            if ($_POST['password'] == $password){
                if($_POST['remember']){
                    setcookie('type', $type, time()+3600);
                }
                $_SESSION['submit'] = true;
                header('location: home.php');
            } else {
                $message = "<div class='alert alert-danger'>Password Salah!</div>";
            } 
        } else {
            $message = "<div class='alert alert-danger'>Email Salah</div>";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input[type="checkbox"] {
            margin-right: 10px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <p>Email: percobaan@gmail.com</p>
        <p>Password: 12345</p>
        <br>
        <form action="login.php" method="post">
            <?=$message;?>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" >
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" >
            </div>
            <div class="form-group remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember Me</label>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Login">
            </div>
        </form>
    </div>
</body>
</html>
