

<!-- #page Ends -->

</div>

 <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
 <script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.lazyload.js"></script>

 <script type="text/javascript">


$(".menu-style li").on("click", function(){
   $(".menu-style li").find(".active").removeClass("active");
   $(this).addClass("active");
});


$(function() {
    $("img.lazy").lazyload();
});
</script>

</body>
</html>