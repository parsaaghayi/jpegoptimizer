<?php

namespace ParsaaghayiJpegOptimizer;

class JpegOptimizer
{
    public function optimize($dir, $quality, ...$sizes)
    {
        if (!empty($dir)) { //validating $dir input
            echo 'the directory is: ' . $dir . '<br>';
            if (!empty($quality) && is_numeric($quality) && 0 < $quality && $quality < 100) { //validating $quality input
                echo 'the qulity is: ' . $quality . '<br>';
                if (!empty($sizes) && is_numeric($sizes[0]) && $sizes[0] >= 1) { //validating $sizes input
                    $time_start = microtime(true); // start timer to get executation time
                    $files = glob("$dir/{,*/,*/*/,*/*/*/,*/*/*/*/,*/*/*/*/*/,*/*/*/*/*/*/}*.{jpeg,jpg}", GLOB_BRACE); //search your files for 6 level of depth
                    foreach ($sizes as $size) {
                        if (!file_exists("$dir/resized")) { //creating folders, if they are not exist
                            mkdir("$dir/resized", 0777, true);
                            echo 'Folder "resized" created.<br>';
                            mkdir("$dir/resized/$size" . 'x', 0777, true);
                            echo 'folder "' . $size . 'x" created.<br>';
                        } else {
                            if (!file_exists("$dir/resized/$size" . 'x')) {
                                mkdir("$dir/resized/$size" . 'x', 0777, true);
                                echo 'folder "' . $size . 'x" created.<br>';
                            }
                        }
                        $i = 1;
                        foreach ($files as $file) {
                            if (!strpos($file, 'resized')) { //checking file optimiezed or not
                                ob_flush();
                                flush();
                                echo $i . "- $file<br><br>";
                                $command = "magick mogrify -path $dir/resized/$size" . "x/ -resize $size.x -quality $quality $file"; //Here is the heart of the package,you can change or midufy this command if you know about imagmagick. you can use how much quality that you want but the 80 quality tested and is the best one.
                                exec($command, $output, $result_code);
                                echo "$file resized to  $size" . "x.<br>";
                                $time_end = microtime(true);
                                $execution_time = ($time_end - $time_start); //execution time of the script. dividing with 60 will give the execution time in minutes otherwise seconds. 
                                echo '<b>Total Execution Time For Resizing ' . $i . ' Images :</b> ' . $execution_time . ' Seconds'; // if you get weird results, use number_format((float) $execution_time, 10)
                                $i++;
                            }
                        }
                        echo '<div style=\"float:left\"> Done!</div><br>';
                    }
                } else {
                    echo 'please determine the size of resizing process';
                }
            } else {
                echo 'please determine the quality between 0 to 100 (0 is worst and 100 is best - we suggest use 80).<br>';
            }
        } else {
            echo 'please determine the path to your image files directory.<br>';
        }
        ob_end_flush();
        exit;
    }
}
