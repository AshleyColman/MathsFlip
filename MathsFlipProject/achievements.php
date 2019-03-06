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
include('includes/dbh.inc.php');
?>

<!DOCTYPE html>

<html>
<head>
<title>Achievements</title>
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
            <div id="img-card">
                <img src="img/logo.png" alt="card">
            </div>
        </div>
        <h1 id="index-heading">MathsFlip</h1>
        <h2 id="index-subheading">Achievements</h2>
    </header>
    
    <div id="achievements-container">
        
        <?php
            // Get user id
            $user_id = $_SESSION['user_id'];
        
        $returned_name;
        ?>
        
    <?php
    
    function CheckAchievement($achievement_id_fk, $achievementname, $user_id, $conn)
    {
        // Check if this achievement has been unlocked for this user
        $sql = "SELECT * FROM unlockedachievements WHERE user_id_fk = $user_id AND unlocked = TRUE AND achievement_id_fk = $achievement_id_fk";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result); 
        // Get if we have a result
        if ($resultCheck > 0) 
        {
            // Achievement unlocked
            // Keep the name the same to output
            $achievementname = $achievementname;
        }
        else
        {
            // Achievementlocked
            // Change the name with lock
            $achievementname = $achievementname . "locked";
        }
        
        // Return the achievement name to echo the correct image
        return $achievementname;
    }
    ?>
        
        
        <div class="infobar">Collection</div>
        <div class="achievement"><img src="img/achievements/<?php $returned_name = CheckAchievement(2, "oneset", $user_id, $conn); echo $returned_name;?>.png"><div class="after">Complete 1 set</div></div>
        <div class="achievement"><img src="img/achievements/<?php $returned_name = CheckAchievement(3, "streak5", $user_id, $conn); echo $returned_name;?>.png"><div class="after">Streak 5 in a row</div></div>
        <div class="achievement"><img src="img/achievements/<?php $returned_name = CheckAchievement(4, "streak10", $user_id, $conn); echo $returned_name;?>.png"><div class="after">Streak 10 in a row</div></div>
        <div class="achievement"><img src="img/achievements/<?php $returned_name = CheckAchievement(5, "streak30", $user_id, $conn); echo $returned_name;?>.png"><div class="after">Streak 30 in a row</div></div>
        
        <div class="achievement"><img src="img/achievements/<?php $returned_name = CheckAchievement(6, "25percent", $user_id, $conn); echo $returned_name;?>.png"><div class="after">Achieved 25%+</div></div>
        <div class="achievement"><img src="img/achievements/<?php $returned_name = CheckAchievement(7, "50percent", $user_id, $conn); echo $returned_name;?>.png"><div class="after">Achieved 50%+</div></div>
        <div class="achievement"><img src="img/achievements/<?php $returned_name = CheckAchievement(8, "75percent", $user_id, $conn); echo $returned_name;?>.png"><div class="after">Achieved 75%+</div></div>
        <div class="achievement"><img src="img/achievements/<?php $returned_name = CheckAchievement(9, "90percent", $user_id, $conn); echo $returned_name;?>.png"><div class="after">Achieved 90%+</div></div>
        
        <div class="achievement"><img src="img/achievements/<?php $returned_name = CheckAchievement(10, "100percent", $user_id, $conn); echo $returned_name;?>.png"><div class="after">Achieved 100%</div></div>
        <div class="achievement"><img src="img/achievements/<?php $returned_name = CheckAchievement(11, "100x3", $user_id, $conn); echo $returned_name;?>.png"><div class="after">Streak 100% x3</div></div>
        <div class="achievement"><img src="img/achievements/<?php $returned_name = CheckAchievement(12, "random100", $user_id, $conn); echo $returned_name;?>.png"><div class="after">Streak 100% x5</div></div>
        <div class="achievement"><img src="img/achievements/<?php $returned_name = CheckAchievement(13, "reward", $user_id, $conn); echo $returned_name;?>.png"><div class="after">Streak 100% x10</div></div>
    </div>
    
    <div id="achievements-footerspace"></div>
    <footer>Weston College</footer>
</body>

    <!-- PHP Functions -->
    

    
</html>