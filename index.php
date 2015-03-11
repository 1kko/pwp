
<?php
require_once('./autoloader.php');

$feed=new SimplePie();
$feed->enable_cache(false);
$feed->set_feed_url('http://hankookilbo.com/rss.aspx');
$feed->init();
$feed->handle_content_type();

?>


<!DOCTYPE html>
<html manifest="pwp.manifest">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

	<title>Welcome</title>

	<link rel="stylesheet" href="./css/bootstrap.css">
	<link rel="stylesheet" href="./css/front.css">
	<link rel="stylesheet" href="./css/clock.css">
	<link rel="stylesheet" href="./css/simpleweather.css">

	<script src="./js/jquery-2.1.1.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/highcharts.js"></script>
	<script src="./js/highcharts-more.js"></script>
	<script src="./js/twitmarquee.js"></script>
	<script src="./js/jquery.simpleWeather.min.js"></script>
	<script src="./js/jquery.countdown.min.js"></script>
	<script src="./js/jquery.backstretch.min.js"></script>
	<script src="./js/strtotime.js"></script>

	<!-- Favicon -->
	<link rel="shortcut icon" href="./img/favicons/favicon.ico">
	<link rel="apple-touch-icon" sizes="57x57" href="./img/favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="114x114" href="./img/favicons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="./img/favicons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="144x144" href="./img/favicons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="60x60" href="./img/favicons/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="120x120" href="./img/favicons/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="76x76" href="./img/favicons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="152x152" href="./img/favicons/apple-touch-icon-152x152.png">
	<link rel="icon" type="image/png" href="./img/favicons/favicon-196x196.png" sizes="196x196">
	<link rel="icon" type="image/png" href="./img/favicons/favicon-160x160.png" sizes="160x160">
	<link rel="icon" type="image/png" href="./img/favicons/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="./img/favicons/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="./img/favicons/favicon-32x32.png" sizes="32x32">
	<meta name="msapplication-TileColor" content="#ddc9cc">
	<meta name="msapplication-TileImage" content="./img/favicons/mstile-144x144.png">
	<meta name="msapplication-config" content="./img/favicons/browserconfig.xml">

	<!-- Webapp Splash Screen -->
	<!-- iPhone (Retina) (640 x 960 pixels) -->
	<link href="./img/splash/splash-640-960.png"
		  media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2)"
		  rel="apple-touch-startup-image">

	<!-- iPhone 5 (640 x 1136 pixels) -->
	<link href="./img/splash/splash-640-1136.png"
		  media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)"
		  rel="apple-touch-startup-image">

	<!-- iPad Portrait (768 x 1024 pixels) -->
	<link href="./img/splash/splash-768-1024.png"
		  media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 1)"
		  rel="apple-touch-startup-image">

	<!-- iPad Landscape (1024 x 768 pixels) -->
	<link href="./img/splash/splash-1024-768.png"
	      media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 1)"
	      rel="apple-touch-startup-image">

	<!-- iPad Portrait (Retina) (1536 x 2048 pixels) -->
	<link href="./img/splash/splash-1536-2048.png"
	      media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)"
	      rel="apple-touch-startup-image">
	<!-- iPad Landscape (Retina) (2048 x 1536 pixels) -->
	<link href="./img/splash/splash-2048-1536.png"
	      media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)"
	      rel="apple-touch-startup-image">


	<script type='text/javascript'>
	// Trending topics ticker
	//<![CDATA[
	var page={};

	$(function() {
	new FrontPage().init();
	});

	//]]>


	</script>
</head>

<body>
<div id="header">
	<div id="trends">
		<div class="inner">
			<ul class="trendscontent">
				<li class="trend-label">Trending topics</li>

				<?php
				$count=0;
				// echo "I'm getting in";
				// print_r($feed);
				if ($feed->error()!="") {
					echo "<li>News not available due to site down. Please contact administrator.</li>";
				}
				foreach ($feed->get_items() as $item)
				{
					echo "<li>";
					if ($count%2 == 0) { $class_even_odd="even"; } else { $class_even_odd="odd"; }
					echo "<a href='#' title='".$item->get_title()."' name='".$item->get_title()."' class='search_link ".$class_even_odd."' rel='nofollow'>".$item->get_title()."</a>";
					echo "<em class='description'>".$item->get_description()."</em>";
					echo '</li>';
					$count+=1;
				}
				?>

			</ul>
		</div>
		<span class="fade fade-left">&nbsp;</span>
		<span class="fade fade-right">&nbsp;</span>
	</div>
