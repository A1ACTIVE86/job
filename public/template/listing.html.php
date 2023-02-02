<?php
echo '<h1>Jobs</h1>';

echo '<form action="" method="get">';
echo '<label for="location">Filter:</label>';
echo '<select name="location" id="location">';
echo '<option value="Northampton">Northampton</option>';
echo '<option value="Milton Keynes">Milton Keynes</option>';
echo '</select>';
echo '<input type="submit" value="Filter">';
echo '</form>';

foreach ($jobs as $job) {
    echo '<li>';
    echo '<div class="details">';
    echo '<h2>' . $job['title'] . '</h2>';
    echo '<h3>' . $job['salary'] . '</h3>';
    echo '<p>' . nl2br($job['description']) . '</p>';
    echo '<p> Location: '. $job['location'] . '</p>';
    echo '<a class="more" href="/apply.php?id=' . $job['id'] . '">Apply for this job</a>';
    echo '</div>';
    echo '</li>';
}