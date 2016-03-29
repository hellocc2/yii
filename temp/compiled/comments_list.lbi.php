<div class="Comment">
<div class="CommentTab">
  <ul>
	<li class="active" onClick="javascript:gotoPage(1,<?php echo $this->_var['id']; ?>,0,0);">全部评论(<?php echo $this->_var['pager']['plall']; ?>)</li>
	<li onClick="javascript:gotoPage(1,<?php echo $this->_var['id']; ?>,0,3);">好评(<?php echo $this->_var['pager']['pl1']; ?>)</li>
	<li onClick="javascript:gotoPage(1,<?php echo $this->_var['id']; ?>,0,2);">中评(<?php echo $this->_var['pager']['pl2']; ?>)</li>
	<li onClick="javascript:gotoPage(1,<?php echo $this->_var['id']; ?>,0,1);">差评(<?php echo $this->_var['pager']['pl3']; ?>)</li>
  </ul>
</div>
<div class="CommentText" id="goodsdetail_comments_list" style="display:block">
  <ul class="clearfix">
	<?php $_from = $this->_var['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'comment');if (count($_from)):
    foreach ($_from AS $this->_var['comment']):
?>
	<li>
	  <div class="username"><?php if ($this->_var['comment']['username']): ?><?php echo htmlspecialchars($this->_var['comment']['username']); ?><?php else: ?><?php echo $this->_var['lang']['anonymous']; ?><?php endif; ?></div>
	  <div class="commentC"><strong><?php echo $this->_var['comment']['clsname']; ?>:</strong>&nbsp;&nbsp;&nbsp;<?php echo $this->_var['comment']['content']; ?></div>
	  <div class="commentdate"><?php echo $this->_var['comment']['add_time']; ?></div>
	</li>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </ul>
  <div class="page">
	<div class="page1"> <span class="f_l f6" style="margin-right:10px;">共 <b><?php echo $this->_var['pager']['record_count']; ?></b> 条评论</span>
	  <p id="commentPager_4"> 
	  <?php if ($this->_var['pager']['page_first']): ?><a href="<?php echo $this->_var['pager']['page_first']; ?>">首页</a><?php endif; ?>
          <?php if ($this->_var['pager']['page_prev']): ?><a class="prev" href="<?php echo $this->_var['pager']['page_prev']; ?>"><?php echo $this->_var['lang']['page_prev']; ?></a><?php endif; ?>
          <?php $_from = $this->_var['pager']['page_number']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item_0_06863500_1383463480');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item_0_06863500_1383463480']):
?>
                <?php if ($this->_var['pager']['page'] == $this->_var['key']): ?>
                <a class="pgEmpty"><?php echo $this->_var['key']; ?></a>
                <?php else: ?>
                <a href="<?php echo $this->_var['item_0_06863500_1383463480']; ?>"><?php echo $this->_var['key']; ?></a>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          <?php if ($this->_var['pager']['page_next']): ?><a class="next" href="<?php echo $this->_var['pager']['page_next']; ?>"><?php echo $this->_var['lang']['page_next']; ?></a><?php endif; ?>
          <?php if ($this->_var['pager']['page_last']): ?><a class="last" href="<?php echo $this->_var['pager']['page_last']; ?>">尾页</a><?php endif; ?>
	   </p>
	</div>
  </div>
</div>
</div>

<script type="text/javascript">
//<![CDATA[
<?php $_from = $this->_var['lang']['cmt_lang']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item_0_06923900_1383463480');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item_0_06923900_1383463480']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item_0_06923900_1383463480']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

/**
 * 提交评论信息
*/
function submitComment(frm)
{
  var cmt = new Object;

  //cmt.username        = frm.elements['username'].value;
  cmt.email           = frm.elements['email'].value;
  cmt.content         = frm.elements['content'].value;
  cmt.type            = frm.elements['cmt_type'].value;
  cmt.id              = frm.elements['id'].value;
  cmt.enabled_captcha = frm.elements['enabled_captcha'] ? frm.elements['enabled_captcha'].value : '0';
  cmt.captcha         = frm.elements['captcha'] ? frm.elements['captcha'].value : '';
  cmt.rank            = frm.elements['rank'].value;

/*  for (i = 0; i < frm.elements['comment_rank'].length; i++)
  {
    if (frm.elements['comment_rank'][i].checked)
    {
       cmt.rank = frm.elements['comment_rank'][i].value;
     }
  }*/

//  if (cmt.username.length == 0)
//  {
//     alert(cmt_empty_username);
//     return false;
//  }

  if (cmt.email.length > 0)
  {
     if (!(Utils.isEmail(cmt.email)))
     {
        alert(cmt_error_email);
        return false;
      }
   }
   else
   {
        alert(cmt_empty_email);
        return false;
   }

   if (cmt.content.length == 0)
   {
      alert(cmt_empty_content);
      return false;
   }

   if (cmt.enabled_captcha > 0 && cmt.captcha.length == 0 )
   {
      alert(captcha_not_null);
      return false;
   }

   Ajax.call('comment.php', 'cmt=' + cmt.toJSONString(), commentResponse, 'POST', 'JSON');
   frm.elements['content'].value = '';
   return false;
}

/**
 * 处理提交评论的反馈信息
*/
  function commentResponse(result)
  {
    if (result.message)
    {
      alert(result.message);
    }

    if (result.error == 0)
    {
      var layer = document.getElementById('ECS_COMMENT');

      if (layer)
      {
        layer.innerHTML = result.content;
      }
    }
  }

//]]>
</script>