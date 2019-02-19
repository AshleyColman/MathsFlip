<?php

// Start the session to get session variables
session_start();
// Connect to database
include 'dbh.inc.php';

// Get the user_id from session variable
$user_id = $_SESSION['user_id'];
// Get the current card id
$card_id = $_SESSION['card_id'];

// UPDATE SCORE

// Check if the "correct" button was pressed
if (isset($_POST['correct']))
{
    // Assign answer to be correct
    $answer = TRUE;
    // Increase number of correct cards by 1
    $_SESSION['totalcorrect'] += 1;
    // Increase 1 to the combo
    $_SESSION['currentcombo'] += 1;
    
    // Check if the current combo is the new highest combo
    if ($_SESSION['currentcombo'] > $_SESSION['highestcombo'])
        {
            $_SESSION['highestcombo'] = $_SESSION['currentcombo'];
        }
}
// Check if the "wrong" button was pressed
if (isset($_POST['wrong']))
{
    // Assign answer to be wrong
    $answer = FALSE; 
    // Increase number of wrong cards by 1
    $_SESSION['totalwrong'] += 1;
    // Reset the combo
    $_SESSION['combo'] = 0;
}


// Check score table to see if user has already got existing score for the card id (check user_id against card_id for existing match)
// If card score exists, update the record with new result
// If card score does not exist, add the new record (user_id to card_id in score table)

// See if a score exists for a user with the current card answered
$sql = "SELECT * FROM score WHERE user_id_fk = $user_id AND card_id_fk = $card_id"; 

// Send query and return results
$result = mysqli_query($conn, $sql); 
// Check if we have any results
$resultCheck = mysqli_num_rows($result); 

// Check if we have any results
if ($resultCheck > 0) 
{
    if ($row = mysqli_fetch_assoc($result))
        {

            // Update score table for the current user for the card just played
            $sql = "UPDATE score SET answer = '$answer' WHERE user_id_fk = '$user_id' AND card_id_fk = '$card_id'";
            
            // Run the query
            mysqli_query($conn, $sql);
        }
}
else
{
        // Add new record
        // Insert the user into the database
        $sql = "INSERT INTO score (user_id_fk, card_id_fk, answer) VALUES ('$user_id', '$card_id', '$answer');";
                    
        mysqli_query($conn, $sql);
}


// Get the category selected
$category = $_SESSION['category'];
// Get the total number of cards for the category
$total_num_cards = $_SESSION['total_num_cards'];

// Check if next card is to be generated, or the results screen is to be displayed

// If the current card is the last card end the game
if ($card_id == $total_num_cards)
{
    $endGame = TRUE; 
}
// If the current card is not the last card redirect to the next card in gameplay page
if ($card_id < $total_num_cards)
{
    $endGame = FALSE;
}

// End the game
if ($endGame == TRUE)
{
    // Send user to results screen
    header("Location: ../results.php");
    exit();
}
// Continue the game
if ($endGame == FALSE)
{
    // Increment card_id for next card
    $card_id++;
    
    // Send user to the next card
    header("Location: ../gameplay.php?category=$category&card_id=$card_id");
    exit();
}



