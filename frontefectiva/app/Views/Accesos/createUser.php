<?=$this->extend('Layout/main')?> 
<?=$this->section('content');
$session = session();
?> 

            <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body ">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <h4 class="card-title">Registro de Usuarios</h4>
                                            </div>
                                            
                                    
                                    </div>
                                    <div class="card-body">
                                  
                                 
                               
                                    <form  action="<?php echo base_url();?>/main/addUser" method="post">
                       
                                           
                                        <div class="row">
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                       
                                                        <input type="text" id="usuario_us" name="usuario_us" placeholder="Usuario" class="form-control" value="<?=$data['usuario_us'] ?>" oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/,'')">
                                                        <?php if(isset($error->usuario_us)) echo'<div class="error">'.$error->usuario_us.'</div>' ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2 ">
                                                  
                                                        <div class="form-group">
                                                            <div class="input-group-append">
                                                            <input type="text" id="passw" name="passw" placeholder="Contrase??a" class="form-control" value="">
                                                            
                                                                <!-- <button id="show_password" class="btn btn-primary" type="button" title="Mostrar Clave"> <span class="fa fa-eye-slash icon"></span> </button> -->
                                                            </div>
                                                        </div>
                                                        <?php if(isset($error->passw)) echo'<div class="error">'.$error->passw.'</div>' ?>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                       
                                                       <select name="perfil_us" id="perfil_us" class="form-control">
                                                                <option value="">Perfil de Usuario</option>
                                                                <?php //var_dump($perfiles->data);
                                                                    foreach ($perfiles->data as $key => $value) {
                                                                        echo'<option value='.$value->id_perfil.'>'.$value->desc_perfil.'</option>';
                                                                    }
                                                                ?>
                                                                 
                                                       </select>
                                                       <?php if(isset($error->perfil_us)) echo'<div class="error">'.$error->perfil_us.'</div>' ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                       
                                                        <input type="text" id="nombres_us" placeholder="Nombres" name="nombres_us" class="form-control" value="<?=$data['nombres_us'] ?>" onKeyPress="return soloLetra(event);">
                                                        <?php if(isset($error->nombres_us)) echo'<div class="error">'.$error->nombres_us.'</div>' ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                       
                                                        <input type="text" id="apepat_us" name="apepat_us" placeholder="Apellido parterno" class="form-control" value="<?=$data['apepat_us'] ?>"  onKeyPress="return soloLetra(event);">
                                                        <?php if(isset($error->apepat_us)) echo'<div class="error">'.$error->apepat_us.'</div>' ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                       
                                                        <input type="text" id="apemat_us" name="apemat_us" placeholder="Apellido materno" class="form-control" value="<?=$data['apemat_us'] ?>"  onKeyPress="return soloLetra(event);">
                                                        <?php if(isset($error->apemat_us)) echo'<div class="error">'.$error->apemat_us.'</div>' ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                       
                                                        <input type="text" id="docident_us" name="docident_us" placeholder="DNI" class="form-control" value="<?=$data['docident_us'] ?>"  onKeyPress="return soloNumero(event);">
                                                        <?php if(isset($error->docident_us)) echo'<div class="error">'.$error->docident_us.'</div>';
                                                        ?>
                                                    </div>
                                                </div>
                                                
                                              
                                                
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                       
                                                        <input type="email" id="email_us" name="email_us" placeholder="Correo electr??nico" class="form-control " value="<?=$data['email_us'] ?>">
                                                        <?php if(isset($error->email_us)) echo'<div class="error">'.$error->email_us.'</div>' ?>
                                                    </div>
                                                </div>
                                                
                                                
                                            
                                           
                                            <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                       
                                                       <select name="id_empresa" id="id_empresa" class="form-control ">
                                                                <option value="">Empresa</option>
                                                       </select>
                                                       
                                                    </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                       
                                                       <select name="id_puesto" id="id_puesto" class="form-control">
                                                                <option value="">Posici??n/Puesto</option>
                                                       </select>
                                                       
                                                    </div>
                                            </div>
                                            <div class="col-lg-4 mb-2">
                                                    <div class="form-group">
                                                       
                                                       <select name="id_area" id="id_area" class="form-control">
                                                                <option value="">??rea</option>
                                                       </select>
                                                       
                                                    </div>
                                            </div>
                                            <div class="col-lg-4 mb-2">
                                                    <div class="form-group">
                                                       
                                                       <select name="id_unidad" id="id_unidad" class="form-control">
                                                                <option value="">Unidad</option>
                                                       </select>
                                                       
                                                    </div>
                                            </div>
                                            <div class="col-lg-4 mb-2">
                                                    <div class="form-group">
                                                       
                                                       <select name="" id="" class="form-control">
                                                                <option value="">Estado Usuario</option>
                                                                <option value="1">Activo</option>
                                                                <option value="0">Inactivo</option>
                                                       </select>
                                                       
                                                    </div>
                                            </div>
                                            <div class="col-lg-12 form-group mb-0 d-flex justify-content-end">
                                                <div>
                                                    <a href="  <?php echo base_url('listUsers');?>" class="btn btn-danger waves-effect waves-light mr-1">Cancelar</a>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1 ">
                                                        Guardar
                                                    </button>
                                                   
                                                    <?php 
                                                        //echo form_reset(array('value' => 'Cancelar', 'class' => 'btn btn-danger waves-effect waves-light mr-1'));
                                                    ?>   
                                                </div>
                                            </div>
                                        </div>
                                    <!-- </form>  -->
                                    </div>
                                </div>
                            </div> <!-- end col -->
            </div> <!-- end row -->
<?=$this->endSection()?> 