<?php
function loadUsers($path) {
    $users = [];  // user arrays

    $file = fopen($path, "r");
    if ($file === FALSE) //ijj itt lesz e error leci ne
        die("HIBA: A fájl megnyitása nem sikerült! 1");

    while (($line = fgets($file)) !== FALSE) {  // Read file line by line
        $user = unserialize($line);
        $users[] = $user;// add the user to an array which contains the registered users
    }

    fclose($file);
    return $users;
}

// datawriting

function saveUsers($path, $users) {
    $file = fopen($path, "w");
    if ($file === FALSE) //ijj itt lesz e error leci ne
        die("HIBA: A fájl megnyitása nem sikerült! 2");

    foreach($users as $user) {
        $serialized_user = serialize($user); //previously deserialised data converted back to serialised data, so we can store it
        fwrite($file, $serialized_user . "\n");
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
function removeLineFromFile($filename, $lineToRemove) {
    $contents = file_get_contents($filename);
    $contents = str_replace($lineToRemove, '', $contents);
    file_put_contents($filename, $contents);
}
