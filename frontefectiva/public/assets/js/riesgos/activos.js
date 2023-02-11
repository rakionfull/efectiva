var BASE_URL = document.getElementById("base_url").value;
window.addEventListener("hashchange", () => {
    let opcion = window.location.hash;
    switch(opcion)
    {
        case "#/TipoRiesgo":
            for(let i=0; i<document.getElementsByClassName("opcion").length; i++){
                document.getElementsByClassName("opcion")[i].style.display = "none";
            }
            document.querySelectorAll(".menu li").forEach(element => {
                element.classList.remove("activado");
            });
            document.getElementById("apartTipoRiesgo").style.display = "block";
            document.getElementById("tipo_riesgo").className = "activado";
            loadTableTipoRiesgo()
            window.location.hash = '#';   
            break;
        case "#/ProbabilidadRiesgo":
            for(let i=0; i<document.getElementsByClassName("opcion").length; i++){
                document.getElementsByClassName("opcion")[i].style.display = "none";
            }
            document.querySelectorAll(".menu li").forEach(element => {
                element.classList.remove("activado");
            });
            document.getElementById("apartProbabilidadRiesgo").style.display = "block";
            document.getElementById("probabilidad_riesgo").className = "activado";
            window.location.hash = '#';
            if(count >= 1){
                $('#apartProbabilidadRiesgo #escenario-1-tab-pane').addClass('show')
                $('#apartProbabilidadRiesgo #escenario-1-tab-pane').addClass('active')
                $('#apartProbabilidadRiesgo #escenario-2-tab-pane').removeClass('show')
                $('#apartProbabilidadRiesgo #escenario-2-tab-pane').removeClass('active')

            }else{
                $('#apartProbabilidadRiesgo #escenario-2-tab-pane').addClass('show')
                $('#apartProbabilidadRiesgo #escenario-2-tab-pane').addClass('active')
                $('#apartProbabilidadRiesgo #escenario-1-tab-pane').removeClass('show')
                $('#apartProbabilidadRiesgo #escenario-1-tab-pane').removeClass('active')
            }

            loadTableProabilidadRiesgo()
            loadTableProabilidadRiesgo2()
            break;
        case "#/ImpactoRiesgo":
            for(let i=0; i<document.getElementsByClassName("opcion").length; i++){
                document.getElementsByClassName("opcion")[i].style.display = "none";
            }
            document.querySelectorAll(".menu li").forEach(element => {
                element.classList.remove("activado");
            });
            document.getElementById("apartImpactoRiesgo").style.display = "block";
            document.getElementById("impacto_riesgo").className = "activado";
            window.location.hash = '#';
            console.log(count_impacto)
            if(count_impacto >= 1){
                $('#apartImpactoRiesgo #escenario-1-tab-pane').addClass('show')
                $('#apartImpactoRiesgo #escenario-1-tab-pane').addClass('active')
                $('#apartImpactoRiesgo #escenario-2-tab-pane').removeClass('show')
                $('#apartImpactoRiesgo #escenario-2-tab-pane').removeClass('active')

            }else{
                $('#apartImpactoRiesgo #escenario-2-tab-pane').addClass('show')
                $('#apartImpactoRiesgo #escenario-2-tab-pane').addClass('active')
                $('#apartImpactoRiesgo #escenario-1-tab-pane').removeClass('show')
                $('#apartImpactoRiesgo #escenario-1-tab-pane').removeClass('active')
            }
            loadTableImpactoRiesgo()
            loadTableImpactoRiesgo2()
            break;
        
        case "#/NivelRiesgo":
            for(let i=0; i<document.getElementsByClassName("opcion").length; i++){
                document.getElementsByClassName("opcion")[i].style.display = "none";
            }
            document.querySelectorAll(".menu li").forEach(element => {
                element.classList.remove("activado");
            });
            document.getElementById("apartNivelRiesgo").style.display = "block";
            document.getElementById("nivel_riesgo").className = "activado";
            loadTableNivelRiesgo()
            window.location.hash = '#';
            break;
        case "#/TipoAmenaza":
            for(let i=0; i<document.getElementsByClassName("opcion").length; i++){
                document.getElementsByClassName("opcion")[i].style.display = "none";
            }
            document.querySelectorAll(".menu li").forEach(element => {
                element.classList.remove("activado");
            });
            document.getElementById("apartTipoAmenaza").style.display = "block";
            document.getElementById("tipo_amenaza").className = "activado";
            loadTableTipoAmenaza()
            window.location.hash = '#';
            break;
        case "#/DescAmenaza":
            for(let i=0; i<document.getElementsByClassName("opcion").length; i++){
                document.getElementsByClassName("opcion")[i].style.display = "none";
            }
            document.querySelectorAll(".menu li").forEach(element => {
                element.classList.remove("activado");
            });
            document.getElementById("apartDescAmenaza").style.display = "block";
            document.getElementById("descripcion_amenaza").className = "activado";
            loadTableDescAmenaza()
            window.location.hash = '#';
            break;
        case "#/CategoriaVulnerabilidad":
            for(let i=0; i<document.getElementsByClassName("opcion").length; i++){
                document.getElementsByClassName("opcion")[i].style.display = "none";
            }
            document.querySelectorAll(".menu li").forEach(element => {
                element.classList.remove("activado");
            });
            document.getElementById("apartCategoriaVulnerabilidad").style.display = "block";
            document.getElementById("categoria_vulnerabilidad").className = "activado";
            loadTableCategoriasVulnerabilidad()
            window.location.hash = '#';
            break;
        case "#/DescVulnerabilidad":
            for(let i=0; i<document.getElementsByClassName("opcion").length; i++){
                document.getElementsByClassName("opcion")[i].style.display = "none";
            }
            document.querySelectorAll(".menu li").forEach(element => {
                element.classList.remove("activado");
            });
            document.getElementById("apartDescVulnerabilidad").style.display = "block";
            document.getElementById("descripcion_vulnerabilidad").className = "activado";
            loadTableDescVulnerabilidad()
            window.location.hash = '#';
            break;
        
    }
});