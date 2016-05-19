<div class="box">
	<div class="box-heading"><span><?php echo $heading_title; ?></span></div>
	<div class="box-content" >
		<?php if( !empty($blogs) ) { ?>
		<div class="pavblog-latest row">
			<?php foreach( $blogs as $key => $blog ) { $key = $key + 1;?>
			<div class="col-lg-<?php echo floor(12/$cols);?> col-sm-<?php echo floor(12/$cols);?> col-xs-12">
				<div class="blog-item">					
					<div class="blog-body">
						<?php if( $blog['thumb']  )  { ?>
							<div class="image">
								<img src="<?php echo $blog['thumb'];?>" title="<?php echo $blog['title'];?>" class="img-responsive"/>
							</div>
						<?php } ?>
						<div class="description">
							<?php $blog['description'] = strip_tags($blog['description']); ?>
							<?php echo utf8_substr( $blog['description'],0, 40 );?>...
						</div>
						<div class="buttons-wrap">
							<a href="<?php echo $blog['link'];?>" class="readmore btn"><?php echo $this->language->get('text_readmore');?></a>
						</div>
					</div>
					<div class="blog-header">
						<h4 class="blog-title">
							<a href="<?php echo $blog['link'];?>" title="<?php echo $blog['title'];?>"><?php echo $blog['title'];?></a>
						</h4>
					</div>	
				</div>
			</div>
			<?php if( ( $key%$cols==0 || $key == count($blogs)) ){  ?>
				
			<?php } ?>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
 </div>
