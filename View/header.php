<header id="head" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<h1>Bienvenue sur le blog de l'Espace</h1>
	<div class="row">
	<nav>
		<ul class="list-inline">
			<li class="col-md-offset-2 col-lg-2 col-md-2 col-sm-3 col-xs-12"><a href="index.php">Accueil</a></li>
			<li class="col-lg-2 col-md-2 col-sm-3 col-xs-12"><a href="index.php?action=Articles">Articles</a></li>
			<?php 
			if(isset($_SESSION['mail'])) {
				?>
				<li class="col-lg-2 col-md-2 col-sm-3 col-xs-12"><a href="index.php?action=Profil">Profil</a></li>
				<li class="col-lg-2 col-md-2 col-sm-3 col-xs-12"><a href="Forms/traitement_deconnexion">Déconnexion</a></li>
				<?php
			}
			else {
				?>
			
			<li class="col-lg-2 col-md-2 col-sm-3 col-xs-12"><a href="index.php?action=Connexion">Connexion</a></li>
			<li class="col-lg-2 col-md-2 col-sm-3 col-xs-12"><a href="index.php?action=Inscription">Inscription</a></li>
			<?php
		}
		?>
		</ul>
	</nav>
</div>
</header>