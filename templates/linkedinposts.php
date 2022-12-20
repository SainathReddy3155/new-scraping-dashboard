<!DOCTYPE html>
<html>
  <title>Linkedin Activity</title>
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
html {
  position: relative;
  min-height: 100%;
}

body {
  overflow-x: hidden;
}

body.sticky-footer {
  margin-bottom: 56px;
}

body.sticky-footer .content-wrapper {
  min-height: calc(100vh - 56px - 56px);
}

body.fixed-nav {
  padding-top: 56px;
}

.content-wrapper {
  min-height: calc(100vh - 56px);
  padding-top: 1rem;
}

.scroll-to-top {
  position: fixed;
  right: 15px;
  bottom: 3px;
  display: none;
  width: 50px;
  height: 50px;
  text-align: center;
  color: white;
  background: rgba(52, 58, 64, 0.5);
  line-height: 45px;
}

.scroll-to-top:focus, .scroll-to-top:hover {
  color: white;
}

.scroll-to-top:hover {
  background: #343a40;
}

.scroll-to-top i {
  font-weight: 800;
}

.smaller {
  font-size: 0.7rem;
}

.o-hidden {
  overflow: hidden !important;
}

.z-0 {
  z-index: 0;
}

.z-1 {
  z-index: 1;
}

#mainNav .navbar-collapse {
  overflow: auto;
  max-height: 75vh;
}

#mainNav .navbar-collapse .navbar-nav .nav-item .nav-link {
  cursor: pointer;
}

#mainNav .navbar-collapse .navbar-sidenav .nav-link-collapse:after {
  float: right;
  content: '\f107';
  font-family: 'FontAwesome';
}

#mainNav .navbar-collapse .navbar-sidenav .nav-link-collapse.collapsed:after {
  content: '\f105';
}

#mainNav .navbar-collapse .navbar-sidenav .sidenav-second-level,
#mainNav .navbar-collapse .navbar-sidenav .sidenav-third-level {
  padding-left: 0;
}

#mainNav .navbar-collapse .navbar-sidenav .sidenav-second-level > li > a,
#mainNav .navbar-collapse .navbar-sidenav .sidenav-third-level > li > a {
  display: block;
  padding: 0.5em 0;
}

#mainNav .navbar-collapse .navbar-sidenav .sidenav-second-level > li > a:focus, #mainNav .navbar-collapse .navbar-sidenav .sidenav-second-level > li > a:hover,
#mainNav .navbar-collapse .navbar-sidenav .sidenav-third-level > li > a:focus,
#mainNav .navbar-collapse .navbar-sidenav .sidenav-third-level > li > a:hover {
  text-decoration: none;
}

#mainNav .navbar-collapse .navbar-sidenav .sidenav-second-level > li > a {
  padding-left: 1em;
}

#mainNav .navbar-collapse .navbar-sidenav .sidenav-third-level > li > a {
  padding-left: 2em;
}

#mainNav .navbar-collapse .sidenav-toggler {
  display: none;
}

#mainNav .navbar-collapse .navbar-nav > .nav-item.dropdown > .nav-link {
  position: relative;
  min-width: 45px;
}

#mainNav .navbar-collapse .navbar-nav > .nav-item.dropdown > .nav-link:after {
  float: right;
  width: auto;
  content: '\f105';
  border: none;
  font-family: 'FontAwesome';
}

#mainNav .navbar-collapse .navbar-nav > .nav-item.dropdown > .nav-link .indicator {
  position: absolute;
  top: 5px;
  left: 21px;
  font-size: 10px;
}

#mainNav .navbar-collapse .navbar-nav > .nav-item.dropdown.show > .nav-link:after {
  content: '\f107';
}

#mainNav .navbar-collapse .navbar-nav > .nav-item.dropdown .dropdown-menu > .dropdown-item > .dropdown-message {
  overflow: hidden;
  max-width: none;
  text-overflow: ellipsis;
}

