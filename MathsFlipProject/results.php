<?php
// Start the session
session_start();

// Get the total number of cards for calculations with percentage correct and incorrect
$total_num_cards = $_SESSION['total_num_cards'];

// Total correct cards 
$totalcorrect = $_SESSION['totalcorrect'];
// Total wrong cards
$totalwrong = $_SESSION['totalwrong'];
// Total percentage correct
$percentagecorrect = ($totalcorrect / $total_num_cards) * 100;
$_SESSION['percentagecorrect'] = $percentagecorrect;

// Increment by 1 for x300 achievement counter
if ($percentagecorrect == 100)
{
    $_SESSION['maxpercentcounter'] += 1;
}

$_SESSION['one_set_completed'] = TRUE;


// Total percentage wrong
$percentagewrong = ($totalwrong / $total_num_cards) * 100;

// The highscore of the game
$_SESSION['highscore'] = $percentagecorrect;

// Update highscores
include 'includes/highscore.inc.php';

// Get whether it is a new highscore or not to display the effect
$new_highscore = $_SESSION['new_highscore'];

// Include the achievements file to check for achievements
// Connect to database
include('includes/achievement.inc.php');
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
    
    <body>
        
        
    
        <!-- Header -->
        <header id="results-header">Results</header>
        
        <?php
            if ($new_highscore == TRUE)
            {
                echo '<div id="highscore">NEW<br>HIGHSCORE</div>';
            }
        else
        {
            
        }
        ?>
        
        
            <div id="results-wrapper">
                
                <!-- Container of results -->
                <div id="results-menu-container">

                    <!-- Category listing -->

                <div class="results-button results-menu-button" id="results-category-button">
                    <div class="results-infobar">Category</div>
                    <div class="category-icon"><img src="img/cube.png" alt="cube"></div>
                    <div class="category-name">Number</div>
                    <div class="category-percentage">15%</div>
                    </div>
                    <div class="results-scorebar"></div>

                    <!-- Correct results -->
                <div class="results-button results-menu-button" id="results-correct-button">
                    <div class="results-infobar">Correct</div>
                    <div class="category-icon"><img src="img/tick.png" alt="tick"></div>
                    <div class="category-name"><?php echo $totalcorrect ?></div>
                    <div class="category-percentage"><?php echo $percentagecorrect ?>%</div>
                    </div>
                    <div class="results-scorebar"></div>    

                    <!-- Wrong results -->
                <div class="results-button results-menu-button" id="results-wrong-button">
                    <div class="results-infobar">Wrong</div>
                    <div class="category-icon"><img src="img/cross.png" alt="cross"></div>
                    <div class="category-name"><?php echo $totalwrong ?></div>
                    <div class="category-percentage"><?php echo $percentagewrong ?>%</div>
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
                
            </div>
        
        <!-- Extend page for additional scrolling at bottom of the page -->
        <div id="results-footerspace"></div>

        <footer>University Centre Weston</footer>

</body>
</html>