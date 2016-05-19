<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/product/product_filter.tpl" );  ?>    
  
<div class="product-list"> 
	<div class="products-block">
		<?php
		$cols = $MAX_ITEM_ROW ;
		$span = floor(12/$cols);
		$small = floor(12/$MAX_ITEM_ROW_SMALL);
		$mini = floor(12/$MAX_ITEM_ROW_MINI);
		foreach ($products as $i => $product) { ?>
		<?php if( $i++%$cols == 0 ) { ?>
		<div class="row">
		<?php } ?>
	
		<div class="col-lg-<?php echo $span;?> col-md-<?php echo $span;?> col-sm-<?php echo $small;?> col-xs-<?php echo $mini;?>">			
			<div class="product-block">	
				<?php if ($product['thumb']) { ?>
					<div class="image">
						<?php if( $product['special'] ) {   ?>	    	
							<span class="product-label-special"><span><?php echo $this->language->get( 'text_sale' ); ?></span></span>
						<?php } ?>					
						<a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" title="<?php echo $product['name']; ?>" alt="<?php echo $product['name']; ?>" class="img-responsive" /></a>
						<?php if( $categoryPzoom ) { $zimage = str_replace( "cache/","", preg_replace("#-\d+x\d+#", "",  $product['thumb'] ));  ?>
							<a href="<?php echo $zimage;?>" class="info-view colorbox product-zoom" rel="colorbox" title="<?php echo $product['name']; ?>"><i class="fa fa-search-plus"></i></a>
						<?php } ?>							
						<div class="img-overlay"></div>
					</div>
				<?php } ?>
								 
				<div class="product-meta">		  
					<div class="left">
						<h3 class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></h3>						  
						<?php if ($product['rating']) { ?>
						<div class="rating"><img src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></div>
						<?php } ?>
						<p class="description"><?php echo utf8_substr( strip_tags($product['description']),0,160);?>...</p>
					</div>
			  
					<div class="right">	
						<?php if ($product['price']) { ?>
						<div class="price">
							<?php if (!$product['special']) { ?>
								<span class="special-price"><?php echo $product['price']; ?></span>
							<?php } else { ?>
								<span class="price-old"><?php echo $product['price']; ?></span> 
								<span class="price-new"><?php echo $product['special']; ?></span>
							<?php } ?>
							<?php if ($product['tax']) { ?>	        
								<span class="price-tax"><?php echo $text_tax; ?> <?php echo $product['tax']; ?></span>
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
		</div>
		
		<?php if( $i%$cols == 0 || $i==count($products) ) { ?>
		</div>
		<?php } ?>				
		<?php } ?>
	</div>
</div>
<div class="pagination"><?php echo $pagination; ?></div>