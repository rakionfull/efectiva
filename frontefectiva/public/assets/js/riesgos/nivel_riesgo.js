var alerta_nivel_riesgo = document.getElementById("alerta_nivel_riesgo");

function loadTableNivelRiesgo(){
    if ($.fn.DataTable.isDataTable('#table_nivel_riesgo')){
        $('#table_nivel_riesgo').DataTable().rows().remove();
        $('#table_nivel_riesgo').DataTable().destroy();
    }

    $('#table_nivel_riesgo').DataTable({
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
        ajax: BASE_URL+"/main/getNivelRiesgo",
        aoColumns: [
            { "data": "id" },
            { "data": "operador1" },
            { "data": "valor1" },
            { "data": "operador2" },
            { "data": "valor2" },
            {
                "data": null,
                "className":"td-color-riesgo",
                "mRender":function(data){
                    return `<p class="text-color-riesgo" style="background:${data.color}"></p>`
                }
            },
            { "data": "descripcion" },
            { "data": "comentario" },
            {
                "data": null,
                "mRender":function(data){
                    if(data.estado == "1"){
                        return 'Activo'
                    }else{
                        return 'Inactivo'
                    }
                }
            },
            {
                data:null,
                "mRender":function(data){
                    return `<editNivel data-id="${data.id}" class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='mdi mdi-pencil font-size-18'></i></editNivel>
                    <deleteNivel data-id="${data.id}" class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='mdi mdi-trash-can font-size-18'></i></deleteNivel>`
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
            $( 'table_nivel_riesgo tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
        }
        
    })
}

document.getElementById("btn_add_nivel_riesgo").addEventListener("click",function(){              
    $("#modal_nivel_riesgo").modal("show");
    document.getElementById("title_nivel_riesgo").innerHTML = "Agregar Nivel de Riesgo";
    document.getElementById("form_nivel_riesgo").reset();
    document.getElementById("add_nivel_riesgo").style.display = "block";
    document.getElementById("update_nivel_riesgo").style.display = "none";
});

document.getElementById("add_nivel_riesgo").addEventListener('click',function(){
    $operador_1=$('#modal_nivel_riesgo #operador_1').val()
    $valor_1=$('#modal_nivel_riesgo #valor_1').val()
    $operador_2=$('#modal_nivel_riesgo #operador_2').val()
    $valor_2=$('#modal_nivel_riesgo #valor_2').val()
    $color=$('#modal_nivel_riesgo #color').val()
    $estado=$('#modal_nivel_riesgo #estado').val()
    $descripcion=$('#modal_nivel_riesgo #descripcion').val()
    $comentario=$('#modal_nivel_riesgo #comentario').val()
    if(
        $operador_1 != "" &&
        $valor_1 != "" &&
        $operador_2 != "" &&
        $valor_2 != "" &&
        $color != "" &&
        $estado != "" &&
        $descripcion != "" &&
        $comentario != ""
    ){
        const postData = { 
            operador1:$operador_1,
            valor1:$valor_1,
            operador2:$operador_2,
            valor2:$valor_2,
            color:$color,
            estado:$estado,
            descripcion:$descripcion,
            comentario:$comentario
        };
        try {
            $.ajax({
                method: "POST",
                url: BASE_URL+"/main/addNivelRiesgo",
                data: postData,
                dataType: "JSON"
            })
            .done(function(respuesta) {
                if (respuesta) 
                {
                    document.getElementById("form_nivel_riesgo").reset();
                    $('#modal_nivel_riesgo').modal('hide');
                    alerta_nivel_riesgo.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                    'Se ha guardado exitosamente'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                        '</button>'+
                    '</div>';
                    $("#table_nivel_riesgo").DataTable().ajax.reload(null, false); 
                   
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
$('#table_nivel_riesgo tbody').on( 'click', 'editNivel', function(event){
    $("#modal_nivel_riesgo").modal("show");
    $('#modal_nivel_riesgo #title_nivel_riesgo').html('Modificar Nivel de Riesgo')
    document.getElementById("form_nivel_riesgo").reset();
    document.getElementById("add_nivel_riesgo").style.display = "none";
    document.getElementById("update_nivel_riesgo").style.display = "block";
    $.ajax({
        method: "GET",
        url: BASE_URL+"/main/showNivelRiesgo/"+Number(event.currentTarget.getAttribute('data-id')),
        dataType: "JSON",
    })
    .done(function(respuesta) {
        console.log(respuesta)
        if (respuesta.data != null) 
        {
            document.getElementById("id_nivel_riesgo").value=event.currentTarget.getAttribute('data-id');
            $('#modal_nivel_riesgo #operador_1').val(respuesta.data[0].operador1)
            $('#modal_nivel_riesgo #valor_1').val(respuesta.data[0].valor1)
            $('#modal_nivel_riesgo #operador_2').val(respuesta.data[0].operador2)
            $('#modal_nivel_riesgo #valor_2').val(respuesta.data[0].valor2)
            $('#modal_nivel_riesgo #color').val(respuesta.data[0].color)
            $('#modal_nivel_riesgo #estado').val(respuesta.data[0].estado)
            $('#modal_nivel_riesgo #descripcion').val(respuesta.data[0].descripcion)
            $('#modal_nivel_riesgo #comentario').val(respuesta.data[0].comentario)
        } 
        
    })
    .fail(function(error) {
        console.log(error)
    })
});

$('#table_nivel_riesgo tbody').on( 'click', 'deleteNivel', function(event){

    //recuperando los datos
    let id = event.currentTarget.getAttribute('data-id')
    Swal.fire({
        title: 'Desea eliminar el nivel de riesgo?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        denyButtonText: `Cancel`,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: "DELETE",
                url: BASE_URL+"/main/deleteNivelRiesgo/"+Number(id),
                dataType: "JSON"
            })
            .done(function(respuesta) {
                if (respuesta) 
                {
                    alerta_tipo_riesgo.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                    'Se ha eliminado satisfactoriamente'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                        '</button>'+
                    '</div>';
                    $("#table_nivel_riesgo").DataTable().ajax.reload(null, false); 
                   
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

document.getElementById("update_nivel_riesgo").addEventListener("click", function(){
    $operador_1=$('#modal_nivel_riesgo #operador_1').val()
    $valor_1=$('#modal_nivel_riesgo #valor_1').val()
    $operador_2=$('#modal_nivel_riesgo #operador_2').val()
    $valor_2=$('#modal_nivel_riesgo #valor_2').val()
    $color=$('#modal_nivel_riesgo #color').val()
    $estado=$('#modal_nivel_riesgo #estado').val()
    $descripcion=$('#modal_nivel_riesgo #descripcion').val()
    $comentario=$('#modal_nivel_riesgo #comentario').val()
    const id = Number(document.getElementById("id_nivel_riesgo").value)
    if(
        $operador_1 != "" &&
        $valor_1 != "" &&
        $operador_2 != "" &&
        $valor_2 != "" &&
        $color != "" &&
        $estado != "" &&
        $descripcion != "" &&
        $comentario != ""
    ){
        const postData = {
            operador1:$operador_1,
            valor1:$valor_1,
            operador2:$operador_2,
            valor2:$valor_2,
            color:$color,
            estado:$estado,
            descripcion:$descripcion,
            comentario:$comentario
        };
        try {
            $.ajax({
                method: "POST",
                url: BASE_URL+"/main/updateNivelRiesgo/"+id,
                data: postData,
                dataType: "JSON"
            })
            .done(function(respuesta) {
                if (respuesta) 
                {
                    document.getElementById("form_nivel_riesgo").reset();
                    $('#modal_nivel_riesgo').modal('hide');
                    alerta_nivel_riesgo.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                    'Se ha modificado exitosamente'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                        '</button>'+
                    '</div>';
                    $("#table_nivel_riesgo").DataTable().ajax.reload(null, false); 
                   
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

$('#modal_nivel_riesgo #comentario').on('input',function(){
    console.log(this.value.length)
    if (this.value.length > 2000) 
       this.value = this.value.slice(0,2000); 
})
