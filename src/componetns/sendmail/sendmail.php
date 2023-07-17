<?php
	$token = "token";

	//Сюда вставляем chat_id
	$chat_id = "-chatID";


	if (!$_POST['question1-title']) {
		$name = ($_POST['name']);
		$phone = ($_POST['phone']);
	}

	//Собираем в массив то, что будет передаваться боту
	$arr = array(
		'Имя:' => $name,
		'Телефон:' => $phone
	);


	//Настраиваем внешний вид сообщения в телеграме
    foreach($arr as $key => $value) {
		$txt .= "<b>".$key."</b> ".$value."%0A";
    };

	$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

	//Выводим сообщение об успешной отправке
    if ($sendToTelegram) {
		$message = 'Данные отправлены!';
    } else {
		$message = 'Ошибка';
    }

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>