<?php
$title="Jo's Jobs - Home";
// connect to the database
require "../database.php";
// start the session
session_start();
// include the class file
require '../function.php';
$myClass = new MyClass();
$closing_jobs = $myClass->getClosingJobs($pdo);
// get the job categories
$categories = $myClass->getCategories($pdo);
// include the layout template
require 'template/layout.html.php';
require 'template/home.html.php';
?>




<?php
// include the footer template
require 'include/footer.php';
?>
