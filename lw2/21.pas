{���������� ��������� SarahRevere. ��������� ������ ���������� � HttpResponse, 
������� ������ ������ ������������ � QUERY_STRING � ������� ?lanterns=1 ��� ?lanterns=2. 
� ������ ������� ����� ���������� QUERY_STRING � ����������� ������� }
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
