var alerta_unidades = document.getElementById("alert_unidades");
function LoadTableUnidades() {
    if ($.fn.DataTable.isDataTable('#table_unidades')){
        
        $('#table_unidades').DataTable().rows().remove();
        $('#table_unidades').DataTable().destroy();
    
    }

    $('#table_unidades').DataTable({
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
        ajax: BASE_URL+"/main/getUnidades",
        aoColumns: [
            { "data": "id" },
            { "data": "unidad" },
            { "data": "estado" },
            { "defaultContent": "<editUnidades class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='mdi mdi-pencil font-size-18'></i></editUnidades>"+
            "<deleteUnidades class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='mdi mdi-trash-can font-size-18'></i></deleteUnidades>"

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
            $( 'table_unidades tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
        }
        
    })
   
}

document.getElementById("btnAgregar_Unidades").addEventListener("click",function(){
                                
    $("#modal_unidades").modal("show");
    document.getElementById("title-unidades").innerHTML = "Agregar Unidades";
    document.getElementById("form_unidades").reset();
    document.getElementById("Agregar_Unidades").style.display = "block";
    document.getElementById("Modificar_Unidades").style.display = "none";
});

// // boton de agregar Unidades
document.getElementById("Agregar_Unidades").addEventListener("click",function(){
    $nom_uni=document.getElementById("nom_unidades").value;

    $est_uni=document.getElementById("est_unidades").value;
    
    if($nom_uni !=""  && $est_uni != ""){
       
                const postData = { 
                    unidad:$nom_uni,
                    estado:$est_uni,
                    
                };
               
                try {

                    $.ajax({
                        method: "POST",
                        url: BASE_URL+"/main/addUnidades",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                     
                        if (respuesta) 
                        {
                            document.getElementById("form_unidades").reset();
                            $('#modal_unidades').modal('hide');
                            alerta_unidades.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Unidad Registrada'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_unidades").DataTable().ajax.reload(null, false); 
                           
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
//editar Empresa
$('#table_unidades tbody').on( 'click', 'editUnidades', function(){
    $("#modal_unidades").modal("show");
    document.getElementById("title-unidades").innerHTML = "Modificar Unidad";
    document.getElementById("form_unidades").reset();
    document.getElementById("Agregar_Unidades").style.display = "none";
    document.getElementById("Modificar_Unidades").style.display = "block";
   
    //recuperando los datos
    var table = $('#table_unidades').DataTable();
    var regNum = table.rows( $(this).parents('tr') ).count().toString();
    var regDat = table.rows( $(this).parents('tr') ).data().toArray();
    if (regNum == '0') {
        //console.log("error");
    }else{
        document.getElementById("id_unidades").value=regDat[0]["id"];
        document.getElementById("nom_unidades").value=regDat[0]["unidad"];
        document.getElementById("est_unidades").value=regDat[0]["estado"];
     
    }
});
//guardando la nueva info
document.getElementById("Modificar_Unidades").addEventListener("click", function(){
    
    $nom_uni=document.getElementById("nom_unidades").value;

    $est_uni=document.getElementById("est_unidades").value;
    
    if($nom_uni !="" && $est_uni != ""){
       
                const postData = { 
                    id:document.getElementById("id_unidades").value,
                    unidad:$nom_uni,
                    estado:$est_uni,
                };
              
                try {

                    $.ajax({
                        method: "POST",
                        url: BASE_URL+"/main/updateUnidades",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                       
                        if (respuesta) 
                        {
                            document.getElementById("form_unidades").reset();
                            $('#modal_unidades').modal('hide');
                            alerta_unidades.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Unidad Modificada'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_unidades").DataTable().ajax.reload(null, false); 
                           
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