@media (min-width: 992px) {
  #mainNav .navbar-brand {
    width: 250px;
  }
  #mainNav .navbar-collapse {
    overflow: visible;
    max-height: none;
  }
  #mainNav .navbar-collapse .navbar-sidenav {
    position: absolute;
    top: 0;
    left: 0;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    margin-top: 56px;
  }
  #mainNav .navbar-collapse .navbar-sidenav > .nav-item {
    width: 250px;
    padding: 0;
  }
  #mainNav .navbar-collapse .navbar-sidenav > .nav-item > .nav-link {
    padding: 1em;
  }
  #mainNav .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level,
  #mainNav .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level {
    padding-left: 0;
    list-style: none;
  }
  #mainNav .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level > li,
  #mainNav .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level > li {
    width: 250px;
  }
  #mainNav .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level > li > a,
  #mainNav .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level > li > a {
    padding: 1em;
  }
  #mainNav .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level > li > a {
    padding-left: 2.75em;
  }
  #mainNav .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level > li > a {
    padding-left: 3.75em;
  }
  #mainNav .navbar-collapse .navbar-nav > .nav-item.dropdown > .nav-link {
    min-width: 0;
  }
  #mainNav .navbar-collapse .navbar-nav > .nav-item.dropdown > .nav-link:after {
    width: 24px;
    text-align: center;
  }
  #mainNav .navbar-collapse .navbar-nav > .nav-item.dropdown .dropdown-menu > .dropdown-item > .dropdown-message {
    max-width: 300px;
  }
}

#mainNav.fixed-top .sidenav-toggler {
  display: none;
}

@media (min-width: 992px) {
  #mainNav.fixed-top .navbar-sidenav {
    height: calc(100vh - 112px);
  }
  #mainNav.fixed-top .sidenav-toggler {
    position: absolute;
    top: 0;
    left: 0;
    display: flex;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    margin-top: calc(100vh - 56px);
  }
  #mainNav.fixed-top .sidenav-toggler > .nav-item {
    width: 250px;
    padding: 0;
  }
  #mainNav.fixed-top .sidenav-toggler > .nav-item > .nav-link {
    padding: 1em;
  }
}

#mainNav.fixed-top.navbar-dark .sidenav-toggler {
  background-color: #212529;
}

#mainNav.fixed-top.navbar-dark .sidenav-toggler a i {
  color: #adb5bd;
}

#mainNav.fixed-top.navbar-light .sidenav-toggler {
  background-color: #dee2e6;
}

#mainNav.fixed-top.navbar-light .sidenav-toggler a i {
  color: rgba(0, 0, 0, 0.5);
}

body.sidenav-toggled #mainNav.fixed-top .sidenav-toggler {
  overflow-x: hidden;
  width: 55px;
}

body.sidenav-toggled #mainNav.fixed-top .sidenav-toggler .nav-item,
body.sidenav-toggled #mainNav.fixed-top .sidenav-toggler .nav-link {
  width: 55px !important;
}

body.sidenav-toggled #mainNav.fixed-top #sidenavToggler i {
  -webkit-transform: scaleX(-1);
  -moz-transform: scaleX(-1);
  -o-transform: scaleX(-1);
  transform: scaleX(-1);
  filter: FlipH;
  -ms-filter: 'FlipH';
}

#mainNav.static-top .sidenav-toggler {
  display: none;
}

@media (min-width: 992px) {
  #mainNav.static-top .sidenav-toggler {
    display: flex;
  }
}

body.sidenav-toggled #mainNav.static-top #sidenavToggler i {
  -webkit-transform: scaleX(-1);
  -moz-transform: scaleX(-1);
  -o-transform: scaleX(-1);
  transform: scaleX(-1);
  filter: FlipH;
  -ms-filter: 'FlipH';
}

.content-wrapper {
  overflow-x: hidden;
  background: white;
}

@media (min-width: 992px) {
  .content-wrapper {
    margin-left: 250px;
  }
}

