// ejecuciones 



$(document).ready(function () {
    let edite = false;
   
    fechaula();

    // crea los elemento
   

    $("#form_e").on("submit", function (e) {
        var categoria = $("#selectOpciones").val();
       
        var marca_T = $("#select-datos").val();
        var ubi = $("#select-ubicacion").val();
        console.log(ubi)
        const datos = {
            id: $("#id_e").val(),
            name: $("#name_e").val(),
            cod: $("#cod_e").val(),
            categoria: categoria,
            marca: marca_T,
            ubi: ubi,
            modelo: $("#modelo_e").val(),
            descrip: $("#descripcion_e").val(),
            crear: $("#crear_e").val(),
        };

        let urlll =
            edite === false
                ? "../controllers/add_e.php"
                : "../controllers/edit_e.php";
       

        $.post(urlll, datos, function (response) {
            edite = false;
            console.log(response);
            fechaula();
            $("#form_e").trigger("reset");
        });

        e.preventDefault();
    });




    // validar datos e input

    // hace aparecer los elemento

    function fechaula() {
        $.ajax({
            url: "../controllers/show_e.php",
            type: "GET",
           
            success: function (response) {
                let elementos = JSON.parse(response);
                let template = "";
                elementos.forEach((elemen) => {
                    template += `
                <tr elementsid=${elemen.id}>
                  
                    <td>${elemen.name}</td>
                    <td>${elemen.cod}</td>
                    <td>
                 
                    <img class="delet delete" src="../asset/img/trash.svg" alt="">
                   
                    </td>
                    </td>
                    <td >
                    <img  class="edit edite" src="../asset/img/edit.svg" alt="">
                    </td>
                   
                </tr>
                `;
                });
                $("#show-e").html(template);
            },
        });
    }

    $(document).on("click", ".delete", function () {
        let elementis = $(this)[0].parentElement.parentElement;
        let ids = $(elementis).attr("elementsid");
        $.post("../controllers/delet_e.php", { ids }, function (response) {
            fechaula();
        });
    });

    $(document).on("click", ".edite", function () {
        let elementis = $(this)[0].parentElement.parentElement;
        console.log(elementis);

        let id = $(elementis).attr("elementsid");
        $.post("../controllers/consul_e.php", { id }, function (response) {
            const element = JSON.parse(response);
      
            $("#name_e").val(element.name);
            $("#cod_e").val(element.cod);
            $("#id_e").val(element.id);
            // $("#ubi_e").val(element.ubi),
                $("#modelo_e").val(element.modelo),
                $("#descripcion_e").val(element.descrip),
            $("#select-datos").val(element.marca);
            $("#select-ubicacion").val(element.ubicacion);
            edite = true;
        });
    });
});
