<?php
include_once('conexao.php');
$n = 0;

if(isset($_GET['q']) and trim($_GET['q']) != ''){
    $nome = trim($_GET['q']);
    $sql= 'SELECT * FROM utilizadores WHERE nome LIKE "%' . $nome . '%" ORDER BY nome ASC';
    $resultado = mysqli_query($link, $sql);
    if($resultado){
        print '<ol>';
        While($linha = mysqli_fetch_array($resultado)){
            print '<li>' . $linha['nome'] . '</li>';
        }
        print '</ol>';
    }
}
if($n == 0){$mensagem = 'Não existem resultados.';} 
else{
    if($n==0){$mensagem = 'Apenas existe 1 resultado.';}
    else{$mensagem = 'Existem'. $n .'resultaos';}
}
print'<hr><p>Existem' . $n . 'resultados</p>';
?>