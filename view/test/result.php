<div class="jumbotron">
    <h1 class="display-4">Твоя оценка: <?=$result['mark']?> (<?=plural_form($points, ['балл','балла','баллов'])?> из <?=$totalPoints?>)</h1>
    <p class="lead"><?=$result['title']?></p>
    <hr class="my-4">
    <p>Количество твоих попыток: <?=$attempts?></p>
    <a class="btn btn-primary btn-lg" href="" role="button">Пройти тест ещё раз</a>
</div>