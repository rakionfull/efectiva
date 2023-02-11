var alerta_desc_vulnerabilidad = document.getElementById("alerta_desc_vulnerabilidad");

function loadTableDescVulnerabilidad(){
    if ($.fn.DataTable.isDataTable('#table_desc_vulnerabilidad')){
        $('#table_desc_vulnerabilidad').DataTable().rows().remove();
        $('#table_desc_vulnerabilidad').DataTable().destroy();
    }

    $('#table_desc_vulnerabilidad').DataTable({
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
        responsive: false,
        autoWidth: false,
        // processing: true,
        lengthMenu:[5,10,25,50],
        pageLength:5,
        clickToSelect:false,
        ajax: BASE_URL+"/main/getDescVulnerabilidad",
        aoColumns: [
            { "data": "id" },
            { "data": "vulnerabilidad" },
            {
                data:null,
                "mRender":function(data){
                    return `<editVulnerabilidad data-id="${data.id}" class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='mdi mdi-pencil font-size-18'></i></editVulnerabilidad>
                    <deleteVulnerabilidad data-id="${data.id}" class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='mdi mdi-trash-can font-size-18'></i></deleteVulnerabilidad>`
                }
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
            $( 'table_desc_vulnerabilidad tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
        }
        
    })
}

document.getElementById("btn_add_desc_vulnerabilidad").addEventListener("click",function(){
    $('#modal_desc_vulnerabilidad #id_categoria_vulnerabilidad option').remove()

    $.ajax({
        method: "GET",
        url: BASE_URL+"/main/getCategoriasVulnerabilidad",
        dataType: "JSON"
    })
    .done(function(respuesta) {
        if (respuesta) 
        {
            let options = ''
            $("#modal_desc_vulnerabilidad").modal("show");
            document.getElementById("title_desc_vulnerabilidad").innerHTML = "Agregar Descripcion de Vulnerabilidad";
            document.getElementById("form_desc_vulnerabilidad").reset();
            document.getElementById("add_desc_vulnerabilidad").style.display = "block";
            document.getElementById("update_desc_vulnerabilidad").style.display = "none";
            respuesta.data.forEach(item => {
                options += `<option value="${item.id}">${item.categoria}</option>`
            });
            $('#modal_desc_vulnerabilidad #id_categoria_vulnerabilidad').append(options)
        } 
        
    })
    .fail(function(error) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudo guardar, intente de nuevo. Si el problema persiste, contacte con el administrador del sistema.'
        })
    })         
    
});

document.getElementById("add_desc_vulnerabilidad").addEventListener('click',function(){
    $id_categoria=$('#modal_desc_vulnerabilidad #id_categoria_vulnerabilidad').val()
    $vulnerabilidad=$('#modal_desc_vulnerabilidad #vulnerabilidad').val()
    if(
        $id_categoria != "" &&
        $vulnerabilidad != ""
    ){
        const postData = { 
            idcategoria:$id_categoria,
            vulnerabilidad:$vulnerabilidad,
        };
        try {
            $.ajax({
                method: "POST",
                url: BASE_URL+"/main/addDescVulnerabilidad",
                data: postData,
                dataType: "JSON"
            })
            .done(function(respuesta) {
                if (respuesta) 
                {
                    document.getElementById("form_desc_vulnerabilidad").reset();
                    $('#modal_desc_vulnerabilidad').modal('hide');
                    alerta_desc_vulnerabilidad.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                    'Se ha guardado exitosamente'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                        '</button>'+
                    '</div>';
                    $("#table_desc_vulnerabilidad").DataTable().ajax.reload(null, false); 
                   
                } 
                
            })
            .fail(function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo guardar, intente de nuevo. Si el problema persiste, contacte con el administrador del sistema.'
                })
            })
            .always(function() {
            });
        }
        catch(err) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se pudo guardar, intente de nuevo. Si el problema persiste, contacte con el administrador del sistema.'
            })
        }

    }else{
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Faltan Datos'
        })
    }
})

