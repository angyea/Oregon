    
<?php

         require ('validarnum.php');

$fecha2=date("Y-m-d");      

if (isset($_GET['nuevo'])) { 

                        if (isset($_POST['lugarguardar'])) {
                           





$nombre=strtoupper($_POST["nombre"]);
$apellido=strtoupper($_POST["apellido"]);
$dni=strtoupper($_POST["dni"]);
$categoria=strtoupper($_POST["categoria"]);
$numero=strtoupper($_POST["numero"]);
$direccion=strtoupper($_POST["direccion"]);
$telefono=strtoupper($_POST["telefono"]);
$fechai=$fecha2;
                       




$sql="select * from `chofer` where dni='$dni'";

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

$sql = "INSERT INTO `chofer` (`nombre`,`apellido`,`dni`,`categoria`, `numero`, `direccion`, `telefono`) VALUES ('$nombre', '$apellido','$dni','$categoria',$numero, '$direccion', '$telefono')";

                            
                          $cs=$bd->consulta($sql);  
                         // $cs=mysql_query($sql,$cn);

                           


            

                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Datos Guardados Correctamente... ';



echo "
nombre: $nombre

";
                               echo '   </div>';
                           
                            
                        }



}
?>
  <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Chofer</h3>
                                </div>
                                
                            
                                <!-- form start -->
                                <form role="form"  name="fe" action="?mod=registrochofer&nuevo=nuevo" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            
                                            
                                            
                                            <label for="exampleInputFile">Nombre</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" required type="tex" name="nombre" class="form-control" value="<?php echo $var2 ?>" id="exampleInputEmail1" placeholder="Intoducir el Nombre">
                                            <label for="exampleInputFile">Apellido</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" required type="tex" name="apellido" class="form-control" value="<?php echo $var3 ?>" id="exampleInputEmail1" placeholder="Apellido">
                                            <label for="exampleInputFile">Dni</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="dni" class="form-control" value="<?php echo $var1 ?>" id="exampleInputEmail1" placeholder="dni">
                                            <label for="exampleInputFile">Categoria de Licencia</label>
                                            <input  required type="tex" name="categoria" class="form-control" value="<?php echo $var3 ?>" id="exampleInputEmail1" placeholder="categoria">
                                            <label for="exampleInputFile">Numero de Licencia</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="numero" class="form-control" value="<?php echo $var1 ?>" id="exampleInputEmail1" placeholder="numero">
                                            <label for="exampleInputFile">Direccion</label>
                                            <input  required type="tex" name="direccion" class="form-control" value="<?php echo $var3 ?>" id="exampleInputEmail1" placeholder="direccion">   
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
                                    <h3 class="box-title">Lista Choferes:</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Dni</th>
                                                <th>Cat. Licencia</th>
                                                <th>NºLicencia</th>
                                                <th>Direccion</th>
                                                <th>Telefono</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if($tipo2==1){
                                        
                                        $consulta="SELECT nombre, apellido,dni,categoria,numero,direccion,telefono,id_chofer FROM chofer ORDER BY dni ASC ";
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
                                                           
                                                              $fila[nombre]
                                                            
                                                        </td>
                                                        <td> $fila[apellido]                                                        </td>
                                                        <td>
                                                            $fila[dni]
                                                        </td>
                                                        <td>
                                                            $fila[categoria]
                                                        </td>
                                                        <td>
                                                            $fila[numero]
                                                        </td>
                                                        <td>
                                                            $fila[direccion]
                                                        </td>
                                                         <td>
                                                            $fila[telefono]
                                                        </td>
                                                         <td><center>
                                                            <a  href=?mod=registrochofer&editar&codigo=".$fila["id_chofer"]."><img src='./img/consul.png' width='25' alt='Edicion' title=' CONSULTAR ".$fila["nombre"]."'></a>";
      
                                echo "
      
      <a  href=?mod=registrochofer&editar&codigo=".$fila["id_chofer"]."><img src='./img/editar.png' width='25' alt='Edicion' title='EDITAR LOS DATOS DE ".$fila["nombre"]."'></a> 
      <a   href=?mod=registrochofer&eliminar&codigo=".$fila["id_chofer"]."><img src='./img/elimina.png'  width='25' alt='Edicion' title='ELIMINAR A   ".$fila["nombre"]."'></a>
      ";}
      echo "
      
    
      
     </center>
                                                        </td>
                                                    </tr>";
                                        
                                        }
                                        
                                        
                                        else {
                                        
                                           $consulta="SELECT nombre, apellido,dni,categoria,numero,direccion,telefono,id_chofer FROM chofer ORDER BY dni ASC ";
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
                                                           
                                                              $fila[nombre]
                                                            
                                                        </td>
                                                        <td> $fila[apellido]                                                        </td>
                                                        <td>
                                                            $fila[dni]
                                                        </td>
                                                        <td>
                                                            $fila[categoria]
                                                        </td>
                                                        <td>
                                                            $fila[numero]
                                                        </td>
                                                        <td>
                                                            $fila[direccion]
                                                        </td>
                                                         <td>
                                                            $fila[telefono]
                                                        </td>
                                                         <td>
                                                            <a  href=prestacion2.php?codigo=".$fila["dni"]."><img src='./img/consul.png' width='25' alt='Edicion' title=' CONSULTAR ".$fila["nombre"]."'></a>";
      
                             
      echo "
      
      <a target='_blank'  href=./pdf/.php?codigo=".$fila["dni"]."><img src='./img/impresora.png'  width='25' alt='Edicion' title='Imprimir reporte de prestaciones de  ".$fila["nombre"]."'></a>
      
     
                                                        </td>
                                                    </tr>";
                                        }
                                        
                                        } ?>                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Dni</th>
                                                <th>Cate. Licencia</th>
                                                <th>Nº Licencia</th>
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
                                    <h3> <center>Agregar Chofer <a href="#" class="alert-link">Nuevos</a></center></h3>                                    
                                </div>
                        <center>        
                            <form  name="fe" action="?mod=registrochofer&nuevo" method="post" id="ContactForm">
    


 <input title="AGREGAR UN NUEVO CHOFER" name="btn1"  class="btn btn-primary"type="submit" value="Agregar Nuevo">

    
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
                                   <h3> <center>Imprimir Lista De Choferes</a></center></h3>                                    
                                </div>
                                
                                
                                 <a target='_blank'  href=./pdf/listachoferes.php><img src='./img/impresora.png'  width='50' alt='Edicion' title='Imprimir lista de Registro De choferes'></a>
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
                           





