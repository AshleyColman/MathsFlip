<?php

if(!isset($_SESSION))
{
    // Start the session to get session variables
    session_start();
}

// Connect to database
include 'dbh.inc.php';

// Get the current user id
$user_id = $_SESSION['user_id'];
// Get the current card id
$card_id = $_SESSION['card_id'];
// Get the category selected
$category = $_SESSION['category'];
// Get the highscore from the game
$current_game_highscore = $_SESSION['highscore'];


// See if the current user already has category highscore submitted
$sql = "SELECT $category FROM highscore WHERE user_id_fk = $user_id"; 

// Send query and return results
$result = mysqli_query($conn, $sql); 
// Check if we have any results
$resultCheck = mysqli_num_rows($result); 

// Check if we have any results
if ($resultCheck > 0) 
{
    if ($row = mysqli_fetch_assoc($result))
        {
            $all_time_highscore = $row;
        
            // Do a highscore check to see if the recent plays highscore is greater than the all time highscore
            if ($current_game_highscore > $all_time_highscore)
            {
                // Update the highscore in the database for the current user
                $sql = "UPDATE highscore SET $category = '$current_game_highscore' WHERE user_id_fk = '$user_id'";
            
                // Run the query
                mysqli_query($conn, $sql);
                
                echo "updated";
            }


            // Insert highscore into the category
            //$sql = "UPDATE $category FROM highscore WHERE user_id_fk = $user_id";
            //echo "updated";
            // Run the query
           // mysqli_query($conn, $sql);
                       
        }
        else
        {       
            // Insert the highscore into the table
            $sql = "INSERT INTO highscore (user_id_fk, $category) VALUES ('$user_id', '$highscore');";
            echo "inserted";
            mysqli_query($conn, $sql);
        }
}

