
// ejecuciones

$(document).ready(function () {
    let edit = false;
    fechaula();



    // crea los ambientes

    $('#form').submit(function (e) {
        e.preventDefault();

        let name = $('#name').val();
        let cod = $('#cod').val();
        // Validación de inputs
        
        if($('#name').val() === '' && $('#cod').val() === cod){
            alert('Por favor, ingrese un nombre.');
        }else  if($('#cod').val() === '' &&  $('#name').val() === name){
            alert('Por favor, ingrese el código.');
        }else if (name == ''  && cod  == '') {
            alert('Por favor, ingrese valores en los campos');

        }else {
            const datos = {
                name: $('#name').val(),
                cod: $('#cod').val(),
                crear: $('#crear').val(),
                id: $('#id').val()
            }

            let url = edit === false ? '../controllers/add_a.php' : '../controllers/edit_a.php';
            $.post(url, datos, function (response) {
                edit = false;
                fechaula();
                $('#form').trigger('reset');
            })
        }
    })

    // validar datos e input



    // hace aparecer los ambientes



    function fechaula() {
        $.ajax({
            url: '../controllers/show_a.php',
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
                 
                    <img id="ocultar" class="delet" src="../asset/img/trash.svg" alt="">
                   
                    </td>
                    <td >
                    <img  id="ocultar" class="edit" src="../asset/img/edit.svg" alt="">
                    </td>
                   
                </tr>
                 
                
                `
                });
                $('#show-a').html(template);

            }
        }

        )
    }


    $(document).on('click', '.delet', function () {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('aulaid');
        $.post('../controllers/delet_a.php', { id }, function (response) {
            fechaula();

            //    let delet = ` <span class="delete"> aula eliminada</span>`
            //    $('#alert').html(delet);
            //    if(response){
            //      setTimeout(function(){

            //        $('#alert').fadeOut();
            //      }, 2000 )
            //    }

        })
    });


    $(document).on('click', '.edit', function () {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('aulaid');
        $.post('../controllers/consul_a.php', { id }, function (response) {
            const aulas = JSON.parse(response);
            $('#name').val(aulas.name);
            $('#cod').val(aulas.cod);
            $('#id').val(aulas.id);
            edit = true;

        })
    })


})