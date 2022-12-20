<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Assistant:400,700" rel="stylesheet"><link rel="stylesheet" href="./style.css">
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
  font-family: Assistant, sans-serif;
  display: flex;
  min-height: 90vh;
}
.login {
  color: white;
  background: background: #136a8a;
  background: 
    -webkit-linear-gradient(to top, #fff, #fff);
  background: 
    linear-gradient(top to bottom, #fff, #8d448b);
  margin: auto;
  box-shadow: 
    0px 2px 10px rgba(0,0,0,0.2), 
    0px 10px 20px rgba(0,0,0,0.3), 
    0px 30px 60px 1px #00000019;
  border-radius: 8px;
  padding: 50px;
}
.login .head {
  display: flex;
  align-items: center;
  justify-content: center;
}
.login .head .company {
  font-size: 2.2em;
}
.login .msg {
  text-align: center;
  color:red;
}
.login .form input[type=text].text {
  border: none;
  background: none;
  box-shadow: 0px 2px 0px 0px #8d448b;
  width: 100%;
  color: #000;
  font-size: 1em;
  outline: none;
}
.login .form .text::placeholder {
  color: #ccc;
}
.login .form input[type=password].password {
  border: none;
  background: none;
  box-shadow: 0px 2px 0px 0px #8d448b;
  width: 100%;
  color: black;
  font-size: 1em;
  outline: none;
  margin-bottom: 20px;
  margin-top: 20px;
}
.login .form .password::placeholder {
  color: #ccc;
}
.login .form .btn-login {
  background: #ae6fb7;
  text-decoration: none;
  color: #fff;
  font-weight:600;
  box-shadow: 0px 0px 0px 2px white;
  border-radius: 3px;
  padding: 5px 2em;
  transition: 0.5s;
  border-color:#ae6fb7;
}
.login .form .btn-login:hover {
  background: #8d448b;
  color: #ccc;
  transition: 0.5s;
  border-color:#ae6fb7;
}
/* .login .forgot {
  text-decoration: none;
  color: white;
  float: right;
} */
footer {
  position: absolute;
  color: #136a8a;
  bottom: 10px;
  padding-left: 20px;
}
footer p {
  display: inline;
}
footer a {
  color: green;
  text-decoration: none;
}
footer a:hover {
  text-decoration: underline;
}
footer .heart {
  color: #B22222;
  font-size: 1.5em
}
  </style>
</head>
<body>
<!-- partial:index.partial.html -->
<section class='login' id='login'>
  <div class='head'>
  <img src="https://multipliersolutions.com/wp-content/uploads/2022/06/multiplier_logo.png" alt="">
  </div>
  <p class='msg' id="errormessage">{{variable.errormessage}}</p>
  <div class='form'>
    <form method="POST" action="/login">
  <input type="text" placeholder='Enter Your Username' class='text' id='username' name="username" required><br>
  <input type="password" placeholder='Enter Your Password' class='password' name="password" required><br>
  <center><button type="submit" class='btn-login' id='do-login'>Login</button></center>
  <!-- <a href="#" class='forgot'>Forgot?</a> -->
    </form>
  </div>
</section>
<footer>
  <!-- <p>Made with <span class='heart'>&hearts;</span> by Bridges(<a href='https://github.com/pxntxs'>@pxntxs</a>)</p>
  <p>Gradient: <a href='https://uigradients.com/#Turquoiseflow'>https://uigradients.com/#Turquoiseflow</a></p> -->
</footer>
<!-- partial -->
  <script  src="./script.js"></script>
</body>
</html>
<script>
        function msgclear(){
            var x=document.getElementById("errormessage").innerHTML;
            // console.log(x)
            var y=document.getElementById("errormessage").innerHTML="";
            // console.log("y : "+y)
        }
        setInterval(msgclear,2000)
    </script>