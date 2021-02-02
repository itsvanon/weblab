<html>
    <head>
        <title>Program 10</title>
        <style>
            table {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <h1>Selection Sort - Student List</h1>

        <?php 

        $connect = mysqli_connect("localhost", "root", "", "student_db");
        if(mysqli_connect_errno()) {
            echo "Failed to connect to DB: ".mysqli_connect_error();
        }

        $query = "SELECT * from student_tbl";

        if($result = mysqli_query($connect, $query)) {

            echo "<h3>List before sorting</h3>";
            
            echo "<table><tr><th></th><th>USN</th><th>Name</th><th>Branch</th><th>Batch</th></tr>";

            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>".$row["ID"]."</td>";
                echo "<td>".$row["USN"]."</td>";
                echo "<td>".$row["Name"]."</td>";
                echo "<td>".$row["branch"]."</td>";
                echo "<td>".$row["batch"]."</td></tr>";
            }
            echo "</table>";
        }

        $result = mysqli_query($connect, $query);
        $rowcount = mysqli_num_rows($result);

        $i = 0;
        $j = 0;

        while($row=mysqli_fetch_array($result)) {
            $minID = $row[0];
            $minUSN = $row[1];

            while($urow = mysqli_fetch_array($result)) {
                if(strnatcmp($urow[1], $minUSN)<0) {
                    $minID = $urow[0];
                    $minUSN = $urow[1];
                }
            }

            $query_min = "SELECT * FROM student_tbl WHERE ID=$minID";
            $result_min = mysqli_query($connect, $query_min);
            $min_rec = mysqli_fetch_array($result_min);

            $query_swap = "UPDATE student_tbl SET USN='$row[1]', Name='$row[2]' WHERE ID=$minID";
            "</br>";

            $result_swap = mysqli_query($connect, $query_swap);
            
            $query_swap2 = "UPDATE student_tbl SET USN='$min_rec[1]', Name='$row[2]' WHERE ID=$row[0]";
            "<br /><br />";

            $result_swap = mysqli_query($connect, $query_swap2);

            $i++;

            if($i == $rowcount-1) break;
            $result = mysqli_query($connect, $query);

            mysqli_data_seek($result, $i);
        }

        if($result = mysqli_query($connect, $query)) {
            echo "<h3>List after sorting</h3>";

            echo "<table><tr><th></th><th>USN</th><th>Name</th><th>Branch</th><th>Batch</th></tr>";

            while($row = mysqli_fetch_assoc($result)) {
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