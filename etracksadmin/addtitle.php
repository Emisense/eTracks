<html>
<head>
<title>Elastictracks Administration - New Title</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<SCRIPT  ID=clientEventHandlersJS LANGUAGE=javascript><!--     

function button1_onclick() {
   window.location = "titles.php"
}

//--></SCRIPT >

</head>

<body>
<!-- The data encoding type, enctype, MUST be specified as below -->
<form name="input" action="titlecreate.php" method="get">
    <p><strong>New Title</strong></p>
    <BR>
    Artist (Case Sensitive):<BR> 
    <INPUT id=text1 name=tartist width="80" style="WIDTH: 500px;">
    <BR><BR>
    Name:<BR> 
    <INPUT id=text2 name=tname width="80" style="WIDTH: 500px;">
    <BR><BR>
    Notes:<BR>
    <INPUT id=text3 name=tnotes width="80" style="WIDTH: 500px;">
    <BR><BR>
    <input type="submit" value="Create">&nbsp&nbsp<INPUT id=button1 name=button1 type=button value="Cancel" LANGUAGE=javascript onclick="return button1_onclick()">&nbsp&nbsp
            </p>
</form>


</body>
</html>
