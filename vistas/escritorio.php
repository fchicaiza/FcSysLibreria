<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (isset($_SESSION["id"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                   <br> <br>
                   <div class="col-sm-6"> 
                        <h1 style="text-align: justify">Sistema de biblioteca </h1>
                    <br>
                       <h4 style="text-align: justify"> Fernando Chicaiza González</h4>
                   <br>
                  
                    <h4 style="text-align: justify"> Trabajo de la materia PHP</h4>
                  </div>
                  
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
}

require 'footer.php';
?>

<?php 
ob_end_flush();
?>