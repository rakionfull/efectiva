
console.log(count)
if(document.getElementById('escenario-2-tab')){
    document.getElementById('escenario-2-tab').addEventListener('click',function(){
        if(document.getElementById('btn_add_probabilidad_riesgo_escenario_1')){
            document.getElementById('btn_add_probabilidad_riesgo_escenario_1').style.display = 'none'
        }
        document.getElementById('btn_add_probabilidad_riesgo_escenario_2').style.display = 'block'
    })
}
if(document.getElementById('escenario-1-tab')){
    document.getElementById('escenario-1-tab').addEventListener('click',function(){
        if( count < 1){
            document.getElementById('btn_add_probabilidad_riesgo_escenario_1').style.display = 'block'
        }
    
        document.getElementById('btn_add_probabilidad_riesgo_escenario_2').style.display = 'none'
    })
}
var alerta_probabilidad_riesgo = document.getElementById("alerta_probabilidad_riesgo");

function loadTableProabilidadRiesgo(){
    console.log('111')
    if ($.fn.DataTable.isDataTable('#table_probabilidad_riesgo_1')){
        $('#table_probabilidad_riesgo_1').DataTable().rows().remove();
        $('#table_probabilidad_riesgo_1').DataTable().destroy();
    }

    $('#table_probabilidad_riesgo_1').DataTable({
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
        ajax: BASE_URL+"/main/getProbabilidadRiesgo/1",
        aoColumns: [
            { "data": "id" },
            { "data": "descripcion" },
            { "data": "tipo_regla" },
            { "data": "tipo_valor" },
            { "data": "formula" },
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
                    return `<editProbabilidad data-id="${data.id}" class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='mdi mdi-pencil font-size-18'></i></editProbabilidad>
                    <deleteProbabilidad data-id="${data.id}" class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='mdi mdi-trash-can font-size-18'></i></deleteProbabilidad>`
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
            $( 'table_probabilidad_riesgo_1 tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
        }
        
    })
}
function loadTableProabilidadRiesgo2(){
    console.log('22')

    if ($.fn.DataTable.isDataTable('#table_probabilidad_riesgo_2')){
        $('#table_probabilidad_riesgo_2').DataTable().rows().remove();
        $('#table_probabilidad_riesgo_2').DataTable().destroy();
    }

    $('#table_probabilidad_riesgo_2').DataTable({
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
        ajax: BASE_URL+"/main/getProbabilidadRiesgo/2",
        aoColumns: [
            { "data": "id" },
            { "data": "descripcion" },
            { "data": "tipo_regla" },
            { "data": "tipo_valor" },
            { "data": "formula" },
            { "data": "operador1" },
            { "data": "valor1" },
            { "data": "operador2" },
            { "data": "valor2" },
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
                    return `<editProbabilidad data-id="${data.id}" class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='mdi mdi-pencil font-size-18'></i></editProbabilidad>
                    <deleteProbabilidad data-id="${data.id}" class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='mdi mdi-trash-can font-size-18'></i></deleteProbabilidad>`
                }
            },
        ],
        columnDefs: [
            {
                "targets": [ 11 ],
                "visible": true,
                "searchable": false
            },
            
        ],
        'drawCallback': function () {
            $( 'table_probabilidad_riesgo_2 tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
        }
        
    })
}
if(document.getElementById("btn_add_probabilidad_riesgo_escenario_1")){
    document.getElementById("btn_add_probabilidad_riesgo_escenario_1").addEventListener("click",function(){              
        $("#modal_probabilidad_riesgo_escenario_1").modal("show");
        document.getElementById("title_prob_riesgo_esc_1").innerHTML = "Registro Probabilidad de Riesgo";
        document.getElementById("form_probabilidad_riesgo_escenario_1").reset();
        document.getElementById("add_probabilidad_riego_escenario_1").style.display = "block";
        document.getElementById("update_probabilidad_riego_escenario_1").style.display = "none";
        if(count > 0){
            $('.escene_2').css('display','none')
            $("#modal_probabilidad_riesgo_escenario_1 #tipo_regla_1").val('1 Valor')
        }else{
            $('.escene_2').css('display','block')
            $("#modal_probabilidad_riesgo_escenario_1 #tipo_regla_1").val('2 Valores')

        }
        if(count == 0){
            $('.escene_2').css('display','none')
            $("#modal_probabilidad_riesgo_escenario_1 #tipo_regla_1").val('1 Valor')
        }
        if(count_2 > 0){
            $('.escene_2').css('display','block')
            $("#modal_probabilidad_riesgo_escenario_1 #tipo_regla_1").val('2 Valores')
        }
        if(count_2 == 0){
            $('#modal_probabilidad_riesgo_escenario_1 .escene_2').css('display','block')
            $("#modal_probabilidad_riesgo_escenario_1 #tipo_regla_1").val('2 Valores')
        }
        
    });
}
$('#modal_probabilidad_riesgo_escenario_1 #tipo_valor_1').on('change',function(){
    const val = $('#modal_probabilidad_riesgo_escenario_1 #tipo_valor_1').val()
    
    if(val == "Formula"){
        $('#modal_probabilidad_riesgo_escenario_1 .formula_1_probabilidad').css('display','block')
    }else{
        $('#modal_probabilidad_riesgo_escenario_1 .formula_1_probabilidad').css('display','none')
    }
})
$('#tipo_regla_1').on('change',function(){
    const val = $('#tipo_regla_1').val()
    if(val == "1 Valor"){
        $('.escene_2').css('display','none')
    }else{
        $('.escene_2').css('display','block')
    }
})

