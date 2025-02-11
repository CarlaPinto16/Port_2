<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>multimédia 2024</title>
    <link rel="stylesheet" href="estilos.css">
    <script src="javascript.js" type="text/javascript"></script>
    <script>
    function ajax_lista(str){
        var resultado = document.getElementById('resultado');

        if (str.length== 0){resultado.innerHTML = '';}
        else{
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function(){
                if (this. readyState == 4 && this.status== 200){
                    resultado.innerHTML= this.responseText;
                }
            };
            xmlhttp.open("GET", "ajax_pagina.php?q=" + str, true);
            xmlhttp.send();
        }
    }
  </script>
</head>


<body onload="janela()" onresize="janela()">
  <h3>AJAX - Listagem de utilizadores</h3>
 <div id="corpo">
    <?php include_once('menu.php');?>

    <div id="utilizadores" class="p10">
        <form action="">
            <label for="fnome">Nome:</label>
            <input type="text" id="nome" name="nome" onkeyup="ajax_lista(this.value)">
           <p>Resultado(s): <span id="resultado"></span></p>
      </form>
   </div>
</div>
</body>
</html>  