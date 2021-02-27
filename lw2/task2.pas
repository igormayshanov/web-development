PROGRAM SarahRevere(INPUT, OUTPUT);
uses GPC;

BEGIN
  WRITELN('Content-type: text/plain');
  WRITELN;
  IF (GetEnv('QUERY_STRING')) = 'lanterns=1'
  THEN
    WRITELN('The British are coming by land')
  ELSE
    IF (GetEnv('QUERY_STRING')) = 'lanterns=2'
    THEN
      WRITELN('The British are coming by sea')
    ELSE
      WRITELN('Sarah didn''t say')  
END.  
