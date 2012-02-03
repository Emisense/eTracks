<html>
<head>
<title>Elastictracks Administration - Edit Title</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php

   // Create database record ............................................................
   // Import variables
   import_request_variables('gp', 'v_');
?>
<SCRIPT  ID=clientEventHandlersJS LANGUAGE=javascript><!--     

function button1_onclick() {
<?php
   echo "window.location = \"addtrack.php?id=$v_id\"";
?>
}

function button2_onclick() {
<?php
   echo "window.location = \"addmix.php?id=$v_id\"";
?>
}

function button3_onclick() {
   if (mselect.selectedIndex == -1)
       alert("You must first select a mix from the list")
   else
   {
      if (confirm("Delete MixID: " + mselect.options[mselect.selectedIndex].value + "?"))
<?php 
        echo "window.location = \"delmix.php?id=$v_id&mid=\" + mselect.options[mselect.selectedIndex].value";
?>
   }
}

function button5_onclick() {
   if (tselect.selectedIndex == -1)
       alert("You must first select a track from the list")
   else
   {
      if (confirm("Delete TrackID: " + tselect.options[tselect.selectedIndex].value + "?"))
<?php 
        echo "window.location = \"deltrack.php?id=$v_id&tid=\" + tselect.options[tselect.selectedIndex].value";
?>
   }
}

function button6_onclick() {
   if (mselect.selectedIndex == -1)
       alert("You must first select a mix from the list")
   else
   {
<?php 
        echo "window.location = \"editmix.php?id=$v_id&mid=\" + mselect.options[mselect.selectedIndex].value";
?>
   }
}

function button7_onclick() {
   if (mselect.selectedIndex == -1)
       alert("You must first select a mix from the list")
   else
   {
<?php 
        echo "window.location = \"testmix.php?id=$v_id&mid=\" + mselect.options[mselect.selectedIndex].value";
?>
   }
}

function button4_onclick() {
   window.location = "titles.php"
}

function tselect_onclick() {
   JOBID.innerHTML = "ID: " + tselect.options[tselect.selectedIndex].value
}

function mselect_onclick() {
   MIXID.innerHTML = "ID: " + mselect.options[mselect.selectedIndex].value
}
//--></SCRIPT >
</head>
<body>
    <p><strong>Edit Title</strong></p>

<?php
   // Connect to our database
   $link = mysql_connect('localhost', 'etuser', 'b0st0n') OR DIE("Unable to connect to database");
   mysql_select_db("etracks", $link) or die("Unable to select database");

   $query = "Select * from Titles Where titleid='$v_id'";
   $result = mysql_query($query) or die("Unable to access database");
   $recordcount = mysql_num_rows($result);
   if ($recordcount != 0)
   {
        // Get the customer and name
        $job = mysql_fetch_row($result);
        $id = $job[0];
        $artist = $job[1];
        $name = $job[2];

        echo "<p>$artist - $name</p>\n";
   }
   mysql_free_result($result);
?>

    <p><strong>Tracks</strong><BR><SELECT name=tselect id=tselect SIZE="15" width="80" style="WIDTH: 400px; HEIGHT: 400px
      BACKGROUND-COLOR: 
      white" LANGUAGE=javascript 
      onclick="return tselect_onclick()"> 
<?php
   // Find titles
   $query = "Select * from Tracks Where titleid='$v_id'";
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

        echo "<OPTION value=\"$id\">$name</OPTION>\n";
      }
   }
   mysql_free_result($result);
?>
    </SELECT><BR>

<LABEL ID="JOBID">ID:       </LABEL>
</p>
<INPUT id=button1 name=button1 type=button value="Add Track" LANGUAGE=javascript onclick="return button1_onclick()">&nbsp&nbsp
<INPUT id=button5 name=button5 type=button value="Delete Track" LANGUAGE=javascript onclick="return button5_onclick()">&nbsp&nbsp

<p></p>

    <p><strong>Mixes</strong><BR><SELECT name=mselect id=mselect SIZE="15" width="80" style="WIDTH: 400px; HEIGHT: 400px
      BACKGROUND-COLOR: 
      white" LANGUAGE=javascript 
      onclick="return mselect_onclick()"> 
<?php
   // Find titles
   $query = "Select * from Mixes Where titleid='$v_id' Order by `group`";
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

        echo "<OPTION value=\"$id\">$group - $name</OPTION>\n";
      }
   }
   mysql_free_result($result);
   mysql_close($link);
?>
    </SELECT><BR>

<LABEL ID="MIXID">ID:       </LABEL>
</p>
<INPUT id=button2 name=button2 type=button value="Add Mix" LANGUAGE=javascript onclick="return button2_onclick()">&nbsp&nbsp
<INPUT id=button6 name=button6 type=button value="Edit Mix" LANGUAGE=javascript onclick="return button6_onclick()">&nbsp&nbsp
<INPUT id=button7 name=button7 type=button value="Test Mix" LANGUAGE=javascript onclick="return button7_onclick()">&nbsp&nbsp
<INPUT id=button3 name=button3 type=button value="Delete Mix" LANGUAGE=javascript onclick="return button3_onclick()">&nbsp&nbsp

<p><INPUT id=button4 name=button4 type=button value="Done" LANGUAGE=javascript onclick="return button4_onclick()">
</p>
</body>
</html>
