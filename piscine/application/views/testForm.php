<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>S'inscrire (Test)</title>
</head>

<body>
<h3> Test</h3>


<form>
    <input type="button" value="Visible">
</form>

<input type='hidden' name='action' value='createdProfesseur'>

<?php echo "<a href='routeur.php?controller=personne&&action=connect'>"."Se connecter".'</a></br>';?>

<script src="../../utils.js"></script>
</body>
</html>