<?php
error_reporting(E_ALL);
ini_set('max_execution_time', '500000');
ini_set('memory_limit', '900M');
define("DEFAULT_LOG", "log/insert_error_log.log");
include_once 'include/dbConfig.php';
include_once 'include/function.php';
if ( isset($_SESSION) ) {
	if ( isset($_SESSION['id']) && isset($_SESSION['userlevel']) ) {
		@header('location:'.DASHBOARD);
		exit;
	}
}
if ( isset($_POST) && isset($_POST['id_username']) ) {
	$loginStatus = false;
	$username = trim($_POST['id_username']);
	$password = trim($_POST['id_password']);
	if ( $username && $password ) {
		$query = "Select * from users where name = '" . $username . "' and _key = '" . $password . "' and status = '1'";
		$results = $database->get_results($query);

		if ( count($results) > 0 ) {
			$loginStatus = true;
			$_SESSION['id'] = $results[0]['id'];
			$_SESSION['name'] = $results[0]['name'];
			$_SESSION['_key'] = $results[0]['_key'];
			$_SESSION['userlevel'] = $results[0]['userlevel'];

			@header('location:dashboard.php');
		} else {
			$loginStatus = false;
			$error['message'] = 'Invalide Login details';
			//@header('location:index.php');
		}
	}
}
include_once 'header.php';
?>

<div class="container">

    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title"> Login</div>
            </div>
            <div class="panel-body">
                <?php
                if(isset($error)){
                    foreach ($error as $err){
                        echo $err.'<br>';
                    }
                }
                ?>
            </div>

            <div class="panel-body">
                <form name="frmlogin" action="#" class="form-horizontal" method="post">
                    <div id="div_id_password1" class="form-group required">
                        <label for="kimlik_no" class="control-label col-md-4 ">Username<span
                                    class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input class="input-md textinput textInput form-control" id="id_username" name="id_username"
                                   placeholder="Enter Your username" required style="margin-bottom: 10px"/>
                        </div>
                    </div>

                    <div id="div_id_username" class="form-group required">
                        <label for="id_username" class="control-label col-md-4  requiredField"> Password<span
                                    class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input class="input-md  textinput textInput form-control" id="id_password"
                                   name="id_password" placeholder="Enter your Password" style="margin-bottom: 10px"
                                   type="password" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="aab controls col-md-4 "></div>
                        <div class="controls col-md-8 ">
                            <input type="submit" name="submit" value="Search" class="btn btn-primary btn btn-info"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>