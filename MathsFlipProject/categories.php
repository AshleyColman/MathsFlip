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

// Assign category percentages for percentage bars
include('includes/category.inc.php');

// Get number category percentage
$number_category_percentage = $_SESSION['number_category_percentage'];
$number_category_color = $_SESSION['number_category_color'];
// Get algebra category percentage
$algebra_category_percentage = $_SESSION['algebra_category_percentage'];
$algebra_category_color = $_SESSION['algebra_category_color'];
// Get ratio category percentage
$ratio_category_percentage = $_SESSION['ratio_category_percentage'];
$ratio_category_color = $_SESSION['ratio_category_color'];
// Get geometry category percentage
$geometry_category_percentage = $_SESSION['geometry_category_percentage'];
$geometry_category_color = $_SESSION['geometry_category_color'];
// Get probability category percentage
$probability_category_percentage = $_SESSION['probability_category_percentage'];
$probability_category_color = $_SESSION['probability_category_color'];
// Get total combined percentage
$total_combined_percentage = $_SESSION['total_combined_percentage'];
$total_combined_color = $_SESSION['total_combined_color'];
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
    
    <header id="gameplay-header">
    Categories
    <a href="loggedin.php"><div id="back-button"><img src="img/arrow.png" alt="arrow"></div></a>
    
    </header>

    <div id="content">
        
    <div id="overall-scorebar">
        
            <div class="total-combined-meter <?php echo $total_combined_color?>">
            <span style="width:<?php echo $total_combined_percentage ?>%"></span>
            </div>
        
    </div>
        
    <div id="category-menu-container">
            
        <!-- List of categories -->
        <a href="gameplay.php?category=number&card_id=1"><div class="category-button category-menu-button">
        <div class="category-icon"><img src="img/number.png" alt="cube"></div>
        <div class="category-name">Number</div>
        <div class="category-percentage">25%</div>
        </div></a>
        <div class="category-scorebar">
        
            <div class="meter <?php echo $number_category_color?>">
            <span style="width:<?php echo $number_category_percentage ?>%"></span>
            </div>
            
        </div>
        
        <a href="gameplay.php?category=algebra&card_id=1"><button class="category-button category-menu-button">
        <div class="category-icon"><img src="img/algebra.png" alt="algebra equation"></div>
        <div class="category-name">Algebra</div>
        <div class="category-percentage">20%</div>
        </button></a>
        <div class="category-scorebar">
            
            <div class="meter <?php echo $algebra_category_color?>">
            <span style="width:<?php echo $algebra_category_percentage ?>%"></span>
            </div>
            
        </div>
        
        <a href="gameplay.php?category=ratio&card_id=1"><button class="category-button category-menu-button">
        <div class="category-icon"><img src="img/ratio.png" alt="ratio"></div>
        <div class="category-name">Ratio</div>
        <div class="category-percentage">25%</div>    
        </button></a>
        <div class="category-scorebar">
        
            <div class="meter <?php echo $ratio_category_color?>">
            <span style="width:<?php echo $ratio_category_percentage ?>%"></span>
            </div>
            
        </div>
        
        <a href="gameplay.php?category=geometry&card_id=1"><button class="category-button category-menu-button">
        <div class="category-icon"><img src="img/geometry.png" alt="geometry"></div>
        <div class="category-name">Geometry</div>
        <div class="category-percentage">15%</div>
        </button></a>
        <div class="category-scorebar">
        
            <div class="meter <?php echo $geometry_category_color?>">
            <span style="width:<?php echo $geometry_category_percentage ?>%"></span>
            </div>
            
        </div>
        
        <a href="gameplay.php?category=probability&card_id=1"><button class="category-button category-menu-button">
        <div class="category-icon"><img src="img/probability.png" alt="dice"></div>
        <div class="category-name">Probability</div>
        <div class="category-percentage">15%</div>    
        </button></a>
        <div class="category-scorebar">
        
            <div class="meter <?php echo $probability_category_color?>">
            <span style="width:<?php echo $probability_category_percentage ?>%"></span>
            </div>
        
        </div>
    </div>
    </div>
    
    <footer>Weston College</footer>
    
</body>
</html>