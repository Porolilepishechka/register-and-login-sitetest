<?php

$login = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

if($login == ""){
echo "ви ввели некоректний логін";
echo '<br><a href="index.html">register page</a>';
exit();
} else if($password == ""){
echo "ви ввели некоректний пароль";
echo '<br><a href="index.html">register page</a>';
exit();
} else if(mb_strlen($login) > 48){
echo "ви ввели завеликий логін";
echo '<br><a href="index.html">register page</a>';
exit();
} else if(mb_strlen($password) < 8){
echo "ви ввели замалий пароль";
echo '<br><a href="index.html">register page</a>';
exit();
} else if(mb_strlen($password) > 32){
echo "ви ввели завеликий пароль";
echo '<br><a href="index.html">register page</a>';
exit();
} else{
$password = md5($password);

$mysql = new mysqli("localhost", "root", "", "Test db");
$mysql->query("SET NAMES 'utf8'");

$mysql->query("INSERT INTO `users-db` (`name`, `password`) VALUES('$login', '$password')");

$mysql->close();

echo "вас успішно було зарегестровано";
echo '<br><a href="index.html">register page</a>';
}
?>