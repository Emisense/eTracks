<?php
   // Connect to our database
   $link = mysql_connect('localhost', 'etuser', 'b0st0n') OR DIE("Unable to connect to database");
   mysql_select_db("etracks", $link) or die("Unable to select database");

   // chars
   $query = "Select * from Characters";
   $result = mysql_query($query) or die("Unable to access database");
   $recordcount = mysql_num_rows($result);
   if ($recordcount != 0)
   {
      for ($n=0 ; $n<$recordcount ; $n++)
      {
        // Get the customer and name
        $job = mysql_fetch_row($result);
        $id = $job[0];
        $artist = $job[1];
        $name = $job[2];

        echo "$id\n";
        echo "$artist - $name\n";
      }
   }
   mysql_free_result($result);
   mysql_close($link);
?>
