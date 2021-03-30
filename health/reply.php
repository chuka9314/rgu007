<?php include("dbconnection.php");
if(isset($_POST["reply"])) {
    $reply = $_POST["recommendation"];
    if (empty($reply)) { echo "Field is required"; }
    $sql = "UPDATE cases SET replies='$reply' WHERE id=$id";
    mysqli_query($db, $sql);
    header("Refresh:0");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>admin_repy</title>
        <link rel="stylesheet" href="h.css">
    </head>

    <body>
        <div class="header">
            <h1>Global International<h1>
            <img src="download.jpg" style="width:200px">
        </div>
        <div class="header2">
            <h2>Recommendation</h2>
        </div>
        <form method="post" action="">
            <div class="input-group">
                <label for="message">describe your illness in the box below</label><br>
                <textarea name="recommendation" id="recommendation" value="" style="width:400px; height:100px;" ></textarea>
             </div>
             <button type="submit" class="btn" name="reply">Submit</button>
        </form>
    </body>
</html>