</div>

<div class="trendtip">
	<div class="trendtip-content">
		<a class="trendtip-trend"></a>
		<div class="trendtip-why">
			<pre class="trendtip-desc" style="border:0;"></pre>
			<span class="trendtip-source">Source: <span>한국일보</span></span>
		</div>
	</div>
	<div class="trendtip-pointer">&nbsp;</div>
</div>


<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<button class="btn btn-default pull-right" id='btn_refresh_page'>Refresh</button>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="clock">
				<ul class="time">
					<li id="hour"></li><li id="point">:</li><li id="min"></li><li id="point">:</li><li id="sec"></li>
				</ul>
				<div class="date"></div>
			</div>
		</div>
	</div>


	<div class="row" style="margin-top:15px;">
		<!-- Countdown Widget-->
		<div class="col-xs-4">
			<div class="panel panel-danger">
				<div class="panel-heading text-center">Seona's Birthday</div>
				<div class="panel-body text-center">
					<div data-countdown="2015/12/24"></div>
				</div>
			</div>
		</div>
		<div class="col-xs-4">
			<div class="panel panel-warning">
				<div class="panel-heading text-center">Hajun's Birthday</div>
				<div class="panel-body text-center">
					<div data-countdown="2016/02/06"></div>
				</div>
			</div>
		</div>
		<div class="col-xs-4">
			<div class="panel panel-info">
				<div class="panel-heading text-center">Ikko's Birthday</div>
				<div class="panel-body text-center">
					<div data-countdown="2016/02/10"></div>
				</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-lg-3 col-md-12">
			<!--- Weather Widget HERE -->
			<div id="weather"></div>
		</div>
		<div class="col-lg-9 col-xs-12">
			<!--- Weather Chart HERE -->
			<div id="weather_chart"></div>
		</div>
	</div>


</div>
</body>
<script type="text/javascript">

