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

// Get the category selected for generating questions
$category = (include('includes/gameplay.inc.php'));

// Connect to database
include('includes/dbh.inc.php');

// The ID of the card for question and answer loading, gets it from the URL
$card_id = htmlspecialchars($_GET["card_id"]);

?>

<!DOCTYPE html>

<html>
<head>
<title>Gameplay</title>
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
    <header id="gameplay-header">Card <?php echo $card_id ?> of 100</header> <!-- Gets the card_id and displays it -->
    
    <!-- Card -->
    <div class="card-container"> <!-- The cards container -->
        <div class="card"> <!-- The card -->
            
            <div class="card-front"> <!-- The front of the card -->
                <div class="card-header">Here's your question</div> <!-- The header tab for the font of the card -->
                <p class="card-text">
            
                <?php 
                // DISPLAY QUESTION
                    $sql = "SELECT question FROM $category WHERE id = $card_id;"; // Query, gets the question from the category selected
                    $result = mysqli_query($conn, $sql); // Send query and return results
                    $resultCheck = mysqli_num_rows($result); // Check if we have any results
                    
                    // Check if we have any results
                    // Output the question
                    if ($resultCheck > 0) 
                    {
                        if ($row = mysqli_fetch_assoc($result))
                        {
                            echo $row['question'];
                        }
                    }
                ?>
                    
                </p>
            </div>
        
        <div class="card-back"> <!-- The back of the card -->
            <div class="card-header">Did you get it correct?</div> <!-- The header tab for the back of the card --> 
            <p class="card-text">
            
                <?php 
                // DISPLAY ANSWER
                    $sql = "SELECT answer FROM $category WHERE id = $card_id;"; // Query, gets the answer from the category selected
                    $result = mysqli_query($conn, $sql); // Send query and return results
                    $resultCheck = mysqli_num_rows($result); // Check if we have any results
                    
                    // Check if we have any results
                    // Output the answer
                    if ($resultCheck > 0) 
                    {
                        if ($row = mysqli_fetch_assoc($result))
                        {
                            echo $row['answer'];
                        }
                    }
                ?>
                
                <div class="card-image">
                    
                    <?php
                    // DISPLAY ANSWER IMAGE
                        $sql = "SELECT image FROM $category WHERE id = $card_id"; // Select the image for the card
                        $result = mysqli_query($conn, $sql); // Send query and return results
                        $imageresult=mysqli_fetch_array($result); // Get the image result
                        echo '<img src="data:image/jpeg;base64,'.base64_encode( $imageresult['image'] ).'"/>'; // Display image   
                    ?>
                    
                </div>

                
            </p>            
        </div>
        </div>
    </div>
    
    <?php
    // Increment card ID for next card after clicking the buttons
    $card_id++;
    ?>
    
    <!-- Buttons -->
    <div class="card-button-container">
        <a href="gameplay.php?category=number&card_id=<?php echo $card_id ?>"><button class="card-button" id="card-button-correct">Correct</button></a> <!-- Correct button, links user to next card page with card_id incremented -->
        <a href="gameplay.php?category=number&card_id=<?php echo $card_id ?>"><button class="card-button" id="card-button-wrong">Wrong</button></a> <!-- Wrong button, links user to next card with card_id incremented -->
        <button class="card-button" id="card-button-tip">Tip</button> <!-- Tip button -->
    </div>
    <footer>University Centre Weston</footer>
</body>
</html>