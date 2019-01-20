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
<title>Categories</title>
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
        <h2 id="index-subheading">Categories</h2>
    </header>

    <div id="content">
        
    <div id="overall-scorebar">
        <p>Total Progress</p>    
    </div>
        
    <div id="category-menu-container">
            
        <!-- List of categories -->
        <a href="gameplay.php?category=number&card_id=1"><div class="category-button category-menu-button">
        <div class="category-icon"><img src="img/cube.png" alt="cube"></div>
        <div class="category-name">Number</div>
        <div class="category-percentage">15%</div>
        </div></a>
        <div class="category-scorebar"></div>
        
        <a href="#"><button class="category-button category-menu-button">
        <div class="category-icon"><img src="img/algebra.png" alt="algebra equation"></div>
        <div class="category-name">Algebra</div>
        <div class="category-percentage">20%</div>
        </button></a>
        <div class="category-scorebar"></div>
        
        <a href="#"><button class="category-button category-menu-button">
        <div class="category-icon"><img src="img/ratio.png" alt="ratio"></div>
        <div class="category-name">Ratio</div>
        <div class="category-percentage">25%</div>    
        </button></a>
        <div class="category-scorebar"></div>
        
        <a href="#"><button class="category-button category-menu-button">
        <div class="category-icon"><img src="img/geometry.png" alt="geometry"></div>
        <div class="category-name">Geometry</div>
        <div class="category-percentage">15%</div>
        </button></a>
        <div class="category-scorebar"></div>
        
        <a href="#"><button class="category-button category-menu-button">
        <div class="category-icon"><img src="img/probability.png" alt="dice"></div>
        <div class="category-name">Probability</div>
        <div class="category-percentage">15%</div>    
        </button></a>
        <div class="category-scorebar"></div>
    </div>
    </div>
    
    <footer>University Centre Weston</footer>
</body>
</html>