<html>
<head>
<title>Elastictracks Administration - Edit Character</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<SCRIPT  ID=clientEventHandlersJS LANGUAGE=javascript><!--     

function button1_onclick() {
   window.location = "chars.php"
}

//--></SCRIPT >

</head>

<?php
  // Import variables
   import_request_variables('gp', 'v_');
?>

<body>
<!-- The data encoding type, enctype, MUST be specified as below -->
<form name="input" action="revisechar.php" method="get">
    <p><strong>Edit Character</strong></p>
    <BR>
    <BR><BR>
<?php
    echo "<input type=\"hidden\" name=\"charid\" value=\"$v_id\">\n";
   // Connect to our database
   $link = mysql_connect('localhost', 'etuser', 'b0st0n') OR DIE("Unable to connect to database");
   mysql_select_db("etracks", $link) or die("Unable to select database");

   // Get existing data
   $query = "Select * from Characters Where `charid`=$v_id Limit 1";
   $result = mysql_query($query) or die("Unable to query database");
   $recordcount = mysql_num_rows($result);
   if ($recordcount == 0)
      die("Can't get character data from database");

   $ch = mysql_fetch_row($result);
   mysql_free_result($result);

    echo "Vendor:<BR>\n"; 
    echo "<INPUT id=text1 name=cvendor value=\"$ch[1]\" width=\"80\" style=\"WIDTH: 500px;\">\n";
   echo "<BR><BR>Name:<BR>\n"; 
    echo "<INPUT id=text2 name=cname value=\"$ch[2]\" width=\"80\" style=\"WIDTH: 500px;\">\n";
    echo "<BR><BR>Solo Mix (Case Sensitive!):<BR>\n";
    echo "<INPUT id=text3 name=csolo value=\"$ch[3]\" width=\"80\" style=\"WIDTH: 500px;\">\n";
    echo "<BR><BR>Group Mix (Case Sensitive!):<BR>\n";
    echo "<INPUT id=text4 name=cgroup value=\"$ch[4]\" width=\"80\" style=\"WIDTH: 500px;\">\n";
?>
    <BR><BR><input type="submit" value="Update">&nbsp&nbsp<INPUT id=button1 name=button1 type=button value="Cancel" LANGUAGE=javascript onclick="return button1_onclick()">&nbsp&nbsp
            </p>
</form>


</body>
</html>
