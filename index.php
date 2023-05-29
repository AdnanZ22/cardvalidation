<!DOCTYPE html>
<html>
  <head>
    <title>Credit Card Validation System</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
    <div class="container">
      <h1>Credit Card Validation System</h1>
      <form id="payment-form" action="validate-card.php" method="POST">
        <label for="card-number">Card Number:</label>
        <input
          name="cardNumber"
          type="text"
          id="card-number"
          placeholder="XXXX XXXX XXXX XXXX"
          required
        />

        <label for="expiry-date">Expiry Date:</label>
        <div id="expiry-date">
          <select name="expirationMonth" required>
            <option value="" disabled selected>Month</option>
            <?php
              for ($month = 1; $month <= 12; $month++) {
                $monthValue = str_pad($month, 2, '0', STR_PAD_LEFT);
                echo "<option value=\"$monthValue\">$monthValue</option>";
              }
            ?>
          </select>

          <select name="expirationYear" required>
            <option value="" disabled selected>Year</option>
            <?php
              $currentYear = date("Y");
              for ($year = $currentYear; $year <= $currentYear + 10; $year++) {
                echo "<option value=\"$year\">$year</option>";
              }
            ?>
          </select>
        </div>

        <label for="cvv">CVV:</label>
        <input name="cvv" type="text" id="cvv" required />

        <button type="submit" name="submitPayment">Submit</button>
      </form>
    </div>
  </body>
</html>
