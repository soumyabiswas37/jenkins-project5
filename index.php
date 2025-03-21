<?php
// Get the system time
$system_time = date('Y-m-d H:i:s');

// Get the private IP address of the server
$private_ip = $_SERVER['SERVER_ADDR']; // This will give the internal IP address
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>System Information</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      color: #333;
      text-align: center;
      padding: 50px;
    }

    h1 {
      color: #4CAF50;
    }

    .container {
      background-color: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
      display: inline-block;
    }

    .time, .ip-address {
      font-size: 24px;
      margin: 15px 0;
    }

    .refresh-btn {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    .refresh-btn:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>System Information</h1>
    <div class="time">
      <strong>System Time:</strong> <span><?php echo $system_time; ?></span>
    </div>
    <div class="ip-address">
      <strong>Private IP Address:</strong> <span><?php echo $private_ip; ?></span>
    </div>
    <button class="refresh-btn" onclick="window.location.reload();">Refresh</button>
  </div>

</body>
</html>