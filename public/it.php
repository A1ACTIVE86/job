	<?php
	require "template/layout.html.php";
	$title="Jo's Jobs - it";	
	require "../database.php";
	$stmt = $pdo->prepare('SELECT * FROM job WHERE categoryId = 1 AND closingDate > :date');

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




