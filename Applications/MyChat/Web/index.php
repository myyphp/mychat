<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyChat</title>
    <link href="/Public/css/style.css" rel="stylesheet">
</head>
<body>

<div class="box">
    <form onsubmit="onSubmit(); return false;">
    <div class="talk">
        <div class="say">
            <div class="talk_show" id="show_msg">
                <!--对话内容展示-->
            </div>
            <div class="choose_user">
                <select name="cars">
                    <option value="1">圣泉山人</option>
                    <option value="2">足迹</option>
                </select>
            </div>
        </div>
    </div>
    <div class="users">
        <!--在线用户展现-->
        faf
    </div>
    <div class="talk_in" >
        <!--聊天信息输入-->
        <textarea name="" id="talkin" cols="80" rows="10"></textarea>
        <span class="post"><input type="submit" value="发送"></span>
    </div>
    </form>
</div>

<script type="text/javascript">
    var websocket;
    window.onload = web_init;

    function web_init() {
        initWebSocket();
    }

    /**
     * 初始化用户名
     */
    function initUserName() {
        var userName;
        userName = window.prompt("请输入您的昵称");
        //对昵称进行合法性处理 略...
        //记录到cookie
        $.cookie("name", userName, 3600);
    }

    /**
     * 发送消息时的逻辑处理
     */
    function onSubmit() {
        var msg;
        msg = $('#talkin').val();
        websocket.send(msg);
        $('#talkin').val('');
    }

    /**
     * websocket初始化
     */
    function initWebSocket() {
        if (window.WebSocket != undefined) {
            websocket = new WebSocket("ws://"+document.domain+":8282");
            websocket.onopen = onopen;
            websocket.onerror = onerr;
            websocket.onclose = onclose;
            websocket.onmessage = onmsg;
        }else{
            alert("该浏览器不支持websocket协议，建议使用进行升级或者使用其他浏览器！");
        }
    };


    function onopen() {
        console . log ( 'SUCCESS');
        initUserName();
    }
    function onerr() {
        //连接失败
        console . log ( 'ERR');
    }
    function onclose() {
        //连接断开
        console . log ( 'CLOSE');
    };

    function onmsg(msg) {
        //消息接收
        var data = eval("("+msg.data+")");
        switch (data['type'] == 'user_list') {

        }

        $("#show_msg").append(msg);
    }
</script>
<script type="text/javascript" src="/public/js/jquery.js"></script>
<script type="text/javascript" src="/public/js/jquery.cookie.js"></script>
</body>
</html>



