<?php
/**
 * Created by PhpStorm.
 * Date: 2019-01-14
 * Time: 16:15
 */
include "connect_db.php";

$times = [];
$time = strtotime('18:30');
while($time <= strtotime('20:30')) {

    $times[] = date('H:i', $time);
    $time += 60 * 15;
}

$date = mysqli_escape_string($conn, $_GET['date']);

$query = "SELECT *
          FROM reserveringen
          WHERE date = '$date'";

$result = $conn->query($query);

if ($result) {
    $reservations = [];
    while($row = mysqli_fetch_assoc($result)) {
        $reservations[] = $row;
    }
}

$availableTimes = [];
foreach ($times as $time)
{
    $occurs = false;
    $time = strtotime($time);
    foreach ($reservations as $reservation)
    {
        $reservationStart = strtotime($reservation['time']);
        if($time >=  $reservationStart && $time <  $reservationStart + 60 * 60) {
            $occurs = true;
        }
    }

    if(!$occurs) {
        $availableTimes[] = date('H:i', $time);
    }
}

header("Content-type: application/json");
echo json_encode($availableTimes);
exit;
