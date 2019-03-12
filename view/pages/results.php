<!DOCTYPE html>
<html>
<head>
	<?php include VIEW . '/blocks/head.php' ?>
</head>
<body>
	<?php include VIEW . '/blocks/header.php' ?>
	
	<div class="container mb-4">
		<?php 
			if (! isset($attempt))
				include VIEW . '/results/attempts.php';
			else
				include VIEW . '/results/attempt.php'; 
		?>
	</div>
</body>
</html>