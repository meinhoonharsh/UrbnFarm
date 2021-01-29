 <?php 
 echo '<hr>
  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; 2020 - Circuit Reboot</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="static/vendor/jquery/jquery.min.js"></script>
  <script src="static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
    (function ($) {
        "use strict"; // Start of use strict

        // Floating label headings for the contact form
        $("body").on("input propertychange", ".floating-label-form-group", function (e) {
          $(this).toggleClass("floating-label-form-group-with-value", !!$(e.target).val());
        }).on("focus", ".floating-label-form-group", function () {
          $(this).addClass("floating-label-form-group-with-focus");
        }).on("blur", ".floating-label-form-group", function () {
          $(this).removeClass("floating-label-form-group-with-focus");
        });

        // Show the navbar when the page is scrolled up
        var MQL = 992;
        console.log(screen.width)
        if(screen.width < MQL){

        $("#logo").attr("src", "static/img/logo-black.png");
        console.log("If coode");
        }else{

        $("#logo").attr("src", "static/img/logo.png");
        console.log("Else coode");
        }

        //primary navigation slide-in effect
        if ($(window).width() > MQL) {
          var headerHeight = $("#mainNav").height();
          $(window).on("scroll", {
            previousTop: 0
          },
            function () {
              var currentTop = $(window).scrollTop();
              //check if user is scrolling up
              if (currentTop < this.previousTop) {
                //if scrolling up...
                if (currentTop > 0 && $("#mainNav").hasClass("is-fixed")) {
                  $("#mainNav").addClass("is-visible");
                  $("#logo").attr("src", "static/img/logo-black.png");

                  console.log(4);
                } else {
                  $("#mainNav").removeClass("is-visible is-fixed");
                  $("#logo").attr("src", "static/img/logo.png");
                  console.log(3);
                }
              } else if (currentTop > this.previousTop) {
                //if scrolling down...
                $("#mainNav").removeClass("is-visible");
                $("#logo").attr("src", "static/img/logo.png");
                console.log(2);
                if (currentTop > headerHeight && !$("#mainNav").hasClass("is-fixed")) {
                  $("#mainNav").addClass("is-fixed");
                  console.log(1);
                }
              }
              this.previousTop = currentTop;
            });
        }

      })(jQuery);
  </script>

</body>

</html>';
?>


