<?php
// Start the session
session_start();

// Connect to database
include 'includes/dbh.inc.php';

// Check the user has logged in to access the page
if (isset($_SESSION['username'])){
    // Load the page
}
else
{
    // Redirect to the login page as not logged in
    header('Location: login.php');
}


// Get username from session variable
$username = $_SESSION['username']; 

// Assign user_id to session variable
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

?>

<!DOCTYPE html>

<html>
<head>
<title>Logged In</title>
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
        <h2 id="index-subheading">GCSE Maths Revision</h2>
    </header>

    <div id="content">
    <div id="menu-container">
        <a href="categories.php"><div class="button menu-button">Start Revising</div></a>
        <a href="achievements.php"><div class="button menu-button">Achievements</div></a>

        <form action="includes/logout.inc.php" method="POST">
        <button class="button" id="log-form-button" type="submit" name="submit">Logout</button>
        </form>
    </div>
    </div>
    
    <footer>University Centre Weston</footer>
</body>
</html>