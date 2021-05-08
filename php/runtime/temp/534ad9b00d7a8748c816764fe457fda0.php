<?php /*a:3:{s:75:"G:\works\ectocyst\www.gxs.com\php\application\admin\view\system\wechat.html";i:1620379904;s:73:"G:\works\ectocyst\www.gxs.com\php\application\admin\view\common\head.html";i:1620356003;s:73:"G:\works\ectocyst\www.gxs.com\php\application\admin\view\common\foot.html";i:1620374453;}*/ ?>
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
        <legend>微信相关配置</legend>
    </fieldset>
    <div class="layui-tab layui-tab-card">
        <ul class="layui-tab-title">
            <li class="layui-this">小程序配置</li>
            <li>公众号配置</li>
            <li>商户配置</li>
        </ul>
        <form class="layui-form layui-form-pane layui-tab-content" lay-filter="form-system">
            <div class="layui-tab-item layui-show">
                <div class="layui-form-item">
                    <label class="layui-form-label">小程序名称</label>
                    <div class="layui-input-4">
                        <input type="text" name="wxapp_name" ng-model="field.wxapp_name"  placeholder="小程序名称" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">AppID</label>
                    <div class="layui-input-4">
                        <input type="text" name="wxapp_appid" ng-model="field.wxapp_appid"  placeholder="小程序ID" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">AppSecret</label>
                    <div class="layui-input-4">
                        <input type="text" name="wxapp_appsecret" ng-model="field.wxapp_appsecret"  placeholder="小程序密钥" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">小程序版本</label>
                    <div class="layui-input-2">
                        <input type="text" name="wxapp_version" ng-model="field.wxapp_version"  placeholder="用于判断接口返回" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">二维码</label>
                    <input type="hidden" name="wxapp_qrcode" id="wxapp_qrcode_path" value="{{field.wxapp_qrcode}}">
                    <div class="layui-input-block">
                        <div class="layui-upload">
                            <button type="button" class="layui-btn layui-btn-primary" id="wxapp_qrcode_btn"><i class="icon icon-upload3"></i>点击上传图片</button>
                            <div class="layui-inline layui-word-aux">
                                小程序访问二维码，建议：尺寸200*200px 大小1M内
                            </div>
                            <div class="layui-upload-list">
                                <img class="layui-upload-img js-thumb-img" id="wxapp_qrcode_img"  src="{{field.wxapp_qrcode}}" data-height="500" >
                                <p id="wxapp_qrcode_text"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layui-tab-item">
                <div class="layui-form-item">
                    <label class="layui-form-label">微信名称</label>
                    <div class="layui-input-4">
                        <input type="text" name="weixin_name" ng-model="field.weixin_name"  placeholder="微信名称" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">AppID</label>
                    <div class="layui-input-4">
                        <input type="text" name="weixin_appid" ng-model="field.weixin_appid"  placeholder="小程序ID" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">AppSecret</label>
                    <div class="layui-input-4">
                        <input type="text" name="weixin_appsecret" ng-model="field.weixin_appsecret"  placeholder="小程序密钥" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">二维码</label>
                    <input type="hidden" name="weixin_qrcode" id="weixin_qrcode_path" value="{{field.weixin_qrcode}}">
                    <div class="layui-input-block">
                        <div class="layui-upload">
                            <button type="button" class="layui-btn layui-btn-primary" id="weixin_qrcode_btn"><i class="icon icon-upload3"></i>点击上传图片</button>
                            <div class="layui-inline layui-word-aux" >
                                公众号二维码，建议：尺寸200*200px 大小1M内
                            </div>
                            <div class="layui-upload-list">
                                <img class="layui-upload-img js-thumb-img" id="weixin_qrcode_img"  src="{{field.weixin_qrcode}}" data-height="500" >
                                <p id="weixin_qrcode_text"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layui-tab-item">
                <div class="layui-form-item">
                    <label class="layui-form-label">商户号</label>
                    <div class="layui-input-4">
                        <input type="text" name="mch_id" ng-model="field.mch_id"  placeholder="商户号" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">API密钥</label>
                    <div class="layui-input-4">
                        <input type="text" name="mch_key" ng-model="field.mch_key"  placeholder="API密钥" class="layui-input">
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
    layui.use(['form', 'layer','upload','element'], function () {
        var form = layui.form, layer = layui.layer,$= layui.jquery,upload = layui.upload,request=layui.request;
        form.val("form-system", infoJson);//渲染表单
        $('#wxapp_qrcode_img').attr('src',infoJson.wxapp_qrcode);
        $('#weixin_qrcode_img').attr('src',infoJson.weixin_qrcode);
        //小程序图片上传
        var wxapp_qrcode_upload = upload.render({
            elem: '#wxapp_qrcode_btn'
            ,url: '<?php echo url("UpFiles/upload"); ?>'
            ,before: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    $('#wxapp_qrcode_img').attr('src', result); //图片链接（base64）
                    $('#wxapp_qrcode_text').html("正在上传");
                });
            }
            ,done: function(res){
                //上传成功
                if(res.code>0){
                    $('#wxapp_qrcode_path').val(res.url);
                    $('#wxapp_qrcode_text').html("上传成功");
                }else{
                    //如果上传失败
                    return layer.msg('上传失败');
                }
            }
            ,error: function(){
                //演示失败状态，并实现重传
                var wxapp_qrcode_text = $('#wxapp_qrcode_text');
                wxapp_qrcode_text.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                wxapp_qrcode_text.find('.demo-reload').on('click', function(){
                    wxapp_qrcode_upload.upload();
                });
            }
        });
        //公众号图片上传
        var weixin_qrcode_upload = upload.render({
            elem: '#weixin_qrcode_btn'
            ,url: '<?php echo url("UpFiles/upload"); ?>'
            ,before: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    $('#weixin_qrcode_img').attr('src', result); //图片链接（base64）
                    $('#weixin_qrcode_text').html("正在上传");
                });
            }
            ,done: function(res){
                //上传成功
                if(res.code>0){
                    $('#weixin_qrcode_path').val(res.url);
                    $('#weixin_qrcode_text').html("上传成功");
                }else{
                    //如果上传失败
                    return layer.msg('上传失败');
                }
            }
            ,error: function(){
                //演示失败状态，并实现重传
                var weixin_qrcode_text = $('#weixin_qrcode_text');
                weixin_qrcode_text.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                weixin_qrcode_text.find('.demo-reload').on('click', function(){
                    weixin_qrcode_upload.upload();
                });
            }
        });
        form.on('submit(submit)', function (data) {
            // 提交到方法 默认为本身
            var loading = layer.load(1, {shade: [0.1, '#fff']});
            request.post("<?php echo url('system'); ?>", data.field, function (res) {
                layer.close(loading);
                if (res.code > 0) {
                    layer.msg(res.msg, {time: 1800, icon: 1});
                } else {
                    layer.msg(res.msg, {time: 1800, icon: 2});
                }
            });
        })
    });
</script>
</body>
</html>