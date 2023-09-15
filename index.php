<table cellspacing="0">
<tbody style="padding: 0; spacing: 0">

<?php 

$n = 10;
$m = 10;

$array = [];
for ($x = 0; $x < $n; $x++) {
    $array[$x] = [];
    for ($y = 0; $y < $m; $y++) {
        $array[$x][$y] = "";
    }
}

function checkShipPosition($length, $ship_x, $ship_y) {
    for ($i = 0; $i < $length; $i++) {
        if ($dir == 0) {
            if ($array[$ship_x+$i][$ship_y] != "") {
                return false;
            }
        } else {
            if ($array[$ship_x][$ship_y+$i] != "") { 
                return false;
            }
        }
    }
    return true;
}


function setShip($length, $m, $n, $array, $text) {
    while (true) {
        $ship_slots = [];
        $ship_x = rand(0, $n-($length));
        $ship_y = rand(0, $m-($length));
        $dir = rand(0,1);
        if ($array[$ship_x][$ship_y] == "") {
            $array[$ship_x][$ship_y] = $text;
        }

        if (checkShipPosition($length, $ship_x, $ship_y)) {
            for ($i = 0; $i < $length; $i++) {
                if ($dir == 0) {
                    $array[$ship_x+$i][$ship_y] = $text;
                } else {
                    $array[$ship_x][$ship_y+$i] = $text;
                    
                }
            }
            return $array;
        }
    }
}

for ($i = 0; $i < 4; $i++) {
    $array = setShip(1, $m, $n, $array, "F");
}

for ($i = 0; $i < 3; $i++) {
    $array = setShip(2, $m, $n, $array, "S");
}

for ($i = 0; $i < 2; $i++) {
    $array = setShip(3, $m, $n, $array, "D");
}

$array = setShip(4, $m, $n, $array, "P");


for ($y = -1; $y < $m; $y++) {
    echo "<tr>";
    for ($x = 0; $x <= $n; $x++) {
        $text = "";
        if ($array[$x-1][$y] != "") {
            $text = $array[$x-1][$y];
        } elseif ($y == -1 && $x != 0) {
            $text = "$x";
        } elseif ($y != -1 && $x == 0) {
            $text = chr(65+$y);
        }
        echo "<td style=\"border: solid 1px; margin: 0; width:30px; padding: 2px; vertical-align: center\">".$text."</td>"; 
    }
    echo "</tr>";
}
?>
</tbody>
</table>

