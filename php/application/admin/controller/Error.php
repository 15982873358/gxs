<?php
namespace app\admin\controller;
use \app\common\controller\Backend;
use think\Db;

class Error extends Backend{
    /**
     * 初始化
     */
    public function initialize()
    {

        $this->error('空操作，返回上次访问页面中...');
    }

}