<html>
<head>

<link rel="stylesheet" href="estilos\menor.css"> <!-- css de la forma -->
<style>
body{background-image:url(imagenes/fondo_une.jpg)}
</style>
</head>

<body>
<center><h3>Backup de la base de datos</h3></center>
</body>
<?php

define("DB_USER", 'root'); //Nombre del usuario
define("DB_PASSWORD", ''); //Clave de la base de datos
define("DB_NAME", 'prueba'); //Nombre de la base de datos
define("DB_HOST", 'localhost'); //Servidor
define("BACKUP_DIR", 'backups'); // Comenta la linea si quieres que se guarde en la misma carpeta donde estan los archivos y no en la carpeta backups ('.')
define("TABLES", '*'); // El backup es entero
//define("TABLES", 'table1, table2, table3'); // Si quieres guardar unas tablas, coloca los nombres alli
define("CHARSET", 'utf8');
define("GZIP_BACKUP_FILE", false); // Como esta en false, se guarda en sql y no gzip
define("BATCH_SIZE", 1000); // Maximo tamano en kilobytes para seleccionar filas, con 1000 solo se usara 1 megabute
                            // Tambien dice el numero de filas por insert, aqui serian 1000
/**
 * La clase del backup
 */
class Backup_Database {
    /**
     * Host de la base de datos
     */
    var $host;
    /**
     * Nombre de usuario
     */
    var $username;
    /**
     * Clave para conectarse
     */
    var $passwd;
    /**
     * Nombre de la base de datos
     */
    var $dbName;
    /**
     * Tipo de chars de la base de datos
     */
    var $charset;
    /**
     * Conexion a la base de datos
     */
    var $conn;
    /**
     * Directorio de las copias
     */
    var $backupDir;
    /**
     * Output y su nombre
     */
    var $backupFile;
    /**
     * Comprimir a gzip si se quiere
     */
    var $gzipBackupFile;
    /**
     * Contenido del output
     */
    var $output;
    /**
     * Tamano size y numero de registros
     */
    var $batchSize;
    /**
     * Initializador de la base de datos
     */
    public function __construct($host, $username, $passwd, $dbName, $charset = 'utf8') {
        $this->host            = $host;
        $this->username        = $username;
        $this->passwd          = $passwd;
        $this->dbName          = $dbName;
        $this->charset         = $charset;
        $this->conn            = $this->initializeDatabase();
        $this->backupDir       = BACKUP_DIR ? BACKUP_DIR : '.';
        $this->backupFile      = 'myphp-backup-'.$this->dbName.'-'.date("Ymd_His", time()).'.sql';
        $this->gzipBackupFile  = defined('GZIP_BACKUP_FILE') ? GZIP_BACKUP_FILE : true;
        $this->batchSize       = defined('BATCH_SIZE') ? BATCH_SIZE : 1000; // Por default son 1000 filas
        $this->output          = '';
    }
    protected function initializeDatabase() {
        try {
            $conn = mysqli_connect($this->host, $this->username, $this->passwd, $this->dbName);
            if (mysqli_connect_errno()) {
                throw new Exception('ERROR connecting database: ' . mysqli_connect_error());
                die();
            }
            if (!mysqli_set_charset($conn, $this->charset)) {
                mysqli_query($conn, 'SET NAMES '.$this->charset);
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
            die();
        }
        return $conn;
    }
    /**
     * Copia toda la base de datos o unas tablas
     * Usa '*' para toda la base de datos o 'table1 table2 table3...' para copiar unas tablas
     * @param string $tables
     */
    public function backupTables($tables = '*') {
        try {
            /**
            * Exportar tablas
            */
            if($tables == '*') {
                $tables = array();
                $result = mysqli_query($this->conn, 'SHOW TABLES');
                while($row = mysqli_fetch_row($result)) {
                    $tables[] = $row[0];
                }
            } else {
                $tables = is_array($tables) ? $tables : explode(',', str_replace(' ', '', $tables));
            }
            $sql = 'CREATE DATABASE IF NOT EXISTS `'.$this->dbName."`;\n\n";
            $sql .= 'USE `'.$this->dbName."`;\n\n";
            /**
            * Iterar tablas
            */
            foreach($tables as $table) {
                $this->obfPrint("Respaldando la tabla: `".$table."` table...".str_repeat('.', 50-strlen($table)), 0, 0);
                /**
                 * Crear tabla si no existe
                 */
                $sql .= 'DROP TABLE IF EXISTS `'.$table.'`;';
                $row = mysqli_fetch_row(mysqli_query($this->conn, 'SHOW CREATE TABLE `'.$table.'`'));
                $sql .= "\n\n".$row[1].";\n\n";
                /**
                 * Insertar el comando
                 */
                $row = mysqli_fetch_row(mysqli_query($this->conn, 'SELECT COUNT(*) FROM `'.$table.'`'));
                $numRows = $row[0];
                // Partir la tabla en partes para no gastar mucha RAM
                $numBatches = intval($numRows / $this->batchSize) + 1; // Numero de while loops
                for ($b = 1; $b <= $numBatches; $b++) {
                    
                    $query = 'SELECT * FROM `' . $table . '` LIMIT ' . ($b * $this->batchSize - $this->batchSize) . ',' . $this->batchSize;
                    $result = mysqli_query($this->conn, $query);
                    $realBatchSize = mysqli_num_rows ($result); // Last batch size can be different from $this->batchSize
                    $numFields = mysqli_num_fields($result);
                    if ($realBatchSize !== 0) {
                        $sql .= 'INSERT INTO `'.$table.'` VALUES ';
                        for ($i = 0; $i < $numFields; $i++) {
                            $rowCount = 1;
                            while($row = mysqli_fetch_row($result)) {
                                $sql.='(';
                                for($j=0; $j<$numFields; $j++) {
                                    if (isset($row[$j])) {
                                        $row[$j] = addslashes($row[$j]);
                                        $row[$j] = str_replace("\n","\\n",$row[$j]);
                                        $sql .= '"'.$row[$j].'"' ;
                                    } else {
                                        $sql.= 'NULL';
                                    }
    
                                    if ($j < ($numFields-1)) {
                                        $sql .= ',';
                                    }
                                }
    
                                if ($rowCount == $realBatchSize) {
                                    $rowCount = 0;
                                    $sql.= ");\n"; //close the insert statement
                                } else {
                                    $sql.= "),\n"; //close the row
                                }
    
                                $rowCount++;
                            }
                        }
    
                        $this->saveFile($sql);
                        $sql = '';
                    }
                }
                /**
                 * CREAR LO QUE OBTIENE LOS DATOS, EL TRIGGER
                 */
                // Check if there are some TRIGGERS associated to the table
                /*$query = "SHOW TRIGGERS LIKE '" . $table . "%'";
                $result = mysqli_query ($this->conn, $query);
                if ($result) {
                    $triggers = array();
                    while ($trigger = mysqli_fetch_row ($result)) {
                        $triggers[] = $trigger[0];
                    }
                    
                    // Iterate through triggers of the table
                    foreach ( $triggers as $trigger ) {
                        $query= 'SHOW CREATE TRIGGER `' . $trigger . '`';
                        $result = mysqli_fetch_array (mysqli_query ($this->conn, $query));
                        $sql.= "\nDROP TRIGGER IF EXISTS `" . $trigger . "`;\n";
                        $sql.= "DELIMITER $$\n" . $result[2] . "$$\n\nDELIMITER ;\n";
                    }
                    $sql.= "\n";
                    $this->saveFile($sql);
                    $sql = '';
                }*/
 
                $sql.="\n\n\n";
                $this->obfPrint('OK');
            }
            if ($this->gzipBackupFile) {
                $this->gzipBackupFile();
            } else {
                $this->obfPrint('Se hizo el respaldo en: ' . $this->backupDir.'/'.$this->backupFile, 1, 1);
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
            return false;
        }
        return true;
    }
    /**
     * Salvar el archivo sql
     * @param string $sql
     */
    protected function saveFile(&$sql) {
        if (!$sql) return false;
        try {
            if (!file_exists($this->backupDir)) {
                mkdir($this->backupDir, 0777, true);
            }
            file_put_contents($this->backupDir.'/'.$this->backupFile, $sql, FILE_APPEND | LOCK_EX);
        } catch (Exception $e) {
            print_r($e->getMessage());
            return false;
        }
        return true;
    }
    /*
     * Salvar el archivo gzip
     *
     * @param integer $level GZIP compression level (default: 9)
     * @return string New filename (with .gz appended) if success, or false if operation fails
     */
    protected function gzipBackupFile($level = 9) {
        if (!$this->gzipBackupFile) {
            return true;
        }
        $source = $this->backupDir . '/' . $this->backupFile;
        $dest =  $source . '.gz';
        $this->obfPrint('Haciendo el respaldo gzip en: ' . $dest . '... ', 1, 0);
        $mode = 'wb' . $level;
        if ($fpOut = gzopen($dest, $mode)) {
            if ($fpIn = fopen($source,'rb')) {
                while (!feof($fpIn)) {
                    gzwrite($fpOut, fread($fpIn, 1024 * 256));
                }
                fclose($fpIn);
            } else {
                return false;
            }
            gzclose($fpOut);
            if(!unlink($source)) {
                return false;
            }
        } else {
            return false;
        }
        
        $this->obfPrint('OK');
        return $dest;
    }
    /**
     * Manda el mensaje
     *
     */
    public function obfPrint ($msg = '', $lineBreaksBefore = 0, $lineBreaksAfter = 1) {
        if (!$msg) {
            return false;
        }
        if ($msg != 'OK' and $msg != 'KO') {
            $msg = date("Y-m-d H:i:s") . ' - ' . $msg;
        }
        $output = '';
        if (php_sapi_name() != "cli") {
            $lineBreak = "<br />";
        } else {
            $lineBreak = "\n";
        }
        if ($lineBreaksBefore > 0) {
            for ($i = 1; $i <= $lineBreaksBefore; $i++) {
                $output .= $lineBreak;
            }                
        }
        $output .= $msg;
        if ($lineBreaksAfter > 0) {
            for ($i = 1; $i <= $lineBreaksAfter; $i++) {
                $output .= $lineBreak;
            }                
        }
        // Salvar el output
        $this->output .= str_replace('<br />', '\n', $output);
        echo $output;
        if (php_sapi_name() != "cli") {
            ob_flush();
        }
        $this->output .= " ";
        flush();
    }
    /**
     * Regresa y muestra el output
     *
     */
    public function getOutput() {
        return $this->output;
    }
}
/**
 * Iniciar el proceso
 */
// Reportar errores
error_reporting(E_ALL);
// Tiempo maximo en que dura el backup
set_time_limit(900); // 15 minutos, es decir 900 segundos
if (php_sapi_name() != "cli") {
    echo '<div style="font-family: Arial, Helvetica, sans-serif;">';
}
$backupDatabase = new Backup_Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, CHARSET);
$result = $backupDatabase->backupTables(TABLES, BACKUP_DIR) ? 'OK' : 'KO';
$backupDatabase->obfPrint('Resultado: ' . $result, 1);

$output = $backupDatabase->getOutput();
if (php_sapi_name() != "cli") {
    echo '</div>';
}

?>
</html>