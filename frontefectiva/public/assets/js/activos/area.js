var alerta_area = document.getElementById("alert_area");
var alerta_area_empresa = document.getElementById("alert_area_empresa");
function LoadTableArea() {
    if ($.fn.DataTable.isDataTable('#table_area')){
        
        $('#table_area').DataTable().rows().remove();
        $('#table_area').DataTable().destroy();
    
    }

    $('#table_area').DataTable({
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
        ajax: BASE_URL+"/main/getAreas",
        aoColumns: [
            { "data": "id" },
            { "data": "area" },
            { "data": "estado" },
            { "defaultContent": "<editArea class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='mdi mdi-pencil font-size-18'></i></editArea>"+
            "<deleteArea class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='mdi mdi-trash-can font-size-18'></i></deleteArea>"

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
            $( 'table_area tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
        }
        
    })
   
}
function LoadTableAreaEmpresa() {
    //cargando las empresas
    $.ajax({
        method: "GET",
        url: BASE_URL+"/main/getEmpresasByActivo",
        dataType: "JSON"
    })
    .done(function(respuesta) {
       
        if (respuesta) 
        {
            let datos = respuesta;
          

            $("#select_empresa").empty();
            $("#select_empresa").append('<option value="" selected>Seleccione</option>');

           

            datos.data.forEach(dato => {
                
              
                    $("#select_empresa").append('<option value='+dato["id"]+'>'+dato["empresa"]+'</option>');

                
                
             
            });
        } 
        else
        {  }
    
    })
    .fail(function(error) {
        alert("Se produjo el siguiente error: ".err);
    })
    .always(function() {
    });
    //cargando las areas
    $.ajax({
        method: "GET",
        url: BASE_URL+"/main/getAreas",
        dataType: "JSON"
    })
    .done(function(respuesta) {
       
        if (respuesta) 
        {
            let datos = respuesta;
          

            $("#select_area").empty();
            $("#select_area").append('<option value="" selected>Seleccione</option>');

        

            datos.data.forEach(dato => {
                
            
                    $("#select_area").append('<option value='+dato["id"]+'>'+dato["area"]+'</option>');

                
                
            
            });
        } 
        else
        {  }

    })
    .fail(function(error) {
        alert("Se produjo el siguiente error: ".err);
    })
    .always(function() {
    });

    if ($.fn.DataTable.isDataTable('#table_area_empresa')){
        
        $('#table_area_empresa').DataTable().rows().remove();
        $('#table_area_empresa').DataTable().destroy();
    
    }

    $('#table_area_empresa').DataTable({
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
        ajax: BASE_URL+"/main/getAreasEmpresa",
        aoColumns: [
            { "data": "id" },
            { "data": "id_areas" },
            { "data": "id_empresa" },
            { "data": "empresa" },
            { "data": "area" },
            { "data": "estado" },
            { "defaultContent": "<editAreaEmpresa class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='mdi mdi-pencil font-size-18'></i></editAreaEmpresa>"+
            "<deleteAreaEmpresa class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='mdi mdi-trash-can font-size-18'></i></deleteAreaEmpresa>"

},
        ],
        columnDefs: [
            {
                "targets": [ 1,2 ],
                "visible": false,
                "searchable": false
            },
            
        ],
        'drawCallback': function () {
            $( 'table_area tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
        }
        
    })
   
}
document.getElementById("btnAgregar_area").addEventListener("click",function(){
                                
    $("#modal_area").modal("show");
    document.getElementById("title-area").innerHTML = "Agregar Area";
    document.getElementById("form_area").reset();
    document.getElementById("Agregar_area").style.display = "block";
    document.getElementById("Modificar_area").style.display = "none";
});

// // boton de agregar Empresa
document.getElementById("Agregar_area").addEventListener("click",function(){
    $nom_area=document.getElementById("nom_area").value;
    $est_area=document.getElementById("est_area").value;
    
    if($nom_area !=""  && $est_area != ""){
       
                const postData = { 
                     area:$nom_area,
                     estado:$est_area,                    
                };
               
                try {

                    $.ajax({
                        method: "POST",
                        url: BASE_URL+"/main/addArea",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                     
                        if (respuesta) 
                        {
                            document.getElementById("form_area").reset();
                            $('#modal_area').modal('hide');
                            alerta_area.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Area Registrada'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_area").DataTable().ajax.reload(null, false); 
                           
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
$('#table_area tbody').on( 'click', 'editArea', function(){
    $("#modal_area").modal("show");
    document.getElementById("title-area").innerHTML = "Modificar Área";
    document.getElementById("form_area").reset();
    document.getElementById("Agregar_area").style.display = "none";
    document.getElementById("Modificar_area").style.display = "block";
   
    //recuperando los datos
    var table = $('#table_area').DataTable();
    var regNum = table.rows( $(this).parents('tr') ).count().toString();
    var regDat = table.rows( $(this).parents('tr') ).data().toArray();
    if (regNum == '0') {
        //console.log("error");
    }else{
        document.getElementById("id_area").value=regDat[0]["id"];
        document.getElementById("nom_area").value=regDat[0]["area"];
        document.getElementById("est_area").value=regDat[0]["estado"];
     
    }
});
//guardando la nueva info
document.getElementById("Modificar_area").addEventListener("click", function(){
    
    $nom_area=document.getElementById("nom_area").value;
    $est_area=document.getElementById("est_area").value;
    
    
    if($nom_area !=""  && $est_area != ""){
       
                const postData = { 
                    id:document.getElementById("id_area").value,
                    area:$nom_area,
                    estado:$est_area,
                  
                };
              
                try {

                    $.ajax({
                        method: "POST",
                        url: BASE_URL+"/main/updateArea",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                       
                        if (respuesta) 
                        {
                            document.getElementById("form_area").reset();
                            $('#modal_area').modal('hide');
                            alerta_area.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Area Modificada'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_area").DataTable().ajax.reload(null, false); 
                           
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
//area empresa
document.getElementById("btnAgregar_area_empresa").addEventListener("click",function(){
                                
    $("#modal_area_empresa").modal("show");
    LoadTableAreaEmpresa();
    document.getElementById("title-area-empresa").innerHTML = "Agregar";
    document.getElementById("form_area_empresa").reset();
    document.getElementById("Agregar_area_empresa").style.display = "block";
    document.getElementById("Modificar_area_empresa").style.display = "none";
});
// // boton de agregar Area Empresa
document.getElementById("Agregar_area_empresa").addEventListener("click",function(){
    $select_empresa=document.getElementById("select_empresa").value;
    $select_area=document.getElementById("select_area").value;
    $est_area_empresa=document.getElementById("est_area_empresa").value;
    if($select_empresa !=""  && $select_area != "" && $est_area_empresa != ""){
       
                const postData = { 
                     empresa:$select_empresa,
                     area:$select_area, 
                     estado:$est_area_empresa,                    
                };
               
                try {

                    $.ajax({
                        method: "POST",
                        url: BASE_URL+"/main/addAreaEmpresa",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                     
                        if (respuesta) 
                        {
                            document.getElementById("form_area_empresa").reset();
                           
                            alerta_area_empresa.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Registrado'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_area_empresa").DataTable().ajax.reload(null, false); 
                           
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
$('#table_area_empresa tbody').on( 'click', 'editAreaEmpresa', function(){
    document.getElementById("title-area-empresa").innerHTML = "Modificar";
    document.getElementById("form_area_empresa").reset();
    document.getElementById("Agregar_area_empresa").style.display = "none";
    document.getElementById("Modificar_area_empresa").style.display = "block";
   
    //recuperando los datos
    var table = $('#table_area_empresa').DataTable();
    var regNum = table.rows( $(this).parents('tr') ).count().toString();
    var regDat = table.rows( $(this).parents('tr') ).data().toArray();
    if (regNum == '0') {
        //console.log("error");
    }else{
        document.getElementById("id_area_empresa").value=regDat[0]["id"];
        document.getElementById("select_area").value=regDat[0]["id_areas"];
        document.getElementById("select_empresa").value=regDat[0]["id_empresa"];
        document.getElementById("est_area_empresa").value=regDat[0]["estado"];
     
    }
});
//guardando la nueva info
document.getElementById("Modificar_area_empresa").addEventListener("click", function(){
    
    $select_empresa=document.getElementById("select_empresa").value;
    $select_area=document.getElementById("select_area").value;
    $est_area_empresa=document.getElementById("est_area_empresa").value;
    
    
    if($select_empresa !=""  && $select_area != "" && $est_area_empresa != ""){
       
                const postData = { 
                    id:document.getElementById("id_area_empresa").value,
                    empresa:$select_empresa,
                    area:$select_area, 
                    estado:$est_area_empresa,   
                  
                };
              
                try {

                    $.ajax({
                        method: "POST",
                        url: BASE_URL+"/main/updateAreaEmpresa",
                        data: postData,
                        dataType: "JSON"
                    })
                    .done(function(respuesta) {
                       
                        if (respuesta) 
                        {
                            document.getElementById("form_area_empresa").reset();
                            
                            alerta_area_empresa.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                            'Modificado'+
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                            '</div>';
                            $("#table_area_empresa").DataTable().ajax.reload(null, false); 
                           
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

document.getElementById("btnBuscar_area").addEventListener("click",function(){
                                
    $("#modal_busca_area").modal("show");
   
});