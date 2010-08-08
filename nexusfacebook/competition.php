<?php
include_once 'appinclude.php';
include_once 'db.php';
include_once 'canvas.php';
include_once 'display.php';
include_once 'profile.php';
render_canvas_header(competition); 
?>

<style>
  <?php include("style.css"); ?>
</style>
<h3>About the Competition</h3>
<br>
<h3>
Hi all! 
The motive of the competiton is very simple: Guess which is the better picture 
among the pair of pictures presented to you. You maybe thinking, how do we find 
the winner then. The pictures shown to you are professionally judged and the judges 
have ranked the pictures based on a very comprehensive criteria. If you are able to 
select the better of the 2 pictures and if your selection corresponds to the judge's
ranking, you win! 
<br />
<br />
But this way, there will be too many winners. To select the ultimate
winner, you will have to play the game more than once (twice, thrice and more). The 
more number of times your ranking matches the judge's ranking, the higher your chance 
to be the ultimate winner. The ultimate winner will receive a prize from us. We will
be contacting you through facebook itself and your name will also be posted here so do keep coming
back to check if you are the winner! 
<br />
Good luck playing! 
<br />
<br />
Take note: The more you play, the higher your chance for winning!
Competition period: 26th November 2009 to 31st December 2009
<br />
<br />
This application is sponsored by the NEXUS, National Education Office
, http://www.nexus.gov.sg. , without which this application would not 
be made possible.
<br />
<br />
To support our research, send this application to your friends, and friends of your
friends. Spread the word. Let's see how far this application travels.
</h3>
<?php
	render_canvas_footer();
	?>