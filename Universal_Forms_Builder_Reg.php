<?php
#
# построитель форм такого вида Universal_Forms_Builder.php
#
### Кнопки тоже вписываются в таблицы; Особенность в NAME='UpdPro'. Первый раз 
# пользователь нажимает кнопку Update, под списком всех строк таблицы,
# например, сотрудников. Предполагается обновление только одной записи.
# В этой форме происходит повторное нажатие "изменить", а обрабатывает
# один и тот же _Handler. Он "должен знать" откуда запрос на обработку. 
#
$button_add               =  "<INPUT TYPE='submit' NAME='Add' STYLE='font-size: 10 pt; 
	 background: font-family: arial,verdana,helvetica,sansserif' VALUE='            ДОБАВИТЬ           '>";
$button_upd               =  "<INPUT TYPE='submit' NAME='UpdPro' STYLE='font-size: 10 pt; 
	 background: font-family: arial,verdana,helvetica,sansserif' VALUE='            ИЗМЕНИТЬ           '>";
###
#    Создаем объекты класса для вывода таблиц, вызываем конструктор
#$handler      = $FormType.'_Handler';          // обработчик настоящей формы
#$headers      = $Table_Headers   [$FormType];  // наименования столбцов таблицe 
#$headers_db   = $Table_Headers_DB[$FormType];  // наименования доменов в таблице 
#                                               // Staff БД и input name's в формах
### Значения Values формируются в FirstKeySearch.php при обновлении
$i=0;
foreach ($headers as $element)
        {
         if  ($operation=='ADD'){ $Value='';               $type0='text';   }
         else                   { $Value=$Values[$i];      $type0='hidden'; }
    	 if (($FormType==$Register)&&($i==0)){
         $element1         =  $Value."<input type='$type0'   required  pattern='[a-zA-Z0-9]+' title='Комбинации букв английского алфавита и цифр.Всего не менее 8.' name ='". $headers_db[$i].
                              "'size=30 minlength=8 maxlength=30   value='".$Value."'>";   	 	
    	 }                                                
    	 if (($FormType==$Register)&&($i==1)){
         $element1         =  "<input type='password' required  pattern='[a-zA-Z0-9]+' title='Комбинации букв английского алфавита и цифр.Всего не менее 8.' name ='". $headers_db[$i].
                              "'size=30 minlength=8 maxlength=30   value='".$Value."'>"; //value='".$$headers_db[$i]."'>";    	 	
    	 }
    	 if (($FormType==$Register)&&(($i==2)||($i==4))){
         $element1         =  "<input type='text' required name ='". $headers_db[$i].
                              "'size=30 minlength=20 maxlength=180   value='".$Value."'>";    	 	
    	 }
    	 if (($FormType==$Register)&&(($i==3))){
         $element1         =  "<input type='text' required name ='". $headers_db[$i].
                              "'size=20 minlength=2 maxlength=20   value='".$Value."'>";    	 	
    	 }
    	 if (($FormType==$Register)&&($i==5)){
         $element1         =  "<input type='tel' required  pattern='^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$' title='Телефоны мобильные и городские с кодом из 3 цифр' name ='". $headers_db[$i].
                              "'size=30 maxlength=30   value='".$Value."'>";    	 	
    	 }
    	 if (($FormType==$Register)&&($i==6)){
         $element1         =  "<input type='email' required title='Электронный адрес' name ='". $headers_db[$i].
                              "'size=30 maxlength=30   value='".$Value."'>";    	 	
    	 }
#                                                                          
	     $Form_view -> AddRowAssArr
    	                     (array($form_headers [0] => $element,
    	                            $form_headers [1] => $element1
    	                            )
    	                      ); 
					  
     	 $i++;                          
        }
//buttons Add 
if ( $operation=='ADD') 
   { 
     $button_del='';
     $Form_view -> AddRowAssArr
    	(array($form_headers [0] => $button_add,
    	       $form_headers [1] => $button_del
    	       )
    	);
   }
#
//button Update
if ($operation=='UPD')
   {
    $button_del='';
    $Form_view -> AddRowAssArr
    	(array($form_headers [0] => $button_upd,
    	       $form_headers [1] => $button_del
    	       )
    	);
   }
# 
/*
if ($operation!=='ADD') {      	 
$Form_view -> AddRowAssArr
    	(array($form_headers [0] => $button_upd ,
    	       $form_headers [1] => $button_view
    	       )
    	); 
}
ТЕЛЕФОНЫ:
По регулярному выражению pattern='^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$' проходят:
+79261234567
89261234567
79261234567
+7 926 123 45 67
8(926)123-45-67
123-45-67
9261234567
79261234567
(495)1234567
(495) 123 45 67
89261234567
8-926-123-45-67
8 927 1234 234
8 927 12 12 888
8 927 12 555 12
8 927 123 8 123
*/
// вывод формы на экран    	     	        
$Form_view ->OutForm($handler); 
?>