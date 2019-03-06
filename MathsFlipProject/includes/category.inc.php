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
                if ($_SESSION['number_category_percentage'] > 100)
                {
                    $_SESSION['number_category_percentage'] = 100;
                }
            }
        }
        else
        {
            // Set the category percentage to 0
            $_SESSION['number_category_percentage'] = 0;
            $_SESSION['number_category_color'] = "white";
        }



// Get algebra percentages and color

$sql = "SELECT algebra FROM highscore WHERE user_id_fk = '$user_id'";

$result = mysqli_query($conn, $sql);         

$resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0)
        {
            if ($row = mysqli_fetch_assoc($result))
            {
                // Retrieve the percentage for the number category
                $_SESSION['algebra_category_percentage'] = $row['algebra'];
                
                if ($_SESSION['algebra_category_percentage'] <= 35)
                {
                    $_SESSION['algebra_category_color'] = "red";
                }
                if ($_SESSION['algebra_category_percentage'] > 35 && $_SESSION['algebra_category_percentage'] <= 65)
                {
                    $_SESSION['algebra_category_color'] = "orange";
                }
                if ($_SESSION['algebra_category_percentage'] > 65 && $_SESSION['algebra_category_percentage'] < 100)
                {
                    $_SESSION['algebra_category_color'] = "green";
                }
                if ($_SESSION['algebra_category_percentage'] == 100)
                {
                    $_SESSION['algebra_category_color'] = "yellow";
                }
                if ($_SESSION['algebra_category_percentage'] > 100)
                {
                    $_SESSION['algebra_category_percentage'] = 100;
                    $_SESSION['algebra_category_color'] = "yellow";
                }
            }
        }
        else
        {
            // Set the category percentage to 0
            $_SESSION['algebra_category_percentage'] = 0;
            $_SESSION['algebra_category_color'] = "white";
        }

// Get ratio percentages and color

$sql = "SELECT ratio FROM highscore WHERE user_id_fk = '$user_id'";

$result = mysqli_query($conn, $sql);         

$resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0)
        {
            if ($row = mysqli_fetch_assoc($result))
            {
                // Retrieve the percentage for the number category
                $_SESSION['ratio_category_percentage'] = $row['ratio'];
                
                if ($_SESSION['ratio_category_percentage'] <= 35)
                {
                    $_SESSION['ratio_category_color'] = "red";
                }
                if ($_SESSION['ratio_category_percentage'] > 35 && $_SESSION['ratio_category_percentage'] <= 65)
                {
                    $_SESSION['ratio_category_color'] = "orange";
                }
                if ($_SESSION['ratio_category_percentage'] > 65 && $_SESSION['ratio_category_percentage'] < 100)
                {
                    $_SESSION['ratio_category_color'] = "green";
                }
                if ($_SESSION['ratio_category_percentage'] == 100)
                {
                    $_SESSION['ratio_category_color'] = "yellow";
                }
                if ($_SESSION['ratio_category_percentage'] > 100)
                {
                    $_SESSION['ratio_category_percentage'] = 100;
                    $_SESSION['ratio_category_color'] = "yellow";
                }
            }
        }
        else
        {
            // Set the category percentage to 0
            $_SESSION['ratio_category_percentage'] = 0;
            $_SESSION['ratio_category_color'] = "white";
        }

// Get geometry percentages and color

$sql = "SELECT geometry FROM highscore WHERE user_id_fk = '$user_id'";

$result = mysqli_query($conn, $sql);         

$resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0)
        {
            if ($row = mysqli_fetch_assoc($result))
            {
                // Retrieve the percentage for the number category
                $_SESSION['geometry_category_percentage'] = $row['geometry'];
                
                if ($_SESSION['geometry_category_percentage'] <= 35)
                {
                    $_SESSION['geometry_category_color'] = "red";
                }
                if ($_SESSION['geometry_category_percentage'] > 35 && $_SESSION['geometry_category_percentage'] <= 65)
                {
                    $_SESSION['geometry_category_color'] = "orange";
                }
                if ($_SESSION['geometry_category_percentage'] > 65 && $_SESSION['geometry_category_percentage'] < 100)
                {
                    $_SESSION['geometry_category_color'] = "green";
                }
                if ($_SESSION['geometry_category_percentage'] == 100)
                {
                    $_SESSION['geometry_category_color'] = "yellow";
                }
                if ($_SESSION['geometry_category_percentage'] > 100)
                {
                    $_SESSION['geometry_category_percentage'] = 100;
                    $_SESSION['geometry_category_color'] = "yellow";
                }
            }
        }
        else
        {
            // Set the category percentage to 0
            $_SESSION['geometry_category_percentage'] = 0;
            $_SESSION['geometry_category_color'] = "white";
        }


// Get probability percentages and color

$sql = "SELECT probability FROM highscore WHERE user_id_fk = '$user_id'";

$result = mysqli_query($conn, $sql);         

$resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0)
        {
            if ($row = mysqli_fetch_assoc($result))
            {
                // Retrieve the percentage for the number category
                $_SESSION['probability_category_percentage'] = $row['probability'];
                
                if ($_SESSION['probability_category_percentage'] <= 35)
                {
                    $_SESSION['probability_category_color'] = "red";
                }
                if ($_SESSION['probability_category_percentage'] > 35 && $_SESSION['probability_category_percentage'] <= 65)
                {
                    $_SESSION['probability_category_color'] = "orange";
                }
                if ($_SESSION['probability_category_percentage'] > 65 && $_SESSION['probability_category_percentage'] < 100)
                {
                    $_SESSION['probability_category_color'] = "green";
                }
                if ($_SESSION['probability_category_percentage'] == 100)
                {
                    $_SESSION['probability_category_color'] = "yellow";
                }
                if ($_SESSION['probability_category_percentage'] > 100)
                {
                    $_SESSION['probability_category_percentage'] = 100;
                    $_SESSION['probability_category_color'] = "yellow";
                }
            }
        }
        else
        {
            // Set the category percentage to 0
            $_SESSION['probability_category_percentage'] = 0;
            $_SESSION['probability_category_color'] = "white";
        }


// TOTAL COMBINED PERCENTAGE BAR
$_SESSION['total_combined_percentage'] = $_SESSION['number_category_percentage'] + $_SESSION['algebra_category_percentage'] + $_SESSION['ratio_category_percentage'] + $_SESSION['geometry_category_percentage'] + $_SESSION['probability_category_percentage'];

if ($_SESSION['total_combined_percentage'] <= 150)
{
    $_SESSION['total_combined_color'] = "red";
}
if ($_SESSION['total_combined_percentage'] > 150 && $_SESSION['total_combined_percentage'] <= 300 )
{
    $_SESSION['total_combined_color'] = "orange";
}
if ($_SESSION['total_combined_percentage'] > 300 && $_SESSION['total_combined_percentage'] < 450)
{
    $_SESSION['total_combined_color'] = "green";
}
if ($_SESSION['total_combined_percentage'] == 500)
{
    $_SESSION['total_combined_color'] = "yellow";
}
if ($_SESSION['total_combined_percentage'] > 500)
{
    $_SESSION['total_combined_percentage'] = 500;
    $_SESSION['total_combined_color'] = "yellow";
}

// Convert it to be displayed in the bar with 100% width
$_SESSION['total_combined_percentage'] = ($_SESSION['total_combined_percentage'] / 10) * 2;