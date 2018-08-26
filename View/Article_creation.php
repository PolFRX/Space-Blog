<?php
$title='Création d\'un article';
$css='Public/css/creation.css';
?>

<?php ob_start(); ?>

<div class="container">
	<div class="row">
		<div id="page" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="row">
				<?php include("View/header.php"); //On introduit le code du header ?> 
			</div>
			<section id="formulaire" class="row">
				<div id="infos" class="col-md-offset-2 col-xs-offset-2  col-lg-8 col-md-8 col-sm-8 col-xs-8">
					<form method="post" action="Forms/traitement_creation.php" enctype="multipart/form-data">
						<fieldset id="titre_article" class="row">
							<legend><label for="titre">Titre de l'article</label></legend>
							<div class="col-sm-offset-1 col-xs-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10 espace">
								<input type="text" class="form-control" name="titre" id="titre" placeholder="Entrez le titre de votre article" maxlength="50" autofocus>
							</div>
						</fieldset>
						<fieldset id="article" class="row">
							<legend><label for="contenu">Contenu de l'article</label></legend>
							<textarea name="contenu" class="form-control col-lg-10 col-md-10 col-sm-10 col-xs-10 espace" id="contenu" placeholder="Ecrivez votre article"></textarea>
							<legend><label for="photo">Photo de l'article: </label></legend>
							<div class="col-sm-offset-1 col-xs-offset-1 col-lg-10 col-md-10 col-sm-10 col-xs-10 espace">
								<input type="file" class="form-control" name="photo" id="photo" placeholder="Télécharger la photo de votre article">
							</div>
						</fieldset>
						<input type="submit" class="btn btn-primary pull-right" name="submit" id="submit">
					</form>
				</div>
			</section>
			<?php include("View/footer.php"); //On introduit le code du footer ?>
		</div>
	</div>
</div>

<?php $content=ob_get_clean(); ?>

<?php require('View/template.php'); ?>