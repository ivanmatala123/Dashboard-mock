<?php

require __DIR__ . '/../processess/addProfile.php';
require __DIR__ . '/../errorhandlings/addingerror.php';
?>



<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#formModal">
    Add new User
</button>

<!-- Modal -->
<div class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formModalLabel">Add New User</h1>
            </div>
            <div class="modal-body">
                <form action="processess/addProfile.php" method="POST">

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="firstname">First name</span>
                        <input type="text" class="form-control" placeholder="Enter First Name" aria-label="firstname" aria-describedby="firstname" name="firstname">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="lastname">Last name</span>
                        <input type="text" class="form-control" placeholder="Enter Last name" aria-label="lastname" aria-describedby="lastname" name="lastname">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="email">Email</span>
                        <input type="text" class="form-control" placeholder="Enter Email@" aria-label="email" aria-describedby="email" name="email">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="phonenumber">Phonenumber</span>
                        <input type="text" class="form-control" placeholder="Phone number" aria-label="phonenumber" aria-describedby="phonenumber" name="phonenumber">
                    </div>

                    <label for="role"> Select Role</label>
                    <select class="form-select" aria-label="Roles" name="role">
                        <option selected>Open this select roles</option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
                    <button type="submit" class="btn btn-success w-100 mt-2">
                        Add
                    </button>

                    <button type="button" class="btn btn-secondary w-100 mt-2" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                </form>

            </div>

        </div>
    </div>
</div>