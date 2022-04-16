<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <META NAME="Title" CONTENT="Rainbow six siege | Gstats Network">
    <title>Rainbow six siege | Gstats Network</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.png">
    <META NAME="Keywords" CONTENT="Rainbow six siege status r6">
    <META NAME="Description" CONTENT="View the live status of services and servers for Rainbow six siege and check if servers are down">
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
      <img class="img-resposive" src="assets/images/rainbow-6-siege.svg" style="margin-bottom: -10px; margin-right: 10px; display: inline; width: 150px">
    </div>
  </header>

  <div class='container'>

  <?php

          //-----------------------------------------------------------------------------------------------------//
              include 'apis/r6-api.php';

              if (strpos($responsenojson, 'Online')) { 
                echo "<section class='col-md-12 ongoingIssues'>
                  <a href='' class='issueBanner issueBanner--monitoring'>
                    <p class='issueBanner__state'>Monitoring</p>
                    <span class='server-status' type='up' style='margin-left: 20px;'></span><p style='margin-left: 20px;'>All platforms are currently operational</p>
                  </a>
                </section>";
              }else{
                echo "<section class='col-md-12 ongoingIssues'>
                <a href='' class='issueBanner issueBanner--maintenance'>
                  <p class='issueBanner__state'>Monitoring</p>
                  <span class='server-status' type='slow' style='margin-left: 20px;'></span><p style='margin-left: 20px;'>Some platforms are not running correctly</p>
                </a>
              </section>";
              }
              
          //-----------------------------------------------------------------------------------------------------//
        ?>

    <section class='col-md-12 serviceGroup' style="margin-bottom: 135px;">
    <ul class='serviceList serviceGroup'>
      <li class='serviceList__item'>
          <p class='serviceList__name' style="font-weight: bold; float: none; text-align: center;">
          Services (Platforms)
          </p>
        </li>
      </ul>
    <ul class='serviceList serviceGroup__list'>
        <?php

          //-----------------------------------------------------------------------------------------------------//

                echo "<li class='serviceList__item'>
                <p class='serviceList__status'><span class='outage'>$rainbow_six_siege_china_pc_status</span></p>
                <p class='serviceList__name'>
                PC (CHINA)
                </p>
              </li>";
              echo "<li class='serviceList__item'>
                <p class='serviceList__status'><span class='outage'>$rainbow_six_siege_pc_status</span></p>
                <p class='serviceList__name'>
                PC
                </p>
              </li>";
              echo "<li class='serviceList__item'>
                <p class='serviceList__status'><span class='outage'>$rainbow_six_siege_ps4_status</span></p>
                <p class='serviceList__name'>
                PS4
                </p>
              </li>";

              echo "<li class='serviceList__item'>
                <p class='serviceList__status'><span class='outage'>$rainbow_six_siege_ps5_status</span></p>
                <p class='serviceList__name'>
                PS5 
                </p>
              </li>";

              echo "<li class='serviceList__item'>
                <p class='serviceList__status'><span class='outage'>$rainbow_six_siege_xbox_status</span></p>
                <p class='serviceList__name'>
                XBOX SERIES X
                </p>
              </li>";
              echo "<li class='serviceList__item'>
                <p class='serviceList__status'><span class='outage'>$rainbow_six_siege_xboxone_status</span></p>
                <p class='serviceList__name'>
                XBOX ONE
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