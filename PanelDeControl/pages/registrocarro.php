	
<?php

		 require ('validarnum.php');

$fecha2=date("Y-m-d");  	

if (isset($_GET['nuevo'])) { 

                        if (isset($_POST['lugarguardar'])) {
                           





$placa=strtoupper($_POST["placa"]);
$marca=strtoupper($_POST["marca"]);
$color=strtoupper($_POST["color"]);
$tipo=strtoupper($_POST["tipo"]);

                       




$sql="select * from `carro` where placa='$placa'";

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
                                        <b>Alerta no se registro este carro </b> Ya Existe... ';



                               echo '   </div>';
}else{

$sql = "INSERT INTO `carro` (`placa`, `marca`, `color`, `tipo`) VALUES ('$placa', '$marca', '$color', '$tipo')";

                            
                          $cs=$bd->consulta($sql);  
                         // $cs=mysql_query($sql,$cn);

                           


            

                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Datos Guardados Correctamente... ';



echo "
placa: $placa

";
                               echo '   </div>';
                           
							
                        }



}
?>
  <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Transporte</h3>
                                </div>
                                
                            
                                <!-- form start -->
                                <form role="form"  name="fe" action="?mod=registrocarro&nuevo=nuevo" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            
                                             <label for="exampleInputFile">Placa</label>
                                            <input  required type="tex" name="placa" class="form-control" value="<?php echo $var3 ?>" id="exampleInputEmail1" placeholder="placa del carro">
                                            
                                            <label for="exampleInputFile">Marca</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" required type="tex" name="marca" class="form-control" value="<?php echo $var2 ?>" id="exampleInputEmail1" placeholder="Marca del carro">
                                            <label for="exampleInputFile">Color</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" required type="tex" name="color" class="form-control" value="<?php echo $var3 ?>" id="exampleInputEmail1" placeholder="color del carro">
                                             <label for="exampleInputFile">Tipo</label>
                                            <input  required type="tex" name="tipo" class="form-control" value="<?php echo $var3 ?>" id="exampleInputEmail1" placeholder="tipo de carro">
                                            
                                           
                                            
  
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
                                    <h3 class="box-title">Lista Carros:</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Placa</th>
                                                <th>Marca</th>
                                                <th>Color</th>
                                                <th>Tipo</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if($tipo2==1){
                                        
                                        $consulta="SELECT placa,marca,color,tipo,id_carro FROM carro ORDER BY placa ASC ";
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
                                                           
                                                              $fila[placa]
                                                            
                                                        </td>
                                                        <td> $fila[marca]                                                        </td>
                                                        <td>
                                                            $fila[color]
                                                        </td>
                                                         <td>
                                                            $fila[tipo]
                                                        </td>
                                                         <td><center>
                                                            <a  href=?mod=registrocarro&editar&codigo=".$fila["id_carro"]."><img src='./img/consul.png' width='25' alt='Edicion' title=' CONSULTAR ".$fila["placa"]."'></a>";
      
                                echo "
      
      <a  href=?mod=registrocarro&editar&codigo=".$fila["id_carro"]."><img src='./img/editar.png' width='25' alt='Edicion' title='EDITAR LOS DATOS DE ".$fila["placa"]."'></a> 
      <a   href=?mod=registrocarro&eliminar&codigo=".$fila["id_carro"]."><img src='./img/elimina.png'  width='25' alt='Edicion' title='ELIMINAR A   ".$fila["placa"]."'></a>
      ";}
      echo "
      
    
      
     </center>
                                                        </td>
                                                    </tr>";
                                        
                                        }
                                        
                                        
                                        else {
                                        
                                           $consulta="SELECT placa,marca,color,tipo,id_carro FROM carro ORDER BY placa ASC ";
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
                                                           
                                                              $fila[placa]
                                                            
                                                        </td>
                                                        <td> $fila[marca]                                                        </td>
                                                        <td>
                                                            $fila[color]
                                                        </td>
                                                         <td>
                                                            $fila[tipo]
                                                        </td>
                                                         <td>
                                                            <a  href=prestacion2.php?codigo=".$fila["placa"]."><img src='./img/consul.png' width='25' alt='Edicion' title=' CONSULTAR ".$fila["marca"]."'></a>";
      
                             
      echo "
      
      <a target='_blank'  href=./pdf/.php?codigo=".$fila["placa"]."><img src='./img/impresora.png'  width='25' alt='Edicion' title='Imprimir reporte de prestaciones de  ".$fila["marca"]."'></a>
      
     
                                                        </td>
                                                    </tr>";
                                        }
                                        
                                        } ?>                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>Placa</th>
                                                <th>Marca</th>
                                                <th>Color</th>
                                                <th>Tipo</th>
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
                                    <h3> <center>Agregar Carros <a href="#" class="alert-link">Nuevos</a></center></h3>                                    
                                </div>
                        <center>        
                            <form  name="fe" action="?mod=registrocarro&nuevo" method="post" id="ContactForm">
    


 <input title="AGREGAR UN NUEVO CARRO" name="btn1"  class="btn btn-primary"type="submit" value="Agregar Nuevo">

    
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
                                   <h3> <center>Imprimir Lista De Carros</a></center></h3>                                    
                                </div>
                                
                                
                                 <a target='_blank'  href=./pdf/listacarros.php><img src='./img/impresora.png'  width='50' alt='Edicion' title='Imprimir lista de Registro De carros'></a>
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
                           





