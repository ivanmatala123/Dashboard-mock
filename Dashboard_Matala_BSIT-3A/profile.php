<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <main class="container-fluid mt-5 p-5">
        <?php include 'includes/navbar.php'; ?>


        <div class="mb-3">
            <a href="dashboard.php" class="btn btn-success">
                ← Back to Dashboard
            </a>
        </div>

        <div class="card shadow p-4 mx-auto" style="max-width:600px">

            <h4 class="text-center mb-4">User Profile</h4>

            <div class="text-center mb-3">
                <img src=""
                    class="rounded-circle border"
                    width="150"
                    height="150"
                    style="object-fit: cover;">
            </div>


            <div class="mb-2">
                <strong>Full Name:</strong>
                <p>Ivan</p>
            </div>

            <div class="mb-2">
                <strong>Email:</strong>
                <p>matala@gmail.com</p>
            </div>

            <div class="mb-2">
                <strong>Phone:</strong>
                <p>209438720857</p>
            </div>
            <div class="mb-2">
                <strong>Role</strong>
                <p>Admin</p>
            </div>

            <button class="btn btn-success w-100 mt-3"
                data-bs-toggle="modal"
                data-bs-target="#editProfileModal">
                Edit Profile
            </button>

            <div class="modal fade" id="editProfileModal<?php //echo $row['id']; 
                                                        ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title text-dark">Edit Profile <?php //echo $row['fullname']; 
                                                                            ?>?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <form action="processess/editprofile.php" method="POST">
                                <div class="mb-3">
                                    <label>Change Profile Picture</label>
                                    <input type="file" name="profile_image" class="form-control" accept="image/*">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="firstname">First name</span>
                                    <input type="text" class="form-control" placeholder="<?php //echo $row['fullname'] 
                                                                                            ?>" aria-label="firstname" aria-describedby="firstname" name="firstname">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="lastname">Last name</span>
                                    <input type="text" class="form-control" placeholder="<?php //echo $row['fullname'] 
                                                                                            ?>" aria-label="lastname" aria-describedby="lastname" name="lastname">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="email">Email</span>
                                    <input type="text" class="form-control" placeholder="<?php //echo $row['email'] 
                                                                                            ?>" aria-label="email" aria-describedby="email" name="email">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="phonenumber">Phonenumber</span>
                                    <input type="text" class="form-control" placeholder="<?php //echo $row['phonenumber'] 
                                                                                            ?>" aria-label="phonenumber" aria-describedby="phonenumber" name="phonenumber">
                                </div>

                                <label for="role"> Select Role</label>
                                <select class="form-select" aria-label="Roles" name="role">
                                    <option selected>Open this select roles</option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>

                                <input type="hidden"
                                    name="id"
                                    value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-success w-100 mt-2">
                                    Save
                                </button>
                                <button type="button" class="btn btn-secondary w-100 mt-2" data-bs-dismiss="modal"> Cancel</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>