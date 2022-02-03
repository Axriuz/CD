<?php
/* For AJAX, if frustrated, try the following (see http://www.php.net/manual/en/function.flush.php#91556):
@apache_setenv('no-gzip', 1);
@ini_set('zlib.output_compression', 0);
*/
ob_start();
set_time_limit(0); // for scripts that run really long
function force_flush ($add_whitespace = TRUE) {
# force the output to flush
	if ($add_whitespace) {
		// ensure the minimum buffer size is reached
		echo str_repeat(" ", 4096);
	}
	ob_flush();
	flush();
}
?>
<!doctype html>
<title>Long PHP process example</title>
<style>
body {
	font-family: 'Lucida Grand', Tahoma, Verdana, Arial, sans-serif;
	font-size: 14px;
}
#progress_bar {
	width: 200px;
	border: #ccc 1px solid;
	border-radius: 4px;
	height: 25px;
	margin: 0 auto;
	background: #efefef;
	text-align: left;
	display: inline-block;
	position: relative;
	text-align: center;
	line-height: 25px;
	vertical-align: middle;
	z-index: 1;
}
#progress_bar_inner {
	display: block;
	height: 25px;
	background-color: #89be5e;
	width: 0;
	position: absolute;
	top: 0;
	left: 0;
	-webkit-transition: all 500ms cubic-bezier(.4,.1,.4,1) 0ms;
	-moz-transition: all 500ms cubic-bezier(.4,.1,.4,1) 0ms;
	-o-transition: all 500ms cubic-bezier(.4,.1,.4,1) 0ms;
	transition: all 500ms cubic-bezier(.4,.1,.4,1) 0ms;
	z-index: 1;
}
#percent {
	z-index: 8;
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
}
</style>

<div id="feedback">Beginning Processing&hellip;</div>
<div id="progress_bar"><span id="percent">0%</span><span id="progress_bar_inner"></span></div>

<script type="text/javascript">
var feedback = document.getElementById('feedback'),
    percent_text = document.getElementById('percent'),
    progress_bar_inner = document.getElementById('progress_bar_inner');
function updateFeedback (message, percent) {
	feedback.innerHTML = message;
	percent_text.innerHTML = percent + '%';
	progress_bar_inner.style.width = percent + '%';
}
</script>
<?php
force_flush();
sleep(1);
function updateFeedback ($message, $percent) {
	echo "<script type=text/javascript>updateFeedback('$message', $percent);</script>";
}
$arr = array(0.5, 0.75, 0.25);
$items = 1;
while (--$items) {
	$s = $items === 1 ? '' : 's';
	$percent = ((10-$items)/10) * 100;
	updateFeedback("$items item$s remaining&hellip;", $percent);
	force_flush();
	sleep(array_rand($arr)); // simulate something that takes 2 seconds to complete

}
updateFeedback('Done!', 100);
ob_end_flush();
?>
