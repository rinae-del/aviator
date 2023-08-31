<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">
<div class="col-lg-6" style="user-select: auto;">
    <div class="card" style="user-select: auto;">
      <div class="card-header pb-0" style="user-select: auto;">
        <div class="d-flex justify-content-between mb-1" style="user-select: auto;">
          <h4 class="mb-0" style="user-select: auto;">Aviator</h4>
          <div class="d-flex text-success" style="user-select: auto;">
            <!-- <p class="mb-0 me-2" style="user-select: auto;">+78.2%</p> -->
            <i class="mdi mdi-chevron-up" style="user-select: auto;"></i>
          </div>
        </div>
      </div>
      <div class="card-body" style="">
      <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

      <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      margin: 0;
      padding: 0;
      background-color: #f2f2f2;
    }
    
    h1 {
      margin-top: 20px;
      color: #333;
    }
    
    #play-area {
      position: relative;
      /* width: 400px; */
      height: 200px;
      margin: 20px auto;
      background-image: url('../../assets/img/backgrounds/space.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      border-radius: 10px;
      box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }
    #line {
    position: absolute;
    width: 2px;
    height: 200px; /* Adjust the height as needed */
    background-color: #007bff; /* Set the color of the line */
    transform: translateX(-30%) translateY(5%); /* Center the line horizontally and vertically */
    transition: transform 2s linear;
    }


    #game-container {
      position: relative;
    }
    
    #airplane {
      width: 40px;
      height: 40px;
      /* background-color: #007bff; */
      border-radius: 50%;
      position: absolute;
      top: 0;
      left: 0;
      transition: all 2s linear;
      transform-origin: center;
    }
    
    #start-btn {
      padding: 10px 20px;
      background-color: #28a745;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    
    #path {
      border-top: 2px dashed #ccc;
      position: absolute;
      top: 0;
      left: 20px;
      width: 2px;
      height: 100%;
      opacity: 0;
      transition: opacity 2s linear;
    }
    
    .path-visible #path {
      opacity: 1;
    }
    
    #labels {
      position: absolute;
      bottom: 5px;
      width: 100%;
      display: flex;
      justify-content: space-between;
      padding: 0 1px;
      font-size: 10px;
      color: #f30303;
    }
    
    .label {
      flex-grow: 1;
      text-align: center;
    }

    .active {
      font-weight: bold;
    }
    .vertical-line {
  position: absolute;
  top: 0; /* Adjust the position as needed */
  left: 50%; /* Adjust the position as needed */
  width: 2px;
  height: 100%;
  background-color: #007bff; /* Set the color of the vertical line */
}
  </style>
  <?php
$sql = "SELECT * FROM profile WHERE username = '$username' LIMIT 1";
$results = mysqli_query($conn, $sql) or die("Error fetching profile data...");
$row = mysqli_fetch_array($results);
$balance = $row['balance'];
$aviators = $row['aviators'];
$coins = $row['coins'];
$bonus = $row['bonus'];

if ($row['level'] == 0) {
   $earnings = "R2 - R5";
   $min = 2;
   $max = 5;
}

if ($row['level'] == 1) {
   $earnings = "R10 - R20";
   $min = 10;
   $max = 20;
}

if ($row['level'] == 2) {
   $earnings = "R35 - R70";
   $min = 35;
   $max = 70;
}

if ($row['level'] == 3) {
   $earnings = "R75 - R150";
   $min = 75;
   $max = 150;
}

if ($row['level'] == 4) {
   $earnings = "R160 - R320";
   $min = 160;
   $max = 320;
}

if ($row['level'] == 5) {
   $earnings = "R450 - R850";
   $min = 450;
   $max = 850;
}

