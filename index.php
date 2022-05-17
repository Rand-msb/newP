<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
		function getInfo(x) {
                $.get("emp.php",
                {ID: x},
                function(result){
                 result=JSON.parse(result);
                 console.log($.type(result))
                 $("#empdisplay").append("Phone: "+result.Phone+"Office: "+result.Office);

                 alert("hi")
  });
			
			
		}
	</script>
        
    </head>
    <body>
        <?php
        $DB_HOST = 'localhost';
        $DB_USER= 'root';
        $DB_PASSWORD = '';
        $DB_DATABASE = 'company';

        $con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD,$DB_DATABASE);
        if(!$con) {
            die('Failed to connect to server: ' . mysql_error());
        }


        $qry="SELECT * FROM employees";
        $result=mysqli_query($con, $qry);
        
    ?>

<form>
<label>
Employees:
	<select name="emps" id="emps" onchange="getInfo(this.value)">
	<?php
		if($result){
			While( $info = mysqli_fetch_assoc($result))
			{
                            echo '<option value ='.$info['ID'].'>'.$info['Name'].'</option>';
                        }
		}
		else
                echo "There is no employees.";
	
	?>
	</select>
	
</label>
<br/>
<div id="empdisplay"></div>
</form>
    </body>
</html>
