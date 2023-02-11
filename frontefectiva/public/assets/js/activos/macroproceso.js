var alerta_macroproceso = document.getElementById("alert_macroproceso");
function LoadTableMacroproceso() {
    if ($.fn.DataTable.isDataTable('#table_macroproceso')){
        
        $('#table_macroproceso').DataTable().rows().remove();
        $('#table_macroproceso').DataTable().destroy();
    
    }

    $('#table_macroproceso').DataTable({
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
        ajax: BASE_URL+"/main/getMacroproceso",
        aoColumns: [
            { "data": "id" },
            { "data": "macroproceso" },
            { "data": "estado" },
            { "defaultContent": "<editMacroproceso class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='mdi mdi-pencil font-size-18'></i></editMacroproceso>"+
            "<deleteMacroproceso class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='mdi mdi-trash-can font-size-18'></i></deleteMacroproceso>"

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
            $( 'table_macroproceso tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
        }
        
    })
   
}
document.getElementById("btnAgregar_Macroproceso").addEventListener("click",function(){
                                
    $("#modal_macroproceso").modal("show");
    document.getElementById("title-macroproceso").innerHTML = "Agregar Macroproceso";
    document.getElementById("form_macroproceso").reset();
    document.getElementById("Agregar_Macroproceso").style.display = "block";
    document.getElementById("Modificar_Macroproceso").style.display = "none";
});

// // boton de agregar Macroproceso
document.getElementById("Agregar_Macroproceso").addEventListener("click",function(){
    $nom_mac=document.getElementById("nom_macroproceso").value;

    $est_mac=document.getElementById("est_macroproceso").value;
    
    if($nom_mac !=""  && $est_mac != ""){
       
                const postData = { 
                    macroproceso:$nom_mac,
                    estado:$est_mac,
                    
                };
               
                try {

                    $.ajax({
                        method: "POST",
                        url: BASE_URL+"/main/addMacroproceso",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                     
                        if (respuesta) 
                        {
                            document.getElementById("form_macroproceso").reset();
                            $('#modal_macroproceso').modal('hide');
                            alerta_macroproceso.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Macroproceso Registrado'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_macroproceso").DataTable().ajax.reload(null, false); 
                           
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


//editar Macroproceso
$('#table_macroproceso tbody').on( 'click', 'editMacroproceso', function(){
    $("#modal_macroproceso").modal("show");
    document.getElementById("title-macroproceso").innerHTML = "Modificar Macroproceso";
    document.getElementById("form_macroproceso").reset();
    document.getElementById("Agregar_Macroproceso").style.display = "none";
    document.getElementById("Modificar_Macroproceso").style.display = "block";
   
    //recuperando los datos
    var table = $('#table_macroproceso').DataTable();
    var regNum = table.rows( $(this).parents('tr') ).count().toString();
    var regDat = table.rows( $(this).parents('tr') ).data().toArray();
    if (regNum == '0') {
        //console.log("error");
    }else{
        document.getElementById("id_macroproceso").value=regDat[0]["id"];
        document.getElementById("nom_macroproceso").value=regDat[0]["macroproceso"];
        document.getElementById("est_macroproceso").value=regDat[0]["estado"];
     
    }
});
//guardando la nueva info
document.getElementById("Modificar_Macroproceso").addEventListener("click", function(){
    
    $nom_mac=document.getElementById("nom_macroproceso").value;

    $est_mac=document.getElementById("est_macroproceso").value;
    
    if($nom_mac !="" && $est_mac != ""){
       
                const postData = { 
                    id:document.getElementById("id_macroproceso").value,
                    macroproceso:$nom_mac,
                    estado:$est_mac,
                };
              
                try {

                    $.ajax({
                        method: "POST",
                        url: BASE_URL+"/main/updateMacroproceso",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                       
                        if (respuesta) 
                        {
                            document.getElementById("form_macroproceso").reset();
                            $('#modal_macroproceso').modal('hide');
                            alerta_macroproceso.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Macroproceso Modificado'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_macroproceso").DataTable().ajax.reload(null, false); 
                           
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
