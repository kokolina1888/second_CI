<?php 
$attributes = array (
	'id'	=>'tests_form');

echo form_open('Admin/add-new-user', $attributes);
//USERNAME
echo form_label('Въведете потербителско име');

$data_username = array(
	'name' => 'username',	
	'value' => set_value('username'),
	'placeholder' => 'потребителско име',		
	);
echo form_error('username');
echo form_input($data_username);

//PASSWORD
echo form_label('Въведете парола');

$data_password = array(
	'name' => 'password',
	'value' => set_value('password'),	
	'placeholder' => 'парола',	
	);
echo form_error('password');
echo form_password($data_password);

//PASSWORD-CONFIRM
echo form_label('Повторете паролата');

$data_password_confirm = array(
	'name' => 'password_confirm',
	'value' => set_value('password_confirm'),	
	'placeholder' => 'повторете паролата',			

	);
echo form_error('password_confirm');
echo form_password($data_password_confirm);

//LABNAME
echo form_label('Име на лабораторията');

$data_lab_name = array(
	'name' => 'lab_name',
	'value' => set_value('lab_name'),	
	'placeholder' => 'Име на лабораторията',			

	);
echo form_error('lab_name');
echo form_input($data_lab_name);

//LAB ADDRESS
echo form_label('Адрес на лабораторията');

$data_address = array(
	'name' => 'address',
	'value' => set_value('address'),	
	'placeholder' => 'Адрес на лабораторията',			

	);
echo form_error('address');
echo form_input($data_address);

//submit button
	$user_btn = array(
		'name' => 'submit',
		'value' => 'Въведи'
		);

	echo form_submit($user_btn);
	
echo form_close();
