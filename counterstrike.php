<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <META NAME="Title" CONTENT="Counter Strike | Gstats Network">
    <title>Counter Strike | Gstats Network</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.png">
    <META NAME="Keywords" CONTENT="csgo counter strike server status">
    <META NAME="Description" CONTENT="View the live status of services and servers for Counter Strike (csgo) and check if servers are down">
    <META NAME="Language" CONTENT="english ">
    <META NAME="Robots" CONTENT="INDEX,NOFOLLOW">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://kit.fontawesome.com/7816c50242.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@600;700;800&display=swap" rel="stylesheet">
    <script defer data-domain="gstats.network" src="https://analytics.gstats.network/js/plausible.js"></script>
</head>

<body>

  <div class="area">

  <!-- Navigation PHP Include -->
  <?php include 'section/nav.php';?>
  <!-- Navigation PHP Include -->

  <header class='siteHeader'>
    <div class='container'>
      <img class="img-resposive" src="assets/images/counter-strike-global-offensive.svg" style="margin-bottom: -10px; margin-right: 10px; display: inline;">
      <p style="display: inline;" class='siteHeader__title'>Counter Strike </p>
    </div>
  </header>

  <div class='container'>

  <?php

          //-----------------------------------------------------------------------------------------------------//
              include 'apis/csgo-api.php';

              if (strpos($responsenojson, 'high')) { 
                echo "<section class='col-md-12 ongoingIssues'>
                  <a href='counter-strike.php' class='issueBanner issueBanner--maintenance'>
                    <p class='issueBanner__state'>Monitoring</p>
                    <span class='server-status' type='slow' style='margin-left: 20px;'></span><p style='margin-left: 20px;'>Some servers are under high load</p>
                  </a>
                </section>";
              }else{
                echo "<section class='col-md-12 ongoingIssues'>
                <a href='counter-strike.php' class='issueBanner issueBanner--monitoring'>
                  <p class='issueBanner__state'>Monitoring</p>
                  <span class='server-status' type='up' style='margin-left: 20px;'></span><p style='margin-left: 20px;'> All services are currently operational</p>
                </a>
              </section>";
              }
              
          //-----------------------------------------------------------------------------------------------------//
        ?>
    <section class='col-md-6 serviceGroup'>
    <ul class='serviceList serviceGroup'>
      <li class='serviceList__item'>
          <p class='serviceList__name' style="font-weight: bold; float: none; text-align: center;">
          Official Data Center
          </p>
        </li>
      </ul>
    <ul class='serviceList serviceGroup__list'>
        <?php

          //-----------------------------------------------------------------------------------------------------//

              foreach($response['result']['datacenters'] as $key2 => $val) {
                
                  $result1 = $val['capacity'];
                  echo "<li class='serviceList__item'>
                  <p class='serviceList__status'><span class='outage'>$result1</span></p>
                  <p class='serviceList__name'>
                    $key2
                  </p>
                </li>";
              }
          //-----------------------------------------------------------------------------------------------------//
        ?>
      </ul>
    </section>

    <section class='col-md-6 serviceGroup'>
    <ul class='serviceList serviceGroup'>
      <li class='serviceList__item'>
          <p class='serviceList__name' style="font-weight: bold; float: none; text-align: center;">
          Services
          </p>
        </li>
      </ul>
    <ul class='serviceList serviceGroup__list'>
        <?php

          //-----------------------------------------------------------------------------------------------------//

              foreach($response['result']['services'] as $key2 => $val) {
                echo "<li class='serviceList__item'>
                <p class='serviceList__status'><span class='outage'>$val</span></p>
                <p class='serviceList__name'>
                  $key2
                </p>
              </li>";
            }
          //-----------------------------------------------------------------------------------------------------//
        ?>
      </ul>
      <ul class='serviceList serviceGroup'>
      <li class='serviceList__item'>
          <p class='serviceList__name' style="font-weight: bold; float: none; text-align: center;">
          Matchmaking
          </p>
        </li>
      </ul>
    <ul class='serviceList serviceGroup__list'>
        <?php

          //-----------------------------------------------------------------------------------------------------//

              echo "<li class='serviceList__item'>
                <p class='serviceList__status'><span class='outage'>$online_servers</span></p>
                <p class='serviceList__name'>
                Online servers
                </p>
              </li>
              <li class='serviceList__item'>
                <p class='serviceList__status'><span class='outage'>$online_players</span></p>
                <p class='serviceList__name'>
                Online players
                </p>
              </li>
              <li class='serviceList__item'>
                <p class='serviceList__status'><span class='outage'>$searching_players</span></p>
                <p class='serviceList__name'>
                Searching players
                </p>
              </li>
              <li class='serviceList__item'>
                <p class='serviceList__status'><span class='outage'>$search_seconds_avg</span></p>
                <p class='serviceList__name'>
                Search seconds avg
                </p>
              </li>";
            
          //-----------------------------------------------------------------------------------------------------//
        ?>
      </ul>
    </section>
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
    </script>
    

</body>

</html>