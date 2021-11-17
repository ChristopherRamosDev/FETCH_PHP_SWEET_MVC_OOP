<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="ServerSide/ServerSide/css/bootstrap.min.css">
    <link rel="stylesheet" href="ServerSide/ServerSide/css/jquery.dataTables.min.css">
    <title>Practica FETC_PHP</title>
</head>

<body>
    <div class="container my-5">
        <h2>Form integrating FetchAPI and PHP - MVC</h2>
        <form id="formulario" method="POST">
            <input type="text" id="nombres" name="nombres" placeholder="nombres" class="form-control my-3 " maxlength="20">
            <input type="text" id="apellidos" name="apellidos" placeholder="apellidos" class="form-control my-3">
            <label for="">Desde</label>
            <input type="date" name="desde" id="desde">
            <label for="">Hasta</label>
            <input type="date" name="hasta" id="hasta">
            <button class="btn btn-primary" type="submit" id="btnBuscar">Enviar</button>
            <button class="btn btn-primary" type="submit" id="btnInsertar">Crear</button>
        </form>     
        <div class="mt-3" id="respuesta">
            <table id="serverSideTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>nombres</th>
                        <th>apellidos</th>
                        <th>fecha</th>
                        
                    </tr>
                </thead>


            </table>
        </div>
    </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
    <script src="ServerSide/ServerSide/js/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->

    <!-- <script src="ServerSide/ServerSide/js/popper.min.js"></script> -->
    <script src="ServerSide/ServerSide/js/bootstrap.min.js"></script>
    <script src="ServerSide/ServerSide/js/jquery.dataTables.min.js"></script>
    <script>
        /*  $(document).ready(function() {
            $('#serverSideTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "ServerSide/ServerSide/php/server_processing.php"
            });
        });  */
        /* var table = $('#serverSideTable').DataTable({ */
/*             paging: true,
            bFilter: false,
            ordering: false,
            searching: false, */
           /*  dom: 't' */ // This shows just the table
      /*   });  */
    </script>

    <?php require_once 'includes/script.php'; ?>
</body>

</html>