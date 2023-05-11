<?php

$date = date('Y-m-d');
$currentYear = date('Y');
// if (isset($_GET['nextMonth'])) {
//     $months['']
// }
$currentMonth = date('m');
$date = mktime(12, 0, 0, date('m'), 1, $currentYear);
$numberOfDays = cal_days_in_month(CAL_GREGORIAN, date('m'), $currentYear);
$offset = date("w", $date);
$row_number = 1;
$date = date('Y-m-d');
$newDate = date('Y-m-d', strtotime($date . ' + 1 months'));
$months = array(
    '01' => 'January',
    '02' => 'February',
    '03' => 'March',
    '04' => 'April',
    '05' => 'May',
    '06' => 'June',
    '07' => 'July',
    '08' => 'August',
    '09' => 'September',
    '10' => 'October',
    '11' => 'November',
    '12' => 'December'
);
// echo $newDate;

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Calendar</title>
    <link rel="stylesheet" href="calendar.css">

    <style>
        button {
            background-color: transparent;
            border: none
        }
    </style>
</head>

<body>
    <div class="custom-calendar-wrap">
        <div class="custom-inner">
            <div class="custom-header clearfix">
                <nav>
                    <a href="?month=<?php echo $months['0' . $currentMonth - 1]; ?>" class="custom-btn custom-prev"></a>
                    <a href="?month=<?php echo $months['0' . $currentMonth + 1]; ?>" class="custom-btn custom-next"></a>
                </nav>
                <h2 id="custom-month" class="custom-month">
                    <?php
                    echo $months[$currentMonth];
                    ?>
                </h2>
                <h3 id="custom-year" class="custom-year">
                    <?php
                    echo $currentYear
                        ?>
                </h3>
            </div>
            <div id="calendar" class="fc-calendar-container">
                <div class="fc-calendar fc-five-rows">
                    <div class="fc-head">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="fc-body">
                        <?php
                        echo '<div class="fc-row">';
                        for ($i = 1; $i <= $offset; $i++) {
                            echo '<div><span class="fc-date"></span></div>';
                        }
                        for ($day = 1; $day <= $numberOfDays; $day++) {
                            if (($day + $offset - 1) % 7 == 0 && $day != 1) {
                                echo '</div> <div class="fc-row">';
                                $row_number++;
                            }
                            echo '<div><span class="fc-date">' . $day . '</span></div>';
                        }
                        // for ($i = 1; $i <= (35 - $numberOfDays - $offset); $i++) {
                        //     echo '<div><span class="fc-date"></span></div>';
                        // }
                        echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>