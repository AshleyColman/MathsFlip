<?php

if(!isset($_SESSION))
{
    // Start the session to get session variables
    session_start();
}

// Connect to database
include 'dbh.inc.php';


// Check if achievements have been unlocked for the category

// Get the category
$category = $_SESSION['category'];
// Get the user id
$user_id = $_SESSION['user_id'];
// Get the highest combo so far
$highestcombo = $_SESSION['highestcombo'];
// Get percentagecorrect
$percentagecorrect = $_SESSION['percentagecorrect'];
// Get 100percentcounter
$maxpercentcounter = $_SESSION['maxpercentcounter'];
// Get oneset value
$one_set_completed = $_SESSION['one_set_completed'];

function GetAchievementID($achievement_name_pass, $conn_pass)
{
    // Get the achievement name to check for the ID
    $achievementName = $achievement_name_pass;
    // Select the ID for the achievement with that name
    $sql = "SELECT * FROM achievements WHERE achievement_name = '$achievementName'";
    // Run the query
    $result = mysqli_query($conn_pass, $sql);
    // Check if we have results
    $resultCheck = mysqli_num_rows($result); 
    // Get the value within the result
    if ($resultCheck > 0) 
    {       
        if ($row = mysqli_fetch_assoc($result))
            {
                // Get the achievement ID
                $achievement_id = $row['achievement_id'];
            }
    }
    
    return $achievement_id;
}


function UnlockAchievement($achievement_id_pass, $user_id_pass, $conn_pass)
{
    // Check if user has already unlocked this achievement
    $sql = "SELECT * FROM unlockedachievements WHERE achievement_id_fk = '$achievement_id_pass' AND user_id_fk = '$user_id_pass'";
    // Run the query
    $result = mysqli_query($conn_pass, $sql);
    // Check if we have results
    $resultCheck = mysqli_num_rows($result); 
    // Get the value within the result
    if ($resultCheck > 0) 
    {
        // Already unlocked
    }
    else
    {
        // Insert the unlocked achievement in the unlockedachievements table
        $sql = "INSERT INTO unlockedachievements (achievement_id_fk, user_id_fk, unlocked) VALUES ('$achievement_id_pass', '$user_id_pass', TRUE);";

        mysqli_query($conn_pass, $sql);
    }
    
}

// oneset achievement
if ($one_set_completed == TRUE)
{   
    // Get achievement id
    $achievement_id = GetAchievementID("oneset", $conn);
    
    // Unlock achievement
    UnlockAchievement($achievement_id, $user_id, $conn);
}


// streak5 achievement
if ($highestcombo >= 5)
{
    // Get achievement id
    $achievement_id = GetAchievementID("streak5", $conn);
    
    // Unlock achievement
    $unlocked[1] = UnlockAchievement($achievement_id, $user_id, $conn);
}


// streak10 achievement
if ($highestcombo >= 10)
{
    // Get achievement id
    $achievement_id = GetAchievementID("streak10", $conn);
    
    // Unlock achievement
    UnlockAchievement($achievement_id, $user_id, $conn);
}

// streak30 achievement
if ($highestcombo >= 30)
{
    // Get achievement id
    $achievement_id = GetAchievementID("streak30", $conn);
    
    // Unlock achievement
    UnlockAchievement($achievement_id, $user_id, $conn);
}


// 25percent achievement
if ($percentagecorrect >= 25)
{   
    // Get achievement id
    $achievement_id = GetAchievementID("25percent", $conn);
    
    // Unlock achievement
    UnlockAchievement($achievement_id, $user_id, $conn);
}


// 50percent achievement
if ($percentagecorrect >= 50)
{
    // Get achievement id
    $achievement_id = GetAchievementID("50percent", $conn);
    
    // Unlock achievement
    UnlockAchievement($achievement_id, $user_id, $conn);
}


// 75percent achievement
if ($percentagecorrect >= 75)
{
    // Get achievement id
    $achievement_id = GetAchievementID("75percent", $conn);
    
    // Unlock achievement
    $unlocked[6] = UnlockAchievement($achievement_id, $user_id, $conn);
}


// 90percent achievement
if ($percentagecorrect >= 90)
{
    // Get achievement id
    $achievement_id = GetAchievementID("90percent", $conn);
    
    // Unlock achievement
    UnlockAchievement($achievement_id, $user_id, $conn);
}


// 100percent achievement
if ($percentagecorrect >= 100)
{
    // Get achievement id
    $achievement_id = GetAchievementID("100percent", $conn);
    
    // Unlock achievement
    UnlockAchievement($achievement_id, $user_id, $conn);
}


// 100x3 achievement
if ($maxpercentcounter >= 3)
{
    // Get achievement id
    $achievement_id = GetAchievementID("100x3", $conn);
    
    // Unlock achievement
    UnlockAchievement($achievement_id, $user_id, $conn);
}

// random achievement
if ($maxpercentcounter >= 5)
{
    // Get achievement id
    $achievement_id = GetAchievementID("random100", $conn);
    
    // Unlock achievement
    UnlockAchievement($achievement_id, $user_id, $conn);
}

// reward achievement
if ($maxpercentcounter >= 10)
{
    // Get achievement id
    $achievement_id = GetAchievementID("reward", $conn);
    
    // Unlock achievement
    UnlockAchievement($achievement_id, $user_id, $conn);
}