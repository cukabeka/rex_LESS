<?php
/**
 * Addon_Template
 *
 * @author http://magnetum.de
 * @link   https://github.com/cukabeka
 *
 * @package redaxo4.3
 * @version 0.2.1
 */

// AUTOMATICALLY CHECK FILES
////////////////////////////////////////////////////////////////////////////////

if (class_exists('lessc')) {
	
	if (!isset($cacheFile)) $cacheFile = '';
	
	$addon = ($REX["ADDON"]['rex_less']);

	$base_path = explode("redaxo/include", $REX['INCLUDE_PATH']);
	$base_path = $base_path[0];
	$user_path = rtrim($addon['settings']['TEXTINPUT'][1], "/");
	$output_path = $base_path . $user_path. "/";

	$pattern = $base_path . $user_path . '/*.less';
	$less_files = glob($pattern);

	if (is_array($less_files) && count($less_files) > 0) {
		foreach ($less_files as $inputFile) {
			$outputFile = basename($inputFile, ".less") . ".css";

			$less = new lessc;

			if (file_exists($cacheFile)) {
				$cache = unserialize(file_get_contents($cacheFile));
			} else {
				$cache = $inputFile;
			}
	
			$less = new lessc;
			if($addon['settings']['SELECT'][1] != 'FALSE') $less->setFormatter($addon['settings']['SELECT'][1]);
			$newCache = $less -> cachedCompile($cache);
	
			if (!is_array($cache) || $newCache["updated"] > $cache["updated"]) {
				if ($cacheFile != '') file_put_contents($cacheFile, serialize($newCache));
				file_put_contents($outputFile, $newCache['compiled']);
			}

			$less -> setImportDir(array($output_path));
			// create a new cache object, and compile
			$cache = $less -> cachedCompile($inputFile);

			file_put_contents($output_path . $outputFile, $cache["compiled"]);

			// the next time we run, write only if it has updated
			$last_updated = $cache["updated"];
			$cache = $less -> cachedCompile($cache);
			if ($cache["updated"] > $last_updated) {
				file_put_contents($output_path . $outputFile, $cache["compiled"]);
			}
			
					$cacheFile = $inputFile . ".cache";



		}
	}

}
