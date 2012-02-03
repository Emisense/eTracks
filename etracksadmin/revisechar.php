<html>
<head>
<title>Elastictracks Administration - Revise Character</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<p><strong>Elastictracks Character Revision</strong></p>
<?php
   // Import variables
   import_request_variables('gp', 'v_');

   $link = mysql_connect('localhost', 'etuser', 'b0st0n') OR DIE("Unable to connect to database!");
   mysql_select_db("etracks", $link) or die("Unable to select database!");

   $query = "Update Characters Set `vendor`='$v_cvendor', `name`='$v_cname', `solo`='$v_csolo', `group`='$v_cgroup' Where charid=$v_charid";
   $result = mysql_query($query) or die("Error updating character in the database");
   mysql_free_result($result);

   $query = "Select * from Characters Where charid=$v_charid";
   $result = mysql_query($query) or die("Unable to query database");
   $recordcount = mysql_num_rows($result);
   if ($recordcount != 0)
   {
     $job = mysql_fetch_row($result);
     $id = $job[1];
     $name = $job[2];

     echo "$id - $name updated!<br>\n";
   }
   else
      echo "<BR>Unexpected error updating character.<BR>";
   mysql_free_result($result);
   mysql_close($link);
   echo "<p>To return to Characters click <A href=\"chars.php\">here</A>.\n";
?>
</body>
</html>
