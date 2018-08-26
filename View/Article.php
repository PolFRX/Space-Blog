<?php
$title=$data['title'];
$css='Public/css/article.css';
?>

<?php require('Forms/enregistrement_fichier.php'); ?>

<?php ob_start(); ?>

<div class="container">
	<div class="row">
		<div id="page" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="row">
				<?php include("View/header.php"); //On introduit le code du header ?>
			</div> 
			<section>
				<header>
					<h1 id="titre"><?php 
					echo htmlspecialchars($data['title']); ?></h1>
				</header>
				<div id="id_post" class="hidden"><?php echo $_GET['ID']; ?></div>
				<div id="id_user" class="hidden"><?php echo $_SESSION['ID']; ?></div>
				<div id="conteneur" class="row">
					<div class="col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-7 col-md-7 col-sm-7 col-xs-10">
						<article id="post" class="col-md-12 col-xs-12">
							<?php
							echo htmlspecialchars($data['content']);
							?>
						</article>
						<?php if(isset($_SESSION['mail'])) { ?>
						<aside id="form" class="col-md-12 col-xs-12">
							<form action="#" method="post">
								<fieldset>
									<legend>Ajouter un commentaire</legend>
									<label for="NewComment" class="col-sm-offset-1 col-lg-3 col-md-3 col-sm-3 col-xs-6 control-label"><strong>Commentaire: </strong></label>
									<input type="text" name="NewComment" id="Comment" class="col-lg-7 col-md-7 col-sm-7 col-xs-6">
									<button type="button" id="submit" title="Envoyer" class="btn btn-primary pull-right">Envoyer</button>
								</fieldset>
							</form>
						</aside>
						<?php } ?>
						<aside id="commentaires" class="col-md-12 col-xs-12">
							
						</aside>
					</div>
					<aside class="col-sm-offset-0 col-xs-offset-3 col-lg-3 col-md-3 col-sm-3 col-xs-6">
						<div id="cadrephoto">
							<img class="img-responsive" src="Public/photo_article/<?php echo $_GET['ID']; ?>.jpg" alt="photo de l'article" id="photo">
						</div>
						<div id="info">
							<h2>Informations</h2>
							<img class="img-responsive hidden-xs" src="public/images/bulle.png" id="fleche">
							<ul>
								<li><strong>Auteur:</strong> <?php 
								echo htmlspecialchars($data['name']); ?></li>
								<li><strong>Date:</strong> <?php echo $data['creation'];
								?></li>
							</ul>
						</div>
					</aside>
				</div>
			</section>
			<?php include("View/footer.php"); //On introduit le code du footer ?>
		</div>
	</div>
</div>
<script src="jQuery/jquery-3.2.1.min.js"></script>
<script src="Public/JavaScript/commentaire.js"></script> 

<?php $content=ob_get_clean(); ?>

<?php require('View/template.php'); ?>