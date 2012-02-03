<html>
<head>
<title>Elastictracks Administration - Set Image</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<p><strong>Set Image</strong></p>
<?php
   import_request_variables('gp', 'v_');

   // Copy the files
   $uploaddir = "/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETIMG/";

   $uploadfile = $uploaddir . "c" . $v_charid . ".jpg";

   if (is_file($uploadfile))
      unlink($uploadfile);

   if (!move_uploaded_file($_FILES['imagefile']['tmp_name'], $uploadfile))
      die("Can't move image file!");

   echo "<p>Created image: c$v_charid.jpg.</p>\n";
   echo "<p><img src=\"..\ETIMG\c$v_charid.jpg\">\n";
   echo "<p>To return to Characters click <A href=\"chars.php\">here</A>.</p>\n";

?>
</body>
</html>
