<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedItem = $_POST['items'];
    echo "You selected: " . $selectedItem;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <select name="items" id="itemsSelect">
        <option value="item1">Item 1</option>
        <option value="item2">Item 2</option>
        <option value="item3">Item 3</option>
    </select>
    <button type="submit">Submit</button>
</form>
</body>
</html>