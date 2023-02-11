var alerta_valorActivo = document.getElementById("alert_valorActivo");
function LoadTableValorActivo() {
    if ($.fn.DataTable.isDataTable('#table_valorActivo')){
        
        $('#table_valorActivo').DataTable().rows().remove();
        $('#table_valorActivo').DataTable().destroy();
    
    }

    $('#table_valorActivo').DataTable({
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
        ajax: BASE_URL+"/main/getValorActivo",
        aoColumns: [
            { "data": "id" },
            { "data": "valor" },
            { "data": "estado" },
            { "defaultContent": "<editValorActivo class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='mdi mdi-pencil font-size-18'></i></editValorActivo>"+
            "<deleteValorActivo class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='mdi mdi-trash-can font-size-18'></i></deleteValorActivo>"

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
            $( 'table_valorActivo tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
        }
        
    })
   
}

document.getElementById("btnAgregar_ValorActivo").addEventListener("click",function(){

    $("#modal_valorActivo").modal("show");
    document.getElementById("title-valorActivo").innerHTML = "Agregar valor Activo";
    document.getElementById("form_valorActivo").reset();
    document.getElementById("Agregar_valorActivo").style.display = "block";
    document.getElementById("Modificar_valorActivo").style.display = "none";
});



// // boton de agregar Valor Activo
document.getElementById("Agregar_valorActivo").addEventListener("click",function(){
    $nom_val=document.getElementById("nom_valor").value;

    $est_val=document.getElementById("est_valor").value;
    
    if($nom_val !=""  && $est_val != ""){
       
                const postData = { 
                    valor:$nom_val,
                    estado:$est_val,
                    
                };
               
                try {

                    $.ajax({
                        method: "POST",
                        url: BASE_URL+"/main/addValorActivo",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                     
                        if (respuesta) 
                        {
                            document.getElementById("form_valorActivo").reset();
                            $('#modal_valorActivo').modal('hide');
                            alerta_valorActivo.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Valor Activo Registrado'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_valorActivo").DataTable().ajax.reload(null, true); 
                           
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

//editar Valor Activo
$('#table_valorActivo tbody').on( 'click', 'editValorActivo', function(){
    $("#modal_valorActivo").modal("show");
    document.getElementById("title-valorActivo").innerHTML = "Modificar Valor Activo";
    document.getElementById("form_valorActivo").reset();
    document.getElementById("Agregar_valorActivo").style.display = "none";
    document.getElementById("Modificar_valorActivo").style.display = "block";
   
    //recuperando los datos
    var table = $('#table_valorActivo').DataTable();
    var regNum = table.rows( $(this).parents('tr') ).count().toString();
    var regDat = table.rows( $(this).parents('tr') ).data().toArray();
    if (regNum == '0') {
        //console.log("error");
    }else{
        document.getElementById("id_valorActivo").value=regDat[0]["id"];
        document.getElementById("nom_valor").value=regDat[0]["valor"];
        document.getElementById("est_valor").value=regDat[0]["estado"];
     
    }
});
//guardando la nueva info
document.getElementById("Modificar_valorActivo").addEventListener("click", function(){
    
    $nom_val=document.getElementById("nom_valor").value;

    $est_val=document.getElementById("est_valor").value;
    
    if($nom_val !="" && $est_val != ""){
       
                const postData = { 
                    id:document.getElementById("id_valorActivo").value,
                    valor:$nom_val,
                    estado:$est_val,
                };
              
                try {

                    $.ajax({
                        method: "POST",
                        url: BASE_URL+"/main/updateValorActivo",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                       
                        if (respuesta) 
                        {
                            document.getElementById("form_valorActivo").reset();
                            $('#modal_valorActivo').modal('hide');
                            alerta_valorActivo.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Valor Activo Modificado'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_valorActivo").DataTable().ajax.reload(null, false); 
                           
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