#sidenavToggler i {
  font-weight: 800;
}

.navbar-sidenav-tooltip.show {
  display: none;
}

@media (min-width: 992px) {
  body.sidenav-toggled .content-wrapper {
    margin-left: 55px;
  }
}

body.sidenav-toggled .navbar-sidenav {
  width: 55px;
}

body.sidenav-toggled .navbar-sidenav .nav-link-text {
  display: none;
}

body.sidenav-toggled .navbar-sidenav .nav-item,
body.sidenav-toggled .navbar-sidenav .nav-link {
  width: 55px !important;
}

body.sidenav-toggled .navbar-sidenav .nav-item:after,
body.sidenav-toggled .navbar-sidenav .nav-link:after {
  display: none;
}

body.sidenav-toggled .navbar-sidenav .nav-item {
  white-space: nowrap;
}

body.sidenav-toggled .navbar-sidenav-tooltip.show {
  display: flex;
}

#mainNav.navbar-dark .navbar-collapse .navbar-sidenav .nav-link-collapse:after {
  color: #868e96;
}

#mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item > .nav-link {
  color: #868e96;
}

#mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item > .nav-link:hover {
  color: #adb5bd;
}

#mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level > li > a,
#mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level > li > a {
  color: #868e96;
}

#mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level > li > a:focus, #mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level > li > a:hover,
#mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level > li > a:focus,
#mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level > li > a:hover {
  color: #adb5bd;
}

#mainNav.navbar-dark .navbar-collapse .navbar-nav > .nav-item.dropdown > .nav-link:after {
  color: #adb5bd;
}

@media (min-width: 992px) {
  #mainNav.navbar-dark .navbar-collapse .navbar-sidenav {
    background: #343a40;
  }
  #mainNav.navbar-dark .navbar-collapse .navbar-sidenav li.active a {
    color: white !important;
    background-color: #495057;
  }
  #mainNav.navbar-dark .navbar-collapse .navbar-sidenav li.active a:focus, #mainNav.navbar-dark .navbar-collapse .navbar-sidenav li.active a:hover {
    color: white;
  }
  #mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level,
  #mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level {
    background: #343a40;
  }
}

#mainNav.navbar-light .navbar-collapse .navbar-sidenav .nav-link-collapse:after {
  color: rgba(0, 0, 0, 0.5);
}

#mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item > .nav-link {
  color: rgba(0, 0, 0, 0.5);
}

#mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item > .nav-link:hover {
  color: rgba(0, 0, 0, 0.7);
}

#mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level > li > a,
#mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level > li > a {
  color: rgba(0, 0, 0, 0.5);
}

#mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level > li > a:focus, #mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level > li > a:hover,
#mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level > li > a:focus,
#mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level > li > a:hover {
  color: rgba(0, 0, 0, 0.7);
}

#mainNav.navbar-light .navbar-collapse .navbar-nav > .nav-item.dropdown > .nav-link:after {
  color: rgba(0, 0, 0, 0.5);
}

@media (min-width: 992px) {
  #mainNav.navbar-light .navbar-collapse .navbar-sidenav {
    background: #f8f9fa;
  }
  #mainNav.navbar-light .navbar-collapse .navbar-sidenav li.active a {
    color: #000 !important;
    background-color: #e9ecef;
  }
  #mainNav.navbar-light .navbar-collapse .navbar-sidenav li.active a:focus, #mainNav.navbar-light .navbar-collapse .navbar-sidenav li.active a:hover {
    color: #000;
  }
  #mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level,
  #mainNav.navbar-light .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level {
    background: #f8f9fa;
  }
}

.card-body-icon {
  position: absolute;
  z-index: 0;
  top: -25px;
  right: -25px;
  font-size: 5rem;
  -webkit-transform: rotate(15deg);
  -ms-transform: rotate(15deg);
  transform: rotate(15deg);
}

