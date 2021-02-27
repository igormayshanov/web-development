<<<<<<< HEAD
{Реализуйте программу, которая выводит приветствие 'Hello dear, <name>!'. 
Имя должно передаваться в параметре name QUERY_STRING, в случае когда параметра name нет, должно выводиться 'Hello Anonymous!'. 
В данном задании можно считать что параметр name стоит на первом месте, либо его нет. Можно использовать функции POS COPY для работы со строками}
PROGRAM GreetUser(INPUT, OUTPUT);
uses GPC;

BEGIN
  WRITELN('Content-type: text/plain');
  WRITELN;
  IF POS('name', GetEnv('QUERY_STRING')) > 0
  THEN
    WRITELN('Hello dear, ', COPY(GetEnv('QUERY_STRING'), POS('=', GetEnv('QUERY_STRING')) + 1, 20))
  ELSE
    WRITELN('Hello Anonymous!')  
END.  
=======
{Реализуйте программу, которая выводит приветствие 'Hello dear, <name>!'. 
Имя должно передаваться в параметре name QUERY_STRING, в случае когда параметра name нет, должно выводиться 'Hello Anonymous!'. 
В данном задании можно считать что параметр name стоит на первом месте, либо его нет. Можно использовать функции POS COPY для работы со строками}
PROGRAM GreetUser(INPUT, OUTPUT);
uses GPC;

BEGIN
  WRITELN('Content-type: text/plain');
  WRITELN;
  IF POS('name', GetEnv('QUERY_STRING')) > 0
  THEN
    WRITELN('Hello dear, ', COPY(GetEnv('QUERY_STRING'), POS('=', GetEnv('QUERY_STRING')) + 1, 20))
  ELSE
    WRITELN('Hello Anonymous!')  
END.  
>>>>>>> 76163f8c603274cb8cd183299e47581ba7d33420
