<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php 

echo '<h2>'.$error.'</h2>';	

echo form_open_multipart('pictures/do-upload');?>
<p>
<input type="file" name="userfile" size="20" />
</p>

<input type="submit" value="upload" />

</form>

</body>
</html>