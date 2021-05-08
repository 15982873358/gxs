<?php
namespace app\admin\model;
use think\Model;
use think\Db;
class Admin extends Model
{
    protected $pk = 'admin_id';
    public $errorMsg;
    /**
     * 登录
     * @param $data
     * @param $code
     * @return array
     * @throws \think\Exception
     */
    public function login($data,$code){
        if($code){
            //图形验证码验证
            if(!captcha_check($data['vercode'])){
                return ['code' => 0, 'msg' => '验证码错误'];
            }
        }

        $admin=$this->field("*,admin_id id")->where('username',$data['username'])->find();
        if($admin) {
            if($admin['status']!=1){
                return ['code' => 1, 'msg' => '用户已被禁用!']; //信息正确
            }elseif ($admin['pwd'] == sp_password($data['password'])){
                unset($admin['pwd']);
                session('admin', $admin);
                admin_log("帐号成功登录");
                return ['code' => 1, 'msg' => '登录成功!']; //信息正确
            }else{
                return ['code' => 0, 'msg' => '用户名或者密码错误，重新输入!']; //密码错误
            }
        }else{
            return ['code' => 0, 'msg' => '用户不存在!']; //用户不存在
        }
    }
    /**
     * 写入数据
     * @param $data
     * @return bool
     */
    public function add($data){
        $data=$data?:input('post.');
        $res=$this->checkData($data);
        if(!$res){
            return false;
        }
        $check_user = Db::name('admin')->get(['username'=>$data['username']]);
        if ($check_user) {
            $this->errorMsg='用户已存在，请重新输入用户名!';
            return false;
        }
        $data['add_time']=date('Y-m-d H:i:s');
        $data['add_times']=time();
        $res=$this->save($data);
        if($res===false){
            $this->errorMsg="添加失败";
            return false;
        }
        $data['id']=$this->getKey();
        if(!$data['id']){
            $this->errorMsg="添加失败";
            return false;
        }
        admin_log("管理员-添加 ID：{$data['id']}");
        return true;
    }

    /**
     * 更新数据
     * @param $data
     * @return bool
     */
    public function edit($data){
        $data=$data?:input('post.');
        $id=id($data['admin_id']);
        if(!$id){
            $this->errorMsg="ID参数丢失";
            return false;
        }
        $res=$this->checkData($data);
        if(!$res){
            return false;
        }
        $res=$this->save($data,['admin_id'=>$id]);
        if($res===false){
            $this->errorMsg="修改失败";
            return false;
        }
        $admin=$this->get()->toArray();
        unset($admin['pwd']);
        session('admin',$admin);
        admin_log("管理员-修改 ID：{$id}");
        return true;
    }
    /**
     * 验证数据 整理数据
     * @param $data
     * @return bool
     */
    public function checkData(&$data){
        if(empty($data)){
            $this->errorMsg="无数据";
            return false;
        }
        $rule = [
            'username' => 'require|max:120',
            'email' => 'require|email',
            'group_id' => 'require|integer',
        ];
        $msg = [
            'username' => '请输入正确的用户名',
            'email' => '请输入正确的邮箱',
            'group_id' => '请选择权限组',
        ];

        $validate = validate()->make($rule, $msg);
        $result = $validate->check($data);
        if(!$result)
        {
            $this->errorMsg=$validate->getError();
            return false;
        }

        if($data['id'] && empty($data['pwd'])){
            unset($data['pwd']);
        }else{
            $data['pwd'] = $data['pwd']?sp_password($data['pwd']):sp_password("123456");
        }
        return true;
    }
}

