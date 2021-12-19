<?php
$filename ="$_SERVER[DOCUMENT_ROOT]/$Main_Folder/htpass";
include  'Pass_Encrypt.php';
$Str_LP   = $$headers_db[0].':'.$$headers_db[1];
$fp       = fopen($filename,"a");
if ($fp   ==false)
    $fp   = fopen($filename,"w");
fputs ($fp,"$Str_LP\n");
fclose($fp);
 
?>
