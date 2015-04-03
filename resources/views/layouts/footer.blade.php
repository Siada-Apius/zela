<div class="container">
    <div class="col-md-6 ">
        <div class = "footerCopyRight">
            {!! trans('facade.help') !!}

        </div>
    </div>

    <div class="col-md-6 ">
        <div class = "footerIcons">
            <!--LiveInternet counter-->
            <div class="g-plusone" data-annotation="inline"></div>

        </div>
    </div>
</div>

<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="/js/bootstrap-select.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/jquery.cookie.js"></script>

@yield('footer')

<script>
    jQuery('.selectpicker').selectpicker();

    jQuery('#lang').on('change', function() {

        jQuery.removeCookie("locale");
        jQuery.cookie("locale", this.value, { path: '/', expires: 7 });
//        document.cookie="locale="+this.value;
        location.reload();
    });
</script>