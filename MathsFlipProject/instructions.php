<?php
// Start the session
session_start();

// Connect to database
include 'includes/dbh.inc.php';

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
<title>Instructions</title>
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
            <div id="img-card">
                <img src="img/logo.png" alt="card">
            </div>
        </div>
        <h1 id="index-heading">MathsFlip</h1>
        <h2 id="index-subheading">Instructions</h2>
    </header>

    <h1 id="instructions-h1">How to play</h1>
    <div id="instructions-container">
        <p id="instructions-p">MathsFlip is a simple application as there is only one mode.
        <br><br>
        The purpose of the application is to help students revise, therefore should be played honestly to make revision as effective as possible. 
        <br><br>
        <span id="bold">Instructions on how to play:</span>
        <br><br>
        1. Select <span id="bold">Start Revising</span>
        <br><br>
        2. Select a category you would like to revise such as <span id="bold">Number</span>, <span id="bold">Algebra</span> or <span id="bold">Geometry</span>.
        <br><br>
        3. A card will be displayed presenting a question, <span id="bold">answer</span> this question in your head.
        <br><br>
        4. <span id="bold">Tap</span> the card to flip the card revealing the correct answer.
        <br><br> 
        5. <span id="bold">Answer honestly</span>, if you got it correct select <span id="bold">Correct</span>, if you got it wrong select <span id="bold">Wrong</span>.
        <br><br>
        6. Test yourself on <span id="bold">all the cards</span> in the category set.
        <br><br>
        7. Review your <span id="bold">results</span>.
        <br><br>
        8. Check out your <span id="bold">achievements</span>.
        <br><br>
        9. Test your knowledge on the <span id="bold">other categories</span>.
        <br><br>
        10. <span id="bold">Try to beat your personal best!</span>
    </div>
    
    
    <div id="instructions-footerspace"></div>
    
    <footer>Weston College</footer>
</body>
</html>