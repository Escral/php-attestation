<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	<div class="container">
		<a class="navbar-brand" href="#">Индивидуальная работа</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse ml-4" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			<li class="nav-item<?=($page == 'index' ? ' active' : '')?>">
				<a class="nav-link" href="index.php">Тест</a>
			</li>
			<li class="nav-item<?=($page == 'results' ? ' active' : '')?>">
				<a class="nav-link" href="results.php">Результаты</a>
			</li>
		</div>
	</div>
</nav>