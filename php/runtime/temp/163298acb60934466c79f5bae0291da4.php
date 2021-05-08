<?php /*a:3:{s:75:"G:\works\ectocyst\www.gxs.com\php\application\admin\view\system\upload.html";i:1620379729;s:73:"G:\works\ectocyst\www.gxs.com\php\application\admin\view\common\head.html";i:1620356003;s:73:"G:\works\ectocyst\www.gxs.com\php\application\admin\view\common\foot.html";i:1620374453;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo config('sys_name'); ?>后台管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/static/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="/static/admin/css/global.css" media="all">
    <link rel="stylesheet" href="/static/common/css/font.css" media="all">
</head>
<body class="skin-<?php if(!empty($_COOKIE['skin'])){echo $_COOKIE['skin'];}else{echo '0';setcookie('skin','0');}?>">
<div class="admin-main layui-anim layui-anim-upbit">
    <fieldset class="layui-elem-field layui-field-title">
        <legend>文件存储配置</legend>
    </fieldset>
    <form class="layui-form layui-form-pane" lay-filter="form-upload">
        <div class="layui-form-item">
            <label class="layui-form-label">存储方式</label>
            <div class="layui-input-block" id="type">

                <input type="radio" name="type" value="1"  lay-filter="type" title="七牛云">
                <input type="radio" name="type" value="2"  lay-filter="type" title="本地存储" >
                <input type="radio" name="type" value="3"  lay-filter="type" title="阿里云OSS">
            </div>
        </div>
        <div class="type type-1">
            <div class="layui-form-item">
                <label class="layui-form-label">AccessKey</label>
                <div class="layui-input-4">
                    <input type="text" name="accessKey" placeholder="AccessKey" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">SecretKey</label>
                <div class="layui-input-4">
                    <input type="text" name="secrectKey" placeholder="SecretKey" value="" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">空间域名</label>
                <div class="layui-input-4">
                    <input type="text" name="domain" placeholder="空间域名" value="" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">空间名称</label>
                <div class="layui-input-4">
                    <input type="text" name="bucket" placeholder="空间名称" value="" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">空间目录</label>
                <div class="layui-input-4">
                    <input type="text" name="dir"  placeholder="目录" value="" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">上传域名</label>
                <div class="layui-input-4">
                    <input type="text" name="uuploaddomain" placeholder="上传域名" value="" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">上传目录</label>
                <div class="layui-input-4">
                    <input type="layui-input-4" name="udir"  placeholder="上传目录" value="" class="layui-input">
                </div>
            </div>
        </div>

        <div class="type type-2">
            <div class="layui-form-item">
                <label class="layui-form-label">HOST</label>
                <div class="layui-input-4">
                    <input type="text" name="username" placeholder="HOST" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">端口号</label>
                <div class="layui-input-4">
                    <input type="text" name="port" placeholder="端口号" value="" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">根目录</label>
                <div class="layui-input-4">
                    <input type="text" name="rootPath" placeholder="根目录" value="" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">服务器域名</label>
                <div class="layui-input-4">
                    <input type="text" name="hosturls"  placeholder="服务器域名" value="" class="layui-input">
                    <span >多条用|分隔，如：http://img1.test.com|http://img2.test.com</span>
                </div>
            </div>
        </div>
        <div class="type type-3">
            <div class="layui-form-item">
                <label class="layui-form-label">AccessKey</label>
                <div class="layui-input-4">
                    <input type="text" name="aly_accessKey" placeholder="AccessKey" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">SecretKey</label>
                <div class="layui-input-4">
                    <input type="text" name="aly_secrectKey" placeholder="SecretKey" value="" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">空间域名</label>
                <div class="layui-input-4">
                    <input type="text" name="aly_domain" placeholder="空间域名" value="" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">空间名称</label>
                <div class="layui-input-4">
                    <input type="text" name="aly_bucket" placeholder="空间名称" value="" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">空间目录</label>
                <div class="layui-input-4">
                    <input type="text" name="aly_dir"  placeholder="目录" value="" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">上传域名</label>
                <div class="layui-input-4">
                    <input type="text" name="aly_uuploaddomain" placeholder="上传域名" value="" class="layui-input">
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="button" class="layui-btn" lay-submit="" lay-filter="submit">提 交</button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="/static/layui/layui.js"></script>
<script>
    function backClose(){
        var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
        if(index){
            parent.layer.close(index);
        }else{
            window.history.go(-1);
        }
    }
    layui.use(['form', 'layer','element','request'], function () {
        var $= layui.jquery;
        $('body').on('mouseover','.js-thumb-img',function(){
            var th=$(this);
            var height=th.data('height')?th.data('height'):100;
            layer.tips('<img src="'+th.attr('src')+'" style="max-width: 800px;max-height: '+height+'px">',th,{tips: [1, '#fff']});
        });
        $('body').on('mouseout','.js-thumb-img',function(){
            layer.closeAll();
        });
    })

</script>
<script>
    var infoJson = <?php echo $infoJson; ?>;
    layui.use(['form', 'layer'], function () {
        var form = layui.form,layer = layui.layer,$= layui.jquery;
        //回显渲染
        form.val("form-upload", infoJson)
        $('.type').hide();
        $('.type-'+infoJson.type).show();
        //监听指定开关
        form.on('radio(type)', function (data) {
            $('.type').hide();
            $('.type-'+data.value).show();
        });
        //提交监听
        form.on('submit(submit)', function (data) {
            var loading =layer.load(1, {shade: [0.1,'#fff']});
            $.post("<?php echo url('upload'); ?>",data.field,function(res){
                layer.close(loading);
                if(res.code > 0){
                    layer.msg(res.msg,{icon: 1, time: 1000});
                }else{
                    layer.msg(res.msg,{icon: 2, time: 1000});
                }
            });
        })
    })
</script>
</body>
</html>