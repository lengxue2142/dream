 <?php
function myload($class){   
      $file = './smarty/'.$class.'.class.php';   
      if (is_file($file)) {   
           require_once($file);   
       }else{
       	 exit("$file does not exists");
       }   
}   

//函数调用方法
spl_autoload_register('myload');   

$smarty = new Smarty();
$link = mysql_connect("localhost","root","phpmyadmin") or die('connect failed');
 mysql_select_db("db_studentsystem") or die("select db failed");
 mysql_query("set names utf8");
$resData = mysql_query("select * from student");
$user_list = array();

while($row = mysql_fetch_assoc($resData)){
   $user_list[] = $row; 
}
mysql_close();
//print_r($arrDataX);
$smarty->assign("user_list",$user_list);
$smarty->display('index.html');

?>