<link rel="stylesheet" href="<?php echo base_url('application/assets/Register.css');?>">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="cl-sm-12">
				<h2>Connexion</h2>
			</div>
		</div>
		<form method ="post" action ="<?php echo site_url('Users/login')?>">
			<div class="form-group">
				<label for="Connexion">Ton Mail :</label>
				<input type="email" class="form-control" name="Email" id="Email" placeholder="Entre ton mail" required>
			</div>
			<div class="form-group">
				<label for="Connexion">Ton Mot de Passe :</label>
				<input type="password" class="form-control" name="MDPEleve" id="MDPEleve" placeholder="Entre ton mot de passe" required>
			</div>
			<div class="checkbox">
	 			<label><input type="checkbox"> Se souvenir de moi</label>
			</div>
		<div class="row">
			<button type="Submit" class="btn btn-success" value="save">Se connecter</button>
		</div>
		</form>
		<div class="row">
			<p><a href="<?php echo base_url('Registers')?>">S'inscrire</a></p>
		</div>
	</div>
</body>
</html>