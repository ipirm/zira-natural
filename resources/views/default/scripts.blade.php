<script src="/js/jquery-3.4.1.min.js"></script>
<script src="/libs/libs.min.js"></script>
<script src="/js/app.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script src="/js/basket.js"></script>
