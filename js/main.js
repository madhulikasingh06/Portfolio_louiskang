$(".menu-style li").on("click", function(){
   $(".menu-style li").find(".active").removeClass("active");
   $(this).addClass("active");
});


