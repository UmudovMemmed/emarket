(function ($) {
    "use strict";

    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $(".navbar .dropdown")
                    .on("mouseover", function () {
                        $(".dropdown-toggle", this).trigger("click");
                    })
                    .on("mouseout", function () {
                        $(".dropdown-toggle", this).trigger("click").blur();
                    });
            } else {
                $(".navbar .dropdown").off("mouseover").off("mouseout");
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $(".back-to-top").fadeIn("slow");
        } else {
            $(".back-to-top").fadeOut("slow");
        }
    });
    $(".back-to-top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
        return false;
    });

    // Vendor carousel
    $(".vendor-carousel").owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 2,
            },
            576: {
                items: 3,
            },
            768: {
                items: 4,
            },
            992: {
                items: 5,
            },
            1200: {
                items: 6,
            },
        },
    });

    // Related carousel
    $(".related-carousel").owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            768: {
                items: 3,
            },
            992: {
                items: 4,
            },
        },
    });

    $("#searchForm .input-group-append").on("click", ".search", function (e) {
        e.preventDefault();
        const query = $('input[name="query"]').val();

        if (!query) {
            alert("Lütfen bir arama terimi girin.");
            return;
        }

        $.ajax({
            url: "http://e-market.loc/search",
            type: "GET",
            data: { query: query },
            success: function (response) {
                window.location.href = `http://e-market.loc/search/index?query=${encodeURIComponent(
                    query
                )}`;
            },
            error: function () {
                alert("Bir hata oluştu. Lütfen tekrar deneyin.");
            },
        });
    });

    document
        .querySelectorAll("input[name='price'], input[name='color']")
        .forEach((input) => {
            input.addEventListener("change", function () {
                const url = new URL(window.location.href);
                this.value === "all"
                    ? url.searchParams.delete(this.name)
                    : url.searchParams.set(this.name, this.value);
                window.location.href = url.toString();
            });
        });

    $(document).on("click", ".add-to-wishlist", function (e) {
        e.preventDefault();
        const $this = $(this);
        const id = $this.data("id");

        $.ajax({
            url: "wishlist/add",
            type: "GET",
            data: { id: id },
            success: function (res) {
                const result = JSON.parse(res);

                if (result.type === "success") {
                    Swal.fire({
                        text: result.text,
                        icon: result.type,
                    });

                    $this
                        .removeClass("add-to-wishlist")
                        .addClass("delete-from-wishlist");
                    $this
                        .find("i")
                        .removeClass("far fa-heart")
                        .addClass("fa-solid fa-heart");
                } else {
                    Swal.fire({
                        text: result.text,
                        icon: result.type,
                    });
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });

    $(document).ready(function () {
        $(".add-to-cart").click(function (e) {
            e.preventDefault();
            const $this = $(this);
            const id = $(this).data("id");
            const qty = $("#input_qty").val();

            $.ajax({
                url: "cart/add",
                type: "GET",
                data: { id: id, qty: qty },
                success: function (res) {
                    const updatedQuantity = res.updatedQuantity;
                    $("#cart-quantity")
                        .text(updatedQuantity)
                        .attr("data-quantity", updatedQuantity);
                    location.reload();
                },
                error: function () {
                    alert("Xəta baş verdi. Xahiş edirik bir daha cəhd edin.");
                },
            });
        });
    });

    $(document).on("click", ".delete-from-wishlist", function (e) {
        e.preventDefault();
        const $this = $(this);
        const id = $this.data("id");

        $.ajax({
            url: "wishlist/delete",
            type: "GET",
            data: { id: id },
            success: function (res) {
                const url = window.location.toString();

                if (url.indexOf("wishlist") !== -1) {
                    window.location = url;
                } else {
                    const result = JSON.parse(res);

                    if (result.type == "error") {
                        Swal.fire({
                            text: result.text,
                            icon: result.type,
                        });

                        // Buton görünümünü değiştir
                        $this
                            .removeClass("delete-from-wishlist")
                            .addClass("add-to-wishlist")
                            .find("i")
                            .removeClass("fa-solid fa-heart")
                            .addClass("far fa-heart");
                    } else {
                        Swal.fire({
                            text: result.text,
                            icon: result.type,
                        });
                    }
                }
            },
            error: function (err) {
                Swal.fire({
                    text: "Bir hata oluştu. Lütfen tekrar deneyin.",
                    icon: "error",
                });
            },
        });
    });

    // Product Quantity
    $(".quantity button").on("click", function () {
        var button = $(this);
        var oldValue = button.parent().parent().find("input").val();
        if (button.hasClass("btn-plus")) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        button.parent().parent().find("input").val(newVal);
    });
})(jQuery);
