<html>
<head>
<title>Elastictracks Administration - Set Character Image</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php
   // Import variables
   import_request_variables('gp', 'v_');
?>
<SCRIPT  ID=clientEventHandlersJS LANGUAGE=javascript><!--     

function button1_onclick() {
<?php
   echo "window.location = \"chars.php\"";
?>
}

//--></SCRIPT >
</head>

<body>
<!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype="multipart/form-data" action="setimage.php" method="POST">
    <p><strong>Set Image</strong></p>
<?php
    echo "Current Image:<BR>";
    echo "<img src=\"..\ETIMG\c$v_id.jpg\">\n";
    echo "<input type=\"hidden\" name=\"charid\" value=\"$v_id\">\n";
?>
    <p>
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="64000000">
    <!-- Name of input element determines name in $_FILES array -->
    Image File (JPG, 280Wx240H):<BR> 
    <input name="imagefile" type="file" width="80" style="WIDTH: 500px;"> 
    <BR><BR>
    <input type="submit" value="SET"> (Uploads file, be VERY patient!)
    <!-- Try to convince IE not to puke -->
            </p>
</form>
<p><INPUT id=button1 name=button1 type=button value="Abort" LANGUAGE=javascript onclick="return button1_onclick()"></p>

</body>
</html>
