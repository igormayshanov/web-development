Ћабораторна€ работа 2 - CGI
¬ данной лабораторной работе мы попробуем реализовать веб-сервер на €зыке pascal.

?	ƒл€ выполнени€ заданий вам понадобитс€ веб-сервер, который можно скачать по ссылке. 

https://server2go.en.softonic.com/
Ѕудет скачан файл под название file (без расширени€), чтобы этот файл распаковать, нужно его переименовать в файл file.zip и распаковать.

?	ƒалее его нужно настроить, чтобы он работал без InternetExplorer.
ƒл€ этого откройте в корне server2go файл pms_config.ini и измените в нем следующие строки

KeepRunningAfterBrowserClose=1 
ShowTrayIcon=1 
BrowserType=DEFAULT

?	„тобы разработать CGI программу, нужно 
1)	скомпилированному exe файлу заменить расширение на .cgi
2)	скопировать его в папку cgi-bin внутри web сервера.

?	ƒалее нужно открыть в браузере ваш веб сервер и через /cgi-bin/им€ файла.cgi  открыть программу.
?	Ќапример, http://localhost:4001/cgi-bin/hello.cgi

Server2Go устроен таким образом, что в ваших программах не нужно печатать строку ответа со статусом.

¬ажно между заголовками и телом HttpResponse печатать пустую строку.

ѕример CGI программы

PROGRAM PrintHello(INPUT, OUTPUT);
BEGIN {PrintHello}
  WRITELN(СContent-Type: text/plainТ);
  WRITELN;
  WRITELN(СHello world!Т);
END. {PrintHello}


1.	Ќапечатайте в HttpResponse значение переменных окружени€ REQUEST_METHOD, QUERY_STRING, CONTENT_LENGTH, HTTP_USER_AGENT, HTTP_HOST

„тобы QUERY_STRING не было пустым нужно добавить в url адрес значение, например: ?name=Ivan

CONTENT_LENGTH будет пустым поскольку вы отправл€ете GET запрос, пока отправить POST запрос не получитьс€, мы разберем это позже.
2.	–еализуйте программу SarahRevere. –езультат должен печататьс€ в HttpResponse, входные данные должны передаватьс€ в QUERY_STRING в формате ?lanterns=1 или ?lanterns=2. ¬ данном задании можно сравнивать QUERY_STRING с необходимой строкой
3.	–еализуйте программу, котора€ выводит приветствие СHello dear, <name>!Т. »м€ должно передаватьс€ в параметре name QUERY_STRING, в случае когда параметра name нет, должно выводитьс€ СHello Anonymous!Т. ¬ данном задании можно считать что параметр name стоит на первом месте, либо его нет. ћожно использовать функции POS COPY дл€ работы со строками
4.	–еализуйте функцию на €зыке pascal дл€ получени€ любого из параметров QUERY_STRING. ќна должна принимать строку - название параметра и возвращать строку - значение параметра. «аголовок функции:

	FUNCTION GetQueryStringParameter(Key: STRING): STRING;

	ƒл€ проверки этой используйте следующую программу:
PROGRAM WorkWithQueryString(INPUT, OUTPUT);
USES
  DOS;
BEGIN {WorkWithQueryString}
  WRITELN(СFirst Name: С, GetQueryStringParameter(Сfirst_nameТ));
  WRITELN(СLast Name: С, GetQueryStringParameter(Сlast_nameТ));
  WRITELN(СAge: С, GetQueryStringParameter(СageТ))
END. {WorkWithQueryString}
