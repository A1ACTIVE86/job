<?php
$title = "addjob";
require "../../database.php";
session_start();
require "layout/admin _layout.html.php";
require "../../function.php";
?>

<?php

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

	if (isset($_POST['submit'])) {
		addJob($pdo, $_POST['title'], $_POST['description'], $_POST['salary'], $_POST['location'], $_POST['closingDate'], $_POST['categoryId']);
	}
	
	else {

		?>
			<?php
			require '../template/adminjob.html.php';
			?>


		<?php
		}
	}

else {
	?>
	<h2>Log in</h2>

	<form action="index.php" method="post">

		<label>Password</label>
		<input type="password" name="password" />

		<input type="submit" name="submit" value="Log In" />
	</form>
<?php
}


	?>

</section>
	</main>

	<?php
// include the footer template
require '../include/footer.php';
?>

