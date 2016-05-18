<?php 
	$span = 12/$cols; 
	$active = 'latest';
	$id = rand(1,9)+substr(md5($heading_title),0,3);
	
	$categoryConfig = array( 		
		'category_pzoom'				          => 1,
	); 
	$categoryPzoom 	    = $categoryConfig['category_pzoom'];  	
?>
<div class="<?php echo $prefix;?> box productcarousel">
	<div class="box-heading"><span><?php echo $heading_title; ?></span></div>
	<div class="box-content">
 		<div class="box-products slide" id="productcarousel<?php echo $id;?>">
		
			<?php if( trim($message) ) { ?>
			<div class="module-desc wrapper"><?php echo $message;?></div>
			<?php } ?>
			
			<?php if( count($products) > $itemsperpage ) { ?>
			<div class="carousel-controls">
				<a class="carousel-control left fa fa-angle-left" href="#productcarousel<?php echo $id;?>"   data-slide="prev"></a>
				<a class="carousel-control right fa fa-angle-right" href="#productcarousel<?php echo $id;?>"  data-slide="next"></a>
			</div>
			<?php } ?>
			
			<div class="carousel-inner">		
				<?php
				$pages = array_chunk( $products, $itemsperpage);
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
										<?php if( $product['special'] ) {   ?>
											<span class="product-label-special"><span><?php echo $this->language->get( 'text_sale' ); ?></span></span>
										<?php } ?>
										<a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" class="img-responsive" /></a>
										<?php if( $categoryPzoom ) { $zimage = str_replace( "cache/","", preg_replace("#-\d+x\d+#", "",  $product['thumb'] ));  ?>
											<a href="<?php echo $zimage;?>" class="info-view colorbox product-zoom" rel="colorbox" title="<?php echo $product['name']; ?>"><i class="fa fa-search-plus"></i></a>
										<?php } ?>
										<div class="img-overlay"></div>
									</div>
									<?php } ?>
									
									<div class="product-meta">									
										<h3 class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></h3>										
										<p class="description">
											<?php echo utf8_substr( strip_tags($product['description']),0,40);?>...
										</p>										
										<?php if ($product['rating']) { ?>
										<div class="rating"><img src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></div>
										<?php } ?>											
										
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

<script type="text/javascript">
$('#productcarousel<?php echo $id;?>').carousel({interval:<?php echo ( $auto_play_mode?$interval:'false') ;?>,auto:<?php echo $auto_play;?>,pause:'hover'});
</script>
