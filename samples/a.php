<?php
function interpretCode($phase_status, $parmater) {
    $statusMap = [
        '0' => 'normal',
        '1' => 'high',
        '2' => 'low'
    ];

    $a = isset($statusMap[$phase_status[0]]) ? $statusMap[$phase_status[0]] : 'undefined';
    $b = isset($statusMap[$phase_status[1]]) ? $statusMap[$phase_status[1]] : 'undefined';
    $c = isset($statusMap[$phase_status[2]]) ? $statusMap[$phase_status[2]] : 'undefined';

    $return_response="";
    if($parmater=="VOLTAGE")
    {
        $return_response ="Phase voltages: R-phase is $a, Y-phase $b, and B-phase is $c.";
    }
    else if($parmater=="CURRENT"){
        $return_response ="Phase currents: R-phase is $a, Y-phase $b, and B-phase is $c.";
    }
    return $return_response;
}


// Example usage
$var = "101";
echo interpretCode($var,"VOLTAGE");
echo "<br>";
echo interpretCode($var,"CURRENT");
?>
