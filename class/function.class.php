<?php
/*
*	Just for fun.
*	Auther : vulkey(mstsec)
*/
class Func {

	private $form_method;
	private $form_params;
	//外部无需使用，所以设置为私有成员属性
	
	public function __construct($form_method='', $form_params=''){
		//构造函数，对象创建时获取form表单的相关传参，以便con_html方法生成
		$this -> form_method = $form_method;
		$this -> form_params = $form_params;
	}

	public function con_function(){
		//自己造的回调
		$func_array = func_get_args();
		$name = func_get_arg(0);
		array_shift($func_array);
		return call_user_func_array($name,$func_array);
	}

	public function con_html(){
		//生成form表单
		echo "<form action='' method='{$this->form_method}'>";
		echo "{$this->form_params}: <input type='text' name='{$this->form_params}' id='form1'>";
		echo "<input type='submit' name='submit' value='submit'>";
		echo "</form>";
		echo "<hr>";

	}

	public function con_mysql($t_name, $c_name, $c_value, $sql_type){
		//mysqli
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('bad!');
		$mysqli->set_charset("utf8");
		if($mysqli -> connect_errno)
		{
			printf("Error: {$mysqli->connect_error}");
			exit();
		}
		$sql_num = "SELECT * FROM {$t_name} WHERE {$c_name} = {$c_value}"; //num
		$sql_string = "SELECT * FROM {$t_name} WHERE {$c_name} = '{$c_value}'"; //string
		$sql_search = "SELECT * FROM {$t_name} WHERE {$c_name} like '%{$c_value}%'"; //search
		$sql_name = "sql_".$sql_type;
		$result = $mysqli->query($$sql_name)->fetch_assoc();
		$mysqli->close();
		return $result;
	}

}

?>
