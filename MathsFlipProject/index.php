<!DOCTYPE html>

<html>
<head>
<title>Index</title>
<meta charset="utf-8">
<meta name="application-name" content="MathsFlip">
<meta name="author" content="Ashley Colman">
<meta name="description" content="Index page for MathsFlip">
<link rel="stylesheet" href="stylesheet/style.css" type="text/css">
</head>
    
<!-- Linking jQuery UI files --> 
<link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.min.css">
<script src="jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
<script src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<!-- Linking custom jQuery functions file -->
<script src="jquery-ui-1.12.1.custom/custom-jquery-functions.js"></script>    
      
<body>
    <header>
        <div id="logo-container">
            <div id="img-card">
                <img src="img/logo.png" alt="card">
            </div>
        </div>
        <h1 id="index-heading">MathsFlip</h1>
        <h2 id="index-subheading">GCSE Maths Revision</h2>
    </header>
    
    <div id="content">
    <div id="menu-container">
        <a href="about.php"><div class="button menu-button">About</div></a>
        <a href="signup.php"><div class="button menu-button">Sign up</div></a>
        <a href="login.php"><div class="button menu-button">Login</div></a>
        <form action="includes/playasguest.inc.php" method="POST">
        <button class="button" id="log-form-button" type="submit" name="submit">Play As Guest</button>
        </form>
    </div>
    </div>
    <div id="index-footerspace"></div>
    <footer>Weston College</footer>
</body>
</html>