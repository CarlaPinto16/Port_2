<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multimédia</title>
    <link href="estilos.css" rel="stylesheet">
    <script src="javascript.js" type="text/javascript"></script>
</head>
<body>
 <?php
 
        include_once('conexao.php');
        include_once('menu.php');



        #inserir na BD o novo ticket

        if(!empty($_POST) ){


            $idutilizador = $problema = '';

            if(isset($_POST['idutilizador'])){  $idutilizador = $_POST['idutilizador']; }
            if(isset($_POST['problema'])) {  $problema  = strip_tags( substr( trim($_POST['problema']),0,300)); }

            if(is_numeric($idutilizador) and strlen($problema)>0){

                $sql = 'INSERT INTO tickets (idutilizador, datahora, problema) VALUES ("'.$idutilizador.'", "'.time() .'", "'.$problema.'")';

                mysqli_query($link, $sql);
            }

        }


        #formulario de envio de um novo ticket
        print '<form action="' .$url.'" method="post">';

             print '<p>Utilizador</p>';

                print '<select name="idutilizador">';
                print '<option value=""></option>';

                    $sql = 'SELECT * FROM utilizadores ORDER BY nome ASC';
                    $resultado = mysqli_query($link, $sql);
                    if($resultado){
                        while($linha = mysqli_fetch_array($resultado)){
                            print '<option value="'.$linha['idutilizador'].'">'.$linha['nome'].'</option>';
                        }
                    }

                print '</select>';

             print'<textarea name="problema"></textarea>';
             print'<input type="submit" value="Enviar">';

        print'</form>';


?>

   

        
   

</body>
</html>