<?php
/**
 * Наличие вложенного массива
 *
 * @param [type] $array
 * @return boolean
 */
function array_in_array($array) {
	foreach($array as $key => $value) {
        if (is_array($value)) {
			return true;
		}
	}
}