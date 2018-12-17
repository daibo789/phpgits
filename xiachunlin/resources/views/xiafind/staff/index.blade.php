<!--继承父模板-->
@extends('home.layouts.main')
@section('header')
	<li id="nav_home" ><a href="/" title="Home">首页</a></li>
	<li ><a id="nav_about" href="/about">关于我们</a></li>
	<li class="active"><a id="nav_staff" href="/staff">员工</a></li>
	<li ><a id="nav_contact" href="/contact">联系我们</a></li>
@endsection
<!--标题-->
@section('styles')
	<!--引入占位符区域-->
	@section('content')
		<div class="content_bg">
			<div class="wrap">
				<div class="content">
					<div class="main">
						<h2>Our Staff</h2>
						<div class="clear"></div>
						<div class="section group staff">
							<div class="listview_1_of_2 images_1_of_2">
								<div class="listimg listimg_2_of_1">
									<a href="details.html"><img src="images/001.jpg"></a>
								</div>
								<div class="txt_s list_2_of_1">
									<h3>Lorem Ipsum is simply</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt dolore.</p>
									<div class="btn1">
										<a href="details.html">Read More <span>>></span></a>
									</div>
								</div>
							</div>
							<div class="listview_1_of_2 images_1_of_2">
								<div class="listimg listimg_2_of_1">
									<a href="details.html"><img src="images/002.jpg"></a>
								</div>
								<div class="txt_s list_2_of_1">
									<h3>Lorem Ipsum is simply</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt dolore.</p>
									<div class="btn1">
										<a href="details.html">Read More <span>>></span></a>
									</div>
								</div>
							</div>
						</div>
						<div class="section group">
							<div class="listview_1_of_2 images_1_of_2">
								<div class="listimg listimg_2_of_1">
									<a href="details.html"><img src="images/003.jpg"></a>
								</div>
								<div class="txt_s list_2_of_1">
									<h3>Lorem Ipsum is simply</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt dolore.</p>
									<div class="btn1">
										<a href="details.html">Read More <span>>></span></a>
									</div>
								</div>
							</div>
							<div class="listview_1_of_2 images_1_of_2">
								<div class="listimg listimg_2_of_1">
									<a href="details.html"><img src="images/004.jpg"></a>
								</div>
								<div class="txt_s list_2_of_1">
									<h3>Lorem Ipsum is simply</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt dolore.</p>
									<div class="btn1">
										<a href="details.html">Read More <span>>></span></a>
									</div>
								</div>
							</div>
						</div>
						<div class="section group">
							<div class="listview_1_of_2 images_1_of_2">
								<div class="listimg listimg_2_of_1">
									<a href="details.html"><img src="images/005.jpg"></a>
								</div>
								<div class="txt_s list_2_of_1">
									<h3>Lorem Ipsum is simply</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt dolore.</p>
									<div class="btn1">
										<a href="details.html">Read More <span>>></span></a>
									</div>
								</div>
							</div>
							<div class="listview_1_of_2 images_1_of_2">
								<div class="listimg listimg_2_of_1">
									<a href="details.html"><img src="images/006.jpg"></a>
								</div>
								<div class="txt_s list_2_of_1">
									<h3>Lorem Ipsum is simply</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt dolore.</p>
									<div class="btn1">
										<a href="details.html">Read More <span>>></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="sidebar">
						<div class="side_bar">
							<h2>Catogories</h2>
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
	@endsection


