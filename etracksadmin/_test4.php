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
   echo "<p>Mixing SOS 20% fast</p>\n";
   $out = exec("/usr/local/bin/sox -m  \"/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et10/BASS-2.aif\" \"/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et10/DRUMS-0.aif\" \"/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et10/HITS-1.aif\" \"/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et10/SYNTHS-0.aif\" /var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et10/test.aif speed 1.3", $outarray, $retval);
   echo "$out";
   echo "<BR>retval: $retval<BR>\n";
   echo "<p></p>";
   echo "<p>Compressing test.aif</p>\n";
   $out = exec("/usr/local/bin/lame -f --silent /var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et10/test.aif /var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et10/test.mp3", $outarray, $retval);
   echo "$out";
   echo "<BR>retval: $retval<BR>\n";
   echo "<p></p>";

   echo "<p><A href=\"../ETTRACK/_et10/test.mp3\">MP3 Results</A></p>\n";
   echo "<p><A href=\"../ETTRACK/_et10/test.aif\">AIFF Results</A></p>\n";

//   phpinfo();
//   $out = exec('/var/www/vhosts/innovateshowcontrols.com/httpdocs/etracks/configure');
//   echo "<BR>Huh?<BR>";
//   echo "$out<BR>";
//   echo "what?";
?>
</body>
</html>
