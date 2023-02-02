	<?php
	$title="Jo's Jobs - sales";
	require 'template/layout.html.php';
	require "../database.php";
	$stmt = $pdo->prepare('SELECT * FROM job WHERE categoryId = 4 AND closingDate > :date');

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

require 'include/footer.php';

