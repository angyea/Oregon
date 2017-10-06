	
<?php

		 require ('validarnum.php');

$fecha2=date("Y-m-d");  	

if (isset($_GET['nuevo'])) { 

                        if (isset($_POST['lugarguardar'])) {
                           




$numero=strtoupper($_POST["numero"]);
$nombre=strtoupper($_POST["razon"]);
$direccion=strtoupper($_POST["direccion"]);
$telefono=strtoupper($_POST["telefono"]);
                       

$sql="select * from `oficina` where numero='$numero'";

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
                                        <b>Alerta no se registro esta oficina </b> Ya Existe... ';



                               echo '   </div>';
}else{

$sql = "INSERT INTO `oficina` (`numero`, `razon`, `direccion`, `telefono`) VALUES ('$numero', '$nombre', '$direccion', '$telefono')";

                            
                          $cs=$bd->consulta($sql);  
                         // $cs=mysql_query($sql,$cn);

                           


            

                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Datos Guardados Correctamente... ';



echo "
razon: $nombre

";
                               echo '   </div>';
                           
							
                        }



}
?>
  <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Oficinas</h3>
                                </div>
                                
                            
                                <!-- form start -->
                                <form role="form"  name="fe" action="?mod=registrooficina&nuevo=nuevo" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            
                                            
                                            
                                            <label for="exampleInputFile">Razon Social</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" required type="tex" name="razon" class="form-control" value="<?php echo $var2 ?>" id="exampleInputEmail1" placeholder="Intoducir Razon Social">
                                             <label for="exampleInputFile">Direccion</label>
                                            <input  required type="tex" name="direccion" class="form-control" value="<?php echo $var3 ?>" id="exampleInputEmail1" placeholder="direccion">
                                            <label for="exampleInputFile">Numero Oficina</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="numero" class="form-control" value="<?php echo $var1 ?>" id="exampleInputEmail1" placeholder="Numero de Oficina">
                                             <label for="exampleInputFile">telefono</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="telefono" class="form-control" value="<?php echo $var1 ?>" id="exampleInputEmail1" placeholder="telefono">
  
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
                                    <h3 class="box-title">Lista Oficina:</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Numero</th>
                                                <th>Razon Social</th>
                                                <th>Direccion</th>
                                                <th>Telefono</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if($tipo2==1){
                                        
                                        $consulta="SELECT numero, razon, direccion, telefono,id_oficina FROM oficina ORDER BY numero ASC ";
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
                                                        <td> $fila[razon]                                                        </td>
                                                        <td>
                                                            $fila[direccion]
                                                        </td>
                                                         <td>
                                                            $fila[telefono]
                                                        </td>
                                                         <td><center>
                                                            <a  href=?mod=registrooficina&editar&codigo=".$fila["id_oficina"]."><img src='./img/consul.png' width='25' alt='Edicion' title=' CONSULTAR ".$fila["razon"]."'></a>";
      
                                echo "
      
      <a  href=?mod=registrooficina&editar&codigo=".$fila["id_oficina"]."><img src='./img/editar.png' width='25' alt='Edicion' title='EDITAR LOS DATOS DE ".$fila["razon"]."'></a> 
      <a   href=?mod=registrooficina&eliminar&codigo=".$fila["id_oficina"]."><img src='./img/elimina.png'  width='25' alt='Edicion' title='ELIMINAR A   ".$fila["razon"]."'></a>
      ";}
      echo "
      
    
      
     </center>
                                                        </td>
                                                    </tr>";
                                        
                                        }
                                        
                                        
                                        else {
                                        
                                           $consulta="SELECT numero, razon, direccion, telefono,id_oficina FROM oficina ORDER BY numero ASC ";
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
                                                        <td> $fila[razon]                                                        </td>
                                                        <td>
                                                            $fila[direccion]
                                                        </td>
                                                         <td>
                                                            $fila[telefono]
                                                        </td>
                                                         <td>
                                                            <a  href=prestacion2.php?codigo=".$fila["numero"]."><img src='./img/consul.png' width='25' alt='Edicion' title=' CONSULTAR ".$fila["razon"]."'></a>";
      
                             
      echo "
      
      <a target='_blank'  href=./pdf/.php?codigo=".$fila["numero"]."><img src='./img/impresora.png'  width='25' alt='Edicion' title='Imprimir reporte de prestaciones de  ".$fila["razon"]."'></a>
      
     
                                                        </td>
                                                    </tr>";
                                        }
                                        
                                        } ?>                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>Numero</th>
                                                <th>Razon Social</th>
                                                <th>Direccion</th>
                                                <th>Telefono</th>
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
                                    <h3> <center>Agregar Oficina <a href="#" class="alert-link">Nueva</a></center></h3>                                    
                                </div>
                        <center>        
                            <form  name="fe" action="?mod=registrooficina&nuevo" method="post" id="ContactForm">
    


 <input title="AGREGAR NUEVA OFICINA" name="btn1"  class="btn btn-primary"type="submit" value="Agregar Nuevo">

    
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
                                   <h3> <center>Imprimir Lista De Oficinas</a></center></h3>                                    
                                </div>
                                
                                
                                 <a target='_blank'  href=./pdf/listaoficina.php><img src='./img/impresora.png'  width='50' alt='Edicion' title='Imprimir lista de Registro De Oficinas'></a>
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
                           




