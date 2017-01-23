<label for="upload_file">
    <input id="<?php echo $id?>" class="upload_file" type="text" size="36" name="<?php echo $id?>" value="<?php echo $value?>" /> 
    <input id="upload_btn" class="button upload_file_button" type="button" value="Upload File" />
    <br />Enter URL or upload a file.
</label>
<?php wp_enqueue_media();?>
<script>jQuery(document).ready(function($){ 
	jQuery('.upload_file_button').click(function(){
		var textfieldid = jQuery(this).prev().attr("id");
		wp.media.editor.send.attachment = function(props, attachment){jQuery('#' + textfieldid).val(attachment.url);}
		wp.media.editor.open(this);
		return false;
  });
});
</script>