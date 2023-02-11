var alerta_tipo_activo = document.getElementById("alert_tipo_activo");
function LoadTableTipo_activo() {
    if ($.fn.DataTable.isDataTable('#table_tipo_activo')){
        
        $('#table_tipo_activo').DataTable().rows().remove();
        $('#table_tipo_activo').DataTable().destroy();
    
    }

    $('#table_tipo_activo').DataTable({
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
        ajax: BASE_URL+"/main/getTipoActivo",
        aoColumns: [
            { "data": "id" },
            { "data": "tipo" },
            { "data": "estado" },
            { "defaultContent": "<editTipo_activo class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='mdi mdi-pencil font-size-18'></i></editTipo_activo>"+
            "<deleteTipo_activo class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='mdi mdi-trash-can font-size-18'></i></deleteTipo_activo>"

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
            $( 'table_tipo_activo tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
        }
        
    })
   
}


document.getElementById("btnAgregar_Tipo_activo").addEventListener("click",function(){
                                
    $("#modal_tipo_activo").modal("show");
    document.getElementById("title-tipo_activo").innerHTML = "Agregar Tipo de activo";
    document.getElementById("form_tipo_activo").reset();
    document.getElementById("Agregar_tipo_activo").style.display = "block";
    document.getElementById("Modificar_tipo_activo").style.display = "none";
});

            // boton de agregar Tipo Activo
document.getElementById("Agregar_tipo_activo").addEventListener("click",function(){
    $nom_tip=document.getElementById("nom_tipo").value;

    $est_tip=document.getElementById("est_tipo").value;
    
    if($nom_tip !=""  && $est_tip != ""){
       
                const postData = { 
                    tipo:$nom_tip,
                    estado:$est_tip,
                    
                };
               
                try {

                    $.ajax({
                        method: "POST",
                        url: BASE_URL+"/main/addTipoActivo",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                     
                        if (respuesta) 
                        {
                            document.getElementById("form_tipo_activo").reset();
                            $('#modal_tipo_activo').modal('hide');
                            alerta_tipo_activo.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Tipo Activo Registrado'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_tipo_activo").DataTable().ajax.reload(null, false); 
                           
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

                //editar Tipo de activo
$('#table_tipo_activo tbody').on( 'click', 'editTipo_activo', function(){
    $("#modal_tipo_activo").modal("show");
    document.getElementById("tipo_activo").innerHTML = "Modificar Tipo de Activo";
    document.getElementById("form_tipo_activo").reset();
    document.getElementById("Agregar_tipo_activo").style.display = "none";
    document.getElementById("Modificar_tipo_activo").style.display = "block";
   
    //recuperando los datos
    var table = $('#table_tipo_activo').DataTable();
    var regNum = table.rows( $(this).parents('tr') ).count().toString();
    var regDat = table.rows( $(this).parents('tr') ).data().toArray();
    if (regNum == '0') {
        //console.log("error");
    }else{
        document.getElementById("id_tipo_activo").value=regDat[0]["id"];
        document.getElementById("nom_tipo").value=regDat[0]["tipo"];
        document.getElementById("est_tipo").value=regDat[0]["estado"];
     
    }
});
//guardando la nueva info
document.getElementById("Modificar_tipo_activo").addEventListener("click", function(){
    
    $nom_tip=document.getElementById("tipo_activo").value;

    $est_tip=document.getElementById("est_tipo").value;
    
    if($nom_tip !="" && $est_tip != ""){
       
                const postData = { 
                    id:document.getElementById("id_tipo_activo").value,
                    tipo:$nom_tip,
                    estado:$est_tip,
                };
              
                try {

                    $.ajax({
                        method: "POST",
                        url: BASE_URL+"/main/updateTipoActivo",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                       
                        if (respuesta) 
                        {
                            document.getElementById("form_tipo_activo").reset();
                            $('#modal_tipo_activo').modal('hide');
                            alerta_tipo_activo.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Tipo de Activo Modificado'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_tipo_activo").DataTable().ajax.reload(null, false); 
                           
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
