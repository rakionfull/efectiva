
//cambiar estado del view
function EjecutarChangeView(id1,estado){
    try {
        const postData = { 
            id_op:id1,
           
            estado:estado,
        };
     
        try {
            
            $.ajax({
                method: "POST",
                url: BASE_URL+"/main/updateView",
                data: postData,
                dataType: "JSON"
            })
            .done(function(data) {
            console.log(data);
            })
            .fail(function(error) {
                alert("Se produjo el siguiente error: ".err);
            })
            .always(function() {
            });
        }
        catch(err) {
            alert("Se produjo el siguiente error: ".err);
        }

    }
    catch(err) {
        alert("Se produjo el siguiente error: ".err);
    
    }
}
function EjecutarChangeCreate(id1,estado){
    try {
        const postData = { 
            id_op:id1,
           
            estado:estado,
        };
       // console.log(postData);
        try {

            $.ajax({
                method: "POST",
                url: BASE_URL+"/main/updateCreate",
                data: postData,
                dataType: "JSON"
            })
            .done(function(data) {
              
            })
            .fail(function(error) {
                alert("Se produjo el siguiente error: ".err);
            })
            .always(function() {
            });
        }
        catch(err) {
            alert("Se produjo el siguiente error: ".err);
        }

    }
    catch(err) {
        alert("Se produjo el siguiente error: ".err);
    
    }
}
function EjecutarChangeUpdate(id1,estado){
    try {
        const postData = { 
            id_op:id1,
        
            estado:estado,
        };
       // console.log(postData);
        try {

            $.ajax({
                method: "POST",
                url: BASE_URL+"/main/updateUpdate",
                data: postData,
                dataType: "JSON"
            })
            .done(function(data) {
              
            })
            .fail(function(error) {
                alert("Se produjo el siguiente error: ".err);
            })
            .always(function() {
            });
        }
        catch(err) {
            alert("Se produjo el siguiente error: ".err);
        }

    }
    catch(err) {
        alert("Se produjo el siguiente error: ".err);
    
    }
}
function EjecutarChangeDelete(id1,estado){
    try {
        const postData = { 
            id_op:id1,
        
            estado:estado,
        };
       // console.log(postData);
        try {

            $.ajax({
                method: "POST",
                url: BASE_URL+"/main/updateDelete",
                data: postData,
                dataType: "JSON"
            })
            .done(function(data) {
              
            })
            .fail(function(error) {
                alert("Se produjo el siguiente error: ".err);
            })
            .always(function() {
            });
        }
        catch(err) {
            alert("Se produjo el siguiente error: ".err);
        }

    }
    catch(err) {
        alert("Se produjo el siguiente error: ".err);
    
    }
}
function changeView(elemento){

                    let usuario = elemento.id.split('_');
                    var dato1 = usuario[1];
                   
                    if(elemento.checked){
                        EjecutarChangeView(dato1,1);
                    }else{
                        EjecutarChangeView(dato1,0);
                    }

};
function changeCreate(elemento){

    let usuario = elemento.id.split('_');
    var dato1 = usuario[1];
   
    if(elemento.checked){
        EjecutarChangeCreate(dato1,1);
    }else{
        EjecutarChangeCreate(dato1,0);
    }

};
function changeUpdate(elemento){

    let usuario = elemento.id.split('_');
    var dato1 = usuario[1];
   
    if(elemento.checked){
        EjecutarChangeUpdate(dato1,1);
    }else{
        EjecutarChangeUpdate(dato1,0);
    }

};
function changeDelete(elemento){

    let usuario = elemento.id.split('_');
    var dato1 = usuario[1];
   
    if(elemento.checked){
        EjecutarChangeDelete(dato1,1);
    }else{
        EjecutarChangeDelete(dato1,0);
    }

};