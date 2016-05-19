<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/config.tpl" );
    $themeConfig = $this->config->get( 'themecontrol' );
?>
<?php echo $header; ?>
<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/breadcrumb.tpl" );  ?>

<div class="container">
<div class="row">

	<?php if( $SPAN[0] ): ?>
	<aside class="col-lg-<?php echo $SPAN[0];?> col-md-<?php echo $SPAN[0];?> col-sm-12 col-xs-12">
		<?php echo $column_left; ?>
	</aside>
	<?php endif; ?> 

	<section class="col-lg-<?php echo $SPAN[1];?> col-md-<?php echo $SPAN[1];?> col-sm-12 col-xs-12">  
		<div id="content">
			<?php echo $content_top; ?>
			<h1><?php echo $heading_title; ?></h1>
			<div class="wrapper no-margin">
				<?php  if(  isset($themeConfig['contact_customhtml']) && isset($themeConfig['contact_customhtml'][$this->config->get('config_language_id')]) && trim($themeConfig['contact_customhtml'][$this->config->get('config_language_id')]) ){ ?>
					<div class="contact-customhtml">
						<p><?php echo ($themeConfig['contact_customhtml'][$this->config->get('config_language_id')]); ?></p>
					</div>
				<?php } ?> 			

				<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" role="form">
					<h3><?php echo $text_location; ?></h3>
					<div class="contact-info">
						<div class="content row">
							<div class="col-lg-6 col-sm-6 col-xs-6">
								<p><strong><?php echo $text_address; ?></strong></p>
								<p><?php echo $store; ?></p>
								<p><?php echo $address; ?></p>
							</div>
							
							<div class="col-lg-6 col-sm-6 col-xs-6">
								<?php if ($telephone) { ?>
									<p><strong><?php echo $text_telephone; ?></strong></p>
									<p><?php echo $telephone; ?></p>
								<?php } ?>
								
								<?php if ($fax) { ?>
									<p><strong><?php echo $text_fax; ?></strong></p>
									<p><?php echo $fax; ?></p>
								<?php } ?>
							</div>
						</div>
					</div>
		
					<h3><?php echo $text_contact; ?></h3>
					<div class="content">
						<div class="form-group">
							<label><?php echo $entry_name; ?></label>
							<p><input type="text" name="name" value="<?php echo $name; ?>" /></p>
						</div>							
						<?php if ($error_name) { ?>
						<p><span class="error"><?php echo $error_name; ?></span></p>
						<?php } ?>
				
						<div class="form-group">
							<label><?php echo $entry_email; ?></label>
							<p><input type="text" name="email" value="<?php echo $email; ?>" /></p>
						</div>
						<?php if ($error_email) { ?>
						<p><span class="error"><?php echo $error_email; ?></span></p>
						<?php } ?>
				
						<div class="form-group">
							<label><?php echo $entry_enquiry; ?></label>
							<p>
								<textarea name="enquiry" cols="50" rows="10"><?php echo $enquiry; ?></textarea>
							</p>
						</div>
						<?php if ($error_enquiry) { ?>
						<p><span class="error"><?php echo $error_enquiry; ?></span></p>
						<?php } ?>
				
						<div class="form-group">
							<label><?php echo $entry_captcha; ?></label>
							<p><input type="text" name="captcha" value="<?php echo $captcha; ?>" /></p>
							<img src="index.php?route=information/contact/captcha" alt="" class="img-responsive img-captcha" />
						</div>
						<?php if ($error_captcha) { ?>
						<p><span class="error"><?php echo $error_captcha; ?></span></p>
						<?php } ?>
					</div>
					
					<div class="buttons">
						<div class="right"><input type="submit" value="<?php echo $button_continue; ?>" class="button" /></div>
					</div>				
				</form>
			</div>
			<?php echo $content_bottom; ?>
		</div>
	</section> 

	<?php if( $SPAN[2] ): ?>
	<aside class="col-lg-<?php echo $SPAN[2];?> col-md-<?php echo $SPAN[2];?> col-sm-12 col-xs-12">	
		<?php echo $column_right; ?>
	</aside>
	<?php endif; ?>

</div></div>

<?php echo $footer; ?>