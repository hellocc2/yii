<div id="breadcrumb"><ol class="breadcrumb container">
	<?php foreach ($breadcrumbs as $breadcrumb) { ?>
	<li><a href="<?php echo $breadcrumb['href']; ?>"><span><?php echo $breadcrumb['text']; ?></a></span></li>
	<?php } ?>
</ol></div>