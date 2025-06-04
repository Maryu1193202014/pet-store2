<?php
session_start();
session_destroy(); // Destroy the session to log out the user
header('refresh:0; URL=http://localhost/pet-store2/src/login.html'); // Redirect to the home page or login page