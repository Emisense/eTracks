<html>
<head>
<title>Elastictracks Administration - Create Mix</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<p><strong>Elastictracks Mix Creation</strong></p>
<?php

   // Create database record ............................................................
   // Import variables
   import_request_variables('gp', 'v_');

   $link = mysql_connect('localhost', 'etuser', 'b0st0n') OR DIE("Unable to connect to database!");
   mysql_select_db("etracks", $link) or die("Unable to select database!");

   $query = "Update Mixes Set `group`='$v_mgroup', `name`='$v_mname', track1=$v_mtrack1, level1=$v_mlevel1, track2=$v_mtrack2, level2=$v_mlevel2, track3=$v_mtrack3, level3=$v_mlevel3, track4=$v_mtrack4, level4=$v_mlevel4, track5=$v_mtrack5, level5=$v_mlevel5, track6=$v_mtrack6, level6=$v_mlevel6, track7=$v_mtrack7, level7=$v_mlevel7, track8=$v_mtrack8, level8=$v_mlevel8, track9=$v_mtrack9, level9=$v_mlevel9, track10=$v_mtrack10, level10=$v_mlevel10, track11=$v_mtrack11, level11=$v_mlevel11, track12=$v_mtrack12, level12=$v_mlevel12, track13=$v_mtrack13, level13=$v_mlevel13, track14=$v_mtrack14, level14=$v_mlevel14, track15=$v_mtrack15, level15=$v_mlevel15, track16=$v_mtrack16, level16=$v_mlevel16, " .
   "track17=$v_mtrack17, level17=$v_mlevel17, track18=$v_mtrack18, level18=$v_mlevel18, track19=$v_mtrack19, level19=$v_mlevel19, track20=$v_mtrack20, level20=$v_mlevel20, track21=$v_mtrack21, level21=$v_mlevel21, track22=$v_mtrack22, level22=$v_mlevel22, track23=$v_mtrack23, level23=$v_mlevel23, track24=$v_mtrack24, level24=$v_mlevel24, effect1=$v_meffect1,  effect2=$v_meffect2, effect3=$v_meffect3 Where mixid=$v_mixid";
   $result = mysql_query($query) or die("Error adding mix to the database");
   mysql_free_result($result);

   $query = "Select * from Mixes Where mixid=$v_mixid";
   $result = mysql_query($query) or die("Unable to query database");
   $recordcount = mysql_num_rows($result);
   if ($recordcount != 0)
   {
     $job = mysql_fetch_row($result);
     $id = $job[0];
     $group = $job[2];
     $name = $job[3];

     $trackcount = 0;
     for ($n=0 ; $n<24 ; $n++)
        if ($job[($n*2)+4] && $job[($n*2)+5])
           $trackcount++;

     echo "track count: $trackcount<BR>";

     if ($trackcount != 0)
     {
/*
        $basefilename = "/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et$v_id";
        $destinationname "/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_m$id.aif";
*/
        // Construct command line string
        $cmd = "/usr/local/bin/sox ";
        if ($trackcount > 1)
           $cmd = $cmd . "-m ";

        // append volumes and files
        for ($n=0 ; $n<24 ; $n++)
        {
           if ($job[($n*2)+4] && $job[($n*2)+5])
           {
              $vol = $job[($n*2)+5] / 100.0;

              $tid = $job[($n*2)+4];
              mysql_free_result($result);
              $query = "Select * from Tracks Where trackid='$tid'";
              $result = mysql_query($query) or die("Unable to query database");
              $recordcount = mysql_num_rows($result);
              if ($recordcount != 0)
              {
                 $track = mysql_fetch_row($result);
                 $tname = $track[1];
                 $cmd = $cmd . "-v $vol ";
                 $cmd = $cmd . "\"/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et$v_titleid/$tname\" ";
              }
           }
        }
        // Add destination file
        $cmd = $cmd . "/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETMIX/_m$id.aif ";

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
        }

        // Add effects
        switch ($v_meffect3)
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
        }

//        echo "<br>$cmd<br>";

        $out = exec($cmd, $outarray, $retval);
        if ($retval != 0)
        {
           mysql_free_result($result);
           $query = "Delete from Mixes where mixid = $id Limit 1";
           $result = mysql_query($query) or die("Error removing mix from the database");
           echo "<BR>Error creating Mix file! (ret: $retval)<BR>";
        }
        else
           echo "<P>Updated '$group - $name' (MixID: $id).</p>";
        echo "<p>To return to Title click <A href=\"edittitle.php?id=$v_titleid\">here</A>.\n";
     }
     else
     {
        mysql_free_result($result);
        $query = "Delete from Mixes where mixid = $id Limit 1";
        $result = mysql_query($query) or die("Error removing mix from the database");
        echo "<BR>No Tracks are set to a level! Mix creation aborted!<BR>";
        echo "<p>To return to Title click <A href=\"edittitle.php?id=$v_titleid\">here</A>.\n";
     }
   }
   else
      echo "<BR>Unexpected error creating title.<BR>";
   mysql_free_result($result);
   mysql_close($link);
?>
</body>
</html>
