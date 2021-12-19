<?php 
####################################################################################
# Модуль выводит на экран универсальную форму для добавления данных в любую таблицу#
# Если модуль вызывается по ссылке href="Forms_Main.php?FormType=6_staff", в этом  #
# случае работает Get.                                                             #
# Построитель форм такого вида Universal_Forms_Builder.php                         #
# Однако модуль может вызываться и в случае обновления данных в таблице            #
#                                                                                  #
####################################################################################
session_start();
##############################################
$username       =  $_SESSION['username'];
$Status         =  $_SESSION['Status'  ];
$FIO            =  $_SESSION['FIO'     ];
##############################################
#
if             ($_GET['FormType'])           
 $FormType    = $_GET['FormType']; 
if             ($_GET['operation']) 
 $operation   = $_GET['operation'];
if ($FormType  =='7_orders'){                // Если заказа, заявки
    $Id_Doc   = $_GET['Id_Doc'];
    $Doc_Name = $_GET['Doc_Name'];
}	
#
include_once   'Main_Site_Settings.php';     // $Main_Folder
include_once   'DB_Tables_Fields.php';       // Скачивает все таблицы и поля БД
include_once   'FormMsgs.php';               // Заголовки таблиц
include_once   'Header.php';                 // Общий заголовок веб-страниц проекта
include_once   'Table_Headers.php';          // Заголовки таблиц и форм таблиц
include_once   'Any_Table_HTML_New.php';     // Класс для построения таблиц по 
                                             // заголовкам и содержанию
if (($FormType  =='7_orders')&&(!$username)){
print "<BR><BR>СНАЧАЛА НЕОБХОДИМО ЗАРЕГИСТРИРОВАТЬСЯ НА САЙТЕ ИЛИ АВТОРИЗОВАТЬСЯ";
exit;
}												 
#
### Если обновление данных, то загружаем запись для обновления. Если модуль      ###
#   вызывается по header с параметрами, то загружаем запись с ключом KeyValue
#
if ($operation=='UPD')
   {
    $KeyValue   = $_GET[KeyValue];
    include      'FirstKey_Search.php';      // выход $msg1 и, если запись найдена то
   }                                         // значения полей $$headers_db[$i]
if ($msg1      =='Запись не найдена в таблице'){
include_once     'Next_Page.php';
}											 
#                                            // обработчик формы обновления или добавления
$handler      = 'Tables_Handler.php?FormType='.$FormType;
if ($operation=='ADD')
$handler      = 'Add_Record.php?FormType='.$FormType; 
#
$headers      = $Table_Headers   [$FormType];// наименования столбцов таблиц 
$headers_db   = $Table_Headers_DB[$FormType];// наименования доменов в таблице 
$head_color   = "silver";                    // Staff БД и input name's в формах
$form_headers = array(' Наименования полей',
                      ' Заносимые или обновляемые данные'
                      );
# Создаем объекты класса для вывода таблиц, вызываем конструктор
#                        
$Form_view    =  new HTML_Table($form_headers  , $head_color);
# Заголовок формы страницы
print    '<p><font color= "red" ><strong>'                 
            .$FormMsgs[$FormType][0].
            '</strong></font>
         </p>';                             // Заголовок формы страницы
#
# построитель простых форм такого вида Universal_Forms_Builder.php
#
include 'Universal_Forms_Builder.php';
?> 
<p></p>
</body>
</html>
