<?php
require_once (dirname(__FILE__) .  '/boot.php');

$title = "Doofs Duel System BATTLE!";
$heading = "Battle!";
$totaldamage = 0;

$weapon = $_POST['Weapon'];
$bonus = $_POST['atkbonus'];
$enemy = $_POST['enemytype'];

start_html($title, $heading);

$battle = do_battle($weapon, $bonus, $enemy);
//echo 'Doing Battle!<br>';
//echo 'Battle: '.$battle;
$d = $battle['d'];
$intro = $battle['into'];
$tbp = $battle['tbp'];
$fight = $battle['fight'];

//print_r($battle);
    
echo '<h1>'.$intro.'</h1>';
echo '<h2>You dash forward and attack with your '.$weapon.'-1d'.$d.'</h2>';
foreach($fight as $k => $v) {
    
    $hit = $v['hit'];
    $dmg = $v['dmg'];
    switch($hit) {
        case ('miss'):
            echo '<br>You flail and stumble, missing the '.$enemy.' entirely';
            break;
        case ('hit'):
            echo '<br>You strike the '.$enemy.' causing '.$dmg.' damage';
            break;
        case ('crit'):
            echo '<br>You land a solid blow that deals '.$dmg.' damage';
            break;
        default:
            break;
    }
    
    $totaldamage = $totaldamage + $dmg;
    echo '<br>Total Damage: '.$totaldamage.'<br><hr>';
}

$bp_lost = $totaldamage * 4;
$final_bp = $tbp - $bp_lost;

echo '<br>';
echo 'BP Reduced = '.$bp_lost;
echo '<br>';
echo 'BP Remaining = '.$final_bp.'/'.$tbp;

if($final_bp < 1) {
    echo '<br>You Break Your Opponents Guard!';
}


page_shut();
