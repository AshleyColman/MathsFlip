<?php

if (isset($_POST['submit']))
{
    // We need the session running in order to destroy it so we include session start
    session_start();
    // Unset all session variables in the browser
    session_unset();
    // Destroys all sessions
    session_destroy();
    // Redirect user
    header("Location: ../index.php?logout=success");
    exit();
}