@media (min-width: 576px) {
  .card-columns {
    column-count: 1;
  }
}

@media (min-width: 768px) {
  .card-columns {
    column-count: 2;
  }
}

@media (min-width: 1200px) {
  .card-columns {
    column-count: 2;
  }
}

.card-login {
  max-width: 25rem;
}

.card-register {
  max-width: 40rem;
}

footer.sticky-footer {
  position: absolute;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 56px;
  background-color: #e9ecef;
  line-height: 55px;
}

@media (min-width: 992px) {
  footer.sticky-footer {
    width: calc(100% - 250px);
  }
}

@media (min-width: 992px) {
  body.sidenav-toggled footer.sticky-footer {
    width: calc(100% - 55px);
  }
}
.twitterinner{
    font-weight:600!important;
    color:black!important;
    text-decoration:none;
}
.navbar-nav.ml-auto{
    display: flex;
    justify-content: flex-end;
    align-items: center;
    /* margin-left: 949px; */
    /* float: right!important; */
}
.logo{
    width: 104px;
    height: 43px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 35px;
}
.nav-link{
    font-weight:600!important;
    color:black!important;
}

.linkedininner{
    font-weight:600!important;
    color:black!important;
    text-decoration:none;
}

.card{
  box-shadow:0px 1px 3px 0px;
}
.btn-outline-primary{
    padding: 2px;
}
.searchbtn{
    display: flex;
    justify-content: end;
    align-items: center;
}
.loadergif{
  width: 25px;
}
table {
    table-layout: fixed;  
}
td{
  max-width: 120px;
  /* overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap; */
}

.formsearchbtn:hover{
  box-shadow: 2px 2px 8px rgba(-2, 10, 10, 2);
}

.downloadlinkedinposts{
  background-color:#702963!important;
  border: #702963!important;
}
.downloadlinkedinposts:hover{
    box-shadow: 2px 2px 8px rgba(-2, 10, 10, 2);
}
#linkedinsearchbtn{
    background-color:#702963!important;
  border: #702963!important;
  color:white;
}
/* table {
    table-layout: fixed;  
} */
table {
    table-layout: fixed;  
    border:2px solid blue;
   
}

    td{
  max-width: 120px;
  /* overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap; */
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
  background-color: #702963!important;
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
.downloadallpracto{
  background-color:#702963!important;
  border: #702963!important;
}
.downentirebtn{
    background-color:#702963!important;
  border: #702963!important;
}

div#example_length {
    display: flex;
}
select.form-select.form-select-sm {
    border: none;
    border-bottom: 2px solid skyblue;
}
</style>


</head>

