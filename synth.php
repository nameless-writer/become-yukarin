<?php
$htsEngine = realpath('bin/hts_engine.exe');
$htsVoice = 'jp.htsvoice';
$labelPath = 'labels/output';
$outputPath = 'wav1';

foreach(glob($labelPath . '/*.lab') as $label){
	$name = str_replace('.lab', '', basename($label));
	echo 'Synthesizing ' . $name . '...' . PHP_EOL;
	system(sprintf('"%s" -m "%s" -ow "%s/%s.wav" -vp "%s"', $htsEngine, $htsVoice, $outputPath, $name, $label));
}