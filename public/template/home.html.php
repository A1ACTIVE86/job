<main class="home">
    <p>Welcome to Jo's Jobs, we're a recruitment agency based in Northampton. We offer a range of different office jobs. Get in touch if you'd like to list a job with us.</a></p>

    <h2>Select the type of job you are looking for:</h2>

<ul>
  <?php
  // loop through the categories and display them as a list
  foreach ($categories as $category) {
    echo '<li><a href="viewcategory.php?categoryid=' . $category['id'] . '">' . $category['name'] . '</a></li>';
  }
  ?>
</ul>
</main>

<main>
  <h2>Jobs Closing Soon</h2>
  <ul>
    <?php
    // loop through the closing jobs and display them in a list
    foreach ($closing_jobs as $job) {
        echo '<li>' . $job['title'] . ' - Closing Date: ' . $job['closingDate'] . '</li>';
    }
    ?>
  </ul>
</main>