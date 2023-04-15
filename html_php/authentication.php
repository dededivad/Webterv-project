<?php
// Function responsible for loading registered users from a file

function loadUsers($path) {
    $users = [];                  // This array will contain the registered users

    $file = fopen($path, "r");    // Open file for reading
    if ($file === FALSE)          // Error handling
        die("HIBA: A fájl megnyitása nem sikerült! 1");

    while (($line = fgets($file)) !== FALSE) {  // Read file line by line
        $user = unserialize($line);  // Deserialize the line (convert it back into an associative array representing the user)
        $users[] = $user;            // Add the user to the array of registered users
    }

    fclose($file);
    return $users;                 // Return the 2D array containing the users
}

// Function responsible for writing the data of registered users to a file

function saveUsers($path, $users) {
    $file = fopen($path, "w");    // Open file for writing
    if ($file === FALSE)          // Error handling
        die("HIBA: A fájl megnyitása nem sikerült! 2");

    foreach($users as $user) {    // Loop through the array of registered users
        $serialized_user = serialize($user);      // Convert the user into serialized format
        fwrite($file, $serialized_user . "\n");   // Write the serialized data to the output file
    }

    fclose($file);
}

function uploadProfilePicture($username) {
    global $file_upload_error;
    //error_log("ez lefut? 1");
    //error_log($username);
    //print_r($GLOBALS);
    //print_r($_FILES);
    if (isset($_FILES["profile_pic"]) && is_uploaded_file($_FILES["profile_pic"]["tmp_name"])) {
        //error_log("ez lefut? 2");
        $allowed_extensions = ["png", "jpg", "jpeg"];
        $extension = strtolower(pathinfo($_FILES["profile_pic"]["name"], PATHINFO_EXTENSION));
        if (in_array($extension, $allowed_extensions)) {
            //error_log("ez lefut? 3" . $extension. $_FILES["profile_pic"]["name"]);
            if ($_FILES["profile_pic"]["error"] === 0) {
                //error_log("ez lefut? 4");
                if ($_FILES["profile_pic"]["size"] <= 31457280) {
                    //error_log("ez lefut? 5");
                    $path = "../profile_pics/" . $username . "." . $extension;

                    if (!move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $path)) {
                        $file_upload_error = "A fájl átmozgatása nem sikerült!";
                    }
                } else {
                    $file_upload_error = "A fájl mérete túl nagy!";
                }
            } else {
                $file_upload_error = "A fájlfeltöltés nem sikerült!";
            }
        } else {
            $file_upload_error = "A fájl kiterjesztése nem megfelelő!";
        }
    }
}