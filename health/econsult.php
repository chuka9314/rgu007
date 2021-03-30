<?php
include("dbconnection.php");

$target_dir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $target_dir . $fileName;
$uploadOk = 1;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

// 
if(isset($_POST["consult"])) {
  
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $phonenumber = mysqli_real_escape_string($db, $_POST['phonenumber']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $fileName = mysqli_real_escape_string($db, $_POST['file']);

  if (empty($name)) { echo "Name is required"; }
  if (empty($address)) { echo "Address is required"; }
  if (empty($phonenumber)) { echo "Phone number is required"; }
  if (empty($description)) { echo "Field is required"; }
  if (empty($age)) { echo "please enter the age"; }

  

  
  // Check file size
  if ($_FILES["file"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

// Allow certain file formats
  if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
  && $fileType != "mp4" ) {
    echo "Sorry, only JPG, JPEG, PNG & mp4 files are allowed.";
    $uploadOk = 0;
  }

// Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, upload file
  } else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
      echo "The file has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

  $query = "INSERT INTO cases (name, phonenumber, address, age, description, files) 
  VALUES('$name', '$phonenumber', '$address', '$age', '$description', '$targetFilePath')";
  mysqli_query($db, $query);
  header("Refresh:0");
  
}


?>
<!DOCTYPE html>
<html>
  <head>
    <title>econsult</title>
    <link rel="stylesheet" href="h.css">
  </head>

  <body>
    <div class="header">
        <h1>Global International<h1>
        <img src="download.jpg" style="width:200px">
    </div>
    <div class="header2">
      <h2>econsult</h2>
    </div>
    <form method="post" action="" autocomplete="on" enctype="multipart/form-data">
      <div class="input-group">
        <label for="name">Who are you consulting for:</label>
        <input type="text" id="name" name="name" value="">
      </div>
      <div class="input-group">  
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="">
      </div>
      <div class="input-group">  
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="">
      </div>
      <div class="input-group">  
        <label for="phonenumber">Phone number:</label>
        <input type="number" id="phonenumber" name="phonenumber" value="">
      </div>
      <div class="input-group">
        <label for="message">describe your illness in the box below</label>
        <textarea name="description" id="description" value="" style="width:300px; height:100px;" ></textarea>
      </div>
    <input type="file"  id="file" name="file">
      
      <button type="submit" class="btn" name="consult">Submit</button>
    </form>
    <br>
    <div class="footer">
      <p>Address: 11 Lewis street, Aderdeen, UK.<P>
      <p>call us on 012344443 or visit our social media page<p>
    </div>
  </body>
</html>
