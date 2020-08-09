//Javascript de la pagina de profesores
$(document).on('change', '#fecha', function() {
    if(this.checked) {
        $("#dateop").css("display", "none");
    }else{
        $("#dateop").css("display", "block");
    }
});
Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
});
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
$(document).ready(function() {
        var parametro=1;
        $("#semana").attr("value",new Date().toDateInputValue());
        document.cookie = "fechaselec="+$("#semana").attr("value");
        $("#semana").change(function() {
            $("#semana").attr("value",$("#semana").val());
            document.cookie = "fechaselec="+$("#semana").attr("value");
        });
        $.ajax({
            data: parametro,
            type: "POST",
            url: 'php/formularioini.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $("#cursosdictados").html(response);
           }
       });
        var parametro=1;
        $.ajax({
            data: parametro,
            type: "POST",
            url: 'php/horariocarga.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $("#horario").html(response);
                ejecutar();
           }
       });
        $('#actuanio').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'php/cargaanio.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $("#horario").html(response);
                ejecutar();
           }
       });
     });
        $('#formularioreserva').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'php/insertar.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $("#respuestarins").html(response);
           }
       });
     });
    $('#actuaprop').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'php/cargaprop.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $("#horario").html(response);
                ejecutar(); 
           }
       });
     });
    $('#actuaula').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'php/cargaaula.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $("#horario").html(response);
                ejecutar();
           }
       });
     });
});