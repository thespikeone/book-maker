<?php
$id = $_GET['id'];
var_dump($id);
include_once('../public/php/data.php');

$sel=$pdo->prepare("select * from commande where id=$id limit 1");
$sel->execute();
$approv=$sel->fetch();

$ins=$pdo->prepare("insert into money(id_client,email,last_name,first_name,adress,phone_num,lang,book_name,id_insta) values(?,?,?,?,?,?,?,?,?)");
$ins->execute(array($approv['id_client'],$approv['email'],$approv['last_name'],$approv['first_name'],$approv['adress'],$approv['phone_num'],$approv['lang'],$approv['book_name'],$approv['id_insta']));



$sel=$pdo->prepare("DELETE FROM commande WHERE id = $id");
$sel->execute(array());

header('location: index.php')

?>