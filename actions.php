<?php 
	session_start();
	require_once('config.php');
    include 'DBConnection';
 
	Class Actions extends DBConnection{
	    function __construct(){
	        parent::__construct();
	    }
	    function __destruct(){
	        parent::__destruct();
	    }
	    function save_log($data=array()){
	        // Data array paramateres
	            // user_id = user unique id
	            // action_made = action made by the user
 
	        if(count($data) > 0){
	            extract($data);
	            $sql = "INSERT INTO `audit_log` (`user_id`,`action_made`) VALUES ('{$user_id}','{$action_made}')";
	            $save = $this->conn->query($sql);
	            if(!$save){
	                die($sql." <br> ERROR:".$this->conn->error);
	            }
	        }
	        return true;
	    }
        
	    function login(){
	        extract($_POST);
	        $sql = "SELECT * FROM user_acc where username = '{$username}' and `password` = '".md5($password)."' ";
	        @$qry = $this->conn->query($sql)->fetch_array();
	        if(!$qry){
	            $resp['status'] = "failed";
	            $resp['msg'] = "Invalid username or password.";
	        }else{
	            $resp['status'] = "success";
	            $resp['msg'] = "Login successfully.";
	            foreach($qry as $k => $v){
	                if(!is_numeric($k))
	                $_SESSION[$k] = $v;
	            }
	            $log['user_id'] = $qry['id'];
	            $log['action_made'] = "Logged in the system.";
	            // audit log
	            $this->save_log($log);
	        }
	        return json_encode($resp);
	    }
	    function logout(){
	        $log['user_id'] = $_SESSION['id'];
	        $log['action_made'] = "Logged out.";
	        session_destroy();
	        // audit log
	        $this->save_log($log);
	        header("location:./");
	    }
	    function save_member(){
	        extract($_POST);
	        $data = "";
	        foreach($_POST as $k => $v){
	            if(!in_array($k,array('id'))){
	                if(!empty($data)) $data .=", ";
	                $data .= " `{$k}` = '{$v}' ";
	            }
	        }
	        if(empty($id)){
	            $sql = "INSERT INTO `user_acc` set {$data}";
	        }else{
	            $sql = "UPDATE `user_acc` set {$data} where id = '{$id}'";
	        }
	        $save = $this->conn->query($sql);
	        if($save){
	            $resp['status'] = 'success';
	            $log['user_id'] = $_SESSION['id'];
	            $user_id = empty($id) ? $this->conn->insert_id : $id ;
	            if(empty($id)){
	                $resp['msg'] = "New user successfully added.";
	                $log['action_made'] = " added [id={$user_id}] {$first_name} {$last_name} into the user list.";
	            }else{
	                $resp['msg'] = "user successfully updated.";
	                $log['action_made'] = " updated the details of [id={$user_id}] user.";
	            }
	            // audit log
	            $this->save_log($log);
	        }else{
	            $resp['status'] = 'failed';
	            $resp['msg'] = "Error saving user details. Error: ".$this->conn->error;
	            $resp['sql'] = $sql;
	        }
	        return json_encode($resp);
	    }
	    function delete_member(){
	        extract($_POST);
	        $mem = $this->conn->query("SELECT * FROM user_acc where id = '{$id}'")->fetch_array();
	        $delete = $this->conn->query("DELETE FROM user_acc where id = '{$id}'");
	        if($delete){
	            $resp['status'] = 'success';
	            $resp['msg'] = 'user successfully deleted.';
	            $log['user_id'] = $_SESSION['id'];
	            $log['action_made'] = " deleted [id={$mem['id']}] {$mem['firstname']} {$mem['lastname']} from user list.";
	            $_SESSION['flashdata']['type'] = 'success';
	            $_SESSION['flashdata']['msg'] = $resp['msg'];
 
	            // audit log
	            $this->save_log($log);
	        }else{
	            $resp['status']='failed';
	            $resp['msg']='Failed to delete user.';
	            $resp['error']=$this->conn->error;
	        }
	        return json_encode($resp);
	    }
	}
	$a = isset($_GET['a']) ?$_GET['a'] : '';
	$action = new Actions();
	switch($a){
	    case 'login':
	        echo $action->login();
	    break;
	    case 'logout':
	        echo $action->logout();
	    break;
	    case 'save_member':
	        echo $action->save_member();
	    break;
	    case 'delete_member':
	        echo $action->delete_member();
	    break;
	    case 'save_log':
	        $log['user_id'] = $_SESSION['id'];
	        $log['action_made'] = $_POST['action_made'];
	        echo $action->save_log($log);
	    break;
	    default:
	    // default action here
	    echo "No Action given";
	    break;
	}