<?php  

if ((!isset($_SESSION['id'])) AND ( !isset($_SESSION['nome']))) {
//            //  header("Location: https://extricable-volumes.000webhostapp.com/index.php?p=login");
//      //     echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=?p=login'>"; 
//				       // <script type=\"text/javascript\">
//				       // 	alert(\"Deslogado... \");
//			       // 	</script>"; 
//           
      echo "<script>document.location='?p=login'</script>";   
//          
      }
?>


<!--if ((!isset($_SESSION['id'])) AND ( !isset($_SESSION['nome']))) {
          //     header("Location: https://extricable-volumes.000webhostapp.com/index.php?p=login");
           echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=?p=login'>
				        <script type=\"text/javascript\">
				        	alert(\"Deslogado... \")
			        	</script>"; 
            echo "<script>document.location='?p=login'</script>";   
           session_destroy();
}-->