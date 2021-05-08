<?php
/**
 * 后台登录
 */
namespace app\admin\controller;
use \app\common\controller\Base;
use think\Db;
use think\captcha\Captcha;

class Login extends Base
{
    private $system;
    public function initialize(){
        if (session('admin')) {
            $this->redirect('admin/index/index');
        }
        $this->system = systemConfig('system');
        $this->assign('system',$this->system);

    }
    public function index(){
        if(request()->isPost()) {

            $data = input('post.');

            $return = model("admin/admin")->login($data,$this->system['code']);
            return ['code' => $return['code'], 'msg' => $return['msg']];
        }else{
            return $this->fetch();
        }
    }

    public function createcodelogin()
    {
        $code=rand_string(12,2,"1234567980");
        $commonMode=new HomeCommon();
        $qrcode=$commonMode->getwxacodeunlimit("pages/logincode/logincode",$code,1280);
        if(!$qrcode['status']){
            return ['code' =>0, 'msg' => $qrcode['msg']];
        }
        $qrCodeUrl=$qrcode['url'];
        $data=array(
            'code'=>$code,
            'admin_id'=>0,
            'add_time'=>date('Y-m-d H:i'),
            'add_times'=>time(),
            'status'=>0,
            'qrcode'=>$qrCodeUrl,
            'ip'=>ip()
        );
        $qrCodeId=Db::name('admin_code')->insertGetId($data);
        Db::name('admin_code')->where(new Where(['add_times'=>['lt',time()-1800]]))->delete();
        return ['code' =>1, 'msg' =>"生成成功",'url'=>$qrCodeUrl,'id'=>$qrCodeId];
    }
    /**
     * 每秒请求一次
     * @internal
     *
     */
    public function codelogin()
    {
        //status 0 停止请求做出提示 1 请求成功执行登录跳转 2不做任何操作继续请求
        $id = id(input( "id" ));
        if(empty($id)){
            return ['code'=>0,'msg'=>'参数错误!'];
        }
        $res=Db::name('admin_code')->where(['id'=>$id])->find();
        if(empty($res)){
            return ['code'=>0,'msg'=>'未找到二维码信息!'];
        }
        if($res['status']!=1){
            return ['code'=>2,'msg'=>'请用微信扫码登录!'];
        }
        if($res['add_times'] < time()-1800){
            return ['code'=>0,'msg'=>'二维码已失效!'];
        }
        $admin = Db::name('admin')->field("admin_id as id,username as name,pwd,group_id,is_open,avatar")->where (['admin_id'=>$res['admin_id'],'is_open'=>1])->find ();
        if(empty($admin)){
            return ['code'=>0,'msg'=>'管理帐号已不存在!'];
        }
        $admin['avatar'] = $admin['avatar'] == '' ? '/static/admin/images/0.jpg' : $admin['avatar'];
        unset($admin['pwd']);
        session('admin', $admin);
        Db::name('admin_code')->where(array('id'=>$res['id']))->delete();
        return ['code' => 1, 'msg' => '登录成功!']; //信息正确
    }

    /**
     * @return \think\Response
     */
    public function verify(){
        $config =    [
            // 验证码字体大小
            'fontSize'    =>    25,
            // 验证码位数
            'length'      =>    3,
            // 关闭验证码杂点
            'useNoise'    =>    false,
            'bg'          =>    [255,255,255],
        ];

        $captcha = new Captcha($config);
        return $captcha->entry();
    }
}