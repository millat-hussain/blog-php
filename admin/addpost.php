<?php 

include "inc/header.php";

 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <?php 

             if ($_SERVER['REQUEST_METHOD']=='POST') {

                       $title = $_POST['title'];
                       $cat = $_POST['cat'];
                       $postbody = $_POST['postbody'];
                       $postby = $_POST['postby'];
                       $tage = $_POST['tage'];
                       // image upload system;
                      

                        $file_name = $_FILES['img']['name'];
                        $file_size = $_FILES['img']['size'];
                        $file_temp = $_FILES['img']['tmp_name'];


                       $uploaded_image = "upload/".$file_name;


                        if ($title=="" || $cat=="" || $postbody=="" || $postby=="" || $tage=="") {
                            echo "Filde Must Not Be Empty ";
                        }else{
                                move_uploaded_file($file_temp, $uploaded_image);
 
                                $query = "INSERT INTO  blog_post (cat,title,img,postbody,postby,tage) 
                                VALUES('$cat','$title','$uploaded_image','$postbody','$postby','$tage')";


                                $inserted_rows = $db->insert($query);
                                if ($inserted_rows) {
                                 echo "<span class='success'>Data Inserted Successfully.
                                 </span>";
                                }else {
                                 echo "<span class='error'>Data Not Inserted !</span>";
                                }

                            
                       

                    }
                   }





                 ?>
                <div class="block">               
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
                                    <option value="1">Category One</option>

                                          <?php 
               $getdata ="SELECT * FROM blog_catagory";
               $storData = $db->select($getdata);
               if ($storData) {
               while ($rasult= $storData->fetch_assoc()) {

             ?>
                <option value="<?php echo $rasult['id']; ?>"><?php echo $rasult['name']; ?></option>

                <?php }} ?>


                                  
                                </select>
                            </td>
                        </tr>
                   
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="img" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce"name="postbody"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Post By </label>
                            </td>
                            <td>
                                <input type="text" name="postby" placeholder="postby..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tages</label>
                            </td>
                            <td>
                                <input type="text" name="tage" placeholder="Enter Tages..." class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
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

