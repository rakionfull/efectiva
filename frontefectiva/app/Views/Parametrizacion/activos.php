<?=$this->extend('Layout/main')?> 
<?=$this->section('content')?> 
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
                                    <li id="empresa" ><a href="#/Empresa" >Empresa</a></li>
                                    <li id="area"><a href="#/Area">Área</a></li>
                                    <li ><a href="" >Unidades</a></li>
                                    <li ><a href="" >Macroprocesos</a></li>
                                    <li  ><a href="" >Procesos</a></li>
                                    <li ><a href="" >Posición/Puesto</a></li>
                                    <li  ><a href="" >Aspecto de Seguridad</a></li>
                                    <li  ><a href="" >Valor de Activo</a></li>
                                    <li  ><a href="" >Valoración de Activo</a></li>
                                    <li  ><a href="">Tipo de Activo</a></li>
                                    <li  ><a href="" >Categoría de Activo</a></li>
                                    <li ><a href="" >Ubicación de Activo</a></li>
                                    <li  ><a href="" >Clasificación de Información</a></li>
                                  
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
        <script src="<?=base_url('public/assets/js/activos.js'); ?>"></script>
        <script src="<?=base_url('public/assets/js/empresa.js'); ?>"></script>
        <script src="<?=base_url('public/assets/js/area.js'); ?>"></script>
<?=$this->endSection()?> 