<?php 

function findAverage(array $numbers) {
    $sum = 0;

    for ($i = 0; $i < count($numbers); $i++) {
        $sum = $sum + $numbers[$i];
    }

    return $sum / count($numbers);
}

function findMedian(array $array) {
    sort($array);
    $length = count($array);
    $middle = 0;
    if ($length % 2 == 1) {
        $middle = $array[$length / 2];
    } else {
        $middle = ($array[$length / 2] + $array[($length / 2) - 1]) / 2;
    }

    return $middle;
}

function findMode(array $array) {
    $countArr = array();

    for ($i = 0; $i < count($array); $i++) {
        if (!array_key_exists(strval($array[$i]), $countArr)) {
            $countArr[strval($array[$i])] = 1;
        } else {
            $countArr[strval($array[$i])]++;
        }
    }

    $modeString = "[";

    foreach ($countArr as $key => $value) {
        if ($value > 1) {
            $modeString = $modeString . trim($key) . ", ";
        }
    }

    return (strlen($modeString) >= 2) ? substr($modeString, 0, strlen($modeString) - 2) . "]" : "";
}

function findRange(array $array) {
    $min = PHP_INT_MAX;
    $max = PHP_INT_MIN;

    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] > $max) {
            $max = $array[$i];
        }
        if ($array[$i] < $min) {
            $min = $array[$i];
        }
    }

    return $max - $min;
}

function findStandardDeviation(array $numbers, bool $isSampleSD = false) {
    if($isSampleSD && count($numbers) <= 1) {
        return 0;
    }
    $mean = findAverage($numbers);
    $sum = 0;
    

    for ($i = 0; $i < count($numbers); $i++) {
        $delta = abs($numbers[$i] - $mean);
        $sum = $sum + pow($delta, 2);
    }

    $sampleSDOffset = 0;
    if ($isSampleSD) {
        $sampleSDOffset++;
    }

    $sum = $sum / (count($numbers) - $sampleSDOffset);
    return sqrt($sum);
}

function toJSArr(string $list) : string {
    $list = trim($list);
    $expList = explode(" ", $list);
    $nList = "[";

    for($i = 0; $i < count($expList); $i++) {
        $nList .= $expList[$i];
        if($i < count($expList) - 1) {
            $nList .= ",";
        }
    }

    return $nList . "]";
}

function toArr(string $list) : array {
    $list = trim($list);
    $expList = explode(" ", $list);
    $nList = array();

    for($i = 0; $i < count($expList); $i++) {
        array_push($nList,floatval($expList[$i]));
    }

    return $nList;
}

function unpacktoJSArr(array $array) : string{
    $list = "[";
    $i = 0;
    foreach($array as $key => $value) {
        $list .= $value;
        if($i < count($array)-1) {
            $list .= ",";
        }

        $i++;
    }

    return $list . "]";
}

?>