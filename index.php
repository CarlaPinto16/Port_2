<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>multimédia 2024</title>
    <link rel="stylesheet" href="estilos.css">
    <script src="javascript.js" type="text/javascript"></script>
</head>
<body onload="janela()" onresize="janela()">
 
    <div id="corpo">
         
      <?php 
      include_once('conexao.php');
      include_once('menu.php');

       # Alterar o estado do ticket
       if (!empty($_POST)){
        $idticket = $solução ='';

        if(isset($_POST['idticket'])){ $idticket = $_POST['idticket']; }
        if(isset($_POST['solucao'])){ $solucao = Strip_tags(substr(trim($_POST['solucao']),0 ,300)); }

        if(is_numeric($idticket)){

           $sql='UPDATE tickets SET solucao = "'. $solucao .'" WHERE idticket = '. $idticket. ';';
           mysqli_query($link,$sql);
          }
        }

        if(isset($_GET['fechar']) and is_numeric($_GET['fechar'])){
          
          $idticket = $_GET['fechar'];
          $sql ='UPDATE tickets SET fechado ="1" WHERE idticket = '. $idticket . ';';
          
          mysqli_query($link,$sql);
        }

        #$sql ='SELECT * FROM tickets ORDER BY idticket ASC';
        #SELECT * FROM CITIES INNER JOIN TRAVEL_PACK ON CITIES.PACK_NAME = TRAVEL.PACK_NAME
        #$sql ='SELECT tickets.*,utilizadores.nome FROM tickets INNER JOIN utilizadores ON tickets.idutilizador = utilizadores.idutilizador ORDER BY tickets.idtickets ASC';
        $sql = ' SELECT tickets.*, utilizadores.nome 
        FROM tickets INNER JOIN utilizadores 
        ON tickets.idutilizador = utilizadores.idutilizador
        WHERE tickets.fechado LIKE 0
        ORDER BY tickets.idticket ASC';
       ;

        $resultado= mysqli_query($link, $sql);
           if($resultado){
              while($linha = mysqli_fetch_array($resultado)){

                    $num = $linha['idticket'];

                    #if($num<10){ $zeros = '00'; }
                    #else { if($num<100){ $zeros 0 '0;'} }

                    $num<10 ? $zeros = '00' : ($num<100? $zeros = '0' : $num );

                    print'<div class="coluna">';
                      print'<div class="p10">';
                          print'<div class="ticket">';

                            print'<form action="'.$url.'" method="post">';
                              print'<input type="hidden" name="idticket" value="'.$num.'">';

                              print' <div class="numero">#' . $zeros . $num .' </div>';
                              print'<div class="nome">'. $linha['nome'] .' - '. date('Y/m/d H:i', $linha['datahora']) .'</div>';
                              print' <div class="problema">'.$linha['problema'] .'</div>';

                              print' <div class="solucao">' ;
                                 print'<textarea name="solucao">'. $linha['solucao']. '</textarea>';
                              print '</div>';
                              
                              print' <div class="botoes"> ';
                                Print'<input type="submit" value="Responder"> |';
                                Print '<a href="'. $url .'?fechar='. $num .'">';
                                    Print 'Fechar o ticket';
                                print '</a>';
                              Print '</div>';
                            print'</form>';
                          print' </div>';
                       print' </div>';
                    print' </div>';
              }
            }
            #print time('Y.m.d H:i',time());
            #segundos 01/01/1970
            #print date('Y.m.d H:i,' time())
       ?>
        
        <!--<div class="coluna">
            <div class="p10">
              
               <div class="ticket">
                  <div class="numero">#001</div>
                  <div class="nome">Angelica Azevedo</div>
                  <div class="problema">O código não funciona</div>
                  <div class="solucao"></div>
                  <div class="botoes">Responder | Fechar o ticket</div>
                </div>
            </div> 
        </div>-->
      
    </div>
  
    
        
</body>
</html>