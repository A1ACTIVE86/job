	<?php
		$title="Jo's Jobs - Human resource";
	require 'template/layout.html.php';
	require "../database.php";
	$stmt = $pdo->prepare('SELECT * FROM job WHERE categoryId = 2 AND closingDate > :date');

	$date = new DateTime();

	$values = [
		'date' => $date->format('Y-m-d')
	];

	$stmt->execute($values);


	require 'template/listing.html.php';

	?>

</ul>

</section>
	</main>



	<?php
// include the footer template
require 'include/footer.php';
?>

