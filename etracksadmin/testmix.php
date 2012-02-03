<?php
   header("Pragma: public");
   header("Expires: 0");
   header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
   header("Cache-Control: public"); 
   header("Content-Description: File Transfer");
   header('Content-type: audio/mpeg');
   header('Content-Disposition: attachment; filename="test.mp3"');

   // Import variables
   import_request_variables('gp', 'v_');

   $cmd = "/usr/local/bin/lame -f --silent /var/www/vhosts/innovateshowcontrols.com/httpdocs/ETMIX/_m$v_mid.aif -";
   passthru($cmd, $retval);
?>
