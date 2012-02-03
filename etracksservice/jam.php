<?php
   // Import variables
   import_request_variables('gp', 'v_');

   $mixcount = 0;
   if ($v_mix1 != 0)
         $mixcount++;
   if ($v_mix2 != 0)
         $mixcount++;
   if ($v_mix3 != 0)
         $mixcount++;
   if ($v_mix4 != 0)
         $mixcount++;
   if ($v_mix5 != 0)
         $mixcount++;
   if ($v_mix6 != 0)
         $mixcount++;

   if ($mixcount == 0)
      die("No tracks to jam with!");

   header("Pragma: public");
   header("Expires: 0");
   header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
   header("Cache-Control: public"); 
   header("Content-Description: File Transfer");
   header('Content-type: audio/mpeg');
   header('Content-Disposition: attachment; filename="test.mp3"');

   // Construct command line string
   $cmd = "/usr/local/bin/sox -V1 ";
   if ($mixcount > 1)
      $cmd = $cmd . "-m ";

   if ($v_mix1 != 0)
   {
      $vol = $v_level1 / 100.0;
      $cmd = $cmd . "-v $vol ";
      $cmd = $cmd . "/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETMIX/_m$v_mix1.aif ";
   }   
   if ($v_mix2 != 0)
   {
      $vol = $v_level2 / 100.0;
      $cmd = $cmd . "-v $vol ";
      $cmd = $cmd . "/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETMIX/_m$v_mix2.aif ";
   }   
   if ($v_mix3 != 0)
   {
      $vol = $v_level3 / 100.0;
      $cmd = $cmd . "-v $vol ";
      $cmd = $cmd . "/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETMIX/_m$v_mix3.aif ";
   }   
   if ($v_mix4 != 0)
   {
      $vol = $v_level4 / 100.0;
      $cmd = $cmd . "-v $vol ";
      $cmd = $cmd . "/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETMIX/_m$v_mix4.aif ";
   }   
   if ($v_mix5 != 0)
   {
      $vol = $v_level5 / 100.0;
      $cmd = $cmd . "-v $vol ";
      $cmd = $cmd . "/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETMIX/_m$v_mix5.aif ";
   }   
   if ($v_mix6 != 0)
   {
      $vol = $v_level6 / 100.0;
      $cmd = $cmd . "-v $vol ";
      $cmd = $cmd . "/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETMIX/_m$v_mix6.aif ";
   }   

   $cmd = $cmd . "-t AIFF - ";

        // Add effects
        switch ($v_meffect1)
        {
           case 1:
              $cmd = $cmd . "reverb ";
              break;

           case 2:
              $cmd = $cmd . "flanger ";
              break;

           case 3:
              $cmd = $cmd . "phaser ";
              break;

           case 4:
              $cmd = $cmd . "echo 1.0 .6 200 .25 ";
              break;

           case 5:
              $cmd = $cmd . "echo .98 .7 1000 .2 ";
              break;
           
           case 6:
              $cmd = $cmd . "reverse ";
              break;
        }

        // Add effects
        switch ($v_meffect2)
        {
           case 1:
              $cmd = $cmd . "reverb ";
              break;

           case 2:
              $cmd = $cmd . "flanger ";
              break;

           case 3:
              $cmd = $cmd . "phaser ";
              break;

           case 4:
              $cmd = $cmd . "echo 1.0 .6 200 .25 ";
              break;

           case 5:
              $cmd = $cmd . "echo .98 .7 1000 .2 ";
              break;

           case 6:
              $cmd = $cmd . "reverse ";
              break;
        }

   if ($v_speed == 0)
      $v_speed = 1.0;

   if ($v_speed != 1.0)
      $cmd = $cmd . "speed $v_speed ";

   $cmd = $cmd . "| /usr/local/bin/lame -f --silent - -";
   passthru($cmd, $retval);
?>
