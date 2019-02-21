<?php
    require_once("modulo.php");
    
    $valorTxt1 ="";
    $valorTxt2 = "";
    $operacao = null;
    $resultado = 0;
    
    $rd1 = "";
    $rd2 = "";
    $rd3 = "";
    $rd4 = "";


    if(isset($_GET['btn-calcular'])){
        
        $valorTxt1 = $_GET['txt-1'];
        $valorTxt2 = $_GET['txt-2'];
        
        if($valorTxt1 == null || $valorTxt2 == null || isset($_GET["rdoOperacao"]) == false){
            $resultado = "<span class='error'>".VAZIO."</span>";
        }
        else{
            if(is_numeric($valorTxt1) && is_numeric($valorTxt2)){
                $operacao = $_GET['rdoOperacao'];
                $resultado = CalcularOperacoesSwitch($valorTxt1, $valorTxt2, $operacao);
            }else{
                $resultado = "<span class='error'>".CARACTER."</span>"; 
            }
        }
    }
    
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Projeto PHP - Calculadora Switch</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" href="imagens/favicon.ico">
        <script>
            function validarCaixa(caracter){
                
                if(window.event)
                    var letra = caracter.charCode;
                else
                    var letra = caracter.which;
                
                 if(letra < 48 || letra > 57){
                     
                    if(letra != 46 || letra != 44|| letra != 44)
                        return false;
                }
            }
        </script>
    </head>
    <body class="back-image">
        <header class="header">
            <div class="container-menu">
                <nav class="img-menu">
                    <img src="imagens/menu.png"/>
                    <ul id="menu">
                        <a href="media.php">
                            <li class="itens">
                                Media
                            </li>
                        </a>
                        <li class="itens" id="calc">
                            Calculadora
                            <ul class="submenu">
                                <a href="calc_if.php">
                                    <li class="sub-itens">
                                        Calculadora - If
                                    </li>
                                </a>
                                <a href="calc_switch.php">
                                    <li class="sub-itens">
                                        Calculadora - Switch
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
                Calculadora - Switch           
            </div>
        </header>
        <section class="conteudo center"> 
            <form action="calc_if.php" method="get" name="frmCalculo">
                    <div class="area-calculo align">
                        <div class="caixa-valores">
                            <span class="texto">Valor1:</span>
                            <input type="text" name="txt-1" class="caixa-texto" value="<?php echo($valorTxt1); ?>" onkeypress=" return validarCaixa(event);"><br><br>
                            <span class="texto">Valor2:</span>
                            <input type="text" name="txt-2" class="caixa-texto" value="<?php echo($valorTxt2); ?>" onkeypress=" return validarCaixa(event);">
                        </div>
                        <div class="caixa-operacoes texto">
                            <input class="radio" type="radio" name="rdoOperacao" <?php echo($rd1); ?> value="somar">Somar<br>
                            <input class="radio" type="radio" name="rdoOperacao" <?php echo($rd2); ?> value="subtrair">Subtrair<br>
                            <input class="radio" type="radio" name="rdoOperacao" <?php echo($rd3); ?> value="multiplicar">Multiplicar<br>
                            <input class="radio" type="radio" name="rdoOperacao" <?php echo($rd4); ?> value="dividir">Dividir<br>
                        </div>
                        <div class="caixa-calcular">
                            <input type="submit" name="btn-calcular" class="button" value="Calcular">
                        </div>
                    </div>
                </form>    
                <div class="area-resposta">
                    <div class="titulo-resultado">
                        Resultado
                    </div>
                    <div class="resultado texto-resultado">
                        <?php echo($resultado)?>
                    </div>
                </div>
        </section>
    </body>
</html>