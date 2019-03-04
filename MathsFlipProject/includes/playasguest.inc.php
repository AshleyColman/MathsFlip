<?php

if (isset($_POST['submit']))
{
    
// Starts the session in the website
session_start();
    
    include_once 'dbh.inc.php';
    
    // Generate a random username and password for guest accounts
    $username = RandomString();
    $password = RandomString();
    $email = "Guest@Guest.com";
    
    // Error handlers
    // Check for empty fields
    if (empty($username) || empty($password) || empty($email))
    {
        header("Location: ../index.php?signup=empty");
        exit();
    }
    else
    {
        // Check if input characters are valid
        if (!preg_match("/^[a-zA-Z0-9 \s]+$/", $username))
        {
            header("Location: ../index.php?signup=invalid");
            exit();
        }
        else
        {
            // Check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                header("Location: ../index.php?signup=email");
                exit();
            }
            else
            {
                $sql = "SELECT * FROM users WHERE user_username='$username'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                
                // Check if user already exists
                if ($resultCheck > 0)
                {
                    header("Location: ../index.php?signup=usertaken");
                    exit();
                }
                else
                {
                    // Hashing the password
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    // Insert the user into the database
                    $sql = "INSERT INTO users (user_username, user_password, user_email) VALUES ('$username', '$hashedPassword', '$email');";
                    
                    mysqli_query($conn, $sql);
                    
                    
                    // LOGIN Script

                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    $_SESSION['email'] = $email;
                    header("Location: ../loggedin.php?login=success");
                    exit();
                }
            }
        }
    }
}
else
{
    header("Location: ../index.php");
    exit();
}



// FUNCTIONS

// Generate random string for username and password
function RandomString($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
