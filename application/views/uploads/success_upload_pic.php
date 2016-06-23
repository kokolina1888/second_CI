<html>
<head>
<title>Upload Form</title>
</head>
<body>

<h3>Your file was successfully uploaded!</h3>
<!-- case multiple info in upload data -->
<!-- <ul>
<?php //foreach ($upload_data as $item => $value):?>
<li><?php //echo $item;?>: <?php echo $value;?></li>
<?php //endforeach; ?>
</ul> 
 -->
<!-- case only upload path in upload data -->

<img src="<?php echo base_url().'/uploads/'.$upload_data; ?>" alt="">
 
<p><?php echo anchor('pictures', 'Upload Another File!'); ?></p>

</body>
</html>