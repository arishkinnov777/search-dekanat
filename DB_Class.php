<?php 
class MySQL_DB
{
        private $dbObj = null;
        private $result = null;  
 
/* ��� ������������ - �����, ��� ������������, ������, ��� ���� ������, ����, 
/*� ����� ��������� ��� ����������.
/* �� ��������� ������������ utf8 */ 
 
        public function __construct($host, $user, $password, $base, $port = null, $charset = 'utf8')
        {
                $this->dbObj = new mysqli($host, $user, $password, $base, $port);
                $this->dbObj->set_charset($charset);
        } 
 
/*�������� � ������������ �������, ������� ��������� ������ � ���������� ��������� ��� ������*/ 
 
        public function query($query)
        {
                if(!$this->dbObj)
                        return false; 
 
/*������� ���������� ���������*/ 
 
                if(is_object($this->result))
                        $this->result->free(); 
 
/*��������� ������*/ 
 
                $this->result = $this->dbObj->query($query); 
 
/*���� ���� ������ - ������� ��*/ 
 
                if($this->dbObj->errno)
#!!!#              die("mysqli error #".$this->dbObj->errno.": ".$this->dbObj->error); 
                   return $this->dbObj->error; 
 
/*���� � ���������� ���������� ������� (�������� SELECT...) �������� ������ - ���������� ��.
/* ������ ������ ������������ � �������, ���� ���� ������ ���������� ���� ������.*/ 
 
                if(is_object($this->result))
                {
                        while($row = $this->result->fetch_assoc())
                                $data[] = $row;
                        
                        return $data;
                } 
 
/*���� ��������� ������������� - ���������� false */ 
 
                else if($this->result == FALSE)
                        return false;
                        
/*���� ������ (�������� UPDATE ��� INSERT) �������� �����-���� ������ - ���������� �� ����������*/ 
 
                else return $this->dbObj->affected_rows;
        }
}
include 'DB_data.php';
$dbObj = new MySQL_DB(DB_HOST, DB_USER, DB_PWD, DB_NAME);
include 'DB_Coding.php';
?>
