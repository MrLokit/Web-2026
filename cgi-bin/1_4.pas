PROGRAM PrintRequestMethod(INPUT, OUTPUT);
USES DOS;
BEGIN
  WRITELN('Content-Type: text/plain');
  WRITELN;
  WRITELN('QUERY_STRING = ', GetEnv('QUERY_STRING'));
END.