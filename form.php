<?php																																										

#Connecting the database
$conn = mysqli_connect("localhost", "root", "", "oldage");



#checking that is button is clicked or not
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $number = $_POST['number'];
    $query = "INSERT INTO `volunteer`( `name`, `email`, `city`, `number`) VALUES ('$name','$email','$city','$number')";
    try {
        $res = mysqli_query($conn, $query);
        if ($res) { #checking if it is true or not
            // echo "<h1 style='text-align:center;font-size:30px;color:blue;border:solid blue;margin-top:10px;background-color:white'>Enterd Sucessfully</h2>";
            include('index.html');
            
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