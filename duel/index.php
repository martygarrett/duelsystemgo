<?php

require_once (dirname(__FILE__) .  '/boot.php');

$title = "Doofs Duel System";
$heading = "Choose your Duel!";

start_html($title, $heading);

?>
	<form action="battle.php" method="POST">
	<select name="Weapon">
	<option value="Longsword">Longsword</option>
	<option value="Shortsword">Shortsword</option>
	<option value="Dagger">Dagger</option>
    </select>
    <br />
    <?php
	echo 'Attack Bonus';
	echo '<br>';
	?>
    <input type="radio" name="atkbonus" value="-2">-2
    <input type="radio" name="atkbonus" value="-1">-1
    <input type="radio" name="atkbonus" value="0" checked>0
    <input type="radio" name="atkbonus" value="+1">+1
    <input type="radio" name="atkbonus" value="+2">+2
    <?php
	echo '<br>';
	echo 'Enemy Type';
	echo '<br>';
	?>
    <input type="radio" name="enemytype" value="Kobold">Kobold
	<input type="radio" name="enemytype" value="Goblin" checked>Goblin
    <input type="radio" name="enemytype" value="Orc">Orc
    <input type="radio" name="enemytype" value="Bandit">Bandit<br>
	<input type="submit" value="Submit">
	</form>
	


<?php
page_shut();
