<?php
$title='Inscription';
$css='Public/css/inscription.css';
?>

<?php ob_start(); ?>

<div class="container">
	<div class="row">
		<div id="page" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="row">
				<?php include("View/header.php"); //On introduit le code du header ?> 
			</div>
			<section>
				<header>
					<h1 id="titre">S'inscrire</h1>
				</header>
				<section id="page2" class="row">
					<div id="infos" class="col-md-offset-2 col-xs-offset-2  col-lg-8 col-md-8 col-sm-8 col-xs-8">
						<form method="post" class="form-horizontal" action="Forms/traitement_inscription.php" enctype="multipart/form-data">
							<fieldset id="form1">
								<div class="row form-group">
									<legend>Vos informations</legend>
									<label for="nom" class="col-sm-offset-1 col-xs-offset-1 col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Nom:</label> 
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 espace">
										<input type="text" class="form-control" name="nom" id="nom" maxlength="15" placeholder="Rentrez votre nom" maxlength="255" autofocus>
									</div>
									<label for="prenom" class="col-sm-offset-1 col-xs-offset-1 col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Prénom:</label> 
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 espace">
										<input type="text" class="form-control" name="prenom" id="prenom" maxlength="10" placeholder="Rentrez votre prénom" maxlength="255">
									</div>
									<label for="naissance" class="col-sm-offset-1 col-xs-offset-1 col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Date de naissance:</label> 
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 espace">
										<input type="date" class="form-control" name="naissance" id="naissance" placeholder="Rentrez votre date de naissance">
									</div>
									<label for="mail" class="col-sm-offset-1 col-xs-offset-1 col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Mail:</label> 
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 espace">
										<input type="email" class="form-control" name="mail" id="mail" placeholder="Rentrez votre adresse email" maxlength="255">
									</div>
									<label for="mdp" class="col-sm-offset-1 col-xs-offset-1 col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Mot de passe:</label> 
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 espace">
										<input type="password" class="form-control" name="mdp" id="mdp" placeholder="Rentrez votre mot de passe" minlength="5" maxlength="255">
									</div>
									<label for="photo" class="col-sm-offset-1 col-xs-offset-1 col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Photo de profil:</label> 
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 espace">
										<input type="file" class="form-control" name="photo" id="photo" placeholder="Telecharger votre photo de profil">
									</div>
								</div>
							</fieldset>
							<fieldset id="form2">
								<div class="row form-group">
									<legend>Votre présentation</legend>
										<textarea name="presentation" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="presentation" placeholder="Entrez votre présentation" maxlength="600"></textarea>								</div>
							</fieldset>
							<input type="submit" class="btn btn-primary pull-right" name="submit" id="submit" value="Envoyer">
						</form>
					</div>
				</section>
			</section>
			<?php include("View/footer.php"); //On introduit le code du footer ?>
		</div>
	</div>
</div>

<?php $content=ob_get_clean(); ?>

<?php require('View/template.php'); ?>