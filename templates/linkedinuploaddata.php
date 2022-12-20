<!DOCTYPE html>
<html>
  <title>Linked Upload</title>
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
.twitterinner{
    font-weight:600!important;
    color:black!important;
    text-decoration:none;
}
table {
    table-layout: fixed;  
}
.card{
  box-shadow:0px 1px 3px 0px;
}
.card:hover{
  box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
}
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

table thead tr {
  background-color: #702963!important;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}
.submitlinkedindata{
  background-color:#702963!important;
  color:white;
  border:#702963!important
}

table{
border-collapse: collapse;
  margin: 25px 0;
  font-size: 1em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);

}
table tbody tr {
  border-bottom: 1px solid #dddddd;
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
div#example_wrapper {
    margin-top: 8px;
}
input{
  border: none;
  border-bottom: 2px solid skyblue;
  margin: 0px 13px;
  width: 500px;
  border-radius:30px;
  border:1px solid #dcdcdc;
  height:45px;
}
input:hover{
  box-shadow: 6px 5px 8px 1px #dcdcdc;
  border-radius:30px;
  border:1px solid #dcdcdc;
  height:45px;
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
        <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" >
          <a class="nav-link" href="/google">
          <i class="fa-brands fa-google"></i>
            <span class="nav-link-text">Google</span>
          </a>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" >
          <a class="nav-link" href="/aggregator">
          <i class="fa-solid fa-stethoscope"></i>
            <span class="nav-link-text">Aggregator</span>
          </a>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" >
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
        <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" >
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
        <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" >
          <a class="nav-link" href="/cleanupandmerge">
          <i class="fa-solid fa-chart-line"></i>
            <span class="nav-link-text">Clean Up & Merge</span>
          </a>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" >
          <a class="nav-link" href="/linkedinuploaddata">
          <i class="fa-solid fa-database"></i>
            <span class="nav-link-text">Linkedin Data Upload</span>
          </a>
        </li>

        <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" >
          <a class="nav-link" href="/logout">
          <i class="fa fa-fw fa-sign-out"></i>
            <span class="nav-link-text">Logout</span>
          </a>
        </li>

      </ul>
      <!-- <ul class="navbar-nav sidenav-toggler">
      
      </ul> -->
      <ul class="navbar-nav ml-auto">
        <!-- <li class="nav-item dropdown">
      
       
      
        </li> -->
      </ul>
      <!-- <div class="d-flex"> -->
        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
        <!-- </div> -->
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <!-- <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol> -->
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          
      </div>
      <!-- Area Chart Example-->
      <!-- <div class="card mb-3">
        <div class="card-header">
          test
        </div>
        <div class="card-body">
          <canvas id="myAreaChart" width="100%" height="30"></canvas>
        </div>
        
      </div> -->
      <div class="row">
        <div class="col-lg-12"><!-- change to col-lg-8 if u want bar chart card also for only table make it col-lg-12-->
          <!-- Example Bar Chart Card-->
          <!-- <div class="card mb-3">
            <div class="card-header">
            
             
            -->
      <!-- Example DataTables Card-->
     


<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <form class="d-flex">
      
        <input type="text" class="w-90 linkedinupload" id="linkedinurlandkeyword" name="keywordsandurl" placeholder="Linkedin URL or Keywords" required>
        <button type="submit" class="btn btn-primary submitlinkedindata" style="margin:0px 10px!important">Submit</button>
      </form>
    </div>
  </div>
</div>

      <table class="table responsive" id="example">
        <thead>
            <tr>
            <th scope="col">Linkedin Url & Keywords</th>
            <th scope="col">Status</th>
            </tr>
        </thead>
        
    </table>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Multiplier AI Solutions</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    
</body>
</html>


<script>

$(document).ready(function() {
 
 $('#example').DataTable( {  
    
    "processing": true,
    "serverSide": true,
    "serverMethod":"POST",
    
     ajax: {
        url: '/linkedindatauploadapi',
     },
     searching:true,
     sort:false,
    
     
     "serverSide": true,
     "columns": [
        { data: "linkedinurl" },
         { data: "status" },
         
         
         


     ]

 } );
} );
</script>


<script>
  $(document).ready(function(){
    $(".submitlinkedindata").on("click",function(){
      if(($("#linkedinurlandkeyword").val()==="") ) {
         alert("Please Upload Keywords or Linkedin URL")
          return false
        }
       
        else{
          var data=$("#linkedinurlandkeyword").val();
          console.log(data)
          $.ajax({
            url:'/linkedindataupload',
            type:'POST',
            data:JSON.stringify({'linkedinuploaddata':data}),
            contentType:'application/json',
            success:function(response){
             console.log("success")
            },
            error:function(response){
              alert("something went wrong");
            }

          });
        }
    });
  });
</script>