<!--继承父模板-->
@extends('home.layouts.main')
<!--标题-->
@section('styles')
	<!--引入占位符区域-->
	@section('content')

		<div class="content_bg">
			<div class="wrap">
				<div class="content">
					<div class="details">
						<h2>Lorem ipsum dolor sit amet, consectetur &nbsp;<span>incididunt</span></h2>
						<div class="det-pic">
							<img src="images/det-pic.jpg" alt="">
						</div>
						<div class="det-para">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor</p>
							<div class="btn1">
								<a href="details.html">Read More <span>>></span></a>
							</div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
@endsection

