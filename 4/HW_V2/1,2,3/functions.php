<?php
/**
 * Получение имен файлов и каталогов в заданной дирректории.
 *
 * @param [string] $dir - дирректория
 * @return array
 */
function getNamesOfDir($dir) {
    return array_slice(scandir($dir), 2);
}

$array_images_name = getNamesOfDir("./images/");