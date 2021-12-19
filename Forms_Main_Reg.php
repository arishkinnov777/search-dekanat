<?php 
####################################################################################
# Модуль выводит на экран форму для добавления данных в любую таблицу              #
# Если модуль вызывается по ссылке href="Forms_Main.php, header, include           #
# Однако модуль может вызываться и в случае обновления данных в таблице, тогда     #
# В данной версии вызывается по header для обновления данных. В свою очередь       #
# вызывается построитель форм такого вида Universal_Forms_Builder.php              #
####################################################################################
#
if           ($_GET['FormType' ])            // Если параметр по GET
 $FormType =  $_GET['FormType' ]; 
if           ($_GET['operation']) 
 $operation = $_GET['operation']; 
require_once 'DB_Tables_Fields.php';         // загружает все данные по таблицам и полям БД  

#
### Если обновление данных, то загружаем запись для обновления. Если модуль      ###
#   вызывается по header с параметрами, то загружаем запись с ключом KeyValue
#
if ($_GET["operation"]=='UPD')
   {
    $KeyValue   = $_GET[KeyValue];
    include      'FirstKey_Search.php';      // выход $msg1 и, если запись найдена то
   }                                         // значения полей $$headers_db[$i]
if ($msg1      =='Запись не найдена в таблице'){
include_once     'Next_Page.php';
}
#
require_once     'FormMsgs.php';             // Заголовки таблиц БД на экране
#
include_once     'Header.php';               // Общий заголовок - в этом проекте отдельно
include_once     'Table_Headers.php';        // Заголовки доменов таблиц и форм таблиц
# Table_Headers_DB формируется программой 'DB_Tables_Fields.php'
#
include_once     'Any_Table_HTML_New.php';   // Класс для построения таблиц по 
                                             // заголовкам и содержанию
#
$handler      = 'Tables_Handler.php?FormType='.$FormType;
if ($operation=='ADD')
$handler      = 'Add_Record.php?FormType='.$FormType; 
                                             // обработчик настоящей формы
#$handler     = $FormType.'_Handler';        // обработчик настоящей формы
$headers      = $Table_Headers   [$FormType];// наименования столбцов таблиц 
$headers_db   = $Table_Headers_DB[$FormType];// наименования доменов в таблице 
#
$head_color   = "silver";                    // пока не работает
$form_headers = array(' Наименования <br> полей',
                      ' Заносимые или обновляемые данные'
                      );
# Создаем объекты класса для вывода таблиц, вызываем конструктор
#                        
$Form_view   =  new HTML_Table($form_headers  , $head_color);
# Заголовок формы страницы
/*
print    '<p><font color= "red" ><strong>'                 
            .$FormMsgs[$FormType][0].
            '</strong></font>
         </p>';                             // Заголовок формы страницы
*/		 
#
# построитель простых форм такого вида Universal_Forms_Builder.php
#
include 'Universal_Forms_Builder_Reg.php';
?> 
<p></p>