//editar Empresa
$('#table_desc_vulnerabilidad tbody').on( 'click', 'editVulnerabilidad', function(event){
    $('#modal_desc_vulnerabilidad #id_categoria_vulnerabilidad option').remove()
    $.ajax({
        method: "GET",
        url: BASE_URL+"/main/getCategoriasVulnerabilidad",
        dataType: "JSON"
    })
    .done(function(respuesta) {
        if (respuesta) 
        {
            let options = ''
            $('#modal_desc_vulnerabilidad #title_desc_vulnerabilidad').html('Modificar Descripción de vulnerabilidad')
            document.getElementById("form_desc_vulnerabilidad").reset();
            document.getElementById("add_desc_vulnerabilidad").style.display = "none";
            document.getElementById("update_desc_vulnerabilidad").style.display = "block";
            respuesta.data.forEach(item => {
                options += `<option value="${item.id}">${item.categoria}</option>`
            });
            $('#modal_desc_vulnerabilidad #id_categoria_vulnerabilidad').append(options)

            $.ajax({
                method: "GET",
                url: BASE_URL+"/main/showDescVulnerabilidad/"+Number(event.currentTarget.getAttribute('data-id')),
                dataType: "JSON",
            })
            .done(function(respuesta) {
                console.log(respuesta)
                if (respuesta.data != null) 
                {
                    $("#modal_desc_vulnerabilidad").modal("show");
                    document.getElementById("id_desc_vulnerabilidad").value=event.currentTarget.getAttribute('data-id');
                    $('#modal_desc_vulnerabilidad #id_categoria_vulnerabilidad').val(respuesta.data[0].idcategoria)
                    $('#modal_desc_vulnerabilidad #vulnerabilidad').val(respuesta.data[0].vulnerabilidad)
                } 
                
            })
            .fail(function(error) {
                console.log(error)
            })
            $("#modal_desc_vulnerabilidad").modal("show");

        } 
        
    })
    .fail(function(error) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudo guardar, intente de nuevo. Si el problema persiste, contacte con el administrador del sistema.'
        })
    })
    
});

$('#table_desc_vulnerabilidad tbody').on( 'click', 'deleteVulnerabilidad', function(event){

    //recuperando los datos
    let id = event.currentTarget.getAttribute('data-id')
    Swal.fire({
        title: 'Desea eliminar la descripcion de vulnerabilidad?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        denyButtonText: `Cancel`,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: "DELETE",
                url: BASE_URL+"/main/deleteDescVulnerabilidad/"+Number(id),
                dataType: "JSON"
            })
            .done(function(respuesta) {
                if (respuesta) 
                {
                    alerta_desc_vulnerabilidad.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                    'Se ha eliminado satisfactoriamente'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                        '</button>'+
                    '</div>';
                    $("#table_desc_vulnerabilidad").DataTable().ajax.reload(null, false); 
                   
                } 
                
            })
            .fail(function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo eliminar, intente de nuevo. Si el problema persiste, contacte con el administrador del sistema.'
                })
            })
            .always(function() {
            });
        } else if (result.isDenied) {
            Swal.fire('No hubo ningún cambio', '', 'info')
        }
    })
    
});

document.getElementById("update_desc_vulnerabilidad").addEventListener("click", function(){
    $id_categoria=$('#modal_desc_vulnerabilidad #id_categoria_vulnerabilidad').val()
    $vulnerabilidad=$('#modal_desc_vulnerabilidad #vulnerabilidad').val()
    const id = Number(document.getElementById("id_desc_vulnerabilidad").value)
    if(
        $id_categoria != "" &&
        $vulnerabilidad != "" 
    ){
        const postData = {
            idcategoria:$id_categoria,
            vulnerabilidad:$vulnerabilidad
        };
        try {
            $.ajax({
                method: "POST",
                url: BASE_URL+"/main/updateDescVulnerabilidad/"+id,
                data: postData,
                dataType: "JSON"
            })
            .done(function(respuesta) {
                if (respuesta) 
                {
                    document.getElementById("form_desc_vulnerabilidad").reset();
                    $('#modal_desc_vulnerabilidad').modal('hide');
                    alerta_desc_vulnerabilidad.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                    'Se ha modificado exitosamente'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                        '</button>'+
                    '</div>';
                    $("#table_desc_vulnerabilidad").DataTable().ajax.reload(null, false); 
                   
                } 
                
            })
            .fail(function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo guardar, intente de nuevo. Si el problema persiste, contacte con el administrador del sistema.'
                })
            })
            .always(function() {
            });
        }
        catch(err) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se pudo guardar, intente de nuevo. Si el problema persiste, contacte con el administrador del sistema.'
            })
        }

    }else{
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Faltan Datos'
        })
    }
});