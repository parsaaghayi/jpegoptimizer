# jpegoptimizer
you can use it to resize and optimize your jpeg files in best quality and file size together.
this package use <a href="https://imagemagick.org/" target="_blank" rel="noopener noreferrer">imagemagick</a> .
you can resize and optimize your images in any sizes you want, TOGETHER!<br>
Only in One Line :<br>
$statement->optimize($dir,$quality,$sizes);<br>
<br>example1:<br>
require_once './vendor/autoload.php';<br>
use ParsaaghayiJpegOptimizer\JpegOptimizer;<br>
$test = new JpegOptimizer;<br>
$test->optimize('../images/1','80',150,360);<br>
this code will create a folder and name it "resized", in it we have to folders: "150x" & "360x". all images in directoy "../images/1" will optimze to quality "80" and will resize to 150px (width) and 360px (width)
