<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Score</title>
</head>

<body>
<h3>Score</h3>


<?php

$noteTotal = 0;

foreach ($notes as $key => $value) {
    echo "Partie $key : ".$value['notePartie']." / ".$value['baremePartie']."<br>";
    $noteTotal += $value['notePartie'];
}

echo "<br>";

var_dump($notes);

echo "Note : $noteTotal / 200";

for ($i = 1; $i <=7; $i++) {
    echo "Partie ".$i." : ".$notes[$i]['notePartie']." / ".$notes[$i]['baremePartie']."<br>";
    $noteTotal += $notes[$i]['notePartie'];
}
?>

</body>
</html>
