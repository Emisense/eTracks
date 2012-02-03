<?php
   // Import variables
   import_request_variables('gp', 'v_');

   $file = "/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETIMG/c$v_charid.jpg";
   if (! file_exists($file))
   	$file = "/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETIMG/default.jpg";

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));

   ob_clean();
   flush();
   readfile($file);
?>
