	
<?php

		 require ('validarnum.php');

$fecha2=date("Y-m-d");  	

if (isset($_GET['nuevo'])) { 

                        if (isset($_POST['lugarguardar'])) {
                           

$codigo=strtoupper($_POST["codigo"]);
$descripcion=strtoupper($_POST["descripcion"]);
$fechas=strtoupper($_POST["fecha_salida"]);
$fechal=strtoupper($_POST["fecha_llegada"]);
$precio=strtoupper($_POST["precio"]);
$origen=strtoupper($_POST["origen"]);
$destino=strtoupper($_POST["destino"]);
$destinatario=strtoupper($_POST["destinatario"]);

                       
$sql="select * from `encomienda` where codigo='$codigo'";

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

$sql = "INSERT INTO `encomienda` (`codigo`, `descripcion`, `fecha_salida`, `fecha_llegada`, `precio`, `origen`, `destino`,`destinatario`) VALUES ('$codigo', '$descripcion', '$fechas', '$fechal', '$precio', '$origen', '$destino','destinatario')";

                            
                          $cs=$bd->consulta($sql);  
                         // $cs=mysql_query($sql,$cn);

                           


            

                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Datos Guardados Correctamente... ';



echo "
codigo: $codigo

";
                               echo '   </div>';
                           
							
                        }



}
?>
  <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Encomiendas</h3>
                                </div>
                                
                            
                                <!-- form start -->
                                <form role="form"  name="fe" action="?mod=registroenvio&nuevo=nuevo" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            
                                            <label for="exampleInputFile">Codigo</label>
                                            <input  required type="tex" name="codigo" class="form-control" value="<?php echo $var3 ?>" id="exampleInputEmail1" placeholder="codigo de encomienda">
                                            
                                            <label for="exampleInputFile">Descipcion</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" required type="tex" name="descripcion" class="form-control" value="<?php echo $var2 ?>" id="exampleInputEmail1" placeholder="Descripcion...">
                                            <label for="exampleInputFile">Fecha Salida</label>
                                            <input  required type="tex" name="fecha_salida" class="form-control" value="<?php echo $var3 ?>" id="exampleInputEmail1" placeholder="fecha de salida">
                                            <label for="exampleInputFile">Fecha Llegada</label>
                                            <input  required type="tex" name="fecha_llegada" class="form-control" value="<?php echo $var3 ?>" id="exampleInputEmail1" placeholder="fecha de llegada">
                                            <label for="exampleInputFile">Precio</label>
                                            <input  required type="tex" name="precio" class="form-control" value="<?php echo $var3 ?>" id="exampleInputEmail1" placeholder="precio de la encomienda">
                                             <label for="exampleInputFile">Origen</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" required type="tex" name="origen" class="form-control" value="<?php echo $var2 ?>" id="exampleInputEmail1" placeholder="Origen">
                                             <label for="exampleInputFile">Destino</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" required type="tex" name="destino" class="form-control" value="<?php echo $var2 ?>" id="exampleInputEmail1" placeholder="Destino">
                                             <label for="exampleInputFile">Destinatario</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" required type="tex" name="destinatario" class="form-control" value="<?php echo $var2 ?>" id="exampleInputEmail1" placeholder="Destinatario">


  
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
                                    <h3 class="box-title">Lista Encomiendas:</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Descipcion</th>
                                                <th>Fecha Salida</th>
                                                <th>Origen</th>
                                                <th>Destino</th>
                                                <th>Destinatario</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if($tipo2==1){
                                        
                                        $consulta="SELECT codigo,descripcion,fecha_salida,origen,destino,destinatario,id_encomienda FROM encomienda ORDER BY codigo ASC ";
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
                                                           
                                                              $fila[codigo]
                                                            
                                                        </td>
                                                        <td> $fila[descripcion]                                                        </td>
                                                        <td>
                                                            $fila[fecha_salida]
                                                        </td>
                                                        <td>
                                                            $fila[origen]
                                                        </td>
                                                        <td>
                                                            $fila[destino]
                                                        </td>
                                                         <td>
                                                            $fila[destinatario]
                                                        </td>
                                                         <td><center>
                                                            <a  href=?mod=registroenvio&editar&codigo=".$fila["id_encomienda"]."><img src='./img/consul.png' width='25' alt='Edicion' title=' CONSULTAR ".$fila["codigo"]."'></a>";
      
                                echo "
      
      <a  href=?mod=registroenvio&editar&codigo=".$fila["id_encomienda"]."><img src='./img/editar.png' width='25' alt='Edicion' title='EDITAR LOS DATOS DE ".$fila["codigo"]."'></a> 
      <a   href=?mod=registroenvio&eliminar&codigo=".$fila["id_encomienda"]."><img src='./img/elimina.png'  width='25' alt='Edicion' title='ELIMINAR A   ".$fila["codigo"]."'></a>
      ";}
      echo "
      
    
      
     </center>
                                                        </td>
                                                    </tr>";
                                        
                                        }
                                        
                                        
                                        else {
                                        
                                           $consulta="SELECT codigo,descripcion,fecha_salida,origen,destino,destinatario,id_encomienda FROM usuarios ORDER BY codigo ASC ";
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
                                                           
                                                              $fila[codigo]
                                                            
                                                        </td>
                                                        <td> $fila[descripcion]                                                        </td>
                                                        <td>
                                                            $fila[fecha_salida]
                                                        </td>
                                                        <td>
                                                            $fila[origen]
                                                        </td>
                                                        <td>
                                                            $fila[destino]
                                                        </td>
                                                         <td>
                                                            $fila[destinatario]
                                                        </td>
                                                         <td>
                                                            <a  href=prestacion2.php?codigo=".$fila["codigo"]."><img src='./img/consul.png' width='25' alt='Edicion' title=' CONSULTAR ".$fila["codigo"]."'></a>";
      
                             
      echo "
      
      <a target='_blank'  href=./pdf/.php?codigo=".$fila["codigo"]."><img src='./img/impresora.png'  width='25' alt='Edicion' title='Imprimir reporte de prestaciones de  ".$fila["codigo"]."'></a>
      
     
                                                        </td>
                                                    </tr>";
                                        }
                                        
                                        } ?>                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>Codigo</th>
                                                <th>Descipcion</th>
                                                <th>Fecha Salida</th>
                                                <th>Origen</th>
                                                <th>Destino</th>
                                                <th>Destinatario</th>
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
                                    <h3> <center>Agregar Envios <a href="#" class="alert-link">Nuevos</a></center></h3>                                    
                                </div>
                        <center>        
                            <form  name="fe" action="?mod=registroenvio&nuevo" method="post" id="ContactForm">
    


 <input title="AGREGAR UN NUEVO ENVIO" name="btn1"  class="btn btn-primary"type="submit" value="Agregar Nuevo">

    
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
                                   <h3> <center>Imprimir Lista De Envios</a></center></h3>                                    
                                </div>
                                
                                
                                 <a target='_blank'  href=./pdf/listaencomienda.php><img src='./img/impresora.png'  width='50' alt='Edicion' title='Imprimir lista de Registro De envios'></a>
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
                           





