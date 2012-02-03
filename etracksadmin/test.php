<html>
<head>
<title>Elastictracks Administration - Test</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php

   // Create database record ............................................................
   // Import variables
   import_request_variables('gp', 'v_');
?>
<SCRIPT  ID=clientEventHandlersJS LANGUAGE=javascript><!--     

function button1_onclick() {
<?php
   echo "window.location = \"index.php\"";
?>
}

//--></SCRIPT >
</head>
<body>
    <p><strong>Test Page</strong></p>
<?php

   // Connect to our database
   $link = mysql_connect('localhost', 'etuser', 'b0st0n') OR DIE("Unable to connect to database");
   mysql_select_db("etracks", $link) or die("Unable to select database");

   // Find titles
   $query = "Select * from Titles";
   $result = mysql_query($query) or die("Unable to access database");
   $recordcount = mysql_num_rows($result);
   if ($recordcount == 0)
      die("No Titles!");

   mysql_free_result($result);

   $query = "Select * from Characters";
   $result = mysql_query($query) or die("Unable to access database");
   $recordcount = mysql_num_rows($result);
   if ($recordcount == 0)
      die("No Characters!");

   mysql_free_result($result);
?>

<p>Pick a title and up to six characters. The next page will let you pick variations<BR>
(if multiple mixes are in the character's gorup for the title) and add some extra effects.<P>
<form name="input" action="dotest.php" method="get">
    <p>

    Title:<BR>
    <SELECT name=title id=title> 
<?php
   // Connect to our database
/*
   $link = mysql_connect('localhost', 'etuser', 'b0st0n') OR DIE("Unable to connect to database");
   mysql_select_db("etracks", $link) or die("Unable to select database");
*/
   // Find titles
   $query = "Select * from Titles Order BY artist";
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

        echo "<OPTION value=\"$id\"";
        if ($n==0)
           echo "selected";
        echo ">$artist - $name</OPTION>\n";
      }
   }
   mysql_free_result($result);
   echo "</SELECT><BR><BR>\n";


   // Find chars
   $query = "Select * from Characters";
   $result = mysql_query($query) or die("Unable to access database");
   $recordcount = mysql_num_rows($result);
   if ($recordcount != 0)
   {
      echo "Character 1<BR>\n";
      echo "<SELECT name=char1 id=char1>\n";
      echo "<OPTION value=\"0\" selected>None</OPTION>\n";
      for ($n=0 ; $n<$recordcount ; $n++)
      {
        // Get the customer and name
        $job = mysql_fetch_row($result);
        $id = $job[0];
        $artist = $job[1];
        $name = $job[2];

        echo "<OPTION value=\"$id\">$artist - $name</OPTION>\n";
      }
      echo "</SELECT><BR><BR>\n";
   }
   mysql_free_result($result);

   // Find chars
   $query = "Select * from Characters";
   $result = mysql_query($query) or die("Unable to access database");
   $recordcount = mysql_num_rows($result);
   if ($recordcount != 0)
   {
      echo "Character 2<BR>\n";
      echo "<SELECT name=char2 id=char2>\n";
      echo "<OPTION value=\"0\" selected>None</OPTION>\n";
      for ($n=0 ; $n<$recordcount ; $n++)
      {
        // Get the customer and name
        $job = mysql_fetch_row($result);
        $id = $job[0];
        $artist = $job[1];
        $name = $job[2];

        echo "<OPTION value=\"$id\">$artist - $name</OPTION>\n";
      }
      echo "</SELECT><BR><BR>\n";
   }
   mysql_free_result($result);

   // Find chars
   $query = "Select * from Characters";
   $result = mysql_query($query) or die("Unable to access database");
   $recordcount = mysql_num_rows($result);
   if ($recordcount != 0)
   {
      echo "Character 3<BR>\n";
      echo "<SELECT name=char3 id=char3>\n";
      echo "<OPTION value=\"0\" selected>None</OPTION>\n";
      for ($n=0 ; $n<$recordcount ; $n++)
      {
        // Get the customer and name
        $job = mysql_fetch_row($result);
        $id = $job[0];
        $artist = $job[1];
        $name = $job[2];

        echo "<OPTION value=\"$id\">$artist - $name</OPTION>\n";
      }
      echo "</SELECT><BR><BR>\n";
   }
   mysql_free_result($result);

   // Find chars
   $query = "Select * from Characters";
   $result = mysql_query($query) or die("Unable to access database");
   $recordcount = mysql_num_rows($result);
   if ($recordcount != 0)
   {
      echo "Character 4<BR>\n";
      echo "<SELECT name=char4 id=char4>\n";
      echo "<OPTION value=\"0\" selected>None</OPTION>\n";
      for ($n=0 ; $n<$recordcount ; $n++)
      {
        // Get the customer and name
        $job = mysql_fetch_row($result);
        $id = $job[0];
        $artist = $job[1];
        $name = $job[2];

        echo "<OPTION value=\"$id\">$artist - $name</OPTION>\n";
      }
      echo "</SELECT><BR><BR>\n";
   }
   mysql_free_result($result);

   // Find chars
   $query = "Select * from Characters";
   $result = mysql_query($query) or die("Unable to access database");
   $recordcount = mysql_num_rows($result);
   if ($recordcount != 0)
   {
      echo "Character 5<BR>\n";
      echo "<SELECT name=char5 id=char5>\n";
      echo "<OPTION value=\"0\" selected>None</OPTION>\n";
      for ($n=0 ; $n<$recordcount ; $n++)
      {
        // Get the customer and name
        $job = mysql_fetch_row($result);
        $id = $job[0];
        $artist = $job[1];
        $name = $job[2];

        echo "<OPTION value=\"$id\">$artist - $name</OPTION>\n";
      }
      echo "</SELECT><BR><BR>\n";
   }
   mysql_free_result($result);

   // Find chars
   $query = "Select * from Characters";
   $result = mysql_query($query) or die("Unable to access database");
   $recordcount = mysql_num_rows($result);
   if ($recordcount != 0)
   {
      echo "Character 6<BR>\n";
      echo "<SELECT name=char6 id=char6>\n";
      echo "<OPTION value=\"0\" selected>None</OPTION>\n";
      for ($n=0 ; $n<$recordcount ; $n++)
      {
        // Get the customer and name
        $job = mysql_fetch_row($result);
        $id = $job[0];
        $artist = $job[1];
        $name = $job[2];

        echo "<OPTION value=\"$id\">$artist - $name</OPTION>\n";
      }
      echo "</SELECT><BR><BR>\n";
   }
   mysql_free_result($result);

   mysql_close($link);
?>

<input type="submit" value="Next">
            </p>
</form>
<p><INPUT id=button1 name=button1 type=button value="Abort" LANGUAGE=javascript onclick="return button1_onclick()"></p>
</body>
</html>
