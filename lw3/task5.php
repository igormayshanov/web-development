<?php
/*Разработайте PHP приложение Survey Info, которое выводит данные анкеты пользователя, сохраненные в задании 4. 
Если значение отсутствует, выводить вместо него пробел.
Выводить данные необходимо в виде:
First Name: <name>
Last Name: ...
Email: <email>
Age: 30 */
$lines = file("data\\igor1452@mail.ru.txt");
foreach($lines as $value)
{
    if (empty($value))
    {
        $value = ' ';
    }
}
echo "First Name: $lines[0] <br>";
echo "Last Name:  $lines[1] <br>";
echo "Email: $lines[2] <br>";
echo "Age: $lines[3] <br>";