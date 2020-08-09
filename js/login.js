//Javascript de la pagina de login
function leerCookie(nombre) {
         var lista = document.cookie.split(";");
         for (i in lista) {
             var busca = lista[i].search(nombre);
             if (busca > -1) {micookie=lista[i]}
             }
         var igual = micookie.indexOf("=");
         var valor = micookie.substring(igual+1);
         return valor;
}
$(document).ready(function() {
        $('#formulariologin').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'php/login.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $("#respuestalogin").html(response);
                if($("#datos").attr("exito")==1){
                   if($("#datos").attr("tipou")==1){
                        $(location).attr('href','Ini.html');
                    }else{
                        document.cookie = "idsesion="+$("#datos").attr("codigo");
                        $(location).attr('href','user.html');
                    }
                }else{
                    
                }
                
           }
       });
     });
});