<?php

// Starts the session in the website
session_start();

// Check if submit button has been posted
if (isset($_POST['submit'])) 
{
    
    // Connect to database
    include 'dbh.inc.php';
    
    // Get username and password input field values and store in variable
    $username = mysqli_real_escape_string($conn, $_POST['username']); 
    $password = mysqli_real_escape_string($conn, $_POST['password']); 
    
    // Error handlers
    // Check if inputs are empty
    if (empty($username) || empty($password))
    {
        // Error message as empty
        header("Location: ../index.php?login=empty");
        exit();
    }
    else
    {
        // Check if username exists in the database
        $sql = "SELECT * FROM users WHERE user_username='$username'";
        $result = mysqli_query($conn, $sql);
        
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1)
        {
            // Error message as no results
            header("Location: ../index.php?login=errorusername");
            exit();
        }
        else
        {
            if ($row = mysqli_fetch_assoc($result))
            {
                // De-hashing the password
                $hashPasswordCheck = password_verify($password, $row['user_password']);
                
                if ($hashPasswordCheck == false)
                {
                    // Send user back as password did not match
                    header("Location: ../index.php?login=errorpassword");
                    exit();
                }
                else if ($hashPasswordCheck == true)
                {
                    // Log in the user here
                    // Set session variables to data from the database
                    $_SESSION['username'] = $row['user_username'];
                    $_SESSION['password'] = $row['user_password'];
                    $_SESSION['email'] = $row['user_email'];
                    header("Location: ../loggedin.php?login=success");
                    exit();
                }
            }
        }
    }
}
else
    {
        header("Location: ../index.php?login=error");
        exit();
    }