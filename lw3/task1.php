<?php
//1) Разработайте приложение Remove Extra Blanks на языке PHP. В запросе GET передается параметр text. 
//Скрипт выводит в стандартный поток вывода этот же текст без пробелов в начале и в конце, между словами один пробел.

function getGETParametr(string $text):?string
{
	return isset($_GET[$text])?(string)$_GET[$text]:null;
}
$text = getGETParametr('text');
echo $text;