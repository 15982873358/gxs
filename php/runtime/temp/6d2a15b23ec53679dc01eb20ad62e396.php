<?php /*a:3:{s:72:"G:\works\ectocyst\www.gxs.com\php\application\admin\view\index\main.html";i:1620358111;s:73:"G:\works\ectocyst\www.gxs.com\php\application\admin\view\common\head.html";i:1620356003;s:73:"G:\works\ectocyst\www.gxs.com\php\application\admin\view\common\foot.html";i:1620374453;}*/ ?>
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
<link rel="stylesheet" href="/static/layui/css/admin.css" media="all" />
<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-sm6 layui-col-md6">
            <div class="layui-card">
                <div class="layui-card-header">
                    用户量
                    <span class="layui-badge layui-bg-blue layuiadmin-badge">今日活跃</span>
                </div>
                <div class="layui-card-body layuiadmin-card-list">
                    <p class="layuiadmin-big-font"><?php echo htmlentities($data['memberDayNum']); ?></p>
                    <p>
                        总用户
                        <span class="layuiadmin-span-color"><?php echo htmlentities($data['memberNum']); ?><i class="layui-inline layui-icon layui-icon-flag"></i></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="layui-col-sm6 layui-col-md6">
            <div class="layui-card">
                <div class="layui-card-header">
                    活动量
                    <span class="layui-badge layui-bg-orange layuiadmin-badge">进行中</span>
                </div>
                <div class="layui-card-body layuiadmin-card-list">

                    <p class="layuiadmin-big-font"><?php echo htmlentities($data['activityWayNum']); ?></p>
                    <p>
                        总活动
                        <span class="layuiadmin-span-color"><?php echo htmlentities($data['activityNum']); ?><i class="layui-inline layui-icon layui-icon-user"></i></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="layui-col-sm12">
            <div class="layui-card">
                <div class="layui-card-header">
                    平台收支
                    <div class="layui-btn-group layuiadmin-btn-group">
                        <!--<a href="javascript:;" class="layui-btn layui-btn-primary layui-btn-xs">去年</a>-->
                        <!--<a href="javascript:;" class="layui-btn layui-btn-primary layui-btn-xs">今年</a>-->
                    </div>
                </div>
                <div class="layui-card-body">
                    <div class="layui-row">
                        <div class="layui-col-sm8">
                            <div class="layui-carousel layadmin-carousel layadmin-dataview" data-anim="fade" lay-filter="LAY-index-pagetwo">
                                <div id="eventContainer" style="height: 100%"></div>
                            </div>
                        </div>
                        <div class="layui-col-sm4">
                            <div class="layui-card">
                                <div class="layui-card-header">
                                    待审核的活动
                                    <span class="layui-badge layui-bg-orange layuiadmin-badge">总</span>
                                </div>
                                <div class="layui-card-body layuiadmin-card-list">
                                    <table class="layui-table layuiadmin-page-table" lay-skin="line">
                                        <thead>
                                        <tr>
                                            <th>活动名称</th>
                                            <th>发布时间</th>
                                            <th>发布者</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(is_array($data['activityList']) || $data['activityList'] instanceof \think\Collection || $data['activityList'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['activityList'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <tr>
                                            <td><span class="first"><a href="<?php echo htmlentities($vo['url']); ?>" target="_blank"><?php echo htmlentities($vo['title']); ?></a></span></td>
                                            <td><span><?php echo strtotime("m-d H:i",$vo['add_time']); ?></span></td>
                                            <td><?php echo htmlentities($vo['author']); ?> <i class="layui-icon layui-icon-fire"></i></td>
                                        </tr>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="admin-main layui-anim layui-anim-upbit">

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
<script type="text/javascript" src="/static/admin/js/echarts/echarts.min.js"></script>
<script>
    layui.use(['element','table'], function(){

    });
</script>
<script type="text/javascript">


    // 平台收益与支出
    var eventChart = echarts.init(document.getElementById('eventContainer'));

    // 指定图表的配置项和数据
    var eventOption = {
        title: {
            text: '平台收支（月）',
            left: 'center'
        },
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b} : {c}'
        },
        legend: {
            left: 'left',
            data: ['收入','支出']
        },
        xAxis: {
            type: 'category',
            name: 'x',
            splitLine: {show: false},
            data:[]
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        yAxis: {
            type: 'value'
        },
        dataZoom: [{
            type: 'inside',
            show: true, //flase直接隐藏图形
            xAxisIndex: [0],
            start: 0,//滚动条的起始位置
            end: 100 //滚动条的截止位置（按比例分割你的柱状图x轴长度）
        }],
        series: [
            {
                name: '收入金额（元）',
                type: 'line',
                data: <?php echo htmlentities($data['date']); ?>
            },
            {
                name: '支出金额（元）',
                type: 'line',
                data: <?php echo htmlentities($data['orderAmount']); ?>
            }
        ]
    };
    eventChart.setOption(eventOption);
</script>
</body>
</html>