<?php
include('./Core/CheckAdmin.php'); 
include('./Views/admin/includes/header.php'); 
include('./Views/admin/includes/navbar.php'); 
require_once("./Views/admin/${data['page']}.php");
include('./Views/admin/includes/scripts.php');
include('./Views/admin/includes/footer.php');
?>