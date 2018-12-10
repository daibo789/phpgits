<!--继承父模板-->
@extends('home.layouts.main')
@section('header')
	<li id="nav_home" ><a href="/" title="Home">首页</a></li>
	<li ><a id="nav_about" href="/about">关于我们</a></li>
	<li><a id="nav_staff" href="/staff">员工</a></li>
	<li class="active"><a id="nav_contact" href="/contact">联系我们</a></li>
@endsection
<!--标题-->
@section('styles')
	<!--引入占位符区域-->
	@section('content')
	</div>
	<div class="content_bg">
		<div class="wrap">
			<div class="section group">
				<div class="col span_1_of_3">
					<div class="contact_info">
						<h3>Find Us Here</h3>
						<div class="map">
							<iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="	color: #8B5D3E;;text-align:left;font-size:12px">View Larger Map</a></small>
						</div>
					</div>
					<div class="company_address">
						<h3>Company Information :</h3>
						<p>500 Lorem Ipsum Dolor Sit,</p>
						<p>22-56-2-9 Sit Amet, Lorem,</p>
						<p>USA</p>
						<p>Phone:(00) 222 666 444</p>
						<p>Fax: (000) 000 00 00 0</p>
						<p>Email: <span>info@mycompany.com</span></p>
						<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
					</div>
				</div>
				<div class="col span_2_of_3">
					<div class="contact-form">
						<h3>Contact Us</h3>
						<form method="post" action="contact-post.html">
							<div>
								<span><label>NAME</label></span>
								<span><input name="userName" type="text" class="textbox"></span>
							</div>
							<div>
								<span><label>E-MAIL</label></span>
								<span><input name="userEmail" type="text" class="textbox"></span>
							</div>
							<div>
								<span><label>MOBILE</label></span>
								<span><input name="userPhone" type="text" class="textbox"></span>
							</div>
							<div>
								<span><label>SUBJECT</label></span>
								<span><textarea name="userMsg"> </textarea></span>
							</div>
							<div>
								<span class="button-wrap"><input type="submit" value="Submit"></span>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
@endsection
