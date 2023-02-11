var alerta_proceso = document.getElementById("alert_proceso");
function LoadTableProceso() {
    if ($.fn.DataTable.isDataTable('#table_proceso')){
        
        $('#table_proceso').DataTable().rows().remove();
        $('#table_proceso').DataTable().destroy();
    
    }

    $('#table_proceso').DataTable({
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
        ajax: BASE_URL+"/main/getProceso",
        aoColumns: [
            { "data": "id" },
            { "data": "proceso" },
            { "data": "estado" },
            { "defaultContent": "<editProceso class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='mdi mdi-pencil font-size-18'></i></editProceso>"+
            "<deleteProceso class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='mdi mdi-trash-can font-size-18'></i></deleteProceso>"

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
            $( 'table_proceso tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
        }
        
    })
   
}

document.getElementById("btnAgregar_Proceso").addEventListener("click",function(){
                                
    $("#modal_proceso").modal("show");
    document.getElementById("title-proceso").innerHTML = "Agregar Proceso";
    document.getElementById("form_proceso").reset();
    document.getElementById("Agregar_Proceso").style.display = "block";
    document.getElementById("Modificar_Proceso").style.display = "none";
});


// // boton de agregar Proceso
document.getElementById("Agregar_Proceso").addEventListener("click",function(){
    $nom_pro=document.getElementById("nom_proceso").value;

    $est_pro=document.getElementById("est_proceso").value;
    
    if($nom_pro !=""  && $est_pro != ""){
       
                const postData = { 
                    proceso:$nom_pro,
                    estado:$est_pro,
                    
                };
               
                try {

                    $.ajax({
                        method: "POST",
                        url: BASE_URL+"/main/addProceso",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                     
                        if (respuesta) 
                        {
                            document.getElementById("form_proceso").reset();
                            $('#modal_proceso').modal('hide');
                            alerta_proceso.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Proceso Registrado'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_proceso").DataTable().ajax.reload(null, false); 
                           
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


//editar Proceso
$('#table_proceso tbody').on( 'click', 'editProceso', function(){
    $("#modal_proceso").modal("show");
    document.getElementById("title-proceso").innerHTML = "Modificar Proceso";
    document.getElementById("form_proceso").reset();
    document.getElementById("Agregar_Proceso").style.display = "none";
    document.getElementById("Modificar_Proceso").style.display = "block";
   
    //recuperando los datos
    var table = $('#table_proceso').DataTable();
    var regNum = table.rows( $(this).parents('tr') ).count().toString();
    var regDat = table.rows( $(this).parents('tr') ).data().toArray();
    if (regNum == '0') {
        //console.log("error");
    }else{
        document.getElementById("id_proceso").value=regDat[0]["id"];
        document.getElementById("nom_proceso").value=regDat[0]["proceso"];
        document.getElementById("est_proceso").value=regDat[0]["estado"];
     
    }
});


//guardando la nueva info
document.getElementById("Modificar_Proceso").addEventListener("click", function(){
    
    $nom_pro=document.getElementById("nom_proceso").value;

    $est_pro=document.getElementById("est_proceso").value;
    
    if($nom_pro !="" && $est_pro != ""){
       
                const postData = { 
                    id:document.getElementById("id_proceso").value,
                    proceso:$nom_pro,
                    estado:$est_pro,
                };
              
                try {

                    $.ajax({
                        method: "POST",
                        url: BASE_URL+"/main/updateProceso",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                       
                        if (respuesta) 
                        {
                            document.getElementById("form_proceso").reset();
                            $('#modal_proceso').modal('hide');
                            alerta_proceso.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Proceso Modificado'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_proceso").DataTable().ajax.reload(null, false); 
                           
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
