<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <!-- Website Template designed by www.downloadwebsitetemplates.co.uk -->
    <meta charset="UTF-8">
    <title>Dalam Perbaikan</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/progress/images/ico/apple-touch-icon-144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/progress/images/ico/apple-touch-icon-114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/progress/images/ico/apple-touch-icon-72.png">
    <link rel="apple-touch-icon-precomposed" href="/progress/images/ico/apple-touch-icon-57.png">
    <link rel="shortcut icon" href="/progress/images/ico/favicon.png">
    <!--[if IE]><![endif]-->
    <link rel="stylesheet" href="/progress/css/style.css">
    <script src="/progress/js/jquery.js"></script>
    <script src="/progress/js/countdown.js"></script>
    <script src="/progress/js/owlcarousel.js"></script>
    <script src="/progress/js/uikit.scrollspy.js"></script>
    <script src="/progress/js/scripts.js"></script>
    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>

<body id="backtotop">

    <div class="fullwidth clearfix">
        <div id="topcontainer" class="bodycontainer clearfix"
            data-uk-scrollspy="{cls:'uk-animation-fade', delay: 300, repeat: true}">

            <p><span class="fa fa-signal"></span></p>
            <h1><span>Progress</span><br />Maintenance Baapik</h1>
            <p>Perpindahan Server</p>

        </div>
    </div>

    <div class="arrow-separator arrow-white"></div>

    <div class="fullwidth colour1 clearfix">
        <div id="countdown" class="bodycontainer clearfix"
            data-uk-scrollspy="{cls:'uk-animation-fade', delay: 300, repeat: true}">

            <div id="countdowncont" class="clearfix">
                <ul id="countscript">
                    <li>
                        <span class="days" id="days">00</span>
                        <p>Hari</p>
                    </li>
                    <li>
                        <span class="hours" id="hours">62</span>
                        <p>Jam</p>
                    </li>
                    <li class="clearbox">
                        <span class="minutes" id="minutes">00</span>
                        <p>Menit</p>
                    </li>
                    <li>
                        <span class="seconds" id="seconds">00</span>
                        <p>Detik</p>
                    </li>
                </ul>
            </div>

        </div>
    </div>

</body>
<script>
    // Set the date we're counting down to
    var countDownDate = new Date("Apr 5, 2022 15:37:25").getTime();
    
    // Update the count down every 1 second
    var x = setInterval(function() {
    
      // Get today's date and time
      var now = new Date().getTime();
    
      // Find the distance between now and the count down date
      var distance = countDownDate - now;
    
      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
      // Display the result in the element with id="demo"
    //   document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    //   + minutes + "m " + seconds + "s ";
      document.getElementById("days").innerHTML = days;
      document.getElementById("hours").innerHTML = hours;
      document.getElementById("minutes").innerHTML = minutes;
      document.getElementById("seconds").innerHTML = seconds;
    
      // If the count down is finished, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);
</script>

</html>