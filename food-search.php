<?php include ('partials-front/menu.php');?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on Your Search <a href="#" class="text-white">"Momo"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php

            //locate the food based on search
            $search=$_POST['search'];

            $sql= "SELECT * from tbl_food  WHERE title LIKE '%$search%' OR description LIKE '%$search%'";


            $result=mysqli_query($conn,$sql);


            $count=mysqli_num_rows($result);


            if($count>0){
                while($row=mysqli_fetch_assoc($result)){

                    $id=$_POST['id'];

                    $title=$_POST['title'];

                    $price=$_POST['price'];

                    $description=$_POST['description'];

                    $image_name=$row['image_name'];

                    echo '<tr>
                                                    <td>'.$id.'</td>
                                                    <td>'.$title.'</td>
                                                    <td>'.$price.'</td>
                                                    <td>'.$description.'</td>
                                                    <td>'.$image_name.'</td>
                                                </tr>';

                }
            }
           else {

               echo "food not found";
           }
            ?>




            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include ('partials-front/footer.php'); ?>