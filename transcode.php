<?php
$rawPath = 'raw';
$wavPath = 'wav2';
$outputBat = 'transcode.bat';

$output = '';
foreach(glob($rawPath . '/*') as $raw){
	$name = str_replace('.raw', '.wav', basename($raw));
	$output .= sprintf('ffmpeg -hide_banner -f s16le -ar 48000 -ac 1 -acodec pcm_s16le -i "%s" "%s/%s"', $raw, $wavPath, $name) . "\r\n";
}
file_put_contents($outputBat, $output);
system(realpath($outputBat));