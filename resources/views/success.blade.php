<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
</head>
<body>
    <div style="text-align: center; margin-top: 50px;">
        <h1>Payment Successful!</h1>
        <p>Thank you for your purchase.</p>
        <!-- You can customize this page as needed for your application -->

        <!-- Add a button to redirect to home.blade.php -->
        <a href="{{ url('/') }}">
            <button>Go to Home</button>
        </a>
    </div>
</body>
</html>
