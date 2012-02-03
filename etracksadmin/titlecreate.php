<html>
<head>
<title>Elastictracks Administration - Create Title</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<p><strong>Elastictracks Title Creation</strong></p>
<?php

   // Create database record ............................................................
   // Import variables
   import_request_variables('gp', 'v_');

   $link = mysql_connect('localhost', 'etuser', 'b0st0n') OR DIE("Unable to connect to database!");
   mysql_select_db("etracks", $link) or die("Unable to select database!");

   $query = "Insert into Titles (titleid, artist, name, notes) values (NULL, '$v_tartist', '$v_tname', '$v_tnotes')";
   $result = mysql_query($query) or die("Error adding job to the database");
   mysql_free_result($result);

   $query = "Select * from Titles Where artist='$v_tartist' and name='$v_tname'";
   $result = mysql_query($query) or die("Unable to query database");
   $recordcount = mysql_num_rows($result);
   if ($recordcount != 0)
   {
     $job = mysql_fetch_row($result);
     $id = $job[0];
     $artist = $job[1];
     $name = $job[2];

     echo "<P>Created $artist - $name (TitleID: $id).</p>";
     echo "<p>To Edit click <A href=\"edittitle.php?id=$id\">here</A>.<BR>\n";
     echo "<p>To return to Titles click <A href=\"titles.php\">here</A>.<P>\n";
   }
   else
      echo "<BR>Unexpected error creating title.<BR>";
   mysql_free_result($result);
   mysql_close($link);
?>
</body>
</html>