$numero=strtoupper($_POST["numero"]);
$direccion=strtoupper($_POST["direccion"]);
$razon=strtoupper($_POST["razon"]);
$telefono=strtoupper($_POST["telefono"]);




                       
if( $razon=="" )
                {
                
                    echo "
   <script> alert('campos vacios')</script>
   ";
                    echo "<br>";
                    
                }
        else
           {
$sql=" UPDATE oficina SET 
razon='$razon' , 
direccion='$direccion',
numero='$numero',
telefono='$telefono'
where id_oficina='$x1'";


$bd->consulta($sql);
                          

   
                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Datos Editados Correctamente... ';



echo "
razon: '$razon',
numero='$numero' ,
telefono='$telefono',
direccion='$direccion',
id_oficina='$x1'
";
                               echo '   </div>';
                           
                            
                        



}
   
}


                                        
     $consulta="SELECT numero, razon, direccion, telefono FROM oficina where id_oficina='$x1'";
     $bd->consulta($consulta);
     while ($fila=$bd->mostrar_registros()) {



?>
  <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Editar Oficinas</h3>
                                </div>
                                
                            
        <?php  echo '  <form role="form"  name="fe" action="?mod=registrooficina&editar=editar&codigo='.$x1.'" method="post">';
        ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            
                                            
                                            
                                            <label for="exampleInputFile">Razon Social</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" required type="tex" name="razon" class="form-control" value="<?php echo  $fila[razon] ?>" id="exampleInputEmail1" placeholder="Intoducir el Nombre">
                                            
                                            <label for="exampleInputFile">Numero</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="numero" class="form-control" value="<?php echo $fila[numero] ?>" id="exampleInputEmail1" placeholder="numero oficina">
                                            <label for="exampleInputFile">telefono</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="telefono" class="form-control" value="<?php echo $fila[telefono] ?>" id="exampleInputEmail1" placeholder="telefono">

                                             <label for="exampleInputFile">Direccion</label>
                                            <input  required type="tex" name="direccion" class="form-control" value="<?php echo $fila[direccion] ?>" id="exampleInputEmail1" placeholder="direccion">

                                            
                                            
                                           
                                            
  
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
                           


$razon=strtoupper($_POST["razon"]);
$direccion=strtoupper($_POST["direccion"]);
$telefono=strtoupper($_POST["telefono"]);
$numero=strtoupper($_POST["numero"]);

                       
if( $razon=="" )
                {
                
                    echo "
   <script> alert('campos vacios')</script>
   ";
                    echo "<br>";
                    
                }
        else
           {







$sql="delete from oficina where id_oficina='$x1' ";


$bd->consulta($sql);
                          

   
                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Se Elimino Correctamente... ';



echo "
razon: '$razon',
direccion='$direccion' ,
numero='$numero' ,
telefono='$telefono',
id_oficina='$x1'
";
                               echo '   </div>';
                           
                            
                        



}
   
}


                                        
     $consulta="SELECT numero, razon, direccion, telefono FROM oficina where id_oficina='$x1'";
     $bd->consulta($consulta);
     while ($fila=$bd->mostrar_registros()) {



?>
  <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Eliminar Oficina</h3>
                                </div>
                                
                            
        <?php  echo '  <form role="form"  name="fe" action="?mod=registrooficina&eliminar=eliminar&codigo='.$x1.'" method="post">';
        ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            
                                            
                                            
                                            <label for="exampleInputFile">Razon</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" required type="tex" name="razon" class="form-control" value="<?php echo  $fila[razon] ?>" id="exampleInputEmail1" placeholder="Intoducir el Nombre">
                                            <label for="exampleInputFile">Direccion</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" required type="tex" name="direccion" class="form-control" value="<?php echo  $fila[direccion] ?>" id="exampleInputEmail1" placeholder="Apellido">
                                            <label for="exampleInputFile">Numero</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="numero" class="form-control" value="<?php echo $fila[numero] ?>" id="exampleInputEmail1" placeholder="Cedula">
                                            <label for="exampleInputFile">Telefono</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="telefono" class="form-control" value="<?php echo $fila[telefono] ?>" id="exampleInputEmail1" placeholder="Telefono">
                                            
                                           
                                            
  
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