$(document).ready(function() {

	function refreshAt(hours, minutes, seconds) {
	    var now = new Date();
	    var then = new Date();

	    if(now.getHours() > hours ||
	       (now.getHours() == hours && now.getMinutes() > minutes) ||
	        now.getHours() == hours && now.getMinutes() == minutes && now.getSeconds() >= seconds) {
	        then.setDate(now.getDate() + 1);
	    }
	    then.setHours(hours);
	    then.setMinutes(minutes);
	    then.setSeconds(seconds);

	    var timeout = (then.getTime() - now.getTime());
	    setTimeout(function() { window.location.reload(true); }, timeout);
	}

	//console.log("Refresh Time is 07:00:00");
	refreshAt(07,00,00);
	
	// Refresh Button
	$('#btn_refresh_page').on('click', function () {
		location.reload();
	});

	// Create two variable with the names of the months and days in an array
	var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
	var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

	// Create a newDate() object
	var newDate = new Date();
	// Extract the current date from Date object
	newDate.setDate(newDate.getDate());
	// Output the day, date, month and year   
	$('div.clock>div.date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

	setInterval( function() {
		// Create a newDate() object and extract the seconds of the current time on the visitor's
		var seconds = new Date().getSeconds();
		// Add a leading zero to seconds value
		$("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
		},1000);
		
	setInterval( function() {
		// Create a newDate() object and extract the minutes of the current time on the visitor's
		var minutes = new Date().getMinutes();
		// Add a leading zero to the minutes value
		$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
	    },1000);
		
	setInterval( function() {
		// Create a newDate() object and extract the hours of the current time on the visitor's
		var hours = new Date().getHours();
		// Add a leading zero to the hours value
		$("#hour").html(( hours < 10 ? "0" : "" ) + hours);
	    }, 1000);	



	$('[data-countdown]').each(function() {
		var $this = $(this), finalDate = $(this).data('countdown');
			$this.countdown(finalDate, function(event) {
				$this.html(event.strftime('%D days %H:%M:%S'));
		});
	});



	// Simple Weather Loader
	$.simpleWeather({
		location: '',
		woeid: '28809879',
		unit: 'c',
		success: function(weather) {
			html = '<h2><i class="icon-'+weather.code+'"></i> '+weather.temp+'&deg;'+weather.units.temp+'</h2>';
			html += '<li class="currently">'+weather.currently+' ('+weather.code+')</li>';

			LoaderBackgroundChanger(weather.code);

			$("#weather").html(html);
		},
		error: function(error) {
			$("#weather").html('<p>'+error+'</p>');
		}
	});


	var weatherUrl='http://www.kma.go.kr/wid/queryDFSRSS.jsp?zone=4146351000';
	weather_array={};
	weather_array['temp']=[];
	weather_array['temp_ranges']=[];
	weather_array['precipitation']=[];
	weather_array['snow']=[];
	weather_array['wind']=[];

	$.ajax({
		url: "xml2json.php?url="+weatherUrl,
		dataType: "json",
		success: function (data) {
			objs = data.channel.item.description.body.data;
			today = data.channel.item.description.header.tm;

			var temp_start_min=null;
			var temp_start_max=null;

			$(objs).each(function(index){

				base_time=strtotime(today.slice(0,4)+"-"+today.slice(4,6)+"-"+today.slice(6,8)+" "+objs[index].hour+":"+today.slice(10,12)+":"+"00")
				timestamp=strtotime("+"+objs[index].day+" day",base_time);
				//console.debug(timestamp);

				var hour_temp=[timestamp, parseInt(objs[index].temp)];
				weather_array['temp'].push(hour_temp);

				var tmin_max=[];
				var tmin=0;
				var tmax=0;

				if ( parseInt(objs[index].tmn)<=-100 ) {
					if ((temp_start_min==null) || (temp_start_max==null)) {
						// console.debug("it's less than -100");
						for (var i = 0; i <= objs.length-1; i++) {
							if ( parseInt(objs[i].tmn) >=-100 ) {
								temp_start_min=parseInt(objs[i].tmn);
								break;
							}
						};

						for (var i = 0; i <= objs.length-1; i++) {
							if ( parseInt(objs[i].tmx) >=-100 ) {
								temp_start_max=parseInt(objs[i].tmx);
								break;
							}
						};
					}
					// console.debug("new min:"+temp_start_min);
					// console.debug("new max:"+temp_start_max);

					//tmin=parseInt(objs[index+2].tmn);
					//tmax=parseInt(objs[index+2].tmx);}
					tmin=temp_start_min;
					tmax=temp_start_max;
				}
				else {
					tmin=parseInt(objs[index].tmn); 
					tmax=parseInt(objs[index].tmx);
				} 
				var tmin_max=[timestamp, tmin,tmax];

				// FIXME 
				// var invalid_flag="";
				// if ( tmin_max[1]>hour_temp[1] || tmin_max[2]<hour_temp[1] ) { var invalid_flag=" : invalid" } 
				// var human_date=new Date(hour_temp[0]);
				// console.debug(human_date.getDay()+","+human_date.getHours()+":00 : "+tmin_max[1]+" <= "+hour_temp[1]+" >= "+tmin_max[2]+invalid_flag);

				weather_array['temp_ranges'].push(tmin_max);

				if (parseInt(objs[index].r06)<1) {
					var precip=[timestamp, null];
				} else {
					var precip=[timestamp, parseInt(objs[index].r06)];
				}
				weather_array['precipitation'].push(precip);

				if (parseInt(objs[index].ws)<1) { 
					var wind=[timestamp, null];
				} else {
					var wind=[timestamp, parseInt(objs[index].ws)];
				}
				var wind=[timestamp, parseInt(objs[index].ws)];
				weather_array['wind'].push(wind);



				// console.debug(index+":"+tmin_max);
				// console.debug(weather_array['temp_ranges'][index]);
				
				// weather_array['tmx'].push(parseInt(objs[index].tmx));
				// weather_array['tmn'].push(parseInt(objs[index].tmn));
				// weather_array['precipitation'].push(parseInt(objs[index].r06));
				// weather_array['snow'].push(parseInt(objs[index].s06));
				// weather_array['wind'].push(parseInt(objs[index].ws));
				// weather_array['wind_direction'].push(parseInt(objs[index].wdEn));
				// weather_array['humidity'].push(parseInt(objs[index].reh));
				// weather_array['forecast'].push(objs[index].wfEn);

				LoaderHighChart();
			});
			//console.debug(weather_array);
		}
	});


	function LoaderHighChart(){
	// HighChart Data
	    $('#weather_chart').highcharts({
			credits: { enabled: 0 },
			chart: {
				type: 'spline',
				backgroundColor: null,
				borderWidth: null,
				style: {
					color: '#fff'
				}
			},
			title: {
				text: ""
			},
			subtitle: {
				text: ""
			},
			xAxis: {
				//categories: weather_array['hour']
				type:'datetime',
				tickInterval: 3 * 3600 * 1000,
				// dateTimeLabelFormats: {
				// 	hour: '%H:%M',

				// 	// month: '%e. %b',
				// 	// year: '%b'
				// },
				labels:{
					style: {
						color: '#fff'
					}
				},
			},
			legend: {
				navigation: {
					activeColor: '#fff',
					inactiveColor: '#aaa',
					animation: true,
					style: {
						color: '#fff'
					}
				}
			},
			yAxis: {
				title: { text: null },
				labels: { enabled: false
					// formatter: function() { return this.value +'°' }
				}
			},
			tooltip: {
				crosshairs: true,
				shared: true
			},
			plotOptions: {
				areaspline: {
					dataLabels: {
						enabled: true,
						color: '#fff',
						symbol: 'circle'
					}
				},
				spline: {
					dataLabels: {
						enabled: true,
						color: '#fff',
					}
				}
			},
			series: [
			{ 
				name: 'Temperature',
				data: weather_array['temp'],
				zIndex: 4,
				lineWidth: 4,
				lineColor: Highcharts.getOptions().colors[3],
				marker: {
					fillColor: 'white',
					lineWidth: 2,
					lineColor: Highcharts.getOptions().colors[3]
				}
			},
			{ 
				name: 'Temperature Range',
				type: 'arearange',
				lineWidth: 0,
				data: weather_array['temp_ranges'],
				linkedTo: ':previous',
				color: Highcharts.getOptions().colors[3],
				fillOpacity: 0.3,
				zIndex: 3
			},
			{
				name: 'Precipitation',
				type: 'areaspline',
				data: weather_array['precipitation'],
				color: Highcharts.getOptions().colors[0],
				zIndex: 2
			},
			{
				name: 'Wind',
				type: 'areaspline',
				data: weather_array['wind'],
				color: Highcharts.getOptions().colors[2],
				zIndex: 1
			}

			]
		});
	}

	function LoaderBackgroundChanger(weather_code){
	// change background (refer to Weather Table below)
		$.backstretch('./img/weather/'+weather_code+'.jpg');
	/* ****** Weather Table ******
	// reference http://css-tricks.com/using-weather-data-to-change-your-websites-apperance-through-php-and-css/
	// https://developer.yahoo.com/weather/#codes

	x0  	tornado
	x1 	tropical storm
	x2 	hurricane
	x3 	severe thunderstorms
	x4 	thunderstorms
	x5 	mixed rain and snow
	x6 	mixed rain and sleet
	x7 	mixed snow and sleet
	x8 	freezing drizzle
	x9 	drizzle
	x10 	freezing rain
	x11 	showers (should be night)
	x12 	showers (should be day)
	x13 	snow flurries
	x14 	light snow showers
	x15 	blowing snow
	x16 	snow
	x17 	hail
	x18 	sleet
	x19 	dust
	x20 	foggy
	x21 	haze
	x22 	smoky
	x23 	blustery
	x24 	windy
	x25 	cold
	x26 	cloudy
	x27 	mostly cloudy (night)
	x28 	mostly cloudy (day)
	x29 	partly cloudy (night)
	x30 	partly cloudy (day)
	x31 	clear (night)
	x32 	sunny
	x33 	fair (night)
	x34 	fair (day)
	x35 	mixed rain and hail
	x36 	hot
	x37 	isolated thunderstorms
	x38 	scattered thunderstorms
	x39 	scattered thunderstorms
	x40 	scattered showers
	x41 	heavy snow
	x42 	scattered snow showers
	x43 	heavy snow
	x44 	partly cloudy
	x45 	thundershowers
	x46 	snow showers
	x47 	isolated thundershowers
	x3200 	not available
	*/
	}

});
</script>
</html>
