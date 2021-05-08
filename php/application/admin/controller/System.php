<?php
namespace app\admin\controller;
use \app\common\controller\Backend;
use think\Db;
class System extends Backend
{
    /********************************站点管理*******************************/
    /**
     * 站点设置
     * @return mixed|\think\response\Json
     */
    public function system(){

        if(request()->isPost()) {
            $data = request()->except('file');
            $res=systemConfig('system',$data);
            if($res!==false) {
                return json(['code' => 1, 'msg' => '保存成功!']);
            } else {
                return json(array('code' => 0, 'msg' =>'保存失败！'));
            }
        }else{
            $system = systemConfig('system');
            $this->assign('infoJson',json_encode($system));
            $this->assign('info',$system);
            return $this->fetch();
        }
    }
    /**
     * 微信设置
     * @return mixed|\think\response\Json
     */
    public function wechat(){

        if(request()->isPost()) {
            $data = request()->except('file');
            $res=systemConfig('wechat',$data);
            if($res!==false) {
                return json(['code' => 1, 'msg' => '保存成功!']);
            } else {
                return json(array('code' => 0, 'msg' =>'保存失败！'));
            }
        }else{
            $system = systemConfig('wechat');
            $this->assign('infoJson',json_encode($system));
            $this->assign('info',$system);
            return $this->fetch();
        }
    }
    /**
     * 文件存储配置
     * @return mixed|\think\response\Json
     */
    public function upload(){
        if(request()->isPost()) {
            $data = request()->except('file');
            $res=systemConfig('upload',$data);
            if($res!==false) {
                return json(['code' => 1, 'msg' => '保存成功!']);
            } else {
                return json(array('code' => 0, 'msg' =>'保存失败！'));
            }
        }else{
            $system = systemConfig('upload');
            $this->assign('infoJson',json_encode($system));
            $this->assign('info',$system);
            return $this->fetch();
        }
    }
    /**
     * 发送邮箱配置
     * @return mixed|\think\response\Json
     */
    public function email(){
        if(request()->isPost()) {
            $data = request()->except('file');
            $res=systemConfig('email',$data);
            if($res!==false) {
                return json(['code' => 1, 'msg' => '保存成功!']);
            } else {
                return json(array('code' => 0, 'msg' =>'保存失败！'));
            }
        }else{
            $system = systemConfig('email');
            $this->assign('infoJson',json_encode($system));
            $this->assign('info',$system);
            return $this->fetch();
        }
    }
}
