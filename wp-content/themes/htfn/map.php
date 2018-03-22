<?php /* Template Name: Map */ ?>


<?php
get_header();
?>
  <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDihO5Jw2_JlKMif-_8GEkHurrXYFcHoEE&sensor=TRUE">
    </script>
    <script type="text/javascript">
		function initialize() {
	      	var image = 'http://labs.google.com/ridefinder/images/mm_20_red.png';
      	
	    	var locations = [
     			['HTFN - Austria','Linz/Hoersching', 48.307398, 14.286206,'376'],
    			['HTFN - Philippines','Paranaque City', 14.479388, 121.020636,'309'],
    			['HTFN - Philippines','Mandaue City', 10.333582, 123.942480,'309'],
	   			['HTFN - Panama','Panama City',8.984205, -79.519143,'254'],
	   			['HTFN - Panama','Colon', 9.350715, -79.895206,'254'],
	   			['HTFN - Denmark','Kastrup', 55.674798, 12.570280,'304'],
	   			['HTFN - Belgium','Machelen', 50.849895, 4.347711,'26'],
	   			['HTFN - India','New Delhi', 28.638210, 77.221220,'301'],
	   			['HTFN - India','Mumbai', 19.075761, 72.877084,'301'],
	   			['HTFN - India','Ludhiana', 30.901082, 75.859420,'301'],
	   			['HTFN - India','Chennai', 13.054691, 80.256393,'301'],
	   			['HTFN - India','Moradabad', 28.831274, 78.779912,'301'],
	   			['HTFN - Vietnam','Hochiminh City', 10.823759, 106.622951,'299'],
	   			['HTFN - Vietnam','Hai Phong', 20.845133, 106.687247,'299'],
	   			['HTFN - Vietnam','Ha Noi', 21.033472, 105.850061,'299'],
	   			['HTFN - Vietnam','Da Nang City', 16.054923, 108.201671,'299'],
	   			['HTFN - Slovak','Dunajska Luzna', 48.088319, 17.258256,'368'],
	   			['HTFN - Chile','Santiago', -33.423276, -70.610699,'321'],
	   			['HTFN - Bulgaria','Varna', 43.199319, 27.916019,'360'],
	   			['HTFN - USA','Glen Burnie, MD', 39.161606, -76.672379,'143'],
	   			['HTFN - Egypt','Cairo', 30.045013, 31.234743,'318'],
	   			['HTFN - Egypt','10th of Ramadan', 30.277262, 31.752806,'318'],
	   			['HTFN - Egypt','6th of October', 29.903881, 30.907588,'318'],
	   			['HTFN - Indonesia','Jakarta', -6.270073, 106.884809,'264'],
	   			['HTFN - Indonesia','Bandung', -6.925178, 107.590026,'264'],
	   			['HTFN - Indonesia','Denpasar', -8.716342, 115.168585,'264'],
	   			['HTFN - Indonesia','Semarang', -6.972521, 110.390520,'264'],
	   			['HTFN - Indonesia','Surabaya', -7.378534, 112.787268,'264'],
	   			['HTFN - USA','Forest Park, GA', 33.617138, -84.387512,'83'],
	   			['HTFN - USA','Miami, FL', 25.799008, -80.372089,'83'],
	   			['HTFN - USA','Charlotte, NC', 35.180043, -80.925023,'83'],
	   			['HTFN - USA','Charleston, SC', 32.822228, -79.993163,'83'],
	   			['HTFN - India','Mumbai', 28.544109, 77.126145,'362'],
	   			['HTFN - India','Tirupur', 11.108983, 77.340810,'362'],
	   			['HTFN - India','Bangalore', 12.974072, 77.594547,'362'],
	   			['HTFN - India','Tuticorin', 8.802570, 78.148421,'362'],
	   			['HTFN - India','Pune', 18.521687, 73.858848,'362'],
	   			['HTFN - India','Chennai', 13.054022, 80.248839,'362'],
	   			['HTFN - China','Beijing', 40.117965, 116.577225,'322'],
				['HTFN - China','Qingdao', 36.073937, 120.384064,'278'],
				['HTFN - China','Guangzhou City', 23.138227, 113.270416,'278'],
	   			['HTFN - China','Xiamen & Shenzhen', 24.487229, 118.028512,'366'],
	   			['HTFN - China','Tianjin', 39.111900, 117.221195,'331'],
	   			['HTFN - China','Dalian', 38.924708, 121.653560,'331'],
	   			['HTFN - China','Hohhot', 40.827517, 111.664171,'331'],
	   			['HTFN - China','Shanghai', 31.241711, 121.477308,'411'],
	   			/*
	   			['HTFN - China','Hangzhou', 30.258313, 120.173209,'268'],
	   			['HTFN - China','Ningbo', 29.869325, 121.558478,'268'],	   				   								   			
	   			*/
	   			/*
	   			['HTFN - Ghana','Accra', 5.612152, -0.186439,'279'],
	   			['HTFN - Ghana','Accra', 5.612152, -0.186439,'279'],
	   			['HTFN - Ghana','Tema', 5.666939, -0.015470,'279'],
	   			*/
	   			['HTFN - Thailand','Bangkok', 13.716723, 100.572868,'18'],
	   			['HTFN - Thailand','Laem Chabang', 13.081241, 100.919782,'18'],
	   			['HTFN - France','Paris', 48.994326, 2.522269,'319'],
	   			['HTFN - France','Marseille', 43.442137, 5.226954,'319'],
	   			['HTFN - Turkey','Izmir', 38.441010, 27.144075,'317'],
	   			['HTFN - Turkey','Ankara', 39.909253, 32.854412,'317'],
	   			['HTFN - Turkey','Bursa', 40.269363, 29.073278,'317'],
	   			['HTFN - Turkey','Istanbul', 40.973783, 29.253626,'317'],
	   			['HTFN - Kuwait','Kuwait City', 29.263306, 47.956288,'59'],
	   			['HTFN - Bahrain','Manama', 26.219998, 50.581928,'59'],
	   			['HTFN - Qatar','Doha', 25.272961, 51.599840,'386'],	   			
	   			['HTFN - United Arab Emirates','Dubai', 25.254326, 55.340938,'59'],
	   			['HTFN - USA','Union, NJ', 40.686597, -74.299651,'71'],
	   			['HTFN - Sri Lanka','Colombo', 6.927824, 79.860573,'370'],
	   			['HTFN - Israel','Tel Aviv', 32.001033, 34.870685,'333'],
	   			['HTFN - Israel','Ashdod', 31.823404, 34.649142,'333'],
	   			['HTFN - Israel','Haifa', 32.829484, 34.989782,'333'],
	   			['HTFN - Italy','Milano', 45.480098, 9.308819,'334'],
	   			['HTFN - Italy','Genova', 44.405273, 8.942584,'334'],
	   			['HTFN - Italy','Brescia', 45.522440, 10.187495,'334'],
	   			['HTFN - Canada','Mississauga', 43.662936, -79.685033,'414'],
	   			['HTFN - Canada','Calgary', 51.078559, -114.009900,'414'],
	   			['HTFN - Canada','Lachine', 45.465420, -73.719657,'414'],
	   			['HTFN - Canada','Vancouver', 49.206830, -123.147503,'414'],
	   			['HTFN - Canada','Mississauga', 43.670293, -79.686476,'414'],
	   			['HTFN - Venezuela','Caracas', 10.478983, -66.804920,'312'],
	   			['HTFN - Korea','Seoul', 37.497465, 127.039427,'238'],
	   			['HTFN - Korea','Incheon', 37.467023, 126.435111,'238'],
	   			['HTFN - Korea','Pusan', 35.176237, 129.071113,'238'],
	   			['HTFN - Ireland','Dublin', 53.403999, -6.234676,'34'],
	   			['HTFN - Ireland','Belfast', 54.631776, -5.891145,'34'],
	   			['HTFN - Ireland','Glanmire', 51.931622, -8.372536,'34'],
	   			['HTFN - Ireland','Shannon', 52.719300, -8.869689,'34'],
	   			['HTFN - Malaysia','Petaling Jaya', 3.070416, 101.601257,'6'],
	   			['HTFN - Malaysia','Sepang', 2.737458, 101.711698,'6'],
	   			['HTFN - Malaysia','Port Kelang', 3.015881, 101.397815,'6'],
	   			['HTFN - Malaysia','Penang', 5.324573, 100.279724,'6'],
	   			['HTFN - Malaysia','Johor Bahru', 1.663136, 103.678254,'6'],
	   			['HTFN - Netherlands','Schiphol', 52.285196, 4.746257,'243'],
	   			['HTFN - Ecuador','Quito', -0.213517, -78.508836,'361'],
	   			['HTFN - Uruguay','Montevideo', -34.906091, -56.206671,'308'],
	   			['HTFN - Hungary','Budapest', 47.613507, 19.177819,'384'],
	   			['HTFN - Argentina','Buenos Aires', -34.598416, -58.375887,'355'],
	   			['HTFN - Lebanon','Beirut', 33.889742, 35.495436,'358'],
	   			['HTFN - Japan','Tokoname (Nagoya)', 34.859341, 136.814621,'338'],
	   			['HTFN - Japan','Narita (Tokyo)', 35.817530, 140.358823,'338'],
	   			['HTFN - Japan','Osaka', 34.682141, 135.517037,'338'],
	   			['HTFN - Japan','Fukuoka', 33.592187, 130.446735,'338'],
	   			['HTFN - Mexico','Queretaro, QRO', 20.567822, -100.419613,'352'],
	   			['HTFN - Mexico','Leon ', 21.111414, -101.646904,'352'],
	   			['HTFN - Mexico','Merida', 21.147401, -86.856809,'352'],
	   			['HTFN - Mexico','Guadalajara', 20.667109, -103.396798,'352'],
	   			['HTFN - Mexico','Mexico City', 19.438052, -99.084851,'352'],
	   			['HTFN - Mexico',' Merida ', 21.111414, -101.646904,'352'],
	   			['HTFN - Mexico','Monterrey', 25.672951, -100.305825,'352'],
	   			['HTFN - Spain','Barcelona', 41.281577, 1.984747,'330'],
	   			['HTFN - Spain','Barcelona', 41.281577, 1.984747,'330'],
	   			['HTFN - Spain','Madrid', 40.416397, -3.703226,'330'],
	   			['HTFN - USA','Los Angeles, CA', 33.865310, -118.235242,'389'],
	   			['HTFN - USA','San Diego, CA', 32.750220, -117.200289,'389'],
	   			['HTFN - USA','San Francisco, CA', 37.807698, -122.414396,'389'],
	   			['HTFN - Hong Kong','Kowloon', 22.307344, 114.223397,'310'],
	   			['HTFN - Hong Kong','Hong Kong', 22.299051, 113.928727,'310'],
	   			['HTFN - United Kingdom','Liverpool', 53.414754, -2.926823,'271'],
	   			['HTFN - United Kingdom','London', 51.458460, -0.408611,'271'],
	   			['HTFN - United Kingdom','Felixstowe', 51.961829, 1.351242,'271'],
	   			['HTFN - United Kingdom','Manchester', 53.484913, -2.248998,'271'],
	   			['HTFN - United Kingdom','Northampton', 52.243674, -0.902714,'271'],
	   			['HTFN - Brazil','Porto Alegre', -29.692751, -51.141572,'169'],
	   			['HTFN - Brazil','Caxias do Sul', -29.168792, -51.191246,'169'],
	   			['HTFN - Brazil','Fortaleza', -3.735293, -38.479203,'169'],
	   			['HTFN - Brazil','Sao Paulo', -23.455758, -46.558957,'169'],
	   			['HTFN - Brazil','Rio Grande', -32.033001, -52.094772,'169'],
	   			['HTFN - Brazil','Salvador', -12.972705, -38.495468,'169'],
	   			['HTFN - Greece','Piraeus', 37.936982, 23.638093,'373'],
	   			['HTFN - Greece','Koropi/Athens', 37.935943, 23.948416,'373'],
	   			['HTFN - Greece','Thessaloniki', 40.638282, 22.936323,'373'],
	   			['HTFN - Greece','Aspropyrgos', 38.061795, 23.591529,'373'],
    	  		['HTFN - USA','DFW, Tx.', 32.795975, -97.019837,'293'],
      			['HTFN - USA','Houston., Tx', 29.951508, -95.335537,'293'],
				['HTFN - Australia','Sydney', -33.922842, 151.180582,'2'],
				['HTFN - Australia','Adelaide', -34.931622, 138.566524,'2'],
				['HTFN - Australia','Brisbane', -27.435578, 153.085295,'2'],
				['HTFN - Australia','Melbourne', -37.837812, 144.943157,'2'],
				['HTFN - Australia','Perth', -31.986868, 115.951183,'2'],
				['HTFN - Australia','Newcastle', -32.881387, 151.722685,'2'],
				['HTFN - Australia','Newcastle', -32.881387, 151.722685,'2'],
				['HTFN - Australia','Berrimah', -12.469225, 130.922831,'2'],
				['HTFN - Czech','Prague', 50.086426, 14.315960,'378'],
				['HTFN - Singapore','Singapore', 1.383131, 103.999521,'266'],
				['HTFN - Singapore','Singapore', 1.338019, 103.898356,'266'],
				['HTFN - USA','Boston, MA', 42.384847, -71.022482,'354'],
				['HTFN - USA','St. Louis, MO', 38.726604, -90.334590,'78'],
				['HTFN - USA','Chicago, IL', 41.992607, -87.984626,'68'],
				['HTFN - Pakistan','Lahore', 24.844966, 67.024009,'363'],
				['HTFN - Colombia','Bogota', 4.620929, -74.063889,'47'],
				['HTFN - Colombia','Cartagena', 10.415788, -75.522124,'47'],
				['HTFN - Colombia','Buenaventura', 3.885661, -77.023631,'47'],
				['HTFN - Bangladesh','Dhaka', 23.794182, 90.405373,'284'],
				['HTFN - Bangladesh','Dhaka', 23.753026, 90.368899,'284'],
				['HTFN - Bangladesh','Chittagong', 22.329225, 91.805706,'284'],
 				['HTFN - Sweden','Gothenburg', 57.708092, 11.961428,'336'],
 				['HTFN - Finland','Helsinki', 60.189758, 24.970938,'336'],
 				['HTFN - Norway','Oslo', 59.913818, 10.733672,'336'],
 				['HTFN - Portugal','Maia', 41.230162, -8.621056,'305'],
 				['HTFN - Portugal','Lisbon', 38.756076, -9.116468,'305'],
 				['HTFN - Germany','Duisburg', 51.420956, 6.687429,'327'],
				['HTFN - Germany','Neu Wulmstorf', 53.466642, 9.772777,'327'],
				['HTFN - USA','Egan, MN', 44.858936, -93.155336,'357'],
				['HTFN - South Africa','Durban', -29.882038, 30.963662,'212'],
				['HTFN - South Africa','Cape Town', -33.968222, 18.576572,'212'],
				['HTFN - South Africa','Johannesburg', -26.159373, 28.210327,'212'],
				['HTFN - Taiwan','Taipei', 25.052329, 121.544361,'367'],
				['HTFN - Cambodia','Phnom Penh', 11.548256, 104.907100,'364'],
				['HTFN - Morocco','Casablanca', 33.594830, -7.604675,'306'],
				['HTFN - Peru','Callao', -12.019770, -77.099794,'272'],
				['HTFN - Peru','Iquitos', -3.748865, -73.251117,'272'],
				['HTFN - Jordan','Amman', 31.986524, 35.879746,'320'],
				['HTFN - Germany','Stuttgart', 48.692161, 9.196579,'371'],
				['HTFN - Germany','Hamburg', 53.544997, 9.991703,'371'],
				['HTFN - Germany','Frankfurt', 50.028323, 8.563681,'371'],
				['HTFN - Germany','Munich', 48.136355, 11.574795,'371'],
				/*
				['HTFN - Paraguay','Asuncion', -25.330943, -57.564573,'383'],
				*/
				
				['HTFN - Saudi Arabia','Riyadh', 24.731635, 46.674040,'391'],
				['HTFN - Poland','Warsaw', 52.225913, 21.007723,'387'],				
				['HTFN - Switzerland','Basel', 47.551909, 7.633853,'353'],
				['HTFN - Switzerland','Zurich', 47.420302, 8.397701,'353'],
				['HTFN - Switzerland','Geneva', 46.240453, 6.116608,'353'],
 				['HTFN - USA','Nashville, TN', 36.148266, -86.685767,'165'],
 				['HTFN - USA','Knoxville, TN', 35.800427, -83.993288,'165'],
 				['HTFN - USA','Memphis, TN', 35.068692, -89.844766,'165'],
 				['HTFN - Kenya','Nairobi', -1.320789, 36.814701,'292'],
 				['HTFN - Kenya','Mombasa', -4.062868, 39.675337,'292'],
 				['HTFN - Kenya','Entebbe', 0.045331, 32.442778,'292'],
  				['HTFN - China','Chengdu', 30.567523, 103.950920,'377'],
   				['HTFN - Serbia','Topola', 44.253260, 20.683319, '413'] 				
      		];
      		
      		var homeLatlng = '-10.00, 2.00';
      	
        	var mapOptions = {center: new google.maps.LatLng(-10.00, 2.00), zoom: 3};        
        
        	var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
        
   			var infowindow = new google.maps.InfoWindow();
  		
  			var marker, i;
  		
			for (i = 0; i < locations.length; i++) {
				var markerContent;  
      			marker = new google.maps.Marker({position: new google.maps.LatLng(locations[i][2], locations[i][3]), map: map, title: locations[i][0], icon: image});
				google.maps.event.addListener(marker, 'click', (function(marker, i) {
					return function() {
						markerContent = '<div id="popUp"><span class="header">'+locations[i][0]+'<br />'+locations[i][1]+'</span><p><a href="<?php echo get_home_url(); ?>/contact?mem='+locations[i][4]+'">Click Here to send your request!.</a></p></div>';
						infowindow.setContent( markerContent);						
						infowindow.open(map, marker);
					}
				})(marker, i));
      		}
			google.maps.event.addDomListener(window, "resize", function() {
    			var center = map.getCenter();
    			google.maps.event.trigger(map, "resize");
    			map.setCenter(center); 
			});	
		}
		google.maps.event.addDomListener(window, 'load', initialize);
    </script>
	
	<script type="text/javascript">
		//login and register forms
	    function openForm(x)
	    {
			var overlay = document.getElementById('cover');
			var specialBox = document.getElementById(x);
			overlay.style.opacity = .8;
			if(overlay.style.display == "block"){
				overlay.style.display = "none";
				specialBox.style.display = "none";
			} else {
				overlay.style.display = "block";
				specialBox.style.display = "block";
			}
	
	    	document.htfn.USER_ID.focus();
	    }
	
		function validate(){
			if ((document.htfn.USER_ID.value=="")||(document.htfn.USER_PASSWORD.value=="")){
				alert("You must enter your User ID and your Password.")
			}else{
				document.htfn.submit()
			}
		}
		function notYet(){
			alert("This feature is not available yet. Please check back soon.")
		}
		function save_validate(){
			if (document.htfn.SAVE_INFO.checked){
				setCookie()
			}
			validate_my_pci()
		}
		function loadCookies(){
			document.htfn.USER_ID.value=getCookieData('USER_ID')
			document.htfn.USER_PASSWORD.value=getCookieData('USER_PASSWORD')
			if (getCookieData('USER_ID')!=""){
				document.htfn.SAVE_INFO.checked=true
			}
		}
		function getCookieData(label){
			var labelLen=label.length
			var cLen=document.cookie.length
			var i=0
			var cEnd
			while (i < cLen){
				var j = i + labelLen
				if (document.cookie.substring(i,j) == label){
					cEnd = document.cookie.indexOf(";",j)
					if (cEnd == -1){
						cEnd = document.cookie.length
					}
					return unescape(document.cookie.substring(j,cEnd)).replace("=","")
				}
				i++ 
			}
			return ""
		}
		function deleteCookie(){
			var exp = new Date()
			var oneYearFromNow = exp.getTime() - (365 * 24 * 60 * 60 * 1000)
			exp.setTime(oneYearFromNow)
			if (!document.htfn.SAVE_INFO.checked){
				if (confirm('Are you sure you would like to delete the Login information stored on this computer?')){
					document.cookie='USER_ID='+document.htfn.USER_ID.value+';expires='+exp.toGMTString()+';'
					document.cookie='USER_PASSWORD='+document.htfn.USER_PASSWORD.value+';expires='+exp.toGMTString()+';'
				}
			}
		}
		function setCookie(){
			var exp = new Date()
			var oneYearFromNow = exp.getTime() + (365 * 24 * 60 * 60 * 1000)
			exp.setTime(oneYearFromNow)
			document.cookie='USER_ID='+document.htfn.USER_ID.value+';expires='+exp.toGMTString()+';'
			document.cookie='USER_PASSWORD='+document.htfn.USER_PASSWORD.value+';expires='+exp.toGMTString()+';'
		}
		function popUpWin(pPage,w,h){
			winPopUp=window.open(pPage,'','status=no, toolbar=no,location=no,directories=no,menubar=no,scrollbars=yes,width='+w+',height='+h+',top=30,left=20')
		}
	
	</script>
	<script language="JavaScript">
		function setVisibility(id) {
			if(id == 'none'){
				document.getElementById('cust-menu').style.display = 'none';
				document.getElementById('join-menu').style.display = 'none';
				document.getElementById('blank-menu').style.display = 'block';
			}else{
				if(id == 'join-menu'){ 
					document.getElementById('cust-menu').style.display = 'none';
				}else{
					document.getElementById('join-menu').style.display = 'none';
				}
				if(document.getElementById(id).style.display == 'block'){ 
					document.getElementById(id).style.display = 'none';
					document.getElementById('blank-menu').style.display = 'block';
				}else{
					document.getElementById('blank-menu').style.display = 'none';
					document.getElementById(id).style.display = 'block';
				}
			}
		}
		function chgLang(id) {
			if(id == 'videoEng')
			{
	    		document.getElementById('videoEng').style.display = 'none';
				document.getElementById('videoEsp').style.display = 'block';
			}
			else
			{
	        	document.getElementById('videoEsp').style.display = 'none';
	        	document.getElementById('videoEng').style.display = 'block';
			}
		}
		function test(){
			alert("Got Here");
		}
		function closeInstructions(){
			var ele = document.getElementById("instructions");
			ele.style.display = "none";			
		}
	</script>
	<?php
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	?>
	<div id="instructions">
		<a href="#" onclick="closeInstructions()">
  		<div style="position:absolute;top:50%;left:50%;width:500px;height:300px;margin:-150px 0 0 -250px;background:#ffffff;">
   			<img src="<?php echo $image[0]; ?>" border="0"/><span style="float:right;color:#FF0000;font-size:125%;margin:20px 20px 0 0;border:1px #FF0000 solid;">&#10006;</span>
   			<p style="margin:20px 10px 20px 20px;color:#000000;font-size:130%;">Thank you for your interest!</p>
  			<p style="margin:20px 10px 20px 20px;color:#000000;font-size:120%;">To receive information or request service please click on the location nearest you.</p>
		</div>
		</a>
	</div>
 

<div style="clear:both;"></div>

<section id="frontpage">
	
	<div id="map-canvas"></div>
			
</section>	

<div style="clear:both;"></div>

<?php
get_footer();
?>

