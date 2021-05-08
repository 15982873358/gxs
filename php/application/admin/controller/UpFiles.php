<?php
namespace app\admin\controller;
use \app\common\controller\Backend;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use think\Db;
class UpFiles extends Backend
{
    public $uploadConfig;
    /**
     * 初始化
     */
    public function initialize(){
        parent::initialize();
        $this->uploadConfig=systemConfig("upload");
    }
    /**
     * 单图上传
     * @return array
     */
    public function upload(){
        // 获取上传文件表单字段名
        $fileKey = array_keys(request()->file());
        // 获取表单上传文件
        $fileObj = request()->file($fileKey['0']);
        $fileInfo=$fileObj->getInfo();
        $path = 'uploads/admin/';

        if ($this->uploadConfig['type']==1) { //上传到七牛
            $auth=new Auth($this->uploadConfig['accessKey'],$this->uploadConfig['secrectKey']);
            // 生成上传 Token
            $token = $auth->uploadToken($this->uploadConfig['bucket']);
            if(empty($saveName))
            {
                $saveName = uniqid().'.png';
            }
            // 初始化 UploadManager 对象并进行文件的上传。
            $uploadMgr = new UploadManager();
            $path= "{$this->uploadConfig['dir']}{$path}$saveName";
            list($ret, $err) = $uploadMgr->putFile($token,$path, $fileInfo['tmp_name']);
            if ($err !== null) {
                return ['code' => 0, 'msg' => $err];
            }
            $url = $ret['key'];
            $absUrl=$this->uploadConfig['domain'].$ret['key'];
        }else{ //本地上传
            $fileObj = $fileObj->move($path);
            if (!$fileObj) { // 上传失败获取错误信息
                return ['code' =>0, 'msg' =>  $fileObj->getError()];
            }
            $url = $path.str_replace('\\', '/', $fileObj->getSaveName());
            $absUrl=getImgUrl($url);
            unset($fileObj);
        }
        //写入附件表
        $filesData=array(
            'name'=>$fileInfo['name'],
            'path'=>$url,
            'abs_path'=>$absUrl,
            'type'=>$fileInfo['type'],
            'size'=>$fileInfo['size'],
            'author_name'=>$this->admin['username'],
            'author_id'=>$this->admin['id'],
            'add_times'=>time(),
            'add_time'=>date('Y-m-d H:i:s')
        );
        $file_id=Db::name('files')->insertGetId($filesData);
        return ['code' => 1, 'msg' => '上传成功!', 'url' => $absUrl,'file_id'=>$file_id];
    }
    /**
     * 编辑器图上传
     * @return array
     */
    public function layeditUpload(){
        // 获取上传文件表单字段名
        $fileKey = array_keys(request()->file());
        // 获取表单上传文件
        $fileObj = request()->file($fileKey['0']);
        $fileInfo=$fileObj->getInfo();
        $path = 'uploads/layedit/';
        if ($this->uploadConfig['type']==1) { //上传到七牛
            $auth=new Auth($this->uploadConfig['accessKey'],$this->uploadConfig['secrectKey']);
            // 生成上传 Token
            $token = $auth->uploadToken($this->uploadConfig['bucket']);
            if(empty($saveName))
            {
                $saveName = uniqid().'.png';
            }
            // 初始化 UploadManager 对象并进行文件的上传。
            $uploadMgr = new UploadManager();
            $path= "{$this->uploadConfig['dir']}{$path}$saveName";
            list($ret, $err) = $uploadMgr->putFile($token,$path, $fileInfo['tmp_name']);
            if ($err !== null) {
                return ['code' => 0, 'msg' => $err];
            }
            $url = $ret['key'];
            $absUrl=$this->uploadConfig['domain'].$ret['key'];
        }else{ //本地上传
            $fileObj = $fileObj->move($path);
            if (!$fileObj) { // 上传失败获取错误信息
                return ['code' =>0, 'msg' =>  $fileObj->getError()];
            }
            $url = $path.str_replace('\\', '/', $fileObj->getSaveName());
            $absUrl=getImgUrl($url);
            unset($fileObj);
        }
        //写入附件表
        $filesData=array(
            'name'=>$fileInfo['name'],
            'path'=>$url,
            'abs_path'=>$absUrl,
            'type'=>$fileInfo['type'],
            'size'=>$fileInfo['size'],
            'author_name'=>$this->admin['username'],
            'author_id'=>$this->admin['id'],
            'add_times'=>time(),
            'add_time'=>date('Y-m-d H:i:s')
        );
        $file_id=Db::name('files')->insertGetId($filesData);
        return ['code' => 1, 'msg' => '上传成功!', 'url' => $absUrl,'file_id'=>$file_id];
    }
}