<!-- Conexion independiente para consultas asincronas de Jqueryy-->
<?php
$conexion = mysqli_connect("localhost", "root", "admin", "fc_bdd_libreria");
?>



<div class="container">
    <div class="row">

        <div class="col-sm-12" id="divtabla">
            
            <h3 class="form-group">Agregar Autor</h3>
            <table id="tblistado" class="table table-hover table-condensed table-striped">
                
              
                <tr>
                    <th> Libro  </th>
                    <th> Autor </th>
                    <th> Tipo de autor </th>
                    <th> Categoria</th>


                </tr>
                <?php
                $sql = "SELECT
  `fc_tbl_libro`.`tit_lib`,
  `fc_tbl_autor`.`nom_aut`,
  `fc_tbl_categoria`.`des_cat`,
  `fc_tbl_tipoautor`.`des_tau`,
  `fc_tbl_libro`.`id_lib`
FROM
  `fc_tbl_autor_libro`
  INNER JOIN `fc_tbl_libro`
    ON (
      `fc_tbl_autor_libro`.`id_lib_aul` = `fc_tbl_libro`.`id_lib`
    )
  INNER JOIN `fc_tbl_autor`
    ON (
      `fc_tbl_autor_libro`.`id_aut_aul` = `fc_tbl_autor`.`id_aut`
    )
  INNER JOIN `fc_tbl_categoria`
    ON (
      `fc_tbl_libro`.`id_cat_lib` = `fc_tbl_categoria`.`id_cat`
    )
  INNER JOIN `fc_tbl_tipoautor`
    ON (
      `fc_tbl_autor_libro`.`id_tau_aul` = `fc_tbl_tipoautor`.`id_tau`
    )
		
			Where id_lib = (SELECT MAX(id_lib)  FROM fc_tbl_libro);";
                $result = mysqli_query($conexion, $sql);
                while ($mostrar = mysqli_fetch_array($result)) {
                    
                    
                    
                    ?> 
                <input type="hidden" id="ide" value="<?php echo $mostrar['id_lib']?>"  >
                    <tr>
                        <td><?php echo $mostrar ['tit_lib'] ?> </td>
                        <td> <?php echo $mostrar ['nom_aut'] ?></td>
                        <td><?php echo $mostrar ['des_tau'] ?> </td>
                        <td> <?php echo $mostrar ['des_cat'] ?></td>

                    </tr>

                    <?php
                    
                }
                ?>
                    <tr>
                        <td>
                           <div class="row">


    <div class="col-sm-5">
        <select class="form-control" name="naut" id="naut">
            <option>Seleccionar Autor</option>
            <?php
            $consulta = "SELECT * FROM fc_tbl_autor";
            $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
            ?>

            <?php foreach ($ejecutar as $opciones): ?>
                <option value="<?php echo $opciones['id_aut']; ?>"><?php echo $opciones['nom_aut']; ?></option>>

            <?php endforeach; ?>

        </select>
    </div>

    <div class="col-sm-5">
        <select class="form-control" name="taut" id="taut">
            <option>Seleccionar el tipo de autor</option>
            <?php
            $consulta1 = "SELECT * FROM fc_tbl_tipoautor";
            $ejecutar1 = mysqli_query($conexion, $consulta1) or die(mysqli_error($conexion));
            ?>

            <?php foreach ($ejecutar1 as $opciones): ?>
                <option value="<?php echo $opciones['id_tau']; ?>"><?php echo $opciones['des_tau']; ?></option>>

            <?php endforeach; ?>

        </select>
    </div>


    <div class="col-sm-1">

        <button class="btn btn-success fa fa-plus" id="btnAdd" onclick="getData()" ></button>
    </div>
                               
     <div class="col-sm-1">

         <a class="btn btn-warning fa fa-check"  href="../vistas/libro.php" ></a>
    </div>

</div> 
                        </td>
                    </tr>

            </table>
        </div>

    </div>

</div>


<script src="scripts/insertData.js" type="text/javascript"></script>
<script src="scripts/libroData.js" type="text/javascript"></script> 

<script>
$(document).ready(function () {

        $('#btnGuardar').click(function () {
            $('#divtabla').load('tablaautores.php');
        });

    });
</script>

<script>

    $(document).ready(function () {

        $('#btnAdd').click(function () {
            $('#divtabla').load('tablaautores.php');
        });

    });
</script>
