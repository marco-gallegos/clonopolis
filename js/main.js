function cargar_pagina_en_container(url)
{
  $.ajax(
    {
      url : url,
      dataType : "html",
      success : function(response)
      {
        $(".container").append(response);
      },
      error : function()
      {
        console.log("error de ejecucion");
      }
    }
  );
}

    $("#lista_mostrar").collapse("hide");
    $("#lista_mostrar").collapse();

$(document).ready(function()
{
  $("#cerrar_sesion").click(function(evnt)
  {
    evnt.preventDefault();
    $.ajax(
      {
        method : "POST",
        url : "php/cerrar_sesion.php",
        data : { nombre : "alo" },
        error: function(e){
          console.log(e);
        }
      }).done(function(msg)
      {
        if (msg == 1)
        {
          alert("cerraste session");
          window.location.href = "index.html" ;
        }
        else {
          console.log("no se cacho el error");
        }
      });

  });

 $(".vista_mostrar").click(function(evnt)
  {
    evnt.preventDefault();
    $(".container").empty();
    //$(".container").load("in-peliculas.html");
    console.log("#vista_mostrar clickeado");
    var parseada_pag = "/pag/mostrar/" + this.id + ".html"
    console.log(parseada_pag);
    cargar_pagina_en_container(parseada_pag);
  });

  $(".vista_insertar").click(function(evnt)
   {
     evnt.preventDefault();
     $(".container").empty();
     //$(".container").load("in-peliculas.html");
     console.log("#vista_insertar clickeado");
     var parseada_pag =   this.id + ".html"
     console.log(parseada_pag);
     cargar_pagina_en_container(parseada_pag);
   });
 //Para evitar repetir la misma funcion mil veces :v...Te mamaste prro jaja


 $(".vista_actualizar").click(function(evnt)
  {
    evnt.preventDefault();
    $(".container").empty();
    //$(".container").load("in-peliculas.html");
    console.log("#vista_actualizar clickeado");
    var parseada_pag = this.id + ".html"
    console.log(parseada_pag);
    cargar_pagina_en_container(parseada_pag);
  });



  //consultar la bd

  $(".container").on("click","#in-peliculas",function(evnt)
  {

    evnt.preventDefault();
    //var ok = $("#1").val();
    //var tx = $("#in-peliculas").text();
    var fr = document.forms[0].elements
    var datos = new Array();
    for (var i = 1; i < (fr.length-1); i++)
    {
      var nu = "#"+i;
      var elem = $(nu).val();
      datos.push(elem);
    }
    console.log(datos[6]);

    $.ajax(
      {
        method : "POST",
        url : "php/in-peliculas.php",
        data : {nombre : datos[0],duracion : datos[1],clasificacion : datos[2], sinopsis : datos[3],fecha : datos[4],idioma : datos[5],genero : datos[6]},
        error:function(e){
          console.log(e);
        }
      }).done(function(msg)
      {
        if (msg == 1)
        {
          console.log("insertaste en peliculas prro :v");
        }
      });
  });

  $(".container").on("click", "#in-empleados",function(evnt)
  {
    evnt.preventDefault();
    var fr = document.forms[0].elements
    var datos = new Array();
    for (var i = 1; i < (fr.length-1); i++)
    {
      var nu = "#"+i;
      var elem = $(nu).val();
      datos.push(elem);
    }

    $.ajax(
      {
        method : "POST",
        url : "php/in-empleados.php",
        data : {nombre : datos[0],puesto : datos[1],edad : datos[2],direccion : datos[3],sexo : datos[4],telefono : datos[5],nss : datos[6]},
        error:function(e){
          console.log(e);
        }
      }).done(function(msg)
      {
        if (msg == 1)
        {
          console.log("insertaste un empleado prro :v");
        }
      });
  });

  $(".container").on("click", "#in-productos",function(evnt)
  {
    evnt.preventDefault();
    var fr = document.forms[0].elements
    var datos = new Array();
    for (var i = 1; i < (fr.length-1); i++)
    {
      var nu = "#"+i;
      var elem = $(nu).val();
      datos.push(elem);
      console.log(datos[(i-1)]);
    }

    $.ajax(
      {
        method : "POST",
        url : "php/in-productos.php",
        data : {nombre : datos[0], precio : datos[1], descripcion : datos[2], tam : datos[3]},
        error:function(e){
          console.log(e);
        }
      }).done(function(msg)
      {

        if (msg == 1)
        {
          console.log("insertaste un producto prro :v");
        }
      });
      });

     $(".container").on("click","#in-salas",function(evnt)
      {
        evnt.preventDefault();
        var fr = document.forms[0].elements
        var datos = new Array();
        for (var i = 1; i < (fr.length-1); i++)
        {
          var nu = "#"+i;
          var elem = $(nu).val();
          datos.push(elem);
        }
        $.ajax(
          {
            method : "POST",
            url : "php/in-salas.php",
            data : {butacas : datos[0], tipo : datos[1]},
            error:function(e){
              console.log(e);
            }
          }).done(function(msg)
          {

            if (msg == 1)
            {
              console.log("insertaste una sala prro :v");
            }
          });
      });

      $(".container").on("click","#in-clientes",function(evnt)
      {
        evnt.preventDefault();
        alert("bien");
        var fr = document.forms[0].elements
        var datos = new Array();
        for (var i = 1; i < (fr.length-1); i++)
        {
          var nu = "#"+i;
          var elem = $(nu).val();
          datos.push(elem);
        }
        $.ajax(
          {
            method : "POST",
            url : "php/in-clientes.php",
            data : {nombre : datos[0], categoria : datos[1]},
            error:function(e){
              console.log(e);
            }
          }).done(function(msg)
          {

            if (msg == 1)
            {
              console.log("insertaste un cliente prro :v");
            }
          });

      });

      $(".container").on("click", "#in-funciones",function(evnt)
      {
        evnt.preventDefault();
        var fr = document.forms[0].elements
        var datos = new Array();
        for (var i = 1; i < (fr.length-1); i++)
        {
          var nu = "#"+i;
          var elem = $(nu).val();
          datos.push(elem);
        }
        $.ajax(
          {
            method : "POST",
            url : "php/in-funciones.php",
            data : {horario : datos[0], pelicula : datos[1], sala : datos[2]},
            error:function(e){
              console.log(e);
            }
          }).done(function(msg)
          {
            if (msg == 1)
            {
              console.log("insertaste una funcion prro :v");
            }
          });
      });

      $(".container").on("click","#in-boletos",function(evnt)
      {
        evnt.preventDefault();
        var fr = document.forms[0].elements
        var datos = new Array();
        for (var i = 1; i < (fr.length-1); i++)
        {
          var nu = "#"+i;
          var elem = $(nu).val();
          datos.push(elem);
        }
        $.ajax(
          {
            method : "POST",
            url : "php/in-boletos.php",
            data : {funcion : datos[0], empleado : datos[1], cliente : datos[2], fecha : datos[3], hora : datos[4] },
            error:function(e){
              console.log(e);
            }
          }).done(function(msg)
          {
            if (msg == 1)
            {
              console.log("insertaste un boleto prro :v");
            }
          });
        });

        $(".container").on("click", "#update-productos",function(evnt)
        {
          evnt.preventDefault();
          var fr = document.forms[0].elements;
          var datos = new Array();
          for (var i = 1; i < (fr.length-1); i++)
          {
            var nu = "#"+i;
            var elem = $(nu).val();
            datos.push(elem);
            console.log(datos[(i-1)]);
          }

          $.ajax(
            {
              method : "POST",
              url : "php/update-productos.php",
              data : {nombre : datos[0], precio : datos[1], descripcion : datos[2], tam : datos[3],id : datos[4]},
              error:function(e){
                console.log(e);
              }
            }).done(function(msg)
            {

              if (msg == 1)
              {
                console.log("se actualizo producto");
              }
            });
            });

            $(".container").on("click", "#update-clientes",function(evnt)
            {
              evnt.preventDefault();
              var fr = document.forms[0].elements;
              var datos = new Array();
              for (var i = 1; i < (fr.length-1); i++)
              {
                var nu = "#"+i;
                var elem = $(nu).val();
                datos.push(elem);
                console.log(datos[(i-1)]);
              }

              $.ajax(
                {
                  method : "POST",
                  url : "php/update-clientes.php",
                  data : {nombre : datos[0], categoria : datos[1], id : datos[2]} ,
                  error:function(e){
                    console.log(e);
                  }
                }).done(function(msg)
                {

                  if (msg == 1)
                  {
                    console.log("se actualizo cliente");
                  }
                });
                });

      $(".container").on("click", "#update-empleados",function(evnt)
      {
        evnt.preventDefault();
        var fr = document.forms[0].elements;
        var datos = new Array();
        for (var i = 1; i < (fr.length-1); i++)
        {
          var nu = "#"+i;
          var elem = $(nu).val();
          datos.push(elem);
          console.log(datos[(i-1)]);
        }

        $.ajax(
          {
            method : "POST",
            url : "php/update-empleados.php",
            data : {nombre : datos[0],puesto : datos[1],edad : datos[2],direccion : datos[3],sexo : datos[4],telefono : datos[5],nss : datos[6], id : datos[7]},
            error:function(e){
              console.log(e);
            }
          }).done(function(msg)
          {

            if (msg == 1)
            {
              console.log("se actualizo empleado");
            }
          });
          });

          $(".container").on("click", "#update-peliculas",function(evnt)
          {
            evnt.preventDefault();
            var fr = document.forms[0].elements;
            var datos = new Array();
            for (var i = 1; i < (fr.length-1); i++)
            {
              var nu = "#"+i;
              var elem = $(nu).val();
              datos.push(elem);
              console.log(datos[(i-1)]);
            }

            $.ajax(
              {
                method : "POST",
                url : "php/update-peliculas.php",
                data : {nombre : datos[0],duracion : datos[1],clasificacion : datos[2], sinopsis : datos[3],fecha : datos[4],idioma : datos[5],genero : datos[6], id : datos[7]},
                error:function(e){
                  console.log(e);
                }
              }).done(function(msg)
              {

                if (msg == 1)
                {
                  console.log("se actualizo pelicula");
                }
              });
              });

              $(".container").on("click", "#update-boletos",function(evnt)
              {
                evnt.preventDefault();
                var fr = document.forms[0].elements;
                var datos = new Array();
                for (var i = 1; i < (fr.length-1); i++)
                {
                  var nu = "#"+i;
                  var elem = $(nu).val();
                  datos.push(elem);
                  console.log(datos[(i-1)]);
                }

                $.ajax(
                  {
                    method : "POST",
                    url : "php/update-boletos.php",
                    data : {funcion : datos[0], empleado : datos[1], cliente : datos[2], fecha : datos[3], hora : datos[4], id : datos[5] },
                    error:function(e){
                      console.log(e);
                    }
                  }).done(function(msg)
                  {

                    if (msg == 1)
                    {
                      console.log("se actualizo boleto");
                    }
                  });
                  });
                  $(".container").on("click", "#update-funciones",function(evnt)
                  {
                    evnt.preventDefault();
                    var fr = document.forms[0].elements;
                    var datos = new Array();
                    for (var i = 1; i < (fr.length-1); i++)
                    {
                      var nu = "#"+i;
                      var elem = $(nu).val();
                      datos.push(elem);
                      console.log(datos[(i-1)]);
                    }

                    $.ajax(
                      {
                        method : "POST",
                        url : "php/update-funciones.php",
                        data : {horario : datos[0], pelicula : datos[1], sala : datos[2], id : datos[3]},
                        error:function(e){
                          console.log(e);
                        }
                      }).done(function(msg)
                      {

                        if (msg == 1)
                        {
                          console.log("se actualizo funcion");
                        }
                      });
                      });

                      $(".container").on("click", "#update-salas",function(evnt)
                      {
                        evnt.preventDefault();
                        var fr = document.forms[0].elements;
                        var datos = new Array();
                        for (var i = 1; i < (fr.length-1); i++)
                        {
                          var nu = "#"+i;
                          var elem = $(nu).val();
                          datos.push(elem);
                          console.log(datos[(i-1)]);
                        }

                        $.ajax(
                          {
                            method : "POST",
                            url : "php/update-salas.php",
                            data : {butacas : datos[0], tipo : datos[1], id : datos[2]},
                            error:function(e){
                              console.log(e);
                            }
                          }).done(function(msg)
                          {

                            if (msg == 1)
                            {
                              console.log("se actualizo sala");
                            }
                          });
                          });
/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */


});
