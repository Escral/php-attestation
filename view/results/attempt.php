<form method="POST" class="mt-4">
	<p class="text-center">Попытка <b>#<?=$_GET['attempt']?></b></p>

	<div class="mb-4">
		<?php foreach ($attempt->question as $node) {
			$question = $questions[(int) $node['id']]; ?>
			<div class="card mb-4">
				<div class="card-body">
					<h5 class="card-title"><?=$question['title']?></h5>
					<?php if (isset($question['subtitle'])) { ?><p class="card-text"><?=$question['subtitle']?></p><?php } ?>
				</div>
				<ul class="list-group list-group-flush">
					<?php 
					foreach ($node->answer as $answerNode) {
						$answer = $question['answers'][(int) $answerNode]; 
					?>
						<li class="list-group-item">
					<?=$answer?> <?php if ((bool) $answerNode['right']) { ?><span class="text-success">Верно</span><?php } else {
                        ?><span class="text-danger">Неверно</span><?php } ?>
						</li>
					<?php } ?>
				</ul>
			</div>
		<?php } ?>
	</div>
</form>