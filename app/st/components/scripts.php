      <!-- Core JS -->
      <!-- build:js assets/vendor/js/core.js -->
      <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
      <script src="../../assets/vendor/libs/popper/popper.js"></script>
      <script src="../../assets/vendor/js/bootstrap.js"></script>
      <script src="../../assets/vendor/libs/perfect-/perfect-scrollbar.a3.de"></script>
      <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
      <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
      <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
      <script src="../../assets/vendor/libs/typeahead-js/typeahead.a7.delaye"></script>
      <script src="../../assets/vendor/js/menu.js"></script>
      <!-- endbuild -->
      <!-- Vendors JS -->
      <script src="../../assets/vendor/libs/datatabl/datatables-bootstrap5.a"></script>
      <script src="../../assets/vendor/libs/apex-charts/apexcharts.aa.delaye"></script>
      <script src="../../assets/vendor/libs/swiper/swiper.js"></script>
      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Saira:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">
      <!-- Main JS -->
      <script src="../../assets/js/main.js"></script>
      <!-- Page JS -->
      <script src="../../assets/js/dashboards-crm.js"></script>
      <script src="https://unpkg.com/notie"></script>
      <script>
      function copyLink() {
            /* Get the text field */
            var copyText = document.getElementById("link");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /*For mobile devices*/

            /* Copy the text inside the text field */
            document.execCommand("copy");

            /* Alert the copied text */
            notie.alert({ type: 'success', position: 'bottom', text: 'Referral link successfully copied!', time: 5 });
      }
         setInterval(() => {
            $("#coundowncontent").load('content/subcontent/countdown.php')
         }, 1000);
      function deposit() {
            amount = $('#depamount').val();
            $.get('phpajax/deposit', {'amount': amount}, function(data){
                  console.log(data);
                  if (data == 'failed1') {
                        notie.alert({ type: 'error', position: 'bottom', text: 'Minimum deposit is R150', time: 5 });
                  }else{
                        window.location.href = 'deposit';
                  }
            })
      }
      function pair(){
            amount = $('#pairamount').val();
            $.get('phpajax/pair', {'amount': amount}, function(data){
                  console.log(data);
                  if (data == 'failed1') {
                        notie.alert({ type: 'error', position: 'bottom', text: 'You cannot be paired with anyone at the moment, please deposit through admin or try again later.', time: 10 });
                  }
                  if (data == 'failed2') {
                        notie.alert({ type: 'error', position: 'bottom', text: 'Minimum deposit is R150', time: 10 });
                  }
                  if (data == 'success1') {
                        notie.force({
                        type: 3,
                        text: 'The amount you were searching for is not available, however you were partially paired for the available amount.',
                        buttonText: 'Continue to manage coins',
                        callback: () => redirectt()
                        })
                  }
                  if (data == 'success') {
                        // notie.alert({ type: 'error', position: 'bottom', text: 'Pairing complete, pairing details will be displayed in the next page. Please take your time and check as you can be paired to more than 1 users. <br> <a href=boughtcoins >Continue </a>', time: 100 });
                        notie.force({
                        type: 3,
                        text: 'Pairing complete, pairing details will be displayed in the next page. Please take your time and check as you can be paired to more than 1 users. You can access this later by going to manage coins then bought coins.',
                        buttonText: 'Continue to manage coins',
                        callback: () => redirectt()
                        })
                  }
            })
      }
      function redirectt() {
            window.location.href='boughtcoins';
      }
      function acceptRequest(id){
            notie.confirm({
            text: 'Accept this request? After accepting the buyer will be able to view your banking details and make payment.',
            submitCallback: () => this.location.href = 'soldcoins?acceptid='+id
            })
      }
      function declineRequest(id){
            notie.confirm({
            text: 'The user will not be able to purchase this coins from you.',
            submitCallback: () => this.location.href = 'soldcoins?declineid='+id
            })
      }
      function approvePayment(id){
            notie.confirm({
            text: 'Have this person paid money into your bank account?',
            submitCallback: () => this.location.href = 'soldcoins?approveid='+id
            })
      }
      document.getElementById('withfee').addEventListener('input', function(e) {
      var withFee = e.target.value;
      var withoutFee = withFee - (withFee * 0.15);
      document.getElementById('withoutfee').value = withoutFee.toFixed(2);
      });

      function selltoadmin(){
            amount = $('#withoutfee').val();
            amountfee = $('#withfee').val();

            $.get('phpajax/withdrawal', {'amount': amountfee, 'amountfee': amount}, function(data){
                  console.log(data);
                  if (data == 'failed1') {
                        notie.alert({ type: 'error', position: 'bottom', text: 'You cannot withdraw more than the coins you have.', time: 10 });
                  }
                  if (data == 'failed2') {
                        notie.alert({ type: 'error', position: 'bottom', text: 'Minimum Withdrawal is 150 coins', time: 10 });
                  }
                  if (data == 'failed3') {
                        notie.alert({ type: 'error', position: 'bottom', text: 'Please update your banking details', time: 10 });
                  }
                  if (data == 'failed4') {
                        notie.alert({ type: 'error', position: 'bottom', text: 'Some fields are empty', time: 10 });
                  }
                  if (data == 'success') {
                        window.location.href = 'history'
                  }
            })
      }

      function withdraw() {
            amount = $('#wamount').val();
            // amountfee = $('#withfee').val();

            $.get('phpajax/withdrawalp2p', {'amount': amount}, function(data){
                  if (data == 'failed1') {
                        notie.alert({ type: 'error', position: 'bottom', text: 'You cannot withdraw more than the coins you have.', time: 10 });
                  }
                  if (data == 'failed2') {
                        notie.alert({ type: 'error', position: 'bottom', text: 'Minimum Withdrawal is 150 coins', time: 10 });
                  }
                  if (data == 'failed3') {
                        notie.alert({ type: 'error', position: 'bottom', text: 'Please update your banking details', time: 10 });
                  }
                  if (data == 'failed4') {
                        notie.alert({ type: 'error', position: 'bottom', text: 'Some fields are empty', time: 10 });
                  }
                  if (data == 'success') {
                        window.location.href = 'history'
                  }
            })
      }


      </script>