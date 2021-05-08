<?php
/**
 * 访问权限设置
 */
namespace app\admin\controller;
use \app\common\controller\Backend;
use think\Db;
use think\db\Where;
class Auth extends Backend
{
    /**
     * 初始化
     */
    public function initialize(){
        parent::initialize();
    }
    /**
     * 管理员列表
     * @return array|\think\response\View
     */
    public function admin(){
        if(request()->isPost()){
            $where=[];
            if($this->params['keyword']){
                $where['username|email|name']=['like',"%{$this->params['keyword']}%"];
            }
            $list=Db::name('admin')->alias('a')
                ->leftJoin('auth_group ag','a.group_id = ag.group_id')
                ->field('a.*,ag.title group_name')
                ->where(new Where($where))
                ->order("admin_id desc")
                ->paginate(array('list_rows'=>$this->pageSize,'page'=>$this->page))
                ->toArray();
            return $result = ['code'=>0,'msg'=>'获取成功!','data'=>$list['data'],'count'=>$list['total'],'rel'=>1];
        }
        return $this->fetch();
    }
    /**
     * 添加管理员
     * @return array|\think\response\View
     */
    public function admin_add(){
        if(request()->isPost()){
            $adminModel=model("admin/admin");
            $res=$adminModel->add();
            if ($res) {
                $result = ['code'=>1,'msg'=>'保存成功!'];
            } else {
                $result = ['code'=>0,'msg'=>$adminModel->errorMsg];
            }
            return $result;
        }
        $this->assign('authGroup',Db::name('AuthGroup')->all());
        $info=['status'=>1];
        $this->assign('infoJson', json_encode($info,true));
        $this->assign('info', $info);
        $this->assign('title',"添加管理员");
        return $this->fetch('admin_edit');
    }

    /**
     * 更新管理员信息
     * @param $admin_id
     * @return array|mixed
     */
    public function admin_edit($admin_id){
        if(request()->isPost()){
            $data=input('post.');
            $data['admin_id']=$admin_id;
            $adminModel=model("admin/admin");
            $res=$adminModel->edit();
            if ($res) {
                $result = ['code'=>1,'msg'=>'保存成功!'];
            } else {
                $result = ['code'=>0,'msg'=>$adminModel->errorMsg];
            }
            return $result;
        }

        $info = model("admin/admin")->get($admin_id);
        $this->assign('infoJson', json_encode($info,true));
        $this->assign('info', $info);
        $this->assign('authGroup',Db::name('AuthGroup')->all());
        $this->assign('title',"编辑管理员");
        return $this->fetch();
    }
    /**
     * 更新管理员信息
     * @return array|\think\response\View
     */
    public function admin_info(){
        if(request()->isPost()){
            $data=input('post.');
            $data['admin_id']=$this->admin['id'];
            $adminModel=model("admin/admin");
            $res=$adminModel->edit();
            if ($res) {
                $result = ['code'=>1,'msg'=>'保存成功!'];
            } else {
                $result = ['code'=>0,'msg'=>$adminModel->errorMsg];
            }
            return $result;
        }else{
            $info = model("admin/admin")->get($this->admin['id']);
            $this->assign('infoJson', json_encode($info,true));
            $this->assign('info', $info);
            $this->assign('title',"编辑帐号信息");
            return $this->fetch();
        }
    }

    /**
     * 删除管理员
     * @param $admin_id
     * @return array
     */
    public function admin_del($admin_id){
        if ($this->admin['id']==1){
            model("admin/admin")->where('admin_id',$admin_id)->delete();
            return $result = ['code'=>1,'msg'=>'删除成功!'];
        }else{
            return $result = ['code'=>0,'msg'=>'您没有删除管理员的权限!'];
        }
    }
    /**
     * 修改管理员状态
     * @return mixed
     */
    public function admin_status(){
        if (empty($this->params['id'])){
            return $result = ['code'=>0,'msg'=>'用户ID不存在!','url'=>url('adminList')];
        }
        model("admin/admin")->where('id',$this->params['id'])->setField('status', $this->params['status']);
        return $result = ['code'=>1,'msg'=>'用户状态修改成功!','url'=>url('adminList')];
    }
    /**
     * 操作日志
     * @return array|mixed
     */
    public function admin_log(){
        if(request()->isPost()){
            $where=[];
            if($this->admin['group_id']!=1){
                $where['n.admin_id']=$this->admin['id'];
            }
            if($this->params['keyword']){
                $where['username|email|name']=['like',"%{$this->params['keyword']}%"];
            }
            $list=Db::name('admin_log')
                ->alias("n")
                ->field('n.*,a.avatar,a.username')
                ->leftJoin("admin a","a.admin_id=n.admin_id")
                ->where( new Where($where))
                ->order('n.id desc')
                ->paginate(array('list_rows'=>$this->pageSize,'page'=>$this->page))
                ->toArray();
            return $result = ['code'=>0,'msg'=>'获取成功!','data'=>$list['data'],'count'=>$list['total'],'rel'=>1];
        }
        return $this->fetch();
    }
    /********************************用户组管理*******************************/
    
