<?php
$title="Jo's Jobs - apply";
require "../database.php";
session_start();
require 'template/layout.html.php';
require '../function.php';
?>
<?php

		if (isset($_POST['submit'])) {

    $criteria = uploadCV();
    if($criteria){
      $stmt = $pdo->prepare('INSERT INTO applicants (name, email, details, jobId, cv)
							 VALUES (:name, :email, :details, :jobId, :cv)');

      $stmt->execute($criteria);

      echo 'Your application is complete. We will contact you after the closing date.';
    }

		}
		else {
			if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$stmt = $pdo->prepare('SELECT * FROM job WHERE id = :id');

			$stmt->execute(['id' => $_GET['id']]);

			$job = $stmt->fetch();
			?>
			

		<?php
	}	
	require 'template/form.html.php'; 
	}
	?>

</section>
	</main>


<?php
// include the footer template
require 'include/footer.php';
?>

