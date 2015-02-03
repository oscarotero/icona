<?php
$icons = [
	'ia-cross',
	'ia-menu',
	'ia-minus',
	'ia-plus',
	'ia-right',
	'ia-left',
	'ia-top',
	'ia-bottom',
	'ia-search',
	'ia-check',
	'ia-tright',
	'ia-tleft',
	'ia-ttop',
	'ia-tbottom',
];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>icona - By Oscar Otero</title>

		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>

	<body>
	<h1>icona16 - 32px</h1>
	<ul>
		<?php foreach ($icons as $i => $icon): ?>
		<li data-index="<?= $i ?>">
		<svg viewBox="0 0 16 16" class="ia-16 <?= $icon ?>">
			<line x1="0" x2="14" y1="0" y2="0"/>
			<line x1="0" x2="14" y1="0" y2="0"/>
			<line x1="0" x2="14" y1="0" y2="0"/>
			<circle cx="6.5" cy="6.5" r="4.5"/>
		</svg>
		.<?= $icon ?>
		</li>
		<?php endforeach ?>
	</ul>

	<h1>icona12 - 24px</h1>
	<ul>
		<?php foreach ($icons as $i => $icon): ?>
		<li data-index="<?= $i ?>">
		<svg viewBox="0 0 12 12" class="ia-12 <?= $icon ?>">
			<line x1="0" x2="10" y1="0" y2="0"/>
			<line x1="0" x2="10" y1="0" y2="0"/>
			<line x1="0" x2="10" y1="0" y2="0"/>
			<circle cx="5" cy="5" r="4"/>
		</svg>
		.<?= $icon ?>
		</li>
		<?php endforeach ?>
	</ul>

	<p>
		Created by Oscar Otero - <a href="https://github.com/oscarotero/icona">Get the code</a>
	</p>

	<script type="text/javascript">
		var classes = <?= json_encode($icons) ?>;

		var lis = document.querySelectorAll('li');

		Array.prototype.forEach.call(lis, function (li) {
			li.addEventListener('click', function () {
				var index = li.dataset.index;
				var className = classes[index];
				var svg = li.querySelector('svg');

				svg.classList.remove(className);

				++index;

				if (classes[index] === undefined) {
					index = 0;
				}

				svg.classList.add(classes[index]);
				li.dataset.index = index;
			});
		});
	</script>

	<script type="text/javascript">var _gaq=_gaq||[];_gaq.push(['_setAccount','UA-110819-12']);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src=('https:'==document.location.protocol?'https://ssl':'http://www')+'.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga,s);})();</script>
	<script type="text/javascript" src="//127.0.0.1:8081"></script>
	</body>
</html>
