<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
    <title>谁是Po主</title>
    <link href="css/mdui.min.css" rel="stylesheet" type="text/css">
</head>
<body class="mdui-theme-primary-pink mdui-theme-accent-pink">


<div class="mdui-row">
    <div class="mdui-text-center" style="margin-top: 100px">
       <h2>谁是Po主</h2>
    </div>
</div>
<div class="mdui-row">
    <div class="mdui-col-xs-4"></div>
    <div class="mdui-col-xs-4" style="margin-top: 100px">
        <form action="room.php" method="post" id="form1">
            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">粘贴微博图片地址</label>
                <input class="mdui-textfield-input" type="text" id="pic" name="pic">
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="mdui-text-center" style="margin-top: 10px">
        <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" id="start">开始</button>
    </div>
</div>
<div class="row">
    <div class="mdui-text-center" style="margin-top: 20px" id="path">

    </div>
</div>

<script src="js/mdui.min.js"></script>
<script src="https://cdn.bootcss.com/jquery/3.1.0/jquery.min.js"></script>

<script>
    var $$ = mdui.JQ;
    $$("#start").on('click',function(){
        var pic_path= document.getElementById("pic").value;
        if(pic_path==""){
            mdui.alert('请输入图片地址!','错误');
            return false;
        }
        if(checkURL(pic_path)==false){
            mdui.alert("请输入正确的图片地址",'错误');
            return false;
        }
        $.ajax({
            type: "POST",
            url: "get.php",
            data: { pic_path:pic_path},
            dataType: "json",
            success: function(data){
                    var html='<a href="'+data+'" target="_blank">'+data+'</a>';
                    $("#path").empty();
                    $("#path").append(html);

            }

        });
    })
    function checkURL(URL){
        var strRegex ='(https?|http)://[-A-Za-z0-9+&@#/%?=~_|!:,.;]+[-A-Za-z0-9+&@#/%=~_|]';
        var re=new RegExp(strRegex);
            if (!re.test(URL)) {
                return false;
            }
    }
</script>
</body>
</html>
