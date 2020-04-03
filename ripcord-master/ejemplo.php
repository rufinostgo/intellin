<?php 

$url = "https://novias-temp-intelli-2-995132.dev.odoo.com/xmlrpc";
$db = "novias-temp-intelli-2-995132";
$username = "admin";
$password = "adminadmin";
require_once('ripcord.php');
$common = ripcord::client("$url/common");
$uid = $common->authenticate($db, $username, $password, array());
$models = ripcord::client("$url/object");
$vals =  array(array(array('name', 'like', '')));
$get = $models->execute_kw($db, $uid, $password,
    'intelli.tower', 'search_read', $vals
);
$insert =   $models->execute_kw($db, $uid, $password,'intelli.tower','data_return', array(self,"id",1) );



echo $insert;
    //print_r($get[0]['background_picture']);
    //echo "<img src='data:image/png;base64," .$get[0]['background_picture']."' alt='alternate' />";
?>     