<x-app-layout>
    {{-- @dd($posts) --}}
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <x-button-group-init>
                <x-button-group-content-middle :href="route('dashboardCreate')">
                    <i class="fa fa-plus text-blue-600 text-lg"></i>
                </x-button-group-content-middle>
            </x-button-group-init>
        </div>
    </x-slot>

    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.charts.load('current', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table, 
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

    // Create the data table.
    // var data = new google.visualization.DataTable();

    var data = new google.visualization.arrayToDataTable([
        ['Caleg', 'Perolehan Suara'],
        @php
            foreach($posts as $post){
                echo "['" . $post->caleg . "', " . $post->total. "],";
            }
        @endphp
    ],
      false); // 'false' means that the first row contains labels, not data.

    // Set chart options
    var options = {
                    'title':'How Much Pizza I Ate Last Night',
                    'width':800,
                    'height':600,
                    'is3D': true,
                };

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}
</script>

<div id="chart_div" style="width:800px; height:600px"></div>

</x-app-layout>