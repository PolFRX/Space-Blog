<?php
$title='Connexion';
$css='Public/css/connexion.css';
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
					<h1 id="titre">Connexion</h1>
				</header>
				<span id="verif" class="hidden"></span>
				<section id="page2" class="row">
					<div id="infos" class="col-md-offset-2 col-xs-offset-2  col-lg-8 col-md-8 col-sm-8 col-xs-8">
						<form method="post" class="form-horizontal" action="#">
							<fieldset id="form_connexion">
								<div class="form-group">
									<div class="row form-group" id="input_mail">
										<label class="col-sm-offset-1 col-xs-offset-1 col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label" for="mail"><strong>Adresse mail:</strong></label> 
										<div id="contener_mail" class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
											<input type="text" class="form-control" name="mail" id="mail" maxlength="255" autofocus>
										</div>
									</div>
									<div class="row form-group" id="input_mdp">
										<label class="col-sm-offset-1 col-xs-offset-1 col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label" for="mdp"><strong>Mot de passe:</strong></label> 
										<div id="contener_mdp" class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
											<input type="password" class="form-control" name="mdp" id="mdp" maxlength="255">
										</div>
									</div>
								</div>
							</fieldset>
							<button type="button" class="btn btn-primary pull-right" name="submit" id="submit"><span class="glyphicon glyphicon-ok-sign"></span> Se Connecter</button>
						</form>
					</div>
				</section>
			</section>
			<div class="row">
				<?php include("View/footer.php"); //On introduit le code du footer ?>
			</div>
		</div>
	</div>
</div>
<script src="jQuery/jquery-3.2.1.min.js"></script>
<script src="Public/JavaScript/erreur_connexion.js"></script> 

<?php $content=ob_get_clean(); ?>

<?php require('View/template.php'); ?>