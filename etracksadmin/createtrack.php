<html>
<head>
<title>Elastictracks Administration - Create Track</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<p><strong>Create Track</strong></p>
<?php
   import_request_variables('gp', 'v_');
   $uploadbase = "/home/httpd/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et";

   // Create Folder .....................................................................
   // set up basic connection
   $conn_id = ftp_connect('www.innovateshowcontrols.com'); 

   // login with username and password
   $login_result = ftp_login($conn_id, 'sh0w23', '#p3ac3'); 

   // check connection
   if ((!$conn_id) || (!$login_result))
      die("FTP connection has failed!");

   if (! ftp_chdir($conn_id, "httpdocs/ETTRACK/_et$v_trackid"))
   { 
      // try to change the directory to somedir
      if (ftp_chdir($conn_id, "httpdocs/ETTRACK"))
      {
         if (ftp_mkdir($conn_id, "_et$v_trackid"))
         {
            echo "<p>Directory Created: _et$v_trackid</p>";
            ftp_site($conn_id, "CHMOD 0777 _et$v_trackid"); 
         }
         else
            die("Couldn't create directory!");
      }
      else
         die("Couldn't change directory!");
   }

   // close the connection
   ftp_close($conn_id);

   // Copy the files ....................................................................
   // Get base file names
//  (RMT-2/5/07) modified to reflect the new path on the server
// $uploaddir = "/home/httpd/vhosts/innovateads.com/httpdocs/_ad$randval/";
   $uploaddir = "/var/www/vhosts/innovateshowcontrols.com/httpdocs/ETTRACK/_et$v_trackid/";
   $sfile = basename($_FILES['audiofile']['name']);

   $uploadfile = $uploaddir . $sfile;
   $srcfile = $_FILES['audiofile']['tmp_name'];

   if (!move_uploaded_file($_FILES['audiofile']['tmp_name'], $uploadfile))
      die("Can't move audio file!");

   // Create database record ............................................................

   $link = mysql_connect('localhost', 'etuser', 'b0st0n') OR DIE("Unable to connect to database!");
   mysql_select_db("etracks", $link) or die("Unable to select database!");

   $query = "Insert into Tracks (trackid, name, titleid) values (NULL, '$sfile', $v_trackid)";
   $result = mysql_query($query) or die("Error adding job to the database");
   mysql_close($link);

   echo "<p>Created track $sfile.</p>\n";

   echo "<p>To return to Edit Title click <A href=\"edittitle.php?id=$v_trackid\">here</A>.</p>\n";
?>
</body>
</html>
