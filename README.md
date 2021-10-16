# jpegoptimizer
you can use it to resize and optimize your jpeg files in best quality and file size together.
this package use <a href="https://imagemagick.org/" target="_blank" rel="noopener noreferrer">imagemagick</a>; so you must install it first.
you can resize and optimize your images in any sizes you want, TOGETHER!<br>
Only in One Line :<br>
<code>
$statement->optimize($dir,$quality,$sizes);<br>
</code>
<br>example1:<br>
<pre>
require_once './vendor/autoload.php';
use ParsaaghayiJpegOptimizer\JpegOptimizer;
$test = new JpegOptimizer;
$test->optimize('../images/1','80',150,360);
</pre>
this code will create a folder in "../images/1" and name it "resized", then creates two folders in it: "150x" & "360x". all images in directoy "../images/1" will optimze to quality "80" and will resize to 150px (width) and 360px (width).

