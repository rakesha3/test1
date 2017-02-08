<?php
namespace User\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class BasicPlugin extends AbstractPlugin{
    public function getUserList(){
	$user_json = file_get_contents('public/users.json');		
	$users = json_decode($user_json, true);
	foreach($users as $user_key=>$user_value){
		$userList[$user_key]=$user_value['first_name']." ".$user_value['last_name'];
	}
	asort($userList);
	return $userList;
    }
}
