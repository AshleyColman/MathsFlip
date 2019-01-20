<?php
// Start the session
session_start();

// Check the user has logged in to access the page
if (isset($_SESSION['username'])){
    // Load the page
}
else
{
    // Redirect to the login page as not logged in
    header('Location: login.php');
}
?>

<!DOCTYPE html>

<html>
<head>
<title>Achievements</title>
<meta charset="utf-8">
<meta name="application-name" content="MathsFlip">
<meta name="author" content="Ashley Colman">
<meta name="description" content="Index page for MathsFlip">
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
            <img id="img-card" src="img/card.png" alt="card">
        </div>
        <h1 id="index-heading">MathsFlip</h1>
        <h2 id="index-subheading">Achievements</h2>
    </header>

    
    <footer>University Centre Weston</footer>
</body>
</html>