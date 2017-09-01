<?php
namespace App\Http\Events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\Login as LoginModel;

class Login extends Controller
{
	public $key = ['_token','name','password'];

	public function Opertion($class, $function)
	{	
       
	    $receive = request()->post(); //获取页面数据
	   	$url = request()->getRequestUri();

	    $config = config();
	   	$config = $config->get('api');
        $config = $config["$url"];
        unset($receive['_token']);
        $receive['username']=$receive['name'];
        unset($receive['name']);
        $where = "[";
        foreach ($receive as $key => $value) {
        	// var_dump($key);
        	$where .= "\"".$key."\"=>\"".$value."\",";
        }
        $where .= "]";
        $config['where']=$where;        

	    $value = array_values($receive);
	    $key = array_keys($receive);	

		if (in_array("", $value)&&  in_array($this->key, $key)) {

			echo json_encode(['msg'=>'null','reset'=>'没有数据']);
		
		} else {
            echo "<pre>";
            $model = new LoginModel();
            $result = $model -> Opertion($config);
            if ($result) {
            	echo json_encode(['msg'=>'null','reset'=>'没有数据']);
            } else {
            	echo json_encode(['msg'=>'null','reset'=>'没有数据']);
            }
		}
  		
	}

}