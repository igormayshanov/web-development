<?php
//2) Разработайте PHP приложение Check Identifier, которое проверяет является ли переданный в GET параметр identifier 
//идентификатором по правилу SR3. Программа должна выводить yes или no, а также поясняющую информацию в том случае, если 
//переданная строка не является идентификатором.
//<идентификатор> ::= <буква>
//			    | <идентификатор><буква>
//			    | <идентификатор><цифра> "#^[a-zA-Z0-9]+$#"

  function getGETParametr(string $identifier):?string
  {
    return isset($_GET[$identifier])?(string)$_GET[$identifier]:null;
  }
  $identifier = getGETParametr('identifier');
  if (preg_match("/^\d/", $identifier)) 
  {
    echo 'No, identifier begins with a number';
  }
  else
  {
  if (preg_match("#^[a-zA-Z0-9]+$#", $identifier)) 
    {
      echo "Yes";
    }
	else
    {
      echo "No, identifier contains an invalid character";
    }  
	
  }  
  
  
  
  
  

