<div class="container-fluid">
    <div class="alert alert-success w-25" style="display: none;"></div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
        Add Product
    </button>
    <!-- Modal-add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="product" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="productname" class="form-control form-control-user"
                                id="exampleInputUser" aria-describedby="emailHelp"
                                placeholder="Enter Product Name...">
                        </div>
                        <div class="form-group">
                            <input type="text" name="description" class="form-control form-control-user"
                                id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Enter Discription Product...">
                        </div>
                        <div class="form-group">
                            <input type="text" name="price" class="form-control form-control-user"
                                id="exampleInputPassword" placeholder="Price">
                        </div>
                        <label for="">upload file</label>
                        <div class="form-group">
                            <input type="file" multiple name="img[]"
                                id="exampleInputAddress">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Categories</label>
                            <select name="Categories" class="form-control border-5" id="exampleFormControlSelect1">
                                <?php
                                include_once('functions/connections.php');
                                $selectCategories = "SELECT * FROM `categories`";
                                $queryCategories = $connection->query($selectCategories);
                                foreach ($queryCategories as $cat) {
                                    # code...
                                ?>
                                    <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <button class="btn btn-primary btn-user btn-block" type="submit">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end-Modal-add -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Product</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Discription</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Categories</th>
                            <th>Controlls</th>
                        </tr>
                    </thead>
                    <tbody id="tbod">

                        <?php
                        $selecct = "SELECT * FROM `products`";
                        $query = $connection->query($selecct);
                        foreach ($query as $product) {
                            # code...
                            $id = $product['cat_id'];
                            $selectCat = "SELECT * FROM `categories` where id = $id ";
                            $queryCAt = $connection->query($selectCat);
                            $res = $queryCAt->fetch_assoc();
                        ?>
                            <tr>
                                <td><?= $product['id'] ?></td>
                                <td><?= $product['name'] ?></td>
                                <td><?= $product['description'] ?></td>
                                <td><?= $product['price'] ?></td>
                                <td>
                                    <?php
                                    $idPro = $product['id'];
                                    $selImg = "SELECT * FROM `images` where img_id = $idPro";
                                    $queryImg = $connection->query($selImg);
                                    foreach ($queryImg as $img) {
                                        # code...
                                    ?>
                                        <img src="img/proimage/<?= $img['image_name']?>" height="50px" width="50px" alt="">
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td><?= $res['name'] ?></td>
                                <td>
                                    <a href="" class="btn btn-success">edit</a>
                                    <a href="" class="btn btn-danger">delete</a>
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