<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
	header('Location:login.php');
	exit;
}
// Check existence of id parameter before processing further
if(isset($_GET["idn"]) && !empty(trim($_GET["idn"]))){
    // Include config file
    require_once "conex.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM nodo WHERE idn = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["idn"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $luz = $row["luz"];
                $humedad_t = $row["humedad_t"];
                $humedad_am = $row["humedad_am"];
                $nivel_a = $row["nivel_a"];
                $Fecha = $row["Fecha"];
                $tipo_h = $row["tipo_h"];               
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: errornodo.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: errornodo.php");
    exit();
}
?>