var getData = function(){
    var naut = document.getElementById("naut").value;
    var ide = document.getElementById("ide").value;
    var taut = document.getElementById("taut").value;
    
    
//    console.log(naut+ " "+ ide + " "+ taut);

var autor = new Autores(naut , ide , taut ,"../combos/add.php");
autor.AddAutor();
    
   
}