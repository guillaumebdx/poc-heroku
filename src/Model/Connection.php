<?php
/**
 * Database connection
 *
 *
 *
 * @author adapted from Benjamin Besse
 *
 * @link   http://fr3.php.net/manual/fr/book.pdo.php classe PDO
 */

namespace App\Model;

use \PDO;

/**
 *
 * This class only make a PDO object instanciation. Use it as below :
 *
 * <pre>
 *  $db = new Connection();
 *  $conn = $db->getPdoConnection();
 * </pre>
 */
class Connection
{
    /**
     * @var PDO
     *
     * @access private
     */
    private $pdoConnection;

    /**
     * Initialize connection
     *
     * @access public
     */
    public function __construct()
    {
        try {
            $this->pdoConnection = new PDO(
                'mysql:host=eu-cdbr-west-02.cleardb.net; dbname=heroku_b4c3acd154fa66e; charset=utf8',
                'b006282433a5aa',
                'a38386ba'
            );

            $this->pdoConnection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            // show errors in DEV environment
            if (APP_DEV) {
                $this->pdoConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (\PDOException $e) {
            echo('<div class="error">Error !: ' . $e->getMessage() . '</div>');
        }
    }


    /**
     * @return PDO $pdo
     */
    public function getPdoConnection(): PDO
    {
        return $this->pdoConnection;
    }
}
