<?php
    require_once("modulo.php");

    $valorInicial = "";
    $valorFinal = "";
    $mensagem = "";
    $erro = 0;
    $resultado = "";

    if(isset($_GET['btn-calcular'])){
        
        $valorInicial = $_GET['txt-1'];
        $valorFinal = $_GET['txt-2'];
        
        if($valorInicial == null || $valorFinal == null){
            $erro = 1;
            $mensagem = "<span class='error'>".VAZIO."</span>";
        }else{
            if(is_numeric($valorInicial) && is_numeric($valorFinal)){
                if($valorFinal > 0){        
                    $resultado = CalcularTabuada($valorInicial, $valorFinal);
                }else{
                    $erro = 1;
                    $mensagem = "<span class='error'>".ZERO."</span>";
                }              
            }else{
                $erro = 1;
                $mensagem = "<span class='error'>".CARACTER."</span>";
            }            
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Projeto PHP - Tabuáda</title>
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
                                Média
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
                Tabuáda
            </div>
        </header>
        <section class="conteudo center">
            <div class="secao-calcular">
                <form action="tabuada.php" method="get" name="frmCalculo">
                    <div class="area-caixa">
                        <div class="linha1">
                            <span class="texto">Tabuáda:  </span>
                            <input type="text" name="txt-1" class="caixa-texto" value="<?php echo($valorInicial);?>" onkeypress=" return validarCaixa(event);"><br><br>
                        </div>
                        <div class="linha1">
                            <span class="texto">Contador:  </span>
                            <input type="text" name="txt-2" class="caixa-texto" value="<?php echo($valorFinal);?>"  onkeypress=" return validarCaixa(event);">
                        </div>    
                    </div>
                    <div class="area-botao">
                        <div class="container-botao">
                            <input type="submit" name="btn-calcular" class="button2" value="Calcular">
                        </div>    
                    </div>
                </form>    
            </div>
            <div class="secao-resultado">
                <div class="container-resultado">
                    <div class="caixa-tabuada center texto">
                        <?php
                            
                            if($erro == 1)
                                echo($mensagem);
                            else
                                echo($resultado);
                        ?>                 
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>