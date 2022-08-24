window.onload = () => {
    tabEvent.init();
    owlCarousel.init();
};

const tabEvent = {
    init: function () {
        this.setupTabEvent();
    },
    setupTabEvent: function () {
        const tabClick = document.querySelectorAll(".tab-wrapper .tab");
        const tabMain = document.querySelectorAll(".tab-item");
        tabClick.forEach((item, index) =>
            item.addEventListener("click", () => {
                console.log(item);
                tabClick.forEach((i) => i.classList.remove("active"));
                tabMain.forEach((i) => i.classList.remove("active"));

                tabClick[index].classList.add("active");
                tabMain[index].classList.add("active");
            })
        );
    },
};

const owlCarousel = {
    init: function () {
        this.setupBannerCarousel();
    },
    setupBannerCarousel: function () {
        const $owl = $(".silder-banner.owl-carousel").owlCarousel({
            responsive: {
                0: {
                    items: 1,
                },
            },
            loop: true,
            rewind: false,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            smartSpeed: 600,
            mouseDrag: true,
            nav: true,
            dots: false,

            autoWidth: false,
            margin: 0,
        });
        $owl.trigger("refresh.owl.carousel");
    },
};

$(document).ready(function () {

    $('.list-episode-item a').each(function (index, value){
        $(this).on('click',function(){
            $('.list-episode-item a').each(function (index, value){
                $(this).removeClass('active');
            })
            let iframeFilm   = $(this).data('href');
            $('.embed-responsive iframe').attr('src', iframeFilm);
            $(this).addClass('active');
        })
      });
    /*----------- Start Review Product-----------*/
    //Hover star
    $("#stars li").on("mouseover", hoverStar).on("mouseout", hoverOutStar);

    function hoverStar() {
        var onStar = parseInt($(this).data("count"), 10); //Sao đang được trỏ tới

        // highlight tất cả ngôi sao nếu nó ko lớn hơn ngôi sao đc hover
        $(this)
            .parent()
            .children("li.star")
            .each(function (e) {
                if (e < onStar) {
                    $(this).addClass("hover");
                } else {
                    $(this).removeClass("hover");
                }
            });
    }

    function hoverOutStar() {
        $(this)
            .parent()
            .children("li.star")
            .each(function (e) {
                $(this).removeClass("hover");
            });
    }

    //Action to perform click
    $("#stars li").on("click", selectStar);
    function selectStar() {
        var onStar = parseInt($(this).data("count"), 10); //Ngôi sao đang được selected
        var stars = $(this).parent().children("li.star");

        for (i = 0; i < stars.length; ++i) {
            $(stars[i]).removeClass("selected");
        }

        for (i = 0; i < onStar; ++i) {
            $(stars[i]).addClass("selected");
        }

        var ratingValue = parseInt($(this).last().data("count"), 10);

        var average = 6.3;
        console.log(ratingValue + average);
        $("#average").text(((ratingValue + average) / 2).toFixed(1));
    }

    $("#wishlist-btn").click(function(e){
        e.preventDefault();
            $.ajax({
                url : '/dang-nhap',
                type : 'GET',
            }).done(function(){
                alertify.confirm("Bạn phải đăng nhập moi co the Yeu thich ",
                function(){
                    $("body").append('<div id="load-re"> <span id="preload"></span></div>');
                    alertify.success('Ok');location.replace('/dang-nhap');

                },
                function(){
                    alertify.error('Cancel');
                    location.reload();
                });

            });
    });

    /*------ WishList ------*/
    /*------ WishList ------*/
    $(".wishlist-btn").on("click", function (event) {
        event.preventDefault();
        let url = $(this).data("url");
        // alert("aaadad")
        // alert(url);
        $.ajax({
            url: url,
            type: "GET",

            beforeSend: function () {
                $(".overlay-snipper").addClass("open");
            },

            success: function (data) {
                console.log(data.data);
                if (data.code === 200) {
                    $(".sweet-alert").fadeIn("slow");
                    setInterval(function () {
                        location.reload().fadeIn("slow");
                    }, 1000);
                }
            },

            complete: function () {
                $(".overlay-snipper").removeClass("open");
            },
        });
    });

    $(document).on("click", "#removeHistory", deleteWishProduct);

    function deleteWishProduct(event) {
        event.preventDefault();
        let url = $(".wishlist-btn").data("url");

        let id = $(this).data("filmid");

        $.ajax({
            type: "GET",
            url: url,
            data: {
                id: id,
            },

            beforeSend: function () {
                $(".overlay-snipper").addClass("open");
            },

            success: function (data) {
                if (data.code === 200) {
                    setInterval(function () {
                        location.reload().fadeIn("slow");
                    }, 1000);
                }
            },

            complete: function () {
                $(".overlay-snipper").removeClass("open");
            },

            error: function () {},
        });
    }
});
