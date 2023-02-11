var alerta_empresa = document.getElementById("alerta_empresa");
function LoadTableEmpresa() {
    if ($.fn.DataTable.isDataTable('#table_empresa')){
        
        $('#table_empresa').DataTable().rows().remove();
        $('#table_empresa').DataTable().destroy();
    
    }

    $('#table_empresa').DataTable({
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
        ajax: BASE_URL+"/main/getEmpresas",
        aoColumns: [
            { "data": "id" },
            { "data": "empresa" },
            { "data": "estado" },
            { "defaultContent": "<editEmpresa class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='mdi mdi-pencil font-size-18'></i></editEmpresa>"+
            "<deleteEmpresa class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='mdi mdi-trash-can font-size-18'></i></deleteEmpresa>"

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
            $( 'table_empresa tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
        }
        
    })
   
}
document.getElementById("btnAgregar_Empresa").addEventListener("click",function(){
                                
    $("#modal_empresa").modal("show");
    document.getElementById("title-empresa").innerHTML = "Agregar Empresa";
    document.getElementById("form_empresa").reset();
    document.getElementById("Agregar_Empresa").style.display = "block";
    document.getElementById("Modificar_Empresa").style.display = "none";
});

// // boton de agregar Empresa
document.getElementById("Agregar_Empresa").addEventListener("click",function(){
    $nom_emp=document.getElementById("nom_empresa").value;

    $est_emp=document.getElementById("est_empresa").value;
    
    if($nom_emp !=""  && $est_emp != ""){
       
                const postData = { 
                    empresa:$nom_emp,
                    estado:$est_emp,
                    
                };
               
                try {

                    $.ajax({
                        method: "POST",
                        url: BASE_URL+"/main/addEmpresa",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                     
                        if (respuesta) 
                        {
                            document.getElementById("form_empresa").reset();
                            $('#modal_empresa').modal('hide');
                            alerta_empresa.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Empresa Registrada'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_empresa").DataTable().ajax.reload(null, false); 
                           
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
$('#table_empresa tbody').on( 'click', 'editEmpresa', function(){
    $("#modal_empresa").modal("show");
    document.getElementById("title-empresa").innerHTML = "Modificar Empresa";
    document.getElementById("form_empresa").reset();
    document.getElementById("Agregar_Empresa").style.display = "none";
    document.getElementById("Modificar_Empresa").style.display = "block";
   
    //recuperando los datos
    var table = $('#table_empresa').DataTable();
    var regNum = table.rows( $(this).parents('tr') ).count().toString();
    var regDat = table.rows( $(this).parents('tr') ).data().toArray();
    if (regNum == '0') {
        //console.log("error");
    }else{
        document.getElementById("id_empresa").value=regDat[0]["id"];
        document.getElementById("nom_empresa").value=regDat[0]["empresa"];
        document.getElementById("est_empresa").value=regDat[0]["estado"];
     
    }
});
//guardando la nueva info
document.getElementById("Modificar_Empresa").addEventListener("click", function(){
    
    $nom_emp=document.getElementById("nom_empresa").value;

    $est_emp=document.getElementById("est_empresa").value;
    
    if($nom_emp !="" && $est_emp != ""){
       
                const postData = { 
                    id:document.getElementById("id_empresa").value,
                    empresa:$nom_emp,
                    estado:$est_emp,
                };
              
                try {

                    $.ajax({
                        method: "POST",
                        url: BASE_URL+"/main/updateEmpresa",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                       
                        if (respuesta) 
                        {
                            document.getElementById("form_empresa").reset();
                            $('#modal_empresa').modal('hide');
                            alerta_empresa.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Empresa Modificada'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_empresa").DataTable().ajax.reload(null, false); 
                           
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
