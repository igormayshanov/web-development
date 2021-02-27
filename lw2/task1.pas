{Реализуйте программу SarahRevere. Результат должен печататься в HttpResponse, 
входные данные должны передаваться в QUERY_STRING в формате ?lanterns=1 или ?lanterns=2. 
В данном задании можно сравнивать QUERY_STRING с необходимой строкой }
PROGRAM GetEnvironment(INPUT, OUTPUT);
uses GPC;

BEGIN
  WRITELN('Content-type: text/plain');
  WRITELN;
  WRITELN(GetEnv('REQUEST_METHOD'));
  WRITELN(GetEnv('QUERY_STRING'));
  WRITELN(GetEnv('CONTENT_LENGTH'));
  WRITELN(GetEnv('HTTP_USER_AGENT'));
  WRITELN(GetEnv('HTTP_HOST'))
END.  
