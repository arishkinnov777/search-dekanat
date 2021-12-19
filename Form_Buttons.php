<!--без таблиц //--> 
<p></p>
  <form action='Tables_Handler.php?FormType=<?=$FormType?>' method='post'>
   <strong>Введите Id код для удаления или обновления&nbsp;</strong>      
    <input type="text"   name  ='<?=$headers_db[0]?>' size='10' maxlength='10'  
                         value =''>
    <INPUT TYPE="submit" NAME="Delete" VALUE="Удалить">
    &nbsp;
    <!--INPUT TYPE="submit" NAME="Search" VALUE="Найти"//-->
    &nbsp;
    <INPUT TYPE="submit" NAME="Update" VALUE="Обновить">
    &nbsp;
  </form>       
