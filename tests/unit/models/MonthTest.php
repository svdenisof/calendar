<?php

namespace app\tests\unit\models;


use app\models\LoginForm;
use app\models\Month;
use Codeception\Test\Unit;

class MonthTest extends Unit
{

    protected function _before()
    {
        $this->model = new LoginForm([
            'username' => 'admin',
            'password' => 'admin',
        ]);

        verify($this->model->login())->true();
    }

    //tests
    public function testMonthInformation(){


        $month = new Month(10);
        $information = $month->getMonthInformation();
        verify($information['month'])->equals(10);
        verify($information['first_day'])->equals(3);
        verify($information['last_day'])->equals(33);
        verify($information['weeks'])->equals(5);

    }

    public function testMonthMap(){
        $map = Month::getMonthMap(11);
        $expected = "Ноябрь";

        verify($map)->equals($expected);

        $map = Month::getMonthMap(5);

        verify($map)->notEquals($expected);
    }
}