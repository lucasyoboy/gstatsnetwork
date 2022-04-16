<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <META NAME="Title" CONTENT="Gstats Network">
    <title>Gstats Network</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.png">
    <META NAME="Keywords" CONTENT="gstats, server status, csgo, apex">
    <META NAME="Description" CONTENT="A community project that provides server stats and information about game servers like apex legends, battlefield and much more.">
    <META NAME="Language" CONTENT="english ">
    <META NAME="Robots" CONTENT="INDEX,NOFOLLOW">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://kit.fontawesome.com/7816c50242.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@600;700;800&display=swap" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
    <script defer data-domain="gstats.network" src="https://analytics.gstats.network/js/plausible.js"></script>
</head>

<body>

  <div class="area">

    <!-- Navigation PHP Include -->
    <?php 
    header('Access-Control-Allow-Origin: *');
    include 'section/nav.php';
    include 'section/get_location.php';
    
    ?>
    <!-- Navigation PHP Include -->

    <header class='siteHeader' style="padding: 0px 0 60px 0;">
  </header>
  

    <div class="container">
        <?php 
         // Starting session
          session_start();
          
          // Accessing session data
          echo $_SESSION["msg"];

          // Starting session
          
          unset($_SESSION["msg"]);

        ?>

    <section class='col-md-12 ongoingIssues'>
            <a href='r6.php' class='issueBanner--msg'>
             <p> <i class="fa"><img style="margin-top: 1px;" src="assets/images/twitter.svg" width="10" height="10"></i> Follow me on Twitter @gstatsnetwork. ➥</p>
            </a>
    </section>
      <div class="col">
        <div class="col-md-6" style="text-align: center; margin-top: 20px;">
          <span style="font-size: 30px; width: 100%;">Having any issues?</span>
        </div>
        <div class="col-md-6" style="margin-top: 20px;">
          <button class="btn btn-issues Click-here" style="width: 100%;">Report Problem</button>
        </div>
        <div class="col-md-12" style="margin-top: 20px; display: none;">
          <span style="font-size: 20px;">Reports history  <span class="beta-button">COMING SOON</span></span>
          <hr>
        <canvas id="myChart" width="500" height="200"></canvas>
        </div>
        <div class="col-md-12" style="margin-top: 20px; padding-right: 0px; padding-left: 0px;">
          <div class="col-md-5" style="margin-top: 20px;">
            <span style="font-size: 20px;">Recent Reports</span>
            <hr>
            <?php
              include 'conf/db_connect.php';

              $db= $conn;
              $tableName="game_reports";
              $columns= ['num', 'game','country','error_code', 'create_date', 'ip'];
              $fetchData = fetch_data($db, $tableName, $columns);
              function fetch_data($db, $tableName, $columns){
              if(empty($db)){
                $msg= "Database connection error";
              }elseif (empty($columns) || !is_array($columns)) {
                $msg="columns Name must be defined in an indexed array";
              }elseif(empty($tableName)){
                $msg= "Table Name is empty";
              }else{
              $columnName = implode(", ", $columns);
              $query = "SELECT ".$columnName." FROM $tableName"." ORDER BY num DESC LIMIT 10";
              $result = $db->query($query);
              if($result== true){ 
              if ($result->num_rows > 0) {
                  $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
                  $msg= $row;
              } else {
                  $msg= "No Data Found"; 
              }
              }else{
                $msg= mysqli_error($db);
              }
              }
              return $msg;
              }
            ?>
          <div class="table-responsive">
          <table class="table bodydiv dataTable no-footer">
            <thead style="background-color: #DDDDDD; font-weight: bold;"><tr><th></th>
              <th>Country</th>
              <th>Game</th>
              <th>Error Code</th>
              <th>Date</th>
          </thead>
          <tbody style="font-size: 14px;">
            <?php
                if(is_array($fetchData)){      
                $sn=1;
                foreach($fetchData as $data){
              ?>
                <tr>
                <td><?php echo $sn; ?></td>
                <td><?php 
                echo $data['country']??''; 
                ?></td>
                <td><?php echo $data['game']??''; ?></td>
                <td><?php echo $data['error_code']??''; ?></td>
                <td><?php echo $data['create_date']??''; ?></td>
              </tr>
              <?php
                $sn++;}}else{ ?>
                <tr>
                  <td colspan="8">
              <?php echo $fetchData; ?>
            </td>
              <tr>
              <?php
              }?>
              </tbody>
          </table>
          </div>
          </div>
          <div class="col-md-7" style="margin-top: 20px;">
            <span style="font-size: 20px;">Reports Map  [All games]</span>
            <hr>
            <div id="main" style="width: auto; height: 600px;"></div>
          </div>
        </div>
      </div>
    </div>
