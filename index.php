<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Record System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .student-list {
            list-style: none;
            padding: 0;
        }

        .student-list li {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .search-form {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-form input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-form input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .average-grade {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Student Record System</h1>

    <?php
    function displayStudents($students) {
        echo "<ul class='student-list'>";
        foreach ($students as $student) {
            echo "<li>Name: {$student['name']}, Age: {$student['age']}, Grade: {$student['grade']}</li>";
        }
        echo "</ul>";
    }

    function averageGrade($students) {
        $total = 0;
        foreach ($students as $student) {
            $total += $student['grade'];
        }
        $average = $total / count($students);
        echo "<div class='average-grade'>Average Grade: $average</div>";
    }

    function searchStudent($students, $name) {
        foreach ($students as $student) {
            if ($student['name'] === $name) {
                echo "<div class='search-result'>Name: {$student['name']}, Age: {$student['age']}, Grade: {$student['grade']}</div>";
                return;
            }
        }
        echo "<div class='search-result'>Student with name '$name' not found.</div>";
    }

    $students = array(
        array('name' => 'John', 'age' => 20, 'grade' => 85),
        array('name' => 'Alice', 'age' => 21, 'grade' => 90),
        array('name' => 'Bob', 'age' => 19, 'grade' => 78),
        array('name' => 'Emma', 'age' => 22, 'grade' => 95),
        array('name' => 'David', 'age' => 20, 'grade' => 88)
    );

    echo "<h2>All Students</h2>";
    displayStudents($students);

    averageGrade($students);

    if (isset($_GET['search'])) {
        $searchName = $_GET['search'];
        echo "<h2>Search Result for '$searchName'</h2>";
        searchStudent($students, $searchName);
    }
    ?>

    <form class="search-form" action="" method="GET">
        <label for="search">Search Student by Name:</label>
        <input type="text" id="search" name="search" required>
        <input type="submit" value="Search">
    </form>
</div>

</body>
</html>
