<?php

function page($page) {
	$data = function() use ($page) {
        return include CONTROLLERS . '/' . $page . '.php';
	};
	$data = $data();

	extract($data);

	// Или просто 
	// return include CONTROLLERS . '/' . $page . '.php';
	// Вместо кода выше. Если всё все переменные контроллера должны быть видны в файле представления

    include VIEW . '/pages/' . $page . '.php';
}