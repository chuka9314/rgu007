<?php 
  session_start(); 
//to check if user is logged in otherwise it redirects to log in page 
    if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: health_login.php');
    }
     // TO Log out 
    if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: health_login.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>user page</title>
        <link rel="stylesheet" href="home.css">
    </head>

    <body>
        <div class="header">
            <?php  if (isset($_SESSION['username'])) : ?>
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
            <?php endif ?>
            <h1>Global International<h1>
            <img src="download.jpg" style="width:200px">
        </div>
        <div class="navbar">
            <a class="active" href="home.php"></i> Home</a>
            <a href="econsult.php">Consult</a>
            <a href="contact.php"></i> Contact</a>
            <a href="admin.php?logout='1'">Log out</a>
        </div>

        <div class="row">
            <div class="side">
                <h3>Health Tips<h3>
                <fieldset style="background-color: powderblue;">
                    <p>Want to know how to maintain your mental health durig this pandemic?<a href="https://www.mind.org.uk/support/coronavirus">click here</a><p>
                </fieldset>
                <fieldset style="background-color: powderblue;">  
                    <p>Best health tips for diabetes<a href="https://www.diabetes.org.uk/">right here</a><p>
                </fieldset>
                <fieldset style="background-color: powderblue;">
                    <p>Best health tips for pregnancy<a href="https://www.cgbabyclub.co.uk/">right here</a><p>
                </fieldset>
                <fieldset style="background-color: powderblue;">
                    <p>Live healthy... <a href="https://www.wcrf-uk.org/prevention">Prevent and stay cancer free</a><p>
                </fieldset>
                <div class="container">
                    <p>contact us for home support and check up<p>
                    <img src="images (2).jpg" style=" width:250px">
                </div>
            </div>
            <div class="main">
                <img src="himage.jpg" style="width:600px">
                <fieldset>
                    <img src="images1.jpg" style="width:220px"><img src="images (4).jpg" style="width:220px"><img src="images (9).jpg" style="width:220px">
                </fieldset><br>
                <fieldset>
                    <h3> call for 0700010000 for emergency and Appointment booking<h3>
                    <img src="images.jpg" style="width:190px">
                    <img src="download (3).jpg" style="width:220px">
                    <img src="images (10).jpg" style="width:220px">
                </fieldset>
            </div>
        </div>
    
            
        <div class="footer">
            <p>Address: 11, Lewis street, Aderdeen, UK.<P>
            <p>call us on 012344443 or visit our social media page<p>
        </div>
    </body>
</html>    
