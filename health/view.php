<?php include("dbconnection.php");

//$view = mysqli_query($db, "SELECT * FROM cases");
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($db, $_GET['id']);
    $sql = "SELECT * FROM cases WHERE id = $id";
    $result = mysqli_query($db, $sql);
    $case = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    
    //print_r($case);
}
 // receive  input values from the form
if(isset($_POST["comment"])) {
    $comment = $_POST["remark"];
   // Validating the form
    if (empty($reply)) { echo "Field is required"; }
    //updating the column "remark" in the database table
    $query = "UPDATE cases SET remark ='$comment' WHERE id='$id'";
    mysqli_query($db, $query);
    header("Location:admin.php");
    mysqli_close($db);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>view_message</title>
    <link rel="stylesheet" href="home.css">
  </head>

  <body>
    <div class="header">
        <h1>Global International<h1>
        <img src="download.jpg" style="width:200px">
    </div>
    <div class="row">
        <div class="side">
            <div class="container">
                <?php if($case):?>
                    <h4><?php echo htmlspecialchars($case['name']);?></h4>
                    <p>Age: <?php echo htmlspecialchars($case['age']);?><p>
                    <p>Address: <?php echo htmlspecialchars($case['address']);?><p>
                    <p>Phone number: <?php echo htmlspecialchars($case['phonenumber']);?><p>
                    <div class="container">
                        <h5>Description:<h5>
                        <?php echo htmlspecialchars($case['description']);?>
                    </div>
                    <div class="container">
                        <h5>Uploads<h5>
                        <?php echo '<img src="' .$case["files"].'" style="width:"175" height="200";"></div><br>';?>
                    </div>
                <?php else: ?>
                    <h5>No such case exist<h5> 
                <?php endif; ?>
            </div>            
        
        </div> 
        <div class="main">
            <div class="header2">
                <h2>Remark:</h2>
            </div>
            <form method="post" action="">
                <div class="input-group">
                    <label for="remark"></label><br>
                    <textarea name="remark" id="remark" value="" style="width:400px; height:100px;" ></textarea>
                </div>
                <button type="submit" class="btn" name="comment">Submit</button>
            </form>
        </div> 
    </div>
    
    <br>
    <div class="footer">
      <p>Address: 11 Lewis street, Aderdeen, UK.<P>
      <p>call us on 012344443 or visit our social media page<p>
    </div>
  </body>
</html>
