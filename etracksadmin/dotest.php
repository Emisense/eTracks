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
   echo "window.location = \"test.php\"";
?>
}

//--></SCRIPT >
</head>
<body>
    <p><strong>Test Page</strong></p>

<?php
   $charcount = 0;
   if ($v_char1 != 0)
      $charcount++;
   if ($v_char2 != 0)
      $charcount++;
   if ($v_char3 != 0)
      $charcount++;
   if ($v_char4 != 0)
      $charcount++;
   if ($v_char5 != 0)
      $charcount++;
   if ($v_char6 != 0)
      $charcount++;

   if ($charcount == 0)
      die("No Characters Selected!");
?>

<p>Pick the desired mix for each character (assuming that mixes match in the Title).<BR>
You can adjust the level for each character. In general, all characters should add up to 100%,<BR>
but this is not enforced. You can go over 100% for a character, but output may clip.<BR>
Finish by adding any desired effects, adjusting speed from 1.0 (if desired), and press Jam<BR>
to get a combined mix.<P>

<form name="input" action="jam.php" method="get">
    <p>

<?php
   // Connect to our database
   $link = mysql_connect('localhost', 'etuser', 'b0st0n') OR DIE("Unable to connect to database");
   mysql_select_db("etracks", $link) or die("Unable to select database");

   if ($v_char1 == 0)
   {
     echo "<input type=\"hidden\" name=\"mix1\" value=\"0\">\n";
     echo "<input type=\"hidden\" name=\"level1\" value=\"0\">\n";
   }
   else
   {
      $query = "Select * from Characters where `charid`=$v_char1";
      $result = mysql_query($query) or die("Unable to access database");
      $recordcount = mysql_num_rows($result);
      if ($recordcount != 0)
      {
        // Get the customer and name
        $job = mysql_fetch_row($result);
        $id = $job[0];
        $artist = $job[1];
        $name = $job[2];
        $solo = $job[3];
        $group = $job[4];

        echo "$artist - $name:<BR>\n";
        echo "<img src=\"..\ETIMG\c$id.jpg\"><BR>\n";

        mysql_free_result($result);

        if ($charcount > 1)
           $query = "Select * from Mixes where `titleid`=$v_title and `group`='$group'";
        else
           $query = "Select * from Mixes where `titleid`=$v_title and `group`='$solo'";

        $result = mysql_query($query) or die("Unable to access database");
        $recordcount = mysql_num_rows($result);
        if ($recordcount != 0)
        {
           echo "<SELECT name=mix1 id=mix1>\n";
           for ($n=0 ; $n<$recordcount ; $n++)
           { 
	     // Get the customer and name
             $job = mysql_fetch_row($result);

             echo "<OPTION value=\"$job[0]\"";
             if ($n==0)
                echo "selected";
             echo ">$job[2] - $job[3]</OPTION>\n";
           }
           echo "</SELECT><BR>\n";
           $lev = round(100.0 / $charcount);
           echo "Level:<BR>\n";
           echo "<INPUT id=level1 name=level1 value=\"$lev\"><BR><BR>\n";
        }
        else
        {
           echo "<input type=\"hidden\" name=\"mix1\" value=\"0\">\n";
           echo "<input type=\"hidden\" name=\"level1\" value=\"0\">\n";
           if ($charcount > 1)
              echo "No mixes match the group: '$group' for this title.<BR><BR>\n";
           else
              echo "No mixes match the group: '$solo' for this title.<BR><BR>\n";
        }
      }
      mysql_free_result($result);
   }

   if ($v_char2 == 0)
   {
     echo "<input type=\"hidden\" name=\"mix2\" value=\"0\">\n";
     echo "<input type=\"hidden\" name=\"level2\" value=\"0\">\n";
   }
   else
   {
      $query = "Select * from Characters where `charid`=$v_char2";
      $result = mysql_query($query) or die("Unable to access database");
      $recordcount = mysql_num_rows($result);
      if ($recordcount != 0)
      {
        // Get the customer and name
        $job = mysql_fetch_row($result);
        $id = $job[0];
        $artist = $job[1];
        $name = $job[2];
        $solo = $job[3];
        $group = $job[4];

        echo "$artist - $name:<BR>\n";
        echo "<img src=\"..\ETIMG\c$id.jpg\"><BR>\n";

        mysql_free_result($result);

        if ($charcount > 1)
           $query = "Select * from Mixes where `titleid`=$v_title and `group`='$group'";
        else
           $query = "Select * from Mixes where `titleid`=$v_title and `group`='$solo'";

        $result = mysql_query($query) or die("Unable to access database");
        $recordcount = mysql_num_rows($result);
        if ($recordcount != 0)
        {
           echo "<SELECT name=mix2 id=mix2>\n";
           for ($n=0 ; $n<$recordcount ; $n++)
           { 
	     // Get the customer and name
             $job = mysql_fetch_row($result);

             echo "<OPTION value=\"$job[0]\"";
             if ($n==0)
                echo "selected";
             echo ">$job[2] - $job[3]</OPTION>\n";
           }
           echo "</SELECT><BR>\n";
           $lev = round(100.0 / $charcount);
           echo "Level:<BR>\n";
           echo "<INPUT id=level2 name=level2 value=\"$lev\"><BR><BR>\n";
        }
        else
        {
           echo "<input type=\"hidden\" name=\"mix2\" value=\"0\">\n";
           echo "<input type=\"hidden\" name=\"level2\" value=\"0\">\n";
           if ($charcount > 1)
              echo "No mixes match the group: '$group' for this title.<BR><BR>\n";
           else
              echo "No mixes match the group: '$solo' for this title.<BR><BR>\n";
        }
      }
      mysql_free_result($result);
   }

   if ($v_char3 == 0)
   {
     echo "<input type=\"hidden\" name=\"mix3\" value=\"0\">\n";
     echo "<input type=\"hidden\" name=\"level3\" value=\"0\">\n";
   }
   else
   {
      $query = "Select * from Characters where `charid`=$v_char3";
      $result = mysql_query($query) or die("Unable to access database");
      $recordcount = mysql_num_rows($result);
      if ($recordcount != 0)
      {
        // Get the customer and name
        $job = mysql_fetch_row($result);
        $id = $job[0];
        $artist = $job[1];
        $name = $job[2];
        $solo = $job[3];
        $group = $job[4];

        echo "$artist - $name:<BR>\n";
        echo "<img src=\"..\ETIMG\c$id.jpg\"><BR>\n";

        mysql_free_result($result);

        if ($charcount > 1)
           $query = "Select * from Mixes where `titleid`=$v_title and `group`='$group'";
        else
           $query = "Select * from Mixes where `titleid`=$v_title and `group`='$solo'";

        $result = mysql_query($query) or die("Unable to access database");
        $recordcount = mysql_num_rows($result);
        if ($recordcount != 0)
        {
           echo "<SELECT name=mix3 id=mix3>\n";
           for ($n=0 ; $n<$recordcount ; $n++)
           { 
	     // Get the customer and name
             $job = mysql_fetch_row($result);

             echo "<OPTION value=\"$job[0]\"";
             if ($n==0)
                echo "selected";
             echo ">$job[2] - $job[3]</OPTION>\n";
           }
           echo "</SELECT><BR>\n";
           $lev = round(100.0 / $charcount);
           echo "Level:<BR>\n";
           echo "<INPUT id=level3 name=level3 value=\"$lev\"><BR><BR>\n";
        }
        else
        {
           echo "<input type=\"hidden\" name=\"mix3\" value=\"0\">\n";
           echo "<input type=\"hidden\" name=\"level3\" value=\"0\">\n";
           if ($charcount > 1)
              echo "No mixes match the group: '$group' for this title.<BR><BR>\n";
           else
              echo "No mixes match the group: '$solo' for this title.<BR><BR>\n";
        }
      }
      mysql_free_result($result);
   }

   if ($v_char4 == 0)
   {
     echo "<input type=\"hidden\" name=\"mix4\" value=\"0\">\n";
     echo "<input type=\"hidden\" name=\"level4\" value=\"0\">\n";
   }
   else
   {
      $query = "Select * from Characters where `charid`=$v_char4";
      $result = mysql_query($query) or die("Unable to access database");
      $recordcount = mysql_num_rows($result);
      if ($recordcount != 0)
      {
        // Get the customer and name
        $job = mysql_fetch_row($result);
        $id = $job[0];
        $artist = $job[1];
        $name = $job[2];
        $solo = $job[3];
        $group = $job[4];

        echo "$artist - $name:<BR>\n";
        echo "<img src=\"..\ETIMG\c$id.jpg\"><BR>\n";

        mysql_free_result($result);

        if ($charcount > 1)
           $query = "Select * from Mixes where `titleid`=$v_title and `group`='$group'";
        else
           $query = "Select * from Mixes where `titleid`=$v_title and `group`='$solo'";

        $result = mysql_query($query) or die("Unable to access database");
        $recordcount = mysql_num_rows($result);
        if ($recordcount != 0)
        {
           echo "<SELECT name=mix4 id=mix4>\n";
           for ($n=0 ; $n<$recordcount ; $n++)
           { 
	     // Get the customer and name
             $job = mysql_fetch_row($result);

             echo "<OPTION value=\"$job[0]\"";
             if ($n==0)
                echo "selected";
             echo ">$job[2] - $job[3]</OPTION>\n";
           }
           echo "</SELECT><BR>\n";
           $lev = round(100.0 / $charcount);
           echo "Level:<BR>\n";
           echo "<INPUT id=level4 name=level4 value=\"$lev\"><BR><BR>\n";
        }
        else
        {
           echo "<input type=\"hidden\" name=\"mix4\" value=\"0\">\n";
           echo "<input type=\"hidden\" name=\"level4\" value=\"0\">\n";
           if ($charcount > 1)
              echo "No mixes match the group: '$group' for this title.<BR><BR>\n";
           else
              echo "No mixes match the group: '$solo' for this title.<BR><BR>\n";
        }
      }
      mysql_free_result($result);
   }

   if ($v_char5 == 0)
   {
     echo "<input type=\"hidden\" name=\"mix5\" value=\"0\">\n";
     echo "<input type=\"hidden\" name=\"level5\" value=\"0\">\n";
   }
   else
   {
      $query = "Select * from Characters where `charid`=$v_char5";
      $result = mysql_query($query) or die("Unable to access database");
      $recordcount = mysql_num_rows($result);
      if ($recordcount != 0)
      {
        // Get the customer and name
        $job = mysql_fetch_row($result);
        $id = $job[0];
        $artist = $job[1];
        $name = $job[2];
        $solo = $job[3];
        $group = $job[4];

        echo "$artist - $name:<BR>\n";
        echo "<img src=\"..\ETIMG\c$id.jpg\"><BR>\n";

        mysql_free_result($result);

        if ($charcount > 1)
           $query = "Select * from Mixes where `titleid`=$v_title and `group`='$group'";
        else
           $query = "Select * from Mixes where `titleid`=$v_title and `group`='$solo'";

        $result = mysql_query($query) or die("Unable to access database");
        $recordcount = mysql_num_rows($result);
        if ($recordcount != 0)
        {
           echo "<SELECT name=mix5 id=mix5>\n";
           for ($n=0 ; $n<$recordcount ; $n++)
           { 
	     // Get the customer and name
             $job = mysql_fetch_row($result);

             echo "<OPTION value=\"$job[0]\"";
             if ($n==0)
                echo "selected";
             echo ">$job[2] - $job[3]</OPTION>\n";
           }
           echo "</SELECT><BR>\n";
           $lev = round(100.0 / $charcount);
           echo "Level:<BR>\n";
           echo "<INPUT id=level5 name=level5 value=\"$lev\"><BR><BR>\n";
        }
        else
        {
           echo "<input type=\"hidden\" name=\"mix5\" value=\"0\">\n";
           echo "<input type=\"hidden\" name=\"level5\" value=\"0\">\n";
           if ($charcount > 1)
              echo "No mixes match the group: '$group' for this title.<BR><BR>\n";
           else
              echo "No mixes match the group: '$solo' for this title.<BR><BR>\n";
        }
      }
      mysql_free_result($result);
   }

   if ($v_char6 == 0)
   {
     echo "<input type=\"hidden\" name=\"mix6\" value=\"0\">\n";
     echo "<input type=\"hidden\" name=\"level6\" value=\"0\">\n";
   }
   else
   {
      $query = "Select * from Characters where `charid`=$v_char6";
      $result = mysql_query($query) or die("Unable to access database");
      $recordcount = mysql_num_rows($result);
      if ($recordcount != 0)
      {
        // Get the customer and name
        $job = mysql_fetch_row($result);
        $id = $job[0];
        $artist = $job[1];
        $name = $job[2];
        $solo = $job[3];
        $group = $job[4];

        echo "$artist - $name:<BR>\n";
        echo "<img src=\"..\ETIMG\c$id.jpg\"><BR>\n";

        mysql_free_result($result);

        if ($charcount > 1)
           $query = "Select * from Mixes where `titleid`=$v_title and `group`='$group'";
        else
           $query = "Select * from Mixes where `titleid`=$v_title and `group`='$solo'";

        $result = mysql_query($query) or die("Unable to access database");
        $recordcount = mysql_num_rows($result);
        if ($recordcount != 0)
        {
           echo "<SELECT name=mix6 id=mix6>\n";
           for ($n=0 ; $n<$recordcount ; $n++)
           { 
	     // Get the customer and name
             $job = mysql_fetch_row($result);

             echo "<OPTION value=\"$job[0]\"";
             if ($n==0)
                echo "selected";
             echo ">$job[2] - $job[3]</OPTION>\n";
           }
           echo "</SELECT><BR>\n";
           $lev = round(100.0 / $charcount);
           echo "Level:<BR>\n";
           echo "<INPUT id=level6 name=level6 value=\"$lev\"><BR><BR>\n";
        }
        else
        {
           echo "<input type=\"hidden\" name=\"mix6\" value=\"0\">\n";
           echo "<input type=\"hidden\" name=\"level6\" value=\"0\">\n";
           if ($charcount > 1)
              echo "No mixes match the group: '$group' for this title.<BR><BR>\n";
           else
              echo "No mixes match the group: '$solo' for this title.<BR><BR>\n";
        }
      }
      mysql_free_result($result);
   }

   mysql_close($link);
