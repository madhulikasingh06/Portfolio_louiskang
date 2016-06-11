

<!-- #page Ends -->

</div>

 <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
 <script type="text/javascript" src="js/bootstrap.js"></script>
 <script type="text/javascript" src="js/jquery.lazyload.js"></script>
 <script src="js/flickity.pkgd.min.js"></script>



 <script type="text/javascript">


$(".menu-style li").on("click", function(){
   $(".menu-style li").find(".active").removeClass("active");
   $(this).addClass("active");
});

// $('.main-carousel').flickity({
//     // options
//     lazyLoad: true ,
//     setGallerySize: false,
//     contain: true ,
//     wrapAround: true
//   });
   



$(function() {
    $("img.lazy").lazyload();
});


$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 600);
        return false;
      }
    }
  });
});
</script>

</body>
</html>