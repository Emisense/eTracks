<html>
<head>
<title>Elastictracks Administration - New Character</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<SCRIPT  ID=clientEventHandlersJS LANGUAGE=javascript><!--     

function button1_onclick() {
   window.location = "chars.php"
}

//--></SCRIPT >

</head>

<body>
<!-- The data encoding type, enctype, MUST be specified as below -->
<form name="input" action="charcreate.php" method="get">
    <p><strong>New Character</strong></p>
    <BR>
    Vendor:<BR> 
    <INPUT id=text1 name=cvendor width="80" style="WIDTH: 500px;">
    <BR><BR>
    Name:<BR> 
    <INPUT id=text2 name=cname width="80" style="WIDTH: 500px;">
    <BR><BR>
    Solo Mix (Case Sensitive!):<BR>
    <INPUT id=text3 name=csolo width="80" style="WIDTH: 500px;">
    <BR><BR>
    Group Mix (Case Sensitive!):<BR>
    <INPUT id=text4 name=cgroup width="80" style="WIDTH: 500px;">
    <BR><BR>
    <input type="submit" value="Create">&nbsp&nbsp<INPUT id=button1 name=button1 type=button value="Cancel" LANGUAGE=javascript onclick="return button1_onclick()">&nbsp&nbsp
            </p>
</form>


</body>
</html>
