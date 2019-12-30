<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Score</title>
</head>

<body>
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

echo "Partie Orale : ".$notes['listening']." / 100"."<br>";
echo "Partie Ecrite : ".$notes['reading']." / 100"."<br>";
echo "<br>";
echo "Note : ". ($notes['reading']+$notes['listening'])." / 200";



?>

<input type="button" value="Revenir à la page d'accueil" onclick="javascript:location.href='routeur.php?controller=personne&&action=accueil'">

</body>
</html>
