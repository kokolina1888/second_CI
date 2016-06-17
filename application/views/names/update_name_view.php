<?php 
var_dump($name_info);

echo validation_errors();
echo form_open('names/update_name/'.$name_info->id);

//ID
$data_id = array(
        'name'          => 'id',
        'value'         => $name_info->id,        
);

echo form_hidden($data_id);

//NAME UPDATE

echo "<p>update Name</p>";
$data_name = array(
        'name'          => 'name',
        'value'         => $name_info->name,
        
);
echo form_input($data_name);

//MEANING UPDATE

echo "<p>update Meaning</p>";
$data_meaning = array(
        'name'          => 'meaning',
        'value'         => $name_info->meaning,
        
);
echo form_input($data_meaning);

//GENDER UPDATE

echo "<p>update gender</p>";
$data_gender = array(
        'name'          => 'gender',
        'value'         => $name_info->gender,
        
);
echo form_input($data_gender);

echo form_submit('submit', 'update');

echo form_close();