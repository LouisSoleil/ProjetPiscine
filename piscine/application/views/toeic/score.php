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

echo "Note : $noteTotal / 200";
?>

</body>
</html>
