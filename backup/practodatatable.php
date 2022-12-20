<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--datatable cdn-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <title>Document</title>
</head>
<style>
    table {
    table-layout: fixed;  
    border:2px solid blue;
}
    td{
  max-width: 120px;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
table{
border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);

}
table tbody tr {
  border-bottom: 1px solid #dddddd;
}
table tbody tr {
  border-bottom: 1px solid skyblue;
}
table thead tr {
  background-color: #2f2f40;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}
label {
   
    display: -webkit-inline-box;
    font-weight: bold;
}
select.custom-select.custom-select-sm.form-control.form-control-sm {
    border: none;
    border-bottom: 2px solid skyblue;
}
input.form-control.form-control-sm {
    border: none;
    border-bottom: 2px solid skyblue;
}
div#example_info {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
div#example_paginate {
    display: flex;
    justify-content: flex-end;
}
table#example {
    width: 1129px;
}
</style>
<body>
<div class="container-fluid"> <!-- If Needed Left and Right Padding in 'md' and 'lg' screen means use container class -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">



      <div class="card mt-4 col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card-body">    
     <center>
      <table class="table mt-8 responsive" id="example">
        <thead>
            <tr>
            <th scope="col">Name</th>
            <th scope="col">Practo Name</th>
            <th scope="col">Specialization</th>
            <th scope="col">Experience</th>
            <th scope="col">Location</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            <!-- <tr scope="col">Edit</tr>
            <tr scope="col">Delete</tr> -->

            </tr>
        </thead>
    </table>
    
    </center>
</div>
</div>
</div>
</div>

</div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="/GmbSavechanges">
                      <div class="mb-3">
                        <label for="Name" class="form-label"><b>Name</b></label>
                        <input type="text" class="form-control" id="Name" aria-describedby="Name" readonly>
                      </div>

                      <div class="mb-3">
                        <label for="Practo Name" class="form-label"><b>Practo Name</b></label>
                        <input type="text" class="form-control" id="PractoName" aria-describedby="Practo Name">
                      </div>
                      <div class="mb-3">
                        <label for="Specialization" class="form-label"><b>Specialization</b></label>
                        <input type="text" class="form-control" id="Specialization" aria-describedby="Specialization" >
                      </div>
                      <div class="mb-3">
                        <label for="Experience" class="form-label"><b>Experience</b></label>
                        <input type="text" class="form-control" id="Experience" aria-describedby="Experience" >
                       
                      </div>
                      <div class="mb-3">
                        <label for="Location" class="form-label"><b>Location</b></label>
                        <input type="text" class="form-control" id="Location" aria-describedby="Location" >
                      </div>
                     
                    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!--delete modal-->



<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h6>Are you absolutely sure?</h6>
      <form method='POST'  class="pt-5" id="deleteform">
      <div class="mb-3">
                        <label for="Gmb Name" class="form-label"><b>Permanently Delete Gmb Name</b></label>
                        <input type="text" class="form-control" id="gmbnamedelete" readonly name="gmbname"  aria-describedby="deleteuser" >
                      </div>
      <div class="mb-3">
                        <input type='text' value = '{{variable.pgid}}' name ='pgid1' style="display: none;">
                        <label for="deleting" class="form-label"><b>Please type "Delete" to confirm.</b></label>
                        <span id="message"></span>
                        <input type="text" class="form-control deleteinput" id="deleting" required name="deletemodal" aria-describedby="deleteuser" >
                      </div>
                      <button type="Submit" class="btn btn-danger w-100" id="modaldelete"  placeholder="Delete">Delete</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!--end delete modal-->
</body>
</html>


<script>

$(document).ready(function() {
 
 $('#example').DataTable( {  
    "processing": true,
    "serverSide": true,
    "serverMethod":"POST",
    
     ajax: {
        url: '/practodatatable',
     },
     searching:true,
     sort:false,
    
     "serverSide": true,
     "columns": [
        { data: "Name" },
         { data: "Practoname" },
         { data: "Specialization" },
         { data: "Experience" },
         { data: "Location" },
         {
            data: null,
            className: "dt-center editor-edit",
            defaultContent: '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="editmodal">Edit</button>',
            orderable: false
        },
        {
            data: null,
            className: "dt-center editor-delete",
            defaultContent: '<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" id="deletemodalbtn">Delete</button>',
            orderable: false
        },
         


     ]

 } );
 
} );
</script>


<script>
    $('#example').on('click', 'td.editor-edit', function (e) {
        e.preventDefault();
        var tr=$(this).closest("tr")
        var td=tr.find("td")
        var name=$(td[0]).text()
        var practoName=$(td[1]).text()
        var Specialization=$(td[2]).text()
        var Experience=$(td[3]).text()
        var Location=$(td[4]).text()
        console.log(name)
        $("#Name").attr("value",name)
        $("#PractoName").attr("value",practoName)
        $("#Specialization").attr("value",Specialization)
        $("#Experience").attr("value",Experience)
        $("#Location").attr("value",Location)
    } );
</script>

<script>
    $('#example').on('click', 'td.editor-delete', function (e) {
        e.preventDefault();
        var tr=$(this).closest("tr")
        var td=tr.find("td")
        var name=$(td[0]).text()
        
        console.log(name)
        $("#gmbnamedelete").attr("value",name)
       
    } );
</script>

