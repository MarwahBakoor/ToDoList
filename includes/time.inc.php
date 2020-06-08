<?php

class Dateandtime{
    public function day(){
        $Time = time();
        $Day= strftime('%w');
        $weekDays=array("sunday","monday","tuesday","wednesday","thursday","friday","saturday");
        return $weekDays[$Day];
    }
    public function dayMonth(){
        $Time = time();
        $DayMonth= strftime('%B %d');
        return $DayMonth;
    }

}
?>