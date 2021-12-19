<?php 
####################################################################################
# Модуль производит поиск по полю - Id                                             #
#                                                                                  #
####################################################################################
#
$print_firstkey         = 0;  
$Arr_w                  = array();
$Row_w                  = array();
$dbtable                = $FormType;
#
# в ранних версиях был файл require_once 'Table_Headers_DB.php';
# Заголовки всех таблиц БД проекта, на английском формируются динамически
require_once 'DB_Tables_Fields.php';
#                 
# Класс для построения таблиц по заголовкам и содержанию таблиц
require_once 'Any_Table_HTML_New.php';

# Класс для работы с базой данных MySQL, описание в теле модуля   
require_once 'DB_Class.php';             
# 
# Заголовки всех таблиц веб проекта, которые появляются на экране 
include_once 'Table_Headers.php';
#
# Так мы делаем софт более независимым от конкретных таблиц БД
#
$headers    = $Table_Headers   [$FormType];// наименования столбцов таблицe 
$headers_db = $Table_Headers_DB[$FormType];// наименования доменов в таблице 
#                                          // БД и <input name's в формах
# Создаем объекты класса для вывода таблиц, вызываем конструктор
#$handler     = $FormType.'_Handler';      // обработчик настоящей формы

#
# Объект класса работы с базой данных создается внутри модуля DB_Class.php
//$dbObj                 =  new MySQL_db(DB_HOST, DB_USER, DB_PWD, DB_NAME); 
#
#include 'Client_form_valid.php  // проверяет введенные данные

#******************************* Поиск ключу ********************************
$KeyName         = $headers_db[0];
$QueryResult     = $dbObj->query("SELECT * FROM $dbtable WHERE $KeyName ='$KeyValue' ORDER BY '$KeyName' ");
if ($QueryResult==false)
   {
    $msg1        ='Запись не найдена в таблице';
//  $QueryResult = $dbObj->query("SELECT * FROM $FormType ORDER BY '$KeyName' ");
   }
else 
   {
    if ($print_firstkey==1){
    print '<br>Запись найдена в базе данных';
    print '<pre>'; 
    print_r($QueryResult); 
    print '</pre>'; 
    } 
   }
$i=0;   
foreach ($headers_db as $element) 
    	{
    	 $$headers_db = $QueryResult[0][$element];
		 $Values[]    = $$headers_db;	
    	 $i++;
    	}
if ($print_firstkey==1){		
    print '<pre>'; 
    print_r($Values); 
    print '</pre>'; 
}	
print $msg1;       
?>