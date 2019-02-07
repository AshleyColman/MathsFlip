<?php

if (isset($_POST['submit']))
{
    include_once 'dbh.inc.php';
    
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    // Error handlers
    // Check for empty fields
    if (empty($username) || empty($password) || empty($email))
    {
        header("Location: ../signup.php?signup=empty");
        exit();
    }
    else
    {
        // Check if input characters are valid
        if (!preg_match("/^[a-zA-Z0-9 \s]+$/", $username))
        {
            header("Location: ../signup.php?signup=invalid");
            exit();
        }
        else
        {
            // Check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                header("Location: ../signup.php?signup=email");
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
                    header("Location: ../signup.php?signup=usertaken");
                    exit();
                }
                else
                {
                    // Hashing the password
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    // Insert the user into the database
                    $sql = "INSERT INTO users (user_username, user_password, user_email) VALUES ('$username', '$hashedPassword', '$email');";
                    
                    mysqli_query($conn, $sql);
                    
                    header("Location: ../login.php?signup=success");
                    exit();
                }
            }
        }
    }
    
    
}
else
{
    header("Location: ../signup.php");
    exit();
}