<?php
send_sms('+79788961864', "Имя: {$_POST['nameField']}, телефон: {$_POST['phoneField']}");

function send_sms($number, $text, $cost=0) {
    $login = 'avtobusveset';     // Логин в SMSC
    $password = 'veset556677';   // Пароль в SMSC
    $sender = 'PHPUser';    // Имя отправителя

    // Подготовим запрос
    $Prepare = "http://smsc.ru/sys/send.php?login={$login}&psw={$password}&phones={$number}&mes={$text}&sender={$sender}";
    // $Request = file_get_contents($Prepare);
    // print_r($Request);
    $Request = file_get_contents($Prepare . "&cost={$cost}&fmt=1&charset=utf-8");
    // print_r($Request);

    // Обработка ответа
    // $Response = explode(',', $Request);
    // if(isset($Response[1]) && isset($Response[0])) {
    //     // Узнать цену
    //     if($cost) {return $Response[0]; }
    //     // SMS удачно дошло
    //     if($Response[1] == '1') { return True; }
    // }
    //
    // return False;

}
// Отправляем сообщение
// $send = send_sms('+79856809661', "Привет из PHP мира!" . "\n" . "следующая строка");

// if($send == True) {
//     echo "Успех!";
// }

// Чтобы узнать сколько будет стоит отправка
// $send = send_sms(89856809661, "Привет из PHP мира!", $cost=1);
// echo $send;
 ?>
