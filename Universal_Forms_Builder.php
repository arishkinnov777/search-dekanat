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
#                                               
### Значения Values формируются в FirstKeySearch.php при обновлении
$Id_Order   = time();
$Order_Date = date('Y-m-d');
$i=0;
foreach ($headers as $element)
        {
         if  ($operation=='ADD'){ $Value='';               $type0='text';   }
         else                   { $Value=$Values[$i];      $type0='hidden'; }			
         $element1         =  "<input type='text'    name ='". $headers_db[$i].
                              "'size=140 maxlength=250 value='".$Value."'>";	
                                                // наименования доменов в таблице 
#                                               // Staff БД и input name's в формах 
         if (($FormType=='7_orders')&&($i==0)){
			$element1         =  $Id_Order."<input type='hidden'  name ='$headers_db[$i]' value='$Id_Order'>";
		 }
         if (($FormType=='7_orders')&&($i==1)){
			$element1         =  $Order_Date."<input type='hidden'  name ='$headers_db[$i]' value='$Order_Date'>";
		 }		 
         if (($FormType=='7_orders')&&($i==2)){
			$element1         =  $Id_Doc."<input type='hidden'  name ='$headers_db[$i]' value='$Id_Doc'>";
		 }
         if (($FormType=='7_orders')&&($i==3)){
			$element1         =  $Doc_Name."<input type='hidden'  name ='$headers_db[$i]' value='$Doc_Name'>";
		 }	
         if (($FormType=='7_orders')&&($i==4)){
			$element1         =  $username."<input type='hidden'  name ='$headers_db[$i]' value='$username'>";
		 }
         if (($FormType=='7_orders')&&($i==5)){
			$element1         =  $FIO."<input type='hidden'  name ='$headers_db[$i]' value='$FIO'>";
		 }				 
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
// вывод формы на экран    	     	        
$Form_view ->OutForm($handler); 
?>