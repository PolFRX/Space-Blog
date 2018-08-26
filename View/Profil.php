<?php
$title='Profil';
$css='Public/css/profil.css';
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
					<h1 id="#titre">Votre profil</h1>
				</header>
				<section id="page2" class="row">
					<div id="image" class="col-sm-offset-1 col-xs-offset-1 col-lg-3 col-md-3 col-sm-3 col-xs-3">
						<img src=<?php
						echo 'Public/photo_user/'.$_SESSION['ID'].'.jpg';

						?> id="photo" class="img-responsive">
					</div>
					<div id="infos">
						<form method="post" class="form-horizontal" action="Forms/traitement_updateprofil.php">
							<fieldset id="form1" class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
								<legend>Vos informations</legend>
								<div class="row">
									<label for="nom" class="col-sm-offset-1 col-xs-offset-1 col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Nom:</label> 
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 espace">
										<input type="text" class="form-control" name="nom" id="nom" value='<?php echo $_SESSION['nom']; ?>' placeholder="Rentrez votre nom" maxlength="255" autofocus>
									</div>
									<label for="prenom" class="col-sm-offset-1 col-xs-offset-1 col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Prénom:</label> 
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 espace">
										<input type="text" class="form-control" name="prenom" id="prenom" value='<?php echo $_SESSION['prenom']; ?>' maxlength="10" placeholder="Rentrez votre prénom" maxlength="255">
									</div>
									<label for="naissance" class="col-sm-offset-1 col-xs-offset-1 col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Date de naissance:</label> 
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 espace">
										<input type="date" class="form-control" name="naissance" id="naissance" value='<?php echo $_SESSION['naissance']; ?>' placeholder="Rentrez votre date de naissance">
									</div>
									<label for="mail" class="col-sm-offset-1 col-xs-offset-1 col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Mail:</label> 
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 espace">
										<input type="email" class="form-control" name="mail" id="mail" value='<?php echo $_SESSION['mail']; ?>' placeholder="Rentrez votre adresse email" maxlength="255">
									</div>
									<label for="mdp" class="col-sm-offset-1 col-xs-offset-1 col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Mot de passe:</label> 
									<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 espace">
										<input type="password" class="form-control" name="mdp" id="mdp" placeholder="Changez votre mot de passe" minlength="5" maxlength="255">
									</div>
								</div>
							</fieldset>
							<fieldset id="form2" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<legend>Votre présentation</legend>
								<div class="row">
								<textarea class="col-sm-offset-1 col-xs-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10" name="presentation" class="form-control" id="presentation" placeholder="Entrez votre présentation" maxlength="600"><?php echo $_SESSION['presentation']; ?></textarea>
								</div>
							</fieldset>
							<input type="submit" class="btn btn-primary" name="submit" id="submit" value="Envoyer">
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