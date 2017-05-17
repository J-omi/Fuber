$("#menu-click").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});


function myFunction(x) {
    x.classList.toggle("change");
}
$(window).scroll({
        previousTop: 0
    },
    function () {
        var currentTop = $(window).scrollTop();
        if (currentTop < this.previousTop) {
            $(".container").show();
        } else {
            $(".container").hide();
        }
        this.previousTop = currentTop;
    });
