<?php

include("config.php");
if(isset($_POST['input'])){
    $input = $_POST['input'];

    $query = "SELECT * FROM searchperson WHERE name LIKE '{$input}%' ";

    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result) > 0){?>

        <table class="table table-bordered table-striped mt-4">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Country</th>
                        <th>Email</th>
                        <th>Occupation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while($row = mysqli_fetch_array($result)){

                            $id = $row['id'];
                            $name = $row['name'];
                            $age = $row['age'];
                            $country = $row['country'];
                            $email = $row['email'];
                            $occupation = $row['occupation'];
                        }
                    ?>

                    <tr>
                        <td><?php echo $id;?></td>
                        <td><?php echo $name;?></td>
                        <td><?php echo $age;?></td>
                        <td><?php echo $country;?></td>
                        <td><?php echo $email;?></td>
                        <td><?php echo $occupation;?></td>
                    </tr>
                </tbody>
        </table>

<?php
    }else{
        echo "<h6 class='text-danger text-center mt-3'>No data Found</h6>";
    }
}

?>