<?php
require "../../database.php";
require "../../function.php";
	session_start();
	$title="admin- archive";
	require "layout/admin _layout.html.php";
    // Check if the form has been submitted
    if (isset($_POST['submit'])) {
		// Retrieve the selected job id from the form data
		$jobId = $_POST['job'];
		// Update the job to set the deleted column to 0
		$stmt = $pdo->prepare('UPDATE job SET status = 0  WHERE id = :id');
		$stmt->execute(['id' => $jobId]);
	}
?>

				<?php
					if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
				?>
					<h2>Archive Jobs</h2>

					<form action="" method="post">
						<label for="job">Select a job to archive:</label>
						<select name="job" id="job">
							<?php
						         $stmt = $pdo->prepare('SELECT * FROM job WHERE status = :status');
								 $stmt->execute(['status' => 'active']);
								 $jobs = $stmt->fetchAll();
								 foreach ($jobs as $job) {
									 // Add an option element for each active job
									 echo '<option value="' . $job['id'] . '">' . $job['title'] . '</option>';
								 }
								 ?>
							 </select>
							 <input type="submit" name="submit" value="Archive">
				<?php
					}
					else {
						// Display a message if the user is not logged in
						echo '<p>You must be logged in to access this page.</p>';
  				    }
				?>
			</section>

	


