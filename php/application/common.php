<?php

/**
 * 密码加密
 * @param $pw
 * @return string
 */
function sp_password($pw){
    $decor=md5("wp");
    $mi=md5($pw);
    return substr($decor,0,12).$mi.substr($decor,-4,4);
}

/**
 * PHP格式化字节大小
 * @param  number $size      字节数
 * @param  string $delimiter 数字和单位分隔符
 * @return string            格式化后的带单位的大小
 */
function format_bytes($size, $delimiter = '') {
    $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
    for ($i = 0; $size >= 1024 && $i < 5; $i++) $size /= 1024;
    return round($size, 2) . $delimiter . $units[$i];
}

/**
+----------------------------------------------------------
 * 产生随机字串，可用来自动生成密码 默认长度6位 字母和数字混合
+----------------------------------------------------------
 * @param string $len 长度
 * @param string $type 字串类型
 * 0 字母 1 数字 其它 混合
 * @param string $addChars 额外字符
+----------------------------------------------------------
 * @return string
+----------------------------------------------------------
 */
function rand_string($len=6,$type='',$addChars='') {
    $str ='';
    switch($type) {
        case 0:
            $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.$addChars;
            break;
        case 1:
            $chars= str_repeat('0123456789',3);
            break;
        case 2:
            $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZ'.$addChars;
            break;
        case 3:
            $chars='abcdefghijklmnopqrstuvwxyz'.$addChars;
            break;
        case 4:
            $chars = "们以我到他会作时要动国产的一是工就年阶义发成部民可出能方进在了不和有大这主中人上为来分生对于学下级地个用同行面说种过命度革而多子后自社加小机也经力线本电高量长党得实家定深法表着水理化争现所二起政三好十战无农使性前等反体合斗路图把结第里正新开论之物从当两些还天资事队批点育重其思与间内去因件日利相由压员气业代全组数果期导平各基或月毛然如应形想制心样干都向变关问比展那它最及外没看治提五解系林者米群头意只明四道马认次文通但条较克又公孔领军流入接席位情运器并飞原油放立题质指建区验活众很教决特此常石强极土少已根共直团统式转别造切九你取西持总料连任志观调七么山程百报更见必真保热委手改管处己将修支识病象几先老光专什六型具示复安带每东增则完风回南广劳轮科北打积车计给节做务被整联步类集号列温装即毫知轴研单色坚据速防史拉世设达尔场织历花受求传口断况采精金界品判参层止边清至万确究书术状厂须离再目海交权且儿青才证低越际八试规斯近注办布门铁需走议县兵固除般引齿千胜细影济白格效置推空配刀叶率述今选养德话查差半敌始片施响收华觉备名红续均药标记难存测士身紧液派准斤角降维板许破述技消底床田势端感往神便贺村构照容非搞亚磨族火段算适讲按值美态黄易彪服早班麦削信排台声该击素张密害侯草何树肥继右属市严径螺检左页抗苏显苦英快称坏移约巴材省黑武培著河帝仅针怎植京助升王眼她抓含苗副杂普谈围食射源例致酸旧却充足短划剂宣环落首尺波承粉践府鱼随考刻靠够满夫失包住促枝局菌杆周护岩师举曲春元超负砂封换太模贫减阳扬江析亩木言球朝医校古呢稻宋听唯输滑站另卫字鼓刚写刘微略范供阿块某功套友限项余倒卷创律雨让骨远帮初皮播优占死毒圈伟季训控激找叫云互跟裂粮粒母练塞钢顶策双留误础吸阻故寸盾晚丝女散焊功株亲院冷彻弹错散商视艺灭版烈零室轻血倍缺厘泵察绝富城冲喷壤简否柱李望盘磁雄似困巩益洲脱投送奴侧润盖挥距触星松送获兴独官混纪依未突架宽冬章湿偏纹吃执阀矿寨责熟稳夺硬价努翻奇甲预职评读背协损棉侵灰虽矛厚罗泥辟告卵箱掌氧恩爱停曾溶营终纲孟钱待尽俄缩沙退陈讨奋械载胞幼哪剥迫旋征槽倒握担仍呀鲜吧卡粗介钻逐弱脚怕盐末阴丰雾冠丙街莱贝辐肠付吉渗瑞惊顿挤秒悬姆烂森糖圣凹陶词迟蚕亿矩康遵牧遭幅园腔订香肉弟屋敏恢忘编印蜂急拿扩伤飞露核缘游振操央伍域甚迅辉异序免纸夜乡久隶缸夹念兰映沟乙吗儒杀汽磷艰晶插埃燃欢铁补咱芽永瓦倾阵碳演威附牙芽永瓦斜灌欧献顺猪洋腐请透司危括脉宜笑若尾束壮暴企菜穗楚汉愈绿拖牛份染既秋遍锻玉夏疗尖殖井费州访吹荣铜沿替滚客召旱悟刺脑措贯藏敢令隙炉壳硫煤迎铸粘探临薄旬善福纵择礼愿伏残雷延烟句纯渐耕跑泽慢栽鲁赤繁境潮横掉锥希池败船假亮谓托伙哲怀割摆贡呈劲财仪沉炼麻罪祖息车穿货销齐鼠抽画饲龙库守筑房歌寒喜哥洗蚀废纳腹乎录镜妇恶脂庄擦险赞钟摇典柄辩竹谷卖乱虚桥奥伯赶垂途额壁网截野遗静谋弄挂课镇妄盛耐援扎虑键归符庆聚绕摩忙舞遇索顾胶羊湖钉仁音迹碎伸灯避泛亡答勇频皇柳哈揭甘诺概宪浓岛袭谁洪谢炮浇斑讯懂灵蛋闭孩释乳巨徒私银伊景坦累匀霉杜乐勒隔弯绩招绍胡呼痛峰零柴簧午跳居尚丁秦稍追梁折耗碱殊岗挖氏刃剧堆赫荷胸衡勤膜篇登驻案刊秧缓凸役剪川雪链渔啦脸户洛孢勃盟买杨宗焦赛旗滤硅炭股坐蒸凝竟陷枪黎救冒暗洞犯筒您宋弧爆谬涂味津臂障褐陆啊健尊豆拔莫抵桑坡缝警挑污冰柬嘴啥饭塑寄赵喊垫丹渡耳刨虎笔稀昆浪萨茶滴浅拥穴覆伦娘吨浸袖珠雌妈紫戏塔锤震岁貌洁剖牢锋疑霸闪埔猛诉刷狠忽灾闹乔唐漏闻沈熔氯荒茎男凡抢像浆旁玻亦忠唱蒙予纷捕锁尤乘乌智淡允叛畜俘摸锈扫毕璃宝芯爷鉴秘净蒋钙肩腾枯抛轨堂拌爸循诱祝励肯酒绳穷塘燥泡袋朗喂铝软渠颗惯贸粪综墙趋彼届墨碍启逆卸航衣孙龄岭骗休借".$addChars;
            break;
        default :
            // 默认去掉了容易混淆的字符oOLl和数字01，要添加请使用addChars参数
            $chars='ABCDEFGHIJKMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789'.$addChars;
            break;
    }
    if($len>10 ) {//位数过长重复字符串一定次数
        $chars= $type==1? str_repeat($chars,$len) : str_repeat($chars,5);
    }
    if($type!=4) {
        $chars   =   str_shuffle($chars);
        $str     =   substr($chars,0,$len);
    }else{
        // 中文随机字
        for($i=0;$i<$len;$i++){
            $str.= msubstr($chars, floor(mt_rand(0,mb_strlen($chars,'utf-8')-1)),1);
        }
    }
    return $str;
}

