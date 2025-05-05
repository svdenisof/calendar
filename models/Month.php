<?php

namespace app\models;

/**
 * Расчет данных для календаря
 */
class Month
{
    private int $month;
    private int $time;

    private static array $monthMap = [
        1  => "Январь",
        2  => "Февраль",
        3  => "Март",
        4  => "Апрель",
        5  => "Май",
        6  => "Июнь",
        7  => "Июль",
        8  => "Август",
        9  => "Сентябрь",
        10 => "Октябрь",
        11 => "Ноябрь",
        12 => "Декабрь"
    ];
    private array $weekMap = [
        'mon'   => 1
        ,'tue'  => 2
        ,'wed'  => 3
        ,'thu'  => 4
        ,'fri'  => 5
        ,'sat'  => 6
        ,'sun'  => 7
    ];

    public function __construct(int $month)
    {
        $this->month = $month;
        $this->time =  mktime(0,0,0,$month);
    }

    public static function getMonthMap($month)
    {
        return self::$monthMap[$month];
    }

    public function getMonthInformation(): array
    {
        $firstDay = $this->getFirstWeekDayOfMonth();
        $lastDay = $this->getLastWeekDayOfMonth();
        $countOfWeeks = $this->getCountOfMonthWeek();


        $month = [
            'month'     => $this->month,
            'first_day' => $firstDay,
            'last_day'  => ($countOfWeeks*7)-(7-$lastDay),
            'weeks'     => $countOfWeeks
        ];

        return $month;
    }

    private function getFirstWeekDayOfMonth(): int
    {
        $month_start = strtotime('first day of this month', $this->time);

        $day = date('D', $month_start);

        return  $this->weekMap[strtolower($day)];
    }

    private function getLastWeekDayOfMonth(): int
    {
        $month_end = strtotime('last day of this month', $this->time);

        $day = date('D', $month_end);

        return  $this->weekMap[strtolower($day)];
    }

    private function getCountOfMonthWeek(): int
    {
        $firstWeekday = self::getFirstWeekDayOfMonth();
        $lastWeekday = self::getLastWeekDayOfMonth();

        $dayCount = ($firstWeekday - 1) + self::getMonthDays() + (7 - $lastWeekday);

        return $dayCount/7;
    }

    private function getMonthDays(): int
    {
        return cal_days_in_month(CAL_GREGORIAN,
            date("m", strtotime('last day of this month', $this->time)),
            date("Y", strtotime('last day of this month', $this->time)));
    }
}