<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}
.logo{
  width:100%;
}
.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #7c3a84;
  color: white;
  border-radius:20px;
}

.sidebar a:hover:not(.active) {
  background-color: #7c3a84;
  color: white;
  border-radius:20px;
}

div.content {
  margin-left: 210px;
  padding: 1px 16px;
  height: 1000px;
  margin-top: 48px !important;
}
.loadergif{
    width: 73px;
    height: 65px;
}

.card{
  box-shadow: 0px 2px 5px 3px;
}
.btn-outline-primary{
    padding: 2px;
}


div.content1 {
  margin-left: 210px;
  padding: 1px 16px;
  height: 1000px;
  margin-top: -813px !important;
}

</style>
</head>
<body>

<div class="sidebar">
  <img class="logo" src="https://multipliersolutions.com/wp-content/uploads/2022/06/multiplier_logo.png" alt="">
  <a class="" href="/"><i class="fa-solid fa-house"></i> Home</a>
<a class="" href="/twitter"><i class="fa-brands fa-twitter"></i> Twitter</a>
  <!-- <a href="#">Instagram</a> -->
  <a href="#contact"><i class="fa-brands fa-linkedin-in"></i> Linkedin</a>
  <a href="#about"><i class="fa-brands fa-youtube"></i> YouTube</a>
  <a class="active" href="/gmb"><i class="fa-brands fa-google"></i> GMB</a>
  <a href="#"><i class="fa-solid fa-stethoscope"></i> Practo</a>


</div>

<div class="content">
<div class="card">
    <center>
  <div class="card-body">
    <span id="errormessage"><span>
    <form id="gmbsearch" method="POST">
      <b>GMB : </b><input type="text" name="name" class="handle" id="gmbkeywords"  placeholder="Enter Keywords" required>
      <button type="Submit" class="btn btn-outline-primary gmbsearch" id="gmbsearchbtn" >Get Data</button>
</form><br>
<b><span id="successmessage" style="font-weight:600;font-"><span></b>
    <div id="loader"  style="display:none;">
                    <img class="loadergif" src="static\files\animation-500-l84av9gp-unscreen.gif" alt="">
                    <!-- <i class="fas fa-circle-notch fa-spin text-info"></i> -->
                    <b>Please wait while we fetch your data... Don't close or refresh the browser</b> 
      
    </div>
  </div>
</center>
</div>
</div>


<div class="content1">
<div class="card">
<center>
  <div class="card-body">
  <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Gmb_Name</th>
                <th>Gmb_Rating</th>
                <th>Total_Reviews</th>
                <th>Address</th>
                <th>Phone_Number</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody>
          {%for data in results%}
            <tr>
                <td>{{data[1]}}</td>
                <td>{{data[2]}}</td>
                <td>{{data[3]}}</td>
                <td>{{data[5]}}</td>
                <td>{{data[6]}}</td>
                <td><button type="button" class="btn btn-info edit" data-bs-toggle="modal" data-bs-target="#exampleModal"> Edit </button></td>
                <td><button type="button" class="btn btn-danger delete"> Delete</button></td>
            </tr>
            {%endfor%}
            
        </tbody>
        
    </table>
</center>
</div>
</div>

<!--editmodal-->
<div class="container" id="editmodal">
  <div class="row">
    <div class="col-sm-12">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>
<!--end of edit modal-->

</body>
</html>



<!--datatable-->
<script>

$(document).ready(function () {
    $('#example').DataTable();
});
</script>
<!--datatable-->




<!-- <script>
  function validation(){
    var handle=document.getElementById("twitterhandle").value
    console.log("handle in validation: ",handle)
    if (handle==""){
      message="*Please enter handle*"
      document.getElementById("errormessage").innerHTML=message;
      document.getElementById("errormessage").style.color="red";
      
    }

  }
</script> -->


<script type="text/javascript">
    $(document).ready(function(){
       $("#gmbsearchbtn").on("click",function(e){
          e.preventDefault();
          var name=$("#gmbkeywords").val();
          console.log("keywords : ",name)
          if (name==""){
            alert("Please enter a Kewyord")
          }
          else{
            // console.log(name)
            $.ajax({
            url:"/gmbdata",
            type:"POST",
            data:{"name":name},
            beforeSend:function(){
              $("#loader").show();
              $("#gmbsearchbtn").prop("disabled",true)
            },
            success:function(response){
              console.log("success")
              var successmessage=response['success']
              $("#successmessage").html("✅ "+successmessage)
            },
            complete:function(){
              $("#loader").hide();
              // $("#successmessage").html("We have suuccessfully fetached your data")
              $("#gmbsearchbtn").prop("disabled",false)
              $("input").val("");
              }
          });
          }
       });
    });
    
</script>




<script>
  $(".edit").on("click",function(){
    var tr=$(this).closest("tr");
    var td=tr.find("td")
    var value=$(td[0]).text()
    console.log("value: "+value)
    $.ajax({
      url:"/editrow",
      type:"POST",
      data : JSON.stringify({'data': value}),
      contentType: "application/json",
      success:function(response){
          // console.log("success")
          // console.log(response['success']);
          var gmbname=response['success'][1];
          var rating=response['success'][2];
          var totalreview=response['success'][3];
          var address=response['success'][5];
          var phone=response['success'][6];
          console.log(gmbname)
          var modal=`<form method="POST" action="/GmbSavechanges">
                      <div class="mb-3">
                        <label for="gmbname" class="form-label"><b>Gmb Name</b></label>
                        <textarea id="gmbname" name="gmbname" rows="4" cols="50">`+gmbname+`</textarea>
                      </div>

                      <div class="mb-3">
                        <label for="rating" class="form-label"><b>Gmb Rating</b></label>
                        <input type="text" class="form-control" id="rating" aria-describedby="rating" value='`+rating+`'>
                      </div>
                      <div class="mb-3">
                        <label for="totalreview" class="form-label"><b>Total Review</b></label>
                        <input type="text" class="form-control" id="totalreview" aria-describedby="totalreview" value='`+totalreview+`'>
                      </div>
                      <div class="mb-3">
                        <label for="address" class="form-label"><b>Address</b></label>
                        <textarea id="address" name="address" rows="4" cols="50">`+address+`</textarea>
                       
                      </div>
                      <div class="mb-3">
                        <label for="phone" class="form-label"><b>Phone Number</b></label>
                        <input type="text" class="form-control" id="phone" aria-describedby="phone" value='`+phone+`'>
                      </div>
                      <button type="Submit" class="btn btn-primary">Save changes</button>
                    </form>`;
          $(".modal-body").html(modal);
        $("#exampleModal").modal('show')
      },
      
      error:function(response){
        console.log("error")
      }
    })
  });
</script>