<?php 
	$d = array(
		'widget_support_data' => '
			<ul class="links hidden-xs hidden-sm hidden-md">
				<li><i class="fa fa-headphones">&nbsp;</i> support 24/7: <b> 012 - 345 - 678</b></li>
				<li><i class="fa fa-skype">&nbsp;</i> skype: <b>megashop_support</b></li>
			</ul>			
		',		
		
		'demo_widget_contact_data'=>'
			<ul class="contact-us">
				<li><i class="fa fa-compass">&nbsp;</i>123 Street name, California USA</li>
				<li><i class="fa fa-mobile-phone">&nbsp;</i>+ (00) 123 456 789</li>
				<li><i class="fa fa-print">&nbsp;</i>+ (00) 123 456 789</li>
				<li><i class="fa fa-envelope">&nbsp;</i> <a href="mailto:contact@lexusmegashop.com">contact@lexusmegashop.com</a></li>
			</ul>
			<ul class="links social">
				<li><a class="fa fa-facebook" href="http://www.facebook.com/" title="Facebook">&nbsp;</a>Facebook</li>
				<li><a class="fa fa-google-plus" href="https://plus.google.com/" title="Google">&nbsp;</a>Google</li>
				<li><a class="fa fa-twitter" href="https://twitter.com/" title="Twitter">&nbsp;</a>Twitter</li>
				<li><a class="fa fa-dribbble" href="http://dribbble.com/" title="dribbble">&nbsp;</a>dribbble</li>
				<li><a class="fa fa-youtube" href="http://www.youtube.com/" title="Youtube">&nbsp;</a>Youtube</li>
			</ul>
		',
		
		'demo_widget_about_data'=>'		
			<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum</p>
			<p>
				<a class="link-more" href="index.php?route=information/information&amp;information_id=4" title="view more">
					<i class="fa fa-expand-alt">&nbsp;</i>
					<span>view more</span> 
				</a>
			</p>
			<div class="has-highlight">
				<label class="control-label" for="email">Newsletter</label>
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-envelope">&nbsp;</i> 
					</span> 
					<input class="form-control" placeholder="email" type="text" /> 
					<span class="input-group-addon">
						<button class="btn btn-default" type="button">
							<i class="fa fa-chevron-sign-right">&nbsp;</i>
						</button> 
					</span>
				</div>
			</div>
		',				
		
		'username_twitter_module' => 'pavothemes'
	);
	$module = array_merge( $d, $module );

//	echo '<pre>'.print_r( $languages, 1 );die;
?>

<div class="inner-modules-wrap">	 
	<div class="vtabs mytabs" id="my-tab-innermodules">
		<a onclick="return false;" href="#tab-imodule-topbar" class="selected"><?php echo $this->language->get('Top Bar');?></a>
		<a onclick="return false;" href="#tab-imodule-footer" class="selected"><?php echo $this->language->get('Footer');?></a>
	</div>

	<div class="page-tabs-wrap">
			<div id="tab-imodule-topbar">					
				<?php /* <h4><?php echo $this->language->get( 'Delivery' ) ; ?></h4> */ ?>
				<div id="language-support_data" class="htabs mytabstyle">
					<?php foreach ($languages as $language) { ?>
					<a href="#tab-language-support_data-<?php echo $language['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>
					<?php } ?>
				  </div>

				<?php foreach ($languages as $language) {   ?>
				  <div id="tab-language-support_data-<?php echo $language['language_id']; ?>">
				   
					<table class="form">
						<?php $text =  isset($module['support_data'][$language['language_id']]) ? $module['support_data'][$language['language_id']] : $module['widget_support_data'];  ?>

					  <tr>
						<td><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $this->language->get('Support Module');?>: </td>
						<td><textarea name="themecontrol[support_data][<?php echo $language['language_id']; ?>]" id="support_data-<?php echo $language['language_id']; ?>" rows="5" cols="60" class="form-control"><?php echo $text; ?></textarea></td>
					  </tr>
					</table>
				  </div>
				  <?php } ?>				
			</div>
	
	 		<div id="tab-imodule-footer">								
				<h4><?php echo $this->language->get( 'Footer Center' ) ; ?></h4>
				<div id="language-widget_contact_data" class="htabs mytabstyle">
		            <?php foreach ($languages as $language) { ?>
		            <a href="#tab-language-widget_contact_data-<?php echo $language['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>
		            <?php } ?>
		          </div>

				<?php foreach ($languages as $language) {   ?>
		          <div id="tab-language-widget_contact_data-<?php echo $language['language_id']; ?>">		           
		            <table class="form">
		            	<?php $text =  isset($module['widget_contact_data'][$language['language_id']]) ? $module['widget_contact_data'][$language['language_id']] : $module['demo_widget_contact_data'];  ?>
		              <tr>
		                <td><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $this->language->get('Contact Us Module');?>: </td>
		                <td><textarea name="themecontrol[widget_contact_data][<?php echo $language['language_id']; ?>]" id="widget_contact_data-<?php echo $language['language_id']; ?>" rows="5" cols="60" class="form-control"><?php echo $text; ?></textarea></td>
		              </tr>
		            </table>
		          </div>
		          <?php } ?>	

				  <div id="language-widget_about_data" class="htabs mytabstyle">
		            <?php foreach ($languages as $language) { ?>
		            <a href="#tab-language-widget_about_data-<?php echo $language['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>
		            <?php } ?>
		          </div>

				<?php foreach ($languages as $language) {   ?>
		          <div id="tab-language-widget_about_data-<?php echo $language['language_id']; ?>">		           
		            <table class="form">
		            	<?php $text =  isset($module['widget_about_data'][$language['language_id']]) ? $module['widget_about_data'][$language['language_id']] : $module['demo_widget_about_data'];  ?>
		              <tr>
		                <td><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $this->language->get('About Us Module');?>: </td>
		                <td><textarea name="themecontrol[widget_about_data][<?php echo $language['language_id']; ?>]" id="widget_about_data-<?php echo $language['language_id']; ?>" rows="5" cols="60" class="form-control"><?php echo $text; ?></textarea></td>
		              </tr>
		            </table>
		          </div>
		          <?php } ?>	
				  
			</div>
			
			<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
			<script type="text/javascript"><!--
			$("#language-support_data a").tabs();
			<?php foreach( $languages as $language )  { ?>
			CKEDITOR.replace('support_data-<?php echo $language['language_id']; ?>', {
				filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
				filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
				filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
				filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
				filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
				filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
			});
			<?php } ?>
			
			$("#language-widget_about_data a").tabs();
			<?php foreach( $languages as $language )  { ?>
			CKEDITOR.replace('widget_about_data-<?php echo $language['language_id']; ?>', {
				filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
				filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
				filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
				filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
				filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
				filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
			});
			<?php } ?>
			
			$("#language-widget_contact_data a").tabs();
				<?php foreach( $languages as $language )  { ?>
				CKEDITOR.replace('widget_contact_data-<?php echo $language['language_id']; ?>', {
					filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
					filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
					filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
					filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
					filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
					filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
				});
				<?php } ?>
							
			//--></script> 
		
	 </div>
	 <div class="clearfix clear"></div>	
</div>

