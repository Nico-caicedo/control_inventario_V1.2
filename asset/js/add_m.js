// ejecuciones

$(document).ready(function () {
  
    let editee = false;
    fechaulaa();

    // crea los elemento
    var categoria = $("#selectOpciones").val();
    

    $("#form_m").on("submit", function (e) {
        var marca_M = $("#select-dato").val();

        const dato = {
            id: $("#id_m").val(),
            name: $("#name_m").val(),
            cod: $("#code_m").val(),
            categoria: categoria,
            marca: marca_M,
            color: $("#color").val(),
            ubi: $("#ubi_m").val(),
            estado: $("#estado").val(),
            valor: $("#valor").val(),
            descrip: $("#descripcion_m").val(),
            Crear: $("#crear_m").val(),
        };

        let urll =
            editee === false
                ? "../controllers/add_e.php"
                : "../controllers/edit_m.php";
     

        $.post(urll, dato, function (response) {
            editee = false;
            
            fechaulaa();
            $("#form_m").trigger("reset");
        });

        e.preventDefault();
    });

    // validar datos e input

    // hace aparecer los elemento

    function fechaulaa() {

        $.ajax({
            url: "../controllers/show_m.php",
            type: "POST",
           
            success: function (response) {
                let elements = JSON.parse(response);
                let template = "";
                elements.forEach((element) => {
                    template += `
                <tr elementoid=${element.id}>
                  
                    <td>${element.name}</td>
                    <td>${element.cod}</td>
                    <td>
                 
                    <img class="delet dele" src="../asset/img/trash.svg" alt="">
                   
                    </td>
                    </td>
                    <td >
                    <img  class="edit" src="../asset/img/edit.svg" alt="">
                    </td>
                   
                </tr>
                `;
                });
                $("#show-m").html(template);
            },
        });
    }

    $(document).on("click", ".dele", function () {
        let element = $(this)[0].parentElement.parentElement;
        let idss = $(element).attr("elementoid");
        $.post("../controllers/delet_m.php", { idss }, function (response) {
            fechaulaa();
        });
    });

    $(document).on("click", ".edit", function () {
        let element = $(this)[0].parentElement.parentElement;
        console.log(element);

        let ids = $(element).attr("elementoid");
        $.post("../controllers/consul_m.php", { ids }, function (response) {
            const elemento = JSON.parse(response);
            console.log(elemento);
            $("#name_m").val(elemento.name);
            $("#code_m").val(elemento.cod);
            $("#id_m").val(elemento.id);
            $("#select-ubicaciones").val(elemento.ubi),
            $("#color").val(elemento.color),
            $("#estado").val(elemento.estado),
            $("#descripcion_m").val(elemento.descrip),
            $("#valor").val(elemento.valor);
            $("#select-dato").val(elemento.marca);
            editee = true;
        });
    });
});
