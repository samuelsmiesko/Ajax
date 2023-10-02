<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container" style = "max-width: 50%;">
            <div class="text-center mt-5 mb-4">
                <h2>PHP MySQL live search</h2>
            </div>
            
            <input type="text" class="form-control"  id="live_search" autocomplete="off" placeholder="Search.." >
    </div>

    <div id="searchresult"></div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript">

    $(document).ready(function() {

        $("#live_search").keyup(function(){

            var input = $(this).val();
            //alert(input);

            if(input != ''){
                $.ajax({

                    url:"livesearch.php",
                    method:"POST",
                    data:{input:input},

                    success:function(data){
                        $('#searchresult').html(data);
                    }
                });
            }else{
                $('#searchresult').css('display','none');
            }
        });
    });
</script>
</html>