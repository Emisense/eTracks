<html>
<head>
<title>Elastictracks Administration - Delete Title</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<p><strong>Elastictracks Delete Title</strong></p>
<?php
   // Import variables
   import_request_variables('gp', 'v_');

   // Connect to our database
   $link = mysql_connect('localhost', 'etuser', 'b0st0n') OR DIE("Unable to connect to database");
   mysql_select_db("etracks", $link) or die("Unable to select database");

   // Kill the Record ...................................................................
   $query = "Delete from Titles where titleid = $v_id Limit 1";
   $result = mysql_query($query) or die("Error removing job from the database");
   mysql_free_result($result);

   $query = "Delete from Tracks where titleid = $v_id";
   $result = mysql_query($query) or die("Error removing job from the database");
   mysql_free_result($result);

   $query = "Delete from Mixes where titleid = $v_id";
   $result = mysql_query($query) or die("Error removing job from the database");
   mysql_free_result($result);

   echo "<p>Title $v_id deleted.</p>\n";
   mysql_close($link);

   echo "<p>click <A href=\"titles.php\">here</A> to return to Titles.<P>\n";
?>
</body>
</html>
