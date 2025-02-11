<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>multimédia 2024</title>
    <link rel="stylesheet" href="estilos.css">
    <script src="javascript.js" type="text/javascript"></script>
</head>
<body>

    <?php
        include_once('menu.php');
        include_once('conexao.php');
        
        if(!empty($_GET) ){


            $idticket = $datahora = $nome = $problema = $solucao = $estado ='';

            if(isset($_GET['idticket'])){  $idticket = $_GET['idticket']; }
            if(isset($_GET['datahora'])) {  $datahora  = strip_tags( substr( trim($_GET['datahora']),0,12)); }
            if(isset($_GET['nome'])) {  $nome  = strip_tags( substr( trim($_GET['nome']),0,11)); }
            if(isset($_GET['problema'])) {  $problema  = strip_tags( substr( trim($_GET['problema']),0,300)); }
            if(isset($_GET['solucao'])) {  $solucao  = strip_tags( substr( trim($_GET['solucao']),0,300)); }
            if(isset($_GET['fechar']) and is_numeric($_GET['fechar'])){
          
                $idticket = $_GET['fechar'];
                $sql ='UPDATE tickets SET fechado ="1" WHERE idticket = '. $idticket . ';';
                
                mysqli_query($link,$sql);
            }
        }
        $sql = ' SELECT tickets.*, utilizadores.nome 
        FROM tickets INNER JOIN utilizadores 
        ON tickets.idutilizador = utilizadores.idutilizador
        WHERE tickets.fechado LIKE 0
        ORDER BY tickets.idticket ASC';
       

        $resultado= mysqli_query($link, $sql);
           if($resultado){
              while($linha = mysqli_fetch_array($resultado)){

                    $num = $linha['idticket'];

                    #if($num<10){ $zeros = '00'; }
                    #else { if($num<100){ $zeros 0 '0;'} }

                    $num<10 ? $zeros = '00' : ($num<100? $zeros = '0' : $num );

                    #print'<div class="coluna">';
                    #print'<div class="p10">';
                        #print'<div class="ticket">';

                           print'<table>';
                             print'<td>'.$num.'</td>';
                             print'<td>' . $zeros . $num .' </td>';
                             print'<td>'. $linha['nome'] .' - '. date('Y/m/d H:i', $linha['datahora']) .'</td>';
                             print'<td>'.$linha['problema'] .'</td>';
                             print'<td>'. $linha['solucao']. '</td>';
                           print'</table>';
                        #print' </div>';
                     #print' </div>';
                  #print' </div>';
                }

                
            }
        
        
    ?>
       
      
    
     


   
   

    
    

</body>
</html>    