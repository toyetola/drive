<!-- ================== GLOBAL VENDOR SCRIPTS ==================-->
<script src="{{asset('vendor/modernizr/modernizr.custom.js')}}"></script>
<script src="{{asset('vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/js-storage/js.storage.js')}}"></script>
<script src="{{asset('vendor/js-cookie/src/js.cookie.js')}}"></script>
<script src="{{asset('vendor/pace/pace.js')}}"></script>
<script src="{{asset('vendor/metismenu/dist/metisMenu.js')}}"></script>
<script src="{{asset('vendor/switchery-npm/index.js')}}"></script>
<script src="{{asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- ================== PAGE LEVEL VENDOR SCRIPTS ==================-->
<script src="{{asset('vendor/countup.js/dist/countUp.min.js')}}"></script>
<script src="{{asset('vendor/chart.js/dist/Chart.bundle.min.js')}}"></script>
<script src="{{asset('vendor/flot/jquery.flot.js')}}"></script>
<script src="{{asset('vendor/jquery.flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('vendor/flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('vendor/flot/jquery.flot.time.js')}}"></script>
<script src="{{asset('vendor/flot.curvedlines/curvedLines.js')}}"></script>
<script src="{{asset('vendor/dropzone/drop/dropzone.js')}}"></script>
<script src="{{asset('vendor/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('vendor/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- ================== GLOBAL APP SCRIPTS ==================-->
<script src="{{asset('js/global/app.js')}}"></script>
<!-- ================== PAGE LEVEL SCRIPTS ==================-->
<script src="{{asset('js/components/countUp-init.js')}}"></script>
<script src="{{asset('js/cards/counter-group.js')}}"></script>
<script src="{{asset('js/cards/recent-transactions.js')}}"></script>
<script src="{{asset('js/cards/monthly-budget.js')}}"></script>
<script src="{{asset('js/cards/users-chart.js')}}"></script>
<script src="{{asset('js/cards/bounce-rate-chart.js')}}"></script>
<script src="{{asset('js/cards/session-duration-chart.js')}}"></script>
<script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '../../../../../www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-46627904-1', 'authenticgoods.co');
    ga('send', 'pageview');
</script>