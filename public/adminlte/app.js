$(function () {
    $(".is-download").select2({
        placeholder: "Buradan axtar...",
        minimumInputLength: 1,
        cache: true,
        ajax: {
            url: ADMIN + "/product/get-download",
            delay: 250,
            dataType: "json",
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                };
            },
            processResults: function (data) {
                return {
                    results: data.items,
                };
            },
        },
    });

    $("#is_download").on("select2:open", function () {
        document.querySelector(".select2-search__field").focus();
    });

    $("#is_download").on("select2:select", function () {
        $(".clear-download").remove();
        $("#is_download").before(
            '<p class="clear-download"><span class="btn btn-danger">Sadə mal</span></p>'
        );
    });

    $("body").on("click", ".clear-download span", function () {
        $("#is_download").val(null).trigger("change");
        $(".clear-download").remove();
    });

    $(".card-body").on("click", ".del-img", function () {
        $(this).closest(".product-img-upload").remove();
    });

    $("#search-button").on("click", function (e) {
        e.preventDefault();
        const barcode = $("#barcode-input").val();

        $.ajax({
            url: "admin/sell",
            type: "GET",
            data: { barcode: barcode },
            success: function (response) {
                showCart(response);
            },
            error: function (res) {
                console.log(res);
                alert("Error");
            },
        });
    });

    $(document).on("click", ".delete-btn", function (e) {
        e.preventDefault(); // Varsayılan link davranışını engelle

        const id = $(this).data("id"); // Data-id değerini al

        // AJAX isteği gönder
        $.ajax({
            url: "admin/sell/delete", // URL
            type: "GET", // İstek türü
            data: { id: id }, // Gönderilecek veri
            success: function (response) {
                // Yanıt başarılıysa sepeti güncelle
                showCart(response);
            },
            error: function (res) {
                console.log(res);
                alert("Ürün silinirken bir hata oluştu.");
            },
        });
    });

    $(document).on("click", ".category-item", function (e) {
        e.preventDefault();

        const id = $(this).attr("href").split("id=")[1].split("&")[0];
        const parent_id = $(this).attr("href").split("parent_id=")[1];

        $.ajax({
            url: "admin/sell/products",
            type: "GET",
            data: { id: id, parent_id: parent_id },
            success: function (response) {
                showCarts(response);
            },
            error: function (res) {
                console.log(res);
                alert("Kategoriyi yüklerken bir hata oluştu.");
            },
        });
    });

    function showCarts(cart) {
        $("#category-content1").html(cart);
    }

    $("#get-basket").click(function (e) {
        e.preventDefault();

        $.ajax({
            url: "admin/sell/show",
            type: "GET",
            success: function (res) {
                showCart(res);
            },
            error: function () {
                alert("Error");
            },
        });
    });

    function showCart(cart) {
        $("#product-list-left").html(cart); // Sepet içeriklerini güncelle

        let basketSum = $("#basket-sum").val() || "0"; // Gizli input değerini al, boşsa 0 ata

        $("#count-basket").text(basketSum + "₺"); // Toplam miktarı güncelle
    }

    let count = 0;

    function updateValue() {
        // Değeri input alanlarına ata
        $("#numberBox").val(count);
        $("#hiddenValue").val(count);

        // Sadece 'value' parametresini al
        let valueToSend = $("#hiddenValue").val(); // Sadece value'yu al

        // Formu otomatik olarak gönder, GET yöntemiyle
        $.ajax({
            url: "admin/sell", // AJAX URL'si
            type: "GET",
            data: { value: valueToSend }, // Sadece 'value'yu gönder
            success: function (response) {
                showCart(res);
            },
            error: function () {
                alert("Gönderim hatası!");
            },
        });
    }

    $(document).keydown(function (e) {
        if (e.key === "w") {
            // 'W' tuşuna basıldığında
            if (count < 5) {
                count++;
                updateValue();
            }
        }
        if (e.key === "s") {
            // 'S' tuşuna basıldığında
            if (count > 0) {
                count--;
                updateValue();
            }
        }
    });
});
