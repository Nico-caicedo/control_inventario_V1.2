// ejecuciones

$(document).ready(function () {
  
    let edite = false;
    fechaula();

  
    function fechaula() {

        $.ajax({
            url: "../controllers/show_history.php",
            type: "POST",
           
            success: function (response) {
                let usuarios = JSON.parse(response);
                let template = "";
                usuarios.forEach((user) => {
                    template += `
                <tr usuarioi=${user.id}>
                  
                    <td>${user.fecha}</td>
                    <td>${user.tipo_operacion}</td>
                    <td class='oper_history'>${user.operacion}</td>
                    <td>${user.id}</td>
                   
                </tr>
                `;
                });
                $("#show_history").html(template);
            },
        });
    }

  
  
});
