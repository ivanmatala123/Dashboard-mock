<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include 'includes/navbar.php'; ?>

    <main class="container-fluid mt-5 p-5">
        <div
            class="row justify-content-center align-items-center ">
            <div class="col-sm-6">
                <h1 class=" display-5 fw-bold">Welcome to the Dashboard</h1>
            </div>
            <div class="col-sm-2">
                <?php include 'includes/add_modal.php' ?>
            </div>
        </div>
        <?php include 'includes/table.php' ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>