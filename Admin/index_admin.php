﻿<?php
session_start();
#
$Path        = $_SERVER["SCRIPT_URL"];
$Arr         = explode("/",$Path);
$Main_Folder = 'SearchDekanat';
#$Main_Folder = $Arr[1];
#
include($_SERVER["DOCUMENT_ROOT"]."/$Main_Folder/Header.php"); 
$Status    = 'Admin';
$username  = $_SERVER['REMOTE_USER'];
$FormType  ='3_students';              //Пользователи с админом
$KeyValue  = $username;
include($_SERVER["DOCUMENT_ROOT"]."/$Main_Folder/FirstKey_Search.php");
$FIO       = $QueryResult[0][Stud_FIO];
$_SESSION['username'] =$username;
$_SESSION['Status'  ] =$Status;
print '
       <p></p>
       <p></p>       
       <table bgcolor="#999999" border="0" height=8 width="860" cellpadding="1" cellspacing="1" align="center">
           <tr>
              <td align="left"  bgcolor="#FFFFFF">
      ';
print "
       <center> 
               <img src = '../../$Main_Folder/Pictures/lock_gre.gif'>&nbsp;
       </center>
      ";
print "
       <center> 
               <font color='Red' size='4'>
                     КАБИНЕТ АДМИНИСТРАТОРА<br>
               </font>
               <font color='Maroon' size='4'>
                 Добро пожаловать <br> $FIO!<br>
               </font> 

       ";
?>
<br>
Кликнете на эту ссылку, чтобы начать работать с системой. <br>Желаем успехов!
<br>

<br>
<a href="/<?=$Main_Folder?>/View_Table.php?FormType=5_staff">
<strong>
ПРЕПОДАВАТЕЛИ
</strong>
</a>
</p>
<p>
<!--img src = '../../$Main_Folder/Pictures/lock_gre.gif'>&nbsp;//-->
<br>
<a href="/<?=$Main_Folder?>/View_Table.php?FormType=3_students">
<strong>
СТУДЕНТЫ
</strong>
</a>
</p>
<p>
<!--img src = '../../$Main_Folder/Pictures/lock_gre.gif'>&nbsp;//-->
<br>
<a href="/<?=$Main_Folder?>/View_Table.php?FormType=4_groups">
<strong>
ГРУППЫ
</strong>
</a>
</p>
<p>
<!--img src = '../../$Main_Folder/Pictures/lock_gre.gif'>&nbsp;//-->
<br>
<br>
</p>

</td>
 </tr>
</table>
<?php include($_SERVER["DOCUMENT_ROOT"]."/$Main_Folder/Footer.php"); ?>