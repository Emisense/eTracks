<html>
<head>
<title>Elastictracks Administration - Delete Track</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<p><strong>Elastictracks Delete Track</strong></p>
<?php
   // Import variables
   import_request_variables('gp', 'v_');

   // Connect to our database
   $link = mysql_connect('localhost', 'etuser', 'b0st0n') OR DIE("Unable to connect to database");
   mysql_select_db("etracks", $link) or die("Unable to select database");

   // Find Track
   $query = "Select * from Tracks where trackid = $v_tid";
   $result = mysql_query($query) or die("Error querying the database");
   $recordcount = mysql_num_rows($result);
   if ($recordcount != 0)
   {
        // Get the customer and name
        $job = mysql_fetch_row($result);
        $id = $job[0];
        $name = $job[1];

    	$old = getcwd(); // Save the current directory
   	$uploaddir = "../ETTRACK/_et$v_id/";
    	chdir($uploaddir);
    	unlink($name);
    	chdir($old); // Restore the old working directory    
   }
   mysql_free_result($result);

   // Kill the Record ...................................................................
   $query = "Delete from Tracks where trackid = $v_tid Limit 1";
   $result = mysql_query($query) or die("Error removing job from the database");
   mysql_free_result($result);

   echo "<p>Track $v_tid deleted.</p>\n";
   mysql_close($link);

   echo "<p>click <A href=\"edittitle.php?id=$v_id\">here</A> to return to Title.<P>\n";
?>
</body>
</html>
