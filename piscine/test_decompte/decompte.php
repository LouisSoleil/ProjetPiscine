<!DOCTYPE html>
<html>
<head>
	<title>essai decompte</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="center">
		<h1><span>2019</span>Fin Toeic decompte</h1>
		<div id = "clock"></div>
	</div>
	<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script src="countdown.js"></script>
  <script type="text/javascript">
  	$('#clock').countdown('2020/2/11 13:32', function(event){
  		var $this = $(this).html(event.strftime(''
  			+'<div><span>%w</span><span>Weeks</span></div>'
  			+'<div><span>%d</span><span>Days</span></div>'
  			+'<div><span>%H</span><span>Hr</span></div>'
  			+'<div><span>%M</span><span>Min</span></div>'
  			+'<div><span>%S</span><span>Sec</span></div>'
  			))
  	})

  </script>
</body>
</html>