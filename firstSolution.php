<?php

$withdrawAmmount = 300.00;
$accountBalance = 500.00;
$bankCharges = 0.50;

for($i=0; $i<$withdrawAmmount; $i++){
    $vielfache = $i * $withdrawAmmount;
    if($withdrawAmmount == $vielfache and $withdrawAmmount < $accountBalance) {
        $accountBalance = $accountBalance - $withdrawAmmount - $bankCharges;
    }
}


echo $accountBalance;