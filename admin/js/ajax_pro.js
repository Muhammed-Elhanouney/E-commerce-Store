
$('.product').submit(function(e){
    e.preventDefault();
    
    
    var formData = new FormData(this);
    $.ajax({
        url: 'functions/product/addPro.php',  
        type: 'POST',
        data: formData,
        contentType: false,  
        processData: false,  
        success: function(d) {
            // console.log(d); 
            $('#tbod').append(d);
        },
        error: function(xhr, status, error) {
            console.error("Error: " + error);  
        }
    });

 
    
})
