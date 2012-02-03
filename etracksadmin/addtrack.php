<html>
<head>
<title>Elastictracks Administration - Add Track</title>
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
<!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype="multipart/form-data" action="createtrack.php" method="POST">
    <p><strong>Add Track</strong></p>
    <p>
<?php
    echo "<input type=\"hidden\" name=\"trackid\" value=\"$v_id\">\n";
?>
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="64000000">
    <!-- Name of input element determines name in $_FILES array -->
    Audio File (uncompressed WAV or AIFF, 100M max):<BR> 
    <input name="audiofile" type="file" width="80" style="WIDTH: 500px;"> 
    <BR><BR>
    <input type="submit" value="Create"> (Uploads file, be VERY patient!)
    <!-- Try to convince IE not to puke -->
            </p>
</form>
<p><INPUT id=button1 name=button1 type=button value="Abort" LANGUAGE=javascript onclick="return button1_onclick()"></p>

</body>
</html>
