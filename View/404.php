<?php
$title='Erreur 404';
$css='Public/css/404.css';
?>

<?php ob_start(); ?>

<div class="container">
	<div class="row">
		<div id="page" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="row">
				<?php include("View/header.php"); //On introduit le code du header ?> 
			</div>
			<section id="erreur">
				<h2>Erreur 404: Page not found</h2>
				<h3>Détails: <?php echo $message_erreur; ?></h3>
			</section>
			<?php include("View/footer.php"); //On introduit le code du footer ?>
		</div>
	</div>
</div>

<?php $content=ob_get_clean(); ?>

<?php require('View/template.php'); ?>