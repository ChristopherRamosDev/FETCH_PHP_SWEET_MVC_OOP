$(document).ready(function () {
  var date = new Date();
var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var today = year + "-" + month + "-" + day;
$("#desde").val(today);
$("#hasta").val(today);
  $.ajax({
    type: "POST",
    url: "utils/utils",
    data: { action: "index" },
    success: function (resp) {
      /* Swal.fire("Buen trabajo", "Registro exitoso", "success"); */
       let datos = JSON.parse(resp); 
      $("#serverSideTable").DataTable({
        paging: true,
        bFilter: true,
        ordering: false,
        searching: false,
        destroy : true,
        "language": {
          "url": "ServerSide/Spanish.json"
      },
          data : datos,
          columns: [
            {data : "id"},
            {data : "nombres"},
            {data : "apellidos"}  ,          
            {data : "fecha_registro"},
            
              
        ],

      });
      
    },
  });

  $("#btnBuscar").click(function () {
    /*  $("#serverSideTable").DataTable().destroy(); */
    let data = $("#formulario").serializeArray();
    $.ajax({
      type: "POST",
      url: "utils/utils",
      data: { action: "search", data: data },
      success: function (resp) {
        /* Swal.fire("Buen trabajo", "Registro exitoso", "success"); */
        
        let datos = JSON.parse(resp);
        $("#serverSideTable").DataTable({
          paging: true,
          bFilter: true,
          ordering: false,
          searching: false,
          "language": {
            "url": "ServerSide/Spanish.json"
        },
          destroy : true,
            data : datos,
            columns: [
              {data : "id"},
              {data : "nombres"},
              {data : "apellidos"}  ,          
              {data : "fecha_registro"}            
          ],
        });
      },
    });
    return false;
  });
  $("#btnInsertar").click(function () {
    /*  $("#serverSideTable").DataTable().destroy(); */
    let data = $("#formulario").serializeArray();
    $.ajax({
      type: "POST",
      url: "utils/utils",
      data: { action: "insert", data: data },
      success: function (resp) {
        
        let data = JSON.parse(resp);
        console.log(data);
                                                                                            
        let body = $("<tbody></tbody>");
        let tr = $("<tr></tr>");
        let id = $("<td>" + data[0][0] + "</td>");
        let nombres = $("<td>" + data[0][1] + "</td>");
        let apellidos = $("<td>" + data[0][2] + "</td>");
        let fecha = $("<td>" + data[0][3] + "</td>");
        $(tr).append(id);
        $(tr).append(nombres);
        $(tr).append(apellidos);
        $(tr).append(fecha);
        $(body).append(tr);
        $("#serverSideTable").append(body)
        Swal.fire(
          '¡Buen trabajo!',
          'Registro Exitoso',
          'success'
        )
        
      },
    });
    return false;
  });
});
