<!DOCTYPE html>
<html><head><title>{{sysconfig('CMS_WEBNAME')}}后台管理</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/back/css/bootstrap.min.css">
    <link rel="stylesheet" href="/back/css/admin.css">
    <script src="/back/js/jquery.min.js"></script>
    <script src="/back/js/respond.min.js"></script>
    <script src="/back/js/ad.js"></script>
    <script src="/back/js/bootstrap.min.js"></script>
</head><body>
<div class="blog-masthead clearfix"><nav class="blog-nav">
        <a class="blog-nav-item active" href="admin"><span class="glyphicon glyphicon-star"></span> <strong>后台管理中心</strong> <span class="glyphicon glyphicon-star-empty"></span></a>
        <a class="blog-nav-item" href="home" target="_blank"><span class="glyphicon glyphicon-home"></span> 网站主页</a>
        <a class="blog-nav-item" href="admin/index/upcache"><span class="glyphicon glyphicon-refresh"></span> 更新缓存</a>
        <a class="blog-nav-item" id="navexit" href="{{route('admin_logout')}}"><span class="glyphicon glyphicon-off"></span> 注销</a>
        <a class="blog-nav-item pull-right" href="javascript:;"><small>您好：<span class="glyphicon glyphicon-user"></span> <?php if(isset($_SESSION['admin_user_info'])){echo $_SESSION['admin_user_info']['username'].' ['.$_SESSION['admin_user_info']['rolename'].']';} ?></small></a>
    </nav></div>
<div class="container-fluid">
    <div class="row">
        <!-- 左边开始 --><div class="col-sm-3 col-md-2 sidebar">
            <script type="text/javascript">
                $(document).ready(function(){
                    $('.inactive').click(function(){
                        var className=$(this).parents('li').parents().attr('class');

                        if($(this).siblings('ul').css('display')=='none')
                        {
                            if(className=="leftmenu")
                            {
                                $(this).parents('li').siblings('li').children('ul').parent('li').children('a').removeClass('active');
                                $(this).parents('li').siblings('li').children('ul').slideUp(100);
                                $(this).parents('li').children('ul').children('li').children('ul').parent('li').children('a').removeClass('active');
                                $(this).parents('li').children('ul').children('li').children('ul').slideUp(100);
                            }

                            $(this).addClass('active');
                            $(this).siblings('ul').slideDown(100);
                        }
                        else
                        {
                            $(this).removeClass('active');
                            $(this).siblings('ul').slideUp(100);
                        }
                    });

                    $('.active').trigger("click");
                });
            </script>
            <div class="menu">
                <ul class="leftmenu">
                    @foreach($menus as $k=>$first)
                            @if($first['deep'] == 0)
                            <li><a href="<?php if(isset($first['child'])){echo 'javascript:;';}else{echo route($first['action']);} ?>" class="<?php if(isset($first['child'])){echo 'inactive ';} if($k==0){echo 'active ';} ?>"><?php if($first['icon']){echo '<small class="'.$first['icon'].'"></small>';} ?> <?php echo $first['name']; ?></a>
                                @if(isset($first['child']))
                                    <ul style="display: none">
                                        <?php foreach($first['child'] as $second){ ?>
                                        <li><a target="appiframe" href="<?php if(isset($second['child'])){echo 'javascript:;';}else{echo route($second['action']);} ?>" class="<?php if(isset($second['child'])){echo 'inactive ';} ?>"><small class="glyphicon glyphicon-hand-right"></small> <?php echo $second['name']; ?></a>
                                            <!-- 三级菜单 -->
                                            <?php if(isset($second['child'])){ ?>
                                            <ul><?php foreach($second['child'] as $third){ ?>
                                                <li><a target="appiframe" href="{{ route($third['action']) }}"><small class="glyphicon glyphicon-menu-right"></small> <?php echo $third['name']; ?></a></li><?php } ?>
                                            </ul><?php } ?>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                @endif
                            @endif
                    @endforeach
                </ul>
            </div>
        </div><!-- 左边结束 -->

        <!-- 右边开始 --><div class="col-sm-9 col-md-10 rightbox"><div id="mainbox">
                <script type="text/javascript">
                    var viewH = document.documentElement.clientHeight;
                    var mainbox = document.getElementById("mainbox");
                    mainbox.style.height = (viewH - 75)+"px";
                </script>
                <iframe src="{{route('admin_welcome')}}" frameborder="0" scrolling="yes" width="100%" height="100%" allowtransparency="true" id="appiframe" name="appiframe"></iframe>
            </div></div><!-- 右边结束 --></div></div>
</body></html>