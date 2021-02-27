������������ ������ 2 - CGI
� ������ ������������ ������ �� ��������� ����������� ���-������ �� ����� pascal.

?	��� ���������� ������� ��� ����������� ���-������, ������� ����� ������� �� ������. 

https://server2go.en.softonic.com/
����� ������ ���� ��� �������� file (��� ����������), ����� ���� ���� �����������, ����� ��� ������������� � ���� file.zip � �����������.

?	����� ��� ����� ���������, ����� �� ������� ��� InternetExplorer.
��� ����� �������� � ����� server2go ���� pms_config.ini � �������� � ��� ��������� ������

KeepRunningAfterBrowserClose=1 
ShowTrayIcon=1 
BrowserType=DEFAULT

?	����� ����������� CGI ���������, ����� 
1)	����������������� exe ����� �������� ���������� �� .cgi
2)	����������� ��� � ����� cgi-bin ������ web �������.

?	����� ����� ������� � �������� ��� ��� ������ � ����� /cgi-bin/��� �����.cgi  ������� ���������.
?	��������, http://localhost:4001/cgi-bin/hello.cgi

Server2Go ������� ����� �������, ��� � ����� ���������� �� ����� �������� ������ ������ �� ��������.

����� ����� ����������� � ����� HttpResponse �������� ������ ������.

������ CGI ���������

PROGRAM PrintHello(INPUT, OUTPUT);
BEGIN {PrintHello}
  WRITELN(�Content-Type: text/plain�);
  WRITELN;
  WRITELN(�Hello world!�);
END. {PrintHello}


1.	����������� � HttpResponse �������� ���������� ��������� REQUEST_METHOD, QUERY_STRING, CONTENT_LENGTH, HTTP_USER_AGENT, HTTP_HOST

����� QUERY_STRING �� ���� ������ ����� �������� � url ����� ��������, ��������: ?name=Ivan

CONTENT_LENGTH ����� ������ ��������� �� ����������� GET ������, ���� ��������� POST ������ �� ����������, �� �������� ��� �����.
2.	���������� ��������� SarahRevere. ��������� ������ ���������� � HttpResponse, ������� ������ ������ ������������ � QUERY_STRING � ������� ?lanterns=1 ��� ?lanterns=2. � ������ ������� ����� ���������� QUERY_STRING � ����������� �������
3.	���������� ���������, ������� ������� ����������� �Hello dear, <name>!�. ��� ������ ������������ � ��������� name QUERY_STRING, � ������ ����� ��������� name ���, ������ ���������� �Hello Anonymous!�. � ������ ������� ����� ������� ��� �������� name ����� �� ������ �����, ���� ��� ���. ����� ������������ ������� POS COPY ��� ������ �� ��������
4.	���������� ������� �� ����� pascal ��� ��������� ������ �� ���������� QUERY_STRING. ��� ������ ��������� ������ - �������� ��������� � ���������� ������ - �������� ���������. ��������� �������:

	FUNCTION GetQueryStringParameter(Key: STRING): STRING;

	��� �������� ���� ����������� ��������� ���������:
PROGRAM WorkWithQueryString(INPUT, OUTPUT);
USES
  DOS;
BEGIN {WorkWithQueryString}
  WRITELN(�First Name: �, GetQueryStringParameter(�first_name�));
  WRITELN(�Last Name: �, GetQueryStringParameter(�last_name�));
  WRITELN(�Age: �, GetQueryStringParameter(�age�))
END. {WorkWithQueryString}
