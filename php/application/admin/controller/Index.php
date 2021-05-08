<?php
namespace app\admin\controller;
use \app\common\controller\Backend;
use think\Db;
use think\db\Where;
use think\facade\Env;
class Index extends Backend
{
    public function initialize(){

        parent::initialize();
    }
    public function index(){
        // 获取缓存数据
        $menus = cache("MenusData_{$this->admin['group_id']}");
        if(!$menus){
            //声明数组
            $menus = array();
            $domain=request()->domain(true);
            $authRule = db('auth_rule')->where('menustatus=1')->order(['sort'=>'asc','id'=>'desc'])->select();
            foreach ($authRule as $key=>$val){
                if(strpos("{$val['href']}",'http')===false){
                    $val['href']= $domain."/admin/".$val['href'];
                }
                $authRule[$key]['href'] = $val['href'];
                if($val['pid']==0){
                    if($this->admin['id']!=1){
                        if(in_array($val['id'],$this->adminRules)){
                            $menus[] = $val;
                        }
                    }else{
                        $menus[] = $val;
                    }
                }
            }
            //整理菜单数据
            foreach ($menus as $k=>$v){
                $kc=0;
                foreach ($authRule as $kk=>$vv){
                    if($v['id']==$vv['pid']){
                        if($this->admin['id']!=1) {
                            if (in_array($vv['id'], $this->adminRules)) {
                                $menus[$k]['children'][$kc] = $vv;
                                foreach ($authRule as $kkk=>$vvv){
                                    if($vv['id']==$vvv['pid']){
                                        if($this->admin['id']!=1) {
                                            if (in_array($vvv['id'], $this->adminRules)) {

                                                $menus[$k]['children'][$kc]['children'][] = $vvv;
                                            }
                                        }else{
                                            $menus[$k]['children'][$kc]['children'][] = $vvv;
                                        }
                                    }
                                }
                                $kc++;
                            }
                        }else{
                            $menus[$k]['children'][$kc] = $vv;
                            foreach ($authRule as $kkk=>$vvv){
                                if($vv['id']==$vvv['pid']){
                                    if($this->admin['id']!=1) {
                                        if (in_array($vvv['id'], $this->adminRules)) {

                                            $menus[$k]['children'][$kc]['children'][] = $vvv;
                                        }
                                    }else{
                                        $menus[$k]['children'][$kc]['children'][] = $vvv;
                                    }
                                }
                            }
                            $kc++;
                        }
                    }
                }
            }
            cache("MenusData_{$this->admin['group_id']}", $menus, 3600);
        }
        $this->assign('admin',$this->admin);
        $this->assign('menus',json_encode($menus,true));
        $this->assign('system',$this->system);
        return $this->fetch();
    }

    /**
     * 控制面板
     * @return mixed
     */
    public function main(){
        return $this->fetch();
    }
    /**
     * 控制面板
     * @return mixed
     */
    public function my_msg(){
        session('my_msg',1);
        $notice=Db::name("admin_msg")->whereIn("admin_id","1,{$this->admin['id']}")->where(['status'=>1])->order("add_times desc")->limit(30)->select();
        $this->assign('list',$notice);
        return $this->fetch();
    }
    /**
     * 清除缓存
     * @return mixed
     */
    public function clear(){
        $R = Env::get('runtime_path');
        if ($this->_deleteDir($R)) {
            $result['info'] = '清除缓存成功!';
            $result['status'] = 1;
        } else {
            $result['info'] = '清除缓存失败!';
            $result['status'] = 0;
        }
        $result['url'] = url('admin/index/index');
        return $result;
    }

    private function _deleteDir($R)
    {
        try{
            $handle = opendir($R);
            while (($item = readdir($handle)) !== false) {
                if ($item != '.' and $item != '..') {
                    if (is_dir($R . '/' . $item)) {
                        $this->_deleteDir($R . '/' . $item);
                    } else {
                        if (!unlink($R . '/' . $item))
                            die('error!');
                    }
                }
            }
            closedir($handle);
            return rmdir($R);
        }catch (\Exception $e){
            return false;
        }

    }

    /**
     * 退出登陆
     */
    public function logout(){
        session(null);
        $this->redirect('login/index');
    }

    public function navbar(){
        return $this->fetch();
    }
    public function nav(){
        return $this->fetch();
    }

}
