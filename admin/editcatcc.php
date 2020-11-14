<?php 

include "inc/header.php";

 ?>



        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                 <form action="" method="POST">
                 	<?php 

                 		if (isset($_GET['editeid'])) {

					       $editid=$_GET['editeid'];

					   }

                 	 ?>



                     <?php 

 if ($_SERVER['REQUEST_METHOD']=='POST') {

           $edite = $_POST['edite'];

           if (empty($edite)) {

            echo "<p style='color:red'>Fild Must Not Be Empty !!!</p>";

             
           }
           else{
             $query ="	UPDATE blog_catagory SET name='$edite' WHERE id='$editid' ";
            $rasult = $db->update($query);
            if ($rasult==true) {
                echo "<p style='color:green'>Data update  Successfully</p>";

                    }}

           }
   

  ?>
                    <table class="form">					
                        <tr>
                        	<?php 

$getdata ="SELECT * FROM blog_catagory WHERE id='$editid'";
$storData = $db->select($getdata);
if ($storData) {
$i=0;
while ($rasult= $storData->fetch_assoc()) {
                        	 ?>
                            <td>
           <input type="text" value="<?php echo $rasult['name'] ?>" name="edite" class="medium" />
                            </td>

                        <?php }} ?>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Edite Catagory" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>

        <?php include 'inc/footer.php'; ?>

