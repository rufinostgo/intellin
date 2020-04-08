<?php 

$url = "https://novias-temp-intelli-2-995132.dev.odoo.com/xmlrpc";
$db = "novias-temp-intelli-2-995132";
$username = "admin";
$password = "adminadmin";
require_once('ripcord.php');
$common = ripcord::client("$url/common");
$uid = $common->authenticate($db, $username, $password, array());
$models = ripcord::client("$url/object");
$insert =   $models->execute_kw
($db, $uid, $password,'intelli.tower','tower_departments', array('password',"AURA01") );

echo "-------------------------------------";
print_r($insert[0]['success']);
echo "----------------succsess---------------------";
//print_r($insert[0]);
//print_r($insert[0]['data']);
   
    //echo "<img src='data:image/png;base64," .$insert[0]['data']['background_picture']."' alt='alternate' />";
    echo "<img src='data:image/png;base64," .$insert[0]['data']['background_picture']."' alt='alternate' />";
print_r("'data:image/png;base64," .$insert[0]['data']['background_picture']."'"); 
  //print_r($insert[0]['data']['background_picture']); 
?>     