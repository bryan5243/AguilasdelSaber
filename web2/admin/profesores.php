
<main>

<div class="container">

    <div class="row" >
        <div class="col-2 offset-10">
            <div class=" text-center">
                <button type="button" class="btn btn-primary w-100"
                data-bs-toggle="modal" data-bs-target="#modalPadre" id="botonCrear">
                <i class="bi bi-plus-circle-fill"></i> Crear

                </button>

            </div>

        </div>

    </div>
    <br />
    <br />
        
    <div class="table-responsive" >
        <table id="datos_padres" class="table table-bordered table-striped display" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombres</th>
                    <th>Cargos</th>
                    <th>Imagen</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>

            </thead>

        </table>

    </div>

</div>



    <!-- Modal -->
    <div class="modal fade" id="modalPadre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal-title">Registros</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form method="POST" id="formulario" enctype="multipart/form-data">
            <label for="nombre"> Ingrese el Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" >
            <br />

            <label for="cargo"> Ingrese el Cargo</label>
            <input type="text" name="cargo" id="cargo" class="form-control" >
            <br />


            <label for="foto"> Seleccione la Foto</label>
            <input type="file" name="foto" id="foto" class="form-control">
            <span id="imagen_subida"></span>
            <br />

            <div class="modal-footer">
            <input type="hidden" name="id_profesores" id="id_profesores">
            <input type="hidden" name="operacion" id="operacion" value="Crear">  
            <button type="submit" name="action" id="action" class="btn btn-primary" value="Crear">Crear</button>
        
            </form>
            </div>
        </div>
        
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/bott.js"></script>
        
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="../js/datatables-simple-demo.js"></script>

    
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    
   
    <script type="text/javascript">
    $(document).ready(function(){
        $('#botonCrear').click(function(){

            $('#formulario')[0].reset();
            $('.modal-title').text("Registros");
            $('#action').val("Crear");
            $('#imagen_subida').html(" ");
            
        });
        var dataTable = $('#datos_padres').DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
        url: "obtener_registrosprof.php",
        type: "POST"
    },
    "responsive": true,
    "search": {
    "smart": true
  },  // Habilitar la búsqueda global
    "columnDefs": [
        { 
            "targets": [0, 3],
            "orderable": false
        },
    ],
    language: {
        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
    }
});

        //Aqui va el codigo de insert

            $(document).on('submit', '#formulario', function(event){

            event.preventDefault();
            var nombre = $("#nombre").val();
            var cargo = $("#cargo").val();
            var extension = $("#foto").val().split('.').pop().toLowerCase();

            if(extension != ''){
                if(jQuery.inArray(extension, ['png', 'jpg', 'jpeg'])== -1){ 
                alert("Formato de imagen invalido");
                $("#foto").val('');
                return false;
                }
            }

            if(nombre != '' && cargo!= '' ){
                $.ajax({
                    url: "crearprof.php",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data){

                        alert(data);
                        $('#formulario')[0].reset();
                        $('#modalPadre').modal('hide');
                        dataTable.ajax.reload();

                    }

                });

            } else{
                alert("Algunos campos son obligatorios");
            }


            });

            //Editar
            $(document).on('click', '.editar', function(){
                
                var id_profesores =$(this).attr("id");
                $.ajax({

                    url: "obtener_registroprof.php",
                    method: "POST",
                    data: {id_profesores:id_profesores},
                    dataType:"json",
                    success: function(data){

                        $('#modalPadre').modal('show');
                        $('#id_profesores').val(id_profesores);
                        $('#nombre').val(data.nombre);
                        $('#cargo').val(data.cargo);
                        $('#imagen_subida').html(data.foto);
                        $('#modal-title').text("Editar Profesor");
                        $('#action').text("Editar");
                        $('#operacion').val("Editar");

                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        console.log(textStatus, errorThrown);

                    }
                });

            });

            //Eliminar

            $(document).on('click', '.borrar',function(){
            var id_profesores= $(this).attr("id");
            if(confirm ("Estas seguro que quieres borrar este registro: "+ id_profesores)){

                $.ajax({
                    url: "borrarprof.php",
                    method: "POST",
                    data: {id_profesores:id_profesores},
                    success: function(data){
                        alert(data);
                        dataTable.ajax.reload();
                    }
                });
            } else{
                return false;
            }

        });



    });

    

</script>

</main>