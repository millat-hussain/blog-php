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

  <div class="container">
    <div class="row">
      <div class="col-md-8 mt-4">
        

        <?php
           $getdata ="SELECT * FROM blog_post WHERE cat=$id";
           $storData = $db->select($getdata);
           if ($storData) {
             while ($rasult= $storData->fetch_assoc()) {
         ?>

        <!-- Blog Post -->
        <div class="card mb-4">
          <img class="card-img-top" src="img/<?php echo $rasult['img'];?>" alt="Card image cap">
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
 
      <?php } }?>








</div>


<?php include_once 'inc/sidebar.php'; ?>

</div>
</div>
<?php 
require_once 'inc/footer.php';

 ?>