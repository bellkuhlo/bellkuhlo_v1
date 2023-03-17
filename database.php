<?php
// config/database.php

require_once __DIR__ . '/config.php';

use core\database\Connection;

// Erstellen einer neuen Datenbankverbindung
$dbConnection = Connection::make(DB_HOST, DB_PORT, DB_NAME, DB_USER, DB_PASSWORD);
