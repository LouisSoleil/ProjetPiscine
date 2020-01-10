<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="homepage.css">
	<title></title>
</head>
<body>
	<div class="header">
	    <table width="100%" height="100%">
        	<tr>
    	        <td width="10%"></td>
	            <td class="home" width="7%"> 
                    <a href="routeur.php?controller=personne&&action=accueil"> <img src="../../assets/image/logo/maison.png"> </a>
                </td>
            	<td class="logoToeic" width="60%"> </td>
	            <td class="logoProfil" width="7%">
                    <a href="profil.php"> <img src="../../assets/image/logo/profil.png"> </a>
                </td>
            	<td width="8%">
                    <?php  
                    echo '<input class="deconnexion" type="image" value="Déconnexion" src="../../assets/image/logo/power.png" onclick="javascript:location.href=\'routeur.php?controller=personne&&action=deconnect\'">';
                    ?>
                </td>
        	</tr>
    	</table>
	</div>
</body>
</html>