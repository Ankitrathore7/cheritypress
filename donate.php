<?php
#Connecting the database
$conn = mysqli_connect("localhost", "root", "", "oldage");



#checking that is button is clicked or not
if (isset($_POST['submit'])) {
    $amount = $_POST['amount'];
    $name = $_POST['name'];
    $query = "INSERT INTO `donate`( `amount`, `name`) VALUES ('$amount','$name')";
    try {
        $res = mysqli_query($conn, $query);
        if ($res) { #checking if it is true or not
            // echo "<h1 style='text-align:center;font-size:30px;color:blue;border:solid blue;margin-top:10px;background-color:white'>Enterd Sucessfully</h2>";
            include('donate-now.html');
            
            /*
            #Displaying Back Image
            $sel = "SELECT * FROM admin";
            $que = mysqli_query($conn, $sel);
            $output = "";
            if (mysqli_num_rows($que) < 1) {
            $output .= "<h3 class='text-center'>Phle image to Upload kr le</h3>";
            echo $output;
            }
            while ($row = mysqli_fetch_array($que)) {
            $output .= "<img src='" . $row['image'] . "' class='my-3' 
            style='width:100px;height:150px;'>";
            echo $output;
            }
            */
        }
    } catch (Exception $e) {
        // echo("<h1 style='text-align:center;font-size:30px;color:red;border:solid red;margin-top:10px;background-color:white'>Oops You Entered Same Detail</h2>") ;
        include('index.html');
    }

}
?>




<!-- payment
<?php
// Replace 'YOUR_STRIPE_SECRET_KEY' with your actual Stripe secret key
require_once('stripe-php/init.php');
\Stripe\Stripe::setApiKey('YOUR_STRIPE_SECRET_KEY');

if (isset($_POST['stripeToken'])) {
  $token = $_POST['stripeToken'];
  $amount = $_POST['amount'] * 100; // Amount in cents
  $name = $_POST['name'];

  try {
    // Create a charge using the Stripe API
    $charge = \Stripe\Charge::create(array(
      'amount' => $amount,
      'currency' => 'usd', // Replace with your currency code (e.g., 'inr' for Indian Rupees)
      'description' => 'Donation from ' . $name,
      'source' => $token,
    ));

    // Payment successful, you can display a thank you message or redirect to a thank you page
    echo 'Payment Successful! Thank you for your donation.';
  } catch (\Stripe\Exception\CardException $e) {
    // Payment failed, display an error message
    echo 'Payment Error: ' . $e->getMessage();
  }
}
?> -->
