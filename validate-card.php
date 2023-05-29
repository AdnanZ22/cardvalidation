<?php
session_start();

$cardNumber = $_POST["cardNumber"];
$expirationMonth = $_POST["expirationMonth"];
$expirationYear = $_POST["expirationYear"];
$cvv = $_POST["cvv"];

$isValid = validateCard($cardNumber, $expirationMonth, $expirationYear, $cvv);

if ($isValid) {
  echo "<script>alert('Card is valid.')</script>";
} else {
  echo "<script>alert('Card is invalid.')</script>";
}

function validateCard($cardNumber, $expirationMonth, $expirationYear, $cvv) {
  if (strlen($cardNumber) < 16 || strlen($cardNumber) > 19) {
    return false;
  }

  if (strlen($cvv) !== 3 && !(substr($cardNumber, 0, 2) === "34" || substr($cardNumber, 0, 2) === "37")) {
    return false;
  }

  $currentDate = new DateTime();
  $expirationDate = DateTime::createFromFormat('Y-m', "$expirationYear-$expirationMonth");
  
  if ($expirationDate === false || $expirationDate <= $currentDate) {
    return false;
  }

  if (substr($cardNumber, 0, 2) === "34" || substr($cardNumber, 0, 2) === "37") {
    return strlen($cvv) === 4;
  } else {
    return strlen($cvv) === 3;
  }
}
