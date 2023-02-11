<?=$this->extend('Layout/main')?> 
<?=$this->section('content'); $session = session();?> 
        <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header" style="background:#fff;border-bottom: 2px solid #f1f5f7">
                                <div class="col-md-12 text-center">
                                    Parametrizacón de Activos
                                </div>
                           
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <ul class="menu">
                                        <?php if($session->permisos[14]->view_det==1){ ?>
                                            <li id="empresa" ><a href="#/Empresa" >Empresa</a></li>
                                        <?php }?>
                                        <?php if($session->permisos[15]->view_det==1){ ?>
                                            <li id="area"><a href="#/Area">Área</a></li>
                                       <?php }?>
                                       <?php if($session->permisos[16]->view_det==1){ ?>
                                            <li id="unidades"><a href="#/Unidades">Unidades</a></li>
                                       <?php }?>
                                       <?php if($session->permisos[17]->view_det==1){ ?>
                                            <li id="macroproceso"><a href="#/Macroproceso">Macroprocesos</a></li>
                                       <?php }?>
                                       <?php if($session->permisos[18]->view_det==1){ ?>
                                            <li id="proceso"><a href="#/Proceso">Procesos</a></li>
                                       <?php }?>
                                       <?php if($session->permisos[19]->view_det==1){ ?>
                                            <li ><a href="" >Posición/Puesto</a></li>
                                       <?php }?>
                                       <?php if($session->permisos[20]->view_det==1){ ?>
                                            <li id="aspectoSeg" ><a href="#/AspectoSeg">Aspecto de Seguridad</a></li>
                                       <?php }?>
                                       <?php if($session->permisos[21]->view_det==1){ ?>
                                            <li id="valor_activo" ><a href="#/Valor_activo" >Valor de Activo</a></li>
                                       <?php }?>
                                       <?php if($session->permisos[22]->view_det==1){ ?>
                                            <li id="clasificacion_informacion" ><a href="#/Clasificacion_informacion" >Valoración de Activo</a></li>
                                       <?php }?>
                                       <?php if($session->permisos[23]->view_det==1){ ?>
                                            <li  id="tipo_activo"><a href="#/Tipo_activo">Tipo de Activo</a></li>
                                       <?php }?>
                                       <?php if($session->permisos[24]->view_det==1){ ?>
                                            <li  ><a href="" >Categoría de Activo</a></li>
                                       <?php }?>
                                       <?php if($session->permisos[25]->view_det==1){ ?>
                                            <li ><a href="" >Ubicación de Activo</a></li>
                                       <?php }?>
                                    
                                       <?php if($session->permisos[26]->view_det==1){ ?>
                                            <li id="clasificacion_informacion" ><a href="#/Clasificacion_informacion">Clasificación de Información</a></li>
                                  
                                       <?php }?>
                                   
                                   
                                   
                                   
                                    
                                  
                                    
                                   
                                    
                                    
                                    
                                  
                                </ul>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div  id="apartEmpresa"  class="opcion" style="display:none">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Lista de Empresas</h4>
                                    </div>
                                
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_Empresa" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                                    </div>
                                    <div class="col-md-12" style="margin-top:0.5rem" id="alerta_empresa">
                                        
                                    </div>
                                </div>
                                <?php 
                                    $session = session();
                                        if($session->getFlashdata('error') != '')
                                        {
                                        echo $session->getFlashdata('error');;
                                        }
                                    ?>
                            </div>
                            <div class="card-body">
                        
                                <div class="table-responsive">
                                                <table id="table_empresa" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>ID</th>                                                         
                                                            <th>Empresa</th>
                                                            <th>Estado</th>
                                                            <th style="width: 120px;">Mantenimiento</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                        
                                                    
                                                    </tbody>
                                                </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div  id="apartArea"  class="opcion" style="display:none">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Lista de Áreas</h4>
                                    </div>
                                
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_area" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir Área</button>
                                   </div>
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_area_empresa" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir Config</button>
                                    </div>
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnBuscar_area" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Buscar</button>
                                    </div>
                                    <div class="col-md-12" style="margin-top:0.5rem" id="alert_area">
                                        
                                    </div>
                                </div>
                                <?php 
                                    $session = session();
                                        if($session->getFlashdata('error') != '')
                                        {
                                        echo $session->getFlashdata('error');;
                                        }
                                    ?>
                            </div>
                            <div class="card-body">
                        
                                <div class="table-responsive">
                                                <table id="table_area" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Id</th>                                                         
                                                            <th>Area</th>
                                                            <th>Estado</th>
                                                            <th style="width: 120px;">Mantenimiento</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                        
                                                    
                                                    </tbody>
                                                </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                   <!--------------------------------------------------------------------------------------------------------->  

                   <div  id="apartUnidades"  class="opcion" style="display:none">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Unidades</h4>
                                    </div>
                                
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_Unidades" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir Aspecto</button>
                                   </div>
                                    
                                    <div class="col-md-12" style="margin-top:0.5rem" id="alert_unidades">
                                        
                                    </div>
                                </div>
                                <?php 
                                    $session = session();
                                        if($session->getFlashdata('error') != '')
                                        {
                                        echo $session->getFlashdata('error');;
                                        }
                                    ?>
                            </div>
                            <div class="card-body">
                        
                                <div class="table-responsive">
                                                <table id="table_unidades" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Id</th>                                                         
                                                            <th>Unidad</th>
                                                            <th>Estado</th>
                                                            <th style="width: 120px;">Mantenimiento</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                        
                                                    
                                                    </tbody>
                                                </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div  id="apartMacroproceso"  class="opcion" style="display:none">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Macroproceso</h4>
                                    </div>
                                
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_Macroproceso" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir Macroproceso</button>
                                   </div>
                                    
                                    <div class="col-md-12" style="margin-top:0.5rem" id="alert_macroproceso">
                                        
                                    </div>
                                </div>
                                <?php 
                                    $session = session();
                                        if($session->getFlashdata('error') != '')
                                        {
                                        echo $session->getFlashdata('error');;
                                        }
                                    ?>
                            </div>
                            <div class="card-body">
                        
                                <div class="table-responsive">
                                                <table id="table_macroproceso" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Id</th>                                                         
                                                            <th>Macroproceso</th>
                                                            <th>Estado</th>
                                                            <th style="width: 120px;">Mantenimiento</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                        
                                                    
                                                    </tbody>
                                                </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div  id="apartProceso"  class="opcion" style="display:none">
                            <div class="card">
                                <div class="card-body ">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <h4 class="card-title">Proceso</h4>
                                        </div>
                                    
                                        <div class="col-md-4 offset-md-4">
                                    
                                            <button type="button" id="btnAgregar_Proceso" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir Proceso</button>
                                    </div>
                                        
                                        <div class="col-md-12" style="margin-top:0.5rem" id="alert_proceso">
                                            
                                        </div>
                                    </div>
                                    <?php 
                                        $session = session();
                                            if($session->getFlashdata('error') != '')
                                            {
                                            echo $session->getFlashdata('error');;
                                            }
                                        ?>
                                </div>
                                <div class="card-body">
                            
                                    <div class="table-responsive">
                                                    <table id="table_proceso" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>Id</th>                                                         
                                                                <th>Proceso</th>
                                                                <th>Estado</th>
                                                                <th style="width: 120px;">Mantenimiento</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        
                                                            
                                                        
                                                        </tbody>
                                                    </table>
                                    </div>
                                </div>
                                
                            </div>
                    </div>

                    <div  id="apartAspectoSeg"  class="opcion" style="display:none">
                            <div class="card">
                                <div class="card-body ">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <h4 class="card-title">Aspectos de Seguridad</h4>
                                        </div>
                                    
                                        <div class="col-md-4 offset-md-4">
                                    
                                            <button type="button" id="btnAgregar_AspectoSeg" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir Aspecto</button>
                                    </div>
                                        
                                        <div class="col-md-12" style="margin-top:0.5rem" id="alert_aspectoSeg">
                                            
                                        </div>
                                    </div>
                                    <?php 
                                        $session = session();
                                            if($session->getFlashdata('error') != '')
                                            {
                                            echo $session->getFlashdata('error');;
                                            }
                                        ?>
                                </div>
                                <div class="card-body">
                            
                                    <div class="table-responsive">
                                                    <table id="table_aspectoSeg" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>Id</th>                                                         
                                                                <th>Aspecto</th>
                                                                <th>Estado</th>
                                                                <th style="width: 120px;">Mantenimiento</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        
                                                            
                                                        
                                                        </tbody>
                                                    </table>
                                    </div>
                                </div>
                                
                            </div>
                    </div>

                    


                   <!--------------------------------------------------------------------------------------------------------->  

                    <div  id="apartValor_activo"  class="opcion" style="display:none">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Lista de Valor de Activos</h4>
                                    </div>
                                
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_ValorActivo" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                                    </div>
                                    <div class="col-md-12" style="margin-top:0.5rem" id="alert_valorActivo">
                                        
                                    </div>
                                </div>
                                <?php 
                                    $session = session();
                                        if($session->getFlashdata('error') != '')
                                        {
                                        echo $session->getFlashdata('error');;
                                        }
                                    ?>
                            </div>
                            <div class="card-body">
                        
                                <div class="table-responsive">
                                                <table id="table_valorActivo" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>ID</th>                                                         
                                                            <th>Valor</th>
                                                            <th>Estado</th>
                                                            <th style="width: 120px;">Mantenimiento</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                        
                                                    
                                                    </tbody>
                                                </table>
                                </div>
                            </div>
                            
                        
                        </div>
                    </div>
                    
                    <div  id="apartTipo_activo"  class="opcion" style="display:none">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Lista de Tipo de Activos</h4>
                                    </div>
                                
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_Tipo_activo" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                                    </div>
                                    <div class="col-md-12" style="margin-top:0.5rem" id="alert_tipo_activo">
                                        
                                    </div>
                                </div>
                                <?php 
                                    $session = session();
                                        if($session->getFlashdata('error') != '')
                                        {
                                        echo $session->getFlashdata('error');;
                                        }
                                    ?>
                            </div>
                            <div class="card-body">
                        
                                <div class="table-responsive">
                                                <table id="table_tipo_activo" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>ID</th>      
                                                            <th>Tipo</th>                                                                                                                                                                               
                                                            <th>Estado</th>
                                                            <th style="width: 120px;">Mantenimiento</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                        
                                                    
                                                    </tbody>
                                                </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                               
                

                    <div  id="apartClasificacion_informacion"  class="opcion" style="display:none">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h4 class="card-title">Lista de Clasificacion de informacion</h4>
                                    </div>
                                
                                    <div class="col-md-4 offset-md-4">
                                
                                        <button type="button" id="btnAgregar_Clas_informacion" class="float-right btn btn-primary waves-effect waves-light"><i class=" fas fa-plus-circle align-middle mr-2 ml-2"></i> Añadir</button>
                                    </div>
                                    <div class="col-md-12" style="margin-top:0.5rem" id="alert_clas_informacion">
                                        
                                    </div>
                                </div>
                                <?php 
                                    $session = session();
                                        if($session->getFlashdata('error') != '')
                                        {
                                        echo $session->getFlashdata('error');;
                                        }
                                    ?>
                            </div>
                            <div class="card-body">
                        
                                <div class="table-responsive">
                                                <table id="table_clas_informacion" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>ID</th>      
                                                            <th>Clasificacion</th>
                                                            <th>Descripcion</th>                                                                                                                     
                                                            <th>Estado</th>
                                                            <th style="width: 120px;">Mantenimiento</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                        
                                                    
                                                    </tbody>
                                                </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
    <!--------------------------------------------------------------------------------------------------------->      
            </div>
              
               
        </div>
        <!-- modales para registro -->
                <div class="modal fade" id="modal_empresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-empresa"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_empresa" class="in-line">
                                    <input type="hidden" id="id_empresa">
                                    
                                    <div class="col-12-lg">
                                        <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <span>Nombre de la Empresa: </span>
                                                        <input type="text" class="form-control form-control-sm" id="nom_empresa"  onkeyup="this.value = this.value.toUpperCase();" onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                      
                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <span>Estado: </span>
                                                        <select name="" id="est_empresa" class="form-control form-control-sm">
                                                        <option value="">Seleccione</option>
                                                        <option value="1">Activo</option>
                                                        <option value="2">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                    </div>
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_Empresa">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_Empresa">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal fade" id="modal_area" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-area"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_area" class="in-line">
                                    <input type="hidden" id="id_area">
                                    
                                    <div class="col-12-lg">
                                        <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <span>Nombre del Area: </span>
                                                        <input type="text" class="form-control form-control-sm" id="nom_area"  onkeyup="this.value = this.value.toUpperCase();" onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                      
                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <span>Estado: </span>
                                                        <select name="" id="est_area" class="form-control form-control-sm">
                                                        <option value="">Seleccione</option>
                                                        <option value="1">Activo</option>
                                                        <option value="2">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                    </div>
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_area">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_area">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal fade" id="modal_area_empresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-area-empresa"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                        <div class="col-md-12" style="margin-top:0.5rem" id="alert_area_empresa">
                                        
                                        </div>
                                <form action="" id="form_area_empresa" class="in-line">
                                    <input type="hidden" id="id_area_empresa">
                                    
                                    <div class="col-12-lg">
                                        <div class="row">
                                                 <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <span>Empresa: </span>
                                                        <select name="" id="select_empresa" class="form-control form-control-sm">
                                                       
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <span>Área</span>
                                                        <select name="" id="select_area" class="form-control form-control-sm">
                                                        
                                                        </select>
                                                    </div>
                                                </div>
                                      
                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <span>Estado: </span>
                                                        <select name="" id="est_area_empresa" class="form-control form-control-sm">
                                                        <option value="">Seleccione</option>
                                                        <option value="1">Activo</option>
                                                        <option value="2">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                    </div>
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_area_empresa">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_area_empresa">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                                <table id="table_area_empresa" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Id</th>  
                                                            <th>Id</th>   
                                                            <th>Id</th>                                                          
                                                            <th>Empresa</th>
                                                            <th>Área</th>
                                                            <th>Estado</th>
                                                            <th style="width: 120px;">Mantenimiento</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                        
                                                    
                                                    </tbody>
                                                </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal fade" id="modal_busca_area" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Búsqueda</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_empresa" class="in-line">
                                    <input type="hidden" id="">
                                    
                                    <div class="col-12-lg">
                                        <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <span>Área</span>
                                                        <select name="" id="select_area" class="form-control form-control-sm">
                                                        
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <button type="button" class="btn btn-primary" id="Buscar_area">Buscar</button>
                                                </div>
                                                
                                               
                                                
                                        </div>
                                    </div>
                                </form>  
                                
                            </div
                           
                                           
                            <div class="modal-body">
                                <div class="table-responsive">
                                                <table id="table_area_empresa" class="table table-centered table-bordered datatable dt-responsive nowrap" data-page-length="5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Id</th>  
                                                            <th>Id</th>   
                                                            <th>Id</th>                                                          
                                                            <th>Empresa</th>
                                                            <th>Área</th>
                                                            <th>Estado</th>
                                                            <th style="width: 120px;">Mantenimiento</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                        
                                                    
                                                    </tbody>
                                                </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!------------------------------------------------------------------------------->

                
                <!-- modal para Aspectos de Seguridad -->
                <div class="modal fade" id="modal_aspectoSeg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-aspectoSeg"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_aspectoSeg" class="in-line">
                                    <input type="hidden" id="id_aspecto">
                                    
                                    <div class="col-12-lg">
                                        <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <span>Nombre del Aspecto de Seguridad: </span>
                                                        <input type="text" class="form-control form-control-sm" id="nom_aspecto"  onkeyup="this.value = this.value.toUpperCase();" onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                      
                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <span>Estado: </span>
                                                        <select name="" id="est_aspecto" class="form-control form-control-sm">
                                                        <option value="">Seleccione</option>
                                                        <option value="1">Activo</option>
                                                        <option value="2">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                    </div>
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_AspectoSeg">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_AspectoSeg">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                        </div>
                    </div>

                </div>

                <!-- modal para Aspectos de Seguridad -->
                <div class="modal fade" id="modal_unidades" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-unidades"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_unidades" class="in-line">
                                    <input type="hidden" id="id_unidades">
                                    
                                    <div class="col-12-lg">
                                        <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <span>Nombre del Aspecto de Seguridad: </span>
                                                        <input type="text" class="form-control form-control-sm" id="nom_unidades"  onkeyup="this.value = this.value.toUpperCase();" onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                      
                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <span>Estado: </span>
                                                        <select name="" id="est_unidades" class="form-control form-control-sm">
                                                        <option value="">Seleccione</option>
                                                        <option value="1">Activo</option>
                                                        <option value="2">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                    </div>
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_Unidades">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_Unidades">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                        </div>
                    </div>

                </div>

                <!-- modal para Valor Activo -->
                <div class="modal fade" id="modal_valorActivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-valorActivo"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_valorActivo" class="in-line">
                                    <input type="hidden" id="id_valorActivo">
                                    
                                    <div class="col-12-lg">
                                        <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <span>Nombre del Valor: </span>
                                                        <input type="text" class="form-control form-control-sm" id="nom_valor"  onkeyup="this.value = this.value.toUpperCase();" onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                      
                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <span>Estado: </span>
                                                        <select name="" id="est_valor" class="form-control form-control-sm">
                                                        <option value="">Seleccione</option>
                                                        <option value="1">Activo</option>
                                                        <option value="2">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                    </div>
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_valorActivo">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_valorActivo">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                        </div>
                    </div>

                </div>

                <!-- modal para Macroproceso -->
                <div class="modal fade" id="modal_macroproceso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-macroproceso"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_macroproceso" class="in-line">
                                    <input type="hidden" id="id_macroproceso">
                                    
                                    <div class="col-12-lg">
                                        <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <span>Nombre del Macroproceso: </span>
                                                        <input type="text" class="form-control form-control-sm" id="nom_macroproceso"  onkeyup="this.value = this.value.toUpperCase();" onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                      
                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <span>Estado: </span>
                                                        <select name="" id="est_macroproceso" class="form-control form-control-sm">
                                                        <option value="">Seleccione</option>
                                                        <option value="1">Activo</option>
                                                        <option value="2">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                    </div>
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_Macroproceso">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_Macroproceso">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                        </div>
                    </div>

                </div>
        
                <!-- modal para Procesos -->
                <div class="modal fade" id="modal_proceso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-proceso"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_proceso" class="in-line">
                                    <input type="hidden" id="id_proceso">
                                    
                                    <div class="col-12-lg">
                                        <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <span>Nombre del Proceso: </span>
                                                        <input type="text" class="form-control form-control-sm" id="nom_proceso"  onkeyup="this.value = this.value.toUpperCase();" onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                      
                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <span>Estado: </span>
                                                        <select name="" id="est_proceso" class="form-control form-control-sm">
                                                        <option value="">Seleccione</option>
                                                        <option value="1">Activo</option>
                                                        <option value="2">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                    </div>
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_Proceso">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_Proceso">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                        </div>
                    </div>

                </div>

                <!-- modal para Tipo Activo -->
                <div class="modal fade" id="modal_tipo_activo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-tipo_activo"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_tipo_activo" class="in-line">
                                    <input type="hidden" id="id_tipo_activo">
                                    
                                    <div class="col-12-lg">
                                        <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <span>Nombre del Valor: </span>
                                                        <input type="text" class="form-control form-control-sm" id="nom_tipo"  onkeyup="this.value = this.value.toUpperCase();" onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                      
                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <span>Estado: </span>
                                                        <select name="" id="est_tipo" class="form-control form-control-sm">
                                                        <option value="">Seleccione</option>
                                                        <option value="1">Activo</option>
                                                        <option value="2">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                    </div>
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_tipo_activo">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_tipo_activo">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                        </div>
                    </div>

                </div>
            


            <!-- modal para Clasificacion de Informacion -->
                <div class="modal fade" id="modal_clas_informacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                |   <div class="modal-dialog modal-lg" role="document">
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title-clas_informacion"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form action="" id="form_clas_informacion" class="in-line">
                                    <input type="hidden" id="id_clas">
                                    
                                    <div class="col-12-lg">
                                        <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <span>Nombre de la Clasificacion: </span>
                                                        <input type="text" class="form-control form-control-sm" id="nom_informacion"  onkeyup="this.value = this.value.toUpperCase();" onKeyPress="return soloLetra(event);">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                            <span>Descripcion de la Clasificacion: </span>
                                                            <input type="text" class="form-control form-control-sm" id="descripcion_informacion"  onkeyup="this.value = this.value.toUpperCase();" onKeyPress="return soloLetra(event);">
                                                        </div>
                                      
                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <span>Estado: </span>
                                                        <select name="" id="est_clas_informacion" class="form-control form-control-sm">
                                                        <option value="">Seleccione</option>
                                                        <option value="1">Activo</option>
                                                        <option value="2">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                    </div>
                                </form>  
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="Agregar_clas_informacion">Agregar</button>
                                <button type="button" class="btn btn-primary" id="Modificar_clas_informacion">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            
                            </div>
                        </div>
                    </div>

                </div>
        
        <!------------------------------------------------------------------------------->
        <script src="<?=base_url('public/assets/js/activos/activos.js'); ?>"></script>
        <script src="<?=base_url('public/assets/js/activos/empresa.js'); ?>"></script>
        <script src="<?=base_url('public/assets/js/activos/area.js'); ?>"></script>
        <script src="<?=base_url('public/assets/js/activos/valor_activo.js'); ?>"></script>
        <script src="<?=base_url('public/assets/js/activos/tipo_activo.js'); ?>"></script>
        <script src="<?=base_url('public/assets/js/activos/clas_informacion.js'); ?>"></script>
        <script src="<?=base_url('public/assets/js/activos/aspectoSeg.js'); ?>"></script>
        <script src="<?=base_url('public/assets/js/activos/unidades.js'); ?>"></script>
        <script src="<?=base_url('public/assets/js/activos/macroproceso.js'); ?>"></script>
        <script src="<?=base_url('public/assets/js/activos/proceso.js'); ?>"></script>

<?=$this->endSection()?> 