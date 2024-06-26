<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disha Estate Management</title>
    <style>
       
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

      
        form {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 10px;
            text-align: center; 
        }
        label {
            display: block;
            margin-bottom: 3px;
            font-weight: bold;
            font-size: 14px;
            grid-column: span 1;
            text-align: left;
        }
        select,
        input[type="number"] {
            width: calc(50% - 6px); 
            padding: 4px;
            margin-bottom: 5px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            grid-column: span 2;
        }
        button {
            width: calc(25% - 6px);
            padding: 4px;
            margin-bottom: 5px;
            font-size: 14px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            grid-column: span 3;
            align-items: center;
        }
        button:hover {
            background-color: #45a049;
        }

        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 6px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
            font-size: 14px;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            margin-top: 0;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .center{
            justify-content: center;
            margin-left: 250px;
            width: 100%;
        }
    </style>
</head>

<body>
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "realestate";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch distinct values for dropdown options
$sql_dropdown_stype = "SELECT DISTINCT stype FROM tbl_property";
$result_dropdown_stype = $conn->query($sql_dropdown_stype);

$sql_dropdown_category = "SELECT DISTINCT category_id, category_name FROM tbl_category";
$result_dropdown_category = $conn->query($sql_dropdown_category);

$sql_dropdown_location = "SELECT DISTINCT location FROM tbl_property";
$result_dropdown_location = $conn->query($sql_dropdown_location);

$sql_dropdown_bhk = "SELECT DISTINCT bhk FROM tbl_property";
$result_dropdown_bhk = $conn->query($sql_dropdown_bhk);

// Filter records based on dropdown selection
if(isset($_POST['filter'])) {
    $selected_stype = $_POST['stype'];
    $selected_category = isset($_POST['category']) ? $_POST['category'] : "";
    $selected_location = isset($_POST['location']) ? $_POST['location'] : "";
    $starting_price = isset($_POST['starting_price']) ? $_POST['starting_price'] : "";
    $ending_price = isset($_POST['ending_price']) ? $_POST['ending_price'] : "";
    $selected_bhk = isset($_POST['bhk']) ? $_POST['bhk'] : "";
    
    $sql = "SELECT p.property_id, p.title, p.stype, c.category_name, p.location, p.price, p.bhk 
            FROM tbl_property p 
            JOIN tbl_category c ON p.category_id = c.category_id 
            WHERE 1=1";
    
    if (!empty($selected_stype)) {
        $sql .= " AND p.stype = '$selected_stype'";
    }
    if (!empty($selected_category)) {
        $sql .= " AND p.category_id = '$selected_category'";
    }
    if (!empty($selected_location)) {
        $sql .= " AND p.location = '$selected_location'";
    }
    if (!empty($starting_price)) {
        $sql .= " AND p.price >= '$starting_price'";
    }
    if (!empty($ending_price)) {
        $sql .= " AND p.price <= '$ending_price'";
    }
    if (!empty($selected_bhk)) {
        $sql .= " AND p.bhk = '$selected_bhk'";
    }
    
    $result = $conn->query($sql);
} else {
    // Default query to fetch all records
    // $sql = "SELECT property_id, title, stype, category_id, location, price, bhk FROM tbl_property";
   $sql = "SELECT 
    p.property_id, 
    p.title, 
    p.stype, 
    p.category_id, 
    c.category_name, 
    p.location, 
    p.price, 
    p.bhk 
FROM 
    tbl_property p 
INNER JOIN 
    tbl_category c ON p.category_id = c.category_id";

    $result = $conn->query($sql);
}
?>

<h2>Disha Estate Management</h2>

<form method="post" action="">
    <label for="stype">Property Type:</label>
    <select name="stype" id="stype">
        <option value="">All</option>
        <?php
        if ($result_dropdown_stype->num_rows > 0) {
            while($row = $result_dropdown_stype->fetch_assoc()) {
                echo "<option value='" . $row['stype'] . "'>" . $row['stype'] . "</option>";
            }
        }
        ?>
    </select>
    
    <label for="category">Category:</label>
    <select name="category" id="category">
        <option value="">All</option>
        <?php
        if ($result_dropdown_category->num_rows > 0) {
            while($row = $result_dropdown_category->fetch_assoc()) {
                echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
            }
        }
        ?>
    </select>
    
    <label for="location">Location:</label>
    <select name="location" id="location">
        <option value="">All</option>
        <?php
        if ($result_dropdown_location->num_rows > 0) {
            while($row = $result_dropdown_location->fetch_assoc()) {
                echo "<option value='" . $row['location'] . "'>" . $row['location'] . "</option>";
            }
        }
        ?>
    </select>
    
    <label for="starting_price">Starting Price:</label>
    <input type="number" name="starting_price" id="starting_price" min="0">
    
    <label for="ending_price">Ending Price:</label>
    <input type="number" name="ending_price" id="ending_price" min="0">
    
    <label for="bhk">BHK:</label>
    <select name="bhk" id="bhk">
        <option value="">All</option>
        <?php
        if ($result_dropdown_bhk->num_rows > 0) {
            while($row = $result_dropdown_bhk->fetch_assoc()) {
                echo "<option value='" . $row['bhk'] . "'>" . $row['bhk'] . "</option>";
            }
        }
        ?>
    </select>
    <div class="center">
    <button type="submit" name="filter">Filter</button>
    <button onclick="window.print()">Print</button>
    </div>
</form>

<table>
    <tr>
        <th>Property ID</th>
        <th>Title</th>
        <th>Property Type</th>
        <th>Category</th>
        <th>Location</th>
        <th>Price</th>
        <th>BHK</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['property_id'] . "</td>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['stype'] . "</td>";
            echo "<td>" . $row['category_name'] . "</td>";
            echo "<td>" . $row['location'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['bhk'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No records found</td></tr>";
    }
    ?>
</table>

</body>
</html>

<?php

$conn->close();
?>