<!-- partial -->

    </div>

  </div>
    <!-- Navigation PHP Include -->
    <?php 
    
    include 'section/footer.php';
    include 'section/popup.php';

    ?>
    <!-- Navigation PHP Include -->

    <script>
      const targetDiv = document.getElementById("third");
        const btn = document.getElementById("toggle");
        btn.onclick = function () {
          if (targetDiv.style.display !== "none") {
            targetDiv.style.display = "none";
          } else {
            targetDiv.style.display = "block";
          }
        };

     
            var ctx = document.getElementById('myChart').getContext('2d');
        var data = {
      "labels": [
        "1:00",
        "2:00",
        "3:00",
        "4:00",
        "5:00",
        "6:00",
        "7:00",
        "8:00",
        "9:00",
        "10:00",
        "11:00",
        "12:00",
        "13:00",
        "14:00",
        "15:00",
        "16:00",
        "17:00",
        "18:00",
        "19:00",
        "20:00",
        "21:00",
        "22:00",
        "23:00",
        "24:00",
      ],
      "datasets": [
        {
          "label": "Apex Legends",
          "backgroundColor": "#1f0000",
          "fill": true,
          "data": [
            "18:20",
            "13:14",
            "12:00",
            "15:00"
          ],
          "borderColor": "#000000",
          "pointBackgroundColor": "#000000",
          "pointBorderColor": "#000000",
          "pointHoverBackgroundColor": "#d80e0e",
          "pointRadius": 3,
          "pointHoverBorderColor": "#000000",
          "pointBorderWidth": 3,
          "lineTension": 0,
          "borderWidth": "2"
        },
        {
          "label": "CSGO",
          "backgroundColor": "#e2ad00",
          "fill": true,
          "data": [
            "30",
            "34",
            "60",
            "90"
          ],
          "borderWidth": "2",
          "pointHoverBackgroundColor": "#c50707",
          "pointRadius": 3,
          "pointBorderWidth": 3,
          "lineTension": 0
        },
        {
          "label": "Rocket League",
          "backgroundColor": "#0069be",
          "fill": true,
          "data": [
            "20",
            "40",
            "70",
            "90",
            "10"
          ],
          "borderWidth": "2",
          "pointRadius": 3,
          "pointBorderWidth": 3,
          "lineTension": 0,
          "pointHoverBackgroundColor": "#da1616"
        }
      ]
    };
        var options = {
      "title": {
        "display": false
      },
      "legend": {
        "display": true,
        "position": "bottom"
      },
      "scales": {
        "yAxes": [
          {
            "ticks": {
              "beginAtZero": true
            }
          },
          
        ]
      }
    };

        var myChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: options
        });

</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/echarts/5.1.2/echarts.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/echarts@4.9.0/map/js/world.js'></script>
<script>
  var chartDom = document.getElementById('main');
  var myChart = echarts.init(chartDom);
  var option;

  fetch('https://api.gstats.network/internal/reports/map')
    .then(res => res.json()).then(data =>
        {
  console.log(data);
      var points = [].concat.apply([], data.map(function (track) {
          return track.map(function (seg) {
              return seg.coord.concat([1]);
          });
      }));

      myChart.setOption(option = {
          animation: false,
          geo: [{ map: 'world', roam: true, 
                center: [1.905776, -3.627909],
                zoom:1.5}], // , regions: [], tooltip: {} }],
          visualMap: {
              show: false,
              top: 'top',
              min: 0,
              max: 5,
              seriesIndex: 0,
              calculable: true,
              inRange: {
                  color: ['blue', 'blue', 'green', 'yellow', 'red']
              }
          },
          tooltip: {},
          series: [{
            // type: 'scatter', symbolSize: 10,  // has tooltips!
            type: 'heatmap', pointSize: 20, blurSize: 10,  // no tooltips
            tooltip: {show:true, trigger:'item', formatter: '{c}' },
              coordinateSystem: 'geo',
              data: points,
              name: 's1',
              // label: { show: true, formatter: '{b}'},
          }]
      });
  }) ; 

  option && myChart.setOption(option);
</script>
    

</body>

</html>