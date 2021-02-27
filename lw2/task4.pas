<<<<<<< HEAD
PROGRAM WorkWithQueryString(INPUT, OUTPUT);
USES GPC;

FUNCTION GetQueryStringParameter(Key: STRING): STRING;
VAR
  QS: STRING;
  PosKey, PosAmp: INTEGER; 
BEGIN
  QS := GetEnv('QUERY_STRING');
  PosKey := POS(Key, QS);
  PosAmp := POS('&', QS);
  IF PosAmp = 0
  THEN
    GetQueryStringParameter := COPY(QS, PosKey + LENGTH(Key) + 1, LENGTH(QS));
  IF PosKey < PosAmp
  THEN
    GetQueryStringParameter := COPY(QS, PosKey + Length(Key) + 1, PosAmp - LENGTH(Key) - PosKey - 1);
  IF PosKey > PosAmp
  THEN
    BEGIN    
      QS := COPY(QS, PosAmp + (PosKey - PosAmp), LENGTH(QS));
      PosKey := POS(Key, QS);
      PosAmp := POS('&', QS);
      IF PosAmp = 0
      THEN
        GetQueryStringParameter := COPY(QS, PosKey + LENGTH(Key) + 1, LENGTH(QS));
      IF PosKey < PosAmp
      THEN
        GetQueryStringParameter := COPY(QS, PosKey + Length(Key) + 1, PosAmp - LENGTH(Key) - PosKey - 1);
    END;  
END;
  
BEGIN {WorkWithQueryString}
  WRITELN('Content-type: text/plain');
  WRITELN;
  WRITELN('First Name: ', GetQueryStringParameter('first_name'));
  WRITELN('Last Name: ', GetQueryStringParameter('last_name'));
  WRITELN('Age: ', GetQueryStringParameter('age'))
END. {WorkWithQueryString}

=======
PROGRAM WorkWithQueryString(INPUT, OUTPUT);
USES GPC;

FUNCTION GetQueryStringParameter(Key: STRING): STRING;
VAR
  QS: STRING;
  PosKey, PosAmp: INTEGER; 
BEGIN
  QS := GetEnv('QUERY_STRING');
  PosKey := POS(Key, QS);
  PosAmp := POS('&', QS);
  IF PosAmp = 0
  THEN
    GetQueryStringParameter := COPY(QS, PosKey + LENGTH(Key) + 1, LENGTH(QS));
  IF PosKey < PosAmp
  THEN
    GetQueryStringParameter := COPY(QS, PosKey + Length(Key) + 1, PosAmp - LENGTH(Key) - PosKey - 1);
  IF PosKey > PosAmp
  THEN
    BEGIN    
      QS := COPY(QS, PosAmp + (PosKey - PosAmp), LENGTH(QS));
      PosKey := POS(Key, QS);
      PosAmp := POS('&', QS);
      IF PosAmp = 0
      THEN
        GetQueryStringParameter := COPY(QS, PosKey + LENGTH(Key) + 1, LENGTH(QS));
      IF PosKey < PosAmp
      THEN
        GetQueryStringParameter := COPY(QS, PosKey + Length(Key) + 1, PosAmp - LENGTH(Key) - PosKey - 1);
    END;  
END;
  
BEGIN {WorkWithQueryString}
  WRITELN('Content-type: text/plain');
  WRITELN;
  WRITELN('First Name: ', GetQueryStringParameter('first_name'));
  WRITELN('Last Name: ', GetQueryStringParameter('last_name'));
  WRITELN('Age: ', GetQueryStringParameter('age'))
END. {WorkWithQueryString}

>>>>>>> 76163f8c603274cb8cd183299e47581ba7d33420
