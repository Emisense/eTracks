<?php
   // Import variables
   import_request_variables('gp', 'v_');

   // Connect to our database
   $link = mysql_connect('localhost', 'etuser', 'b0st0n') OR DIE("Unable to connect to database");
   mysql_select_db("etracks", $link) or die("Unable to select database");

   $query = "Select * from Characters Where charid='$v_charid'";
   $result = mysql_query($query) or die("Unable to query database");
   $recordcount = mysql_num_rows($result);
   if ($recordcount != 0)
   {
     $job = mysql_fetch_row($result);
     if ($v_group)
        $solo = $job[4];
     else
        $solo = $job[3];
   }

   mysql_free_result($result);

   // Find mixes
   $query = "Select * from Mixes Where titleid='$v_titleid' and `group`='$solo'";
   $result = mysql_query($query) or die("Unable to access database");
   $recordcount = mysql_num_rows($result);
   if ($recordcount != 0)
   {
      for ($n=0 ; $n<$recordcount ; $n++)
      {
        // Get the customer and name
        $job = mysql_fetch_row($result);
        $id = $job[0];
        $group = $job[2];
        $name = $job[3];

        echo "$id\n$name\n";
      }
   }
   mysql_free_result($result);
   mysql_close($link);
?>