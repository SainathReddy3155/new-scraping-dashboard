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
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
td{
  max-width: 120px;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.postinfo{
    display: flex;
    justify-content: space-around;
    align-items: center;
}
body{
    background-color:black!important;
    /* color:white */
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
          <a class="nav-link" href="/">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="/gmb?pgno=0">
          <i class="fa-brands fa-google"></i>
            <span class="nav-link-text">GMB</span>
          </a>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="/practo?pgno=0">
          <i class="fa-solid fa-stethoscope"></i>
            <span class="nav-link-text">Practo</span>
          </a>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-bs-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
          <i class="fa-brands fa-twitter"></i>
            <span class="nav-link-text">Twitter</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="/twitter?pgno=0" class="twitterinner">Twitter Info</a>
            </li>
            <li>
              <a href="#" class="twitterinner">Twitter Tweets</a>
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
          
              <a href="/linkedinbasicinfo?pgno=0" class="linkedininner">Linkedin Basic Info</a>
            </li>
            <li>
              <a href="/linkedinactivity?pgno=0" class="linkedininner">Linkedin Activity</a>
            </li>
            <li>
              <a href="/linkedinposts?pgno=0" class="linkedininner">Linkedin Posts</a>
            </li>
            <li>
              <a href="/linkedinarticles?pgno=0" class="linkedininner">Linkedin Articles</a>
            </li>
            <li>
              <a href="/linkedindocuments?pgno=0" class="linkedininner">Linkedin Documents</a>
            </li>
          </ul>
        </li>
    
        <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa-brands fa-youtube"></i>
            <span class="nav-link-text">Youtube</span>
          </a>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="/userinsights">
          <i class="fa-solid fa-chart-line"></i>
            <span class="nav-link-text">User Insights</span>
          </a>
        </li>

        <li class="nav-item" data-bs-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
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
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li> -->
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li> -->
        <!-- <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li> -->
        
        <!-- <li class="nav-item">
          <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
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
       
       
        <div class="col-xl-12 col-sm-12 mb-3">
          <div class="card text-black  o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <!-- <i class="fa fa-fw fa-shopping-cart"></i> -->
              </div>
              <div class="text-center mr-5 fs-5"><b><i class="fa-brands fa-twitter" style="color:#1DA1F2"></i> Twitter Insights</b></br>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
            
                <div class="col-xl-3 col-sm-3 mb-3">
                    <div class="card text-black  o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                <!-- <i class="fa fa-fw fa-shopping-cart"></i> -->
                            </div>
                        <div class="text-center mr-5"><b><i class="fa-brands fa-twitter" style="color:#1DA1F2"></i> Tweets</b></br>
                        <span class="text-center fw-bold fs-1">{{twitterinforesults[3]}}</span>
                    </div>
            
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-3 mb-3">
                    <div class="card text-black  o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                <!-- <i class="fa fa-fw fa-shopping-cart"></i> -->
                            </div>
                        <div class="text-center mr-5"><b><i class="fa-brands fa-twitter" style="color:#1DA1F2"></i> Followers</b></br>
                        <span class="text-center fw-bold fs-1">{{twitterinforesults[5]}}</span>
                    </div>
            
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-3 mb-3">
                    <div class="card text-black  o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                <!-- <i class="fa fa-fw fa-shopping-cart"></i> -->
                            </div>
                        <div class="text-center mr-5"><b><i class="fa-brands fa-twitter" style="color:#1DA1F2"></i> Following</b></br>
                        <span class="text-center fw-bold fs-1">{{twitterinforesults[6]}}</span>
                    </div>
            
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-3 mb-3">
                    <div class="card text-black  o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                <!-- <i class="fa fa-fw fa-shopping-cart"></i> -->
                            </div>
                        <div class="text-center mr-5"><b><i class="fa-brands fa-twitter" style="color:#1DA1F2"></i> Retweet Count</b></br>
                        <span class="text-center fw-bold fs-1">0</span>
                    </div>
            
                </div>
            </div>
        </div>
            
        </div>

        <div class="row">
        <div class="col-xl-6 col-sm-6 mb-3">
            <span class=" fw-bold fs-4">Top 5 Engaged Tweets</span>
        <table class="table">
        <thead>
            <tr>
            
            <th scope="col">Tweet</th>
            <th scope="col">Retweet Count</th>
            <th scope="col">Engagement Rate</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>I just published “What are the Symptoms, Causes and Treatment of Asthma?” medium.com/p/what-are-the…</td>
            <td>0</td>
            <td>1 - %5.26</td>
            </tr>
            <tr>
            <td>drsheetusingh.com/sleep-apnea-sp…
#Asthma_Specialist_in_Jaipur, #COPD_Specialist_in_Jaipur, #Sleep_Apnea_Specialist_in_Jaipur, #ILd_Specialist_in_Jaipur, #Chest_Specialist_in_Jaipur</td>
            <td>0</td>
            <td>1 - %5.26</td>
            </tr>
            <tr>
            <td>drsheetusingh.com/sleep-apnea-sp…
#Asthma_Specialist_in_Jaipur, #COPD_Specialist_in_Jaipur, #Sleep_Apnea_Specialist_in_Jaipur, #ILd_Specialist_in_Jaipur, #Chest_Specialist_in_Jaipur</td>
            <td>0</td>
            <td>1 - %5.26</td>
            </tr>
            <tr>
            <td>drsheetusingh.com/sleep-apnea-sp…
#Asthma_Specialist_in_Jaipur, #COPD_Specialist_in_Jaipur, #Sleep_Apnea_Specialist_in_Jaipur, #ILd_Specialist_in_Jaipur, #Chest_Specialist_in_Jaipur</td>
            <td>0</td>
            <td>1 - %5.26</td>
            </tr>
            <tr>
            <td>drsheetusingh.com/sleep-apnea-sp…
#Asthma_Specialist_in_Jaipur, #COPD_Specialist_in_Jaipur, #Sleep_Apnea_Specialist_in_Jaipur, #ILd_Specialist_in_Jaipur, #Chest_Specialist_in_Jaipur</td>
            <td>0</td>
            <td>1 - %5.26</td>
            </tr>
        </tbody>
    </table>
        </div>

        <div class="col-xl-6 col-sm-6 mb-3">
        <div class="card text-black  o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                <!-- <i class="fa fa-fw fa-shopping-cart"></i> -->
                            </div>
                        <div class="text-center mr-5"><b> Sentiment</b></br>
                        
                    </div>
            
                </div>
</div>
        </div>
    

        <div class="row">
       
       
       <div class="col-xl-12 col-sm-12 mb-3">
         <div class="card text-black  o-hidden h-100">
           <div class="card-body">
             <div class="card-body-icon">
               <!-- <i class="fa fa-fw fa-shopping-cart"></i> -->
             </div>
             <div class="text-center mr-5 fs-5"><b><i class="fa-brands fa-linkedin"  style="color:#0077b5;"></i> Linkedin Insights</b></br>
             </div>
           </div>
         </div>
       </div>


       <div class="row">
           
               <div class="col-xl-3 col-sm-3 mb-3">
                   <div class="card text-black  o-hidden h-100">
                       <div class="card-body">
                           <div class="card-body-icon">
               <!-- <i class="fa fa-fw fa-shopping-cart"></i> -->
                           </div>
                       <div class="text-center mr-5"><b><i class="fa-brands fa-linkedin"  style="color:#0077b5;"></i> Connections</b></br>
                       <span class="text-center fw-bold fs-1">500</span>
                   </div>
           
               </div>
           </div>
       </div>
       <div class="col-xl-3 col-sm-3 mb-3">
                   <div class="card text-black  o-hidden h-100">
                       <div class="card-body">
                           <div class="card-body-icon">
               <!-- <i class="fa fa-fw fa-shopping-cart"></i> -->
                           </div>
                       <div class="text-center mr-5"><b><i class="fa-brands fa-linkedin"  style="color:#0077b5;"></i> Followers</b></br>
                       <span class="text-center fw-bold fs-1">512</span>
                   </div>
           
               </div>
           </div>
       </div>
       <div class="col-xl-6 col-sm-6 mb-3">
                   <div class="card text-black  o-hidden h-100">
                       <div class="card-body">
                           <div class="card-body-icon">
               <!-- <i class="fa fa-fw fa-shopping-cart"></i> -->
                           </div>
                       <div class="text-center mr-5 fs-5"><b><i class="fa-brands fa-linkedin"  style="color:#0077b5;"></i> Posts Info</b></br>
                   </div>
                   <div class="postinfo">
                   <span class="fw-bold " style="justify:content:space-between;"> Posts<br><span class="text-center">8</span></span>
                   <span class="fw-bold " style="justify:content:space-between;"> Likes <br><span class="text-center">12</span></span>
                   <span class="fw-bold " style="justify:content:space-between;"> Comments <br><span class="text-center">7</span></span>
                   <span class="fw-bold " style="justify:content:space-between;"> Reposts <br><span class="text-center">3</span></span>
                   </div>
                   
           
               </div>
           </div>
       </div>
       <!-- <div class="col-xl-3 col-sm-3 mb-3">
                   <div class="card text-black  o-hidden h-100">
                       <div class="card-body">
                           <div class="card-body-icon">
               <i class="fa fa-fw fa-shopping-cart"></i>
                           </div>
                       <div class="text-center mr-5"><b><i class="fa-brands fa-linkedin" style="color:#0077b5;"></i> Repost Count</b></br>
                       <span class="text-center fw-bold fs-1">3</span>
                   </div>
           
               </div>
           </div>
       </div> -->
           
       </div>

       <div class="row">
       <div class="col-xl-6 col-sm-6 mb-3">
           <span class=" fw-bold fs-4">Top 5 Recent Posts</span>
       <table class="table">
       <thead>
           <tr>
           
           <th scope="col">Post</th>
           <th scope="col">Likes</th>
           <th scope="col">Comments</th>
           </tr>
       </thead>
       <tbody>
           <tr>
           <td>Hello Friends,
We are looking forward to engage medical content writers/agencies on a project. Kindly DM. #contentwriters #medical #project</td>
           <td>37</td>
           <td>14</td>
           </tr>
           <tr>
           <td>drsheetusingh.com/sleep-apnea-sp…
#Asthma_Specialist_in_Jaipur, #COPD_Specialist_in_Jaipur, #Sleep_Apnea_Specialist_in_Jaipur, #ILd_Specialist_in_Jaipur, #Chest_Specialist_in_Jaipur</td>
           <td>13</td>
           <td>0</td>
           </tr>
           <tr>
           <td>drsheetusingh.com/sleep-apnea-sp…
#Asthma_Specialist_in_Jaipur, #COPD_Specialist_in_Jaipur, #Sleep_Apnea_Specialist_in_Jaipur, #ILd_Specialist_in_Jaipur, #Chest_Specialist_in_Jaipur</td>
           <td>12</td>
           <td>1</td>
           </tr>
           <tr>
           <td>drsheetusingh.com/sleep-apnea-sp…
#Asthma_Specialist_in_Jaipur, #COPD_Specialist_in_Jaipur, #Sleep_Apnea_Specialist_in_Jaipur, #ILd_Specialist_in_Jaipur, #Chest_Specialist_in_Jaipur</td>
           <td>0</td>
           <td>0</td>
           </tr>
           <tr>
           <td>drsheetusingh.com/sleep-apnea-sp…
#Asthma_Specialist_in_Jaipur, #COPD_Specialist_in_Jaipur, #Sleep_Apnea_Specialist_in_Jaipur, #ILd_Specialist_in_Jaipur, #Chest_Specialist_in_Jaipur</td>
           <td>1</td>
           <td>0</td>
           </tr>
       </tbody>
   </table>
       </div>

       <div class="col-xl-6 col-sm-6 mb-3">
       <div class="card text-black  o-hidden h-100">
                       <div class="card-body">
                           <div class="card-body-icon">
               <!-- <i class="fa fa-fw fa-shopping-cart"></i> -->
                           </div>
                       <div class="text-center mr-5"><b> Sentiment</b></br>
                       
                   </div>
           
               </div>
</div>
       </div>
   

        </div>
      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          test
        </div>
        <div class="card-body">
          <canvas id="myAreaChart" width="100%" height="30"></canvas>
        </div>
        
      </div>
      <div class="row">
        <div class="col-lg-12"><!-- change to col-lg-8 if u want bar chart card also for only table make it col-lg-12-->
          <!-- Example Bar Chart Card-->
          <!-- <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Bar Chart Example</div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-8 my-auto">
                  <canvas id="myBarChart" width="100" height="50"></canvas>
                </div>
                <div class="col-sm-4 text-center my-auto">
                  <div class="h4 mb-0 text-primary">$34,693</div>
                  <div class="small text-muted">YTD Revenue</div>
                  <hr>
                  <div class="h4 mb-0 text-warning">$18,474</div>
                  <div class="small text-muted">YTD Expenses</div>
                  <hr>
                  <div class="h4 mb-0 text-success">$16,219</div>
                  <div class="small text-muted">YTD Margin</div>
                </div>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div> -->
          <!-- Card Columns Example Social Feed-->
          <!-- <div class="mb-0 mt-4">
            <i class="fa fa-newspaper-o"></i> News Feed</div>
          <hr class="mt-2">
          <div class="card-columns"> -->
            <!-- Example Social Card-->
            <!-- <div class="card mb-3">
              <a href="#">
                <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=610" alt="">
              </a>
              <div class="card-body">
                <h6 class="card-title mb-1"><a href="#">David Miller</a></h6>
                <p class="card-text small">These waves are looking pretty good today!
                  <a href="#">#surfsup</a>
                </p>
              </div>
              <hr class="my-0">
              <div class="card-body py-2 small">
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-thumbs-up"></i>Like</a>
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-comment"></i>Comment</a>
                <a class="d-inline-block" href="#">
                  <i class="fa fa-fw fa-share"></i>Share</a>
              </div>
              <hr class="my-0">
              <div class="card-body small bg-faded">
                <div class="media">
                  <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <h6 class="mt-0 mb-1"><a href="#">John Smith</a></h6>Very nice! I wish I was there! That looks amazing!
                    <ul class="list-inline mb-0">
                      <li class="list-inline-item">
                        <a href="#">Like</a>
                      </li>
                      <li class="list-inline-item">·</li>
                      <li class="list-inline-item">
                        <a href="#">Reply</a>
                      </li>
                    </ul>
                    <div class="media mt-3">
                      <a class="d-flex pr-3" href="#">
                        <img src="http://placehold.it/45x45" alt="">
                      </a>
                      <div class="media-body">
                        <h6 class="mt-0 mb-1"><a href="#">David Miller</a></h6>Next time for sure!
                        <ul class="list-inline mb-0">
                          <li class="list-inline-item">
                            <a href="#">Like</a>
                          </li>
                          <li class="list-inline-item">·</li>
                          <li class="list-inline-item">
                            <a href="#">Reply</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer small text-muted">Posted 32 mins ago</div>
            </div> -->
            <!-- Example Social Card-->
            <!-- <div class="card mb-3">
              <a href="#">
                <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=180" alt="">
              </a>
              <div class="card-body">
                <h6 class="card-title mb-1"><a href="#">John Smith</a></h6>
                <p class="card-text small">Another day at the office...
                  <a href="#">#workinghardorhardlyworking</a>
                </p>
              </div>
              <hr class="my-0">
              <div class="card-body py-2 small">
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-thumbs-up"></i>Like</a>
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-comment"></i>Comment</a>
                <a class="d-inline-block" href="#">
                  <i class="fa fa-fw fa-share"></i>Share</a>
              </div>
              <hr class="my-0">
              <div class="card-body small bg-faded">
                <div class="media">
                  <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <h6 class="mt-0 mb-1"><a href="#">Jessy Lucas</a></h6>Where did you get that camera?! I want one!
                    <ul class="list-inline mb-0">
                      <li class="list-inline-item">
                        <a href="#">Like</a>
                      </li>
                      <li class="list-inline-item">·</li>
                      <li class="list-inline-item">
                        <a href="#">Reply</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-footer small text-muted">Posted 46 mins ago</div>
            </div> -->
            <!-- Example Social Card-->
            <!-- <div class="card mb-3">
              <a href="#">
                <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=281" alt="">
              </a>
              <div class="card-body">
                <h6 class="card-title mb-1"><a href="#">Jeffery Wellings</a></h6>
                <p class="card-text small">Nice shot from the skate park!
                  <a href="#">#kickflip</a>
                  <a href="#">#holdmybeer</a>
                  <a href="#">#igotthis</a>
                </p>
              </div>
              <hr class="my-0">
              <div class="card-body py-2 small">
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-thumbs-up"></i>Like</a>
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-comment"></i>Comment</a>
                <a class="d-inline-block" href="#">
                  <i class="fa fa-fw fa-share"></i>Share</a>
              </div>
              <div class="card-footer small text-muted">Posted 1 hr ago</div>
            </div> -->
            <!-- Example Social Card-->
            <!-- <div class="card mb-3">
              <a href="#">
                <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=185" alt="">
              </a>
              <div class="card-body">
                <h6 class="card-title mb-1"><a href="#">David Miller</a></h6>
                <p class="card-text small">It's hot, and I might be lost...
                  <a href="#">#desert</a>
                  <a href="#">#water</a>
                  <a href="#">#anyonehavesomewater</a>
                  <a href="#">#noreally</a>
                  <a href="#">#thirsty</a>
                  <a href="#">#dehydration</a>
                </p>
              </div>
              <hr class="my-0">
              <div class="card-body py-2 small">
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-thumbs-up"></i>Like</a>
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-comment"></i>Comment</a>
                <a class="d-inline-block" href="#">
                  <i class="fa fa-fw fa-share"></i>Share</a>
              </div>
              <hr class="my-0">
              <div class="card-body small bg-faded">
                <div class="media">
                  <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <h6 class="mt-0 mb-1"><a href="#">John Smith</a></h6>The oasis is a mile that way, or is that just a mirage?
                    <ul class="list-inline mb-0">
                      <li class="list-inline-item">
                        <a href="#">Like</a>
                      </li>
                      <li class="list-inline-item">·</li>
                      <li class="list-inline-item">
                        <a href="#">Reply</a>
                      </li>
                    </ul>
                    <div class="media mt-3">
                      <a class="d-flex pr-3" href="#">
                        <img src="http://placehold.it/45x45" alt="">
                      </a>
                      <div class="media-body">
                        <h6 class="mt-0 mb-1"><a href="#">David Miller</a></h6>
                        <img class="img-fluid w-100 mb-1" src="https://unsplash.it/700/450?image=789" alt="">I'm saved, I found a cactus. How do I open this thing?
                        <ul class="list-inline mb-0">
                          <li class="list-inline-item">
                            <a href="#">Like</a>
                          </li>
                          <li class="list-inline-item">·</li>
                          <li class="list-inline-item">
                            <a href="#">Reply</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer small text-muted">Posted yesterday</div>
            </div>
          </div> -->
          <!-- /Card Columns-->
        <!-- </div>
        <div class="col-lg-4"> -->
          <!-- Example Pie Chart Card-->
          <!-- <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-pie-chart"></i> Pie Chart Example</div>
            <div class="card-body">
              <canvas id="myPieChart" width="100%" height="100"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div> -->
          <!-- Example Notifications Card-->
          <!-- <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bell-o"></i> Feed Example</div>
            <div class="list-group list-group-flush small">
              <a class="list-group-item list-group-item-action" href="#">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <strong>David Miller</strong>posted a new article to
                    <strong>David Miller Website</strong>.
                    <div class="text-muted smaller">Today at 5:43 PM - 5m ago</div>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action" href="#">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <strong>Samantha King</strong>sent you a new message!
                    <div class="text-muted smaller">Today at 4:37 PM - 1hr ago</div>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action" href="#">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <strong>Jeffery Wellings</strong>added a new photo to the album
                    <strong>Beach</strong>.
                    <div class="text-muted smaller">Today at 4:31 PM - 1hr ago</div>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action" href="#">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <i class="fa fa-code-fork"></i>
                    <strong>Monica Dennis</strong>forked the
                    <strong>startbootstrap-sb-admin</strong>repository on
                    <strong>GitHub</strong>.
                    <div class="text-muted smaller">Today at 3:54 PM - 2hrs ago</div>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action" href="#">View all activity...</a>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
        </div>
      </div> -->
      <!-- Example DataTables Card-->
     
      <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
            </tr>
        </tbody>
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