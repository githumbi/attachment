<?php
include"includes/header.php";
include"includes/menu.php";

unset($_SESSION["ID"]);
unset($_SESSION["NAME"]);
unset($_SESSION["DOB"]);
unset($_SESSION["IDNO"]);
unset($_SESSION["GENDER"]);
unset($_SESSION["MOBNO"]);
unset($_SESSION["EMAIL"]);
unset($_SESSION["ROLE"]);
unset($_SESSION["ADDRESS"]);
unset($_SESSION["CITY"]);
unset($_SESSION["DATE"]);
unset($_SESSION["PHOTO"]);
unset($_SESSION["USSERNAME"]);
echo "<script>alert ('you are now loged out'); location.href='index.php';</script>";

include "includes/footer.php";

 ?>
