	
<?php

		 require ('validarnum.php');

$fecha2=date("Y-m-d");  	

if (isset($_GET['nuevo'])) { 

                        if (isset($_POST['lugarguardar'])) {
                           





$cliente=strtoupper($_POST["cliente"]);
$encomienda=strtoupper($_POST["encomienda"]);

$numero=strtoupper($_POST["numero"]);
$precio=strtoupper($_POST["precio"]);
$cantidad=strtoupper($_POST["cantidad"]);

$fechai=$fecha2;
                       




$sql="select * from `factura` where numero='$ci'";

$cs=$bd->consulta($sql);

if($bd->numeroFilas($cs)!=0){

/*
$cs=mysql_query($sql,$cn);
while($resul=mysql_fetch_array($cs)){
	$var6=$resul[0];
}
//CONSULTAR SI EL CAMPO YA EXISTE
*/

	  echo '<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Alerta no se registro este usuario </b> Ya Existe... ';



                               echo '   </div>';
}else{

$sql = "INSERT INTO `factura` (`numero`, `fechai`,`cliente`,`encomienda`, `precio`,`cantidad`) VALUES ('$numero','$fechai', '$cliente', '$encomienda','$precio','$cantidad')";

                            
                          $cs=$bd->consulta($sql);  
                         // $cs=mysql_query($sql,$cn);

                           


            

                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Datos Guardados Correctamente... ';



echo "
Nombre: $cliente

";
                               echo '   </div>';
                           
							
                        }



}
?>
  <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Factura</h3>
                                </div>
                                
                            
                                <!-- form start -->
                                <form role="form"  name="fe" action="?mod=registrofactura&nuevo=nuevo" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            <label for="exampleInputFile">Nº Factura</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="numero" class="form-control" value="<?php echo $var1 ?>" id="exampleInputEmail1" placeholder="telefono">

                                            
                                            <label for="exampleInputFile">Cliente</label>
                                            <input  required type="tex" name="cliente" class="form-control" value="<?php echo $var3 ?>" id="exampleInputEmail1" placeholder="datos de cliente">
                                            
                                            <label for="exampleInputFile">Encomienda</label>
                                            <input  required type="tex" name="encomienda" class="form-control" value="<?php echo $var3 ?>" id="exampleInputEmail1" placeholder="datos de encomienda">

                                            
                                            <label for="exampleInputFile">Precio</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="precio" class="form-control" value="<?php echo $var1 ?>" id="exampleInputEmail1" placeholder="precio de encomienda">
                                             <label for="exampleInputFile">Cantidad</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="cantidad" class="form-control" value="<?php echo $var1 ?>" id="exampleInputEmail1" placeholder="cantidad de encomienda">

                                             
                                            
                                           
                                            
  
                                        </div>
                                       
                                     
                                        
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary btn-lg" name="lugarguardar" id="lugarguardar" value="Guardar">Agregar</button>
                                        
                                    
                                    </div>
                                </form>
                            </div><!-- /.box -->
<?php
}

	
   
   if (isset($_GET['lista'])) { 

    $x1=$_GET['codigo'];

                        if (isset($_POST['lista'])) {
                           



        

}
?>
  
                            
                    <div class="row">
                        <div class="col-xs-8">
                            
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Lista Facturas:</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nº Factura</th>
                                                <th>Cliente</th>
                                                <th>Encomienda</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if($tipo2==1){
                                        
                                        $consulta="SELECT numero,cliente,encomienda,precio,cantidad,id_factura FROM factura ORDER BY numero ASC ";
                                        $bd->consulta($consulta);
                                        while ($fila=$bd->mostrar_registros()) {
                                            switch ($fila['status']) {
                                                case 1:
                                                    $btn_st = "danger";
                                                    $txtFuncion = "Desactivar";
                                                    break;
                                                
                                                case 0:
                                                    $btn_st = "primary";
                                                    $txtFuncion = "Activar";
                                                    break;
                                            }
                                             //echo '<li data-icon="delete"><a href="?mod=lugares?edit='.$fila['id_tipo'].'"><img src="images/lugares/'.$fila['imagen'].'" height="350" >'.$fila['nombre'].'</a><a href="?mod=lugares?borrar='.$fila['id_tipo'].'" data-position-to="window" >Borrar</a></li>';
                                             echo "<tr>
                                                        <td>
                                                           
                                                              $fila[numero]
                                                            
                                                        </td>
                                                        <td> $fila[cliente]                                                        </td>
                                                        <td>
                                                            $fila[encomienda]
                                                        </td>
                                                         <td>
                                                            $fila[precio]
                                                        </td>
                                                        <td>
                                                            $fila[cantidad]
                                                        </td>
                                                         <td><center>
                                                            <a  href=?mod=registrofactura&editar&codigo=".$fila["id_factura"]."><img src='./img/consul.png' width='25' alt='Edicion' title=' CONSULTAR ".$fila["cliente"]."'></a>";
      
                                echo "
      
      <a  href=?mod=registrofactura&editar&codigo=".$fila["id_factura"]."><img src='./img/editar.png' width='25' alt='Edicion' title='EDITAR LOS DATOS DE ".$fila["cliente"]."'></a> 
      <a   href=?mod=registrofactura&eliminar&codigo=".$fila["id_factura"]."><img src='./img/elimina.png'  width='25' alt='Edicion' title='ELIMINAR A   ".$fila["cliente"]."'></a>
      ";}
      echo "
      
    
      
     </center>
                                                        </td>
                                                    </tr>";
                                        
                                        }
                                        
                                        
                                        else {
                                        
                                           $consulta="SELECT numero,cliente,encomienda,precio,cantidad,id_factura FROM factura ORDER BY numero ASC ";
                                        $bd->consulta($consulta);
                                        while ($fila=$bd->mostrar_registros()) {
                                            switch ($fila['status']) {
                                                case 1:
                                                    $btn_st = "danger";
                                                    $txtFuncion = "Desactivar";
                                                    break;
                                                
                                                case 0:
                                                    $btn_st = "primary";
                                                    $txtFuncion = "Activar";
                                                    break;
                                            }
                                             //echo '<li data-icon="delete"><a href="?mod=lugares?edit='.$fila['id_tipo'].'"><img src="images/lugares/'.$fila['imagen'].'" height="350" >'.$fila['nombre'].'</a><a href="?mod=lugares?borrar='.$fila['id_tipo'].'" data-position-to="window" >Borrar</a></li>';
                                             echo "<tr>
                                                        <td>
                                                           
                                                              $fila[numero]
                                                            
                                                        </td>
                                                        <td> $fila[cliente]                                                        </td>
                                                        <td>
                                                            $fila[encomienda]
                                                        </td>
                                                         <td>
                                                            $fila[precio]
                                                        </td>
                                                        <td>
                                                            $fila[cantidad]
                                                        </td>
                                                         <td>
                                                            <a  href=prestacion2.php?codigo=".$fila["numero"]."><img src='./img/consul.png' width='25' alt='Edicion' title=' CONSULTAR ".$fila["cliente"]."'></a>";
      
                             
      echo "
      
      <a target='_blank'  href=./pdf/.php?codigo=".$fila["numero"]."><img src='./img/impresora.png'  width='25' alt='Edicion' title='Imprimir reporte de prestaciones de  ".$fila["cliente"]."'></a>
      
     
                                                        </td>
                                                    </tr>";
                                        }
                                        
                                        } ?>                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>Nº Factura</th>
                                                <th>Cliente</th>
                                                <th>Encomienda</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
                                                <th>Acción</th>
                                                <th>Acción</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    
              

                          
                            <?php
 if($tipo2==1){
                                echo '
  <div class="col-md-3">
  <div class="box">
                                <div class="box-header">
                                <div class="box-header">
                                    <h3> <center>Agregar Facturas <a href="#" class="alert-link">Nuevas</a></center></h3>                                    
                                </div>
                        <center>        
                            <form  name="fe" action="?mod=registrofactura&nuevo" method="post" id="ContactForm">
    


 <input title="AGREGAR UN NUEVA FACTURA" name="btn1"  class="btn btn-primary"type="submit" value="Agregar Nuevo">

    
  </form>
  </center>
                                </div>
                            </div>
                            </div>  '; } ?>
                        </br>       
                                
  <div class="col-md-3">
  <div class="box">
                                <div class="box-header">
                                <center>
                                <div class="box-header">
                                   <h3> <center>Imprimir Lista De Facturas</a></center></h3>                                    
                                </div>
                                
                                
                                 <a target='_blank'  href=./pdf/listafacturas.php><img src='./img/impresora.png'  width='50' alt='Edicion' title='Imprimir lista de Registro De facturas'></a>
                                </center>
                                </div>
                                </div>
                                </div>

<?php
}

     

     if (isset($_GET['editar'])) { 

//codigo que viene de la lista
$x1=$_GET['codigo'];
                        if (isset($_POST['editar'])) {
                           





$cliente=strtoupper($_POST["cliente"]);
$encomienda=strtoupper($_POST["encomienda"]);
$precio=strtoupper($_POST["precio"]);
$numero=strtoupper($_POST["numero"]);
$cantidad=strtoupper($_POST["cantidad"]);


                       
if( $cliente=="" )
                {
                
                    echo "
   <script> alert('campos vacios')</script>
   ";
                    echo "<br>";
                    
                }
        else
           {
$sql=" UPDATE factura SET 
cliente='$cliente' ,
encomienda='$encomienda' ,
numero='$numero' ,
precio='$precio' ,
cantidad='$cantidad' ,
 where id_factura='$x1'";


$bd->consulta($sql);
                          

   
                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Datos Editados Correctamente... ';



echo "
cliente: '$cliente'

";
                               echo '   </div>';
                           
                            
                        



}
   
}


                                        
     $consulta="SELECT numero, cliente,encomienda,precio,cantidad FROM factura where id_factura='$x1'";
     $bd->consulta($consulta);
     while ($fila=$bd->mostrar_registros()) {



?>
  <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Editar Factura</h3>
                                </div>
                                
                            
        <?php  echo '  <form role="form"  name="fe" action="?mod=registrofactura&editar=editar&codigo='.$x1.'" method="post">';
        ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            <label for="exampleInputFile">Nº Factura</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="numero" class="form-control" value="<?php echo $fila[numero] ?>" id="exampleInputEmail1" placeholder="telefono">
                                            
                                            <label for="exampleInputFile">Cliente</label>
                                            <input  required type="tex" name="cliente" class="form-control" value="<?php echo $fila[cliente] ?>" id="exampleInputEmail1" placeholder="direccion">

                                            <label for="exampleInputFile">Encomienda</label>
                                            <input  required type="tex" name="encomienda" class="form-control" value="<?php echo $fila[encomienda] ?>" id="exampleInputEmail1" placeholder="codigo de encomienda">

                                            
                                            <label for="exampleInputFile">Precio</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="precio" class="form-control" value="<?php echo $fila[precio] ?>" id="exampleInputEmail1" placeholder="precio de encomienda">
    										<label for="exampleInputFile">Cantidad</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="telefono" class="form-control" value="<?php echo $fila[cantidad] ?>" id="exampleInputEmail1" placeholder="cantidad">

                                           
                                            
                                           
                                            
  
                                        </div>
                                       
                                     
                                        
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary btn-lg" name="editar" id="editar" value="Editar">Editar</button>
                                        
                                    
                                    </div>
                                </form>
                            </div><!-- /.box -->
<?php


}
}

 //eliminar

     if (isset($_GET['eliminar'])) { 

//codigo que viene de la lista
$x1=$_GET['codigo'];
                        if (isset($_POST['eliminar'])) {
                           


$numero=strtoupper($_POST["numero"]);
$cliente=strtoupper($_POST["cliente"]);
$encomienda=strtoupper($_POST["encomienda"]);


                       
if( $cliente=="" )
                {
                
                    echo "
   <script> alert('campos vacios')</script>
   ";
                    echo "<br>";
                    
                }
        else
           {







$sql="delete from factura where id_factura='$x1' ";


$bd->consulta($sql);
                          

   
                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Se Elimino Correctamente... ';



echo "
Nombre: '$cliente'
";
                               echo '   </div>';
                           
                            
                        



}
   
}


                                        
     $consulta="SELECT numero,cliente,encomienda FROM factura where id_factura='$x1'";
     $bd->consulta($consulta);
     while ($fila=$bd->mostrar_registros()) {



?>
  <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Eliminar Factura</h3>
                                </div>
                                
                            
        <?php  echo '  <form role="form"  name="fe" action="?mod=registrofactura&eliminar=eliminar&codigo='.$x1.'" method="post">';
        ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            
                                            
                                            
                                            <label for="exampleInputFile">Nº Factura</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="numero" class="form-control" value="<?php echo $fila[numero] ?>" id="exampleInputEmail1" placeholder="numero factura">
                                            
                                            <label for="exampleInputFile">Cliente</label>
                                            <input  required type="tex" name="cliente" class="form-control" value="<?php echo $fila[cliente] ?>" id="exampleInputEmail1" placeholder="direccion">

                                            <label for="exampleInputFile">Encomienda</label>
                                            <input  required type="tex" name="encomienda" class="form-control" value="<?php echo $fila[encomienda] ?>" id="exampleInputEmail1" placeholder="codigo de encomienda">
                                            
                                           
                                            
  
                                        </div>
                                       
                                     
                                        
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <input type=submit  class="btn btn-primary btn-lg" name="eliminar" id="eliminar" value="ELIMINAR">
                                        
                                    
 

                                    </div>
                                </form>
                            </div><!-- /.box -->
<?php


}




}
?>