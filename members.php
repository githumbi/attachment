<?php
include"includes/header.php";
include"includes/menu.php";
?>

<h4>Club Registered members</h4>

<table width="90%">
<tr><td>#</td><th>Name</th><th>Email</th><th>ID No.</th>
<th>Profile Pic</th> <th>Action</th>
	</tr>
<tr><td colspan="6"><hr></td></tr>

<?php
$query=mysqli_query($con,"SELECT * FROM members")or mysql_error("Error in query");

$i=1;

while ($row=mysqli_fetch_array($query))
{
	?>

  <tr><td><?php echo $i; ?></td>
  	<td><?php echo $row["name"]; ?></td>
  	<td><?php echo $row["email"]; ?></td>
  	<td><?php echo $row["id_no"];?></td>
  	<td><img src="<?php echo $row["photo"]; ?>" width="50px"></td>
  	<td><a href="#?id=<?php echo $row["id"]; ?>">Edit</a> |  <a onclick="javascript: return confirm('Are you sure you want to Delete Member?');" href="members.php?del=<?php echo $row["id"]; ?>">Delete</a></td>

  	<tr><td colspan="6"><hr></td></tr>

  	<?php
		$i++;

		}
  	 ?>

</table>

<?php
if(isset($_REQUEST["del"]))

 {

$id=$_REQUEST["del"];

$results=mysqli_query($con, "SELECT photo FROM members WHERE id=$id");

while ($row= mysqli_fetch_assoc($results))

{
$photo=$row["photo"];
}

mysqli_query( $con, "DELETE FROM members WHERE id=$id") or mysqli_error("Error While deleting");

unlink($photo);
echo "<script>location.href='members.php';</script>";

}
 ?>

<marquee>Welcome to Club members Registration Portal</marquee>

<?php
include "includes/footer.php";

 ?>
