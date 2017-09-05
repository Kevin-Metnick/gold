<?php
namespace App\Http\Events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
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
        $receive = array_Opertion($receive, array("name"=>'username'));

        $where = "[";
        foreach ($receive as $key => $value) {
        	$where .= "\"".$key."\"=>\"".$value."\",";
        }
        $where .= "]";

        $config['where']=$where;        

	    $value = array_values($receive);
	    $key = array_keys($receive);	

		if (in_array("", $value)&&  in_array($this->key, $key)) {

			return (['msg'=>'null','reset'=>'没有数据']);
		
		} else {
            $model = new LoginModel();
            $result = $model -> Opertion($config);
            if ($result) {
                    $userId = user_Encode($result->id);
                       setcookie('User-Session', $userId, time()+3600*2);
            	return (['msg'=>'true','reset'=>'验证成功']);
            } else {
            	return (['msg'=>'null','reset'=>'验证失败']);
            }
		}
  		
	}

    public function userAdd()
    {
        // 获取注册信息
        $receive = request()->post();
         $mod = new Db();
         $mod::beginTransaction();
         $infoBool = Db::table('user_info')->insertGetId([
             'username'=>$receive['name'],
             'password'=>$receive['password'],
             'email'=>$receive['email'],
             'phone'=>$receive['name'],
             ]);
         if(empty($receive['parent'])) $receive['parent']='0';
        
         $levelBool = Db::table('user_level')->insert(['id'=>$infoBool, 'level'=>$receive['parent']]);
            
         if ($infoBool && $levelBool) {
             Db::commit();
             return (['msg'=>'true','reset'=>'注册成功']);
         } else {
             Db::rollBack();
            return (['msg'=>'false','reset'=>'注册失败']);
         }
    }

    /**
     * 退出登录
     * @return array 返回退出结果
     */
    public function UserExit()
    {
        if(setcookie('User-Session',1,time()-1)){
            return ['msg'=>'true','result'=>'退出成功'];
        } else {
            return ['msg'=>'false','result'=>'退出失败'];
        }
    }


}