<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{url('')}}/assets/img/favicon.webp">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Kolly</title>

    <link rel="stylesheet" href="{{url('')}}/assets/css/linearicons.css">
    <link rel="stylesheet" href="{{url('')}}/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('')}}/assets/css/themify-icons.css">
    <link rel="stylesheet" href="{{url('')}}/assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{url('')}}/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="{{url('')}}/assets/css/nice-select.css">
    <link rel="stylesheet" href="{{url('')}}/assets/css/nouislider.min.css">
    <link rel="stylesheet" href="{{url('')}}/assets/css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="{{url('')}}/assets/css/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" href="{{url('')}}/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{url('')}}/assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<body>
    @include('layouts.header')
    @yield('main')
    
    @include('layouts.footer')


    <!-- End related-product Area -->
    <script src="{{url('')}}/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="{{url('')}}/assets/js/vendor/bootstrap.min.js"></script>
    <script src="{{url('')}}/assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="{{url('')}}/assets/js/jquery.nice-select.min.js"></script>
    <script src="{{url('')}}/assets/js/jquery.sticky.js"></script>
    <script src="{{url('')}}/assets/js/nouislider.min.js"></script>
    <script src="{{url('')}}/assets/js/countdown.js"></script>
    <script src="{{url('')}}/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{url('')}}/assets/js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{url('')}}/assets/js/gmaps.min.js"></script>
    <script src="{{url('')}}/assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

</body>


<script type="text/javascript">
    $('.category-filter').click(function() {
        var category = [],
            tempArray = [];

        $.each($("[data-filter='category']:checked"), function() {
            tempArray.push($(this).val());
        });
        tempArray.reverse();

        if (tempArray.length !== 0) {
            category += '?categoryId=' + tempArray.toString();
        }

        window.location.href = category
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $('#sort').on('change', function() {

            var url = $(this).val();
            if (url) {
                window.location = url;
            }
            return false;
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $('#size,#wieght').on('change', function() {

            var url = $(this).val();
            if (url) {
                window.location = url;
            }
            return false;
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $("#slider-range").slider({
            orientation: "horizontal",
            range: true,
            min:{{$min_price}},
            max:{{$max_price}},
            steps:150,
            values: [ {{$min_price}} , {{$max_price}}  ],
            slide: function(event, ui) {
                $("#amount").val("£" + ui.values[0] + " - £" + ui.values[1]);
                
                $("#start_price").val(ui.values[0]);
                $("#end_price").val(ui.values[1]);
            
            }
        });
        $("#amount").val("£" + $("#slider-range").slider("values", 0) +
            " - £" + $("#slider-range").slider("values", 1));
    });
</script>

</html>