<html>
<head>
<title>Elastictracks Administration - Edit Mix</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php

   // Create database record ............................................................
   // Import variables
   import_request_variables('gp', 'v_');
?>
<SCRIPT  ID=clientEventHandlersJS LANGUAGE=javascript><!--     

function button1_onclick() {
<?php
   echo "window.location = \"edittitle.php?id=$v_id\"";
?>
}

//--></SCRIPT >
</head>

<body>
<p><strong>Edit Mix</strong></p>
<form name="input" action="revisemix.php" method="get">
    <p>
<?php
    echo "<input type=\"hidden\" name=\"titleid\" value=\"$v_id\">\n";
    echo "<input type=\"hidden\" name=\"mixid\" value=\"$v_mid\">\n";

   // Connect to our database
   $link = mysql_connect('localhost', 'etuser', 'b0st0n') OR DIE("Unable to connect to database");
   mysql_select_db("etracks", $link) or die("Unable to select database");

   // Get existing data
   $query = "Select * from Mixes Where `mixid`=$v_mid Limit 1";
   $result = mysql_query($query) or die("Unable to query database");
   $recordcount = mysql_num_rows($result);
   if ($recordcount == 0)
      die("Can't get mix data from database");

   $mix = mysql_fetch_row($result);
   mysql_free_result($result);

   echo "Group (what characters look for, like 'BASS SOLO'):<BR>\n"; 
   echo "<INPUT id=text1 name=mgroup value=\"$mix[2]\" width=\"80\" style=\"WIDTH: 500px;\">\n";
   echo "<BR><BR>\n";
   echo "Name (Description for this variation, 'Normal', 'Jazzy', 'Flanger', etc.):<BR>\n"; 
   echo "<INPUT id=text2 name=mname value=\"$mix[3]\" width=\"80\" style=\"WIDTH: 500px;\">\n";
   echo "<BR><BR> Set a level (%) for each available track below.<BR><BR> In general, you want the sum of ALL levels to be 100%.<BR> You can exceed this (individual tracks can even be set over 100%),<BR> but there might be clipping in the output.<BR><BR>\n";

   // Find tracks
   $query = "Select * from Tracks Where titleid=$v_id limit 24";
   $result = mysql_query($query) or die("Unable to access database");
   $recordcount = mysql_num_rows($result);
   if ($recordcount != 0)
   {

      for ($n=0 ; $n<$recordcount ; $n++)
      {
        // Get the customer and name
        $job = mysql_fetch_row($result);
        $id = $job[0];
        $name = $job[1];

        echo "$name:<BR>\n";
        $hname = sprintf('mtrack%d', $n+1);
        echo "<input type=\"hidden\" name=\"$hname\" value=\"$id\">\n";
        $hname = sprintf('mlevel%d', $n+1);
        $curval = 0;
        for ($i=0 ; $i<24 ; $i++)
        {
           if ($mix[($i*2)+4] == $id)
           {
              $curval = $mix[($i*2)+5];
              break;
           }
        }
        echo "<INPUT id=$hname name=$hname value=\"$curval\"><BR>\n";
      }
   }
   else
      echo "No Tracks!\n";

   for ($n=$recordcount ; $n<24 ; $n++)
   {
        $hname = sprintf('mtrack%d', $n+1);
        echo "<input type=\"hidden\" name=\"$hname\" value=\"0\">\n";
        $hname = sprintf('mlevel%d', $n+1);
        echo "<input type=\"hidden\" name=\"$hname\" value=\"0\">\n";
   }
   mysql_free_result($result);
   mysql_close($link);
?>
    <BR>Optional Effects to apply to this mix<BR><BR>
    Effect 1:<BR>
    <SELECT name=meffect1 id=meffect1> 
       <OPTION value="0" <?php if ($mix[52] == 0) echo "selected"; ?>>None</OPTION>
       <OPTION value="1" <?php if ($mix[52] == 1) echo "selected"; ?>>Reverb</OPTION>
       <OPTION value="2" <?php if ($mix[52] == 2) echo "selected"; ?>>Flanger</OPTION>
       <OPTION value="3" <?php if ($mix[52] == 3) echo "selected"; ?>>Phaser</OPTION>
       <OPTION value="4" <?php if ($mix[52] == 4) echo "selected"; ?>>Small Echo</OPTION>
       <OPTION value="5" <?php if ($mix[52] == 5) echo "selected"; ?>>Big Echo</OPTION>
    </SELECT><BR><BR>

    Effect 2:<BR>
    <SELECT name=meffect2 id=meffect2> 
       <OPTION value="0" <?php if ($mix[53] == 0) echo "selected"; ?>>None</OPTION>
       <OPTION value="1" <?php if ($mix[53] == 1) echo "selected"; ?>>Reverb</OPTION>
       <OPTION value="2" <?php if ($mix[53] == 2) echo "selected"; ?>>Flanger</OPTION>
       <OPTION value="3" <?php if ($mix[53] == 3) echo "selected"; ?>>Phaser</OPTION>
       <OPTION value="4" <?php if ($mix[53] == 4) echo "selected"; ?>>Small Echo</OPTION>
       <OPTION value="5" <?php if ($mix[53] == 5) echo "selected"; ?>>Big Echo</OPTION>
    </SELECT><BR><BR>

    Effect 3:<BR>
    <SELECT name=meffect3 id=meffect3> 
       <OPTION value="0" <?php if ($mix[54] == 0) echo "selected"; ?>>None</OPTION>
       <OPTION value="1" <?php if ($mix[54] == 1) echo "selected"; ?>>Reverb</OPTION>
       <OPTION value="2" <?php if ($mix[54] == 2) echo "selected"; ?>>Flanger</OPTION>
       <OPTION value="3" <?php if ($mix[54] == 3) echo "selected"; ?>>Phaser</OPTION>
       <OPTION value="4" <?php if ($mix[54] == 4) echo "selected"; ?>>Small Echo</OPTION>
       <OPTION value="5" <?php if ($mix[54] == 5) echo "selected"; ?>>Big Echo</OPTION>
    </SELECT><BR><BR>

    <input type="submit" value="Update"> (Be patient, validates settings and files)
            </p>
</form>
<p><INPUT id=button1 name=button1 type=button value="Abort" LANGUAGE=javascript onclick="return button1_onclick()"></p>

</body>
</html>
