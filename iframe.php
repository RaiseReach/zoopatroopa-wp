<?
sleep(1);
$token = 'be4ab042f198607eb6c0a0ca4a733f94';
?>
<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
  <script>
  tinymce.init({
    selector: '#mytextarea',
	width: 500,
	resize: false,
  });
  setInterval(function() {
	// Send the message "Hello" to the parent window
	// ...if the domain is still "davidwalsh.name"
	parent.postMessage(window.frames[0].document.body.innerHTML,'*');
	},100);
  </script>
  <style>
  #mytextarea_ifr {
	height: 320px !important;
  }
  </style>
</head>
<body style="margin:0;" onkeydown="">
	<?php
	$info = json_decode(file_get_contents('http://api.diffbot.com/v3/analyze?token='.$token.'&url='.urlencode($_GET['url'])));
	?>
    <textarea id="mytextarea"><? echo $info->objects[0]->html; ?></textarea>
</body>
</html>