
console.log(count_impacto)
if($('#apartImpactoRiesgo #escenario-2-tab')){
    $('#apartImpactoRiesgo #escenario-2-tab').click(function(){
        if($('#apartImpactoRiesgo #btn_add_impacto_riesgo_escenario_1')){
            $('#apartImpactoRiesgo #btn_add_impacto_riesgo_escenario_1').css('display','none')   
        }
        $('#apartImpactoRiesgo #btn_add_impacto_riesgo_escenario_2').css('display','block')
    })
}
if($('#apartImpactoRiesgo #escenario-1-tab')){
    $('#apartImpactoRiesgo #escenario-1-tab').click(function(){
        if(count_impacto < 1){
            $('#apartImpactoRiesgo #btn_add_impacto_riesgo_escenario_1').css('display','block')
        }
        $('#apartImpactoRiesgo #btn_add_impacto_riesgo_escenario_2').css('display','none')

    })
}
var alerta_impacto_riesgo = document.getElementById("alerta_impacto_riesgo");

function loadTableImpactoRiesgo(){
    if ($.fn.DataTable.isDataTable('#table_impacto_riesgo_1')){
        $('#table_impacto_riesgo_1').DataTable().rows().remove();
        $('#table_impacto_riesgo_1').DataTable().destroy();
    }

    $('#table_impacto_riesgo_1').DataTable({
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
        ajax: BASE_URL+"/main/getImpactoRiesgo/1",
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
                    return `<editImpacto data-id="${data.id}" class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='mdi mdi-pencil font-size-18'></i></editImpacto>
                    <deleteImpacto data-id="${data.id}" class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='mdi mdi-trash-can font-size-18'></i></deleteImpacto>`
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
            $( 'table_impacto_riesgo_1 tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
        }
        
    })
}
function loadTableImpactoRiesgo2(){
    if ($.fn.DataTable.isDataTable('#table_impacto_riesgo_2')){
        $('#table_impacto_riesgo_2').DataTable().rows().remove();
        $('#table_impacto_riesgo_2').DataTable().destroy();
    }

    $('#table_impacto_riesgo_2').DataTable({
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
        ajax: BASE_URL+"/main/getImpactoRiesgo/2",
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
                    return `<editImpacto data-id="${data.id}" class='text-primary btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Editar' data-original-title='Editar'><i class='mdi mdi-pencil font-size-18'></i></editImpacto>
                    <deleteImpacto data-id="${data.id}" class='text-danger btn btn-opcionTabla' data-toggle='tooltip' data-placement='top' title='Eliminar' data-original-title='Eliminar'><i class='mdi mdi-trash-can font-size-18'></i></deleteImpacto>`
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
            $( 'table_impacto_riesgo_2 tbody tr td' ).css( 'padding', '1px 1px 1px 1px' );
        }
        
    })
}

if($('#apartImpactoRiesgo #btn_add_impacto_riesgo_escenario_1')){
    $('#apartImpactoRiesgo #btn_add_impacto_riesgo_escenario_1').click(function(){
        $("#modal_impacto_riesgo_escenario_1").modal("show");
        $("#modal_impacto_riesgo_escenario_1 #title_prob_riesgo_esc_1").html("Registro Impacto de Riesgo");
        document.getElementById("form_impacto_riesgo_escenario_1").reset();
        $("#add_impacto_riego_escenario_1").css('display','block')
        $("#update_impacto_riego_escenario_1").css('display','none')
        if(count_impacto > 0){
            $('#modal_impacto_riesgo_escenario_1 .escene_2').css('display','none')
            $("#modal_impacto_riesgo_escenario_1 #tipo_regla_1").val('1 Valor')
        }else{
            $('#modal_impacto_riesgo_escenario_1 .escene_2').css('display','block')
            $("#modal_impacto_riesgo_escenario_1 #tipo_regla_1").val('2 Valores')

        }
        if(count_impacto == 0){
            $('#modal_impacto_riesgo_escenario_1 .escene_2').css('display','none')
            $("#modal_impacto_riesgo_escenario_1 #tipo_regla_1").val('1 Valor')

        }
        if(count_2_impacto > 0){
            $('#modal_impacto_riesgo_escenario_1 .escene_2').css('display','block')
            $("#modal_impacto_riesgo_escenario_1 #tipo_regla_1").val('2 Valores')

        }
        if(count_2_impacto == 0){
            $('#modal_impacto_riesgo_escenario_1 .escene_2').css('display','block')
            $("#modal_impacto_riesgo_escenario_1 #tipo_regla_1").val('2 Valores')

        }
    })
}
$('#modal_impacto_riesgo_escenario_1 #tipo_regla_1').on('change',function(){
    const val = $('#modal_impacto_riesgo_escenario_1 #tipo_regla_1').val()
    if(val == "1 Valor"){
        $('#modal_impacto_riesgo_escenario_1 .escene_2').css('display','none')
    }else{
        $('#modal_impacto_riesgo_escenario_1 .escene_2').css('display','block')
    }
})
$('#modal_impacto_riesgo_escenario_1 #tipo_valor_1').on('change',function(){
    const val = $('#modal_impacto_riesgo_escenario_1 #tipo_valor_1').val()
    
    if(val == "Formula"){
        $('#modal_impacto_riesgo_escenario_1 .formula_1').css('display','block')
    }else{
        $('#modal_impacto_riesgo_escenario_1 .formula_1').css('display','none')
    }
})
// document.getElementById("btn_add_probabilidad_riesgo_escenario_2").addEventListener("click",function(){              
//     $("#modal_probabilidad_riesgo_escenario_2").modal("show");
//     document.getElementById("title_prob_riesgo_esc_2").innerHTML = "Registro Probabilidad de Riesgo";
//     document.getElementById("form_probabilidad_riesgo_escenario_2").reset();
//     document.getElementById("add_probabilidad_riego_escenario_2").style.display = "block";
//     document.getElementById("update_probabilidad_riego_escenario_2").style.display = "none";
// });

