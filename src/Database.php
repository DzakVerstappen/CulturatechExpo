<?php
  class Database {
      private $host;
      private $db_name;
      private $username;
      private $password;
      private $charset;
      private $conn;
      private $environment;

      public function __construct() {
          $config = require _DIR_ . '/../config/config.php';
          $dbConfig = require _DIR_ . '/../config/database.php';

          $this->environment = $config['environment'];

          if ($config['display_errors']) {
              ini_set('display_errors', 1);
              ini_set('display_startup_errors', 1);
              error_reporting($config['error_reporting']);
          }

          date_default_timezone_set($config['timezone']);

          $this->loadDatabaseConfig($dbConfig[$this->environment]);
      }

      private function loadDatabaseConfig($config) {
          $this->host = $config['host'];
          $this->db_name = $config['db_name'];
          $this->username = $config['username'];
          $this->password = $config['password'];
          $this->charset = $config['charset'];
      }

      public function getConnection() {
          try {
              $dsn = "mysql:host=" . $this->host .
                    ";dbname=" . $this->db_name .
                    ";charset=" . $this->charset;

              $this->conn = new PDO($dsn, $this->username, $this->password, [
                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                  PDO::ATTR_EMULATE_PREPARES => false,
                  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                  PDO::ATTR_PERSISTENT => true
              ]);

              return $this->conn;

          } catch(PDOException $e) {
              $this->logError($e);

              if ($this->environment === 'production') {
                  throw new Exception('Connection failed. Please try again later.');
              } else {
                  throw new Exception($e->getMessage());
              }
          }
      }

      private function logError($exception) {
          $logMessage = date('Y-m-d H:i:s') . ' - Error: ' . $exception->getMessage() .
                      ' in ' . $exception->getFile() . ' on line ' . $exception->getLine() . PHP_EOL;

          error_log($logMessage, 3, _DIR_ . '/../logs/database.log');
      }

      public function closeConnection() {
          $this->conn = null;
      }

      public function executeQuery($sql, $params = []) {
          try {
              $stmt = $this->conn->prepare($sql);
              $stmt->execute($params);
              return $stmt;
          } catch(PDOException $e) {
              $this->logError($e);
              throw new Exception($this->environment === 'production'
                  ? 'Query execution failed.'
                  : $e->getMessage());
          }
      }
  }
?>