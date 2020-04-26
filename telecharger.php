<?php
  
$file="Rapport_PHP.docx";
 
$taille=filesize($file);
header('Content-Type: application/force-download; name="'.$file.'"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: '.$taille);
header('Content-Disposition: attachment; filename="'.$file.'"');
header('Expires: 0');
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');
readfile($file);
exit();
 
?>