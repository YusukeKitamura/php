<?php
	function outputComboBox($name, $min, $max) {
		echo '<select name="'.$name.'">';
		for ($i = $min; $i <= $max; $i++) {
			echo '<option value="'.$i.'">'.$i.'</option>';
		}
		echo '</select>';
	}
 ?>