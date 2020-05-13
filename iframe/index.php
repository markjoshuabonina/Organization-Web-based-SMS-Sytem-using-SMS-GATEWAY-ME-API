<!-- <?php 


//include 'swal.php';

 




 
 


?>
<a href='#' class='btn btn-info info' onclick="_gaq.push(['_tracKEvent','exit','footer','Lipis']); ">INFO</a>

 <script >
 	  document.querySelector(".info").onclick = function(){
 				swal({
 						title: "Sam",
 						text:  "joshua",
 						type:  "info",
 						closeOnConfirm: true,




 				}
 			);


 	  }; 


 </script> -->

 <head>
  <script src="jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>

<?php

echo '
<script type="text/javascript">

$(document).ready(function(){

  swal({
    position: "top-end",
    type: "success",
    title: "Your work has been saved",
    showConfirmButton: false,
    timer: 1500
  })
});

</script>
';
 ?>