<?php
/*4) Разработайте PHP приложение Survey Saver, которое сохраняет анкеты пользователей в файловой системе. 
Данные передаются в строке запроса. Возможные параметры запроса: first_name, last_name, email, age. 
Все файлы необходимо сохранять в директорию data. Название файла: <email>.txt 
Некоторые параметры могут отсутствовать, параметр email обязательный. В случае если такой файл <email>.txt уже существует, 
данные в этом файле обновляются.*/

  function getGETParametr(string $parametr):?string
  {
    return isset($_GET[$parametr])?(string)$_GET[$parametr]:null;
  }
  $first_name = getGETParametr('first_name');
  $last_name = getGETParametr('last_name');
  $email = getGETParametr('email');
  $age = getGETParametr('age');
  if ($email !== null)
  {
	  $array = [
	  'first_name' => $first_name,
	  'last_name' => $last_name,
	  'email' => $email,
	  'age' => $age
	  ];
	  $filename = $email.".txt";
	  file_put_contents ( "D:\\IPS 2020\\Web dev\\web-development\\lw3\\data\\$filename", implode(PHP_EOL, $array));
  }
   else
   {
	   echo "Не введен email!";
   }	   
  