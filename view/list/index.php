	<?php
		// maak een overzicht lijst van ALLE personen
		$employees = getAllList();
	?>
	<h1>Overzicht van ToDO-List</h1>
	<ul>
	<?php foreach($list as $row) { ?>
		<li>
			<span><?= $row['titel'] ?></span>
			<?php
			// de opbouw van de link bepaald welke method in welke controller aangeroepen wordt.
			// het woordje "employee" in de url betekent dat het framework moet zoeken naar een controller genaamd "EmployeeController".
			// Hij maakt van de eerste letter een hoofdletter en plakt er zelf "Controller" achter.
			// Het woordje "update" of "delete" betekent dat hij in deze controller moet zoeken naar een method met deze naam.
			?>
			<a href="<?=URL?>list/edit/<?=$row['id']?>">Wijzigen</a> <a href="<?=URL?>list/delete/<?= $row['id'] ?>">Verwijderen</a>
		</li>
	<?php } ?>
	</ul>