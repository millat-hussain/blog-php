<?php 

include "inc/header.php";

 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table  class="data display " id="example">
					<thead>
						<tr>
							<th>Serial NO : </th>
							<th>Post Title</th>
							<th>Description</th>
							<th>Category</th>
							<th>postby</th>
							<th>Image</th>
							<th>Time</th>
							<th>Action</th>
						</tr>
					</thead>
					<!-- Delete post system -->
					<?php 


					if (isset($_GET['delid'])) {
						$delid=$_GET['delid'];

						$query="DELETE FROM blog_post WHERE id='$delid'";
						$delete=$db->delete($query);
						if ($delete==true) {
							echo "Data Deleted Successfully";
						}
						
					}
					 ?>
					<!-- Delete post system -->

			 <?php
               $getdata ="SELECT * FROM blog_post ORDER BY id DESC";
               $storData = $db->select($getdata);
               if ($storData) {
               	$i=0;
               while ($rasult= $storData->fetch_assoc()) {
               	$i++
           ?>
					<tbody>
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $rasult['title']; ?></td>
							<td> <?php echo $helpers->textSorten($rasult['postbody'],50)?></td>
							<td><?php echo $rasult['cat']; ?></td>
							<td><?php echo $rasult['postby']; ?></td>
							<td><img src="upload/<?php echo $rasult['img']?>" width="50px"></td>
							<td><?php echo $helpers->formetDate($rasult['date']) ?></td>
				

							<td><a href="editepost.php?edite=<?php echo $rasult['id']?>">Edit</a> ||

							 <a href="?delid=<?php echo $rasult['id']?>">Delete</a></td>
						</tr>
						<?php }} ?>
				
					</tbody>
				</table>
	
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
    <div id="site_info">
      <p>
         &copy; Copyright <a href="http://trainingwithliveproject.com">Training with live project</a>. All Rights Reserved.
        </p>
    </div>
	   
</body>
</html>
