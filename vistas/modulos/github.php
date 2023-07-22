<?php

if ($_SESSION["perfil"] == "Especial") {

  echo '<script>

    window.location = "inicio";

  </script>';

  return;
}

?>

<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Integración

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Integración</li>

    </ol>

  </section>

  <section class="content">

    <div class="row">

      <!--=====================================
      EL FORMULARIO
      ======================================-->

      <div class="col-lg-12 col-xs-12">

        <div class="box box-success">

          <div class="box-header with-border"></div>

          <form method="post" action="controladores/github.controlador.php">

            <div class="box-body">

              <div class="box">

                <!--=====================================
                REPOSITORIO
                ======================================-->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-file"></i></span>

                    <input type="input" placeholder="Ruta del repositorio" class="form-control" name="repositorio">

                  </div>

                </div>

                <!--=====================================
                DESCRIPCIÓN REPOSITORIO
                ======================================-->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-file"></i></span>

                    <input type="input" placeholder="Descripción del repositorio" class="form-control" name="repoDescription">

                  </div>

                </div>

                <!--=====================================
                NOMBRE COMMIT
                ======================================-->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-list"></i></span>

                    <input type="text" placeholder="Nombre del commit" class="form-control" name="commit" id="commit">


                  </div>

                </div>

                <!--=====================================
                VERSION TAG
                ======================================-->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <input type="text" placeholder="Versión del tag" class="form-control" name="tag">
                  </div>

                </div>

                <!--=====================================
                NOMBRE TAG
                ======================================-->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <input type="text" placeholder="Nombre del tag" class="form-control" name="nomtag">
                  </div>

                </div>

                <!--=====================================
                DESCRIPCION TAG
                ======================================-->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <input type="text" placeholder="Descripción del tag" class="form-control" name="desctag">

                  </div>

                </div>


                <!--=====================================
                TOKEN ACCESS
                ======================================-->



                <!--=====================================
                ENTRADA MÉTODO DE PAGO
                ======================================-->

                <br>

              </div>
              <div class="pull-right">

                <button type="submit" class="btn btn-primary pull-right">Aceptar</button>

              </div>
            </div>


          </form>

        </div>

      </div>

    </div>

  </section>

</div>

<script>
  // Obtener el parámetro de la URL
  const urlParams = new URLSearchParams(window.location.search);
  const github = urlParams.get('github');

  // Verificar si hay una alerta y mostrarla
  if (github === 'success') {
    swal({
      type: "success",
      title: "El archivo se exportó a GitHub correctamente",
      showConfirmButton: true,
      confirmButtonText: "Cerrar",
      closeOnConfirm: false
    }).then(function(result) {
      if (result.value) {
        window.location = "github";
      }
    });
  }
</script>