<html>
<head>
<title>Elastictracks Administration - Delete Mix</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<p><strong>Elastictracks Delete Mix</strong></p>
<?php
   // Import variables
   import_request_variables('gp', 'v_');

   // Connect to our database
   $link = mysql_connect('localhost', 'etuser', 'b0st0n') OR DIE("Unable to connect to database");
   mysql_select_db("etracks", $link) or die("Unable to select database");

   // Kill the file
   $name = "_m$v_mid.aif";

   $old = getcwd(); // Save the current directory
   $uploaddir = "../ETMIX/";
   chdir($uploaddir);
   unlink($name);
   chdir($old); // Restore the old working directory    
	
   // Kill the Record ...................................................................
   $query = "Delete from Mixes where mixid = $v_mid Limit 1";
   $result = mysql_query($query) or die("Error removing job from the database");
   mysql_free_result($result);

   echo "<p>Mix $v_mid deleted.</p>\n";
   mysql_close($link);

   echo "<p>click <A href=\"edittitle.php?id=$v_id\">here</A> to return to Editing Title.<P>\n";
?>
</body>
</html>
