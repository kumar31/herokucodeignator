<?php
?>
<html>
 
        <input type='file' id="upload" />
        <input type='text' id="img_url" />
		
</html>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
	  </script>

<script>
$('#upload').on('change', function() { 
    var file_data = $('#upload').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
  //  alert(form_data);                             
    $.ajax({
                url: 'upload.php', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(php_script_response){
                    alert(php_script_response); // display response from the PHP script, if any
					
					$('#img_url').val(php_script_response);
					
                }
     });
});
</script>

