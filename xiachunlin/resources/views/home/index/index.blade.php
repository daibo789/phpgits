<!--继承父模板-->
@extends('home.layouts.main')
@section('header')
    <li id="nav_home" class="active"><a href="/h" title="Home">首页</a></li>
    <li><a id="nav_about" href="/h/about">关于我们</a></li>
    <li><a id="nav_staff" href="/h/staff">员工</a></li>
    <li><a id="nav_contact" href="/h/contact">联系我们</a></li>
@endsection
<!--标题-->
@section('styles')
@section('scripts')

<!--引入占位符区域-->
@section('content')
    <div class="slider_bg">
        <div class="wrap">
            <section class="slider">
                <div class="flexslider carousel">
                    <ul class="slides">
                        <li>
                            <img src="/home/images/thumbnail-slider-1.jpg" />
                        </li>
                        <li>
                            <img src="/home/images/thumbnail-slider-2.jpg" />
                        </li>
                        <li>
                            <img src="/home/images/thumbnail-slider-3.jpg" />
                        </li>
                        <li>
                            <img src="/home/images/thumbnail-slider-4.jpg" />
                        </li>
                        <li>
                            <img src="/home/images/thumbnail-slider-5.jpg" />
                        </li>
                        <li>
                            <img src="/home/images/thumbnail-slider-6.jpg" />
                        </li>
                        <li>
                            <img src="/home/images/thumbnail-slider-8.jpg" />
                        </li>
                    </ul>
                </div>
            </section>

        </div>
    </div>
    <div class="cont_bg">
        <div class="wrap">
            <div class="content">
                <div class="main">
                    <h2>Welcome to our company</h2>
                    <div class="text">
                        <div class="txt_img">
                            <a href="details.html"><img src="/home/images/pic1.jpg"  alt="" /></a>
                        </div>
                        <div class="txt_para">
                            <p>平利县洛河镇留守儿童服务中心暨天天向上儿童教育服务中心成立于2016年9月，由返乡大学生夏春霖、罗世琼夫妇创办。我中心以“关注留守儿童，服务农村教育”为服务宗旨，以关注农村留守儿童学习与成长为目标，辐射农村教育领域，研究早期基础教育的方法和作用为基本教研方向，为农村孩子提供最科学的教学指导，为家长提供最贴心的托管服务，更为孩子日后的学习打下坚实的基础。
                            </p>
                        </div>
                    </div>
                    <div class="txt_para1">
                        <p>中心位于洛河镇中心小学东南20米，总建筑面积约300平方米，其中教学区180平方米，包括教室4间，活动室1间，综合学习室1间，生活区约120平方米，包括男、女生宿舍各1间，亲情室1间、厨房和餐厅1间以及其他生活场所。截止2017年6月21日我中心工作人员5人，教师3人，后勤工作人员2名，累积服务1000人次。。经过前期发展，我中心确定了学生接送制度、安全制度、卫生制度、消防制度、托管学生定期亲情联线制度等各项管理制度；形成以学生托管与辅导为主，以学习测试、教育咨询、才艺培训、心理辅导为补充的全新格局！
                        </p>
                    </div>
                    <div class="btn">
                        <a href="details.html">Read More <span>>></span></a>
                    </div>
                    <div class="clear"></div>
                    <div class="menu1">
                        <ul class="list">
                            <li><img src="/homeimages/icon_1.png" alt="">
                                <p><strong>Penatibus parturnt montes</strong>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi aliquip consequat Lorem ipsum dolor sitamet conset etuer amet adipinget praesent ....</p>
                            </li>
                        </ul>
                    </div>
                    <div class="menu1">
                        <ul class="list">
                            <li><img src="/homeimages/icon_2.png" alt="">
                                <p><strong>Penatibus parturnt montes</strong>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi aliquip consequat Lorem ipsum dolor sitamet conset etuer amet adipinget praesent ....</p>
                            </li>
                        </ul>
                    </div>
                </div><div class="tlinks">Collect from <a href="http://www.cssmoban.com/"  title="网站模板">网站模板</a></div>
                <div class="sidebar">
                    <div class="side_bar">
                        <h2>Catogories</h2>
                        <p class="top"><a href=""><img src="/home/images/art-pic1.jpg" alt="">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi aliquip consequat.</a></p>
                        <p class="top"><a href=""><img src="/home/images/art-pic2.jpg" alt="">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi aliquip consequat.</a></p>
                        <p class="top"><a href=""><img src="/home/images/art-pic3.jpg" alt="">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi aliquip consequat.</a></p>
                        <p class="top"><a href=""><img src="/home/images/art-pic4.jpg" alt="">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi aliquip consequat.</a></p>
                    </div>
                    <div class="side_bar1">
                        <h2>Testimonials</h2>
                        <p class="top">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account</p>
                        <p class="side_bar1_bg"></p>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="menu2_bg">
        <div class="wrap">
            <div class="menu2">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Solutions</a></li>
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Solutions</a></li>
                    <li><a href="#">Send mail</a></li>
                    <li><a href="#">Call Now</a></li>
                </ul>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function(){
            SyntaxHighlighter.all();
        });
        $(window).load(function(){
            $('.flexslider').flexslider({
                animation: "slide",
                animationLoop: false,
                itemWidth: 210,
                itemMargin: 5,
                minItems: 2,
                maxItems: 4,
                start: function(slider){
                    $('body').removeClass('loading');
                }
            });
        });
    </script>
@endsection




{{--平利县洛河镇留守儿童服务中心暨天天向上儿童教育服务中心成立于2016年9月，由返乡大学生夏春霖、罗世琼夫妇创办。我中心以“关注留守儿童，服务农村教育”为服务宗旨，以关注农村留守儿童学习与成长为目标，辐射农村教育领域，研究早期基础教育的方法和作用为基本教研方向，为农村孩子提供最科学的教学指导，为家长提供最贴心的托管服务，更为孩子日后的学习打下坚实的基础。--}}



{{--中心位于洛河镇中心小学东南20米，总建筑面积约300平方米，其中教学区180平方米，包括教室4间，活动室1间，综合学习室1间，生活区约120平方米，包括男、女生宿舍各1间，亲情室1间、厨房和餐厅1间以及其他生活场所。截止2017年6月21日我中心工作人员5人，教师3人，后勤工作人员2名，累积服务1000人次。。经过前期发展，我中心确定了学生接送制度、安全制度、卫生制度、消防制度、托管学生定期亲情联线制度等各项管理制度；形成以学生托管与辅导为主，以学习测试、教育咨询、才艺培训、心理辅导为补充的全新格局！--}}