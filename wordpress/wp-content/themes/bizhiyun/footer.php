	</div>
	<div id="footer">
		
		<p><a href="about/" title="关于壁纸云">关于壁纸云</a>  |   <a href="links/" title="友情链接">友情链接</a>&nbsp;&nbsp;
		
		<?php if(stripslashes(get_option('iphoto_copyright'))!=''){echo stripslashes(get_option('iphoto_copyright'));}else{echo 'Copyright &copy; '.date("Y").' '.'<a href="'.home_url( '/' ).'" title="'.esc_attr( get_bloginfo( 'name') ).'">'.esc_attr( get_bloginfo( 'name') ).'</a> All rights reserved';}?>Powered by <a href="http://www.2zzt.com/" title="Wordpress">WordPress</a>  <script language="javascript">
document.writeln("\x3c\x61\x20\x68\x72\x65\x66\x3d\"\x68\x74\x74\x70\x3a\x2f\x2f\x77\x77\x77\x2e\x6d\x6f\x62\x61\x6e\x62\x75\x73\x2e\x63\x6e\"\x20\x74\x61\x72\x67\x65\x74\x3d\"\"\x3e\x3c\x62\x20\x73\x74\x79\x6c\x65\x3d\"\x63\x6f\x6c\x6f\x72\x3a\x23\x30\x30\x36\x36\x33\x33\"\x3e\u6b22\u8fce\u8bbf\u95ee\u6a21\u677f\u5df4\u58eb\x3c\x2f\x62\x3e\x3c\x2f\x61\x3e");
</script>
</p>
		</div>
	</div><!--end footer-->
<?php wp_footer(); ?>

</body>
</html>