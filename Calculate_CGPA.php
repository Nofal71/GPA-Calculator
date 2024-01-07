<style>
    /* Add your custom styles here */

body {
    font-family: Arial, sans-serif;
}

table {
    border-collapse: collapse;
    width: 50%;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

h1 {
    color: #333;
}

.center {
    text-align: center;
}


</style>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prev_GPA = $_POST["prev_GPA"];
    $prev_hrs = $_POST["prev_hrs"];
    $current_GPA = $_POST["current_GPA"];
    $current_hrs = $_POST["current_hrs"];

    $CGPA = (($prev_GPA * $prev_hrs) + ($current_GPA * $current_hrs)) / ($prev_hrs + $current_hrs);

    echo "<center><h1>CGPA</h1><table>
    <tr><th>Previous GPA</th><td>$prev_GPA</td></tr>
    <tr><th>Previous Credit Hours</th><td>$prev_hrs</td></tr>
    <tr><th>Current GPA</th><td>$current_GPA</td></tr>
    <tr><th>Current Credit Hours</th><td>$current_hrs</td></tr>
    <tr><th>CGPA is</th><td>$CGPA</td></tr></table></center>";
}
?>
