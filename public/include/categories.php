<?php
$pdo = new PDO('mysql:dbname=job;host=mysql', 'student', 'student');
$stmt = $pdo->prepare('SELECT * FROM category');
$stmt->execute();

$results=$stmt->fetchAll();

foreach($results as $job){
    echo '<li><a href="viewcategory.php?categoryid=' . $job['id'] . '">' . $job['name'] . '</a></li>';
}


?>