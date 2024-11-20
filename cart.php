<?php

include('./layouts/header.php');
?>
<div class="page-holder">
  <!-- navbar-->
  <?php

  include('./layouts/navbar.php');
  ?>
  <!--  Modal -->
  <div class="modal fade" id="productView" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="row align-items-stretch">
            <div class="col-lg-6 p-lg-0"><a class="product-view d-block h-100 bg-cover bg-center" style="background: url(img/product-5.jpg)" href="img/product-5.jpg" data-lightbox="productview" title="Red digital smartwatch"></a><a class="d-none" href="img/product-5-alt-1.jpg" title="Red digital smartwatch" data-lightbox="productview"></a><a class="d-none" href="img/product-5-alt-2.jpg" title="Red digital smartwatch" data-lightbox="productview"></a></div>
            <div class="col-lg-6">
              <button class="close p-4" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <div class="p-5 my-md-4">
                <ul class="list-inline mb-2">
                  <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                  <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                  <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                  <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                  <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                </ul>
                <h2 class="h4">Red digital smartwatch</h2>
                <p class="text-muted">$250</p>
                <p class="text-small mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</p>
                <div class="row align-items-stretch mb-4">
                  <div class="col-sm-7 pr-sm-0">
                    <div class="border d-flex align-items-center justify-content-between py-1 px-3"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                      <div class="quantity">
                        <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                        <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                        <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-5 pl-sm-0"><a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" href="cart.html">Add to cart</a></div>
                </div><a class="btn btn-link text-dark p-0" href="#"><i class="far fa-heart mr-2"></i>Add to wish list</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <!-- <div class="alert bg-danger"></div> -->
    <?php
    if (isset($_SESSION['add-cart'])) {
      echo $_SESSION['add-cart'];
      unset($_SESSION['add-cart']);
    }
    if (isset($_SESSION['update-cart'])) {
      echo $_SESSION['update-cart'];
      unset($_SESSION['update-cart']);
    }
    if (isset($_SESSION['delete-cart'])) {
      echo $_SESSION['delete-cart'];
      unset($_SESSION['delete-cart']);
    }
    ?>
    <!-- HERO SECTION-->
    <section class="py-5 bg-light">
      <div class="container">
        <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
          <div class="col-lg-6">
            <h1 class="h2 text-uppercase mb-0">Cart</h1>
          </div>
          <div class="col-lg-6 text-lg-right">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <section class="py-5">

      <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
      <div class="row">
        <div class="col-lg-8 mb-4 mb-lg-0">
          <!-- CART TABLE-->
          <div class="table-responsive mb-4">
            <table class="table">
              <thead class="bg-light">
                <tr>
                  <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Product</strong></th>
                  <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Price</strong></th>
                  <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Quantity</strong></th>
                  <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Total</strong></th>
                  <th class="border-0" scope="col"> </th>
                </tr>
              </thead>
              <tbody>
                <?php
                $_SESSION['cart_id'];

                $user = $_SESSION['cart_id'];
                include_once("./functions/connection.php");
                $select = "SELECT * FROM `cart` WHERE user_id = $user";
                $query = $connection->query($select);
                foreach ($query as $value) {
                  # code...
                  $pro_id = $value['product_id'];

                  $select_pro = "SELECT * FROM `products` WHERE id = $pro_id";
                  $query_pro = $connection->query($select_pro);
                  $fetch = $query_pro->fetch_assoc();

                  $select_img = "SELECT `image_name` FROM `images` WHERE img_id = $pro_id";
                  $query_img = $connection->query($select_img);
                  $fetch_img = $query_img->fetch_assoc();
                ?>
                  <tr class="all-tr">
                    <th class="pl-0 border-0" scope="row">
                      <div class="media align-items-center">
                        <a class="reset-anchor d-block animsition-link" href="detail.html">
                          <img src="admin/img/proimage/<?= $fetch_img['image_name'] ?>" alt="..." width="70" />
                        </a>
                        <div class="media-body ml-3">
                          <strong class="h6">
                            <a class="reset-anchor animsition-link" href="detail.html"><?= $fetch['name'] ?></a>
                          </strong>
                        </div>
                      </div>
                    </th>
                    <td class="align-middle border-0">
                      <p class="mb-0 small">$<?= $fetch['price'] ?></p>
                    </td>
                    <td class="align-middle border-0">
                      <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family">Quantity</span>
                        <div class="quantity">
                          <button class="dec-btn p-0 quant " data-id='<?= $value['product_id'] ?>'>
                            <i class="fas fa-caret-left"></i>
                          </button>
                          <input class="form-control form-control-sm border-0 shadow-0 p-0 main" type="text" value="<?= $value['quantity'] ?>" />
                          <button class="inc-btn p-0 quant " data-id='<?= $value['product_id'] ?>'><i class="fas fa-caret-right"></i></button>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle border-0">
                      <span style="font-size: 14px;">$</span><span style="font-size: 14px; margin-left:2px;" class="mb-0 small allQuantity"><?= $fetch['price'] * $value['quantity'] ?></span>
                    </td>
                    <td class="align-middle border-0">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal<?= $value['product_id'] ?>">
                        <i class="fas fa-trash-alt small text-muted"></i>

                      </button>

                      <!-- Modal -->
                      <div class="modal fade modelDelete" id="exampleModal<?= $value['product_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal Delete</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form class="formDelete" data-delid='<?= $value['product_id'] ?>'>
                              <div class="modal-body">
                                shure to delete..! <span class="text-danger fw-bold"><?= $fetch['name'] ?></span>
                              </div>
                              <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Delete</button>
                            </form>
                          </div>
                        </div>
                      </div>
          </div>
          </td>
          </tr>

        <?php
                }
        ?>


        <!-- <tr>
                      <th class="pl-0 border-light" scope="row">
                        <div class="media align-items-center"><a class="reset-anchor d-block animsition-link" href="detail.html"><img src="img/product-detail-2.jpg" alt="..." width="70"/></a>
                          <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link" href="detail.html">Apple watch</a></strong></div>
                        </div>
                      </th>
                      <td class="align-middle border-light">
                        <p class="mb-0 small">$250</p>
                      </td>
                      <td class="align-middle border-light">
                        <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family">Quantity</span>
                          <div class="quantity">
                            <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                            <input class="form-control form-control-sm border-0 shadow-0 p-0" type="text" value="1"/>
                            <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle border-light">
                        <p class="mb-0 small">$250</p>
                      </td>
                      <td class="align-middle border-light"><a class="reset-anchor" href="#"><i class="fas fa-trash-alt small text-muted"></i></a></td>
                    </tr> -->
        </tbody>
        </table>
        </div>
        <!-- CART NAV-->
        <div class="bg-light px-4 py-3">
          <div class="row align-items-center text-center">
            <div class="col-md-6 mb-3 mb-md-0 text-md-left"><a class="btn btn-link p-0 text-dark btn-sm" href="shop.html"><i class="fas fa-long-arrow-alt-left mr-2"> </i>Continue shopping</a></div>
            <div class="col-md-6 text-md-right"><a class="btn btn-outline-dark btn-sm" href="checkout.html">Procceed to checkout<i class="fas fa-long-arrow-alt-right ml-2"></i></a></div>
          </div>
        </div>
      </div>
      <!-- ORDER TOTAL-->
      <div class="col-lg-4">
        <div class="card border-0 rounded-0 p-lg-4 bg-light">
          <div class="card-body">
            <h5 class="text-uppercase mb-4">Cart total</h5>
            <ul class="list-unstyled mb-0">
              <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Subtotal</strong><span class="text-muted small">$250</span></li>
              <li class="border-bottom my-2"></li>
              <li class="d-flex align-items-center justify-content-between mb-4">
                <!-- <strong class="text-uppercase small font-weight-bold">Total</strong>
                  <span id="total">--</span> -->
                <strong>Total: </strong><span style="margin-left: 170px;">$</span><span id="total">0</span>
              </li>
              <li>
                <form action="#">
                  <div class="form-group mb-0">
                    <input class="form-control" type="text" placeholder="Enter your coupon">
                    <button class="btn btn-dark btn-sm btn-block" type="submit"> <i class="fas fa-gift mr-2"></i>Apply coupon</button>
                  </div>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
  </div>
  </section>
