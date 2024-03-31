<?php
include('session_m.php');

if(!isset($login_session)){
header('Location: managerlogin.php'); // Redirecting To Home Page
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Reports</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Admin Reports</h1>

  <nav>
    <select id="report-type">
      <option value="user_report">User Report</option>
      <option value="order_report">Orders Count Report</option>
      <option value="user_report">Products in Stock</option>
      <option value="order_report"> Staff Report</option>
      <option value="user_report">Sales Report</option>
     <option value="user_report">Profit and Loss Report</option>
      </select>
  </nav>

  <div id="report-content">
    </div>

  <script>
    const reportTypeSelect = document.getElementById('report-type');
const reportContent = document.getElementById('report-content');

reportTypeSelect.addEventListener('change', function() {
  const selectedReport = this.value;

  // Clear any existing report content
  reportContent.innerHTML = "";

  // Load the content for the selected report using AJAX or PHP (explained later)
  fetchReportData(selectedReport);
});

function fetchReportData(reportType) {
  // Use AJAX or PHP to fetch and display the data for the selected report
  // This example uses a placeholder - replace with your implementation
  reportContent.innerHTML = "Loading report data...";
}
</script>
</body>
</html>
