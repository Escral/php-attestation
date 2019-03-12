<form method="POST" class="mt-4">
	<p class="text-center">Ответьте на все вопросы</p>

	<div class="mb-4">
		<?php foreach ($questions as $questionID => $question) { ?>
			<div class="card mb-4">
				<div class="card-body">
					<h5 class="card-title"><?=$question['title']?></h5>
					<?php if (isset($question['subtitle'])) { ?><p class="card-text"><?=$question['subtitle']?></p><?php } ?>
				</div>
				<ul class="list-group list-group-flush">
					<?php foreach ($question['answers'] as $answerID => $answer) { ?>
						<li class="list-group-item">
							<div class="form-check">
								<?php if (! is_array($question['right'])) { ?>
									<input class="form-check-input" type="radio" name="answer[<?=$questionID?>]" id="answer-<?=$questionID?>-<?=$answerID?>" value="<?=$answerID?>">
									<label class="form-check-label" for="answer-<?=$questionID?>-<?=$answerID?>">
										<?=$answer?>
									</label>
								<?php } else { ?>
									<input class="form-check-input" type="checkbox" name="answer[<?=$questionID?>][]" id="answer-<?=$questionID?>-<?=$answerID?>" value="<?=$answerID?>">
									<label class="form-check-label" for="answer-<?=$questionID?>-<?=$answerID?>">
										<?=$answer?>
									</label>
								<?php } ?>
							</div>
						</li>
					<?php } ?>
				</ul>
			</div>
		<?php } ?>
	</div>

	<button type="submit" class="btn btn-primary">Завершить IQ тест</button>
</form>

<style>
	.form-check-input, .form-check-label {
        cursor: pointer;
	}
</style>