<?php
include"includes/header.php";
$page="login";
include"includes/menu.php";

if (isset($_POST['log'])) {
  $user = $_POST['user'];
  $pwd = md5($_POST['pass']);

  $query = mysqli_query($con,"SELECT * FROM members WHERE username = '$user' and password ='$pwd' ") or mysql_error(" error in Query");
  $result = mysqli_num_rows($query);

  if ($result>0) {
    $row = mysqli_fetch_assoc($query);
    $_SESSION["ID"]= $row["id"];
    $_SESSION["NAME"]=$row["name"];
    $_SESSION["DOB"]=$row["dob"];
    $_SESSION["IDNO"]=$row["id_no"];
    $_SESSION["GENDER"]=$row["gender"];
    $_SESSION["MOBNO"]=$row["mobno"];
    $_SESSION["EMAIL"]=$row["email"];
    $_SESSION["ROLE"]=$row["role"];
    $_SESSION["ADDRESS"]=$row["address"];
    $_SESSION["CITY"]=$row["city"];
    $_SESSION["DATE"]=$row["date_entered"];
    $_SESSION["PHOTO"]=$row["photo"];
    $_SESSION["USSERNAME"]=$row["username"];
    echo "<script>alert('Login Successifull'); location.href='index.php';</script>";
  }
  else {
    echo "<script>alert('Login failed!!!');</script>";
  }
}
?>

<h4>Login page</h4>

<form class="" action="login.php" method="post">
  <table>
    <tr>
      <td>Username</td>
      <td><input type="text" name="user" value="" required>
      </td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" name="pass" value="" required>
      </td>
    </tr>
    <tr>
      <td colspan="2"></td>
      <td>
        <input type="submit" name="log" value="Login" >
      </td>
    </tr>
  </table>

</form>

<marquee>Welcome to Club members Registration Portal</marquee>

<?php
include "includes/footer.php";

 ?>
