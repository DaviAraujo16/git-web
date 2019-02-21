<?php
    require_once("modulo.php");
    
    $media = "";
    $situacao = null;
    $mensagem = null;
    $valor = 0;
    $nota1 = "";        
    $nota2 = "";    
    $nota3 = "";
    $nota4 = "";

	if(isset($_GET['btn-calcular']))
	{  
        
        $nota1=$_GET['txtn1'];
        $nota2=$_GET['txtn2'];
        $nota3=$_GET['txtn3'];
        $nota4=$_GET['txtn4'];
        
        if(empty($nota1) || empty($nota2)  || empty($nota3) || empty($nota4)){
            $valor = 1;
            $mensagem = "<span class='error'>".VAZIO."</span>";
        }else{ 
            if(is_numeric($nota1) && is_numeric($nota2) && is_numeric($nota3) && is_numeric($nota4)){
            
                $media = CalcularMedia($nota1, $nota2, $nota3, $nota4);
            
                $nota1 = null;        
                $nota2 = null;    
                $nota3 = null;
                $nota4 = null;
            
                if($media < 7)
                    $situacao = "<span class='reprovado'>Reprovado</span>";
                else
                    $situacao = "<span class='aprovado'>Aprovado</span>";
            }else{
                $valor = 1;
                $mensagem = "<span class='error'>".CARACTER."</span>"; 
            }
        }
	}	
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Projeto PHP - Média</title>
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
                Média            
            </div>
        </header>
        <section class="conteudo center">
            <form action="media.php" method="get" name="frmMedia">
                <div class="area-calculo">
                    <div class="linha-nota">
                        <span class="texto">Valor1: </span>
                        <input class="caixa-texto" type="text" name="txtn1" class="caixa-texto" value="<?php echo($nota1); ?>" onkeypress=" return validarCaixa(event);">
                    </div>
                    <div class="linha-nota">
                        <span class="texto">Valor2: </span>
                        <input class="caixa-texto" type="text" name="txtn2" class="caixa-texto" value="<?php echo($nota2); ?>" onkeypress=" return validarCaixa(event);">               
                    </div>
                    <div class="linha-nota">
                        <span class="texto">Valor3: </span>
                        <input class="caixa-texto" type="text" name="txtn3" class="caixa-texto" value="<?php echo($nota3); ?>" onkeypress=" return validarCaixa(event);">               
                    </div>
                    <div class="linha-nota">
                        <span class="texto">Valor4: </span>
                        <input class="caixa-texto" type="text" name="txtn4" class="caixa-texto" value="<?php echo($nota4); ?>" onkeypress=" return validarCaixa(event);">               
                    </div>
                    <div class="linha-nota">
                        <input type="submit" name="btn-calcular" class="button" value="Calcular">
                    </div>
                </div>
            </form>    
            <div class="area-resposta">
                <div class="titulo-resultado">
                        Resultado
                </div>
                <div class="resultado texto-result-media">
                    <?php                                   
                        if($valor == 1){
                            echo($mensagem);
                        }else{
                            echo("A média é: ".$media."<br>");
                            echo("O aluno está: ".$situacao);        
                        }
                    ?>
                </div>
            </div>
        </section>
    </body>
</html>