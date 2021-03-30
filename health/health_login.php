<?php include('server.php') 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>login_page</title>
        <link rel="stylesheet" type="text/css" href="h.css">
    </head>
    <body>
		<div class="header">
			<h1>Global International<h1>
			<img src="download.jpg" style="width:200px">
		</div>
		<div class="header2">
			<h2>Log in</h2>
		</div>
		<form method="post">
			<?php  if (count($errors) > 0) : ?>
			<div class="error">
			<?php foreach ($errors as $error) : ?>
			<p><?php echo $error ?></p>
			<?php endforeach ?>
			</div>
			<?php  endif ?>

			<div class="input-group">
				<label>Username</label>
				<input type="text" name="username" >
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="password">
			</div>
			<div class="input-group">
				<button type="submit" class="btn" name="login_user">Login</button>
			</div>
			<p>
				Not yet a member? <a href="register.php">Sign up</a>
			</p>
		</form>
		<br>
		<div class="footer">
			<p>Address: 11 Lewis street, Aderdeen, UK.<P>
			<p>call us on 012344443 or visit our social media page<p>
		</div>
	</body>
</html>

           