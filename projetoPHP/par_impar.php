<?php
    require_once("modulo.php");
    
    $valorMin ="";
    $valorMax = "";
    $erro="";
    $resultPar="";
    $resultImpar="";
    $contPar="";
    $contImpar="";

    if(isset($_GET['btn-calcular'])){
        
        $valorMin = $_GET['combo-min'];
        $valorMax = $_GET['combo-max'];
        
        if($valorMin == null || $valorMax == null){
            $erro = 1;
            $mensagem = "<span class='error'>".VAZIO."</span>";
        }else{
            if($valorMin != "false" || $valorMax != "false"){
                if($valorMin > $valorMax){
                    $erro = 1;
                    $mensagem = "<span class='error'>".MENOR."</span>";
                }else{
                    if($valorMin == $valorMax){
                        $erro = 1;
                        $mensagem = "<span class='error'>".IGUAL."</span>";
                    }else{
                        CalcularParImpar($valorMin,$valorMax);
                    }                
                }          
            }else{
                $erro = 1;
                $mensagem = "<span class='error'>".PREENCHER."</span>";
            } 
        }        
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Projeto PHP - Pares e Ímpares</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" href="imagens/favicon.ico">
    </head>
    <body class="back-image">
        <header class="header">
            <div class="container-menu">
                <nav class="img-menu">
                    <img src="imagens/menu.png"/>
                    <ul id="menu">
                        <a href="media.php">
                            <li class="itens">
                                Média
                            </li>
                        </a>
                        <li class="itens" id="calc">
                            Cálculadora
                            <ul class="submenu">
                                <a href="calc_if.php">
                                    <li class="sub-itens">
                                        Cálculadora - If
                                    </li>
                                </a>
                                <a href="calc_switch.php">
                                    <li class="sub-itens">
                                        Cálculadora - Switch
                                    </li>
                                 </a>    
                            </ul>
                        </li>
                        <a href="tabuada.php">
                            <li class="itens">
                                Tabuáda
                            </li>
                        </a>
                        <a href="par_impar.php">
                            <li class="itens">
                                Pares e Ímpares
                            </li>
                        </a>
                    </ul>   
                </nav>
            </div>
            <div class="container-titulo">
                Pares e Ímpares          
            </div>
        </header>
        <div class="container-titulo">
            <?php
                if($erro == 1)
                    echo($mensagem);      
            ?>          
        </div> 
        <section class="conteudo center">   
            <div class="secao-calcular">
                <form action="par_impar.php" method="get" name="frmCalculo">
                    <div class="area-caixa">
                        <div class="linha1">
                            <span class="texto">Número Inicial:  </span>
                            <select name="combo-min" class="combo1">
                                <option value="false" name="combo-min">Por favor selecione um número!</option>
                                <?php
                                    for($cont = 0; $cont <= 500; $cont++){ ?>
                                        <option value="<?php echo($cont);?>" name="combo-min">
                                            <?php echo($cont);?>
                                        </option>   
                                    <?php }?>                           
                            </select>
                        </div>
                        <div class="linha1">
                            <span class="texto">Número Final:  </span>
                            <select name="combo-max" class="combo2">
                                <option value="false">Por favor selecione um número!</option>
                                <?php
                                    for($cont = 100; $cont <= 1000; $cont++){ ?>
                                        <option value="<?php echo($cont);?>" name="combo-max">
                                            <?php echo($cont);?>
                                        </option>
                                    <?php }?>
                            </select>
                            
                        </div>    
                    </div>
                    <div class="area-botao">
                        <div class="container-botao">
                            <input type="submit" name="btn-calcular" class="button2" value="Calcular">
                        </div>    
                    </div>
                </form>    
            </div>
            <div class="secao-resultado2">
                <div class="container-resultado2">
                    <div class="caixa-par-impar1 text">
                        <?php echo($resultPar);?><br>
                        Total Pares:<?php echo($contPar);?>
                    </div>
                    <div class="caixa-par-impar2 text">
                        <?php echo($resultImpar);?><br>
                        Total Impares:<?php echo($contImpar);?>
                    </div>  
                </div>
            </div>
        </section>
    </body>
</html>