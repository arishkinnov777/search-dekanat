<?php
$Table_Headers = 
Array
(
    '1_fakultet' => Array                            # Данные заполняет администратор #
        (
            'НОМЕР (КОД)'                    ,      # [0]  => Id_Fak
            'НАИМЕНОВАНИЕ'                   ,      # [1]  => Fak_Name
            'ЗАВЕДУЮЩИЙ'                     ,      # [2]  => Fak_Chif              
            'ЛОКАЛИЗАЦИЯ'                    ,      # [3]  => Fak_Location
            'ТЕЛЕФОН'                        ,      # [4]  => Fak_Phone
            'ЭЛЕКТРОННЫЙ АДРЕС'              ,      # [5]  => Fak_EMail
            'ВРЕМЯ РАБОТЫ'                   ,      # [6]  => Fak_Time
        ),  
 
    '2_kafedry' => Array                            # Данные заполняет администратор #
        (
            'НОМЕР (КОД)      '              ,      # [0]  => Id_Kaf    
            'НАИМЕНОВАНИЕ'                   ,      # [1]  => Kaf_Name  
            'ЗАВЕДУЮЩИЙ'                     ,      # [2]  => Kaf_Zav
            'ЛОКАЛИЗАЦИЯ'                    ,      # [3]  => Kaf_Location
            'ТЕЛЕФОН'                        ,      # [4]  => Kaf_Phone
            'ЭЛЕКТРОННЫЙ АДРЕС'              ,      # [5]  => Kaf_EMail
            'ВРЕМЯ РАБОТЫ'                   ,      # [6]  => Kaf_Time
            'ФАКУЛЬТЕТ'                             # [7]  => Id_Fak                                   
        ),

    '3_students' => Array                           # Данные студент при регистрации #
        (                                           
            'ЛОГИН<br>( ИЛИ СТУДБИЛЕТ)<span class="required">*</span>'    ,      # [0]  => Id_Stud
            'ПАРОЛЬ                   <span class="required">*</span>'    ,      # [1]  => Stud_Pass			
            'Ф И О                    <span class="required">*</span>'    ,      # [2]  => Stud_FIO
            'ГРУППА                   <span class="required">*</span>'    ,      # [3]  => Stud_Group
            'АДРЕС                    <span class="required">*</span>'    ,      # [4]  => Stud_Address
            'ТЕЛЕФОН                  <span class="required">*</span>'    ,      # [5]  => Stud_Phone
            'ЭЛЕКТРОННЫЙ <br>АДРЕС    <span class="required">*</span>'    ,      # [6]  => Stud_Email
        ),
    '4_groups' => Array                             # Данные заполняет администратор #
        (
            'НОМЕР (КОД)      '              ,      # [0]  => Id_Gr    
            'ФАКУЛЬТЕТ'                      ,      # [1]  => Id_Fak  
            'СПЕЦИАЛЬНОСТЬ'                  ,      # [2]  => Gr_Special
            'СТАРОСТА'                       ,      # [3]  => Gr_Chif
            'ТЕЛЕФОН'                        ,      # [4]  => Gr_Phone
            'ЭЛЕКТРОННЫЙ АДРЕС'              ,      # [5]  => Gr_Email
            'КОЛИЧЕСТВО СТУДЕНТОВ'           ,      # [6]  => Gr_Number
        ),
    
    '5_staff' => Array                              # Данные заполняет администратор #
        (                                           
            'КОД (НОМЕР ПРОПУСКА)'           ,      # [0]  => Id_Staff
            'ФАКУЛЬТЕТ'                      ,      # [1]  => Id_Fak
            'Ф И О'                          ,      # [2]  => Staff_FIO
            'ДОЛЖНОСТЬ'                      ,      # [3]  => Staff_Doljnost
            'ТЕЛЕФОН'                        ,      # [4]  => Staff_Phone
            'ЭЛЕКТРОННЫЙ АДРЕС'              ,      # [5]  => Staff_Email
            'ГОД НАЧАЛА РАБОТЫ'              ,      # [6]  => Staff_Year
            'СПЕЦИАЛЬНОСТЬ'                  ,      # [7]  => Staff_Special
        ), 
    '6_docs' => Array                              # Данные заполняет администратор #
        (                                           
            'КОД ЗАЯВКИ'                     ,      # [0]  => Id_Doc
            'НАИМЕНОВАНИЕ'                   ,      # [1]  => Doc_Name
            'ОФОРМИТЬ ЗАЯВКУ'                ,      # [2]  => Doc_Link
            'ИНФОРМАЦИЯ О ДОКУМЕНТЕ'         ,      # [2]  => Doc_Inf
        ), 
    '7_orders' => Array                             # Данные заполняет полльзователем #
        (                                           
            'КОД ЗАЯВКИ'                     ,      # [0]  => Id_Order
			'ДАТА ЗАЯВКИ'                    ,      # [1]  => Doc_Date
            'КОД ДОКУМЕНТА'                  ,      # [0]  => Id_Doc			
            'НАИМЕНОВАНИЕ'                   ,      # [2]  => Doc_Name
            'ЛОГИН<br>( ИЛИ СТУДБИЛЕТ)'      ,      # [5]  => Id_Stud
            'Ф И О'                          ,      # [6]  => Stud_FIO			
        ) 		
);
$Table_Headers_View = 
Array
(
    '3_students' => Array                           # Данные студентов при просмотре #
        (                                           
            'ЛОГИН<br>( ИЛИ СТУДБИЛЕТ)' ,           # [0]  => Id_Stud
            'Ф И О'                     ,           # [2]  => Stud_FIO
            'ГРУППА'                    ,           # [3]  => Stud_Group
            'АДРЕС'                     ,           # [4]  => Stud_Address
            'ТЕЛЕФОН'                   ,           # [5]  => Stud_Phone
            'ЭЛЕКТРОННЫЙ'               ,           # [6]  => Stud_Email
        ),
);
$Table_Headers_DB_View = 
Array
(
    '3_students' => Array                           # Данные студентов при просмотре #
        (                                           
            'Id_Stud'     ,
            'Stud_FIO'    ,
            'Stud_Group'  ,
            'Stud_Address',
            'Stud_Phone'  ,
            'Stud_Email'  ,
        ),
);
#                                    
#                                                      
# This is my advanced idea for the next version: 
# Should be loop for the   $Table_Headers_DB like this
# $Table_Headers_DB ($FormTypes[$i], headers_DB[$i]) 
# and  headers_DB[$i] - two dim array 
# 
# This is not correct array construction !!!
# PHP5 print_r print in this view (without "'" and ","
#
#$A=array
#(
#  [0]=>array
#     (
#      [0]=>'a0',
#      [1]=>'b0'
#     ),
#  [1]=>array
#     (
#      [0]=>'a1',
#      [1]=>'b1'
#     )
#);  
?>                      
                   
                 
