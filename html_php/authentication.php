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