    /**
     * 用户组管理
     * @return array|\think\response\View
     */
    public function adminGroup(){
        if(request()->isPost()){
            $list = AuthGroup::all();
            return $result = ['code'=>0,'msg'=>'获取成功!','data'=>$list,'rel'=>1];
        }
        return view();
    }

    /**
     * 删除管理员分组
     * @return array
     */
    public function groupDel(){
        AuthGroup::where('group_id','=',input('id'))->delete();
        return $result = ['code'=>1,'msg'=>'删除成功!'];
    }

    /**
     * 添加分组
     * @return mixed
     */
    public function groupAdd(){
        if(request()->isPost()){
            $data=input('post.');
            $data['addtime']=time();
            AuthGroup::create($data);
            $result['msg'] = '用户组添加成功!';
            $result['url'] = url('adminGroup');
            $result['code'] = 1;
            return $result;
        }else{
            $this->assign('title','添加用户组');
            $this->assign('info','null');
            return $this->fetch('groupForm');
        }
    }

    /**
     * 修改分组
     * @return array|mixed
     */
    public function groupEdit(){
        if(request()->isPost()) {
            $data=input('post.');
            $where['group_id'] = $data['group_id'];
            AuthGroup::update($data,$where);
            $result = ['code'=>1,'msg'=>'用户组修改成功!','url'=>url('adminGroup')];
            return $result;
        }else{
            $id = input('id');
            $info = AuthGroup::get(['group_id'=>$id]);
            $this->assign('info', json_encode($info,true));
            $this->assign('title','编辑用户组');
            return $this->fetch('groupForm');
        }
    }

    /**
     * 分组配置规则
     * @return mixed
     */
    public function groupAccess(){
        $nav = new Leftnav();
        $admin_rule=db('auth_rule')->field('id,pid,title')->order('sort asc')->select();
        $rules = db('auth_group')->where('group_id',input('id'))->value('rules');
        $arr = $nav->auth($admin_rule,$pid=0,$rules);
        $arr[] = array(
            "id"=>0,
            "pid"=>0,
            "title"=>"全部",
            "open"=>true
        );
        $this->assign('data',json_encode($arr,true));
        return $this->fetch();
    }

    /**
     * 分组配置规则提交
     * @return array
     */
    public function groupSetaccess(){
        $rules = input('post.rules');
        if(empty($rules)){
            return array('msg'=>'请选择权限!','code'=>0);
        }
        $data = input('post.');
        $where['group_id'] = $data['group_id'];
        if(AuthGroup::update($data,$where)){
            return array('msg'=>'权限配置成功!','url'=>url('adminGroup'),'code'=>1);
        }else{
            return array('msg'=>'保存错误','code'=>0);
        }
    }

    /********************************权限管理*******************************/
    /**
     * 权限列表
     * @return array|\think\response\View
     */
    public function adminRule(){
        if(request()->isPost()){
            $arr = cache('authRuleList');
            if(!$arr){
				$arr = Db::name('authRule')->order('pid asc,sort asc')->select();
				foreach($arr as $k=>$v){
                    $arr[$k]['lay_is_open']=false;
                }
                cache('authRuleList', $arr, 3600);
            }
            return $result = ['code'=>0,'msg'=>'获取成功!','data'=>$arr,'is'=>true,'tip'=>'操作成功'];
        }
        return view();
    }

    /**
     * 清楚缓存
     */
    public function clear(){
        $arr = Db::name('authRule')->where('pid','neq',0)->select();
        foreach ($arr as $k=>$v){
            $p = Db::name('authRule')->where('id',$v['pid'])->find();
            if(!$p){
                Db::name('authRule')->where('id',$v['id'])->delete();
            }
        }
        cache('MenusData', NULL);
        cache('authRuleList', NULL);
        $this->success('清除成功');
    }

