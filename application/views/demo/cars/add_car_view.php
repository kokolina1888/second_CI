<?php 
// echo "<pre>";
// var_dump($makes_info);
// echo "</pre>";
$makes_options = array();
foreach ($makes_info as $make) {
	$makes_options[$make['make_id']] = $make['make'];
}

// echo "<pre>";
// var_dump($makes_options);
// echo "</pre>";

echo form_open('cars/insert_car');

echo "<p>Select brand</p>";
echo form_dropdown('make_id', $makes_options);


echo "<p>Enter yearmade</p>";
echo form_input('yearmade');

echo "<p>Enter mileage</p>";
echo form_input('mileage');

echo "<p>Enter price</p>";
echo form_input('price');

echo "<p>Enter description</p>";
echo form_input('description');

echo form_submit('submit', 'Save');

echo form_close();