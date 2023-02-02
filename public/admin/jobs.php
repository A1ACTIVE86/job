<?php
require "../../function.php";
require "../../database.php";
session_start();
$title="admin- jobs";
require "layout/admin _layout.html.php";
?>
<?php
require '../template/jobs.html.php'
?>
<?php
// include the footer template
require '../include/footer.php';
?>