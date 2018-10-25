<?php
// database variables

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "achievementhound";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT user_fname, user_lname,user_email,user_phone  FROM tbl_user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data= '';
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $line = '';
        
            foreach( $row as $value )
            {                                            
                if ( ( !isset( $value ) ) || ( $value == "" ) )
                {
                    $value = "\t";
                }
                else
                {
                    $value = str_replace( '"' , '""' , $value );
                    $value = '"' . $value . '"' . "\t";
                }
                $line .= $value;
            }
            $data .= trim( $line ) . "\n";
    }
} else {
    echo "0 results";
}
$data = str_replace( "\r" , "" , $data );

if ( $data == "" )
{
    $data = "\n(0) Records Found!\n";                        
}

header("Content-type: application/octet-stream");
//header("Content-Disposition: attachment; filename=testReport.csv");
header("Pragma: no-cache");
header("Expires: 0");
$csv_filename="testReport.csv";
$fd = fopen ($csv_filename, "w");
fputs($fd, $data);
fclose($fd);

$conn->close();
