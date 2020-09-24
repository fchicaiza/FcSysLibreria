            <?php include '../vistas/header.php'; ?>        

 <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          
                        <h1 class="box-title">Libros</h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->

                    <div class="panel-body" style="height: 700px;" id="formregistros">
                        <form name="form" id="form" method="POST">

                            <input type="hidden" class="form-control" name="id" id="id" maxlength="50" readonly="readonly" required>
                      
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>ISBN:</label>
                            <input type="text" class="form-control" name="isbn" id="isbn" maxlength="256" placeholder="ISBN">
                          </div>
                            
                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Título:</label>
                            <input type="text" class="form-control" name="titulo" id="titulo" maxlength="256" placeholder="Título">
                          </div>
                            
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Publicación:</label>
                            <input type="date" class="form-control" name="publicacion" id="publicacion" maxlength="256" placeholder="Publicación">
                          </div>
                            
                         <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Edición:</label>
                            <input type="number" class="form-control" name="edicion" id="edicion" maxlength="256" placeholder="Edición">
                          </div>
                            
                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Cantidad:</label>
                            <input type="number" class="form-control" name="cantidad" id="cantidad" maxlength="256" placeholder="Cantidad">
                          </div>
                            
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Precio:</label>
                            <input type="number" class="form-control" name="precio" id="precio" maxlength="256" placeholder="Precio">
                          </div>
                            
                       <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Categoría</label>
                              <input class="form-control"  name="categoria"  id="categoria" maxlength="256" placeholder="Categoria">
                             
                          </div>

                            
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Editorial</label>
                              <input class="form-control"  name="editorial"  id="editorial" maxlength="256" placeholder="editotial"">
                             
                          </div>
                            
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Autor </label>
                              <input class="form-control"  name="autor"  id="autor" maxlength="256" >
                          </div>
                            
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Tipo de autor</label>
                              <input class="form-control"  name="tipo"  id="tipo" maxlength="256">
                          </div>
                 <button class="btn btn-success" type="submit"  id="btnGuardar"><i class="fa fa-check"></i> Agregar</button>
                   <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
       
                          </div>                         
                        </form>                           
                        </div>
                 <div  id="listaregistros" class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">

                              <div class="Container">
                                  <div class="row">
                                      
                                
                                   <div id="tabaut"> </div>
                              </div>
                           </div>
                          </div>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
require 'footer.php';
?>
  
  <script type="text/javascript" src="scripts/libro.js"></script>
   <script type="text/javascript" src="scripts/combo.js"></script>