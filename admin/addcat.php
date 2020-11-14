<?php 

include "inc/header.php";

 ?>



        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                 <form action="" method="POST">
                     <?php 

 if ($_SERVER['REQUEST_METHOD']=='POST') {

           $Category = $_POST['Category'];

           if (empty($Category)) {

            echo "<p style='color:red'>Fild Must Not Be Empty !!!</p>";

             
           }else{
               $query ="INSERT INTO blog_catagory(name)VALUES('$Category')";
            $rasult = $db->insert($query);
            if ($rasult==true) {
                echo "<p style='color:green'>Data inserteat Successfully</p>";

                    }}

           }
   

         

  ?>
                    <table class="form">					
                        <tr>
                            <td>
        <input type="text" placeholder="Enter Category Name..." name="Category" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Insert Category" />
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