</div>
<?php

include('./layouts/footer.php');
?>


<script>
  // $('.quant').click(function() {

  //   let x = $(this).parent().find('.main');
  //   var find = $(this).closest('.all-tr').find('.allQuantity');



  //   let y = parseInt(x.val()) + 1;
  //   let f = parseInt(x.val()) - 1;
  //   let newQuantity;

  //   if ($(this).hasClass('inc-btn')) {
  //     newQuantity = y
  //   } else if ($(this).hasClass('dec-btn')) {
  //     newQuantity = f
  //   }


  //   $.post('functions/products/cartQuan.php', {
  //     num: newQuantity,
  //     id: $(this).attr('data-id')
  //   }, function(d) {
  //     find.text(d)

  //   })


  //   var numTotal =document.querySelectorAll('.allQuantity')
  //   var total = 0 
  //     numTotal.forEach(function(e){

  //       total += parseInt(e.innerHTML);

  //     })
  //     console.log(total);




  // })

  $('.quant').click(function() {
    let x = $(this).parent().find('.main');
    let find = $(this).closest('.all-tr').find('.allQuantity');
    let newQuantity;

    let y = parseInt(x.val()) + 1;
    let f = parseInt(x.val()) - 1;

    if ($(this).hasClass('inc-btn')) {
      newQuantity = y;
    } else if ($(this).hasClass('dec-btn')) {
      newQuantity = f;
    }

    $.post('functions/products/cartQuan.php', {
      num: newQuantity,
      id: $(this).attr('data-id')
    }, function(d) {
      find.text(d);
      updateTotal();

    });



  });

  function updateTotal() {
    let numTotal = document.querySelectorAll('.allQuantity');
    let total = 0;
    numTotal.forEach(function(e) {
      total += parseInt(e.innerHTML);
    });
    // console.log(total);
    document.getElementById('total').innerHTML = total;
  }
  updateTotal();

  $('.formDelete').click(function(e) {
    e.preventDefault();
    let id = $(this).attr("data-delid");
    let tr = $(this).closest('.all-tr');

    $.post('functions/products/cartDelete.php', {
      // id: $('input[name=id]').val()
      deleteId: id,
    }, function(d) {
      // console.log(d);
      // $('.modelDelete').modal("hide");
      $('.modelDelete').on('hidden.bs.modal', function(e) {
        // do something...
        // console.log("kfefkpekfpe");  
        
        tr.html('');
        updateTotal();
      })

    })
    // console.log("fplpflewp");

  })
</script>