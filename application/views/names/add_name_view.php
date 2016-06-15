<?php 

echo validation_errors();

echo form_open('names/insert_name');

echo "<p>Enter New Name</p>";
echo form_input('name');

echo "<p>Enter Meaning</p>";
echo form_input('meaning');

echo "<p>Enter gender</p>";
echo form_input('gender');

echo form_submit('submit', 'Save');

echo form_close();