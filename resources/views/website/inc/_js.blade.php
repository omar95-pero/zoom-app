

<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--/////////////////////////////JavaScript/////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<script src="{{asset('website')}}/js/jquery-3.4.1.min.js"></script>
<script src="{{asset('website')}}/js/popper.min.js"></script>
<script src="{{asset('website')}}/js/bootstrap.min.js"></script>
<script src="{{asset('website')}}/js/stars.js"></script>
<script src="{{asset('website')}}/js/mdb.min.js"></script>
<script src="{{asset('website')}}/js/smooth-scroll.min.js"></script>
<script src="{{asset('website')}}/js/swiper.js"></script>
<script src="{{asset('website')}}/js/aos.js"></script>
<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
 <script src="{{asset('website')}}/js/dropify.js"></script>
 <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>


<script>
    /* 24. Star Rating Js
  /*----------------------------------------*/
    $(function () {
        $('.star-rating').barrating({
            theme: 'fontawesome-stars'
        });
    });
    /*----------------------------------------*/
</script>


<!-- Chart code -->
<script>

    $('.dt_select2').select2();

    am4core.ready(function () {


            $('.dropify').dropify();



// Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end



        // Create chart instance
        var chart = am4core.create("firstChild", am4charts.RadarChart);

        // Add data
        chart.data = [{
            "category": "عربي",
            "value": 80,
            "full": 100
        }, {
            "category": "علوم",
            "value": 35,
            "full": 100
        }, {
            "category": "دراسات",
            "value": 92,
            "full": 100
        },

        ];

        // Make chart not full circle
        chart.startAngle = -90;
        chart.endAngle = 180;
        chart.innerRadius = am4core.percent(20);

        // Set number format
        chart.numberFormatter.numberFormat = "#.#'%'";

        // Create axes
        var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "category";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.grid.template.strokeOpacity = 0;
        categoryAxis.renderer.labels.template.horizontalCenter = "right";
        categoryAxis.renderer.labels.template.fontWeight = 500;
        categoryAxis.renderer.labels.template.adapter.add("fill", function (fill, target) {
            return (target.dataItem.index >= 0) ? chart.colors.getIndex(target.dataItem.index) : fill;
        });
        categoryAxis.renderer.minGridDistance = 10;

        var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
        valueAxis.renderer.grid.template.strokeOpacity = 0;
        valueAxis.min = 0;
        valueAxis.max = 100;
        valueAxis.strictMinMax = true;

        // Create series
        var series1 = chart.series.push(new am4charts.RadarColumnSeries());
        series1.dataFields.valueX = "full";
        series1.dataFields.categoryY = "category";
        series1.clustered = false;
        series1.columns.template.fill = new am4core.InterfaceColorSet().getFor("alternativeBackground");
        series1.columns.template.fillOpacity = 0.08;
        series1.columns.template.cornerRadiusTopLeft = 20;
        series1.columns.template.strokeWidth = 0;
        series1.columns.template.radarColumn.cornerRadius = 20;

        var series2 = chart.series.push(new am4charts.RadarColumnSeries());
        series2.dataFields.valueX = "value";
        series2.dataFields.categoryY = "category";
        series2.clustered = false;
        series2.columns.template.strokeWidth = 0;
        series2.columns.template.tooltipText = "{category}: [bold]{value}[/]";
        series2.columns.template.radarColumn.cornerRadius = 20;

        series2.columns.template.adapter.add("fill", function (fill, target) {
            return chart.colors.getIndex(target.dataItem.index);
        });

        // // Add cursor
        // chart.cursor = new am4charts.RadarCursor();

    }); // end am4core.ready()

    function check_all()
    {
        $('input[class="item_checkbox"]:checkbox').each(function(){
            if ( $('input[class="check_all"]:checkbox:checked').length == 0 ) {
                $(this).prop('checked', false);
            }else {
                $(this).prop('checked', true);
            }
        });
    }

</script>

