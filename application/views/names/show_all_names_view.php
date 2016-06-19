<?php 
echo "<table border=1>";
foreach ($all_names as $key => $value) {
	echo "<tr>";
	echo "<td>";
	echo $value['name'];
	echo "</td>";
	echo "</tr>";
}
echo "</table>";

echo '<p>Memory: ' . $this->benchmark->memory_usage(). '</p>';
