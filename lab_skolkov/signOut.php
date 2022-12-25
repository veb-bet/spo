<?php
include_once "./header.php";

UserLogic::signOut();
header("Location: index.php");

include_once "./footer.php";
?>