document.getElementById("add_probabilidad_riego_escenario_1").addEventListener('click',function(){
    $descripcion=document.getElementById("descripcion_1").value;
    $tipo_regla=document.getElementById("tipo_regla_1").value;
    $tipo_valor=document.getElementById("tipo_valor_1").value;
    $estado=document.getElementById("estado_1").value;
    $comentario=document.getElementById("comentario_1").value;
    $operador_1 = ''
    $operador_2 = ''
    $valor_1 = ''
    $valor_2 = ''
    $formula = ''

    let passValidation = false
    if(document.getElementById('operador_2')){
        $operador_2=document.getElementById("operador_2").value;
    }
    if(document.getElementById('operador_1')){
        $operador_1=document.getElementById("operador_1").value;
    }
    if(document.getElementById('valor_1')){
        $valor_1=document.getElementById("valor_1").value;
    }
    if(document.getElementById('valor_2')){
        $valor_2=document.getElementById("valor_2").value;
    }
    if($tipo_valor == "Formula"){
        $formula = $("#modal_probabilidad_riesgo_escenario_1 #formula_1").val()
    }
    var postData = {}
    let uri = ''
    $view = 1
    if($tipo_regla == "1 Valor"){
        if($descripcion != "" && $tipo_regla != "" && $tipo_valor != "" && $estado != "" && $comentario != ""){
            passValidation = true
            postData = { 
                descripcion:$descripcion,
                tipo_regla:$tipo_regla,
                tipo_valor:$tipo_valor,
                estado:$estado,
                comentario:$comentario,
                formula:$formula
            };
            uri = BASE_URL+"/main/addProbabilidadRiesgo1"
            $view = 1
        }
    }else{
        if($descripcion != "" &&
        $tipo_regla != "" &&
        $tipo_valor != "" &&
        $estado != "" &&
        $operador_1 != "" &&
        $valor_1 != "" &&
        $valor_2 != "" &&
        $comentario != ""
        ){
            passValidation = true
            postData = { 
                descripcion:$descripcion,
                tipo_regla:$tipo_regla,
                tipo_valor:$tipo_valor,
                estado:$estado,
                operador1:$operador_1,
                valor1:$valor_1,
                operador2:$operador_2,
                valor2:$valor_2,
                comentario:$comentario,
                formula:$formula
            };
            uri = BASE_URL+"/main/addProbabilidadRiesgo2"
            $view = 2
        }
    }
    if(passValidation){
        try {
            $.ajax({
                method: "POST",
                url: uri,
                data: postData,
                dataType: "JSON"
            })
            .done(function(respuesta) {
                console.log(respuesta)
                if (respuesta == true) 
                {
                    console.log($view)
                    document.getElementById("form_probabilidad_riesgo_escenario_1").reset();
                    $('#modal_probabilidad_riesgo_escenario_1').modal('hide');
                    alerta_probabilidad_riesgo.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                    'Se ha guardado exitosamente'+
                    '<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                        '</button>'+
                    '</div>';
                    $("#table_probabilidad_riesgo_"+$view).DataTable().ajax.reload(null, false); 
                    if($view == 1){
                        $('#btn_add_probabilidad_riesgo_escenario_1').css('display','none')
                        $('#escenario-1-tab-pane').addClass('show')
                        $('#escenario-1-tab-pane').addClass('active')
                        $('#escenario-2-tab-pane').removeClass('show')
                        $('#escenario-2-tab-pane').removeClass('active')
                        $('#escenario-2-tab').css('display','none')
                        $('#escenario-1-tab').css('display','block')
                        $('#escenario-1-tab').addClass('active')
                    }else{
                        $('#btn_add_probabilidad_riesgo_escenario_1').css('display','block')
                        $('#escenario-2-tab-pane').addClass('show')
                        $('#escenario-2-tab-pane').addClass('active')
                        $('#escenario-1-tab-pane').removeClass('show')
                        $('#escenario-1-tab-pane').removeClass('active')
                        $('#escenario-1-tab').css('display','none')
                        $('#escenario-2-tab').css('display','block')
                        $('#escenario-2-tab').addClass('active')

                    }
                    $('#escenario-'+$view+'-tab-pane').click()
                    count += 1;
                } else{
                    $('#modal_probabilidad_riesgo_escenario_1').modal('hide');
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: respuesta
                    })
                }
                
            })
            .fail(function(error) {
                $('#modal_probabilidad_riesgo_escenario_1').modal('hide');
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

$('#table_probabilidad_riesgo_1 tbody').on( 'click', 'editProbabilidad', function(event){
    $("#modal_probabilidad_riesgo_escenario_1").modal("show");
    console.log(event.currentTarget.getAttribute('data-id'))

    document.getElementById("title_prob_riesgo_esc_1").innerHTML = "Modificar Probabilidad de Riesgo";
    document.getElementById("form_probabilidad_riesgo_escenario_1").reset();
    document.getElementById("add_probabilidad_riego_escenario_1").style.display = "none";
    document.getElementById("update_probabilidad_riego_escenario_1").style.display = "block";
    $("#modal_probabilidad_riesgo_escenario_1 .escene_2").hide();
   
    $.ajax({
        method: "GET",
        url: BASE_URL+"/main/showProbabilidadRiesgo/"+Number(event.currentTarget.getAttribute('data-id')),
        dataType: "JSON",
    })
    .done(function(respuesta) {
        console.log(respuesta)
        if (respuesta.data != null) 
        {
            document.getElementById("id_nivel_riesgo").value=event.currentTarget.getAttribute('data-id');
            $('#modal_probabilidad_riesgo_escenario_1 #descripcion_1').val(respuesta.data[0].descripcion)
            $('#modal_probabilidad_riesgo_escenario_1 #tipo_regla_1').val(respuesta.data[0].tipo_regla)
            $('#modal_probabilidad_riesgo_escenario_1 #tipo_valor_1').val(respuesta.data[0].tipo_valor)
            $('#modal_probabilidad_riesgo_escenario_1 #operador_1').val(respuesta.data[0].operador1)
            $('#modal_probabilidad_riesgo_escenario_1 #estado_1').val(respuesta.data[0].estado)
            $('#modal_probabilidad_riesgo_escenario_1 #comentario_1').val(respuesta.data[0].comentario)
            $("#modal_probabilidad_riesgo_escenario_1 #formula_1").val(respuesta.data[0].formula);

        } 
        
    })
    .fail(function(error) {
        console.log(error)
    })
});
$('#table_probabilidad_riesgo_2 tbody').on( 'click', 'editProbabilidad', function(event){

    $("#modal_probabilidad_riesgo_escenario_1").modal("show");
    $("#modal_probabilidad_riesgo_escenario_1 .escene_2").show();

    document.getElementById("title_prob_riesgo_esc_1").innerHTML = "Modificar Probabilidad de Riesgo";
    document.getElementById("form_probabilidad_riesgo_escenario_1").reset();
    document.getElementById("add_probabilidad_riego_escenario_1").style.display = "none";
    document.getElementById("update_probabilidad_riego_escenario_1").style.display = "block";
   
    $.ajax({
        method: "GET",
        url: BASE_URL+"/main/showProbabilidadRiesgo/"+Number(event.currentTarget.getAttribute('data-id')),
        dataType: "JSON",
    })
    .done(function(respuesta) {
        console.log(respuesta)
        if (respuesta.data != null) 
        {
            document.getElementById("id_nivel_riesgo").value=event.currentTarget.getAttribute('data-id');
            $('#modal_probabilidad_riesgo_escenario_1 #descripcion_1').val(respuesta.data[0].descripcion)
            $('#modal_probabilidad_riesgo_escenario_1 #tipo_regla_1').val(respuesta.data[0].tipo_regla)
            $('#modal_probabilidad_riesgo_escenario_1 #tipo_valor_1').val(respuesta.data[0].tipo_valor)
            $('#modal_probabilidad_riesgo_escenario_1 #operador_1').val(respuesta.data[0].operador1)
            $('#modal_probabilidad_riesgo_escenario_1 #operador_2').val(respuesta.data[0].operador2)
            $('#modal_probabilidad_riesgo_escenario_1 #valor_1').val(respuesta.data[0].valor1)
            $('#modal_probabilidad_riesgo_escenario_1 #valor_2').val(respuesta.data[0].valor2)
            $('#modal_probabilidad_riesgo_escenario_1 #estado_1').val(respuesta.data[0].estado)
            $('#modal_probabilidad_riesgo_escenario_1 #comentario_1').val(respuesta.data[0].comentario)
            $("#modal_probabilidad_riesgo_escenario_1 #formula_1").val(respuesta.data[0].formula);

        } 
        
    })
    .fail(function(error) {
        console.log(error)
    })
});
if(document.getElementById("update_probabilidad_riego_escenario_1")){
    document.getElementById("update_probabilidad_riego_escenario_1").addEventListener("click", function(){
        $descripcion=document.getElementById("descripcion_1").value;
        $tipo_regla=document.getElementById("tipo_regla_1").value;
        $tipo_valor=document.getElementById("tipo_valor_1").value;
        $estado=document.getElementById("estado_1").value;
        $comentario=document.getElementById("comentario_1").value;
        $formula=$("#modal_probabilidad_riesgo_escenario_1 #formula_1").val();
        $operador_1 = ''
        $operador_2 = ''
        $valor_1 = ''
        $valor_2 = ''
        $view = 1
        console.log($formula)
        let passValidation = false
        if(document.getElementById('operador_2')){
            $operador_2=document.getElementById("operador_2").value;
        }
        if(document.getElementById('operador_1')){
            $operador_1=document.getElementById("operador_1").value;
        }
        if(document.getElementById('valor_1')){
            $valor_1=document.getElementById("valor_1").value;
        }
        if(document.getElementById('valor_2')){
            $valor_2=document.getElementById("valor_2").value;
        }
        const id = document.getElementById("id_probabilidad_riesgo").value

        if($tipo_regla == "1 Valor"){
            if($descripcion != "" && $tipo_regla != "" && $tipo_valor != "" && $estado != "" && $comentario != ""){
                passValidation = true
                postData = { 
                    id:id,
                    descripcion:$descripcion,
                    tipo_regla:$tipo_regla,
                    tipo_valor:$tipo_valor,
                    estado:$estado,
                    comentario:$comentario,
                    formula:$formula
                };
                uri = BASE_URL+"/main/updateProbabilidadRiesgo1"
                $view = 1
            }
        }else{
            if($descripcion != "" &&
            $tipo_regla != "" &&
            $tipo_valor != "" &&
            $estado != "" &&
            $operador_1 != "" &&
            $valor_1 != "" &&
            $valor_2 != "" &&
            $comentario != ""
            ){
                passValidation = true
                postData = { 
                    id:id,
                    descripcion:$descripcion,
                    tipo_regla:$tipo_regla,
                    tipo_valor:$tipo_valor,
                    estado:$estado,
                    operador1:$operador_1,
                    valor1:$valor_1,
                    operador2:$operador_2,
                    valor2:$valor_2,
                    comentario:$comentario,
                    formula:$formula
                };
                uri = BASE_URL+"/main/updateProbabilidadRiesgo2"
                $view = 2
            }
        }
        if(passValidation){
            try {
    
                $.ajax({
                    method: "POST",
                    url: uri,
                    data: postData,
                    dataType: "JSON"
                })
                .done(function(respuesta) {
                    if (respuesta) 
                    {
                        console.log($view)
                        document.getElementById("form_probabilidad_riesgo_escenario_1").reset();
                        $('#modal_probabilidad_riesgo_escenario_1').modal('hide');
                        alerta_probabilidad_riesgo.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                        'Se ha modificado exitosamente'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                            '<span aria-hidden="true">&times;</span>'+
                            '</button>'+
                        '</div>';
                        $("#table_probabilidad_riesgo_"+$view).DataTable().ajax.reload(null, false); 
                       
                    } 
                    
                })
                .fail(function(error) {
                    console.log(error)
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
                console.log(err)
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
}
if(document.getElementById("update_probabilidad_riego_escenario_2")){
    document.getElementById("update_probabilidad_riego_escenario_2").addEventListener("click", function(){
        
        $descripcion=document.getElementById("descripcion_2").value;
        $tipo_regla=document.getElementById("tipo_regla_2").value;
        $tipo_valor=document.getElementById("tipo_valor_2").value;
        $estado=document.getElementById("estado_2").value;
        $operador_1=document.getElementById("operador_1").value;
        $valor_1=document.getElementById("valor_1").value;
        $operador_2=document.getElementById("operador_2").value;
        $valor_2=document.getElementById("valor_2").value;
        $comentario=document.getElementById("comentario_2").value;
        const id = document.getElementById("id_probabilidad_riesgo").value
        
        if($descripcion != "" &&
            $tipo_regla != "" &&
            $tipo_valor != "" &&
            $estado != "" &&
            $operador_1 != "" &&
            $valor_1 != "" &&
            $valor_2 != "" &&
            $comentario != ""
        ){
            
            const postData = { 
                id:id,
                descripcion:$descripcion,
                tipo_regla:$tipo_regla,
                tipo_valor:$tipo_valor,
                estado:$estado,
                operador1:$operador_1,
                valor1:$valor_1,
                operador2:$operador_2,
                valor2:$valor_2,
                comentario:$comentario
            };
    
            try {
    
                $.ajax({
                    method: "POST",
                    url: BASE_URL+"/main/updateProbabilidadRiesgo2",
                    data: postData,
                    dataType: "JSON"
                })
                .done(function(respuesta) {
                    if (respuesta) 
                    {
                        document.getElementById("form_probabilidad_riesgo_escenario_2").reset();
                        $('#modal_probabilidad_riesgo_escenario_2').modal('hide');
                        alerta_probabilidad_riesgo.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                        'Se ha modificado exitosamente'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                            '<span aria-hidden="true">&times;</span>'+
                            '</button>'+
                        '</div>';
                        $("#table_probabilidad_riesgo_2").DataTable().ajax.reload(null, false); 
                       
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
}

$('#table_probabilidad_riesgo_1 tbody').on( 'click', 'deleteProbabilidad', function(event){

    //recuperando los datos
    var table = $('#table_probabilidad_riesgo_1').DataTable();
    var regNum = table.rows( $(this).parents('tr') ).count().toString();
    var regDat = table.rows( $(this).parents('tr') ).data().toArray();
    let id = 0
    console.log(regNum)
    if (regNum == '0') {
        //console.log("error");
    }else{
        console.log(regDat)
        id=event.currentTarget.getAttribute('data-id');
    }
    console.log(id)
    Swal.fire({
        title: 'Desea eliminar la probabilidad de riesgo?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        denyButtonText: `Cancel`,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: "DELETE",
                url: BASE_URL+"/main/deleteProbabilidadRiesgo/"+Number(id),
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
                    $("#table_probabilidad_riesgo_1").DataTable().ajax.reload(null, false); 
                   
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
$('#table_probabilidad_riesgo_2 tbody').on( 'click', 'deleteProbabilidad', function(event){

    //recuperando los datos
    var table = $('#table_probabilidad_riesgo_2').DataTable();
    var regNum = table.rows( $(this).parents('tr') ).count().toString();
    var regDat = table.rows( $(this).parents('tr') ).data().toArray();
    let id = 0
    console.log(regNum)
    if (regNum == '0') {
        //console.log("error");
    }else{
        console.log(regDat)
        id=event.currentTarget.getAttribute('data-id');
    }
    console.log(id)
    Swal.fire({
        title: 'Desea eliminar la probabilidad de riesgo?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        denyButtonText: `Cancel`,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: "DELETE",
                url: BASE_URL+"/main/deleteProbabilidadRiesgo/"+Number(id),
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
                    $("#table_probabilidad_riesgo_2").DataTable().ajax.reload(null, false); 
                   
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
