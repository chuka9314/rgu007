<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration system</title>
	<link rel="stylesheet" href="h.css">
</head>
	<body>
		<div class="header">
			<h1>Global International<h1>
			<img src="download.jpg" style="width:200px">
		</div>
		<div class="header2">
			<h2>Register</h2>
		</div>
		
		<form method="post" action="">
			<?php  if (count($errors) > 0) : ?>
			<div class="error">
			<?php foreach ($errors as $error) : ?>
			<p><?php echo $error ?></p>
			<?php endforeach ?>
			</div>
			<?php  endif ?>

			<div class="input-group">
				<label>Firstname</label>
				<input type="text" name="fname" value="<?php echo $fname; ?>">
			</div>
			<div class="input-group">
				<label>Lastname</label>
				<input type="text" name="lname" value="<?php echo $lname; ?>">
			<div class="input-group">
				<label>Username</label>
				<input type="text" name="username" value="<?php echo $username; ?>">
			</div>
			<div class="input-group">
				<label>Email</label>
				<input type="email" name="email" value="<?php echo $email; ?>">
			<div class="input-group">
				<label>Address</label>
				<input type="address" name="address" value="<?php echo $address; ?>">	
			</div>
			<div class="input-group">
				<label>Date of birth</label>
				<input type="date" name="dob" value="<?php echo $dob; ?>">
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="password_1">
			</div>
			<div class="input-group">
				<label>Confirm password</label>
				<input type="password" name="password_2">
			</div>
				<div class="input-group">
				<button type="submit" class="btn" name="reg_user">Register</button>
			</div>
			<p>
			Already a member? <a href="health_login.php">Sign in</a>
			</p>
		</form>
		<br>
	<div class="footer">
		<p>Address: 11 Lewis street, Aderdeen, UK.<P>
		<p>call us on 012344443 or visit our social media page<p>
	</div>
</body>
</html>