?>

    <BR>Optional Effects to apply to this 'Jam'<BR><BR>
    Effect 1:<BR>
    <SELECT name=meffect1 id=meffect1> 
       <OPTION value="0" selected>None</OPTION>
       <OPTION value="1">Reverb</OPTION>
       <OPTION value="2">Flanger</OPTION>
       <OPTION value="3">Phaser</OPTION>
       <OPTION value="4">Small Echo</OPTION>
       <OPTION value="5">Big Echo</OPTION>
       <OPTION value="6">Reverse</OPTION>
    </SELECT><BR><BR>

    Effect 2:<BR>
    <SELECT name=meffect2 id=meffect2> 
       <OPTION value="0" selected>None</OPTION>
       <OPTION value="1">Reverb</OPTION>
       <OPTION value="2">Flanger</OPTION>
       <OPTION value="3">Phaser</OPTION>
       <OPTION value="4">Small Echo</OPTION>
       <OPTION value="5">Big Echo</OPTION>
       <OPTION value="6">Reverse</OPTION>
    </SELECT><BR><BR>
    Adjust Playback Speed:<BR>
    <INPUT id=speed name=speed value="1.0"><BR><BR>

<input type="submit" value="Jam">
            </p>
</form>
<p><INPUT id=button1 name=button1 type=button value="Back" LANGUAGE=javascript onclick="return button1_onclick()"></p>
</body>
</html>