if ($row['level'] == 6) {
   $earnings = "R1000 - R2000";
   $min = 1000;
   $max = 2000;
}
?>

  <div class="row">
      <div class=" col-sm-6 mb-1" style="user-select: auto;">
        <div class="card" style="user-select: auto;">
          <div class="card-body" style="user-select: auto;">
            <div class="d-flex align-items-center flex-wrap gap-2" style="user-select: auto;">
              <div class="avatar me-3" style="user-select: auto;">
                <div class="avatar-initial bg-label-primary rounded" style="user-select: auto;">
                  <i class="mdi mdi-account-outline mdi-24px" style="user-select: auto;">
                  </i>
                </div>
              </div>
              <div class="card-info" style="user-select: auto;">
                <div class="d-flex align-items-center" style="user-select: auto;">
                  <h4 class="mb-0" style="user-select: auto;">Level <?php echo $row['level'] ?></h4>
                  <i class="mdi mdi-chevron-down text-danger mdi-24px" style="user-select: auto;"></i>
                  <!-- <small class="text-danger" style="user-select: auto;">8.10%</small> -->
                </div>
                <small class="text-muted" style="user-select: auto;">You Earn From <?php echo $earnings ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class=" col-sm-6" style="user-select: auto;">
        <div class="card" style="user-select: auto;">
          <div class="card-body" style="user-select: auto;">
            <div class="d-flex align-items-center flex-wrap gap-2" style="user-select: auto;">
              <div class="avatar me-3" style="user-select: auto;">
                <div class="avatar-initial bg-label-primary rounded" style="user-select: auto;">
                  <i class="mdi mdi-watch mdi-24px" style="user-select: auto;">
                  </i>
                </div>
              </div>
              <div class="card-info" style="user-select: auto;">
                <div class="d-flex align-items-center" style="user-select: auto;">
                  <h4 class="mb-0" style="user-select: auto;" id='coundowncontent'></h4>
                  <i class="mdi mdi-chevron-down text-danger mdi-24px" style="user-select: auto;"></i>
                  <!-- <small class="text-danger" style="user-select: auto;">8.10%</small> -->
                </div>
                <small class="text-muted" style="user-select: auto;">Until you can aviate</small>
              </div>
            </div>
          </div>
        </div>
      </div>

  </div>
  <div id="play-area">
      <div id="particles-js">
    
    <div id="game-container">

        <div class="vertical-line"></div>
      <div id="airplane">
        <img src="../../assets/img/aviator.png" width="50px" alt="">
      </div>
      <div id="line"></div>
      <div id="path"></div>
    </div>
    <div id="labels">

    </div>
  </div>

  </div>
  <button id="start-btn">Start</button>
  <script>
    function getNumbers(start, end) {
    const difference = end - start;
    const step = difference / 4;
    const numbers = [];
    for (let i = 0; i < 5; i++) {
        numbers.push(start + i * step);
    }
    return numbers;
    }
    function addLabels(numbers) {
    const labelsDiv = document.getElementById("labels");
    for (const number of numbers) {
        const labelDiv = document.createElement("div");
        labelDiv.className = "labels";
        labelDiv.textContent = number;
        labelsDiv.appendChild(labelDiv);
    }
    }
    const numbers = getNumbers(<?php echo $min ?>, <?php echo $max ?>);
    addLabels(numbers);


</script>
  <script>
    window.addEventListener('DOMContentLoaded', function() {
      const airplane = document.getElementById('airplane');
      const playArea = document.getElementById('play-area');
      const line = document.getElementById('line');
      const path = document.getElementById('path');
      const startBtn = document.getElementById('start-btn');
      const labels = document.querySelectorAll('.label');
      const labelCount = labels.length;
      const labelHeight = playArea.offsetHeight / (labelCount - 1);
      const playAreaWidth = playArea.offsetWidth - airplane.offsetWidth;
      const playAreaHeight = playArea.offsetHeight - airplane.offsetHeight;
      let stopPositionX = 0;
      let stopPositionY = 0;

      startBtn.addEventListener('click', function() {
        $.get('phpajax/aviate', {}, function(data){
          console.log(data)
          if (data == 'failed1') {
            notie.alert({ type: 'error', position: 'bottom', text: 'Wait for countdown before trying again.', time: 5 });
          }
          if (data == 'failed2') {
            notie.alert({ type: 'error', position: 'bottom', text: 'Please upgrade your level to continue.', time: 5 });
          }
          if (data == 'success') {
              startBtn.disabled = true; // Disable start button once clicked
              airplane.style.top = Math.random() * playAreaHeight + 'px';
              airplane.style.left = Math.random() * playAreaWidth + 'px';
              path.classList.add('path-visible');
              stopPositionX = Math.random() * (playAreaWidth - 40) + 40;
              stopPositionY = Math.random() * (playAreaHeight - 40) + 40;
              airplane.style.top = stopPositionY + 'px';
              airplane.style.left = stopPositionX + 'px';
              line.style.transform = `translateX(${stopPositionX+25}px) translateY(${stopPositionY+15}px)`;
              setTimeout(function() {
                
              }, 1000);
            
          }
        })
      });
      
      airplane.addEventListener('transitionend', function() {
        updateLabels();
        notie.alert({ type: 1, time: 60, text: 'Congratulations<br><b>You have</b><br>Made <b><h1 class=text-white>R'+ getPositionPercentage() +'</h1></b>' })
        // alert('Position Percentage: ' + getPositionPercentage());
      });

      function updateLabels() {
        const currentPositionY = parseFloat(airplane.style.top);
        const currentPositionX = parseFloat(airplane.style.left);
        labels.forEach(function(label, index) {
          if (currentPositionY >= index * labelHeight) {
            label.classList.add('active');
          } else {
            label.classList.remove('active');
          }
        });
      }

      function getPositionPercentage() {
        const percentageX = (stopPositionX / playAreaWidth) * 100;
        const percentageY = (stopPositionY / playAreaHeight) * 100;
        percent = Math.round(Math.min(percentageX, percentageY));
        diff = <?php echo $max ?> - <?php echo $min ?>;
        const value = diff * percentageX / 100;
        amount = <?php echo $min ?> + Math.round(value * 100) / 100;
        $.get('phpajax/startaviate', {'amount': amount}, function(data){
          console.log(data);
        })
        return amount;
      }
    });
    particlesJS("particles-js", {
    particles: {
      number: { value: 50 },
      color: { value: "#58b8c1" },
      shape: { type: "star" },
      opacity: { value: 0.5 },
      size: { value: 3 },
      move: { speed: 2 },
    },
    interactivity: {
      events: {
        // onhover: { enable: true, mode: "repulse" },
      },
    },
  });
  </script>
    </div>
    </div>
  </div>
</div>
<?php 
require_once "components/footer.php";
?>
<!-- / Footer -->
<div class="content-backdrop fade"></div>
</div>