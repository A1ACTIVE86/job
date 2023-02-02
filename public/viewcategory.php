<?php
$title="Jo's Jobs - view jobs";
require 'template/layout.html.php';
require "../database.php";

if(isset($_GET['location'])) {
    $location = $_GET['location'];
    $jobStmt = $pdo->prepare("SELECT * FROM job WHERE location = :location AND status = 'active'");
    $jobStmt->execute(['location' => $location]);
    $jobs = $jobStmt->fetchAll();
} else {
    $jobStmt = $pdo->query("SELECT * FROM job WHERE status = 'active'");
    $jobs = $jobStmt->fetchAll();
}

require 'template/listing.html.php';

require 'include/footer.php';
?>