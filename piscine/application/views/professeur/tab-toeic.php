<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="robots" content="none">
</head>

<body>
	<h1>Par TOEIC</h1>
	<div id ="tabs">
		<ul>
			<label for="toeic">Toeic</label> :
	        <SELECT name="liste_TOEIC">
	            <?php
	            foreach ($liste_TOEIC as $value) {
	                echo "<OPTION>$value[0]</OPTION>";
	            }
	            ?>
	        </SELECT>
		</ul>
    <iframe style="width:100%; height: 220px"></iframe>
	</div>
</body>
</html>