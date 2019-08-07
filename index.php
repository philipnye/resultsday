<?php include 'inc/header.php';?>
<div class="section grey lighten-4">
	<div class="container">
		<div class="row">
			<div class="col m6 s12">
				<h1>Welcome</h1>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<h4>Explore national trends in <a href="a-level.php?v=20190712">A-Level</a>, <a href="as-level.php?v=20190712">AS-Level</a> and <a href="gcse.php?v=20190712">GCSE</a> entries and grades</h4>
			</div>
		</div>
		<div class="row">		<!-- feed item title: <h4> tag with class feed-item-title; feed item excerpt: <p> tag with class feed-item-desc -->
			<div class="col s12">
				<h2>Blogposts</h2>
				<script src="//rss.bloople.net/?url=https%3A%2F%2Fffteducationdatalab.org.uk%2Ftag%2Fresults-2019%2Ffeed&showtitle=false&type=js"></script>
				<div id="feed-holding-message">
					<p class="feed-item-desc">Posts analysing this year's results will appear here once they are published</p>
					<p class="feed-item-desc">In the meantime, explore this site to see the trends in <a href="a-level.php?v=20190712">A-Level</a>, <a href="as-level.php?v=20190712">AS-Level</a> and <a href="gcse.php?v=20190712">GCSE</a> entries and grades up to 2018</p>
				</div>
				<script>
					var d = new Date();
					if (d.getFullYear() > 2019 || (d.getFullYear() == 2019 && d.getMonth() > 7 || (d.getFullYear() == 2019 && d.getMonth() == 7 && d.getDate() > 15 || (d.getFullYear() == 2019 && d.getMonth() == 7 && d.getDate() == 15 & d.getHours() > 9 || (d.getFullYear() == 2019 && d.getMonth() == 7 && d.getDate() == 15 & d.getHours() == 9 & d.getMinutes() >= 30))))){		// month 7 = August
						document.getElementById("feed-holding-message").style.display = 'none';
					}
				</script>
			</div>
		</div>
	</div>
</div>
<script>
	function runScripts() {
		$('#report-banner').hide();
	}
</script>
<script src='/js/toasts.js?v=20190712'></script>
<?php include 'inc/footer.php';?>
