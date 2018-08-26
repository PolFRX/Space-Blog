<?php
$title='Articles';
$css='Public/css/articles.css';
?>

<?php ob_start(); ?>

<div class="container">
	<div class="row">
		<div id="page" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="row">
				<?php include("View/header.php"); //On introduit le code du header ?> 
			</div>
			<?php include("Model/pagination1.php"); //On introduit le code du header ?> 
			<header>
				<h1 id="titre">Tous les articles du blog</h1>
			</header>
			<div id="ajouter_article row">
				<a href=
				'<?php include('Model/verif_creation.php'); ?>'
				class="pull-right" title="Ajouter un article"><img src="Public/images/plus.png" alt="Ajouter un article" id="plus"></a>
			</div>
			<section id="Articles1" class="row">
				<article id="article1" class="col-sm-offset-2 col-sm-3 col-xs-offset-1 col-xs-10" style="background: url('<?php echo 'Public/photo_article/'.$info[0]['ID'].'.jpg'; ?>'); background-size: contain; <?php 
				if($info[0]['ID']==null) {
					echo 'display: none;';
				}
				?> ">
				<div class="texte_article row">
					<p class="pull-left"><?php echo htmlspecialchars($info[0]['title']); ?></p> <a class="pull-right" href="index.php?action=Article&ID=<?php echo $info[0]['ID']; ?>">Lire l'article</a>
				</div>
			</article>
			<article id="article2" class="col-sm-offset-2 col-sm-3 col-xs-offset-1 col-xs-10" style="background: url('<?php echo 'Public/photo_article/'.$info[1]['ID'].'.jpg'; ?>'); background-size: contain; <?php 
			if($info[1]['ID']==null) {
				echo 'display: none;';
			}
			?> ">
			<div class="texte_article row">
				<p class="pull-left"><?php echo htmlspecialchars($info[1]['title']); ?></p> <a class="pull-right" href="index.php?action=Article&ID=<?php echo $info[1]['ID']; ?>">Lire l'article</a>
			</div>
		</article>
	</section>
	<section id="Articles2" class="row">
		<article id="article3" class="col-sm-offset-2 col-sm-3 col-xs-offset-1 col-xs-10" style="background: url('<?php echo 'Public/photo_article/'.$info[2]['ID'].'.jpg'; ?>'); background-size: contain; <?php 
		if($info[2]['ID']==null) {
			echo 'display: none;';
		}
		?> ">
		<div class="texte_article row">
			<p class="pull-left"><?php echo htmlspecialchars($info[2]['title']); ?></p> <a class="pull-right" href="index.php?action=Article&ID=<?php echo $info[2]['ID']; ?>">Lire l'article</a>
		</div>
	</article>
	<article id="article4" class="col-sm-offset-2 col-sm-3 col-xs-offset-1 col-xs-10" style="background: url('<?php echo 'Public/photo_article/'.$info[3]['ID'].'.jpg'; ?>'); background-size: contain; <?php 
	if($info[3]['ID']==null) {
		echo 'display: none;';
	}
	?> ">
	<div class="texte_article row">
		<p class="pull-left"><?php echo htmlspecialchars($info[3]['title']); ?></p> <a class="pull-right" href="index.php?action=Article&ID=<?php echo $info[3]['ID']; ?>">Lire l'article</a>
	</div>
</article>
</section>
<div class="row">
	<p class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php include('Model/pagination2.php'); ?> </p>
</div>
<?php include("View/footer.php"); //On introduit le code du footer ?>
</div>
</div>
</div>

<?php $content=ob_get_clean(); ?>

<?php require('View/template.php'); ?>