        <!-- start footer Area -->
        <footer class="footer-area section-gap">
        </footer>
        <!-- End footer Area -->
        <!-- Function used to shrink nav bar removing paddings and adding black background -->



        <!-- Jquery needed -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>js/sample.js"></script>
        <script src="js/scripts.js"></script>

<!--        Function used to shrink nav bar removing paddings and adding black background-->
        <script>
            $(window).scroll(function() {
                if ($(document).scrollTop() > 50) {
                    $('.nav').addClass('affix');
                    console.log("OK");
                } else {
                    $('.nav').removeClass('affix');
                }
            });
        </script>
        </body>
</html>