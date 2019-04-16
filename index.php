<!DOCTYPE html>
<html>
<head>
	<title>I Fink I want to play Bingo</title>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	<style>
		.space {
			border: 1px black solid;
			width: 18%;
			height: 100px;
			display: inline-block;
			text-align: center;
			margin: 0;
			padding: 0;
		}
		.space p {
			display: flex;
			justify-content: center;
			align-items: center;
		}
		.space.completed, .space.free {
			background-color: #00ffe7;
		}
		button {
			width: 200px;
			height: 100px;
			font-size: 22px;
		}
	</style>
</head>
<body>
<?php

	$s = array(
		0 => 'Bride happy cries',
		1 => 'Groom happy cries',
		2 => 'Groomsman takes off shirt',
		3 => '"Love is patient, love is kind"',
		4 => 'Overly drunk member of wedding party',
		5 => 'Shattered glass',
		6 => 'Jump Around',
		7 => 'Chicken Dance',
		8 => 'Cupid Shuffle',
		9 => 'Electric Slide',
		10 => 'Cha Cha',
		11 => 'Best man mentions prior relationship',
		12 => 'Fan Programs',
		13 => 'A unity thing',
		14 => 'Champagne toast',
		15 => 'Speech longer than 5 minutes',
		16 => 'Bride keeps her last name',
		17 => 'Cake in face',
		18 => 'Signature drink',
		19 => 'Strapless dress',
		20 => 'Groom wears bow tie',
		21 => 'Bouquet toss',
		22 => 'Garder toss',
		23 => 'Hashtag',
	);

	shuffle($s);
	$s[25] = $s[12];
	$s[12] = 'Free space';

	$order = serialize($s);

	if (!isset($_GET['card'])) {
		header("Location: https://swierczek.github.io/index.php?card=".$order);
		exit();
	} else {
		$s = unserialize($_GET['card']);
	}

	$count = 0;
	foreach($s as $q) {
		echo '<div class="space"><p>'.$q.'</p></div>';

		$count++;
	}

	?>

	<br>
	<br>
	<br>
	<form action="/index.php">
		<button>Get new card</button>
	</form>

	<script>
		$(document).ready(function() {
			$('.space').on('click', function() {
				$(this).toggleClass('completed');
			});

			$('.space:nth-of-type(13)').addClass('free');
		});
	</script>
</body>
</html>