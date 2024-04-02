<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Purchase</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333333;
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 20px;
            color: #666666;
        }
        .thank-you {
            background-color: #f3f3f3;
            padding: 20px;
            border-radius: 5px;
        }
        .thank-you h2 {
            color: #333333;
            margin-bottom: 10px;
        }
        .thank-you p {
            margin-bottom: 10px;
        }
        .signature {
            margin-top: 20px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thank You for Your Purchase {{ $user->first_name }}!</h1>
        <p>We are thrilled to confirm that your order has been successfully placed. Your items will be shipped shortly.</p>
        <p>If you have any questions or concerns regarding your order, please feel free to contact our customer support team.</p>
        <p class="signature">Best regards,<br>Connect-it!</p>
    </div>
</body>
</html>
