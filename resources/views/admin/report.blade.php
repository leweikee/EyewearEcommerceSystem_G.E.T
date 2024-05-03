<html>
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('/resources/css/default.css') }}">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">

        var sunglassesQuantity = {{ $categoryQuantities['sunglasses']  }};
        var contactLensQuantity = {{ $categoryQuantities['contactlens']  }};
        console.log(contactLensQuantity);
        console.log(sunglassesQuantity);

      // Load Charts and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Draw the pie chart for Sarah's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(drawOrderByCategoryChart);

      // Draw the pie chart for the Anthony's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(drawBrandSalesChart);

      // Callback that draws the pie chart for Sarah's pizza.
      function drawOrderByCategoryChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Category');
        data.addColumn('number', 'Quantity Sold');
        data.addRows([
          ['Sunglasses', sunglassesQuantity],
          ['Contact Lens', contactLensQuantity]
        ]);

        // Set options for Sarah's pie chart.
        var options = {title:'Sales by Category',
                       width:500,
                       height:400};

        // Instantiate and draw the chart for Sarah's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('OrderByCategoryChart_chart_div'));
        chart.draw(data, options);

      }

    function drawBrandSalesChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Brand');
    data.addColumn('number', 'Total Sales');

    // Assuming you have a variable $brandQuantities containing brand sales data
    var brandData = {!! json_encode($brandQuantities) !!};

    for (var brandID in brandData) {
        // Retrieve brand name based on brand ID
        var brandName = getBrandName(brandID);

        // Add row with brand name instead of ID
        data.addRow([brandName, brandData[brandID]]);
    }

    // Set options for the bar chart.
    var options = {
        title: 'Sales by Brand',
        width: 500,
        height: 400,
        chart: { subtitle: 'Sales for each brand' },
        bars: 'vertical',
        hAxis: { title: 'Brand' },
        vAxis: { title: 'Total Sales', minValue: 0 }
    };

    // Instantiate and draw the chart for sales vs brand.
    var chart = new google.visualization.ColumnChart(document.getElementById('BrandSalesChart_chart_div'));
    chart.draw(data, options);
}


// Function to retrieve brand name based on brand ID
function getBrandName(brandID) {
    var brands = {!! json_encode($brands) !!};
    console.log(brands); // Add this line
    for (var i = 0; i < brands.length; i++) {
        // Convert brand ID to integer before comparison
        if (parseInt(brands[i].brandID) === parseInt(brandID)) {
            console.log(brands[i].brandID)
            return brands[i].brandName;
        }
    }
    return 'Unknown Brand'; // Handle the case where the brand name is not found
}


    </script>
  </head>
  <body>
    <div class="sticky-top">
        @auth
            <!-- User is logged in -->
            @include('header_success')
        @else
            <!-- User is not logged in -->
            @include('header')
        @endauth
    </div>
    <!--Table and divs that hold the pie charts-->
    <div class="container mt-5">
    <div class="text-center mt-5 mb-4">
            <h1 class="fw-bold mb-4">REPORT</h1>
        </div>
        <hr>
        <div></div>
    
        <table class="columns d-flex justify-content-around">
        <tr>
            <td class="m-3"><div class="m-5 mt-4" id="OrderByCategoryChart_chart_div" style="border: 1px solid #ccc"></div></td>
            <td class="m-3"><div class="m-5 mt-4" id="BrandSalesChart_chart_div" style="border: 1px solid #ccc"></div>
        </td>
        </tr>
        </table>
    </div>
  </body>
</html>

