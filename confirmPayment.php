<!DOCTYPE html>
<html>

<head>
  <title>Confirm Payment</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <h1>Confirm Payment</h1>
    <p>Please confirm your payment details:</p>
    <form action="process_payment.php" method="post">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="amount">Amount:</label>
        <input type="number" name="amount" id="amount" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Confirm Payment</button>
    </form>
  </div>
</body>

</html>