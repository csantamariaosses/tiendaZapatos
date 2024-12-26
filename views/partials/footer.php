<div class="container">
           <div class="center-align">
              <h3>FOOTER</h3>
           </div>     
      </div>


   <script src="resources/js/jquery-3.7.1.min.js"></script>     
   <script src="resources/js/materialize.min.js"></script>     
   <script>
      $(document).ready(function() {
        $('select').formSelect();
        $(".dropdown-trigger").dropdown();
        $("#email").focus(function(){            
            $(".msg_nuevo").css("display", "none");
            });

      });
    </script>
   <script>
      function validaEmail() {
         alert("Validar email");
      }
   </script>
   </body>
</html>