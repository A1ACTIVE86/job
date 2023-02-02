<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $categoryFilter = isset($_POST['categoryFilter']) ? $_POST['categoryFilter'] : '';
    ?>

    <h2>Jobs</h2>

    <a class="new" href="addjob.php">Add new job</a>

 <?php
 require 'filter.html.php';
 ?>
    <?php
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Title</th>';
    echo '<th style="width: 15%">Salary</th>';
    echo '<th style="width: 5%">&nbsp;</th>';
    echo '<th style="width: 15%">&nbsp;</th>';
    echo '<th style="width: 5%">&nbsp;</th>';
    echo '<th style="width: 5%">&nbsp;</th>';
    echo '</tr>';

    $query = 'SELECT job.*, category.name as categoryName FROM job 
        INNER JOIN category ON job.categoryId = category.id WHERE job.status = :status';



    if ($categoryFilter) {
        $query .= ' AND job.categoryId = :categoryFilter';
    }
    $stmt = $pdo->prepare($query);
	if($categoryFilter){
		$stmt->execute(['status' => 'active', 'categoryFilter' => $categoryFilter]);
	} else {
		$stmt->execute(['status' => 'active']);
	}
	

    foreach ($stmt as $job) {
        $applicants = $pdo->prepare('SELECT count(*) as count FROM applicants WHERE jobId = :jobId');

        $applicants->execute(['jobId' => $job['id']]);

        $applicantCount = $applicants->fetch();

        require '../template/job_listing.html.php';
    }

    echo '</thead>';
    echo '</table>';

		}

		else {
			?>
		<?php
		require "../template/login.html.php";
		}
	?>
