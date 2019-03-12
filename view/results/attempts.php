<form method="POST" class="mt-4">
	<p class="text-center">Ваши попытки</p>

	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Время</th>
				<th scope="col">Баллы</th>
				<th scope="col">Оценка</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			<?php $n = 1; foreach ($attempts as $attempt) { ?>
				<tr>
					<td scope="col"><?=($n)?></td>
					<td scope="col"><?=date('d-m-Y H:m:s', (int) $attempt['timestamp'])?></td>
					<td scope="col"><?=$attempt['points']?> из <?=totalPoints()?></td>
					<td scope="col"><?=getMark($attempt['points'])?></td>
					<td scope="col"><a href="?attempt=<?=($n)?>">Посмотреть ответы</a></td>
				</tr>
			<?php $n++; } ?>
		</tbody>
	</table>
</form>