var alerta_clas_informacion = document.getElementById("alert_clas_informacion");
function LoadTableClasificacion_informacion() {
    if ($.fn.DataTable.isDataTable('#table_clas_informacion')){
        
        $('#table_clas_informacion').DataTable().rows().remove();
        $('#table_clas_informacion').DataTable().destroy();
    
    }

    $('#table_clas_informacion').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        // scrollY: "200px",
        // fixedColumns:   {
        //     heightMatch: 'none'
        // },
        responsive: true,
        autoWidth: false,
        // processing: true,
        lengthMenu:[5,10,25,50],
        pageLength:5,
        clickToSelect:false,
        ajax: BASE_URL+"/main/getClasInformacion",
        aoColumns: [
            { "data": "id" },
            { "data": "clasificacion" },
            { "data": "descripcion" },
            { "data": "estado" },
            { "defaultContent": "<editClas_informacion class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='mdi mdi-pencil font-size-18'></i></editClas_informacion>"+
            "<deleteClas_informacion class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='mdi mdi-trash-can font-size-18'></i></deleteClas_informacion>"

},
        ],
        columnDefs: [
            {
                // "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
            
        ],
        'drawCallback': function () {
            $( 'table_clas_informacion tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
        }
        
    })
   
}

document.getElementById("btnAgregar_Clas_informacion").addEventListener("click",function(){
                                
    $("#modal_clas_informacion").modal("show");
    document.getElementById("title-clas_informacion").innerHTML = "Agregar Clasificación de la información";
    document.getElementById("form_clas_informacion").reset();
    document.getElementById("Agregar_clas_informacion").style.display = "block";
    document.getElementById("Modificar_clas_informacion").style.display = "none";
});

// // boton de agregar Clasificacion de la informacion
document.getElementById("Agregar_clas_informacion").addEventListener("click",function(){
    $nom_clas=document.getElementById("nom_informacion").value;
    $descripcion_clas=document.getElementById("descripcion_informacion").value;
    $est_clas=document.getElementById("est_clas_informacion").value;
    
    if($nom_clas !=""  && $descripcion_clas !="" && $est_clas !=""){
       
                const postData = { 
                    clasificacion:$nom_clas,
                    descripcion:$descripcion_clas,
                    estado:$est_clas,
                    
                };
               
                try {

                    $.ajax({
                        method: "POST",
                        url: BASE_URL+"/main/addClasInformacion",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                     
                        if (respuesta) 
                        {
                            document.getElementById("form_clas_informacion").reset();
                            $('#modal_clas_informacion').modal('hide');
                            alerta_clas_informacion.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Clasificacion de la informacion Registrada'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_clas_informacion").DataTable().ajax.reload(null, false); 
                           
                        } 
                        
                    })
                    .fail(function(error) {
                        alert("Error en el ajax");
                    })
                    .always(function() {
                    });
                }
                catch(err) {
                    alert("Error en el try");
                }
            
           
       
    }else{
        Swal.fire({
                 icon: 'error',
                 title: 'Error',
                 text: 'Faltan Datos'
               })
  }
   


});
//editar clasificacion informacion
$('#table_clas_informacion tbody').on( 'click', 'editClas_informacion', function(){
    $("#modal_clas_informacion").modal("show");
    document.getElementById("clas_informacion").innerHTML = "Modificar Clasificación de la información";
    document.getElementById("form_clas_informacion").reset();
    document.getElementById("Agregar_clas_informacion").style.display = "none";
    document.getElementById("Modificar_clas_informacion").style.display = "block";
   
    //recuperando los datos
    var table = $('#table_clas_informacion').DataTable();
    var regNum = table.rows( $(this).parents('tr') ).count().toString();
    var regDat = table.rows( $(this).parents('tr') ).data().toArray();
    if (regNum == '0') {
        //console.log("error");
    }else{        
        document.getElementById("id_clas").value=regDat[0]["id"];
        document.getElementById("nom_informacion").value=regDat[0]["clasificacion"];
        document.getElementById("descripcion_informacion").value=regDat[0]["descripcion"];
        document.getElementById("est_clas_informacion").value=regDat[0]["estado"];
     
    }
});
//guardando la nueva info
document.getElementById("Modificar_clas_informacion").addEventListener("click", function(){
    
    $nom_clas=document.getElementById("nom_informacion").value;

    $descripcion_clas=document.getElementById("descripcion_informacion").value;

    $est_clas=document.getElementById("est_clas_informacion").value;

    
    if($nom_clas !=""  && $descripcion_clas != "" && $est_clas != ""){
       
                const postData = { 
                    id:document.getElementById("id_clas").value,
                    clasificacion:$nom_clas,
                    descripcion:$descripcion_clas,
                    est_clasificacion:$est_clas,
                };
              
                try {

                    $.ajax({
                        method: "POST",
                        url: BASE_URL+"/main/updateClasificacion_informacion",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                       
                        if (respuesta) 
                        {
                            document.getElementById("form_clas_informacion").reset();
                            $('#modal_clas_informacion').modal('hide');
                            alerta_clas_informacion.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Clasificación de información Modificado'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_clas_informacion").DataTable().ajax.reload(null, false); 
                           
                        } 
                        
                    })
                    .fail(function(error) {
                        alert("Error en el ajax");
                    })
                    .always(function() {
                    });
                }
                catch(err) {
                    alert("Error en el try");
                }
            
           
       
    }else{
        Swal.fire({
                 icon: 'error',
                 title: 'Error',
                 text: 'Faltan Datos'
               })
  }
   
});
