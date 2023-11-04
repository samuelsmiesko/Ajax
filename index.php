

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="image.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Search Data</title>

</head>
<body>
    
    <div class="container" style = "max-width: 50%;">
            <div class="text-center m-3 ">
                <h2>PHP MySQL live search</h2>
            </div>
            <h3 class="container text-center m-3">Displaying data from database</h3>
            <input type="text" class="form-control"  id="live_search" autocomplete="off" placeholder="Search.." >

    </div>

    
        
    <?php include('includes/range.php'); ?>
    
    <div id="searchresult"></div>

    <?php

    header("Content-type: text/html");

    $file = fopen("data.txt","r") or die("Error");

    ?>
    <h3 class="text-center m-5">Displaying data from files</h3>
    
        
    <table class="container table table-bordered table-striped mt-4">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Occupation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php
                        while(($info = fgets($file)) != false) {
                            
                            $row = explode(',',$info);
                            echo "<tr>";
                                    foreach($row as $data) {
                                        echo "<td>".htmlspecialchars($data)."</td>";
                                    };
                            echo "</tr>\n";
                        }
                        fclose($file);
                        ?>
                    </tr>
                </tbody>
        </table>

        

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript">

    $(document).ready(function() {
     
        function runSearch(){

                var input = document.querySelector('#live_search').value;
                if(input===""){
                    console.log("empty");
                    input='%';
                }
                var toSlider = document.querySelector('#toSlider').value;
                var fromSlider = document.querySelector('#fromSlider').value;
                
                console.log(input,toSlider,fromSlider);

                if(input != ''){
                    $.ajax({
                        url:"livesearch.php",
                        method:"POST",
                        data:{
                            input:input,
                            fromSlider: fromSlider,
                            toSlider:toSlider,
                        },

                        success:function(data){
                            $('#searchresult').html(data);
                        }
                    });
                }else{
                    $('#searchresult').css('display','none');
                }
            };

        document.getElementById("toSlider").addEventListener("input", runSearch);
        document.getElementById("fromSlider").addEventListener("input", runSearch);
        document.getElementById("live_search").addEventListener("keyup", runSearch);    

    });
    
</script>
<script src="pw.js"></script>
</html>