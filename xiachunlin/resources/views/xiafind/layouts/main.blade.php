<!DOCTYPE HTML>
<html>
<head>
    <title>Home</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="/home/css/bootstrap.css" type="text/javascript"></script>
    <link href="/home/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--slider-->
    <link href="/home/css/flexslider.css" rel="stylesheet" type="text/css" media="all" />
    <script src="/home/js/jquery.min.js" type="text/javascript"></script>
    <script src="/home/js/jquery.flexslider.js" type="text/javascript"></script>
    @yield('styles')
    @yield('scripts')

</head>
<body>
<div class="h-bg">
    <div class="wrap">
        <div class="header">
            <div class="logo">
                <a href="index.html"><img src="/home/images/logo.png"> </a>
            </div>
            <div class="header-right">
                <ul class="nav">
                    @yield('header')
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>

@yield('content')

<div class="f_bg">
    <div class="wrap">
        <div class="footer">
            <div class="f_logo">
                <a href=""><img src="/home/images/logo.png" alt=""></a>
                <div class="copy">
                    <p class="w3-link">Copyright &copy; 2014.Company name All rights reserved.More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
                </div>
            </div>
            <div class="f_grid">
                <div class="social">
                    <ul class="follow_icon">
                        <li><a href="#" style="opacity: 1;">Get Updates Via</a></li>
                        <li><a href="#" style="opacity: 1;"><img src="/home/images/fb.png" alt=""></a></li>
                        <li><a href="#" style="opacity: 1;"><img src="/home/images/g+.png" alt=""></a></li>
                        <li><a href="#" style="opacity: 1;"><img src="/home/images/tw.png" alt=""></a></li>
                        <li><a href="#" style="opacity: 1;"><img src="/home/images/rss.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
            <div class="f_grid1">
                <div class="f_icon">
                    <img src="images/f_icon.png" alt="" />
                </div>
                <div class="f_address">
                    <p>500 Lorem Ipsum Dolor Sit,</p>
                    <p>22-56-323 Lorem Ipsum Dolor Sit Sit Amet,</p>
                    <p>Fax: (000) 000 00 00 0</p>
                    <p>Email: <span>info@mycompany.com</span></p>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>

</body>
</html>






{{--@if(session('error') == 'no_permissions')--}}
    {{--<script type="text/javascript">--}}
        {{--$(document).ready(function(){--}}
            {{--sweetAlert({--}}
                {{--title:"您没有此权限",--}}
                {{--text:"请联系管理员",--}}
                {{--type:"error"--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
{{--@endif--}}