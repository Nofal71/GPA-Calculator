<!DOCTYPE html>
<html lang="en">
<head>

    <title>GPA Calculator</title>
<link rel="stylesheet" href="Gpa1.css">
</head>
<body>
    <?php
    $total_credits = 0;
    $total_subject_credit = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $i = 1;
        while (isset($_POST["credit_$i"])) {
            if (isset($_POST["credit_$i"])) {
                $total_credits += $_POST["credit_$i"];
            } else {
                break;
            }
            $i++;
        }

       
        echo "<table border='1'>
                <tr>
                    <th>Subject</th>
                    <th>Credit</th>
                    <th>Grade</th>
                </tr>";

        // Calculate GPA
        $i = 1;
        while (isset($_POST["grade_$i"])) {
            if (isset($_POST["credit_$i"])) {
                $subject = "Subject $i";
                $credit = $_POST["credit_$i"];
                $grade = $_POST["grade_$i"];

                echo "<tr>
                        <td>$subject</td>
                        <td>$credit</td>
                        <td>$grade</td>
                    </tr>";

                switch ($grade) {
                    case "A":
                        $total_subject_credit += 4.0 * $credit;
                        break;
                    case "B":
                        $total_subject_credit += 3.0 * $credit;
                        break;
                    case "C":
                        $total_subject_credit += 2.0 * $credit;
                        break;
                    
                }
            } else {
                break;
            }
            $i++;
        }

        echo "</table>";

        // Calculate GPA
        if ($total_credits > 0) {
            $GPA = $total_subject_credit / $total_credits;
            echo "<p>Your GPA is $GPA</p>";
        } else {
            echo "<p>No credits entered. GPA calculation not possible.</p>";
        }
    }
    ?>
</body>
</html>
