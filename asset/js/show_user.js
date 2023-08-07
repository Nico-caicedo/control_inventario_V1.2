// ejecuciones

$(document).ready(function () {
  
    let edite = false;
    fechaula();

    // crea los elemento
    
    

    $("#form").on("submit", function (e) {
       
        
        const dato = {
            id: $("#id").val(),
            name: $("#name").val(),
            apellidos: $("#apellidos").val(),
            cedula: $("#cedula").val(),
            correo: $("#correo").val(),
            crear: $("#crear").val(),
        };

        let url =
            edite === false
                ? "../controllers/add_user.php"
                : "../controllers/edit_user.php";
     

        $.post(url, dato, function (response) {
            edite = false;
            
            if (response.success == true) {
                alert("Usuario creado/editado exitosamente");
            } else if (response.success == false){
                alert("Error: " + response.message);
            }

            fechaula();
            $("#form").trigger("reset");
        });

        e.preventDefault();
    });

    // validar datos e input

    // hace aparecer los elemento

    function fechaula() {

        $.ajax({
            url: "../controllers/show_user.php",
            type: "POST",
           
            success: function (response) {
                let usuarios = JSON.parse(response);
                let template = "";
                usuarios.forEach((user) => {
                    template += `
                <tr usuarioid=${user.id}>
                  
                    <td>${user.name}</td>
                    <td>${user.apellidos}</td>
                    <td>${user.cod}</td>
                    <td>
                    <div class="container_delet">
                    <img class="delet dele" src="../asset/img/trash.svg" alt="">
                    </div>
                    </td>
                    </td>
                    <td >
                    <div class="container_edit">
                    <img  class="edit" src="../asset/img/edit.svg" alt="">
                    </div>
                    </td>
                   
                </tr>
                `;
                });
                $("#show").html(template);
            },
        });
    }

    $(document).on("click", ".container_delet", function () {
        let user = $(this)[0].parentElement.parentElement;
        let id = $(user).attr("usuarioid");
        $.post("../controllers/delet_user.php", { id }, function (response) {
            fechaula();
        });
    });

    $(document).on("click", ".container_edit", function () {
        let usuario = $(this)[0].parentElement.parentElement;
        console.log(usuario);

        let id = $(usuario).attr("usuarioid");
        $.post("../controllers/consult_user.php", { id }, function (response) {
            const usuario = JSON.parse(response);
            console.log(usuario.id);
            $("#name").val(usuario.name);
            $("#apellidos").val(usuario.apellidos);
            $("#cedula").val(usuario.cedula);
            $("#id").val(usuario.id);
            $("#correo").val(usuario.correo),
           
            edite = true;
        });
    });
});
