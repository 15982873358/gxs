<?php
function leftnav($cate , $lefthtml = '|— ' , $pid=0 , $lvl=0, $leftpin=0 ){
    $arr=array();
    foreach ($cate as $v){
        if($v['pid']==$pid){
            $v['lvl']=$lvl + 1;
            $v['leftpin']=$leftpin + 0;
            $v['lefthtml']=str_repeat($lefthtml,$lvl);
            $v['ltitle']=$v['lefthtml'].$v['title'];
            $arr[]=$v;
            $arr= array_merge($arr,leftnav($cate,$lefthtml,$v['id'], $lvl+1 ,$leftpin+20));
        }
    }
    return $arr;
}