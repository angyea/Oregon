<div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/none.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hola, <?php echo $_SESSION['dondequeda_nombre']; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i>Conectado</a>
                        </div>
                    </div>
                    <!-- search form 
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Buscar..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>-->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="?mod=index" data-ajax="false">
                                <i class="fa fa-home"></i> <span>Casa</span>
                            </a>
                        </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-group"></i>
                                    <span>Clientes</span>
                                    <i class="  fa fa-unsorted"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <?php 
                        if($tipo2==1){ ?>
                                <li><a href="?mod=registro&nuevo"><i class="glyphicon glyphicon-floppy-open"></i>Registrar Cliente</a> </li>
                        <?php } ?>
                                    <li><a href="?mod=registro&lista=lista"><i class="glyphicon glyphicon-list"></i>Lista De Clientes </a> </li>
                                    
                                    <li><a href="?mod=registro&lista=lista"><i class="glyphicon glyphicon-wrench"></i>Opciones</a> </li>
                                  
                                </ul>
                            </li>

                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-group"></i>
                                    <span>Oficinas</span>
                                    <i class="  fa fa-unsorted"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <?php 
                        if($tipo2==1){ ?>
                                <li><a href="?mod=registrooficina&nuevo"><i class="glyphicon glyphicon-floppy-open"></i>Registrar Oficina</a> </li>
                        <?php } ?>
                                    <li><a href="?mod=registrooficina&lista=lista"><i class="glyphicon glyphicon-list"></i>Lista De Oficinas </a> </li>
                                    
                                    <li><a href="?mod=registrooficina&lista=lista"><i class="glyphicon glyphicon-wrench"></i>Opciones</a> </li>
                                  
                                </ul>
                            </li>

                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-group"></i>
                                    <span>Transporte</span>
                                    <i class="  fa fa-unsorted"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <?php 
                        if($tipo2==1){ ?>
                                <li><a href="?mod=registrocarro&nuevo"><i class="glyphicon glyphicon-floppy-open"></i>Registrar Carro</a> </li>
                        <?php } ?>
                                    <li><a href="?mod=registrocarro&lista=lista"><i class="glyphicon glyphicon-list"></i>Lista De Carros </a> </li>
                                    
                                    <li><a href="?mod=registrocarro&lista=lista"><i class="glyphicon glyphicon-wrench"></i>Opciones</a> </li>
                                  
                                </ul>
                            </li>

                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-group"></i>
                                    <span>Choferes</span>
                                    <i class="  fa fa-unsorted"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <?php 
                        if($tipo2==1){ ?>
                                <li><a href="?mod=registrochofer&nuevo"><i class="glyphicon glyphicon-floppy-open"></i>Registrar Chofer</a> </li>
                        <?php } ?>
                                    <li><a href="?mod=registrochofer&lista=lista"><i class="glyphicon glyphicon-list"></i>Lista De Choferes </a> </li>
                                    
                                    <li><a href="?mod=registrochofer&lista=lista"><i class="glyphicon glyphicon-wrench"></i>Opciones</a> </li>
                                  
                                </ul>
                            </li>

                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-group"></i>
                                    <span>Envios</span>
                                    <i class="  fa fa-unsorted"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <?php 
                        if($tipo2==1){ ?>
                                <li><a href="?mod=registroenvio&nuevo"><i class="glyphicon glyphicon-floppy-open"></i>Registrar Encomienda</a> </li>
                        <?php } ?>
                                    <li><a href="?mod=registroenvio&lista=lista"><i class="glyphicon glyphicon-list"></i>Lista De Encomiendas </a> </li>
                                    
                                    <li><a href="?mod=registroenvio&lista=lista"><i class="glyphicon glyphicon-wrench"></i>Opciones</a> </li>
                                  
                                </ul>
                            </li>

                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-group"></i>
                                    <span>Recibos</span>
                                    <i class="  fa fa-unsorted"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <?php 
                        if($tipo2==1){ ?>
                                <li><a href="?mod=registrofactura&nuevo"><i class="glyphicon glyphicon-floppy-open"></i>Registrar Factura</a> </li>
                        <?php } ?>
                                    <li><a href="?mod=registrofactura&lista=lista"><i class="glyphicon glyphicon-list"></i>Lista De Facturas </a> </li>
                                    
                                    <li><a href="?mod=registrofactura&lista=lista"><i class="glyphicon glyphicon-wrench"></i>Opciones</a> </li>
                                  
                                </ul>
                            </li>


						<?php 
						if($tipo2==1){ ?>

                           
                           
<?php
                           if($tipo2==1){

                            ?>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-gears"></i>
                                    <span>Administracion </span>
                                    <i class="fa  fa fa-unsorted"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="?mod=registroadmin&nuevo"><i class="glyphicon glyphicon-user"></i>Registrar Administrador</a> </li>
                                    <li><a href="?mod=registroadmin&lista=lista"><i class="glyphicon glyphicon-list-alt"></i>Lista De Administradores</a> </li>
                                    
                                    <li><a href="?mod=registroadmin&lista=lista"><i class=" glyphicon glyphicon-wrench"></i>Opciones</a> </li>
                                    <li><a href="?mod=/respaldo/respaldo&respaldo=respaldo"><i class=" glyphicon glyphicon-hdd"></i>Respaldar Bd</a> </li>
                                  
                                </ul>
                            </li>




						<?php 

                        }
                        } ?>
						
                </section>
                <!-- /.sidebar -->
            </aside>
