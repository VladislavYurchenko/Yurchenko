<?php 
namespace yurchenko;

use core\EquationInterface;

class Line implements EquationInterface
{
    protected $x;   
    function solve($a, $b, $c ):array{
        if($a==0){
           throw new YurchenkoException("Ошибка: уравнения не существует.");
        }
        \yurchenko\MyLog::log("Определено, что это линейное уравнение");
        $x = -$b/$a;
        $this->x = $x;
        return [$x];
    }
}
?>