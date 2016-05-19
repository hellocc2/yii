<?php 
/******************************************************
 * @package Pav Product Tabs module for Opencart 1.5.x
 * @version 1.0
 * @author http://www.pavothemes.com
 * @copyright	Copyright (C) Feb 2012 PavoThemes.com <@emai:pavothemes@gmail.com>.All rights reserved.
 * @license		GNU General Public License version 2
*******************************************************/

	$span = 12/$cols; 
	$active = 'latest';
	$id = rand(1,9)+rand();	
	$categoryConfig = array( 		
		'category_pzoom'				          => 1,
	); 
	$categoryPzoom 	    = $categoryConfig['category_pzoom']; 
?>
<div class="box producttabs <?php echo $module_class; ?>">
	<?php if( !empty($module_description) ) { ?>
		<div class="module-desc wrapper">
			<?php echo $module_description;?>
		</div>
	<?php } ?>
	<div class="tab-nav">
		<ul class="nav nav-tabs box-heading" id="producttabs<?php echo $id;?>">
			<?php foreach( $tabs as $tab => $products ) { if( empty($products) ){ continue;}  ?>
				<li><a href="#tab-<?php echo $tab.$id;?>" data-toggle="tab"><?php echo $this->language->get('text_'.$tab)?></a></li>
			<?php } ?>
		</ul>
	</div>	

	<div class="tab-content">
		<?php foreach( $tabs as $tab => $products ) { 
			if( empty($products) ){ continue;}
		?>
		<div class="tab-pane box-products tabcarousel<?php echo $id; ?> slide" id="tab-<?php echo $tab.$id;?>">				
			
			<?php if( count($products) > $itemsperpage ) { ?>
			<div class="carousel-controls">
				<a class="carousel-control left fa fa-angle-left" href="#tab-<?php echo $tab.$id;?>"   data-slide="prev"></a>
				<a class="carousel-control right fa fa-angle-right" href="#tab-<?php echo $tab.$id;?>"  data-slide="next"></a>
			</div>
			<?php } ?>
			
			<div class="carousel-inner">		
				<?php 
				$pages = array_chunk( $products, $itemsperpage);
				//	echo '<pre>'.print_r( $pages, 1 ); die;
				?>	
				<?php foreach ($pages as  $k => $tproducts ) {   ?>
					<div class="item <?php if($k==0) {?>active<?php } ?> product-grid no-margin">
						<?php foreach( $tproducts as $i => $product ) {  $i=$i+1;?>
							<?php if( $i%$cols == 1 ) { ?>
							<div class="row">
							<?php } ?>
								<div class="col-lg-<?php echo $span;?> col-sm-<?php echo $span;?> col-xs-12">
									<div class="product-block">
										<?php if ($product['thumb']) { ?>
										<div class="image">
											<a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" class="img-responsive" /></a>
											<?php if( $categoryPzoom ) { $zimage = str_replace( "cache/","", preg_replace("#-\d+x\d+#", "",  $product['thumb'] ));  ?>
												<a href="<?php echo $zimage;?>" class="info-view colorbox product-zoom" rel="colorbox" title="<?php echo $product['name']; ?>"><i class="fa fa-search-plus"></i></a>
											<?php } ?>
											<div class="img-overlay"></div>
										</div>
										<?php } ?>
										
										<div class="product-meta">
											<h3 class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></h3>		
										
											<?php if ($product['rating']) { ?>
												<div class="rating"><img src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></div>
											<?php } ?>										
										
											<p class="description">
												<?php echo utf8_substr( strip_tags($product['description']),0,40);?>...
											</p>
										
											<?php if ($product['price']) { ?>
												<div class="price">
													<?php if (!$product['special']) { ?>
													<?php echo $product['price']; ?>
													<?php } else { ?>
													<span class="price-old"><?php echo $product['price']; ?></span> 
													<span class="price-new"><?php echo $product['special']; ?></span>
													<?php } ?>
												</div>
											<?php } ?>
										
											<div class="action">
												<div class="cart">
													<input type="button" value="&#xf07a;" onclick="addToCart('<?php echo $product['product_id']; ?>');" class="product-icon fa fa-shopping-cart shopping-cart " data-placement="top" data-toggle="tooltip" data-original-title="<?php echo $button_cart; ?>" /> 													
												</div>
												<div class="wishlist">
													<a onclick="addToWishList('<?php echo $product['product_id']; ?>');" title="<?php echo $this->language->get("button_wishlist"); ?>" class="fa fa-heart product-icon" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo $this->language->get("button_wishlist"); ?>">
														<?php // echo $this->language->get("button_wishlist"); ?>
													</a>	
												</div>
												<div class="compare">			
													<a onclick="addToCompare('<?php echo $product['product_id']; ?>');" title="<?php echo $this->language->get("button_compare"); ?>" class="fa fa-exchange product-icon" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo $this->language->get("button_compare"); ?>">
														<?php // echo $this->language->get("button_compare"); ?>
													</a>	
												</div>
											</div>
										</div>
									</div>
								</div>
							  
							<?php if( $i%$cols == 0 || $i==count($tproducts) ) { ?>
						    </div>
							<?php } ?>
						<?php } //endforeach; ?>
					</div>
				<?php } ?>
			</div>  
		</div>
		<?php } // endforeach of tabs ?>	
	</div>
</div>


<?php if( $categoryPzoom ) {  ?>
<script type="text/javascript">
<!--
$(document).ready(function() {
	$('.colorbox').colorbox({
		overlayClose: true,
		opacity: 0.5,
		rel: false,
		onLoad:function(){
			$("#cboxNext").remove(0);
			$("#cboxPrevious").remove(0);
			$("#cboxCurrent").remove(0);
		}
	});	 
});
//-->
</script>
<?php } ?>

<script>
$(function () {
$('#producttabs<?php echo $id;?> a:first').tab('show');
})
$('.tabcarousel<?php echo $id;?>').carousel({interval:false,auto:false,pause:'hover'});
</script>