$codigo=strtoupper($_POST["codigo"]);
$descripcion=strtoupper($_POST["descripcion"]);
$fechas=strtoupper($_POST["fecha_salida"]);
$fechal=strtoupper($_POST["fecha_llegada"]);
$precio=strtoupper($_POST["precio"]);
$origen=strtoupper($_POST["origen"]);
$destino=strtoupper($_POST["destino"]);
$destinatario=strtoupper($_POST["destinatario"]);

                       
if( $codigo=="" )
                {
                
                    echo "
   <script> alert('campos vacios')</script>
   ";
                    echo "<br>";
                    
                }
        else
           {
$sql=" UPDATE encomienda SET 
codigo='$codigo' ,
descripcion='$descripcion' ,
fecha_salida='$fechas' ,
fecha_llegada='$fechal' ,
precio='$precio' ,
origen='$origen' ,
destino='$destino' ,
destinatario='$destinatario'
 where id_encomienda='$x1'";


$bd->consulta($sql);
                          

   
                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Datos Editados Correctamente... ';



echo "
codigo: '$codigo',
descripcion='$descripcion' ,
precio='$precio' ,
origen='$origen',
destino='$destino',
destinatario='$destinatario',
id_usuarios='$x1'
";
                               echo '   </div>';
                           
                            
                        



}
   
}


                                        
     $consulta="SELECT codigo,descripcion,fecha_salida,fecha_llegada,precio,origen,destino,destinatario FROM encomienda where id_encomienda='$x1'";
     $bd->consulta($consulta);
     while ($fila=$bd->mostrar_registros()) {



?>
  <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Editar Envios</h3>
                                </div>
                                
                            
        <?php  echo '  <form role="form"  name="fe" action="?mod=registroenvio&editar=editar&codigo='.$x1.'" method="post">';
        ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            
                                            <label for="exampleInputFile">Codigo</label>
                                            <input  required type="tex" name="codigo" class="form-control" value="<?php echo $fila[codigo] ?>" id="exampleInputEmail1" placeholder="codigo">
                                            
                                            <label for="exampleInputFile">Descripcion</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" required type="tex" name="descripcion" class="form-control" value="<?php echo  $fila[descripcion] ?>" id="exampleInputEmail1" placeholder="Descripcion">
                                            <label for="exampleInputFile">Fecha Salida</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" required type="tex" name="fecha_salida" class="form-control" value="<?php echo  $fila[fecha_salida] ?>" id="exampleInputEmail1" placeholder="Fecha Salida">
                                            <label for="exampleInputFile">Fecha Llegada</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" required type="tex" name="fecha_llegada" class="form-control" value="<?php echo  $fila[fecha_llegada] ?>" id="exampleInputEmail1" placeholder="Fecha Llegada">
                                            
                                            <label for="exampleInputFile">Precio</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="precio" class="form-control" value="<?php echo $fila[precio] ?>" id="exampleInputEmail1" placeholder="precio">      
                                             <label for="exampleInputFile">Origen</label>
                                            <input  required type="tex" name="origen" class="form-control" value="<?php echo $fila[origen] ?>" id="exampleInputEmail1" placeholder="origen">
                                            <label for="exampleInputFile">Destino</label>
                                            <input  required type="tex" name="destino" class="form-control" value="<?php echo $fila[destino] ?>" id="exampleInputEmail1" placeholder="destino">
                                            <label for="exampleInputFile">Destinatario</label>
                                            <input  required type="tex" name="destinatario" class="form-control" value="<?php echo $fila[destinatario] ?>" id="exampleInputEmail1" placeholder="destinatario">
                                            
                                            
                                           
                                            
  
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
                           


$codigo=strtoupper($_POST["codigo"]);
$fechas=strtoupper($_POST["fecha_salida"]);
$destino=strtoupper($_POST["destino"]);
$origen=strtoupper($_POST["origen"]);

                       
if( $codigo=="" )
                {
                
                    echo "
   <script> alert('campos vacios')</script>
   ";
                    echo "<br>";
                    
                }
        else
           {

$sql="delete from encomienda where id_encomienda='$x1' ";


$bd->consulta($sql);
                          

   
                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Se Elimino Correctamente... ';



echo "
codigo: '$codigo',
fecha_salida='$fechas' ,
destino='$destino' ,
origen='$origen',
id_encomienda='$x1'
";
                               echo '   </div>';
                           
}
   
}


                                        
     $consulta="SELECT codigo,fecha_salida,destino,origen FROM encomienda where id_encomienda='$x1'";
     $bd->consulta($consulta);
     while ($fila=$bd->mostrar_registros()) {



?>
  <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Eliminar Envios</h3>
                                </div>
                                
                            
        <?php  echo '  <form role="form"  name="fe" action="?mod=registro&eliminar=eliminar&codigo='.$x1.'" method="post">';
        ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            
                                            <label for="exampleInputFile">Codigo</label>
                                            <input  required type="tex" name="codigo" class="form-control" value="<?php echo $fila[codigo] ?>" id="exampleInputEmail1" placeholder="codigo">
                                            
                                            <label for="exampleInputFile">Fecha Salida</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" required type="tex" name="fecha_salida" class="form-control" value="<?php echo  $fila[fecha_salida] ?>" id="exampleInputEmail1" placeholder="Fecha Salida">
                                           <label for="exampleInputFile">Origen</label>
                                            <input  required type="tex" name="origen" class="form-control" value="<?php echo $fila[origen] ?>" id="exampleInputEmail1" placeholder="origen">
                                            <label for="exampleInputFile">Destino</label>
                                            <input  required type="tex" name="destino" class="form-control" value="<?php echo $fila[destino] ?>" id="exampleInputEmail1" placeholder="destino">
                                            
                                           
                                            
  
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