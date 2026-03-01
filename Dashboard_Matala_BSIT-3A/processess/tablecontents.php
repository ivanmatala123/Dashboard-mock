<?php
require __DIR__ . '/../database/db.php';


$result = $conn->query("SELECT * FROM tbl_users")

?>

<tbody class="w-100">
    <?php
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
    ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phonenumber']; ?></td>
                <td><?php echo $row['role']; ?></td>
                <td>
                    <?php
                    if ($row['status'] == "active") {
                        echo '<span class="badge bg-success">Active</span>';
                    } elseif ($row['status'] == "inactive") {
                        echo '<span class="badge bg-danger fw-bold">Inactive</span>';
                    }
                    ?>
                </td>
                <td>
                    <div class="d-grid gap-2 d-md-block">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editformModal<?php echo $row['id']; ?>">
                            Edit
                        </button>
                        <div class="modal fade" id="editformModal<?php echo $row['id']; ?>" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title text-dark">Edit user <?php echo $row['fullname']; ?>?</h5>
                                    </div>

                                    <div class="modal-body">
                                        <form action="processess/editprofile.php" method="POST">

                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="firstname">First name</span>
                                                <input type="text" class="form-control" placeholder="<?php echo $row['fullname'] ?>" aria-label="firstname" aria-describedby="firstname" name="firstname">
                                            </div>

                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="lastname">Last name</span>
                                                <input type="text" class="form-control" placeholder="<?php echo $row['fullname'] ?>" aria-label="lastname" aria-describedby="lastname" name="lastname">
                                            </div>

                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="email">Email</span>
                                                <input type="text" class="form-control" placeholder="<?php echo $row['email'] ?>" aria-label="email" aria-describedby="email" name="email">
                                            </div>

                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="phonenumber">Phonenumber</span>
                                                <input type="text" class="form-control" placeholder="<?php echo $row['phonenumber'] ?>" aria-label="phonenumber" aria-describedby="phonenumber" name="phonenumber">
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


                        <button type="button"
                            class="btn btn-danger"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal<?php echo $row['id']; ?>">
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade"
                            id="deleteModal<?php echo $row['id']; ?>"
                            data-bs-backdrop="static">

                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title text-dark">
                                            Delete user <?php echo $row['fullname']; ?>?
                                        </h5>
                                    </div>

                                    <div class="modal-body">
                                        <div class="d-grid gap-2 d-md-block">
                                            <form method="POST" action="processess/deleterecord.php">

                                                <input type="hidden"
                                                    name="id"
                                                    value="<?php echo $row['id']; ?>">

                                                <button type="submit"
                                                    class="btn btn-danger w-100">
                                                    Confirm Delete
                                                </button>

                                            </form>
                                            <button type="button" class="btn btn-secondary w-100 mt-2" data-bs-dismiss="modal">Cancel</button>
                                        </div>


                                    </div>

                                </div>
                            </div>

                        </div>



                    </div>
                </td>
            </tr>
        <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="7" class="text-center">No data found</td>
        </tr>
    <?php
    }
    ?>
</tbody>