<?php if (!isset($_SESSION['email'])) require ('../error.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../assets/css/homepage.css">
    <meta charset="UTF-8">
    <title>Score</title>
</head>

<body>

<?php include('../../assets/css/header.php'); ?>

<div class="content">

<h3>Score</h3>


<?php


/*foreach ($notes as $key => $value) {
    echo "Partie $key : ".$value['notePartie']." / ".$value['baremePartie']."<br>";
    $noteTotal += $value['notePartie'];
}

echo "<br>";

var_dump($notes);

echo "Note : $noteTotal / 200";*/

for ($i = 1; $i <=7; $i++) {
    echo "Partie ".$i." : ".$notes[$i]['notePartie']." / ".$notes[$i]['baremePartie']."<br>";
}

echo "<br>";

echo "Score partie Orale : ".$scoreListening." / 495"."<br>";
echo "Score partie Ecrite : ".$scoreReading." / 495"."<br>";
echo "<br>";
echo "Note : ". ($scoreReading+$scoreListening)." / 990";


?>

</div>

<?php include('../../assets/css/footer.php'); ?>

</body>
</html>
