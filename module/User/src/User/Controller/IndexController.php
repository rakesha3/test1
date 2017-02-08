<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
	public function indexAction()
	{
		$json_data = file_get_contents('public/users.json');		
		$users = json_decode($json_data, true); 
		//echo '<pre>hi' . print_r($users) . '</pre>';die;
		return new ViewModel(array('users'=>$users));
	}
	
	/*public function add1Action() {
						
		if($this->getRequest()->isPost()){
			$records = $this->getRequest()->getPost()->toArray();
			$file = file_get_contents('public/users.json');
			$data = json_decode($file,true);
			unset($file);//prevent memory leaks for large json.
			//insert data here
			$data[] = $records;
			//save the file
			file_put_contents('public/users.json',json_encode($data));
			unset($data);//release memory
			return $this->redirect()->toRoute('users');
			
		}		
		return new ViewModel();         
	}*/
	 
	public function addAction() {
		$formData=array();
		$id = $this->params()->fromRoute('id');
		if($this->getRequest()->isPost()){
			$records = $this->getRequest()->getPost()->toArray();
			$record_id = $records['id'];
			unset($records['id']);
			$file = file_get_contents('public/users.json');
			$data = json_decode($file,true);
			unset($file);//prevent memory leaks for large json.
			if($record_id!=""){
				$data[$record_id] = $records;
			}
			else{
				$data[] = $records;
			}
			
			//save the file
			file_put_contents('public/users.json',json_encode($data));
			unset($data);//release memory
			return $this->redirect()->toRoute('users');
		}
		else{
			if($id!=""){
				$json_data = file_get_contents('public/users.json');		
				$users = json_decode($json_data, true);
				unset($json_data);			
				$formData = $users[$id];
				$formData['id'] = $id;
				unset($users);//release memory
			}
			
		}
		return new ViewModel(array('formData'=>$formData));         
	}
	 
	public function deleteAction() {
		$id = $this->params()->fromRoute('id');
		if(isset($id) && is_numeric($id)){
			$json_data = file_get_contents('public/users.json');		
			$users = json_decode($json_data, true);
			unset($json_data);			
			unset($users[$id]);
			file_put_contents('public/users.json',json_encode($users));
			unset($users);//release memory
			
		}
		return $this->redirect()->toRoute('users');
		//return new ViewModel();         
	}
}
