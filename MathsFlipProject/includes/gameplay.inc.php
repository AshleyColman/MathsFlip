<?php

// Connect to database
include 'dbh.inc.php';

// Store the URL
$url = $_SERVER['REQUEST_URI'];
// List of possible categories
$categories=array("number", "algebra", "ratio", "geometry", "probability");
// The category selected found from the URL
$category_selected = "";
    
    // Loop, search the URL and see which category has been selected the assign as the category selected
    foreach ($categories as $value)
    {
        // Search the URL
        if (strpos($url, $value) !== false)
        {
            $category_selected = $value;
        }
    }

// Return the category selected 
return $category_selected;

?>