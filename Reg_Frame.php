<?php
header("Content-Type: text/html; charset=utf-8");
require_once 'Header.php';
?>
<p></p>
<p></p>
<p></p> 
<table bgcolor="#999999" height=20 width="99%" cellspacing="1" cellpadding="10" border="0">
</table>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p> 
<table bgcolor="#999999" height=20 width="60%" cellspacing="1" cellpadding="10" border="0">
<tr>
<td align="left" valign="top" bgcolor="#FFFFFF">

<font  color="Maroon" size="4">
<h3>РЕГИСТРАЦИЯ ПОЛЬЗОВАТЕЛЕЙ</h3>
Регистрация пользователей подразумевает создание логина и пароля с целью входа в кабинет пользователя.
Зарегистрированные пользователи-тестируемые сотрудники, могут затем пройти тестирование и просмотреть результаты тестирования.
Для этого они должен авторизоваться и зайти в свой личный кабинет пользователя.


<?php
$operation='ADD'; 
include 'Forms_Main_Reg.php'; 
?>

</td>
</tr> 
</table>
<p></p>
<p></p>
<p></p>

<?php require_once 'Footer.php'; ?>