$nombre=strtoupper($_POST["nombre"]);
$apellido=strtoupper($_POST["apellido"]);
$dni=strtoupper($_POST["dni"]);
$categoria=strtoupper($_POST["categoria"]);
$numero=strtoupper($_POST["numero"]);
$direccion=strtoupper($_POST["direccion"]);
$telefono=strtoupper($_POST["telefono"]);


                       
if( $nombre=="" )
                {
                
                    echo "
   <script> alert('campos vacios')</script>
   ";
                    echo "<br>";
                    
                }
        else
           {
$sql=" UPDATE chofer SET 
nombre='$nombre' ,
apellido='$apellido' ,
dni='$dni' ,
numero='$numero',
telefono='$telefono' ,
direccion='$direccion' ,
categoria='$categoria' 
 where id_chofer='$x1'";


$bd->consulta($sql);
                          

   
                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Datos Editados Correctamente... ';



echo "
Nombre: '$nombre',
apellido='$apellido' ,
dni='$dni' ,
categoria='$categoria',
telefono='$telefono',
direccion='$direccion',
numero='$numero',
id_chofer='$x1'
";
                               echo '   </div>';
                           
                            
                        



}
   
}


                                        
     $consulta="SELECT nombre, apellido,dni,categoria,numero,direccion,telefono FROM chofer where id_chofer='$x1'";
     $bd->consulta($consulta);
     while ($fila=$bd->mostrar_registros()) {



?>
  <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Editar Chofer</h3>
                                </div>
                                
                            
        <?php  echo '  <form role="form"  name="fe" action="?mod=registrochofer&editar=editar&codigo='.$x1.'" method="post">';
        ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            
                                            
                                            
                                            <label for="exampleInputFile">Nombre</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" required type="tex" name="nombre" class="form-control" value="<?php echo  $fila[nombre] ?>" id="exampleInputEmail1" placeholder="Intoducir el Nombre">
                                            <label for="exampleInputFile">Apellido</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" required type="tex" name="apellido" class="form-control" value="<?php echo  $fila[apellido] ?>" id="exampleInputEmail1" placeholder="Apellido">
                                            <label for="exampleInputFile">Dni</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="dni" class="form-control" value="<?php echo $fila[dni] ?>" id="exampleInputEmail1" placeholder="Dni">
                                            <label for="exampleInputFile">Categoria</label>
                                            <input  required type="tex" name="categoria" class="form-control" value="<?php echo $fila[categoria] ?>" id="exampleInputEmail1" placeholder="categoria">
                                            <label for="exampleInputFile">Nº Licencia</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="numero" class="form-control" value="<?php echo $fila[numero] ?>" id="exampleInputEmail1" placeholder="numero de licencia">
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
                           


$nombre=strtoupper($_POST["nombre"]);
$apellido=strtoupper($_POST["apellido"]);
$direccion=strtoupper($_POST["direccion"]);
$dni=strtoupper($_POST["dni"]);

                       
if( $nombre=="" )
                {
                
                    echo "
   <script> alert('campos vacios')</script>
   ";
                    echo "<br>";
                    
                }
        else
           {







$sql="delete from chofer where id_chofer='$x1' ";


$bd->consulta($sql);
                          

   
                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Se Elimino Correctamente... ';



echo "
Nombre: '$nombre',
apellido='$apellido' ,
dni='$dni' ,
direccion='$direccion',
id_chofer='$x1'
";
                               echo '   </div>';
                           
                            
                        



}
   
}


                                        
     $consulta="SELECT nombre, apellido,dni, direccion FROM chofer where id_chofer='$x1'";
     $bd->consulta($consulta);
     while ($fila=$bd->mostrar_registros()) {



?>
  <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Eliminar Chofer</h3>
                                </div>
                                
                            
        <?php  echo '  <form role="form"  name="fe" action="?mod=registrochofer&eliminar=eliminar&codigo='.$x1.'" method="post">';
        ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            
                                            
                                            
                                            <label for="exampleInputFile">Nombre</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" required type="tex" name="nombre" class="form-control" value="<?php echo  $fila[nombre] ?>" id="exampleInputEmail1" placeholder="Intoducir el Nombre">
                                            <label for="exampleInputFile">Apellido</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" required type="tex" name="apellido" class="form-control" value="<?php echo  $fila[apellido] ?>" id="exampleInputEmail1" placeholder="Apellido">
                                            <label for="exampleInputFile">Dni</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="dni" class="form-control" value="<?php echo $fila[dni] ?>" id="exampleInputEmail1" placeholder="Cedula">
                                            <label for="exampleInputFile">Direccion</label>
                                            <input  required type="tex" name="direccion" class="form-control" value="<?php echo $fila[direccion] ?>" id="exampleInputEmail1" placeholder="direccion">
                                            
                                           
                                            
  
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