<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <META NAME="Title" CONTENT="Counter Strike | Gstats Network">
    <title>Status | Gstats Network</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.png">
    <META NAME="Keywords" CONTENT="gstats status ping uploud downloud">
    <META NAME="Description" CONTENT="View the live status of our services (Gstats.Network) and servers and check if some servers are down">
    <META NAME="Language" CONTENT="english ">
    <META NAME="Robots" CONTENT="INDEX,NOFOLLOW">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@600;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7816c50242.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script> 
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> 
    <script src="conf/graph/pingChart.js"></script>
    <script defer data-domain="gstats.network" src="https://analytics.gstats.network/js/plausible.js"></script>
</head>

<body>

  <div class="area">

  <!-- Navigation PHP Include -->
  <?php include 'section/nav.php';?>
  <!-- Navigation PHP Include -->

  <header class='siteHeader'>
    <div class='container'>
      <img class="img-resposive" src="assets/images/logo-status.png" style="margin-bottom: -10px; margin-right: 10px; display: inline;">
      <p style="display: inline;" class='siteHeader__title'>Gstats server</p>
    </div>
  </header>
  

  <div class='container'>
    <div class='col'>
      <div class="row row-p">
        <span>PING (GSTATS.NETWORK)</span><br>
        <span style="font-size: 60px; font-weight: bold;" id="ping-text"></span> <span style="font-size: 60px; font-weight: bold;">&nbsp;MS</span>
        <div style="height: 200px">
            <canvas id="pingChart" width="100%" height="100%"></canvas>
      </div>
      </div>
      <div class='col'>
        <div class="col-md-6 row-p" style="text-align: center;">
          <span>UPSPEED</span><br>
          <span style="font-size: 60px; font-weight: bold;" id="ping-up"></span>
        </div>
        <div class="col-md-6 row-p" style="text-align: center;">
          <span>DOWNSPEED</span><br>
          <span style="font-size: 60px; font-weight: bold;" id="ping-down"></span>
        </div>
      </div>
    </div>
  </div>
  
  </div>

    <!-- Footer PHP Include -->
      <?php include 'section/footer.php';?>
    <!-- Footer PHP Include -->

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

    async function funcName(url){
    const response = await fetch(url);
    var data = await response.json();
    document.getElementById("ping-text").innerHTML = data.ping
    document.getElementById("ping-up").innerHTML = data.uploud
    document.getElementById("ping-down").innerHTML = data.downloud
    }
    funcName('https://gstats.network/conf/graph/ping')

    var intervalId = window.setInterval(function(){
        funcName('https://gstats.network/conf/graph/ping')
    }, 2000);
    </script>
    

</body>

</html>