<?php

//EAN-8 and EAN-13 barcode identificator

echo ('Barcode identification program'.PHP_EOL);
$looper=1;
while ($looper!=0) {
    echo ("Please introduce your code to see if it's valid".PHP_EOL);
    fscanf(STDIN, "%d", $code);
    if (isset($code) and is_int($code)) {
        $numb = strlen($code);
        if ( $numb>1 and $numb <=8) {
            if ($code>0) {
                if ($numb<8) {
                    while ($numb<8) {
                        $r=0;
                        $code=$r.$code;
                        $numb=strlen($code);
                    }
                }
                //actual program starts here
                $result=0;
                $aux=strval($code);
                for ($i = 0; $i < strlen($code)-1; $i++) {
                    $result+= $i%2==0?$aux[$i]*3:$aux[$i]*1;
                }
                
                $check = $aux[strlen($code)-1];
                
                $result+=$check;
                $result = strval($result);
                $check = $result[strlen($result)-1];
                if ($check == 0) {
                    echo ('Valid barcode'.PHP_EOL);
                } else {
                    echo ('Invalid barcode'.PHP_EOL);
                }
            }
            else {
                echo ("invalid code, try again pls".PHP_EOL);
            }
        } elseif ($numb >8 and $numb<=13) {
            if ($code>0) {
                if ($numb<13) {
                    while ($numb<13) {
                        $r=0;
                        $code=$r.$code;
                        $numb=strlen($code);
                    }
                }
                //actual program starts here
                
                $result=0;
                $aux=strval($code);
                for ($i = 0; $i < strlen($code)-1; $i++) {
                    $result+= $i%2==0?$aux[$i]*1:$aux[$i]*3;
                }
                
                $check = $aux[strlen($code)-1];
                
                $result+=$check;
                $result = strval($result);
                $check = $result[strlen($result)-1];
                
                if ($check == 0) {
                    echo('Valid barcode'.PHP_EOL);
                } else {
                    echo ('Invalid barcode'.PHP_EOL);
                }
                
                
            }
            else {
                echo ("invalid code, try again pls".PHP_EOL);
            }
        }
        else {
            echo ("invalid code, try again pls".PHP_EOL);
        }
    } else {
        echo ("introduce a valid number".PHP_EOL);
    }
    
    echo("type 0 to end the program or any other number to continue".PHP_EOL);
    fscanf(STDIN, "%d", $looper);
    
}

?>