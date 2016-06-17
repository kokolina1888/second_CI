<?php 
echo "<pre>";
var_dump($makes);
echo "</pre>";

$options_makes = array();

foreach ($makes as $make) {
	$options_makes[$make['make_id']] = $make['make'];
}

echo form_dropdown('makes', $options_makes);