document.getElementById("add_impacto_riego_escenario_1").addEventListener('click',function(){
    $descripcion=$("#modal_impacto_riesgo_escenario_1 #descripcion_1").val();
    $tipo_regla=$("#modal_impacto_riesgo_escenario_1 #tipo_regla_1").val();
    $tipo_valor=$("#modal_impacto_riesgo_escenario_1 #tipo_valor_1").val();
    $estado=$("#modal_impacto_riesgo_escenario_1 #estado_1").val()
    $comentario=$("#modal_impacto_riesgo_escenario_1 #comentario_1").val()
    $operador_1 = ''
    $operador_2 = ''
    $valor_1 = ''
    $valor_2 = ''
    $formula = ''
    let passValidation = false
    if(document.getElementById('operador_2')){
        $operador_2=$("#modal_impacto_riesgo_escenario_1 #operador_2").val()
    }
    if(document.getElementById('operador_1')){
        $operador_1=$("#modal_impacto_riesgo_escenario_1 #operador_1").val()
    }
    if(document.getElementById('valor_1')){
        $valor_1=$("#modal_impacto_riesgo_escenario_1 #valor_1").val()
    }
    if(document.getElementById('valor_2')){
        $valor_2=$("#modal_impacto_riesgo_escenario_1 #valor_2").val()
    }
    if($tipo_valor == "Formula"){
        $formula = $("#modal_impacto_riesgo_escenario_1 #formula_1").val()
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
            uri = BASE_URL+"/main/addImpactoRiesgo1"
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
            uri = BASE_URL+"/main/addImpactoRiesgo2"
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
                if (respuesta == true) 
                {
                    console.log($view)
                    document.getElementById("form_impacto_riesgo_escenario_1").reset();
                    $('#modal_impacto_riesgo_escenario_1').modal('hide');
                    alerta_impacto_riesgo.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                    'Se ha guardado exitosamente'+
                    '<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                        '</button>'+
                    '</div>';
                    $("#table_impacto_riesgo_"+$view).DataTable().ajax.reload(null, false); 
                    if($view == 1){
                        $('#btn_add_impacto_riesgo_escenario_1').css('display','none')
                        $('#escenario-1-tab-pane').addClass('show')
                        $('#escenario-1-tab-pane').addClass('active')
                        $('#escenario-2-tab-pane').removeClass('show')
                        $('#escenario-2-tab-pane').removeClass('active')
                        $('#escenario-2-tab').css('display','none')
                        $('#escenario-1-tab').css('display','block')
                        $('#escenario-1-tab').addClass('active')
                    }else{
                        $('#btn_add_impacto_riesgo_escenario_1').css('display','block')
                        $('#escenario-2-tab-pane').addClass('show')
                        $('#escenario-2-tab-pane').addClass('active')
                        $('#escenario-1-tab-pane').removeClass('show')
                        $('#escenario-1-tab-pane').removeClass('active')
                        $('#escenario-1-tab').css('display','none')
                        $('#escenario-2-tab').css('display','block')
                        $('#escenario-2-tab').addClass('active')

                    }
                    $('#apartImpactoRiesgo #escenario-'+$view+'-tab-pane').click()
                    count_impacto += 1;
                }else{
                    $('#modal_impacto_riesgo_escenario_1').modal('hide');
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: respuesta
                    })
                }
                
            })
            .fail(function(error) {
                $('#modal_impacto_riesgo_escenario_1').modal('hide');
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

$('#table_impacto_riesgo_1 tbody').on( 'click', 'editImpacto', function(event){
    $("#modal_impacto_riesgo_escenario_1").modal("show");
    $("#modal_impacto_riesgo_escenario_1 .escene_2").hide();
    $("#modal_impacto_riesgo_escenario_1 #title_prob_riesgo_esc_1").html("Modificar Impacto de Riesgo")

    document.getElementById("form_impacto_riesgo_escenario_1").reset();
    document.getElementById("add_impacto_riego_escenario_1").style.display = "none";
    document.getElementById("update_impacto_riego_escenario_1").style.display = "block";
   
    $.ajax({
        method: "GET",
        url: BASE_URL+"/main/showImpactoRiesgo/"+Number(event.currentTarget.getAttribute('data-id')),
        dataType: "JSON",
    })
    .done(function(respuesta) {
        console.log(respuesta)
        if (respuesta.data != null) 
        {
            $("#modal_impacto_riesgo_escenario_1 #tipo_regla_1 option").remove()
            $("#modal_impacto_riesgo_escenario_1 #tipo_regla_1").append(`
                <option value="1 Valor">1 Valor</option>
                <option value="2 Valores">2 Valores</option>
            `)
            $("#modal_impacto_riesgo_escenario_1 #id_impacto_riesgo").val(event.currentTarget.getAttribute('data-id'));
            $("#modal_impacto_riesgo_escenario_1 #descripcion_1").val(respuesta.data[0].descripcion);
            $("#modal_impacto_riesgo_escenario_1 #tipo_regla_1").val(respuesta.data[0].tipo_regla);
            $("#modal_impacto_riesgo_escenario_1 #tipo_valor_1").val(respuesta.data[0].tipo_valor);
            $("#modal_impacto_riesgo_escenario_1 #estado_1").val(respuesta.data[0].estado);
            $("#modal_impacto_riesgo_escenario_1 #comentario_1").val(respuesta.data[0].comentario);
            $("#modal_impacto_riesgo_escenario_1 #formula_1").val(respuesta.data[0].formula);
            if(respuesta.data[0].tipo_valor == "Formula"){
                $('#modal_impacto_riesgo_escenario_1 .formula_1').css('display','block')
            }else{
                $('#modal_impacto_riesgo_escenario_1 .formula_1').css('display','none')
            }
        } 
        
    })
    .fail(function(error) {
        console.log(error)
    })
});
$('#table_impacto_riesgo_2 tbody').on( 'click', 'editImpacto', function(event){
    $("#modal_impacto_riesgo_escenario_1 #title_prob_riesgo_esc_1").html("Modificar Impacto de Riesgo")
    document.getElementById("form_impacto_riesgo_escenario_1").reset();
    document.getElementById("add_impacto_riego_escenario_1").style.display = "none";
    document.getElementById("update_impacto_riego_escenario_1").style.display = "block";
    $("#modal_impacto_riesgo_escenario_1 .escene_2").show();
   
    $.ajax({
        method: "GET",
        url: BASE_URL+"/main/showImpactoRiesgo/"+Number(event.currentTarget.getAttribute('data-id')),
        dataType: "JSON",
    })
    .done(function(respuesta) {
        console.log(respuesta)
        if (respuesta.data != null) 
        {
            $("#modal_impacto_riesgo_escenario_1").modal("show");

            $("#modal_impacto_riesgo_escenario_1 #tipo_regla_1 option").remove()
            $("#modal_impacto_riesgo_escenario_1 #tipo_regla_1").append(`
                <option value="1 Valor">1 Valor</option>
                <option value="2 Valores">2 Valores</option>
            `)
            $("#modal_impacto_riesgo_escenario_1 #id_impacto_riesgo").val(event.currentTarget.getAttribute('data-id'));
            $("#modal_impacto_riesgo_escenario_1 #descripcion_1").val(respuesta.data[0].descripcion);
            $("#modal_impacto_riesgo_escenario_1 #tipo_regla_1").val(respuesta.data[0].tipo_regla);
            $("#modal_impacto_riesgo_escenario_1 #tipo_valor_1").val(respuesta.data[0].tipo_valor);
            $("#modal_impacto_riesgo_escenario_1 #estado_1").val(respuesta.data[0].estado);
            $("#modal_impacto_riesgo_escenario_1 #comentario_1").val(respuesta.data[0].comentario);
            $("#modal_impacto_riesgo_escenario_1 #formula_1").val(respuesta.data[0].formula);
            $("#modal_impacto_riesgo_escenario_1 #operador_1").val(respuesta.data[0].operador1);
            $("#modal_impacto_riesgo_escenario_1 #operador_2").val(respuesta.data[0].operador2);
            $("#modal_impacto_riesgo_escenario_1 #valor_1").val(respuesta.data[0].valor1);
            $("#modal_impacto_riesgo_escenario_1 #valor_2").val(respuesta.data[0].valor2);
            if(respuesta.data[0].tipo_valor == "Formula"){
                $('#modal_impacto_riesgo_escenario_1 .formula_1').css('display','block')
            }else{
                $('#modal_impacto_riesgo_escenario_1 .formula_1').css('display','none')
            }
        } 
        
    })
    .fail(function(error) {
        console.log(error)
    })
});
if(document.getElementById("update_impacto_riego_escenario_1")){
    document.getElementById("update_impacto_riego_escenario_1").addEventListener("click", function(){
        $descripcion=$("#modal_impacto_riesgo_escenario_1 #descripcion_1").val();
        $tipo_regla=$("#modal_impacto_riesgo_escenario_1 #tipo_regla_1").val();
        $tipo_valor=$("#modal_impacto_riesgo_escenario_1 #tipo_valor_1").val();
        $estado=$("#modal_impacto_riesgo_escenario_1 #estado_1").val()
        $comentario=$("#modal_impacto_riesgo_escenario_1 #comentario_1").val()
        $formula = $("#modal_impacto_riesgo_escenario_1 #formula_1").val()
        $operador_1 = ''
        $operador_2 = ''
        $valor_1 = ''
        $valor_2 = ''
        let passValidation = false
        if(document.getElementById('operador_2')){
            $operador_2=$("#modal_impacto_riesgo_escenario_1 #operador_2").val()
        }
        if(document.getElementById('operador_1')){
            $operador_1=$("#modal_impacto_riesgo_escenario_1 #operador_1").val()
        }
        if(document.getElementById('valor_1')){
            $valor_1=$("#modal_impacto_riesgo_escenario_1 #valor_1").val()
        }
        if(document.getElementById('valor_2')){
            $valor_2=$("#modal_impacto_riesgo_escenario_1 #valor_2").val()
        }
        const id = document.getElementById("id_impacto_riesgo").value

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
                uri = BASE_URL+"/main/updateImpactoRiesgo1"
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
                uri = BASE_URL+"/main/updateImpactoRiesgo2"
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
                        document.getElementById("form_impacto_riesgo_escenario_1").reset();
                        $('#modal_impacto_riesgo_escenario_1').modal('hide');
                        alerta_impacto_riesgo.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                        'Se ha modificado exitosamente'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                            '<span aria-hidden="true">&times;</span>'+
                            '</button>'+
                        '</div>';
                        $("#table_impacto_riesgo_"+$view).DataTable().ajax.reload(null, false); 
                       
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

$('#table_impacto_riesgo_1 tbody').on( 'click', 'deleteImpacto', function(event){

    //recuperando los datos
    var table = $('#table_impacto_riesgo_1').DataTable();
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
        title: 'Desea eliminar el impacto de riesgo?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        denyButtonText: `Cancel`,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: "DELETE",
                url: BASE_URL+"/main/deleteImpactoRiesgo/"+Number(id),
                dataType: "JSON"
            })
            .done(function(respuesta) {
                if (respuesta) 
                {
                    alerta_impacto_riesgo.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                    'Se ha eliminado satisfactoriamente'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                        '</button>'+
                    '</div>';
                    $("#table_impacto_riesgo_1").DataTable().ajax.reload(null, false); 
                   
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
$('#table_impacto_riesgo_2 tbody').on( 'click', 'deleteImpacto', function(event){

    //recuperando los datos
    var table = $('#table_impacto_riesgo_2').DataTable();
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
        title: 'Desea eliminar el impacto de riesgo?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Aceptar',
        denyButtonText: `Cancel`,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: "DELETE",
                url: BASE_URL+"/main/deleteImpactoRiesgo/"+Number(id),
                dataType: "JSON"
            })
            .done(function(respuesta) {
                if (respuesta) 
                {
                    alerta_impacto_riesgo.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
                    'Se ha eliminado satisfactoriamente'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span>'+
                        '</button>'+
                    '</div>';
                    $("#table_impacto_riesgo_2").DataTable().ajax.reload(null, false); 
                   
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
