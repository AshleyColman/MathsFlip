<?php 

if(!isset($_SESSION))
{
    // Start the session to get session variables
    session_start();
}

// Connect to database
include 'dbh.inc.php';

$user_id = $_SESSION['user_id'];

// Get number category highscore 
$sql = "SELECT number FROM highscore WHERE user_id_fk = '$user_id'";

$result = mysqli_query($conn, $sql);         

$resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0)
        {
            if ($row = mysqli_fetch_assoc($result))
            {
                // Retrieve the percentage for the number category
                $_SESSION['number_category_percentage'] = $row['number'];
                
                if ($_SESSION['number_category_percentage'] <= 35)
                {
                    $_SESSION['number_category_color'] = "red";
                }
                if ($_SESSION['number_category_percentage'] > 35 && $_SESSION['number_category_percentage'] <= 65)
                {
                    $_SESSION['number_category_color'] = "orange";
                }
                if ($_SESSION['number_category_percentage'] > 65 && $_SESSION['number_category_percentage'] < 100)
                {
                    $_SESSION['number_category_color'] = "green";
                }
                if ($_SESSION['number_category_percentage'] == 100)
                {
                    $_SESSION['number_category_color'] = "yellow";
                }
            }
        }
        else
        {
            // Set the category percentage to 0
            $_SESSION['number_category_percentage'] = 0;
        }



// Get other category percentages...

