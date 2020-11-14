<?php 
include "inc/header.php";
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>

					<?php 

				if (isset($_GET['delete'])) {

					$deid=$_GET['delete'];

					$query ="DELETE FROM blog_catagory WHERE id='$deid'";
					$delcat = $db->delete($query);
					if ($delcat==true) {
						
						echo ' <p style="color:red">Your Catagory Deleted</p>';

						
					}
					
				}



					 ?>

				

			 <?php
               $getdata ="SELECT * FROM blog_catagory";
               $storData = $db->select($getdata);
               if ($storData) {
               	$i=0;
               while ($rasult= $storData->fetch_assoc()) {
               	$i++
           ?>
					<tbody>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $rasult['name']; ?></td>
<td>
	<a href="editcatcc.php?editeid=<?php echo $rasult['id']?>">Edit</a> ||
	<a  href="?delete=<?php echo $rasult['id']?>" onclick="alert('Are You Sure To Delete');">Delete</a> 


						</tr>
						
					</tbody>
				<?php }} ?>
				</table>
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <?php include 'inc/footer.php'; ?>
