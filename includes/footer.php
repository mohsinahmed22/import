<?php
/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/14/2018
 * Time: 12:20 PM
 */
?>

</div>
</div>

<!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap.min.js"></script>
<script src="assets/js/dataTables.buttons.min.js"></script>
<script src="assets/js/buttons.bootstrap.min.js"></script>
<script src="assets/daterangepicker.js"></script>
<script src="assets/js/buttons.flash.min.js"></script>
<script src="assets/js/buttons.html5.min.js"></script>
<script src="assets/js/buttons.print.min.js"></script>
<script src="assets/js/dataTables.fixedHeader.min.js"></script>
<script src="assets/js/dataTables.keyTable.min.js"></script>
<script src="assets/js/dataTables.responsive.min.js"></script>
<script src="assets/js/responsive.bootstrap.js"></script>
<script src="assets/js/dataTables.scroller.min.js"></script>
<script src="assets/js/jquery.inputmask.bundle.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="assets/js/custom.js"></script>
<script>
    $( document ).ready(function() {
        console.log( "document ready!" );

        var $sticky = $('.sticky');
        var $stickyrStopper = $('.sticky-stopper');
        if (!!$sticky.offset()) { // make sure ".sticky" element exists

            var generalSidebarHeight = $sticky.innerHeight();
            var stickyTop = $sticky.offset().top;
            var stickOffset = 0;
            var stickyStopperPosition = $stickyrStopper.offset().top;
            var stopPoint = stickyStopperPosition - generalSidebarHeight - stickOffset;
            var diff = stopPoint + stickOffset;

            $(window).scroll(function(){ // scroll event
                var windowTop = $(window).scrollTop(); // returns number

                if (stopPoint < windowTop) {
                    $sticky.css({ position: 'absolute', top: diff });
                } else if (stickyTop < windowTop+stickOffset) {
                    $sticky.css({ position: 'fixed', top: stickOffset });
                } else {
                    $sticky.css({position: 'absolute', top: 'initial'});
                }
            });

        }
    });
</script>

</body>
</html>
