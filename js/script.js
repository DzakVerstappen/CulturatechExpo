$("#nav-login").on('click', function(){
    window.location.href = "login.php"
})
$('#profile-icon').on('click', function(event) {
    event.stopPropagation();
    $('#dropdown-menu').toggle();
});
$('.dropdown-item').hover(
    function() {
        $(this).css('background-color', 'rgba(0,0,0,0.1)');
    },
    function() {
        $(this).css('background-color', 'white');
    }
);
$('.dropdown-item').on('click', function(event) {
    if($(this).data('href')){
        window.location.href = $(this).data('href')
    }
});
$(document).on('click', function() {
$('#dropdown-menu').hide();
});
$("#form-add-product").on("submit", function (e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
        url: "actions/add_product.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.success) {
                Swal.fire({
                    title: "Success!",
                    text: response.message,
                    icon: "success",
                    confirmButtonText: "OK"
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    title: "Error!",
                    html: response.errors.join("<br>"),
                    icon: "error",
                    confirmButtonText: "OK"
                });
            }
        },
        error: function () {
            Swal.fire({
                title: "Error!",
                text: "An unexpected error occurred while submitting the form.",
                icon: "error",
                confirmButtonText: "OK"
            });
        }
    });
});
$(".item-detail").on("click", function (e) {
    e.preventDefault();

    const productId = $(this).data('id');
    window.location.href = 'product.php?id='+productId    
});
$(".add-to-cart-button").on("click", function (e) {
    e.preventDefault();

    const productId = $(this).closest("form").find("input[name='product_id']").val();
    const quantity = $(this).closest("form").find("input[name='quantity']").val();

    $.ajax({
      url: "check_login.php",
      method: "POST",
      dataType: "json",
      success: function (response) {
        if (response.loggedIn) {
          $.ajax({
            url: "actions/add_to_cart.php",
            method: "POST",
            data: { product_id: productId, quantity: quantity },
            success: function () {
              Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: "Produk berhasil ditambahkan ke keranjang!",
                showConfirmButton: false,
                timer: 1500,
              }).then(() => location.reload());
            },
            error: function () {
              Swal.fire({
                icon: "error",
                title: "Gagal",
                text: "Terjadi kesalahan saat menambahkan produk ke keranjang.",
              });
            },
          });
        } else {
          Swal.fire({
            icon: "warning",
            title: "Anda belum login!",
            text: "Silakan login terlebih dahulu untuk menambahkan produk ke keranjang.",
            showCancelButton: true,
            confirmButtonText: "Login",
            cancelButtonText: "Batal",
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = "login.php";
            }
          });
        }
      },
      error: function () {
        Swal.fire({
          icon: "error",
          title: "Kesalahan",
          text: "Gagal memeriksa status login.",
        });
      },
    });
  });
  $('.cart-remove-link').on('click', function (event) {
    event.preventDefault();

    const productId = $(this).data('id'); 

    Swal.fire({
        title: 'Are you sure?',
        text: "Do you really want to remove this item from your cart?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'actions/remove_from_cart.php',
                type: 'POST',
                data: JSON.stringify({ product_id: productId }),
                contentType: 'application/json',
                success: function (response) {
                    if (response.success) {
                        Swal.fire('Removed!', 'The item has been removed from your cart.', 'success')
                            .then(() => location.reload());
                    } else {
                        Swal.fire('Error!', response.error || 'Failed to remove the item. Please try again.', 'error');
                    }
                },
                error: function () {
                    Swal.fire('Error!', 'Something went wrong. Please try again.', 'error');
                }
            });
        }
    });
});

const paymentMethodSelect = $("select[name='payment_method']");
  const cardPaymentInput = $("#card-payment-input");
  const ewalletPaymentInput = $("#ewallet-payment-input");

  cardPaymentInput.hide();
  ewalletPaymentInput.hide();

  paymentMethodSelect.on("change", function () {
    const selectedMethod = $(this).val();

    cardPaymentInput.hide();
    ewalletPaymentInput.hide();

    if (selectedMethod === "card") {
      cardPaymentInput.show();
    } else if (
      selectedMethod === "gopay" ||
      selectedMethod === "shopeepay" ||
      selectedMethod === "dana" ||
      selectedMethod === "ovo"
    ) {
      ewalletPaymentInput.show();
    }
  });
  const shippingPrices = {
    instant: 50000,
    reguler: 20000,
    cargo: 35000
  };

  $('.shipping-method-radio-button').on('change', function () {
    const selectedMethod = $(this).val();
    const shippingCost = shippingPrices[selectedMethod] || 0;

    $('#shipping').text(`Rp ${shippingCost.toLocaleString()}`);

    const subtotal = parseInt($('#subtotal').data('value')) || 0;
    const total = subtotal + shippingCost;

    $('#total').text(`Rp ${total.toLocaleString()}`);
  });
  $("form[action='actions/checkout.php']").on("submit", function (e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.success) {
                Swal.fire({
                    title: "Checkout Successful",
                    text: response.message,
                    icon: "success",
                    confirmButtonText: "OK"
                }).then(() => {
                    window.location.href = "catalog.php";
                });
            } else {
                Swal.fire({
                    title: "Checkout Failed",
                    text: response.message || "An error occurred during checkout.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
            }
        },
        error: function (xhr, status, error) {
            Swal.fire({
                title: "Error",
                text: "Unable to process your request. Please try again later.",
                icon: "error",
                confirmButtonText: "OK"
            });
        }
    });
});
