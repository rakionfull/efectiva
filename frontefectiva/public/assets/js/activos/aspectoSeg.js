var alerta_aspectoSeg = document.getElementById("alert_aspectoSeg");
function LoadTableAspectoSeg() {
    if ($.fn.DataTable.isDataTable('#table_aspectoSeg')){
        
        $('#table_aspectoSeg').DataTable().rows().remove();
        $('#table_aspectoSeg').DataTable().destroy();
    
    }

    $('#table_aspectoSeg').DataTable({
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
        ajax: BASE_URL+"/main/getAspectoSeg",
        aoColumns: [
            { "data": "id" },
            { "data": "aspecto" },
            { "data": "estado" },
            { "defaultContent": "<editAspectoSeg class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='mdi mdi-pencil font-size-18'></i></editAspectoSeg>"+
            "<deleteAspectoSeg class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='mdi mdi-trash-can font-size-18'></i></deleteAspectoSeg>"

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
            $( 'table_aspectoSeg tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
        }
        
    })
   
}

document.getElementById("btnAgregar_AspectoSeg").addEventListener("click",function(){
                                
    $("#modal_aspectoSeg").modal("show");
    document.getElementById("title-aspectoSeg").innerHTML = "Agregar Aspectos de Seguridad";
    document.getElementById("form_aspectoSeg").reset();
    document.getElementById("Agregar_AspectoSeg").style.display = "block";
    document.getElementById("Modificar_AspectoSeg").style.display = "none";
});


// // boton de agregar Aspectos de Seguridad
document.getElementById("Agregar_AspectoSeg").addEventListener("click",function(){
    $nom_asp=document.getElementById("nom_aspecto").value;

    $est_asp=document.getElementById("est_aspecto").value;
    
    if($nom_asp !=""  && $est_asp != ""){
       
                const postData = { 
                    aspecto:$nom_asp,
                    estado:$est_asp,
                    
                };
               
                try {

                    $.ajax({
                        method: "POST",
                        url: BASE_URL+"/main/addAspectoSeg",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                     
                        if (respuesta) 
                        {
                            document.getElementById("form_aspectoSeg").reset();
                            $('#modal_aspectoSeg').modal('hide');
                            alerta_aspectoSeg.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Aspecto Registrado'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_aspectoSeg").DataTable().ajax.reload(null, false); 
                           
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

//editar Aspecto de Seguridad
$('#table_aspectoSeg tbody').on( 'click', 'editAspectoSeg', function(){
    $("#modal_aspectoSeg").modal("show");
    document.getElementById("title-aspectoSeg").innerHTML = "Modificar Aspectos de Seguridad";
    document.getElementById("form_aspectoSeg").reset();
    document.getElementById("Agregar_AspectoSeg").style.display = "none";
    document.getElementById("Modificar_AspectoSeg").style.display = "block";
   
    //recuperando los datos
    var table = $('#table_aspectoSeg').DataTable();
    var regNum = table.rows( $(this).parents('tr') ).count().toString();
    var regDat = table.rows( $(this).parents('tr') ).data().toArray();
    if (regNum == '0') {
        //console.log("error");
    }else{
        document.getElementById("id_aspecto").value=regDat[0]["id"];
        document.getElementById("nom_aspecto").value=regDat[0]["aspecto"];
        document.getElementById("est_aspecto").value=regDat[0]["estado"];
     
    }
});

//guardando la nueva info
document.getElementById("Modificar_AspectoSeg").addEventListener("click", function(){
    
    $nom_asp=document.getElementById("nom_aspecto").value;

    $est_asp=document.getElementById("est_aspecto").value;
    
    if($nom_asp !="" && $est_asp != ""){
       
                const postData = { 
                    id:document.getElementById("id_aspecto").value,
                    aspecto:$nom_asp,
                    estado:$est_asp,
                };
              
                try {

                    $.ajax({
                        method: "POST",
                        url: BASE_URL+"/main/updateAspectoSeg",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                       
                        if (respuesta) 
                        {
                            document.getElementById("form_aspectoSeg").reset();
                            $('#modal_aspectoSeg').modal('hide');
                            alerta_aspectoSeg.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Aspecto de Seguridad Modificado'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_aspectoSeg").DataTable().ajax.reload(null, false); 
                           
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
