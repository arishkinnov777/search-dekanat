<?php  
####################################################################################
# Модуль выводит на экран содержимое любой таблицы БД                              #
# Входнымv параметрами яляются имя таблицы БД - FormType                           #
#                                                                                  #
####################################################################################
#
session_start();
##############################################
$username       =  $_SESSION['username'];
$Status         =  $_SESSION['Status'  ];
$FIO            =  $_SESSION['FIO'     ];
##############################################
#
$print_view     =  0;
if ($_GET[FormType])
         $FormType=$_GET[FormType]; 
# 
require_once      'DB_Tables_Fields.php';            // Считывает наименования таблиц и полей
require_once      'Any_Table_HTML_New.php';          // Класс для построения отображений таблиц 
require_once      'Table_Headers.php';               // если уже созданы русские заголовки для просмотра
require_once      'Header.php';                      // заголовок для страниц проекта 
require_once      'FormMsgs.php';                    // Заголовки таблиц БД на русском
#
$Row            =  array();                          // Рабочий массив
#
# Класс для работы с базой данных MySQL, описание в теле модуля   
# require_once 'DB_Class.php'. Внутри DB_Tables_Fields.php;
# Объект класса работы с базой данных создается внутри модуля DB_Class.php
# $dbObj  =  new MySQL_DB(DB_HOST, DB_USER, DB_PWD, DB_NAME); 
#
if (($FormType=='3_students')&&($Status!='Admin')){  // Отличается от той что при регистрации
$headers    = $Table_Headers_View[$FormType];        // наименования столбцов таблицe 
$headers_db = $Table_Headers_DB_View[$FormType];     // наименования доменов в таблице 
}                                                    // Пароли показывает только админу
else{	
#
$headers    = $Table_Headers[$FormType];             // наименования столбцов таблицe 
$headers_db = $Table_Headers_DB[$FormType];          // наименования доменов в таблице 
}
#                                                    // БД и <input name's в формах
###
# Создаем объекты класса для вывода таблиц, вызываем конструктор
#
$Table_view =  new HTML_Table($headers , $heard_color); 
#
$Str_Fields = implode(',',$headers_db);
$QueryResult= $dbObj->query("SELECT $Str_Fields FROM $FormType ORDER BY $headers_db[0]");
# возвращает массив ассоциативных массивов (см. класс DB_Class.php)   
# по сути двумерный массив, поэтому используем конструкцию foreach
# это можно увидеть убрав знак # перед print см. ниже. Таким образом
# формируются массивы для вывода на экран для каждой таблицы
#
if ($QueryResult==false)   
   {
    $msg = 'Нет записей в базе данных!';
   }
else              
   {       
    $NA  = count($QueryResult);
    if ($print_view == 1){
    print '<br>$NA     ='.$NA;
    print '<pre>'; print_r($QueryResult); print '</pre>'; 
    print "<br>Str_Fields = $Str_Fields";
    }
   } 
foreach ($QueryResult as $row => $Arr_acc)
    	{
    	 $i=0;	
    	 foreach ($headers_db as $element) 
    	         {
    	 	      $Row = array_merge($Row, array($headers[$i] => $Arr_acc[$headers_db[$i]]) );
    	 	      $i++;
    	 	     }	
    	 $Table_view   ->  AddRowAssArr($Row);
        } 
print "<p></p><font size= \"4\" color= \"blue\" ><strong>$All_Tables_Names_Acc[$FormType]</strong></font>";
$Table_view      ->  PrintArr();
if ($Status=='Admin'){ 
include 'Form_Buttons.php';  
print "<a href='Admin/index_admin.php'>Вернуться в кабинет</a>&nbsp;&nbsp;&nbsp;&nbsp;";      
if ($FormType!='3_students'){    // Добавить студента только через регистрацию
print "<a href='Forms_Main.php?FormType=$FormType&operation=ADD'>Добавить новую запись</a>&nbsp;";
}
}
if ($Status=='User'){ 
print "<br><a href='Students/index_member.php'>Вернуться в кабинет</a>&nbsp;&nbsp;&nbsp;&nbsp;";      
}  

#   
# include 'Footer.php';             // стандартная нижняя строка каждой страницы
#        
?>