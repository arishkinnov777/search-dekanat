<?php 
####################################################################################
# Модуль выводит на экран содержимое базы данных, любых таблиц                     #
#                                                                                  #
####################################################################################
#
if ($_GET[FormType])
$FormType     = $_GET[FormType];
$dbtable      = $FormType;
#
$Arr_acc      =  array();
$Row          =  array();
require_once 'DB_Tables_Fields.php';                 // скачивает все наименования таблиц и полей
#                                                    // Table_Headers_DB имена таблиц здесь
require_once 'Main_Site_Settings.php';               // $Main_Folder
require_once 'FormMsgs.php';                         // Заголовки всех таблиц  на экране
require_once 'Any_Table_HTML_New.php';               // Класс построения таблиц по заголовкам и содержанию таблиц
include_once 'Table_Headers.php';                    // Заголовки полей
$headers      = $Table_Headers   [$FormType];        // наименования столбцов таблицe 
$headers_db   = $Table_Headers_DB[$FormType];        // наименования доменов в таблице 
#                                                    // БД и <input name's в формах
# Создаем объекты класса для вывода таблиц, вызываем конструктор
#
$head_color   = 'silver';
$Table_view   =  new HTML_Table($headers , $heard_color);
#
# Объект класса работы с базой данных создается внутри модуля DB_Class.php
//$dbObj                 =  new MySQL_DB(DB_HOST, DB_USER, DB_PWD, DB_NAME); 
#
#include 'Client_form_valid.php  // проверяет введенные данные
#************************ Добавление Обновление **************************
#
#    Добавление записи в таблицу БД. Данные передаются методом POST из 
# Forms_Main.php. Нажата кнопка Добавить.
# При обновлениии данных, просто удаляется предыдущая и заносится новая.
#    Кнопки тоже вписываются в таблицы; Особенность в NAME='UpdPro'Первый раз 
# пользователь нажимает кнопку Update, под списком всех строк таблицы,
# например, сотрудников. Предполагается обновление только одной записи.
# А в форме Forms_Main происходит повторное нажатие "изменить", обрабатывает
# один и тот же _Handler. Он "должен знать" откуда запрос на обработку. 
#
if ((isset($_POST["Add"]))||(isset($_POST["UpdPro"])))
   { 
   	                                           // "UpdPro" - это после обновления                       
     $i=0;                                     // данных в форме Forms_Main.php
   	 foreach ($headers_db as $element)
   	 {
   	  $$headers_db[$i] = $_POST[$headers_db[$i]];	
   	  // first key forming	Это предыдущий вариант системы Здесь не используем
   	  //if ($FormType=='Questions'){$$headers_db[0]=$_POST[$headers_db[2]].$_POST[$headers_db[4]].$_POST[$headers_db[1]];}	
   	  $Str2.=",'".$$headers_db[$i]."'";
   	  $i++;	
   	 }
   	 $Str2=substr($Str2,1);
     $$headers_db[0]  = substr($$headers_db[0],0,10);    // в первой колонке всегда первичный ключ 
     if (isset($_POST["UpdPro"]))
        {
         $KeyName = $headers_db[0];
         $KeyValue= $$headers_db[0];	
    	 $Del     = $dbObj->query("DELETE FROM $dbtable WHERE $KeyName='$KeyValue'");
	 	 if ($Del == false) $msg1= 'Ошибка обновления данных! ';
        }
 	    include 'Request_SQL.php';                      //The result in $QueryResult 
    if ($QueryResult==1)  
	   {
		$msg1  = 'Новые данные успешно добавлены '; 
        if (($FormType==$Register)||($FormType=='teachers')){
		$Key=$KeyValue;                                // еще удаляем и перезависываем логин-пароль
		$filename     = 'htpass';
		include 'Del_File_Record.php';
        include 'Add_Record_Htpass.php';               // Добавляется Погин:Пароль в htpass
        }		
		include 'View_Table.php';                      // Показываем так, а не этой программой
		exit;
	   }
    else                  $msg1  = "При вводе данных произошла ошибка! 
                                    Данные уже есть в таблице ";
//  echo                $msg1;
  } 

#******************************* Поиск-Удаление ********************************
# Если данные передаются методом POST из _Handler.php при нажатии кнопки "Найти",
# то только записи соответствующие ввденному ключу будут надены и выданы на экран 
# в данном примере
#
if ( ($_POST["Delete"])||($_POST["Update"]) )
   {
     $KeyValue = $_POST["$headers_db[0]"];
   } 
