<!DOCTYPE html>
<html>
<head>
	<?php include VIEW . '/blocks/head.php' ?>
</head>
<body>
	<?php include VIEW . '/blocks/header.php' ?>
	
	<div class="container mb-4">
		<?php 
			if (! isset($points))
				include VIEW . '/test/questions.php';
			else
				include VIEW . '/test/result.php'; 
		?>
	</div>
</body>
</html>