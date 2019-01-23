<?php
// Start the session
session_start();
?>

<!DOCTYPE html>

<html>
<head>
<title>Results</title>
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
    
    <!-- Header -->
    <header id="results-header">Results</header>
    
    <!-- Container of results -->
    <div id="results-menu-container">
        
        <!-- Category listing -->
    <div class="category-button category-menu-button">
        <div class="category-icon"><img src="img/cube.png" alt="cube"></div>
        <div class="category-name">Number</div>
        <div class="category-percentage">15%</div>
        </div>
        <div class="category-scorebar"></div>
        
        <!-- Correct results -->
    <div class="results-button category-menu-button" id="results-correct-button">
        <div class="category-icon"><img src="img/tick.png" alt="tick"></div>
        <div class="category-name">5 correct</div>
        <div class="category-percentage">100%</div>
        </div>
        <div class="results-scorebar"></div>    
        
        <!-- Wrong results -->
    <div class="results-button category-menu-button" id="results-wrong-button">
        <div class="category-icon"><img src="img/cross.png" alt="cross"></div>
        <div class="category-name">0 wrong</div>
        <div class="category-percentage">0%</div>
        </div>
        <div class="results-scorebar"></div>  
    
    </div>
    
    <?php
        // Get the category to redirect the user to the correct category of cards if hitting the retry button
        $category = $_SESSION['category'];
    ?>
    
    <!-- Buttons -->
    <div class="results-button-container">
        <a href="gameplay.php?category=<?php echo $category ?>&card_id=1"><button class="card-button" id="results-retry-button">Retry</button></a> <!-- Links back to the category selected with the first card in the set -->
        <a href="categories.php"><button class="card-button" id="results-next-button">Next</button></a>
        <a href="achievements.php"><button class="card-button" id="results-achievement-button">View Achievements</button></a>
    </div>
    
    <!-- Extend page for additional scrolling at bottom of the page -->
    <div id="results-footerspace"></div>
<body>

    <footer>University Centre Weston</footer>
</body>
</html>