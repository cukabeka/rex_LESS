<?php
/**
 * Addon_Template
 *
 * @author http://rexdev.de
 * @link   https://github.com/cukabeka
 *
 * @package redaxo4.3
 * @version 0.2.1
 */

// INCLUDE AUTOCOMPILE FUNCTION
////////////////////////////////////////////////////////////////////////////////


if (!function_exists('autoCompileLess')) {
	function autoCompileLess($inputFile, $outputFile) {
		global $REX;
		
		$settings = $REX["ADDON"]["rex_LESS"]["settings"];
		krumo($settings);
		
		$cacheFile = $inputFile . ".cache";

		if (file_exists($cacheFile)) {
			$cache = unserialize(file_get_contents($cacheFile));
		} else {
			$cache = $inputFile;
		}

		$less = new lessc;
		$newCache = $less -> cachedCompile($cache);

		if (!is_array($cache) || $newCache["updated"] > $cache["updated"]) {
			file_put_contents($cacheFile, serialize($newCache));
			file_put_contents($outputFile, $newCache['compiled']);
		}
	}

}
