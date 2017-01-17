<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyChat</title>
    <link href="./Public/css/style.css" rel="stylesheet">
    <style type="text/css">
        body
        {
            margin: 0px;
            padding:0px;
            background: #FCFCFC;
        }
        .box
        {
            margin: auto;
            margin-top: 50px;
            width: 900px;
            height: 800px;
        }
        .talk
        {
            width: 75%;
            height: 100%;
            border-bottom: 0px red solid;
            float: left;
        }
        .users
        {
            width: 20%;
            height: 600px;
            border: 1px red solid;
            float: left;
        }
        .talk_show
        {
            height: 600px;
            border: 1px blue solid;
        }

        .talk_in
        {
            height: 190px;
            position: relative;
        }

    </style>
</head>
<body>

<div class="box">
    <form onsubmit="onSubmit(); return false;">
    <div class="talk">
        <div class="say">
            <div class="talk_show">
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
    <div class="talk_in">
        <!--聊天信息输入-->
        <textarea name="" id="" cols="80" rows="10"></textarea>
        <span class="post"><input type="submit" value="发送"></span>
    </div>
    </form>
</div>

<script type="text/javascript">
    window.onload = initWebSocket();
    function onSubmit() {
        alert(1);
    }
    function initWebSocket() {
        if (window.WebSocket != undefined) {
            websocket = new WebSocket("ws://192.168.1.122:8282");
            websocket.onopen = function() {
                alert('open');
            };
            websocket.onerror = function(event) {
                //连接失败
                console . log ( 'ERR:' + event . data );
            };
            websocket.onclose = function() {
                //连接断开
                //alert('close');
            };
            websocket.onmessage = function(message) {
                //消息接收
                alert(message);
            };
        }else{
            alert("该浏览器不支持websocket协议，建议使用进行升级或者使用其他浏览器！");
        }
    };
</script>
</body>
</html>



