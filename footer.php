	<script type="text/javascript">
	   $('dl dd').hide();
       $('dl dt').click(function(){
          if ($(this).hasClass('activo')) {
               $(this).removeClass('activo');
               $(this).next().slideUp();
          } else {
               $('dl dt').removeClass('activo');
               $(this).addClass('activo');
               $('dl dd').slideUp();
               $(this).next().slideDown();
          }
       });
	</script>

</aside></div>
</body>
</html>
<?php $DB->cerrarconsulta(); ?>