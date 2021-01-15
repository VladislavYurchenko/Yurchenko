<?php
namespace yurchenko;

 class Quadratic extends Line
 {
     function equation2(float $a, float $b, float $c){
         $d = $this->discriminant($a,$b,$c); 
         if($a==0){
             return $this->solve($b,$c,null);
         }
         if ($d<0){
             $this->x = false;
             throw new YurchenkoException("Ошибка: уравнение не имеет корней.");
         }
         $d = sqrt($d);
         $x1 = ((-$b) + $d) / (2 * $a);
         $x2 = ((-$b) - $d) / (2 * $a);
         if($x1 == $x2){
             $this->x = $x1;
             return [$x1];
         }
         \Yurchenko\MyLog::log("Определено, что это квадратное уравнение");
        $this->x = array($x1,$x2);
        return  array($x1,$x2);
         
     }
     protected function discriminant( $a,$b,$c){
         $d =  $b * $b - 4 * $a * $c;
         return $d;
     }   
 }