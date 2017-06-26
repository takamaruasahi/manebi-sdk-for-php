<?php
require_once( './config.php');

if( isset( $_POST['submit'] ) ){
	require_once( MAEDU_ROOT_BASE . '/manebi_client/src/transaction/ExecTran.php');
	
	//入力パラメータクラスをインスタンス化します
	$execTran = new ExecTran();
	$token = $execTran->makeToken($_POST['login_id']);
	if (!empty($token)) {
		return $execTran->checkPermission(array(
				'login_id' => $_POST['login_id'],
				'access_token' => $token,
				'nick_name' => $_POST['nick_name'],
				'first_name' => $_POST['first_name'],
				'last_name' => $_POST['last_name'],
				'birth_day' => $_POST['birth_day'],
				'status' => $_POST['status'],
				'sex_id' => $_POST['sex_id']
		));
	}
}

//EntryTran入力・結果画面
require_once( MAEDU_SAMPLE_BASE . '/display/getMethod.php' );