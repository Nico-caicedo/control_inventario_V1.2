$(document).ready(function () {

    fechaula()
    $('#form2').submit(function (e) {
        var aula = $('#lista-aulas2').val();
        var categoria = $('#lista-opciones2').val();
        var marca = $('#select-datos2').val();
        var element = $('#select-elementos2').val();
       

        const datos = {
            aula: aula,
            categoria: categoria,
            marca: marca,
            id: element,
            crear: $('#crear').val(),

        }






        let url = '../controllers/add_a_e.php';
        console.log(datos, '../php/add_a_e.php');
        $.post('../controllers/add_a_e.php', datos, function (response) {
            edit = false;
            // console.log(response);

            fechaula();
            $('#form2').trigger('reset');
            // if (response && response.status === 200) {
            //     alert("Elemento agregado correctamente.");
            //   } else {
            //     alert("Ha ocurrido un error al agregar el elemento.");
            //   }
        })
        e.preventDefault();


    })



    function fechaula() {
        $.ajax({
            url: '../controllers/show_e.php',
            type: 'GET',
            success: function (response) {
                let aulas = JSON.parse(response);
                let template = '';
                aulas.forEach(aulas => {
                    template += `
                <tr aulaid=${aulas.id}>
                  
                    <td>${aulas.name}</td>
                    <td>${aulas.cod}</td>
                    <td>
                 
                    <img class="delet" src="../asset/img/trash.svg" alt="">
                   
                    </td>
                    </td>
                    <td >
                    <img  class="edit" src="../asset/img/edit.svg" alt="">
                    </td>
                   
                </tr>
                `
                });
                $('#show-e').html(template);
            }
        }

        )
    }


})