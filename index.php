<?php 
require_once 'inc/header.php';

 ?>


  <!-- Pagination  -->
  <?php 


    $par_page =2; 

    if (isset($_GET['page'])) {

        $page=$_GET['page'];

    }else{

        $page=1;

    }

    $start_from = ($page-1)*$par_page;







   ?>
  <!-- Pagination  -->

  <div class="container">
    <div class="row">
      <div class="col-md-8 mt-4">
        

        <?php
           $getdata ="SELECT * FROM blog_post LIMIT $start_from,$par_page";
           $storData = $db->select($getdata);
           if ($storData) {
             while ($rasult= $storData->fetch_assoc()) {
         ?>

        <!-- Blog Post -->
        <div class="card mb-4">
          <img class="card-img-top" src="admin/upload/<?php echo $rasult['img'];?>" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title"><?php echo $rasult['title'];?></h2>
            <p class="card-text">
              <?php echo $helpers->textSorten($rasult['postbody'])?>
            </p>
            <a href="blogpost.php?id=<?php echo $rasult['id']; ?>" class="btn btn-primary ">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted Time  <?php echo $helpers->formetDate($rasult['date']) ?> by 
            <a href="">
              <?php echo $rasult['postby']; ?>
            </a> 
          </div>
        </div>
 
      <?php } // End While Loop ?>




        <!-- Pagination -->

        <?php 

        // Pagination Query 

        $query ="SELECT * FROM blog_post";
        $rasult = $db->select($query);
        $total_rows =mysqli_num_rows($rasult);
        $total_page =ceil($total_rows/$par_page);




          // Pagination Query 

         ?>




        <?php 
        echo '
   <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="index.php?page=1">&larr; Previous</a>';
         ?>

         <?php 

         for ($i =1; $i < $total_page; $i++) { 


          echo '

   <li class="page-item"><a class="page-link" href="index.php?page='.$total_page.'">'.$i.'</a></li>

          ';
           
         }


          ?>

     
      
         <?php 

         echo '
           <a class="page-link" href="index.php?page='.$total_page.'">Next &rarr;</a>
         </li>
      </ul>
     </div>';
          ?>



        
      
    
      

        <!-- Pagination -->



<?php 
// end if logic
}else{
  header("Location: 404.php");
}


 ?>
<?php include_once 'inc/sidebar.php'; ?>
    </div>
  </div>
<?php 
require_once 'inc/footer.php';

 ?>