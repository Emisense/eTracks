<html>
<head>
<title>Elastictracks Administration - Titles</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<SCRIPT  ID=clientEventHandlersJS LANGUAGE=javascript><!--     

function button1_onclick() {
   window.location = "addtitle.php"
}

function button2_onclick() {
   if (tselect.selectedIndex == -1)
       alert("You must first select a title from the list")
   else
       window.location = "edittitle.php?id=" + tselect.options[tselect.selectedIndex].value      
}

function button3_onclick() {
   if (tselect.selectedIndex == -1)
       alert("You must first select a title from the list")
   else
   {
      if (confirm("Delete TitleID: " + tselect.options[tselect.selectedIndex].value + "?"))
         window.location = "deltitle.php?id=" + tselect.options[tselect.selectedIndex].value
   }
}

function button4_onclick() {
   window.location = "index.php"
}

function tselect_onclick() {
   JOBID.innerHTML = "ID: " + tselect.options[tselect.selectedIndex].value
}
//--></SCRIPT >
</head>

<body>
    <p><strong>Titles</strong></p>

    <p><SELECT name=tselect id=tselect SIZE="15" width="80" style="WIDTH: 400px; HEIGHT: 400px
      BACKGROUND-COLOR: 
      white" LANGUAGE=javascript 
      onclick="return tselect_onclick()"> 
<?php
   // Connect to our database
   $link = mysql_connect('localhost', 'etuser', 'b0st0n') OR DIE("Unable to connect to database");
   mysql_select_db("etracks", $link) or die("Unable to select database");

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

        echo "<OPTION value=\"$id\">$artist - $name</OPTION>\n";
      }
   }
   mysql_free_result($result);
   mysql_close($link);
?>
    </SELECT><BR>

<LABEL ID="JOBID">ID:       </LABEL>
</p>
<INPUT id=button1 name=button1 type=button value="Add New" LANGUAGE=javascript onclick="return button1_onclick()">&nbsp&nbsp
<INPUT id=button2 name=button2 type=button value=" Edit " LANGUAGE=javascript onclick="return button2_onclick()">&nbsp&nbsp
<INPUT id=button3 name=button3 type=button value="Delete" LANGUAGE=javascript onclick="return button3_onclick()">&nbsp&nbsp
<p><INPUT id=button4 name=button4 type=button value="Done" LANGUAGE=javascript onclick="return button4_onclick()">
</p>
</body>
</html>
