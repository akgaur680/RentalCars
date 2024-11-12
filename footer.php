    <!-- Footer -->
    <footer class="bg-dark pt-4">
      <div class="container-fluid ">
        <div class="row mb-5">
          <div class="col-md text-white">
            <div class="mb-4" style="text-decoration: none;">
              <h2 class="" style="text-decoration: none"><a href="index.php" class="text-white" style="text-decoration:none;">Rental<span>Cars</span></a></h2>
              <p>"Drive Your Dreams: Your Journey Starts Here!".</p>
              <ul class="list-unstyled d-flex mt-5 text-center">
                <li class="m-2"><a href="https://twitter.com/akgaur680" target="_blank"><i class="fa-brands fa-x-twitter fa-xl mt-4" style="color: #ffffff;"></i></a></li>
                <li class="m-2"><a href="https://www.facebook.com/profile.php?id=100009255527425" target="_blank"><i class="fa-brands fa-facebook-f fa-xl mt-4" style="color: #ffffff;"></i></a></li>
                <li class="m-2"><a href="https://www.instagram.com/akgaur786/" target="_blank"><i class="fa-brands fa-instagram fa-xl mt-4" style="color: #ffffff;"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="text-white">
              <h2>Information</h2>
              <ul class="list-unstyled">
                <li><a href="about.php" class="py-2 d-block text-white">About</a></li>
                <li><a href="#" class="py-2 d-block text-white">Services</a></li>
                <li><a href="#" class="py-2 d-block text-white">Term and Conditions</a></li>
                <li><a href="#" class="py-2 d-block text-white">Best Price Guarantee</a></li>
                <li><a href="#" class="py-2 d-block text-white">Privacy &amp; Cookies Policy</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 text-white ">
              <h2 class="ftco-heading-2">Customer Support</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block text-white ">FAQ</a></li>
                <li><a href="#" class="py-2 d-block text-white">Payment Option</a></li>
                <li><a href="#" class="py-2 d-block text-white">Booking Tips</a></li>
                <li><a href="#" class="py-2 d-block text-white">How it works</a></li>
                <li><a href="customer/contactus.php" class="py-2 d-block text-white">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class=" mb-4">
              <h2 class="text-white">Have a Questions?</h2>
              <div class="mb-3">
                <ul class="mt-4 list-unstyled">
                  <li><span></span><span class="text-white"># 240, St. No. 3, Bhagat Singh Colony, Moti Nagar, Ludhiana, Punjab, India, 141010</span></li>
                  <li class="mt-2"><a href="#" class="text-white">+91 980 3660 559</a></li>
                  <li class="mt-2"><a href="#" class="text-white">akgaur680@gmail.com</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center text-white">

            <p>
              Copyright &copy;<script>
                document.write(new Date().getFullYear());
              </script> All rights reserved |
            </p>
          </div>
        </div>
      </div>
    </footer>





    </div>

    <script>
      // Disable form submissions if there are invalid fields
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          // Get the forms we want to add validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();

      // Script to handle confirm-delete dialog box
      $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('#confirm').attr('href', $(e.relatedTarget).data('href'));
      });
    </script>

    </body>

    </html>