$placa=strtoupper($_POST["placa"]);
$marca=strtoupper($_POST["marca"]);
$color=strtoupper($_POST["color"]);
$tipo=strtoupper($_POST["tipo"]);


                       
if( $placa=="" )
                {
                
                    echo "
   <script> alert('campos vacios')</script>
   ";
                    echo "<br>";
                    
                }
        else
           {
$sql=" UPDATE carro SET 
placa='$placa' ,
marca='$marca' ,
color='$color' ,
tipo='$tipo'  
 where id_carro='$x1'";


$bd->consulta($sql);
                          

   
                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Datos Editados Correctamente... ';



echo "
placa: '$placa',
marca='$marca' ,
color='$color' ,
tipo='$tipo',

id_carro='$x1'
";
                               echo '   </div>';
                           
                            
                        



}
   
}


                                        
     $consulta="SELECT placa,marca,color,tipo FROM carro where id_carro='$x1'";
     $bd->consulta($consulta);
     while ($fila=$bd->mostrar_registros()) {



?>
  <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Editar Carros</h3>
                                </div>
                                
                            
        <?php  echo '  <form role="form"  name="fe" action="?mod=registrocarro&editar=editar&codigo='.$x1.'" method="post">';
        ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            
                                            
                                            <label for="exampleInputFile">Placa</label>
                                            <input  required type="tex" name="placa" class="form-control" value="<?php echo $fila[placa] ?>" id="exampleInputEmail1" placeholder="placa del carro">
                                             <label for="exampleInputFile">Marca</label>
                                            <input  required type="tex" name="marca" class="form-control" value="<?php echo $fila[marca] ?>" id="exampleInputEmail1" placeholder="marca del carro">
                                            <label for="exampleInputFile">Color</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" required type="tex" name="color" class="form-control" value="<?php echo  $fila[color] ?>" id="exampleInputEmail1" placeholder="Color del carro">
                                            <label for="exampleInputFile">Tipo</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" required type="tex" name="tipo" class="form-control" value="<?php echo  $fila[tipo] ?>" id="exampleInputEmail1" placeholder="Tipo de carro">
                                            

                                            
                                                                                    
                                            
  
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
                           


$placa=strtoupper($_POST["placa"]);
$marca=strtoupper($_POST["marca"]);
$color=strtoupper($_POST["color"]);
$tipo=strtoupper($_POST["tipo"]);

                       
if( $placa=="" )
                {
                
                    echo "
   <script> alert('campos vacios')</script>
   ";
                    echo "<br>";
                    
                }
        else
           {







$sql="delete from carro where id_carro='$x1' ";


$bd->consulta($sql);
                          

   
                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Se Elimino Correctamente... ';



echo "
placa: '$placa',
marca='$marca' ,
color='$color' ,
tipo='$tipo',
id_carro='$x1'
";
                               echo '   </div>';
                           
                            
                        



}
   
}


                                        
     $consulta="SELECT placa,marca,color,tipo FROM carro where id_carro='$x1'";
     $bd->consulta($consulta);
     while ($fila=$bd->mostrar_registros()) {



?>
  <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Eliminar Carro</h3>
                                </div>
                                
                            
        <?php  echo '  <form role="form"  name="fe" action="?mod=registrocarro&eliminar=eliminar&codigo='.$x1.'" method="post">';
        ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            
                                            
                                            
                                            <label for="exampleInputFile">Placa</label>
                                            <input  required type="tex" name="placa" class="form-control" value="<?php echo $fila[placa] ?>" id="exampleInputEmail1" placeholder="placa del carro">
                                             <label for="exampleInputFile">Marca</label>
                                            <input  required type="tex" name="marca" class="form-control" value="<?php echo $fila[marca] ?>" id="exampleInputEmail1" placeholder="marca del carro">
                                            <label for="exampleInputFile">Color</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" required type="tex" name="color" class="form-control" value="<?php echo  $fila[color] ?>" id="exampleInputEmail1" placeholder="Color del carro">
                                            <label for="exampleInputFile">Tipo</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" required type="tex" name="tipo" class="form-control" value="<?php echo  $fila[tipo] ?>" id="exampleInputEmail1" placeholder="Tipo de carro">
                                            

                                            
                                           
                                            
  
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