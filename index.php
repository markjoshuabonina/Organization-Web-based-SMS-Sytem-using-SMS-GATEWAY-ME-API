<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Main Page</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">


       <img src="images/it_plus_logo.jpg" width="136" height="136" class="d-inline-block align-top" alt="">

      <div class="list-group list-group-flush">
      <div class="sidebar-heading">IT Plus Organization </div>

        <a href="iframe/dashboard.php" class="list-group-item list-group-item-action bg-light" target="sms_Frame">Dashboard</a>
        <a href="iframe/sms.php" class="list-group-item list-group-item-action bg-light" target="sms_Frame">New Message</a>
    
        <a href="iframe/members.php" class="list-group-item list-group-item-action bg-light" target="sms_Frame">Members</a>
        <a href="iframe/outbox.php" class="list-group-item list-group-item-action bg-light" target="sms_Frame">Outbox</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Setup</a>
      
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">



      <!-- Image and text -->
<nav class="navbar navbar-dark bg-dark"
  <a class="navbar-brand" href="#">
   
     <!--   toggle -->

         <button class="btn btn-primary" id="menu-toggle">Toggle</button>

       <!--   //<button type="button" lass="btn btn-primary" id="menu-toggle>Success</button> -->
    
  
  </a>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>

  

      <div class="container-fluid">
        <h1 class="mt-4">WEB-BASED SMS NOTIFICATION</h1>
        <h4>&nbsp &nbsp &nbsp &nbspA Web-Based System that enables the members to register the organization and be updated by a SMS notification. </h4>
       

           <div>
          <iframe src="iframe/dashboard.php" name="sms_Frame" width="100%" height="600px"></iframe>  
     

    </div>
     

      </div>
    </div>
    
 




    <!-- /#page-content-wrapper -->
  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>

