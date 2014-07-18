<div id="topLeft">
	<a href="{{ route('home') }}"><div id="topLogo"></div></a>
</div>
<div id="topBackground">
	<div id="topMiddle">
		<!--<div id="topSearchBar" >Search bar</div>-->
		<div id="topNavBar">
			<a href="{{ route('nculife.index') }}">
				<div class="topNavBarButton" id="topNavBarLife">
				</div>
			</a>
			<a href="{{ route('forum') }}">
				<div class="topNavBarButton" id="topNavBarFourm">
				</div>
			</a>
			<a href="{{ route('necessity.necessity_index') }}">
				<div class="topNavBarButton" id="topNavBarRead">
				</div>
			</a>
			<a href="{{ route('SchoolGuide') }}">
				<div class="topNavBarButton" id="topNavBarCampus">
				</div>
			</a>
			<a href="{{ route('video') }}">
				<div class="topNavBarButton" id="topNavBarVideo">
				</div>
			</a>
			<a href="{{ route('About_us') }}">
				<div class="topNavBarButton" id="topNavBarAbout">
				</div>
			</a>
		</div>
	</div>
	<div id="topRight">
		<div id="topLoginBar" >
			@include('layouts.auth')
		</div>
	</div>
</div>
<div id="topRobot"></div>
