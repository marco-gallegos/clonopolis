$(document).ready(function()
{
  $('#logearadmin').click(function(e)
  {
    e.preventDefault();

    $("#usuario").val("admincucei");
    $("#contrasena").val("cucei");


    });

  $('#logearuser').click(function(e)
  {
    e.preventDefault();

    $("#usuario").val("usuario");
    $("#contrasena").val("usuario");


    });

  $('#clic').click(function(e)
  {
    e.preventDefault();
    var vusuario = $("#usuario").val();
    var vcontrasena = $("#contrasena").val();

    $.ajax(
      {
        beforeSend : function()
        {

        },
        method : "POST",
        url : "php/login.php",
        data : {usuario: vusuario, contrasena: vcontrasena }
      })
      .done(function(msg)
      {
        if (msg == 1)
        {
          //$("body").load("usuario.html")
          window.location.href="usuario.html";

        }

      });
    //$('#log')[0].reset();
  })

});
