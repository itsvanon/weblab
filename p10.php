<html>
    <head>
        <title>Program 10</title>
    </head>
    <body>
        <h1>Selection Sort - Student List</h1>

        <?php 

        $connect = mysqli_connect("localhost", "root", "", "student_db");
        if(mysqli_connect_errno()) {
            echo "Failed to connect to DB: ".mysqli_connect_error();
        }

        $query = "SELECT * from student_tbl";

        if($result = $connect->query($query)) {

            echo "<h3>List before sorting</h3>";
            
            echo "<table><tr><th></th><th>USN</th><th>Name</th><th>Branch</th><th>Batch</th></tr>";

            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["ID"]."</td>";
                echo "<td>".$row["USN"]."</td>";
                echo "<td>".$row["Name"]."</td>";
                echo "<td>".$row["branch"]."</td>";
                echo "<td>".$row["batch"]."</td></tr>";
            }
            echo "</table>";
        }

        $result = $connect->query($query);
        $rowcount = mysqli_num_rows($result);

        $i = 0;
        $j = 0;

        while($row=$result->fetch_array()) {
            $minID = $row[0];
            $minUSN = $row[1];

            while($urow = $result->fetch_array()) {
                if(strnatcmp($urow[1], $minUSN)<0) {
                    $minID = $urow[0];
                    $minUSN = $urow[1];
                }
            }

            $query_min = "SELECT * FROM student_tbl WHERE ID=$minID";
            $result_min = $connect->query($query_min);
            $min_rec = $result_min->fetch_array();

            $query_swap = "UPDATE student_tbl SET USN='$row[1]', Name='$row[2]' WHERE ID=$minID";
            "</br>";

            $result_swap = $connect->query($query_swap);
            
            $query_swap2 = "UPDATE student_tbl SET USN='$min_rec[1]', Name='$row[2]' WHERE ID=$row[0]";
            "<br /><br />";

            $result_swap = $connect->query($query_swap2);

            $i++;

            if($i == $rowcount-1) break;
            $result = $connect->query($query);

            mysqli_data_seek($result, $i);
        }

        if($result = $connect->query($query)) {
            echo "<h3>List after sorting</h3>";

            echo "<table><tr><th></th><th>USN</th><th>Name</th><th>Branch</th><th>Batch</th></tr>";

            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["ID"]."</td>";
                echo "<td>".$row["USN"]."</td>";
                echo "<td>".$row["Name"]."</td>";
                echo "<td>".$row["branch"]."</td>";
                echo "<td>".$row["batch"]."</td></tr>";
            }
            echo "</table>";
        }
        ?>
    </body>
</html>