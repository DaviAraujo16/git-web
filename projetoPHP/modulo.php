<?php
      
    define("ERRO","Erro de Cálculo!");
    define("VAZIO","Algum campo esta vazio!");
    define("CARACTER","Digite apenas numeros!");
    define("ZERO","O contador não pode ser igual a 0!");
    define("MENOR","O valor inicial não pode ser maior que o valor final!");
    define("IGUAL","Os valores não podem ser iguais!");
    define("PREENCHER","Por favor selecione um número!");

    //Função que Calcula a média - media.php
    function CalcularMedia($n1,$n2,$n3,$n4){
        $media = (int) "";

        $media=($n1+$n2+$n3+$n4)/4;
        
        return $media;
    }
      
    //Função que Calcula as operações básicas de 2 números - calc_if.php
    function CalcularOperacoesIf($v1, $v2, $opcao){
        $result="";
     
        global $rd1;
        global $rd2;
        global $rd3;
        global $rd4;
        
        global $mensagem;
        global $erro;
        
        
        if($opcao == "somar"){  
            $result = $v1 + $v2;
            $rd1 = "checked";
        }
        elseif($opcao == "subtrair"){
            $result = $v1 - $v2;
            $rd2 = "checked";
        }
        elseif($opcao == "multiplicar"){
            $result = $v1 * $v2;
            $rd3 = "checked";
        }
        elseif($opcao == "dividir"){
            if($v2 == 0)
                $result = "<span class='error'>".ERRO."</span>";
            else{
                $result = $v1 / $v2;
                $rd4 = "checked";
            }
        }
        
        return $result;
    }

    //Função que Calcula as operações básicas de 2 números - calc_switch.php
    function CalcularOperacoesSwitch($v1, $v2, $opcao){
        
        $result="";
        
        global $rd1;
        global $rd2;
        global $rd3;
        global $rd4;
        
        switch($opcao){
            case "somar":
                $result = $v1 + $v2;
                $rd1 = "checked";
                break;
            case "subtrair":
                $result = $v1 - $v2;
                $rd2 = "checked";
                break;
            case "multiplicar":
                $result = $v1 * $v2;
                $rd3 = "checked";
                break;
            case "dividir":   
                if($v2 == 0)
                    $result = "<span class='error'>".ERRO."</span>";
                else{
                    $result = $v1 / $v2;
                    $rd4 = "checked";
                }
                break;
        }
        return $result;
    }
    
    //Função que Calcula as tabuadas - tabuada.php
    function CalcularTabuada($vi,$vf){
        
        $result = "";
        $saida = "";
        $cont = 1;
                        
        while($cont <= $vf){
            $result =  $vi * $cont;
            $saida .= $vi." X ".$cont." = ".$result."<br>";
            $cont++;
        }
        
        return $saida;
    }

    
    //Função que Calcula os Pares e Impares - par_impar.php
    function CalcularParImpar($vMin,$vMax){
        
        global $contPar;
        global $contImpar;
        global $resultPar;
        global $resultImpar;
        
        $i = "";        
        $contPar = 0;
        $contImpar = 0;
                        
        for($i == $vMin; $i <= $vMax; $i++){
   
            if($i % 2 == 0){
                $resultPar .= $i."<br>";
                $contPar++;
                                                                      
            }else{
                $resultImpar .= $i."<br>";
                $contImpar++;
            }
        } 
    }




























?>
