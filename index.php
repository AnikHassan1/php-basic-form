<pre></pre>
<?php

// echo "hello";
?>
<style>
    .mx-auto {
        margin-left: auto;
        margin-right: auto;
    }

    .w-50 {
        width: 50%;
    }

    .mt {
        margin-top: 50px;
    }
</style>

<?php

if (isset($_POST["submit"])) {
    // value recived
    $fname = $_POST["Fast_name"];
    $lname = $_POST["Last_name"];
    $email = $_POST["email"];
    $District =$_POST["District"];
    // file upload
    $file =$_FILES["file"];

    $file_name =$file["name"];
    $file_Tabname = $file["tmp_name"];

   $explodeArray = explode('.',$file_name);

   $extension=end( $explodeArray);
   $name = time().".". $extension;
//condition
   if(in_array( $extension,['jpeg','jpg','png'])==true){
    move_uploaded_file( $file_Tabname,'Upload/'.$name);
   }else{
    echo " Please submit your img jpeg or png";
   }

    
}
echo "<pre>";
print_r( $file);
// empty check
if (empty($fname) || empty($lname) || empty($email)) {
    echo "Field is requier";
} elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
    echo ("Email not requier");
} else {
    echo ("ok");
}
// print_r( $District);
?>

<div class="mx-auto w-50 mt">
    <form action="" method="POST"enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="Fast_name">Fast Name :</label></td>
                <td><input type="text" name="Fast_name" id="Fast_name"></td>
            </tr>
            <tr>
                <td><label for="Last_name">Last Name :</label></td>
                <td><input type="text" name="Last_name" id="Last_name"></td>
            </tr>
            <tr>
                <td><label for="email">Email :</label></td>
                <td><input type="text" name="email" id="email"></td>
            </tr>

            <tr>
                <td><label for="District">District :</label></td>
                <td><select name="District" >
                    <option value="">-select-</option>
                    <option value="Brahmonbaria">Brahmonbaria</option>
                    <option value="Cumilla">Cumilla</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Habiganj">Habiganj</option>
                </select></td>
            </tr>

            <tr>
                <td><label >File Upload :</label></td>
                <td><input type="file" name="file" ></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="submit"></td>
            </tr>
        </table>
    </form>
</div>