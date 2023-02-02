<?php
require "../../database.php";
session_start();
$title="admin- admin login";
require "layout/admin _layout.html.php";
require "../../function.php";
?>



	<?php
	if (isset($_POST['submit'])) {
		if ($_POST['password'] == 'letmein') {
			$_SESSION['loggedin'] = true;
		}
	}


	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	?>


	<section class="right">
	<h2>You are now logged in</h2>
	</section>
	<?php
	}

	else {
		?>
		<h2>Log in</h2>

		<form action="index.php" method="post" style="padding: 40px">

			<label>Enter Password</label>
			<input type="password" name="password" />

			<input type="submit" name="submit" value="Log In" />
		</form>
	<?php
	}
	?>


	</main>
	<?php
// include the footer template
require '../include/footer.php';
?>


