
$(".user").submit(function (ev) {
  ev.preventDefault();

  let name = $('input[name="username"]').val();
  let email = $('input[name="email"]').val();
  let password = $('input[name="password"]').val();
  let address = $('input[name="address"]').val();
  let priv = $('select[name="priv"]').val();
  let gender = $('input[name="gender"]:checked').val();

  $.post(
    "functions/user/addUser.php",
    {
      name: name,
      email: email,
      password: password,
      address: address,
      gender: gender,
      priv: priv,
    },
    function (data) {
      //   console.log(data);

      $("#exampleModal").modal("hide");
      $(".alert").html("Added successfully..!").fadeIn();
      setTimeout(function () {
        $(".alert").fadeOut();
      }, 3000);

      let userRow = `<tr>
            <td>${data.id}</td>
            <td>${data.username}</td>
            <td>${data.email}</td>
            <td>${data.address}</td>
            <td>${data.gender == 0 ? "Male" : "Female"}</td>
            <td>${data.priv == 2 ? "Admin" : "User"}</td>
            <td>
                <a href="" class="btn btn-danger">delete</a>
                <a href="" class="btn btn-primary">edit</a>
            </td>
          </tr>`;
      $("#tbod").append(userRow);
    }
  );
});


$('.edit-user').submit(function(e){
  e.preventDefault();


  $.post('functions/user/edit.php',
    {
     
        id: $(this).find('input[name="id"]').val(),
        na: $(this).find('input[name="usernameOne"]').val(),
        em: $(this).find('input[name="emailOne"]').val(),
        ad: $(this).find('input[name="addressOne"]').val(),
        pr: $(this).find('select[name="privOne"]').val() 
    },
    function(data){
    console.log(data);

    $(".editMod").modal("hide");
          $(".alert").html("successfully Edit..!").fadeIn();
          setTimeout(function () {
            $(".alert").fadeOut();
          }, 3000);

          var row = $(data.id);
          row.find('.userName-cell').text(data.username);
          row.find('.email-cell').text(data.email);
          row.find('.address-cell').text(data.address);
          row.find('.priv-cell').text(data.priv_id);

    
  })

})

// $(".edit").on("click", function () {
//   var userId = $(this).data("id");

//   $.get("functions/user/getUser.php", { userId: userId }, function (d) {
//     // console.log(d);
//     $("#exampleModal1").data("user-id", userId);

//     $('input[name="usernameOne"]').val(d.username);
//     $('input[name="emailOne"]').val(d.email);
//     $('input[name="addressOne"]').val(d.address);
//     $('select[name="privOne"]').val(d.priv_id);
//     $('input[name="genderOne"][value="' + d.gender + '"]').prop(
//       "checked",
//       true
//     );
//   });
// });

// $(".edit-user").submit(function (e) {
//   e.preventDefault();

//   $.post(
//     "functions/user/edit.php",
//     {
//       id: $("#exampleModal1").data("user-id"),
//       name: $('input[name="usernameOne"]').val(),
//       email: $('input[name="emailOne"]').val(),
//       address: $('input[name="addressOne"]').val(),
//       priv: $('select[name="privOne"]').val(),
//       // priv: $('input[name="genderOne"]:checked').val(),
//     },
//     function (data) {
//       console.log(data);

//       $("#exampleModal1").modal("hide");
//       $(".alert").html("Successfully edited!").fadeIn();
//       setTimeout(function () {
//         $(".alert").fadeOut();
//       }, 3000);
//     }
//   );
// });
