<<<<<<< HEAD
{���������� ���������, ������� ������� ����������� 'Hello dear, <name>!'. 
��� ������ ������������ � ��������� name QUERY_STRING, � ������ ����� ��������� name ���, ������ ���������� 'Hello Anonymous!'. 
� ������ ������� ����� ������� ��� �������� name ����� �� ������ �����, ���� ��� ���. ����� ������������ ������� POS COPY ��� ������ �� ��������}
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
{���������� ���������, ������� ������� ����������� 'Hello dear, <name>!'. 
��� ������ ������������ � ��������� name QUERY_STRING, � ������ ����� ��������� name ���, ������ ���������� 'Hello Anonymous!'. 
� ������ ������� ����� ������� ��� �������� name ����� �� ������ �����, ���� ��� ���. ����� ������������ ������� POS COPY ��� ������ �� ��������}
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
