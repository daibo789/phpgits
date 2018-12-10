<!--继承父模板-->
@extends('home.layouts.main')
@section('header')
	<li id="nav_home" ><a href="/" title="Home">首页</a></li>
	<li class="active"><a id="nav_about" href="/about">关于我们</a></li>
	<li><a id="nav_staff" href="/staff">员工</a></li>
	<li><a id="nav_contact" href="/contact">联系我们</a></li>
@endsection
<!--标题-->
@section('styles')
	<!--引入占位符区域-->
	@section('content')
	</div>
	<div class="content_bg">
		<div class="wrap">
			<div class="content">
				<div class="main">
					<h2>About Us</h2>
					<div class="text">
						<div class="txt_img1">
							<a href="details.html"><img src="images/pic2.jpg"  alt="" /></a>
						</div>
						<div class="txt_p">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
					<div class="txt_para1">
						<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give and expound the actual teachings the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? </p>
					</div>
					<div class="btn1">
						<a href="details.html">Read More <span>>></span></a>
					</div>
					<div class="clear"></div>
					<div class="menu1">
						<ul class="list">
							<li><img src="images/icon_1.png" alt="">
								<p><strong>Penatibus parturnt montes</strong>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi aliquip consequat Lorem ipsum dolor sitamet conset etuer amet adipinget praesent ....</p>
							</li>
						</ul>
					</div>
					<div class="menu1">
						<ul class="list">
							<li><img src="images/icon_2.png" alt="">
								<p><strong>Penatibus parturnt montes</strong>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi aliquip consequat Lorem ipsum dolor sitamet conset etuer amet adipinget praesent ....</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="sidebar">
					<div class="side_bar">
						<h2>Catogories</h2>
						<p class="top"><a href=""><img src="images/art-pic1.jpg" alt="">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi aliquip consequat.</a></p>
						<p class="top"><a href=""><img src="images/art-pic2.jpg" alt="">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi aliquip consequat.</a></p>
						<p class="top"><a href=""><img src="images/art-pic3.jpg" alt="">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi aliquip consequat.</a></p>
						<p class="top"><a href=""><img src="images/art-pic4.jpg" alt="">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi aliquip consequat.</a></p>
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
	<script>

	</script>
@endsection


