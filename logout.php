<?php
session_start();
unset($_SESSION['Pseudo']);
unset($_SESSION['ID']);
unset($_SESSION['is_admin']);
session_destroy();
header('Location: https://lefevre.simplon-charleville.fr/BSF/');