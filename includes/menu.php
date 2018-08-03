<?php
    if (!isset($_SESSION["ID"]) && $page!="login" && $page!="register") {
    	echo "<script>location.href='login.php'</script>";
    }
 ?>
<h3>
	<a href="index.php">Home  |</a>
	<?php
	if (!isset($_SESSION["ID"]))	{
		?>
		<a href="register.php">Register</a> |
		<a href="login.php">Login</a>
		<?php
    }
		else {
			 ?>

			<a href="members.php">Members  |</a>
			<a href="profile.php">Profile  |</a>

			<a href="logout.php">Logout  |</a>
			<a href="users.php">Users  |</a>
		 <?php
		 }
		  ?>




</h3>
