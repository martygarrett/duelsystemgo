<?php


function die_roll($x) {
	return rand(1,$x);
}

function attack_roll() {
   return rand(1,20);
}

function fight($a, $b, $h, $dt) {
    
    $ret_val = array();
    $full_attack = ($a + $b);
    
    if($full_attack < $h) {
        $ret_val['hit'] = 'miss';
        $ret_val['dmg'] = 0;
    } elseif($full_attack < 19) {
        $ret_val['hit'] = 'hit';
        $ret_val['dmg'] = die_roll($dt);
    } else {
        $ret_val['hit'] = 'crit';
        $ret_val['dmg'] = die_roll($dt)*2; //TODO: doof - add a crit mod
    }
    
    return $ret_val;
}

function battle_sim($weapon, $bonus, $enemy) {

	$ret = array();
    $die_type = 0;
    $attack_rate = 0;
    $attack = 0;
    $tohit = 0;
    $fight = array();

	switch($weapon) {
		case ('Longsword'):
			$die_type = 8;
			$attack_rate = 2;
			break;
		case ('Shortsword'):
			$die_type = 6;
			$attack_rate = 3;
			break;
		case ('Dagger'):
			$die_type = 4;
			$attack_rate = 4;
			break;
		default: 
			echo '<br>';
			echo 'Please Select a Weapon.';
			break;
	}
	
	//TODO: DUSTY - Add function to vary creature prefix
	switch($enemy) {
		case ('Kobold'):
			$intro =  'A Feral Kobold (10 AC, 75 BP) Leaps out from behind a bush!';
			$tohit = 10;
			$totalbp = 75;
			break;
		case ('Orc'):
			$intro = 'A Big Smelly Orc (16 AC, 115 BP) Jumps out of a tree and blocks your path!';
			$tohit = 16;
			$totalbp = 115;
			break;
		case ('Bandit'):
			$intro = 'A Wild Bandit (14 AC, 100 BP) Stops you as you travel through the woods!';
			$tohit = 14;
			$totalbp = 100;
			break;
		case ('Goblin'):
			$intro = 'A Crazed Goblin (12 AC, 90 BP) Vaults over the rock he was hiding behind and charges!';
			$tohit = 12; 
			$totalbp = 90;
			break;
		default: 
			echo '<br>';
			echo 'Please Select an Enemy.';
			break;
	}
	
	for($i = 0; $i < $attack_rate; $i++) {
	    $attack = attack_roll();
	    $fight[$i] = fight($attack, $bonus, $tohit, $die_type);
	}
	
    $ret['fight'] = $fight;
	$ret['d'] = $die_type;
	$ret['intro'] = $intro;
	$ret['tbp'] = $totalbp;
	
	return $ret;

}
