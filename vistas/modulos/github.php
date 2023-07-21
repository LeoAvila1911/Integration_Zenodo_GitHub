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

      Crear venta

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Crear venta</li>

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

          <form role="form" method="post" class="formularioVenta">

            <div class="box-body">

              <div class="box">

                <!--=====================================
                NOMBRE COMMIT
                ======================================-->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <input type="text" class="form-control" id="commit" value="">


                  </div>



                </div>

                <!--=====================================
                VERSION TAG
                ======================================-->

                <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control" id="tag" value="">
                </div>

                </div>

                <!--=====================================
                NOMBRE TAG
                ======================================-->

                <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control" id="nomtag" value="">
                </div>

                </div>

                <!--=====================================
                DESCRIPCION TAG
                ======================================-->

                <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control" id="tag" value="">

                </div>

                </div>

                <input type="hidden" id="listaProductos" name="listaProductos">

                <!--=====================================
                TOKEN ACCESS
                ======================================-->

                <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control" id="tag" value="">

                </div>

                </div>
                <hr>

                <!--=====================================
                ENTRADA MÉTODO DE PAGO
                ======================================-->



                <br>

              </div>

          </div>



        </form>
        


        </div>

      </div>

      <!--=====================================
      LA TABLA DE PRODUCTOS
      ======================================-->

    </div>
    <div class="box-footer">


    </div>