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
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">



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


div.content1 {
  margin-left: 210px;
  padding: 1px 16px;
  height: 1000px;
  margin-top: -813px !important;
}

div.content2 {
  margin-left: 210px;
  padding: 1px 16px;
  height: 1000px;
  margin-top: -386px !important;
}

.loadergif{
  width: 92px;
  height: 80px;
}
.card{
  box-shadow: 0px 2px 5px 3px;
}

.btn-outline-primary{
    padding: 2px;
}

</style>
</head>
<body>

<div class="sidebar">
  <img class="logo" src="https://multipliersolutions.com/wp-content/uploads/2022/06/multiplier_logo.png" alt="">
<a class="" href="/"><i class="fa-solid fa-house"></i> Home</a>
<a class="active" href="/twitter"><i class="fa-brands fa-twitter"></i> Twitter</a>
  <!-- <a href="#">Instagram</a> -->
  <a href="#contact"><i class="fa-brands fa-linkedin-in"></i> Linkedin</a>
  <a href="#about"><i class="fa-brands fa-youtube"></i> YouTube</a>
  <a href="/gmb"><i class="fa-brands fa-google"></i> GMB</a>
  <a href="#"><i class="fa-solid fa-stethoscope"></i> Practo</a>

</div>

<div class="content">
<div class="card">
<center>
  <div class="card-body">
    <span id="errormessage"><span>
    <form id="tweetsearch" method="POST">
      <b>Handle : </b><input type="text" name="name" class="handle" id="twitterhandle"  placeholder="Enter Handle" required>
      <button type="Submit" class="btn btn-outline-primary twittersearch" id="twittersearchbtn" >Get Data</button>
    <form>
    <div id="loader"  style="display:none;">
                    <img class="loadergif" src="static\files\animation-500-l84av9gp-unscreen.gif" alt="">
                    <!-- <i class="fas fa-circle-notch fa-spin text-info"></i> -->
                    <b>Please wait while we fetch your data... Don't close or refresh the browser</b> 
      <!-- <span id="successmessage"><span> -->
    </div>
  </div>
</center>
</div>
</div>


<!--TWITTER BASIC INFO DATA-->

<div class="content1">
<span><b>Twitter Basic Info</b></span>
<div class="card">
<center>
  <div class="card-body">
    
  <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Twitter Handel</th>
                <th>Total tweets</th>
                <th>Tweets per day</th>
                <th>Followers</th>
                <th>Following</th>
                <th>Favourited</th>

            </tr>
        </thead>
        <tbody>
          {%for info in twitter_info %}
            <tr>       
                <td>{{info[1]}}</td>
                <td>{{info[2]}}</td>
                <td>{{info[3]}}</td>
                <td>{{info[4]}}</td>
                <td>{{info[5]}}</td>
                <td>{{info[6]}}</td>
                <td>{{info[7]}}</td>
            </tr>
            {%endfor%}
        </tbody>
        
    </table>
</center>
</div>
</div>

<!--END TWITTER BASIC INFO DATA-->


<!--TWITTER INNER TABLE DATA-->
<div class="row">
  <div class="col-sm-12">
<div class="content2">
<span><b>Twitter Tweets Data</b></span>
<div class="card">
<center>
  <div class="card-body">
    
  <table id="example1" class="table table-striped table-responsive" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Twitter Handel</th>
                <!-- <th>Days Since Tweet</th> -->
                <th>Username</th>
                <th>Tweet</th>
                <th>Retweet_Count</th>
                <th>Tweet_Favourited</th>
                <th>Engagement_Rate</th>


            </tr>
        </thead>
        <tbody>
          {%for tweets in twitter_tweets_data%}
            <tr>
                <td>{{tweets[1]}}</td>
                <!-- <td>{{tweets[2]}}</td> -->
                <td>{{tweets[3]}}</td>
                <td>{{tweets[4]}}</td>
                <td>{{tweets[5]}}</td>
                <td>{{tweets[6]}}</td>
                <td>{{tweets[7]}}</td>
                <td>{{tweets[8]}}</td>
                <!-- <td><button type="button" class="btn btn-info edit" data-bs-toggle="modal" data-bs-target="#exampleModal"> Edit </button></td>
                <td><button type="button" class="btn btn-danger delete"> Delete</button></td> -->
            </tr>
            {%endfor%}
        </tbody>
        
    </table>
</center>
</div>
</div>

</div>
</div>
<!--END OF TWITTER INNER TABLE DATA-->

</body>
</html>
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


<!--datatable-->
<script>

$(document).ready(function () {
    $('#example').DataTable({
      responsive: true
    });
    
});
</script>
<!--datatable-->

<!--datatable-->
<script>

$(document).ready(function () {
    $('#example1').DataTable({
      responsive: true,
      buttons: [ 
            {
                extend:'excel',
                text:'Download Excel',
                className:'btn-primary'
            }]
    });
});
</script>
<!--datatable-->


<script type="text/javascript">
    $(document).ready(function(){
       $("#twittersearchbtn").on("click",function(e){
          e.preventDefault();
          var name=$("#twitterhandle").val();
          if (name==""){
            alert("Please enter twitter handel")
          }
          else{
            // console.log(name)
            $.ajax({
            url:"/searchtwitter",
            type:"POST",
            data:{"name":name},
            beforeSend:function(){
              $("#loader").show();
              $("#twittersearchbtn").prop("disabled",true)
            },
            success:function(){
              console.log("success")
            },
            complete:function(){
              $("#loader").hide();
              // $("#successmessage").html("We have suuccessfully fetached your data")
              $("#twittersearchbtn").prop("disabled",false)
              $("input").val("");
              }
          });
          }
       });
    });
    
</script>
