<!--   Core JS Files   -->
  <script src="../../assets/js/core/popper.min.js"></script>
  <script src="../../assets/js/core/bootstrap.min.js"></script>
  <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../../assets/js/plugins/choices.min.js"></script>
  <script src="../../assets/js/plugins/datatables.js"></script>
  <!-- Kanban scripts -->
  <script src="../../assets/js/plugins/dragula/dragula.min.js"></script>
  <script src="../../assets/js/plugins/jkanban/jkanban.js"></script>
  <script src="../../assets/js/plugins/countup.min.js"></script>
  <script src="../../assets/js/plugins/chartjs.min.js"></script>
  <script src="../../assets/js/plugins/round-slider.min.js"></script>

  
  <script>
    
  // Function to update the date and time
  function updateDateTime() {
    var currentDate = new Date();
    var formattedDateTime =
      ('0' + currentDate.getDate()).slice(-2) + '-' +
      ('0' + (currentDate.getMonth() + 1)).slice(-2) + '-' +
      currentDate.getFullYear() + ' ' +
      ('0' + currentDate.getHours()).slice(-2) + ':' +
      ('0' + currentDate.getMinutes()).slice(-2) + ':' +
      ('0' + currentDate.getSeconds()).slice(-2);

    document.getElementById('dateTimeContainer').innerHTML = formattedDateTime;
  }

  // Update the date and time every second
  setInterval(updateDateTime, 1000);

  // Initial call to set the initial date and time
  updateDateTime();

  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    };
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
