<!-- #page Ends -->




</div>

 <script type="text/javascript" src="../js/jquery.1.11.1.js"></script>
 <script type="text/javascript" src="../js/bootstrap.js"></script>

 <script type="text/javascript">
	


	$(".nav a").on("click", function() {
		alert("ds");
   			$(".nav").find(".active").removeClass("active");
  			 $(this).parent().addClass("active");
	});


</script>


</body>
</html>