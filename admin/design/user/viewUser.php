<div class="container-fluid">
    <!-- <a style="margin-bottom: 20px;" href="?action=add" class="btn btn-info">Add Users</a> -->

    <div class="alert alert-success w-25" style="display: none;"></div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
        Add USer
    </button>
    <!-- Modal-add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add USer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control form-control-user"
                                id="exampleInputUser" aria-describedby="emailHelp"
                                placeholder="Enter Name...">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control form-control-user"
                                id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Enter Email Address...">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user"
                                id="exampleInputPassword" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="text" name="address" class="form-control form-control-user"
                                id="exampleInputAddress" placeholder="address">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Privliges</label>
                            <select name="priv" class="form-control border-5" id="exampleFormControlSelect1">
                                <option value="2">Admin</option>
                                <option value="3">User</option>
                            </select>
                        </div>
                        <label for="exampleFormControlSelect1">Gender</label>
                        <div class="form-group">
                            <label for="">Male</label>
                            <input class="form-control-user" type="radio" name="gender" value="0" id="">
                            <label for="">Female</label>
                            <input type="radio" name="gender" value="1" id="">
                        </div>
                        <!-- <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember
                                            Me</label>
                                    </div>
                                </div> -->
                        <button class="btn btn-primary btn-user btn-block" type="submit">Add user</button>
                        <!-- <a href="index.php" class="btn btn-primary btn-user btn-block">
                                Login
                            </a> -->
                    </form>
                    <!-- <a href="../../fun"></a> -->
                </div>
            </div>
        </div>
    </div>
    <!-- end-Modal-add -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Priv</th>
                            <th>Controlls</th>
                            <!-- <th>Salary</th> -->
                        </tr>
                    </thead>
                    <tbody id="tbod">
                        <?php
                        include_once('functions/connections.php');
                        $selct = "SELECT * FROM `users`";
                        $query = $connection->query($selct);

                        foreach ($query as $user) {
                            # code...
                            $user_id = $user['priv_id'];
                        ?>
                            <?php
                            $select_name = "SELECT `name` FROM `priv` WHERE id = $user_id";
                            $query_name = $connection->query($select_name);
                            $res = $query_name->fetch_assoc();
                            ?>
                            <tr id="<?= $user['id'] ?>">
                                <td><?= $user['id'] ?></td>
                                <td class="userName-cell"><?= $user['username'] ?></td>
                                <td class="email-cell"><?= $user['email'] ?></td>
                                <td class="address-cell"><?= $user['address'] ?></td>
                                <td class="gender-cell"><?= $user['gender'] == 0 ?  'Male' : 'Female' ?></td>
                                <td class="priv-cell"><?= $res['name'] ?></td>
                                <td>
                                    <button class="btn btn-danger">Delete</button>
                                    <!-- <a href="" class="btn btn-danger">delete</a> -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-id="" data-target="#exampleModal<?= $user['id'] ?>">
                                        Edit
                                    </button>
                                    <!-- <a href="" data-id="" class="btn btn-primary edit" data-toggle="modal" data-target="#exampleModal1">Edit</a> -->

                                    <!-- Modal-edit -->
                                    <div class="modal fade editMod" id="exampleModal<?= $user['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit USer</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="edit-user">
                                                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                                        <div class="form-group">
                                                            <label for="">User Name</label>
                                                            <input type="text" name="usernameOne" class="form-control form-control-user"
                                                                id="exampleInputUser" aria-describedby="emailHelp"
                                                                placeholder="Enter Name..." value="<?= $user['username'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">E-mail</label>
                                                            <input type="text" name="emailOne" class="form-control form-control-user"
                                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                                placeholder="Enter Email Address..." value="<?= $user['email'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Address</label>
                                                            <input type="text" name="addressOne" class="form-control form-control-user"
                                                                id="exampleInputAddress" placeholder="address" value="<?= $user['address'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Privliges</label>
                                                            <select name="privOne" class="form-control border-5" id="exampleFormControlSelect1">
                                                                <option value="2" <?= $user['priv_id'] == 2 ? 'selected' : '' ?>>Admin</option>
                                                                <option value="3" <?= $user['priv_id'] == 3 ? 'selected' : '' ?>>User</option>
                                                            </select>
                                                        </div>
                                                        <button class="btn btn-primary btn-user btn-block" type="submit">Save Changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end-Modal-edit -->
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>