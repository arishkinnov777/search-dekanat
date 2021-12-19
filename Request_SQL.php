<?php
//   require_once 'DB_Tables_Fields.php';
     $Str1=$SQL_String1[$FormType]; 
//   $Str2=$SQL_String2[$FormType];
     $QueryResult = $dbObj->query("INSERT INTO $FormType
                                  (
                                    $Str1
 
                                  ) 
                            values                   
                                  (
                                    $Str2
 
                                  )"
                                 );
//print "$Str1<br>";
//print "$Str2<br>";                  
?>