<body class="fixed-nav sticky-footer bg-light" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
    <a class="navbar-brand" href="/">
    <img class="logo" src="https://multipliersolutions.com/wp-content/uploads/2022/06/multiplier_logo.png" alt="">
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="/dashboard">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="/gmbfinal">
          <i class="fa-brands fa-google"></i>
            <span class="nav-link-text">GMB</span>
          </a>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="/aggregator">
          <i class="fa-solid fa-stethoscope"></i>
            <span class="nav-link-text">Aggregator</span>
          </a>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-bs-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
          <i class="fa-brands fa-twitter"></i>
            <span class="nav-link-text">Twitter</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="/twitterinfo" class="twitterinner">Twitter Info</a>
            </li>
            <li>
              <a href="/twittertweetsdata" class="twitterinner">Twitter Tweets</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-bs-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
          <i class="fa-brands fa-linkedin"></i>
            <span class="nav-link-text">Linkedin</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
          
              <a href="/linkedinbasicinfo" class="linkedininner">Linkedin Basic Info</a>
            </li>
            <li>
              <a href="/linkedinactivity" class="linkedininner">Linkedin Activity</a>
            </li>
            <li>
              <a href="/linkedinposts" class="linkedininner">Linkedin Posts</a>
            </li>
            <li>
              <a href="/linkedinarticles" class="linkedininner">Linkedin Articles</a>
            </li>
            <li>
              <a href="/linkedindocuments" class="linkedininner">Linkedin Documents</a>
            </li>
          </ul>
        </li>
    
        <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="/youtube">
            <i class="fa-brands fa-youtube"></i>
            <span class="nav-link-text">Youtube</span>
          </a>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="/cleanupandmerge">
          <i class="fa-solid fa-chart-line"></i>
            <span class="nav-link-text">Clean Up & Merge</span>
          </a>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="/linkedinuploaddata">
          <i class="fa-solid fa-database"></i>
            <span class="nav-link-text">Linkedin Data Upload</span>
          </a>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="/logout">
          <i class="fa fa-fw fa-sign-out"></i>
            <span class="nav-link-text">Logout</span>
          </a>
        </li>

      </ul>
      <!-- <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul> -->
      <ul class="navbar-nav ml-auto">
        
      </ul>
     
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      
      <!-- Area Chart Example-->
      <div class="card mb-3">
      <center>
  <!-- <div class="card-body">
    <span id="errormessage"><span>
    <form id="linkednurl" method="POST">
      <b>Linkedin URL : </b><input type="text" name="name" class="linkedinurlclass" id="linkedinurl"  placeholder="Enter Linkedinurl" required>
      <button type="Submit" class="btn btn-outline-primary linkedinsearch" id="linkedinsearchbtn" >Get Data</button>
</form><br>
<b><span id="successmessage" style="font-weight:600;font-"><span></b>
    <div id="loader"  style="display:none;">
                    <img class="loadergif" src="static\files\animation-500-l84av9gp-unscreen.gif" alt=""> -->
                    <!-- <i class="fas fa-circle-notch fa-spin text-info"></i> -->
                    <!-- <b>Please wait while we fetch your data... Don't close or refresh the browser</b> 
      
    </div>
  </div> -->
</center>

    

        
      </div>
      <div class="row">
        <div class="col-lg-12 col-sm-12"><!-- change to col-lg-8 if u want bar chart card also for only table make -->
              
      <!-- Example DataTables Card-->
      <div class="row">
        <div class="col-lg-6 col-sm-6">
            
            <button class="btn btn-primary downloadlinkedinposts"><i class="fa-sharp fa-solid fa-download"></i> Download excel</button>
        </div>
        
</div>


      <div class="card mt-4">
        <div class="card-body">    
     <center>
      <span id="deletealertmessage"></span>
      <table class="table mt-8 responsive" id="example">
        <thead>
            <tr>
            <th scope="col">Name</th>
            <th scope="col">Post data</th>
            <th scope="col">Reactions</th>
            <th scope="col">Comments</th> 
            <!-- <th scope="col">Edit</th>
            <th scope="col">Delete</th> -->
            </tr>
        </thead>
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
      <form method="POST" action="/linkedinpostsavechanges">
                      <div class="mb-3">
                        <label for="name" class="form-label"><b>Name</b></label>
                        <input type="text" class="form-control" id="linkediname" name="linkedin_name" aria-describedby="Name" readonly>
                      </div>
                      <div class="mb-3">
                        <label for="Post Data" class="form-label"><b>Post Data</b></label>
                        <textarea type="text" class="form-control" id="postdata" name="Postdata" aria-describedby="Description" rows="4" cols="50"></textarea>
                       
                      </div>
                      <div class="mb-3">
                        <label for="Reactions" class="form-label"><b>Reactions</b></label>
                        <input type="text" class="form-control" id="Reactions" name="reactions" aria-describedby="Reactions" >
                      </div>
                      <div class="mb-3">
                        <label for="Comments" class="form-label"><b>	Comments</b></label>
                        <input type="text" class="form-control" id="Comments" name="comments" aria-describedby="Comments" >
                      </div>
                     
                    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>
