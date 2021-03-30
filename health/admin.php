<?php include("dbconnection.php");
session_start(); 
//to ensure admin log in otherwise it redirects to log in page
if (!isset($_SESSION['admin'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: health_login.php');
}// To log out
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['admin']);
    header("location: health_login.php");
}
//to delete case data
if (isset($_POST['delete'])) {
	$id_to_delete = mysqli_real_escape_string($db,$_POST['id_to_delete']);
    $sql="DELETE FROM cases WHERE id=$id_to_delete";
    mysqli_query($db, $sql);
    header("Refresh:0");
}
    

?>

<!DOCTYPE html>
<html>
<head>
<title>admin_page</title>
<link rel="stylesheet" href="home.css">
<link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="header">
        <?php if (isset($_SESSION['admin'])) : ?>
            <p>Welcome <strong><?php echo $_SESSION['admin']; ?></strong></p>
        <?php endif ?>
        <h1>Global International<h1>
        <img src="download.jpg" style="width:200px">
    </div>
    
    <div class="navbar">
        <a class="active" href="#"> Cases</a>
        <a href="http://bbc.co.uk">News</a>
        <a href="admin.php?logout='1'">Log out</a>
    </div>
    <main>
        <table>
	        <thead>
		        <tr>
                    <th>N</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>phone number</th>
                    <th>Adress</th>
                    <th>View</th>
                   
		        </tr>
	        </thead>
            <tbody>
                <?php 
                // select all cases if page is visited or refreshed
                $case = mysqli_query($db, "SELECT * FROM cases");

                $i = 1; while ($row = mysqli_fetch_array($case)) { ?>
                <tr>
                    <td><?php echo $i; ?> </td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['age'];?> </td>
                    <td><?php echo $row['phonenumber'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td>
                        <?php //foreach($row as $row):?>
                            <a class="brand-text" href="view.php?id=<?php echo $row['id']?>">View</a>
                        <?php //endforeach; ?>
                    </td>
                    <td>
                        <form method="POST">
                            <td><input type="hidden" name="id_to_delete" value="<?php echo $row['id']?>">
                            <input type="submit" name="delete" value="delete">
                        </form>
                    </td>
                </tr>
                <?php $i++; } ?>	
                
            </tbody>
        </table>
    </main>
</body>
</html>    