<!-- Chart code -->
<script>
    am4core.ready(function () {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end



        // Create chart instance
        // var chart = am4core.create("scoundChild", am4charts.RadarChart);
        //
        // // Add data
        // chart.data = [{
        //     "category": "عربي",
        //     "value": 80,
        //     "full": 100
        // }, {
        //     "category": "علوم",
        //     "value": 35,
        //     "full": 100
        // }, {
        //     "category": "دراسات",
        //     "value": 92,
        //     "full": 100
        // },
        //     {
        //         "category": "احياء",
        //         "value": 92,
        //         "full": 100
        //     },
        //     {
        //         "category": "فزيا",
        //         "value": 92,
        //         "full": 100
        //     }, {
        //
        //         "category": "جولوجيا",
        //         "value": 100,
        //         "full": 100
        //     }, {
        //
        //         "category": "هبل",
        //         "value": 10,
        //         "full": 100
        //     }
        // ];
        //
        // // Make chart not full circle
        // chart.startAngle = -90;
        // chart.endAngle = 180;
        // chart.innerRadius = am4core.percent(20);
        //
        // // Set number format
        // chart.numberFormatter.numberFormat = "#.#'%'";

        // Create axes
        var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "category";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.grid.template.strokeOpacity = 0;
        categoryAxis.renderer.labels.template.horizontalCenter = "right";
        categoryAxis.renderer.labels.template.fontWeight = 500;
        categoryAxis.renderer.labels.template.adapter.add("fill", function (fill, target) {
            return (target.dataItem.index >= 0) ? chart.colors.getIndex(target.dataItem.index) : fill;
        });
        categoryAxis.renderer.minGridDistance = 10;

        var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
        valueAxis.renderer.grid.template.strokeOpacity = 0;
        valueAxis.min = 0;
        valueAxis.max = 100;
        valueAxis.strictMinMax = true;

        // Create series
        var series1 = chart.series.push(new am4charts.RadarColumnSeries());
        series1.dataFields.valueX = "full";
        series1.dataFields.categoryY = "category";
        series1.clustered = false;
        series1.columns.template.fill = new am4core.InterfaceColorSet().getFor("alternativeBackground");
        series1.columns.template.fillOpacity = 0.08;
        series1.columns.template.cornerRadiusTopLeft = 20;
        series1.columns.template.strokeWidth = 0;
        series1.columns.template.radarColumn.cornerRadius = 20;

        var series2 = chart.series.push(new am4charts.RadarColumnSeries());
        series2.dataFields.valueX = "value";
        series2.dataFields.categoryY = "category";
        series2.clustered = false;
        series2.columns.template.strokeWidth = 0;
        series2.columns.template.tooltipText = "{category}: [bold]{value}[/]";
        series2.columns.template.radarColumn.cornerRadius = 20;

        series2.columns.template.adapter.add("fill", function (fill, target) {
            return chart.colors.getIndex(target.dataItem.index);
        });

        // // Add cursor
        // chart.cursor = new am4charts.RadarCursor();

    }); // end am4core.ready()
</script>


<script src="{{asset('website')}}/js/Custom.js"></script>



<script !src="">

     $(document).ready(function(){



         $('.notification_action').click( function() {

             // alert(12);

            $.ajax({
                url:'{{ url('update_is_read') }}'+'/'+'{{ auth()->user() ? auth()->user()->id : '' }}',
                dataType:'json',
                type:'get',
                beforeSend: function(){
                    // $('.overlay').show();
                },success: function(data){
                    // console.log( data);

                    $('.notification_count').remove();

                },error(response){

                }
            });


        });




    });

</script>




<!-- swipper-slider -->
<script>
    var swiper = new Swiper('.testimonials-slider', {
        spaceBetween: 20,
        loop: false,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        speed: 800,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            400: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 3,
            },
        }
    });
</script>

{{-- ======================================= crop ===================================== --}}

<script>



</script>


{{-- ======================================= crop ===================================== --}}




@stack('web_js')