<!--end of edit modal-->

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
                        <label for="linkedininfo" class="form-label"><b>Permanently Delete Linkedin Post Data</b></label>
                        <input type="text" class="form-control" id="linkedininfodelete" readonly name="linkedininfo"  aria-describedby="deleteuser" >
                      </div>
      <div class="mb-3">
                       
                        <label for="deleting" class="form-label"><b>Please type "Delete" to confirm.</b></label>
                        <span id="message"></span>
                        <input type="text" class="form-control deleteinput" id="deleting" required name="deletemodal" aria-describedby="deleteuser" >
                      </div>
                      <button type="Submit" class="btn btn-danger w-100" id="modaldelete"  placeholder="Delete">Delete</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!--end delete modal-->

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Multiplier AI Solutions</small>
        </div>
      </div>
    </footer>
</body>
</html>


<script>

$(document).ready(function() {
 
 $('#example').DataTable( {  
    "processing": true,
    "serverSide": true,
    "serverMethod":"POST",
    
     ajax: {
        url: '/likedinpostsdatatable',
     },
     searching:true,
     sort:false,
    
     "serverSide": true,
     "columns": [
      
         { data: "Name" },
         { data: "post_data" },
         { data: "post_likes" },
         { data: "post_comments" },
        //  {
        //     data: null,
        //     className: "dt-center editor-edit",
        //     defaultContent: '<button type="button" class="btn btn-primary" style="background-color:#702963!important;border: #702963!important"; data-bs-toggle="modal" data-bs-target="#exampleModal" id="editmodal">Edit</button>',
        //     orderable: false
        // },
        // {
        //     data: null,
        //     className: "dt-center editor-delete",
        //     defaultContent: '<button type="button" class="btn btn-danger" style="background-color:#702963!important;border: #702963!important"; data-bs-toggle="modal" data-bs-target="#deleteModal" id="deletemodalbtn">Delete</button>',
        //     orderable: false
        // },
     ]
 } );
} );
</script>

<script>
  $(document).ready(function(){
    $(".downloadlinkedinposts").on("click",function(){
      window.location.replace("/downloadlinkedinpostsexcel")
    });
  });
</script>

<script>
    $('#example').on('click', 'td.editor-edit', function (e) {
        e.preventDefault();
        var tr=$(this).closest("tr")
        var td=tr.find("td")
        var linkedinname=$(td[0]).text()
        var postdata=$(td[1]).text()
        var reactions=$(td[2]).text()
        var comments=$(td[3]).text()
        var about=$(td[4]).text()
        var followers=$(td[5]).text()
        var linkedinurl=$(td[6]).text()
        $("#linkediname").attr("value",linkedinname)
        $("#postdata").html(postdata)
        $("#Reactions").attr("value",reactions)
        $("#Comments").attr("value",comments)
        

    } );
</script>

<script>
    $('#example').on('click', 'td.editor-delete', function (e) {
        e.preventDefault();
        var tr=$(this).closest("tr")
        var td=tr.find("td")
        var name=$(td[0]).text()
        console.log(name)
        $("#linkedininfodelete").attr("value",name)
       
    } );
</script>


<script>
  $(document).ready(function(){
    $("#modaldelete").on("click",function(){
      if(($("#deleting").val()==="") || ($("#deleting").val()!="Delete")) {
          $("#message").html("<h6 style='color:red;'>Please Enter 'Delete' to delete this record</h6>")
          return false
        }
        else{
          var twitterhandel=$("#linkedininfodelete").val();
          var inputdata=$("#deleting").val();
          console.log("name is :",name)
          console.log("inputdata : ",inputdata)
          $.ajax({
            url:'',
            type:'POST',
            data:JSON.stringify({'twitterhandel':twitterhandel,'inputdata':inputdata}),
            contentType:'application/json',
            success:function(response){
              // console.log("success")
              var succesmes=response['success']
              alert("succesfully deleted")
            },
            error:function(response){
              alert(response['errormessage']);
            }

          });
        }
    });
  });
</script>