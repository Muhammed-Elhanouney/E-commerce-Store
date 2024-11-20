<div class="container">
<a href="users.php" class="btn btn-info">Show Users</a>

    <div class="row">
        <div class="col col-md-12 d-flex justify-content-center bg-login-image border-0 shadow-lg my-5">
            <form class="user p-5 w-50" method="post" action="functions/user/addUser.php">
                <div class="form-group">
                    <input type="text" name="username" class="form-control form-control-user"
                        id="exampleInputEmail" aria-describedby="emailHelp"
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
                        id="exampleInputPassword" placeholder="address">
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
                    <label  for="">Male</label>
                    <input class="form-control-user" type="radio" name="gender" value="0" id="">
                    <label  for="">Female</label>
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

        </div>

    </div>

</div>