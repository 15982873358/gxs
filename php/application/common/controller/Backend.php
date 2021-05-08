<?php
/**
 * 后台管理基础类
 */
namespace app\common\controller;
use think\Db;

class Backend extends Base
{

    protected $admin,$system,$adminRules,$HrefId,$page,$pageSize,$params;
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->params = input('param.');
        //判断管理员是否登录
        $this->admin=session('admin');
        if (empty($this->admin)) {

            $this->redirect('admin/login/index');
        }
        //验证权限
        $this->authCheck();
        //多平台权限控制
        if($this->admin['group_id']==1){
            $this->assign('adminList',Db::name('admin')->column('username','admin_id'));
        }
        //配置文件
        $this->system=systemConfig('system');
        $this->page =$this->params['page']?:$this->system['page'];
        $this->pageSize =$this->params['limit']?:$this->system['pageSize'];
    }
    /**
     * 验证权限
     */
    public function authCheck(){
        $allow = [
            'admin/index/index',
            'admin/index/main',
            'admin/index/clearData',
            'admin/index/logout',
            'admin/login/password',
            'admin/index/menus',
        ];
        $route=strtolower(request()->controller()).strtolower(request()->action());
        if($this->admin['id']!=1){
            $this->HrefId = Db::name('auth_rule')->where('href',$route)->value('id');
            //当前管理员权限
            $rules=Db::name('auth_group')->where(array('id'=>$this->admin['group_id']))->value('rules');
            $adminRules = explode(',',$rules);
            // 不需要权限的规则id;
            $noRules =Db::name('auth_rule')->where('authopen',1)->column('id');
            $this->adminRules = array_merge($adminRules,$noRules);
            if($this->HrefId){
                if(!in_array($this->HrefId,$this->adminRules)){
                    $this->error('permission denied');
                }
            }else{
                if(!in_array($route,$allow)) {
                    $this->error('permission denied');
                }

            }
        }
        return $this->adminRules;
    }
    //空操作
    public function _empty(){
        return $this->error('空操作，返回上次访问页面中...');
    }
}
