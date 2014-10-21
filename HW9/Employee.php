<?php
/**
 * Created by PhpStorm.
 * User: Skyler
 * Date: 10/19/2014
 * Time: 1:13 AM
 */

class Employee
{

    private $name;
    private $rate;
    private $depend;

    public function __construct()
    {
        if(func_num_args() == 1){
            $this->setName(func_get_arg(0));
            $this->setRate(7.25);
            $this->setDepend(0);
        }
        else if(func_num_args() == 2){
            $this->setName(func_get_arg(0));
            $this->setRate(func_get_arg(1));
            $this->setDepend(0);
        }
        else if(func_num_args() == 3){
            $this->setName(func_get_arg(0));
            $this->setRate(func_get_arg(1));
            $this->setDepend(func_get_arg(2));
        }
    }

    public function __toString()
    {
        return $this->name;
    }

    public function setName($nameIn)
    {
        $this->name = $nameIn;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setRate($rateIn)
    {
        if($rateIn > 7.25)
            $this->rate = $rateIn;
        else
            $this->rate = 7.25;
    }

    public function getRate()
    {
        return $this->rate;
    }

    public function setDepend($dependIn)
    {
        if($dependIn < 0)
            $this->depend = 0;
        elseif($dependIn >9)
            $this->depend = 9;
        else
            $this->depend = $dependIn;
    }

    public function getDepend()
    {
        return $this->depend;
    }

    public function computePay($hrsWrkd){
        if($hrsWrkd < 0)
            $hrsWrkd = 0;

        if($hrsWrkd<=40)
            $grossPay = $hrsWrkd * $this->rate;
        else{
            $grossPay =  ($hrsWrkd - 40) * ($this->rate * 1.5);
        }

        return $grossPay - ($grossPay*.062) - ($grossPay * .0145) - $this->withholdings($grossPay);

    }

    public function withholdings($grossIn){
        $basis =  $grossIn - ($this->depend * 75);
        if($basis <= 160){
            return 0;
        }elseif($basis > 160 && $basis <= 503){
            return .1 * ($basis - 160);
        }elseif($basis > 503 && $basis <= 1554){
            return 34.30 + .15 * ($basis - 503);
        }elseif($basis > 1554 && $basis <= 2975){
            return 191.95 + .25 * ($basis - 1554);
        }elseif($basis > 2975 && $basis <= 4449){
            return 547.20 + .28 * ($basis - 2975);
        }elseif($basis > 4449 && $basis <= 7820){
            return 959.92 + .33 * ($basis - 4449);
        }elseif($basis > 7820 && $basis <= 8813){
            return 2072.35 + .35 * ($basis - 7820);
        }else{
            return 2419.90 + .396 * ($basis - 8813);
        }

    }

}