#             
### запрос на выдачу всей таблицы или результата поиска, если поиска нет
if (!$KeyValue)
   {
   	 $KeyName     = $headers_db[0];
     $QueryResult = $dbObj->query("SELECT * FROM $dbtable ORDER BY '$KeyName' ");
   }
### если поиск с целью удаления или обновления  
else
   {
   	 $KeyName         = $headers_db[0];
	 $QueryResult     = $dbObj->query("SELECT * FROM $dbtable WHERE $KeyName ='$KeyValue' ORDER BY '$KeyName' ");
	 if ($QueryResult==false)
	    {
	     $msg1        ='Запись не найдена в таблице';
	     $QueryResult = $dbObj->query("SELECT * FROM $dbtable ORDER BY '$KeyName' ");
	    }
	 else
	    {
	     if ($_POST["Delete"]){	
	 	     $del  = $dbObj->query("DELETE FROM $dbtable WHERE $KeyName='$KeyValue'");
	 	     if ($del != false) $msg1= 'Запись удалена ';
	               header("Location: ".$DOCUMENT_ROOT."/$Main_Folder/View_Table.php?FormType=$FormType&msg1=$msg1");
                   exit;
		    }
         if  ($_POST["Update"]){
              if  ($FormType==$Register){
	               header("Location: ".$DOCUMENT_ROOT."/$Main_Folder/Reg_Frame_Upd.php?FormType=$FormType&operation=UPD&KeyValue=$KeyValue&msg1=$msg1"); 
                 //header("Location: http://www.diofant.com/ShopComp/Forms_Main_Frame.php?FormType=$FormType&operation=UPD&KeyValue=$KeyValue&msg1=$msg1");		 
                  }		 
              else{
	               header("Location: ".$DOCUMENT_ROOT."/$Main_Folder/Forms_Main.php?FormType=$FormType&operation=UPD&KeyValue=$KeyValue&msg1=$msg1"); 
                  }	
	              exit;
            }			
	    }
   }
# возвращает массив ассоциативных массивов (см. класс DB_Class.php)   
# по сути двумерный массив, поэтому используем конструкцию foreach
# это можно увидеть убрав знак # перед print см. ниже. Таким образом
# формируются массивы для вывода на экран, даже если таблица состоит
# из одной строки (как в случае поиска)
#
if ($QueryResult==false)  
   {
    $msg = 'Нет записей в базе данных!';
   }
else              
   {       
    $NC  = count($QueryResult);
  //print '<br>$NC='.$NC;
  //print '<pre>'; print_r($QueryResult); print '</pre>'; 
   }        
foreach ($QueryResult as $row    => $Arr_acc)
    	{
    	 $i=0;	
    	 foreach ($headers_db as $element) 
    	         {
    	 	      $Row = array_merge($Row, array($headers[$i] => $Arr_acc[$headers_db[$i]]) );
    	 	      $$headers_db[$i] = $Arr_acc[$headers_db[$i]];
    	 		  $i++;
    	 	     }	
    	 $Table_view ->  AddRowAssArr($Row);
        }
#                     
include'Header.php';                // общий заголовок для всех страниц проекта 
print "<p></p><font color='blue'><strong>$All_Tables_Names_Acc[$FormType]</strong>&nbsp$msg1&nbsp</font>";
$Table_view -> PrintArr();          // таблица 'Staff' - все назначения на текущий момент
if ($Staff_Search){
    include 'Form_Buttons_Staff.php';
    exit;	
}

if (!$KeyValue){
	include 'Form_Buttons.php';     // простая форма для работы с таблицей; с кнопками 
}                                   // удаления,поиска, обновл.,если просмативается вся таблица
if ($FormType!=$Register){          // Эти данные добавляются через регистрацию
//print '<p><a href="All_Tables.php">Просмотр структуры всех таблиц</a>';
print "<a href=\"Forms_Main.php?formtype=$FormType\">Добавить новую запись</a>";
//print '&nbsp&nbsp&nbsp<a href="Tables_Handler.php?staffsearch=Yes">Расширенный поиск</a></p>';
}
include 'Footer.php';               // стандартная нижняя строка каждой страницы
#        
?>