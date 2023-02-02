<?php
 require "../../function.php";
require "../../database.php";
session_start();
	$title="admin- archived jobs";
	require "layout/admin _layout.html.php";
    // Check if the form has been submitted
    if (isset($_POST['submit'])) {
		// Retrieve the selected job id from the form data
		$jobId = $_POST['id'];
		// Update the job to set the status column to "active"
		$stmt = $pdo->prepare('UPDATE job SET status = "active" WHERE id = :id');
		$stmt->execute(['id' => $jobId]);
	} 
?>
<?php
require '../template/archlist.html.php';
?>
<?php
// include the footer template
require '../include/footer.php';
?>