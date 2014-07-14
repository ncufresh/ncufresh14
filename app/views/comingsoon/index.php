<?php
	$now = \Carbon\Carbon::now();
	$target = \Carbon\Carbon::create(2014, 8, 6, 8, 0, 0);
	$diff = $target->diffInDays($now);

?>

<!doctype html>
<html>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-10121863-1', 'auto');
	ga('require', 'displayfeatures');
	ga('send', 'pageview');

</script>
<head>
	<meta charset="UTF-8">
	<title>大一生活知訊網</title>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
			background-color: rgb(83, 83, 83);
		}
		#coming_soon{
			margin: 0 auto;
			position: relative;
			width: 1000px;
			height: 1000px;
		}

		#count-down{
			width: 146px;
			height: 192px;
			position: absolute;
			top: 191px;
			left: 843px;
			background-image: url('./images/coming_soon/count_down.png');
		}

		#count-number{
			top: 82px;
			position: relative;
		}

		.count-item{

		}

	</style>
</head>
	<body>
		<div id="coming_soon">
			<img src="images/coming_soon.png">
			<div id="count-down">
				<div id="count-number">
					<?php
						if($diff > 10){
							$count = $diff/10%10;
							echo "<img src='./images/coming_soon/$count.png' class='count-item'>";
						}
						$count = $diff%10;
						echo "<img src='./images/coming_soon/$count.png' class='count-item'>";
					?>
				</div>
			</div>
		</div>

	</body>
</html>
