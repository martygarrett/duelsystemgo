<?php
$intro = 'Duel System Go!';
$D20 = rand(1,20);
$D8 = rand(1,8);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Doof's Duel System</title>
</head><a href="duel/untitled">untitled</a>

<body>
<?php
echo '<h1>'.$intro.'</h1>';
if (!(isset($_POST['Weapon']))) {	
	?>
	
	<form action="<?php echo $PHP_SELF ?>"method="POST">
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
} else {
	
	//this would be easier and more scaleable as a switch case /* Zeus */
	switch ($_POST['Weapon']) {
		case ('Longsword'):
			$x = 8;
			break;
		case ('Shortsword'):
			$x = 6;
			break;
		case ('Dagger'):
		$x = 4;
		}
	echo '<br>';
	$totaldamage = 0;
	switch ($_POST['enemytype']) {
		case ('Goblin'):
			echo 'A Wild Goblin (12 AC, 90 BP) Vaults over the rock he was hiding behind and charges!';
			$tohit = 12;
			$totalbp = 90;
			break;
		case ('Kobold'):
			echo 'A Wild Kobold (10 AC, 75 BP) Leaps out from behind a bush!';
			$tohit = 10;
			$totalbp = 75;
			break;
		case ('Orc'):
			echo 'A Wild Orc (16 AC, 115 BP) Jumps out of a tree and blocks your path!';
			$tohit = 16;
			$totalbp = 115;
			break;
		case ('Bandit'):
			echo 'A Bandit (14 AC, 100 BP) Stops you as you travel through the woods!';
			$tohit = 14;
			$totalbp = 100;
			break;
		}
		
	echo '<br>';
	echo 'You dash forward and attack with your '.$_POST['Weapon']."-1d".$x;
	echo '<br>';
	$attackroll = rand(1,20); //beginning of attack 1
	echo $attackroll.$_POST['atkbonus'];   
	//This would be better served as a simple if, else 
	//As written you are missing the possibility of atackroll = tohit /* zeus */
			//$attackroll>($tohit-1) encompasses attackroll = tohit, because attackroll = tohit still counts as a hit, so I lumped it in 		with the group. Yes, I knew it'd be better as an if/else I just wanted to test my switch case coding. Thanks. -Doof-
			//DAMMIT! Now I remember why I wanted it to be a switch case. I wanted to have another case for critical...although...-Doof-
	if (($attackroll+$_POST['atkbonus'])<$tohit){	             
			echo 'The '.$_POST['enemytype'].' evades your attack with ease!';
			echo '<br>';
			$damage = 0;
			} else {
			if ($attackroll<19) {
				echo ' You strike the '.$_POST['enemytype'].'!';
				echo '<br>';
				$damage = rand(1,$x);
				echo ' Attack 1 = '.$damage;
				echo '<br>';
			} else {
				echo ' You land a heavy blow!';
				echo '<br>';
				$damage = (rand(1,$x)*2);
				echo ' Attack 1 = '.$damage;
				echo '<br>';
				}
			}	
	$totaldamage = $damage; //end of attack 1
	echo 'Total Damage = '.$totaldamage; 
	echo '<br>';
	echo '-------------';
	echo '<br>';
	$attackroll = rand(1,20); //beginning of attack 2
	echo $attackroll.$_POST['atkbonus'];
	if (($attackroll+$_POST['atkbonus'])<$tohit){	
			echo 'The '.$_POST['enemytype'].' evades your attack with ease!';
			echo '<br>';
			$damage = 0;
			} else {
			if ($attackroll<19) {
				echo ' You strike the '.$_POST['enemytype'].'!';
				echo '<br>';
				$damage = rand(1,$x);
				echo ' Attack 2 = '.$damage;
				echo '<br>';
			} else {
				echo ' You land a heavy blow!';
				echo '<br>';
				$damage = (rand(1,$x)*2);
				echo ' Attack 2 = '.$damage;
				echo '<br>';
				}
			}	
	$totaldamage = $totaldamage+$damage;
	echo 'Total Damage = '.$totaldamage; //end of attack 2
	echo '<br>';
	echo '-------------';
	echo '<br>';
	switch ($x) {
		case 6: //for shortswords only
			$attackroll = rand(1,20); //beginning of attack 3 (shortsword)
			echo $attackroll.$_POST['atkbonus'];
			if (($attackroll+$_POST['atkbonus'])<$tohit){	
					echo 'The '.$_POST['enemytype'].' evades your attack with ease!';
					$damage = 0;
					echo '<br>';
					} else {
					if ($attackroll<19) {
						echo ' You strike the '.$_POST['enemytype'].'!';
						echo '<br>';
						$damage = rand(1,$x);
						echo ' Attack 3 = '.$damage;
						echo '<br>';
					} else {
						echo ' You land a heavy blow!';
						echo '<br>';
						$damage = (rand(1,$x)*2);
						echo ' Attack 3 = '.$damage;
						echo '<br>';
						}
					}	
			$totaldamage = $totaldamage+$damage;
			echo 'Total Damage = '.$totaldamage; //end of attack 3 (shortsword)
			echo '<br>';
			echo '-------------';
			$attackroll = rand(1,20); //beginning of attack 3.5 (shortsword)
			echo '<br>';
			echo $attackroll.$_POST['atkbonus'];
			if (($attackroll+$_POST['atkbonus'])<$tohit){	
					echo 'The '.$_POST['enemytype'].' evades your attack with ease!';
					echo '<br>';
					$damage = 0;
					} else {
					if ($attackroll<19) {
						echo ' You strike the '.$_POST['enemytype'].'!';
						echo '<br>';
						$damage = (rand(1,$x)/2);
						echo ' Attack 3.5 = '.$damage;
						echo '<br>';
					} else {
						echo ' You land a heavy blow!';
						echo '<br>';
						$damage = rand(1,$x);
						echo ' Attack 3.5 = '.$damage;
						echo '<br>';
						}
					}	
			$totaldamage = $totaldamage+($damage/2);
			echo 'Total Damage = '.$totaldamage;
			echo '<br>';
			echo '-------------';
			echo '<br>';
			echo 'BP Reduced = '.$totaldamage*4;
			echo '<br>';
			echo 'BP Remaining = '.($totalbp-($totaldamage*4)).'/'.$totalbp;
			echo '<br>';
			echo 'Shortswords actually get 4 attacks one turn and 3 the next. Since I only have one attack written out so far, I consider the other attack a "half" attack and it only does half damage.';
			break;
		case 4: //for daggers only
			$attackroll = rand(1,20); //beginning of attack 3 (dagger)
			echo $attackroll.$_POST['atkbonus'];
			if (($attackroll+$_POST['atkbonus'])<$tohit){	
					echo 'The '.$_POST['enemytype'].' evades your attack with ease!';
					echo '<br>';
					$damage = 0;
					} else {
					if ($attackroll<19) {
						echo ' You strike the '.$_POST['enemytype'].'!';
						echo '<br>';
						$damage = rand(1,$x);
						echo ' Attack 3 = '.$damage;
						echo '<br>';
					} else {
						echo ' You land a heavy blow!';
						echo '<br>';
						$damage = (rand(1,$x)*2);
						echo ' Attack 3 = '.$damage;
						echo '<br>';
						}
					}	
			$totaldamage = $totaldamage+$damage;
			echo 'Total Damage = '.$totaldamage; //end of attack 3 (dagger)
			echo '<br>';
			echo '-------------';
			echo '<br>';
			$attackroll = rand(1,20); //beginning of attack 4 (dagger)
			echo $attackroll.$_POST['atkbonus'];
			if (($attackroll+$_POST['atkbonus'])<$tohit){	
					echo 'The '.$_POST['enemytype'].' evades your attack with ease!';
					echo '<br>';
					$damage = 0;
					} else {
					if ($attackroll<19) {
						echo ' You strike the '.$_POST['enemytype'].'!';
						echo '<br>';
						$damage = rand(1,$x);
						echo ' Attack 4 = '.$damage;
						echo '<br>';
					} else {
						echo ' You land a heavy blow!';
						echo '<br>';
						$damage = (rand(1,$x)*2);
						echo ' Attack 4 = '.$damage;
						echo '<br>';
						}
					}	
			$totaldamage = $totaldamage+$damage;
			echo 'Total Damage = '.$totaldamage; //end of attack 4 (dagger)
			echo '<br>';
			echo '-------------';
			echo '<br>';
			echo 'BP Reduced = '.$totaldamage*4;
			echo '<br>';
			echo 'BP Remaining = '.($totalbp-($totaldamage*4)).'/'.$totalbp;
			break;
		case 8:
			echo '<br>';
			echo 'BP Reduced = '.$totaldamage*4;
			echo '<br>';
			echo 'BP Remaining = '.($totalbp-($totaldamage*4)).'/'.$totalbp;
			}
	if ($totaldamage*4 > $totalbp) {
		echo '<br>';
		echo "You Break Your Opponents Guard!";
		}
	}
?>
</body>
</html>
