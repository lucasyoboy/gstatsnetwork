<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <META NAME="Title" CONTENT="Counter Strike | Gstats Network">
    <title>Apex Legends | Gstats Network</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.png">
    <META NAME="Keywords" CONTENT="csgo counter strike server status">
    <META NAME="Description" CONTENT="View the live status of services and servers for Apex Legends (apex) and check if servers are down">
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
      <img class="img-resposive" src="assets/images/apex-legends.svg" style="margin-bottom: -10px; margin-right: 0px; display: inline; width: 10%;">
      <p style="display: inline;" class='siteHeader__title'>Apex Legends </p>
    </div>
  </header>

  <div class='container'>
  <?php

    //-----------------------------------------------------------------------------------------------------//
        include 'apis/apex-api.php';

        if (strpos($Origin_login_check, 'SLOW') || (strpos($EA_novafusion_check, 'SLOW')) || (strpos($EA_accounts_check, 'SLOW')) || (strpos($ApexOauth_Crossplay_check, 'SLOW'))) { 
          echo "<section class='col-md-12 ongoingIssues'>
            <a href='apexlegends' class='issueBanner issueBanner--maintenance'>
              <p class='issueBanner__state'>Monitoring</p>
              <span class='server-status' type='slow' style='margin-left: 20px;'></span><p style='margin-left: 20px;'>Some servers are currently running slow</p>
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

        if (strpos($Origin_login_check, 'DOWN') || (strpos($EA_novafusion_check, 'DOWN')) || (strpos($EA_accounts_check, 'DOWN')) || (strpos($ApexOauth_Crossplay_check, 'DOWN'))) { 
          echo "<section class='col-md-12 ongoingIssues'>
            <a href='apexlegends' class='issueBanner issueBanner--investigating'>
              <p class='issueBanner__state'>Monitoring</p>
              <span class='server-status' type='down' style='margin-left: 20px;'></span><p style='margin-left: 20px;'>Some servers are currently down</p>
            </a>
          </section>";
        }
        
    //-----------------------------------------------------------------------------------------------------//
    ?>
    <section class='col-md-6 serviceGroup'>
    <ul class='serviceList serviceGroup'>
      <li class='serviceList__item'>
          <p class='serviceList__name' style="font-weight: bold; float: none; text-align: center;">
          Origin Login
          </p>
        </li>
      </ul>
    <ul class='serviceList serviceGroup__list'>
        <?php

          //-----------------------------------------------------------------------------------------------------//

              foreach($response['Origin_login'] as $key2 => $val) {
                
                  $result1 = $val['Status'];
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
      <ul class='serviceList serviceGroup'>
      <li class='serviceList__item'>
          <p class='serviceList__name' style="font-weight: bold; float: none; text-align: center;">
          EA Accounts
          </p>
        </li>
      </ul>
    <ul class='serviceList serviceGroup__list'>
        <?php

          //-----------------------------------------------------------------------------------------------------//

              foreach($response['EA_accounts'] as $key2 => $val) {
                
                  $result1 = $val['Status'];
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
          EA Novafusion
          </p>
        </li>
      </ul>
    <ul class='serviceList serviceGroup__list'>
        <?php

          //-----------------------------------------------------------------------------------------------------//
        

              foreach($response['EA_novafusion'] as $key2 => $val) {
                
                  $result1 = $val['Status'];
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
      <ul class='serviceList serviceGroup'>
      <li class='serviceList__item'>
          <p class='serviceList__name' style="font-weight: bold; float: none; text-align: center;">
          Crossplay
          </p>
        </li>
      </ul>
    <ul class='serviceList serviceGroup__list'>
        <?php

          //-----------------------------------------------------------------------------------------------------//
          

              foreach($response['ApexOauth_Crossplay'] as $key2 => $val) {
                
                  $result1 = $val['Status'];
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