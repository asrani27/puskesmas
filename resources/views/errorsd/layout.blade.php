<!DOCTYPE html>
<html lang="en">
<head>
	<title>Epus Diskominfotik</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/temp_error/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/temp_error/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/temp_error/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/temp_error/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/temp_error/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/temp_error/vendor/countdowntime/flipclock.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/temp_error/css/util.css">
	<link rel="stylesheet" type="text/css" href="/temp_error/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	
    <div class="bg-img1 size1 overlay1 p-t-24" style="background-image: url('images/bg01.jpg');">
    

		<div class="flex-w flex-sa respon1"> 
			<div class="bg0 wsize1 bor1 p-l-45 p-r-45 p-t-50 p-b-18 p-lr-15-sm">
				<h3 class="l1-txt3 txt-center p-b-43">
					Oops!! Ada Kesalahan Sistem
				</h3>
					
                <a href="{{url()->previous()}}" class="flex-c-m size2 s1-txt2 how-btn1 trans-04">
						Klik Disini Untuk Kembali
                </a>

				<p class="s1-txt3 txt-center p-l-15 p-r-15 p-t-25">
					Development By Diskominoftik Kota Banjarmasin
				</p>
			</div>
		</div>
	</div>



	

<!--===============================================================================================-->	
	<script src="/temp_error/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/temp_error/vendor/bootstrap/js/popper.js"></script>
	<script src="/temp_error/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/temp_error/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/temp_error/vendor/countdowntime/flipclock.min.js"></script>
	<script src="/temp_error/vendor/countdowntime/moment.min.js"></script>
	<script src="/temp_error/vendor/countdowntime/moment-timezone.min.js"></script>
	<script src="/temp_error/vendor/countdowntime/moment-timezone-with-data.min.js"></script>
	<script src="/temp_error/vendor/countdowntime/countdowntime.js"></script>
	<script>
		$('.cd100').countdown100({
			/*Set Endtime here*/
			/*Endtime must be > current time*/
			endtimeYear: 0,
			endtimeMonth: 0,
			endtimeDate: 35,
			endtimeHours: 18,
			endtimeMinutes: 0,
			endtimeSeconds: 0,
			timeZone: "" 
			// ex:  timeZone: "America/New_York"
			//go to " http://momentjs.com/timezone/ " to get timezone
		});

		
	</script>
<!--===============================================================================================-->
	<script src="/temp_error/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="/temp_error/js/main.js"></script>

</body>
</html>