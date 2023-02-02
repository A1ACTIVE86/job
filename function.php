<?php
class MyClass {
function loadTemplate($fileName, $templeVars)
{
    extract($templeVars);
    ob_start();
    require $fileName;
    $contents = ob_get_clean();
    return $contents;
}

function getCategories($pdo) {
  $stmt = $pdo->prepare('SELECT * FROM category');
  $stmt->execute();
  $categories = [];
  foreach ($stmt as $row) {
    $categories[] = [
      'id' => $row['id'],
      'name' => $row['name']
    ];
  }
  return $categories;
}

function getResults($pdo, $query) {
  $stmt = $pdo->prepare($query);
  $stmt->execute();
  $results = [];
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $results[] = $row;
  }
  return $results;
}



function getJobs($pdo, $categoryId, $date) {
  $stmt = $pdo->prepare('SELECT * FROM job WHERE categoryId = :categoryId AND closingDate > :date');
  $values = [
    'categoryId' => $categoryId,
    'date' => $date->format('Y-m-d')
  ];
  $stmt->execute($values);
  $jobs = [];
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $jobs[] = $row;
  }
  return $jobs;
}
  
function uploadCV() {
  if ($_FILES['cv']['error'] == 0) {
    $parts = explode('.', $_FILES['cv']['name']);
    $extension = end($parts);
    $fileName = uniqid() . '.' . $extension;
    move_uploaded_file($_FILES['cv']['tmp_name'], 'cvs/' . $fileName);
    $criteria = [
      'name' => $_POST['name'],
      'email' => $_POST['email'],
      'details' => $_POST['details'],
      'jobId' => $_POST['jobId'],
      'cv' => $fileName
    ];
    return $criteria;
  } else {
    echo 'There was an error uploading your CV';
  }
}

public function getClosingJobs($pdo) {
  $stmt = $pdo->prepare("SELECT title, closingDate FROM job ORDER BY closingDate ASC LIMIT 10");
  $stmt->execute();
  return $stmt->fetchAll();
}

function addJob($pdo, $title, $description, $salary, $location, $closingDate, $categoryId) {
  $stmt = $pdo->prepare('INSERT INTO job (title, description, salary, location, closingDate, categoryId) VALUES (:title, :description, :salary, :location, :closingDate, :categoryId)');
  $criteria = [
      'title' => $title,
      'description' => $description,
      'salary' => $salary,
      'location' => $location,
      'categoryId' => $categoryId,
      'closingDate' => $closingDate,
  ];
  $stmt->execute($criteria);
  echo 'Job Added';
}

}


