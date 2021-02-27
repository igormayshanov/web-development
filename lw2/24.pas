PROGRAM WorkWithQueryString(INPUT, OUTPUT);
USES GPC;

FUNCTION GetQueryStringParameter(Key: STRING): STRING;
VAR
  QueryString: STRING;
   
BEGIN
  QueryString := GetEnv('QUERY_STRING');
  
  GetQueryStringParameter := COPY(QueryString, POS(Key, QueryString) + Length(Key) + 1, POS('&', QueryString) - Length(Key) + 2)
END;
  
BEGIN {WorkWithQueryString}
  WRITELN('Content-type: text/plain');
  WRITELN;
  WRITELN('First Name: ', GetQueryStringParameter('first_name'));
  WRITELN('Last Name: ', GetQueryStringParameter('last_name'));
  WRITELN('Age: ', GetQueryStringParameter('age'))
END. {WorkWithQueryString}

