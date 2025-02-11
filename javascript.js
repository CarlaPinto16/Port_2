function janela(){
    var x,i,w;
    var corpo = document.getElementById('corpo');
    var coluna = document.getElementsByClassName('coluna');
    x = corpo.clientWidth;
    /*if(x <= 750){ w = 100;}
  else{ 
      if(x <= 1000){ w = 50; }
   else{ w = 25;} 
  }*/
  x<=750 ? w= 100 : (x<=1000 ? w = 50 : w = 25);

    for(i=0 ; i<coluna.length ; i++){coluna.item(i).style ='width:'+ w +'%;';} 
}