    /**
     * 添加权限
     * @return array|mixed|\think\response\Json
     */
    public function ruleAdd(){
        if(request()->isPost()){
            $data = input('post.');
            $data['title_text']=$data['title_text']?:$data['title'];

            $res=Db::name('auth_rule')->get(['title_text'=>$data['title_text']]);
            if($res){
                return json(['code' => 0, 'msg' =>'菜单名称已存在！']);
            }
            $data['addtime'] = time();
            authRule::create($data);
            cache('MenusData', NULL);
            cache('authRuleList', NULL);
            cache('addAuthRuleList', NULL);
            return $result = ['code'=>1,'msg'=>'权限添加成功!','url'=>url('adminRule')];
        }else{
            $nav = new Leftnav();
            $arr = cache('addAuthRuleList');
            if(!$arr){
                $authRule = authRule::all(function($query){
                    $query->order('sort', 'asc');
                });
                $arr = $nav->menu($authRule);
                cache('addAuthRuleList', $arr, 3600);
            }
            $this->assign('admin_rule',$arr);//权限列表
            return $this->fetch();
        }
    }
    /**
     * 编辑
     * @return mixed|\think\response\Json
     */
    public function ruleEdit(){
        if(request()->isPost()) {
            $datas = input('post.');
            $datas['title_text']=$datas['title_text']?:$datas['title'];
            $info=Db::name('auth_rule')->get(['id'=>input('id')]);
            if($datas['title_text']!=$info['title_text']){
                $res=Db::name('auth_rule')->get(['title_text'=>$datas['title_text']]);
                if($res){
                    return json(['code' => 0, 'msg' =>'菜单名称已存在！']);
                }
            }

            if(authRule::update($datas)) {
                cache('MenusData', NULL);
                cache('authRuleList', NULL);
                cache('addAuthRuleList', NULL);
                return json(['code' => 1, 'msg' => '保存成功!', 'url' => url('adminRule')]);
            } else {
                return json(['code' => 0, 'msg' =>'保存失败！']);
            }
        }else{
            $nav = new Leftnav();
            $arr = cache('addAuthRuleList');
            if(!$arr){
                $authRule = authRule::all(function($query){
                    $query->order('sort', 'asc');
                });
                $arr = $nav->menu($authRule);
                cache('addAuthRuleList', $arr, 3600);
            }
            $this->assign('admin_rule',$arr);//权限列表

            $admin_rule = authRule::get(function($query){
                $query->where(['id'=>input('id')])->field('id,pid,href,title,icon,sort,menustatus,title_text');
            });
            $this->assign('rule',$admin_rule);
            return $this->fetch();
        }
    }
    /**
     * 排序
     * @return array
     */
    public function ruleOrder(){
        $auth_rule=db('auth_rule');
        $data = input('post.');
        if($auth_rule->update($data)!==false){
            cache('authRuleList', NULL);
            cache('MenusData', NULL);
            cache('addAuthRuleList', NULL);
            return $result = ['code'=>1,'msg'=>'排序更新成功!','url'=>url('adminRule')];
        }else{
            return $result = ['code'=>0,'msg'=>'排序更新失败!'];
        }
    }

    /**
     * 设置权限菜单显示或者隐藏
     * @return array
     */
    public function ruleState(){
        $id=input('post.id');
        $menustatus=input('post.menustatus');
        if(db('auth_rule')->where('id='.$id)->update(['menustatus'=>$menustatus])!==false){
            cache('MenusData', NULL);
            cache('authRuleList', NULL);
            cache('addAuthRuleList', NULL);
            return ['status'=>1,'msg'=>'设置成功!'];
        }else{
            return ['status'=>0,'msg'=>'设置失败!'];
        }
    }

    /**
     * 设置权限是否验证
     * @return array
     */
    public function ruleTz(){
        $id=input('post.id');
        $authopen=input('post.authopen');
        if(db('auth_rule')->where('id='.$id)->update(['authopen'=>$authopen])!==false){
            cache('MenusData', NULL);
            cache('authRuleList', NULL);
            cache('addAuthRuleList', NULL);
            return ['status'=>1,'msg'=>'设置成功!'];
        }else{
            return ['status'=>0,'msg'=>'设置失败!'];
        }
    }

    /**
     * 删除权限
     * @return array
     */
    public function ruleDel(){
        authRule::destroy(['id'=>input('param.id')]);
        cache('MenusData', NULL);
        cache('authRuleList', NULL);
        cache('addAuthRuleList', NULL);
        return $result = ['code'=>1,'msg'=>'删除成功!'];
    }


}