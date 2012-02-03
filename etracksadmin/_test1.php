<html>
<head>
<title>Elastic Tracks Engine</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
    <p><strong>Elastic Tracks Engine</strong></p> 
<?php
   $out = shell_exec("pwd");
   echo "$out";
   echo "<p>Mixing Doobie All</p>\n";
   $out = exec("/usr/local/bin/sox -m  \"/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et11/Doobie Gtr 1.aif\" \"/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et11/Doobie Gtr 2.aif\" \"/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et11/Doobie Gtr 3.aif\" \"/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et11/Doobie Gtr 4.aif\" \"/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et11/Doobie Bass.aif\" \"/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et11/Doobie BVox.aif\" \"/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et11/Doobie Drums.aif\" \"/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et11/Doobie Harp.aif\" \"/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et11/Doobie Lead Vox.aif\" \"/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et11/Doobie Perc.aif\" /var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et11/test.aif", $outarray, $retval);
   echo "$out";
   echo "<BR>retval: $retval<BR>\n";
   echo "<p></p>";
   echo "<p>Compressing test.aif</p>\n";
   $out = exec("/usr/local/bin/lame -f --silent /var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et11/test.aif /var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et11/test.mp3", $outarray, $retval);
   echo "$out";
   echo "<BR>retval: $retval<BR>\n";
   echo "<p></p>";

   echo "<p><A href=\"../ETTRACK/_et11/test.mp3\">MP3 Results</A></p>\n";
   echo "<p><A href=\"../ETTRACK/_et11/test.aif\">AIFF Results</A></p>\n";

//   phpinfo();
//   $out = exec('/var/www/vhosts/innovateshowcontrols.com/httpdocs/etracks/configure');
//   echo "<BR>Huh?<BR>";
//   echo "$out<BR>";
//   echo "what?";
?>
</body>
</html>
