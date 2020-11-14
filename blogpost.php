<?php 
require_once 'inc/header.php';

 ?>

 <?php 

 if (!isset($_GET['id']) && $_GET['id']==NULL) {
     header("Location:404.php");
 }else{
        $id =$_GET['id'];
 }

  ?>


  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8">

        <?php 


           $getdata ="SELECT * FROM blog_post WHERE id=$id";
           $storData = $db->select($getdata);
           if ($storData) {
             while ($rasult= $storData->fetch_assoc()) {
         
         ?>



        <h1 class="mt-4"> <?php  echo $rasult['title'];?> </h1>
        <p class="lead">
          by
          <a href="#"><?php echo  $rasult['postby'];?> </a>
        </p>

        <hr>
        <p>Posted on <?php  echo $helpers->formetDate($rasult['date'])?> </p>
        <hr>
        <img class="img-fluid rounded" src="img/<?php echo $rasult['img'] ?>">

        <hr>
        <p><?php  echo $rasult['postbody'];?> </p>

   
<?php 
 $catid = $rasult['cat'];
} ?>



        <hr>
        <!-- Sagest Post -->
        <h2 class="bg-secondary p-2 text-white rounded"> Relatead Post </h2>
        <div class="row">
  <?php 
  //Recent Sejition post
     
       $getdata ="SELECT * FROM blog_post WHERE cat=$catid";
        $storData = $db->select($getdata);
           if ($storData) {
             while ($rasult= $storData->fetch_assoc()) {
   ?>

    <div class="col-lg-4">
     <a href=""><img class="img-fluid rounded" src="img/<?php echo $rasult['img'];?>"></a>
    </div>
       <?php }}else{
        echo "no Relatead Post Found";
      } ?>
        
  </div>


    <!-- Sagest Post -->

<?php }else{
  header("Location:404.php");
} ?>




        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form>
              <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

        <!-- Single Comment -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        </div>

        <!-- Comment with nested comments -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
           
            </div>
          </div>
        </div>

      </div>

<?php include_once 'inc/sidebar.php'; ?>
</div>
</div>
<?php 
require_once 'inc/footer.php';

 ?>