<?php
//$filename     = "$_SERVER[DOCUMENT_ROOT]/Control_FileSystem/$Folder_Name/$File_Name";
if (($Key == "")||(!$Key))
{
print '*** ПЕРВИЧНЫЙ ЗАПИСИ КЛЮЧ НЕ ОПРЕДЕЛЕН *****************<BR>';
print "Key=$Key";
exit(); 	
}
if (file_exists($filename))                   // Если такой файл есть в папке
   {                                          // Файл в массив $Row построчно
    $Row    = file($filename);                // поля разделяются символом " : "
    $NumbStr= count($Row);                    // количество строк в массиве
    //print '*** ФАЙЛ НАЙДЕН В ПАПКЕ ProjFiles *****************<BR>'; 
    //print "*** КОЛИЧЕСТВО ЗАПИСЕЙ В ФАЙЛЕ NumbStr=$NumbStr*******<br>"; 
   }
else 
   {
    //print '*** ФАЙЛ НЕ НАЙДЕН В ПАПКЕ ProjFiles *****************<BR>'; 
    //print "*** КОЛИЧЕСТВО ЗАПИСЕЙ В ФАЙЛЕ NumbStr=$NumbStr**********<br>"; 
   }   
#
### Находим в массиве состоящего из строк файла запись с нужным ключом
# 
if ($NumbStr >= 1) 
   {                                          // проверяем, если есть хотя бы одна запись
   	 $i=0;                                    // запись файла, это строка с разделителем ':'
   	 while ($i<=$NumbStr-1) {                 // проверка всех записей на наличие
   	 	 $Arr=explode(':',$Row[$i]);          // такого ключа
   	 	 if ($Arr[0]==$Key){                  // $Arr[0] - первичный ключ записи файла 
   	 	     $msg1  = "<br>*** ДАННЫЕ С ТАКИМ КЛЮЧОМ ЕСТЬ В ФАЙЛЕ $File_Name ";
   	 	     $index =$i;                      // индекс элемента массива для удаления
   	 	     break; 
   	 	    }
   	 $i++;	     
   	 }
   	 if ($i==$NumbStr){
   	 	     $msg1  = "<br>*** ДАННЫХ С ТАКИМ КЛЮЧОМ НЕТ  В ФАЙЛЕ $File_Name************** ";
   	 }
   }
else 
   {
   	 	     $msg1  = "<br>*** НЕТ НИ ОДНОЙ ЗАПИСИ В ФАЙЛЕ $File_Name************** ";   
   	 	     //exit ();		
   }
//echo         $msg1;   
#
### Находим и удаляем элемент из массива с требуемым первичным ключом
# 
if ($index){   	
    $fp=fopen($filename,"w");
    for($i=0;$i<sizeof($Row);$i++)
       {
        if($i==$index)
          {
           unset($Row[$index]);
           //print " <br>************** ИНДЕКС УДАЛЕННОЙ ЗАПИСИ ФАЙЛА (НОМЕР от 0 до N) Index=$index **************";
          }
       }
}       
#
### Перезаписываем массив в файл
# 
fputs($fp,implode("",$Row));
fclose($fp);
$NumbStr--;
//include 'View_File_Records.php'
?> 