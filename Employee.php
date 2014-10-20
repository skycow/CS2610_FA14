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

}