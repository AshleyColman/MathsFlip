<?php

// Start the session to get session variables
session_start();
// Connect to database
include 'dbh.inc.php';

// Get username from session variable
$username = $_SESSION['username']; 

// Get the user_id from the username session variable
$sql = "SELECT * FROM users WHERE user_username = '$username'"; 

// Send query and return results
$result = mysqli_query($conn, $sql); 
// Check if we have any results
$resultCheck = mysqli_num_rows($result); 
                    
// Check if we have any results
// Set the user_id to a session variable
if ($resultCheck > 0) 
{
    if ($row = mysqli_fetch_assoc($result))
        {
            // Assigns the user_id session variable to the user_id found
            $_SESSION['user_id'] = $row['user_id'];
            $user_id = $_SESSION['user_id'];
        }
}


// UPDATE SCORE

// Check if the "correct" button was pressed
if (isset($_POST['correct']))
{
    // Assign answer to be correct
    $answer = TRUE; 
}
if (isset($_POST['wrong']))
{
    // If the answer is wrong assign answer to be wrong
    $answer = FALSE; 
}


// Check score table to see if user has already got existing score for the card id (check user_id against card_id for existing match)
// If card score exists, update the record with new result
// If card score does not exist, add the new record (user_id to card_id in score table)

// Get the current card id
$card_id = $_SESSION['card_id'];

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
