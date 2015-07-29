<html>
  <head>
     <CENTER>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

    
      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});
    


      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
       
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
            
          ['30-24歳', 3],
          ['10-19歳', 1],
          ['20-31歳', 1],
          ['31-39', 1],
          ['60-69歳', 5],
            ['20-29歳', 2]
        ]);
          
        // Set chart options
        var options = {'title':'年代別',
                       'width':1000,
                       'height':300,
        is3D:true
                      };
       

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
        <?php
// ファイルを読み込み専用でオープンする
$fp = fopen('test.csv', 'r');
// ファイルから一行読み込む
$line = fgets($fp);
// 読み込んだ行を出力する
print $line;
// ファイルをクローズする
fclose($fp);
?>
    </script>
         </CENTER>
      



  </head>
    
    

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>
</html>
