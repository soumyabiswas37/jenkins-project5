<?php
// Get the system time
$system_time = date('Y-m-d H:i:s');

// Fetch the public IP address from the EC2 metadata service
$public_ip = file_get_contents('http://169.254.169.254/latest/meta-data/public-ipv4');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EC2 Instance Info</title>
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
    <h1>EC2 Instance Information</h1>
    <div class="time">
      <strong>System Time:</strong> <span><?php echo $system_time; ?></span>
    </div>
    <div class="ip-address">
      <strong>Public IP Address:</strong> <span><?php echo $public_ip; ?></span>
    </div>
    <button class="refresh-btn" onclick="window.location.reload();">Refresh</button>
  </div>

</body>
</html>