/**
 * 验证输入的邮件地址是否合法
 * @param $user_email
 * @return bool
 */
function is_email($user_email)
{
    if(!$user_email){
        return false;
    }
    $chars = "/^([a-z0-9+_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,6}\$/i";
    if (strpos($user_email, '@') !== false && strpos($user_email, '.') !== false) {
        if (preg_match($chars, $user_email)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
/**
 * 验证输入的手机号码是否合法
 * @param $mobile_phone
 * @return bool
 */
function is_phone($mobile_phone)
{
    if(!$mobile_phone){
        return false;
    }
    $chars = "/^1[23456789]\\d{9}$/";
    if (preg_match($chars, $mobile_phone)) {
        return true;
    }
    return false;
}
/**
 * 取得IP
 *
 * @return string 字符串类型的返回结果
 */
function getIp(){
    if (@$_SERVER['HTTP_CLIENT_IP'] && $_SERVER['HTTP_CLIENT_IP']!='unknown') {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (@$_SERVER['HTTP_X_FORWARDED_FOR'] && $_SERVER['HTTP_X_FORWARDED_FOR']!='unknown' && isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return preg_match('/^\d[\d.]+\d$/', $ip) ? $ip : '';
}

//字符串截取
function str_cut($sourcestr,$cutlength,$suffix='...')
{
    $returnstr='';
    $i=0;
    $n=0;
    $str_length=strlen($sourcestr);//字符串的字节数
    while (($n<$cutlength) and ($i<=$str_length))
    {
        $temp_str=substr($sourcestr,$i,1);
        $ascnum=Ord($temp_str);//得到字符串中第$i位字符的ascii码
        if ($ascnum>=224)    //如果ASCII位高与224，
        {
            $returnstr=$returnstr.substr($sourcestr,$i,3); //根据UTF-8编码规范，将3个连续的字符计为单个字符
            $i=$i+3;            //实际Byte计为3
            $n++;            //字串长度计1
        }
        elseif ($ascnum>=192) //如果ASCII位高与192，
        {
            $returnstr=$returnstr.substr($sourcestr,$i,2); //根据UTF-8编码规范，将2个连续的字符计为单个字符
            $i=$i+2;            //实际Byte计为2
            $n++;            //字串长度计1
        }
        elseif ($ascnum>=65 && $ascnum<=90) //如果是大写字母，
        {
            $returnstr=$returnstr.substr($sourcestr,$i,1);
            $i=$i+1;            //实际的Byte数仍计1个
            $n++;            //但考虑整体美观，大写字母计成一个高位字符
        }
        else                //其他情况下，包括小写字母和半角标点符号，
        {
            $returnstr=$returnstr.substr($sourcestr,$i,1);
            $i=$i+1;            //实际的Byte数计1个
            $n=$n+0.5;        //小写字母和半角标点等与半个高位字符宽...
        }
    }
    if ($n>$cutlength){
        $returnstr = $returnstr . $suffix;//超过长度时在尾处加上省略号
    }
    return $returnstr;
}

/**
 * CURL请求
 * @param $url 请求url地址
 * @param $method $str 请求方法 get post
 * @param null $postfields post数据数组
 * @param array $headers 请求header信息
 * @param bool|false $debug  调试开启 默认false
 * @return mixed
 */
function curl($url, $method='GET', $postfields = null, $headers = array(), $debug = false) {
    $method = strtoupper($method);
    $ci = curl_init();
    /* Curl settings */
    curl_setopt($ci, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
    curl_setopt($ci, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.2; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0");
    curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 60); /* 在发起连接前等待的时间，如果设置为0，则无限等待 */
    curl_setopt($ci, CURLOPT_TIMEOUT, 7); /* 设置cURL允许执行的最长秒数 */
    curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);
    switch ($method) {
        case "POST":
            curl_setopt($ci, CURLOPT_POST, true);
            if (!empty($postfields)) {
                $tmpdatastr = is_array($postfields) ? http_build_query($postfields) : $postfields;
                curl_setopt($ci, CURLOPT_POSTFIELDS, $tmpdatastr);
            }
            break;
        default:
            curl_setopt($ci, CURLOPT_CUSTOMREQUEST, $method); /* //设置请求方式 */
            break;
    }
    $ssl = preg_match('/^https:\/\//i',$url) ? TRUE : FALSE;
    curl_setopt($ci, CURLOPT_URL, $url);
    if($ssl){
        curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
        curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, FALSE); // 不从证书中检查SSL加密算法是否存在
    }
    //curl_setopt($ci, CURLOPT_HEADER, true); /*启用时会将头文件的信息作为数据流输出*/
    //curl_setopt($ci, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ci, CURLOPT_MAXREDIRS, 2);/*指定最多的HTTP重定向的数量，这个选项是和CURLOPT_FOLLOWLOCATION一起使用的*/
    curl_setopt($ci, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ci, CURLINFO_HEADER_OUT, true);
    /*curl_setopt($ci, CURLOPT_COOKIE, $Cookiestr); * *COOKIE带过去** */
    $response = curl_exec($ci);
    $requestinfo = curl_getinfo($ci);
    $http_code = curl_getinfo($ci, CURLINFO_HTTP_CODE);
    if ($debug) {
        echo "=====post data======\r\n";
        var_dump($postfields);
        echo "=====info===== \r\n";
        print_r($requestinfo);
        echo "=====response=====\r\n";
        print_r($response);
    }
    curl_close($ci);
    return $response;
    //return array($http_code, $response,$requestinfo);
}
/**
 * @param $arr
 * @param $key_name
 * @return array
 * 将数据库中查出的列表以指定的 id 作为数组的键名
 */
function convert_arr_key($arr, $key_name)
{
    $arr2 = array();
    foreach($arr as $key => $val){
        $arr2[$val[$key_name]] = $val;
    }
    return $arr2;
}


/**
 * 查询IP地址
 * @param string $ip
 * @return bool|mixed
 */
function getCity($ip = ''){
    $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);
    if(empty($res)){ return false; }
    $jsonMatches = array();
    preg_match('#\{.+?\}#', $res, $jsonMatches);
    if(!isset($jsonMatches[0])){ return false; }
    $json = json_decode($jsonMatches[0], true);
    if(isset($json['ret']) && $json['ret'] == 1){
        $json['ip'] = $ip;
        unset($json['ret']);
    }else{
        return false;
    }
    return $json;
}

/**
 * 判断图片的类型从而设置图片路径
 * @param $url
 * @param string $default
 * @return string
 */
function getImgUrl($url,$default='/static/admin/images/tong.png'){
    if(empty($url))
    {
        return  $default;
    }

    if(strpos($url,'http')===False or strpos($url,'https')){
        $url = request()->domain(true)."/".$url;
    }
    return $url;
}

/**
 * 判断当前访问的用户是  PC端  还是 手机端  返回true 为手机端  false 为PC 端
 *  是否移动端访问访问
 * @return boolean
 */
function isMobile()
{
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
        return true;

    // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
    if (isset ($_SERVER['HTTP_VIA']))
    {
        // 找不到为flase,否则为true
        return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
    }
    // 脑残法，判断手机发送的客户端标志,兼容性有待提高
    if (isset ($_SERVER['HTTP_USER_AGENT']))
    {
        $clientkeywords = array ('nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile');
        // 从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
            return true;
    }
    // 协议法，因为有可能不准确，放到最后判断
    if (isset ($_SERVER['HTTP_ACCEPT']))
    {
        // 如果只支持wml并且不支持html那一定是移动设备
        // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html'))))
        {
            return true;
        }
    }
    return false;
}


function isWechat() {
    $U_G = empty($_SERVER['HTTP_USER_AGENT']) ? '' : $_SERVER['HTTP_USER_AGENT'];
    $U_G = strtolower($U_G);

    if(empty($U_G) or (strpos($U_G, 'micromessenger')===False))
    {
        return False;
    }
    return True;
}



/**
 * 邮件发送
 * @param $to 接收人
 * @param string $subject 邮件标题
 * @param string $content 邮件内容(html模板渲染后的内容)
 * @param array $attachmentFile 文件
 * @return bool
 * @throws Exception
 * @throws \PHPMailer\PHPMailer\Exception
 */
function send_email($to,$subject='',$content='',$attachmentFile=[]){
    //获取配置文件
    $emailConfig=systemConfig('email');

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->CharSet  = 'UTF-8'; //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    //调试输出格式
    //$mail->Debugoutput = 'html';
    //smtp服务器
    $mail->Host = $emailConfig['smtp_server'];
    //端口 - likely to be 25, 465 or 587
    $mail->Port = $emailConfig['smtp_port'];

    if($mail->Port == '465') {
        $mail->SMTPSecure = 'ssl';
    }// 使用安全协议
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //发送邮箱
    $mail->Username = $emailConfig['smtp_user'];
    //密码
    $mail->Password = $emailConfig['smtp_pwd'];
    //Set who the message is to be sent from
    $mail->setFrom($emailConfig['smtp_user'],$emailConfig['email_id']);
    //回复地址
    //$mail->addReplyTo('replyto@example.com', 'First Last');
    //接收邮件方
    if(is_array($to)){
        foreach ($to as $v){
            $mail->addAddress($v);
        }
    }else{
        $mail->AddAddress($to);
    }

    $mail->isHTML(true);// send as HTML
    //标题
    $mail->Subject = $subject;
    //HTML内容转换
    $mail->msgHTML($content);

    foreach($attachmentFile as $k=>$v){
        $mail->addAttachment($v['path'],$v['name']);//这里可以是多维数组，然后循环附件的文件和名称
    }

    return $mail->send();
}

/**
 * 隐藏手机号
 * @param $phone
 * @return string
 */
function sercetPhone($phone){
    if(!$phone){
        return false;
    }
    return substr($phone,0,3).'*****'.substr($phone,-3,3);
}
/**
 * 去除HTML
 * @param $string
 * @return bool
 */
function clean_html(&$string)
{
    if (! is_array ( $string ))
    {
        $string = strip_tags($string);
        $string = trim(htmlspecialchars($string,ENT_QUOTES));
        $string = str_replace('&nbsp;','',$string);
        return True;
    }
    $keys = array_keys ( $string );
    foreach ( $keys as $key )
    {
        clean_html ( $string [$key]);
    }
}
/**
 * 清除XSS
 * @param $string
 * @param bool $simple
 * @param bool $QT
 * @return bool
 */
function clean_xss(&$string, $simple = False,$QT=True)
{
    if (! is_array ( $string ))
    {
        $string = trim ( $string );
        $string = $QT ? htmlspecialchars ( $string,ENT_QUOTES) : htmlspecialchars($string);

        if ($simple)
        {
            return True;
        }

        $string = strip_tags ( $string );
        $string = str_replace ( array (
            '"',
            "\\",
            "'",
            "/",
            "..",
            "../",
            "./",
            "//"
        ), '', $string );
        $no = '/%0[0-8bcef]/';
        $string = preg_replace ( $no, '', $string );
        $no = '/%1[0-9a-f]/';
        $string = preg_replace ( $no, '', $string );
        $no = '/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S';
        $string = preg_replace ( $no, '', $string );
        return True;
    }
    $keys = array_keys ( $string );
    foreach ( $keys as $key )
    {
        clean_xss ( $string [$key], $simple,$QT);
    }
}


/**
 *  * 修正（旋转图像）
 * @param $imgPath 图像路径
 * @param bool $degrees 旋转角度
 * @return bool
 */
function correctImageAngle($imgPath,$degrees=False)
{
    $ext = '';
    if($degrees===False)
    {
        //则直接看图像是否倒置了，
        if(!function_exists('exif_read_data'))
        {
            //exif_read_data 能获取图像中所有exif信息
            //需要 php_mbstring.dll  php_exif.dll 扩展，且php_exif.dll依赖于mbstring
            return False;
        }

        //获取exif信息中的Orientation参数
        $exif = exif_read_data ($imgPath, 0, true );
        if($exif===False)
        {
            return False;
        }

        $orientation=0;
        foreach ( $exif as $key => $section )
        {
            foreach ( $section as $name => $val )
            {
                if($name=='MimeType')
                {
                    $ext = explode('/',$val);
                    $ext = end($ext);
                }
                //echo "$key.$name: $val<br />\n";
                if($name=='Orientation')
                {
                    $orientation = $val;
                    break;
                }
            }
        }

        //echo $orientation;exit;
        if($orientation==3)
        {
            $degrees=270;

        }elseif($orientation==6)
        {
            $degrees = 270;

        }elseif($orientation==8)
        {
            $degrees=90;
        }else{

            $degrees =0;
        }
    }
    //echo $degrees;exit;
    //旋转图像
    $imgSaveFun = $imgModel = NULL;
    if(empty($ext))
    {
        $ext = explode('.',$imgPath);
        $ext = end($ext);
    }
    $ext = strtolower($ext);
    switch ($ext)
    {
        case 'png':
            $imgModel = imagecreatefrompng($imgPath);
            $imgSaveFun = 'imagepng';
            break;
        case 'gif':
            $imgModel = imagecreatefromgif($imgPath);
            $imgSaveFun = 'imagegif';
            break;
        case 'wbmp':
            $imgModel = imagecreatefromwbmp($imgPath);
            $imgSaveFun='imagewbmp';
            break;
        default:
            $imgModel = imagecreatefromjpeg($imgPath);
            $imgSaveFun='imagejpeg';
    }

    $rotate = imagerotate($imgModel, $degrees, 0);

    // Output
    $imgSaveFun($rotate,$imgPath);
    return True;
}
/**
 * Ajax方式返回数据到客户端
 * @access protected
 * @param mixed $data 要返回的数据
 * @return void
 */
function ajaxReturn($data) {
    // 返回JSON数据格式到客户端 包含状态信息
    header('Content-Type:application/json; charset=utf-8');
    exit(json_encode($data));
}
/**
 * 管理员日志记录
 * @param $msg
 * @param array $admin
 * @return bool
 */
function admin_log($msg,$admin=array())
{
    if(empty($msg))
    {
        return False;
    }
    $admin=$admin?:session('admin');

    if(empty($admin))
    {
        return False;
    }
    $data = array(
        'admin'=>$admin['username'],
        'admin_id'=>$admin['id'],
        'add_time'=>date('Y-m-d H:i:s'),
        'add_times'=>time(),
        'ip'=>getIp(),
        'msg'=>$msg
    );
    db('admin_log')->insert($data);
}

/**
 * 动态配置
 * @param string $key
 * @param array $data
 * @return mixed
 */
function systemConfig($key='system',$data=[]){
    //配置文件
    $systemValue = cache("system_{$key}");
    if(!$systemValue){
        $system = db('system')->where(array('key'=>$key))->find();
        $systemValue=json_decode($system['value'],true);
        cache("system_{$key}", $systemValue);
    }
    //动态更改配置
    if($data){
        $data=array_merge($systemValue,$data);
        cache("system_{$key}", $data);
        $dataJson=json_encode($data);
        $res=db('system')->where(array('key'=>$key))->update(array('value'=>$dataJson));
        return $res;
    }else{
        return $systemValue;
    }

}


/**
 * @param $id
 * @return number
 */
function id($id)
{
    return abs(intval($id));
}
