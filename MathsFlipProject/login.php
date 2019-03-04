<?php
// Start the session
session_start();
?>

<!DOCTYPE html>

<html>
<head>
<title>Login</title>
<meta charset="utf-8">
<meta name="application-name" content="MathsFlip">
<meta name="author" content="Ashley Colman">
<meta name="description" content="Login page for MathsFlip">
<link rel="stylesheet" href="stylesheet/style.css" type="text/css">
    
<!-- Linking jQuery UI files --> 
<link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.min.css">
<script src="jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
<script src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<!-- Linking custom jQuery functions file -->
<script src="jquery-ui-1.12.1.custom/custom-jquery-functions.js"></script> 
    
</head>
<body>
    <header>
        <div id="logo-container">
            <div id="img-card">
                <img src="img/logo.png" alt="card">
            </div>
        </div>
        <h1 id="index-heading">MathsFlip</h1>
        <h2 id="index-subheading">Login</h2>
    </header>
    
    <div id="content">
    <div id="menu-container">
        <form action="includes/login.inc.php" method="POST">
            Username
            <input type="text" name="username">
            Password
            <input type="password" name="password">
            <button class="button" id="log-form-button" type="submit" name="submit">Login</button>
        </form>
    </div>
    </div>
    
    <footer>University Centre Weston</footer>
</body>
</html>