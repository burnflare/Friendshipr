

<?php
include_once 'appinclude.php';
include_once 'db.php';
include_once 'canvas.php';
include_once 'display.php';

mysql_get_db_conn();
render_canvas_header(search); 
?>

<fb:swf swfsrc="http://picasaweb.google.com/s/c/bin/slideshow.swf" width="700" height="700" flashvars="host=picasaweb.google.com&captions=1&hl=en_US&feat=flashalbum&RGB=0x000000&feed=http%3A%2F%2Fpicasaweb.google.com%2Fdata%2Ffeed%2Fapi%2Fuser%2Fsanchitbareja%2Falbumid%2F5407754854213838129%3Falt%3Drss%26kind%3Dphoto%26hl%3Den_US">
</fb:swf>