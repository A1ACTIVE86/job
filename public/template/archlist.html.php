
		<?php
			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		?>
			<h2>Archived Jobs</h2>
			<table>
				<thead>
					<tr>
						<th>Title</th>
						<th style="width: 15%">Salary</th>
						<th style="width: 5%">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$stmt = $pdo->prepare('SELECT * FROM job WHERE status = :status');
						$stmt->execute(['status' => 0 ]);
						$jobs = $stmt->fetchAll();

						foreach ($jobs as $job):
					?>
							<tr>
							<td><?php echo $job['title'] ?></td>
							<td><?php echo $job['salary'] ?></td>
							<td>
								<form method="POST" action="">
									<input type="hidden" name="id" value="<?php echo $job['id'] ?>"/>
									<input type="submit" name="submit" value="Restore" />
								</form>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php
			} 
			else {
				echo '<p>You must be logged in to access this page.</p>';
			}
		?>
	</section>
</main>