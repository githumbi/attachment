<?php
include"includes/header.php";
$page="register";
include"includes/menu.php";

if (isset($_POST["register"]))
{
$name=$_POST["nam"];
$dob=$_POST["dob"];
$idno=$_POST["idno"];
$gender=$_POST["gender"];
$mobno=$_POST["mobno"];
$role=$_POST["role"];
$email=$_POST["email"];
$address=$_POST["address"];
$uname=$_POST["user"];
$pass=md5($_POST["pass"]);
$cpass=md5($_POST["cpass"]);
$city=$_POST["city"];
$date=date("d/m/y");

$results= mysqli_query($con, "SELECT * FROM members WHERE email='$email'")

or mysqli_error("Error in query");

$email_check=mysqli_num_rows($results);

if($email_check==0)

 {
 	//password Validation
 	if ($pass==$cpass) {


//Profile photo path and uploading photo
$photo_path="profile_pic/";
$photo=$_FILES["photo"] ["name"];
$image=$photo_path.$photo;


//to database
$query=mysqli_query($con, "INSERT INTO members
                          VALUES (0,'$name','$dob', '$idno','$address','$gender','$mobno','$role','$email','$uname','$pass','$city','$image', '$date')")
                                              or die("initial host/db connection problem");

if($query) {
	move_uploaded_file($_FILES["photo"]["tmp_name"],$image);
	echo "<script>alert('Submitted Successifully');</script>";
}


}

else
	{
	echo "<script>alert('Password and Confirm password mismatch!!!');</script>";

	}

}

else

	{
echo "<script>alert('You are already a registered member!!!');</script>";
	}
}
?>

<h4>Registration page</h4>


<form name='reg' method="post" action="register.php" enctype="multipart/form-data">
	<table>
		<tr><td>Name:</td><td><input type="text" name="nam" placeholder="Enter Your Name"></td></tr>
		<tr><td>Date of Birth:</td><td><input type="Date" name="dob" placeholder="Date of Birth"></td></tr>
		<tr><td>ID No.:</td><td><input type="text" name="idno" placeholder="Enter Your ID Number" required></td></tr>
		<tr><td>Gender:</td>
			<td>
			<input type="radio" name="gender" value="male"> Male
			<input type="radio" name="gender" value="female"> Female
			</td>
		</tr>
		<tr><td>Mobile No:</td><td><input type="text" name="mobno" placeholder="Enter Your Phone Number"></td></tr>

		<tr><td>Role:</td>
			<td><select type="text" name="role" required>
			<option value="">... Select Role...	</option>
			<option value="administrator"> Administrator</option>
			<option value="member">Member</option>
			</td>
		</tr>

		<tr><td>Email:</td><td><input type="email" name="email" placeholder="Enter Your Email" required></td></tr>
		<tr><td>Address:</td><td><textarea placeholder="Enter Your Address" name="address"></textarea></td></tr>
		<tr><td>Username:</td><td><input type="text" name="user" placeholder="Enter Your Username" required></td></tr>
		<tr><td>Password:</td><td><input type="password" name="pass" placeholder="Create your password" required></td></tr>
		<tr><td>Confirm Password:</td><td><input type="password" name="cpass" placeholder="Confirm your password" required></td></tr>

		<tr><td>City:</td><td><select name="city">
			<option value="">... Select City...</option>
			<option value="Nairobi">Nairobi</option>
			<option value="Mombasa">Mombasa</option>
		</select></td></tr>

		<tr><td>Profile Photo:</td><td><input type="file" name="photo"></td></tr>
		<tr><td>Date Registered:</td><td><input type="Date" name="dateenter" required></td></tr>
		<tr><td  colspan="2"><input type="submit" name="register" value="Sign Up" class="pure-button pure-button-primary"></td></tr>




	</table>


</form>

<marquee>Welcome to Club members Registration Portal</marquee>

<?php
include "includes/footer.php";

 ?>
