#!/usr/bin/php
<?php
/*
 * Quick PHP script mimicking ddate (kinda) because THAT SHIT AIN'T IN utils-linux ANYMORE.
 * srs, wtf?
 * (K) dawt Confusion 7, 3178 YOLD - All rites reversed. Use as you please!
 */
 
function ordinal_suffix($number) { //thx to http://stackoverflow.com/users/349620/iacopo
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if (($number % 100) >= 11 && ($number % 100) <= 13) { return $number.'th'; }
    else { return $number.$ends[$number % 10]; }
}

function ddate() {
    $discdays = array('Sweetmorn', 'Boomtime', 'Pungenday', 'Prickle-Prickle', 'Setting Orange');
    $discmonths = array('Chaos', 'Discord', 'Confusion', 'Bureaucracy', 'The Aftermath');
    $aholydays = array('Mungday', 'Mojoday', 'Syaday', 'Zaraday', 'Maladay');
    $sholydays = array('Chaoflux', 'Discoflux', 'Confuflux', 'Bureflux', 'Afflux');
    
    $day = date('z');
    
    if (date('L')) {
        if ($day == 59) { $sttibsday = 1; }
        if ($day > 59) { $day--; }
    }
    
    $discmonth = $discmonths[floor($day / 73)];
    $discday = $discdays[$day % 5];
    $discnum = $day % 73 + 1;
    $ordiscnum = ordinal_suffix($discnum);
    $discyear = date('Y') + 1166;
    
    if ($discnum == 5) { $holyday = $aholydays[floor($day / 73)]; }
    if ($discnum == 50) { $holyday = $sholydays[floor($day / 73)]; }
    
    if (isset($sttibsday)) { return "Celebrate St. Tib's Day in the YOLD $discyear!\r\n"; }
    else if (isset($holyday)) { $ddate = "Celebrate $holyday!\r\n"; }
    else { $ddate = ''; }
    $ddate .= "Today is $discday, the $ordiscnum day of $discmonth in the YOLD $discyear.\r\n";
    return $ddate;
}

echo ddate();
exit(0);
?>
