<?php
@mkdir('output');
foreach(glob('mono/*.lab') as $mono){
	$monoLines = explode("\n", file_get_contents($mono));
	$fullLines = explode("\n", file_get_contents('full/' . basename($mono)));
	$len = count($monoLines);
	$output = '';
	for($i = 0; $i < $len; $i ++){
		if(!empty($monoLines[$i])){
			$monoLine = explode(' ', $monoLines[$i]);
			$fullLine = explode(' ', $fullLines[$i]);
			$output .= $monoLine[0] . ' ' . $monoLine[1] . ' ' . $fullLine[2] . "\n";
		}
	}
	file_put_contents('output/' . basename($mono), $output);
}