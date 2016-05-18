<?php if( isset($widget_name)){
?>
<h3 class="menu-title widget-product-name"><span><?php echo $widget_name;?></span></h3>
<?php
}?>
<div class="widget-product">
	<div class="widget-inner">
		<div class="product-block w-product clearfix">
			<?php if ($product['thumb']) { ?>
			<div class="image pull-left"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" /></a></div>
			<?php } ?>
		
			<div class="product-meta pull-left">
				<h3 class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></h3>	
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
				<?php if ($product['rating']) { ?>
					<div class="rating pull-left"><img src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></div>
				<?php } ?>
				<div class="action">
					<div class="cart">	
						<input type="button" value="&#xf07a;" onclick="addToCart('<?php echo $product['product_id']; ?>');" class="product-icon fa fa-shopping-cart shopping-cart " data-placement="top" data-toggle="tooltip" data-original-title="<?php echo $this->language->get("button_cart"); ?>" />
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