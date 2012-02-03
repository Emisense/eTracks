<?php
   header('Content-type: audio/mpeg');
   header('Content-Disposition: attachment; filename="test.mp3"'); // ' . $rSong->name . '.mp3"');
   header('X-Pad: avoid browser bug');
   Header('Cache-Control: no-cache');

   passthru("/usr/local/bin/sox -V1 -m  \"/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et10/ALT BASS-3.aif\" \"/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et10/DRUMS-0.aif\" \"/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et10/HITS-1.aif\" \"/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et10/SYNTHS-0.aif\" -t AIFF - | /usr/local/bin/lame -f --silent - -", $retval);
?>
