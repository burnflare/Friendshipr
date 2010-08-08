<?php
include_once 'appinclude.php';
include_once 'db.php';
include_once 'canvas.php';
include_once 'display.php';
include_once 'profile.php';
render_canvas_header(about); 
?>

<style>
  <?php include("style.css"); ?>
</style>
<h3>Welcome to Singapore Spirit.</h3>
<h3><br>
This is a picture ranking application. We have a pictures from
National Day 2009. We want you, and your friends,
Singaporeans and Non-Singaporeans to rank them according to which ones
you like best. You will be presented with random pairs of pictures.
Just click on the picture you like better between the two. After you
pick one, you will be presented with another two. Pick the one you
like. This goes on until you've reach a maximum.</h3>
<h3><br>
Send the application to your friends and get them to choose. After 1 month, 
we shall see which photo the facebook community likes the
best. Prizes will be won.</h3>
<h3><br>
Think of it like a match between two players. In each round, you, the
judge, picks the winner. Anyone on facebook can be a judge, but each
judge can only vote a maximum number of times. Each "win" by a picture
increases its score. Each "loss" decreases the score. But if picture A
wins picture B, and picture B wins picture C, then A wins C, with an
increase in the score, but not as much as A winning C directly. And if
picture C wins D, then A wins D also, but not as much as A winning C.</h3>
<h3><br>
What we do is we make a network with the arrows pointing from the
winner to loser. Then out of this network, we use advanced algorithms
to compute the score for each picture, and we rank the score. Quite
similar to how Google ranks webpages in their search algorithm.</h3>
<h3><br>
This application is the result of a research project between a team of
students of NUS High School of Mathematics,
http://www.highsch.nus.edu.sg. The students are Sanchit Bareja and Le
Minh Tu, their teacher Dr Chong Shang Shan. We would like to also
thank Sidwyn Koh, good friend of the developers, for designing the 
logo of the application.
<br><br>
This application is sponsored by the NEXUS, National Education Office
, http://www.nexus.gov.sg. , without which this application would not 
be made possible.</h3>

<h3>To support our research, send this application to your friends, and friends of your
friends. Spread the word. Let's see how far this application travels.</h3>

<?php
	render_canvas_footer();
	?>