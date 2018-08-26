<ul class="pagination">
<li><a href="index.php?action=Articles&page=<?php echo $page-1; ?>">&laquo</a></li>
<?php
for ($i=1; $i <= $nb_page_max; $i++) { 
	?>
	<li class="<?php if($page==$i){echo 'active';}?>"><a href="index.php?action=Articles&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
	<?php
}
?>
<li><a href="index.php?action=Articles&page=<?php echo $page+1; ?>">&raquo</a></li>
</ul>