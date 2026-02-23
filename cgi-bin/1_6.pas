PROGRAM HelloName(INPUT, OUTPUT);
USES DOS;
VAR
  QueryString, Name: STRING;
  PosName: INTEGER;
BEGIN
  WRITELN('Content-Type: text/plain');
  WRITELN;
  QueryString := GetEnv('QUERY_STRING');
  PosName := Pos('name=', QueryString);
  IF PosName = 0
  THEN
    WRITELN('Hello Anonymous!')
  ELSE
  BEGIN
    Name := Copy(QueryString, PosName + 5, Length(QueryString) - PosName - 4);
    WRITELN('Hello dear, ', Name, '!');
  END
END.
