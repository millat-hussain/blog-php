<?php 

include "inc/header.php";

 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block">               
                 <form action="pedite_core.php" method="POST" enctype="multipart/form-data">
                    <table class="form">
               <?php 

                 if (isset($_GET['edite'])) {
                        $editid=$_GET['edite'];

               $getdata ="SELECT * FROM blog_post WHERE id='$editid'";
               $storData = $db->select($getdata);
               if ($storData) {
               while ($rasult= $storData->fetch_assoc()) {

                     ?>

                       
                        <tr>
                            <td>
                                <label>Post Tittle </label>
                            </td>
                            <td>
            <input type="text" name="title" value="<?php echo $rasult['title']; ?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="select">
                                    <option value="1">Category One</option>

                         <option value="1">
                    
                            </option>
                                </select>
                            </td>
                        </tr>
                   
                    
                      
                      
                        <tr>
                            <td>
                                <label>Image Upload</label>
                            </td>

                            <td>
                                <input name="image" type="file" /> <br>

                                <img src="upload/<?php echo $rasult['img']; ?>" width="100px">

                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Description</label>
                            </td>
                            <td>
                                <textarea name="description" cols="100" rows="10">

                                    <?php echo $rasult['postbody']; ?>


                                    

                                </textarea>
                            </td>
                           
                        </tr>
                        <tr>
                            <td>Post By</td>
                             <td><input type="text" value="<?php echo $rasult['postby']; ?>" name="postby"></td>
                            
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                               <a href="pedite_core.php?id="></a>
                            </td>

                        </tr>


                    <?php }}} ?>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>   
     <?php include 'inc/footer.php'; ?>

