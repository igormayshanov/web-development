<?php
/*Разработайте программу для проверки надежности пароля Password Strength. В GET параметре password передается пароль для анализа. 
Пароль может состоять только из английских символов в верхнем и нижнем регистрах, а также из цифр.
Надежность пароля вычисляется по следующему принципу, (len это длинна пароля)
●	 Изначально считаем надежность равной 0.
●	 К надежности прибавляется (4*n), где n - количество всех символов пароля
●	 К надежности прибавляется +(n*4), где n - количество цифр в пароле
●	 К надежности прибавляется +((len-n)*2) в случае, если пароль содержит n символов в верхнем регистре
●	 К надежности прибавляется +((len-n)*2) в случае, если пароль содержит n символов в нижнем регистре
●	 Если пароль состоит только из букв вычитаем число равное количеству символов.
●	 Если пароль состоит только из цифр вычитаем число равное количеству символов.
●	 За каждый повторяющийся символ в пароле вычитается количество повторяющихся символов
Например: abcd1a, вычитаем -2 поскольку символ a встречается дважды. Программа должна выводить на экран надежность пароля в виде числа.*/

 function getGETParametr(string $password):?string
  {
    return isset($_GET[$password])?(string)$_GET[$password]:null;
  }
  $password = getGETParametr('password');
  if(preg_match("/^[a-zA-Z0-9]+$/", $password) == 1) 
  {
    $len = strlen($password);
	$digits = preg_match_all("/[0-9]/", $password);
	$smallLetters = preg_match_all("/[a-z]/", $password);
	$bigLetters = preg_match_all("/[A-Z]/", $password);
	echo "длина строки $len <br />";
	echo "кол-во цифр в строке $digits <br />";
	echo "кол-во символов в нижнем регистре $smallLetters <br />";
	echo "кол-во символов в верхнем регистре $bigLetters <br />";
	$repeatChars = 0;
	foreach (count_chars($password, 1) as $i => $val) 
	{
		if ($val > 1)
		{
			$repeatChars = $repeatChars + $val; 
		}
    }
	echo "количество повторяющихся символов $repeatChars <br />";
	$pasStrength = ((4 * $len) + (4 * $digits) + (($len - $bigLetters) * 2) 
	+ (($len - $smallLetters) * 2) - $repeatChars);
	if ($digits == 0)
	{
		$pasStrength = $pasStrength - $len;
	}
	if ($smallLetters + $bigLetters == 0)
	{
		$pasStrength = $pasStrength - $len;
	}
	echo "Сложность пароля $pasStrength <br />";
  }
