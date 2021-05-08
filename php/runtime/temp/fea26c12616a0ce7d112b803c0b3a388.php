<?php /*a:3:{s:73:"G:\works\ectocyst\www.gxs.com\php\application\admin\view\index\index.html";i:1620374945;s:73:"G:\works\ectocyst\www.gxs.com\php\application\admin\view\common\head.html";i:1620356003;s:73:"G:\works\ectocyst\www.gxs.com\php\application\admin\view\common\foot.html";i:1620374453;}*/ ?>
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
<script>
    var ADMIN = '/static/admin';
    var navs = <?php echo $menus; ?>;
</script>
<div class="layui-layout layui-layout-admin">
    <div class="layui-header header">
        <div class="layui-main">
            <div class="admin-login-box">
                <a class="logo" style="left: 0;" href="<?php echo url('admin/index/index'); ?>">
                    <span style="font-size: 22px;"><?php echo htmlentities($system['sys_name']); ?></span>
                </a>
                <div class="admin-side-toggle fs1">
                    <span class="icon icon-menu"></span>
                </div>
                <div class="admin-side-full">
                    <span class="icon icon-enlarge"></span>
                </div>
            </div>

            <ul class="layui-nav admin-header-item" lay-filter="side-top-right">
                <li class="layui-nav-item cache" >
                    <a href="javascript:;">清除缓存</a>
                </li>
                <li class="layui-nav-item">
                    <a class="name" href="javascript:;">前端访问</a>
                    <dl class="layui-nav-child">
                        <dd><a id="wechat-btn" href="javascript:void(0);" >微信H5</a></dd>
                        <dd><a id="smallroutine-btn" href="javascript:void(0);">微信小程序</a></dd>
                        <dd><a id="mp-btn" href="javascript:void(0);">微信公众号</a></dd>
                    </dl>
                    <div style="display: none">
                        <div id="qrcodeContent"  style="padding: 20px 110px;"></div>
                        <p style="text-align: center">访问地址：<a href="<?php echo htmlentities($system['wechat_url']); ?>"  target="_blank"><?php echo htmlentities($system['wechat_url']); ?></a></p>
                    </div>
                </li>
                <li class="layui-nav-item">
                    <a class="name" href="javascript:;">主题</a>
                    <dl class="layui-nav-child">
                        <dd data-skin="0"><a href="javascript:;">默认</a></dd>
                        <dd data-skin="1"><a href="javascript:;">纯白</a></dd>
                        <dd data-skin="2"><a href="javascript:;">蓝白</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;" class="admin-header-user">
                        <?php if($admin['head_img']): ?><img src="<?php echo htmlentities($admin['head_img']); ?>" class="layui-nav-img" /><?php endif; ?>
                        <span><?php echo htmlentities($admin['username']); ?></span>
                    </a>
                    <dl class="layui-nav-child">
                        <dd>
                            <a href="<?php echo url('index/logout'); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i>注销</a>
                        </dd>
                    </dl>
                </li>
            </ul>
            <ul class="layui-nav admin-header-item-mobile">
                <li class="layui-nav-item cache">
                    <a href="javascript:;">清除缓存</a>
                </li>
                <li class="layui-nav-item">
                    <a href="<?php echo url('index/logout'); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i>注销</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="layui-side layui-bg-black" id="admin-side">
        <div class="layui-side-scroll" id="admin-navbar-side" lay-filter="side"></div>
    </div>
    <div class="layui-body" style="bottom: 0;border-left: solid 2px #1AA094;" id="admin-body">
        <div class="layui-tab admin-nav-card layui-tab-brief" lay-filter="admin-tab">
            <ul class="layui-tab-title">
                <li class="layui-this">
                    <i class="icon icon-earth" aria-hidden="true"></i>
                    <cite>控制面板</cite>
                </li>
            </ul>
            <div class="layui-tab-content" style="min-height: 150px; padding: 0;">
                <div class="layui-tab-item layui-show">
                    <iframe src="<?php echo url('main'); ?>"></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="layui-footer footer footer-demo" id="admin-footer">
        <div class="layui-main">
            <!--<p>技术支持：<a href="#"></a></p>-->
        </div>
    </div>
    <div class="site-tree-mobile layui-hide">
        <i class="layui-icon">&#xe602;</i>
    </div>
    <div class="site-mobile-shade"></div>
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
    <script src="/static/admin/js/index.js"></script>
    <script type="text/javascript" src="/static/common/js/jquery.2.1.1.min.js"></script>
    <script type="text/javascript" src="/static/common/js/jquery.qrcode.min.js"></script>
    <script>
        layui.use('layer',function(){
            var $ = layui.jquery, layer = layui.layer;
            $('.cache').click(function () {
                document.cookie="skin=;expires="+new Date().toGMTString();
                layer.confirm('确认要清除缓存？', {icon: 3}, function () {
                    $.post('<?php echo url("clear"); ?>',function (data) {
                        layer.msg(data.info, {icon: 6}, function (index) {
                            layer.close(index);
                            window.location.href = data.url;
                        });
                    });
                });
            });
            var my_msg="<?php echo session('my_msg'); ?>";
            if(!my_msg){
                layer.open({
                    type: 2,
                    area: ['50%', '60%'],
                    fixed: false,
                    title:'<i class="layui-icon layui-icon-dialogue"></i>&nbsp;消息',
//                maxmin: true,
                    content: "<?php echo url('my_msg'); ?>",
                    end : function() {

                    }
                });
            }
            $('#smallroutine-btn').click(function () {
                layer.open({
                    type: 1
                    ,title: '微信小程序二维码'
                    ,area: ['420px', '400px']
                    ,offset: 'auto' //具体配置参考：http://www.layui.com/doc/modules/layer.html#offset
                    ,id: 'layerDemo' //防止重复弹出
                    ,content:'<div style="padding: 20px 80px;"><img src="<?php echo htmlentities($system['wxapp_qrcode']); ?>" style="width: 250px;height: 250px"></div>'
                    ,btn: '好的'
                    ,btnAlign: 'c' //按钮居中
                    ,shade: 0 //不显示遮罩
                    ,yes: function(){
                        layer.closeAll();
                    }
                });
            });
            $('#mp-btn').click(function () {
                layer.open({
                    type: 1
                    ,title: '微信公众号二维码'
                    ,area: ['420px', '400px']
                    ,offset: 'auto' //具体配置参考：http://www.layui.com/doc/modules/layer.html#offset
                    ,id: 'layerDemo' //防止重复弹出
                    ,content:'<div style="padding: 20px 80px;"><img src="<?php echo htmlentities($system['mp_qrcode']); ?>" style="width: 250px;height: 250px"></div>'
                    ,btn: '好的'
                    ,btnAlign: 'c' //按钮居中
                    ,shade: 0 //不显示遮罩
                    ,yes: function(){
                        layer.closeAll();
                    }
                });
            });
            $('#wechat-btn').click(function () {
                $("#qrcodeContent").qrcode({
                    render:"table",
                    width: 200,
                    height: 200,
                    text:"<?php echo htmlentities($system['wechat_url']); ?>"
                });
                layer.open({
                    type: 1
                    ,title: '微信H5二维码'
                    ,area: ['420px', '400px']
                    ,offset: 'auto' //具体配置参考：http://www.layui.com/doc/modules/layer.html#offset
                    ,id: 'layerDemo' //防止重复弹出
                    ,content: $('#qrcodeContent').parent().html()
                    ,btn: '好的'
                    ,btnAlign: 'c' //按钮居中
                    ,shade: 0 //不显示遮罩
                    ,yes: function(){
                        layer.closeAll();
                    }
                });
            });
        })
    </script>
</div>
</body>
</html>