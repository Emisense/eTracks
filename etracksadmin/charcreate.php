<html>
<head>
<title>Elastictracks Administration - Create Character</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<p><strong>Elastictracks Character Creation</strong></p>
<?php

   // Create database record ............................................................
   // Import variables
   import_request_variables('gp', 'v_');

   $link = mysql_connect('localhost', 'etuser', 'b0st0n') OR DIE("Unable to connect to database!");
   mysql_select_db("etracks", $link) or die("Unable to select database!");

   $query = "Insert into Characters (`charid`, `vendor`, `name`, `solo`, `group`) Values (NULL, '$v_cvendor', '$v_cname', '$v_csolo', '$v_cgroup')";
 
   $result = mysql_query($query) or die("Error adding char to the database");
   mysql_free_result($result);

   $query = "Select * from Characters Where vendor='$v_cvendor' and name='$v_cname'";
   $result = mysql_query($query) or die("Unable to query database");
   $recordcount = mysql_num_rows($result);
   if ($recordcount != 0)
   {
     $job = mysql_fetch_row($result);
     $id = $job[0];
     $artist = $job[1];
     $name = $job[2];

     echo "<P>Created $artist - $name (CharID: $id).</p>";
     echo "<p>To return to Characters click <A href=\"chars.php\">here</A>.<P>\n";
   }
   else
      echo "<BR>Unexpected error creating title.<BR>";
   mysql_free_result($result);
   mysql_close($link);
?>
</body>
</html>
