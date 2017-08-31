<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/todolist.css">
</head>
<body>
    <!--
    1.添加事件
    2.查看时间
    3.操作事件的状态
    4.标记关键事件
    5.查看已完成
    6.删除已完成
    -->
    <!--
    jquery
    iconfont
    css3
    localstorage
    div+css
    -->
    <section class="leftbar">
        <h3>TODOLIST</h3>
        <ul>
            <li>查看待办事项</li>
            <li>查看已完成事项</li>

        </ul>
        <p>
        <?php
        session_start();
        if(isset($_SESSION["user"])){
            echo "欢迎".$_SESSION["user"]."登录<a href='exit.php'>退出</a>";
        }else{
            echo "未登录<a href='login.html'>登录</a>/<a href='sign.php'>注册</a>";
        }
        ?>
        </p>
    </section>
    <div class="main">
        <div class="container">
            <div class="add item">
                <h3>添加新的事项</h3>
                <label>
                 <textarea autofocus id="text"></textarea>
                    <div class="notice"><span>00</span>/40</div>
                </label>
                <input type="button" value="提交" id="submit" class="btn">
                <div class="close">&#xe641;</div>
            </div>
            <div class="wait item">
                <h3>未完成事项<i>&#xe625;</i></h3>
                <ul></ul>
                <div class="bottom">
                <input type="button" value="移动到已完成" class="btn movebtn">
                <input type="button" value="添加" class="btn addbtn">
                </div>
            </div>
            <div class="done item">
                <h3>已完成事项<i>&#xe625;</i></h3>
                <ul></ul>
                <div class="bottom">
                <input type="button" value="清除" class="btn clearbtn">
                <input type="button" value="添加" class="btn addbtn">
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/jQuery1.10.2.js"></script>
<script>
    $("#text").on("keydown keyup",function(){
        var l=$(this).val().length;
        if(l>40){
            alert("字数超过限制");
            l=40;
            $(this).val(function(i,val){
                return val.slice(0,40);
            })
        }
        $(".notice span").text(function(){
            return l<10?"0"+l:l;
        });
    });
    $("#submit").click(function(){
        var val=$("#text").val();
        if(val===""){
            alert("请输入内容之后再提交");
            return;
        }
        $.get("insert.php",{val:val,isDone:false,isStar:false},function(r){
            if(r==1){
                alert("添加成功");
                select();
                $("#text").val("");
                $(".notice span").text("00");
            }else{
                alert("添加失败");
            }
        })
    });
    //关闭添加界面
    $(".close").click(function(){
        $(".add").slideUp(300);
        $(".wait").delay(200).slideDown(300);
    });
    function select(){
        $.get("select.php",function(r){
            write(r);
        },"json");
    }
    select();
    function write(r){
        var str1="",str2='';
        $.each(r,function(index,value){
            if(value.isDone=="false"){
                str1+=`
                <li id="${value.id}">
                    <input type="checkbox">
                    <p onclick="edit(this)">${value.val}</p>
                    <time><i>&#xe6aa;</i>${value.time}</time>`;
                if(value.isStar=="true"){
                    str1+="<i class='active' onclick='change(this)' data-role='star'>&#xe608;</i></li>";
                }else{
                    str1+="<i onclick='change(this)' data-role='nostar'>&#xe608;</i></li>";
                }
            }else{
                str2+=`
                <li id="${value.id}">
                    <input type="checkbox">
                    <p onclick="edit(this)">${value.val}</p>
                    <time><i>&#xe6aa;</i>${value.time}</time>`;
                if(value.isStar=="true"){
                    str2+="<i class='active' onclick='change(this)' data-role='star'>&#xe608;</i></li>";
                }else{
                    str2+="<i onclick='change(this)' data-role='nostar'>&#xe608;</i></li>";
                }
            }

        });
        $(".wait ul").html(str1);
        $(".done ul").html(str2);
    };
    //选项卡
    $(".leftbar ul li").click(function(){
        var index=$(this).index();
        $(".item").hide().eq(index+1).show();
    });
    //移动到已完成
    $(".movebtn").click(function(){
        $.get("select.php",function(r){
            $(".wait ul li").each(function(index,ele){
                if($(this).find("input").prop("checked")){
                    var index=$(this).attr("id");
                    $.get("update.php",{id:index,attr:"isDone",val:true},function () {
                        select();
                    });
                };
            });

        },"json");
    });
    //删除已完成
    $(".clearbtn").click(function(){
//        $.get("select.php",function(r){
            $(".done ul li").each(function(index,ele){
                if($(this).find("input").prop("checked")){
                    var index=$(this).attr("id");
                    $.get("delete.php",{id:index},function () {
                        select();
                    });
                }
            })

//        },"json");
    });
    //跳转到添加界面
    $(".addbtn").click(function(){
        $(".item").hide().siblings(".add").slideDown();
    });
    //修改星星，事件委派
    window.change=function(ele){
        var index=$(ele).parent().attr('id');
        var attr=$(ele).attr("data-role");
        console.log(attr)
        if(attr=="nostar"){
            $.get("update.php",{id:index,attr:"isStar",val:true},function(){
                $(ele).attr("data-role","star");
                select();
            });
        }else{
            $.get("update.php",{id:index,attr:"isStar",val:false},function(){
                $(ele).attr("data-role","nostar");
                select();
            });

        }
    }
    window.edit=function(ele){
        var index=$(ele).parent().attr("id");
        $.get("select.php",{id:index},function(r){
            $(".item").hide().siblings(".add").slideDown();
            $("#text").val(r[0].val);
            var l=r[0].val.length;
            $(".notice span").text(function(){
                return l<10?"0"+l:l;
            });
        },"json");
    }
</script>
</html>