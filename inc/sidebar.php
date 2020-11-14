      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">
        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">

            <form action="Search.php" method="POST">
            <div class="input-group">
              <input type="text" class="form-control" name="Search" placeholder="Search for...">
              <span class="input-group-append">
                <input class="btn btn-secondary" type="submit" name="submit" value="Search" >
              </span>
            </div>
          </form>


          </div>

        </div>

        <!-- Categories Widget -->


        <div class="card my-4 bg-danger">
          <h5 class="card-header text-white text-center">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                    <?php
               $getdata ="SELECT * FROM blog_catagory";
               $storData = $db->select($getdata);
               if ($storData) {
               while ($rasult= $storData->fetch_assoc()) {
                     ?>
                <ul class="list-unstyled mb-0">

                  <li>
                    <a href="postes.php?id=<?php echo $rasult['id']; ?>" class="text-white"><?php echo $rasult['name']; ?></a>
                  </li>

                </ul>
                <?php }} ?>
              </div>
            </div>
          </div>
        </div>

      
        <!-- Side Widget -->
        <div class="card my-4 bg-warning">
          <h5 class="card-header text-primary text-center">Latest articles</h5>
          <div class="card-body">
            <!-- List Of Post -->

            <div class="latestpost">
        <?php
           $getdata ="SELECT * FROM blog_post LIMIT 3";
           $storData = $db->select($getdata);
           if ($storData) {
             while ($rasult= $storData->fetch_assoc()) {
         ?>
              <a href="blogpost.php?id=<?php echo $rasult['id']; ?>"><h4 class="title"><?php echo $rasult['title'];?></h4></a>
              <hr>
              <div class="row">
                <div class="col-lg-4">
                  <img src="admin/upload/<?php echo $rasult['img'];?>" class="img-fluid rounded">
                </div>
                <div class="col-lg-8">
                  <p><?php echo $helpers->verySort($rasult['postbody'])?></p>
                </div>
              </div>
            <?php }} ?>
            </div>
          </div>
        </div>

      </div>