<script type="text/javascript" src="/shops/js/jquery.min.js"></script>
<div id="site-nav" class="site-nav">
    <div style="width:960px;margin-left:auto;margin-right:auto;">
      	<p class="menu-left">
            <span class="mobile">
                <a class="mobileLink" href="javascript:;">
                  手机版
                  <img class="weixin-qr" src="/shops/images/erweima.png">
                </a>
            </span>
            <span class="login-info"><a class="user-nick" href="<?php echo route('shop'); ?>"><?php echo sysconfig('CMS_WEBNAME'); ?></a></span>
        </p>
        <ul class="quick-menu">
            <li><a href="<?php echo route('shop_singlepage',array('id'=>'help')); ?>">帮助中心</a></li>
        </ul>
    </div>
</div>
<div class="ju-naver">
    <div class="box">
        <h1 class="logo mouseleave"><a class="ju-logo ju-logo-show" href="<?php echo route('shop'); ?>" title="logo"><img src="/shops/images/logo.png"></a></h1>
        <ul id="J_NavMenu" class="nav-menu">
            <li class="menu-home<?php if(route('shop') == url()->full()){echo ' current';} ?>"><a class="menu-link" href="<?php echo route('shop'); ?>">首页</a></li>
            <li class="menu-goodslist<?php if(route('shop_goodslist') == url()->full()){echo ' current';} ?>"><a class="menu-link" href="<?php echo route('shop_goodslist'); ?>">优质精选</a></li>
            <li class="menu-goodslist<?php if(route('shop_goodslist',array('orderby'=>1)) == url()->full()){echo ' current';} ?>"><a class="menu-link" href="<?php echo route('shop_goodslist',array('orderby'=>1)); ?>">超值热卖</a></li>
            <li class="menu-qqjx<?php if(route('shop_arclist') == url()->full()){echo ' current';} ?>"><a class="menu-link" href="<?php echo route('shop_arclist'); ?>">热点资讯</a></li>
            <li class="menu-liangfan<?php if(route('shop_singlepage',array('id'=>'about')) == url()->full()){echo ' current';} ?>"><a class="menu-link" href="<?php echo route('shop_singlepage',array('id'=>'about')); ?>">关于我们</a></li>
        </ul>
    </div>
</div>