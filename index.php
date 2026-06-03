<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "security_db";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM intrusion_events";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>KWIZERA REGIS</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #0f172a, #1e293b);
            min-height:100vh;
            padding:40px;
        }

        h1{
            text-align:center;
            color:#22c55e;
            margin-bottom:30px;
            font-size:32px;
            text-transform:uppercase;
            letter-spacing:1px;
            text-shadow:0 0 10px rgba(34,197,94,0.5);
        }

        .dashboard-container{
            background:#ffffff;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 10px 30px rgba(0,0,0,0.4);
            padding:20px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        thead{
            background:linear-gradient(90deg,#16a34a,#22c55e);
            color:white;
        }

        th{
            padding:18px;
            text-align:center;
            font-size:15px;
        }

        td{
            padding:15px;
            text-align:center;
            border-bottom:1px solid #e5e7eb;
        }

        tbody tr:nth-child(even){
            background:#f8fafc;
        }

        tbody tr:hover{
            background:#dcfce7;
            transition:0.3s;
        }

        .footer{
            text-align:center;
            color:white;
            margin-top:20px;
            font-size:14px;
        }

        @media(max-width:768px){
            body{
                padding:15px;
            }

            h1{
                font-size:22px;
            }

            th,td{
                padding:10px;
                font-size:12px;
            }
        }
    </style>
</head>

<body>

<h1>INTRUSION DETECTION SYSTEM </h1>

<div class="dashboard-container">

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>IMAGE PATH</th>
            <th>DISTANCE</th>
            <th>EVENT STATUS</th>
            <th>TIME STAMP</th>
        </tr>
    </thead>

    <tbody>
        <?php
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['image_path']) . "</td>";
            echo "<td>" . htmlspecialchars($row['distance_detected']) . "</td>";
            echo "<td>" . htmlspecialchars($row['event_status']) . "</td>";
            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</div>

</div>

</body>
</html>

<?php
mysqli_close($conn);
?>