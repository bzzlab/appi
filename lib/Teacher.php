<?php
/**
 * Created by PhpStorm.
 * User: dgar
 * Date: 8/6/2018
 * Time: 2:19 PM
 */

require_once(__DIR__ . '/CookieIO.php');
require_once(__DIR__ . '/SessionIO.php');
require_once(__DIR__ . '/Konstanten.php');
require_once(__DIR__ . '/SiteURL.php');

class Teacher {

    const ENTITY_ID = "lp";
    const SUBMIT_VAL = "Continue";
    const SUBMIT_ID = "contStep01";


    private $site = null;
    private $sessionIO = null;
    private $cookieIO = null;

    /**
     * constructor.
     */
    public function __construct()
    {
        $this->site = new SiteURL();
        $this->sessionIO = new SessionIO();
        $this->cookieIO = new CookieIO();
        //hardcoded because at the moment only one teacher
        $this->setSessionValue("lp02");
        $this->setCookieValue("lp02");
    }

    public function setSessionValue($value){
        $this->sessionIO->set(self::ENTITY_ID, $value);
    }

    /**
     * Return allowed values as an array
     * @return array
     */
    public function getAllowedValues():array {
        return array("lp01","lp02");
    }

    public function getSessionValue(){
        return $this->sessionIO->get(self::ENTITY_ID);
    }

    public function setCookieValue($value){
        $this->cookieIO->setCookie(self::ENTITY_ID, $value);
    }

    public function getCookieValue(){
        return $this->cookieIO->getCookie(self::ENTITY_ID);
    }


    /**
     * Process data from the input form
     */
    public function processForm()
    {
        if (isset($_POST[self::ENTITY_ID])) {
            $this->setSessionValue($_POST[self::ENTITY_ID]);
        }
    }

    /**
     * Determine the physical path to the specific teacher (lp)
     * @param $file - path to be edited
     * @param $lp - teachercode lp01,lp02, ...
     * @param $sem - module (as semester) m152, m150, m254 ...
     * @return string - return new path
     */
    public function getNewPath($file, $lp, $sem) : string {
        if (($lp == '') || ($lp == ' ')) {
            header("Location: index.php");
        }
        if (($sem == '') || ($sem == ' ')) {
            header("Location: index.php");
        }
        if (strpos($file, "data/") === false){
            $tmp = "data/".$lp."/".$sem."/".$file;
            $file = str_replace("//", "/", $tmp);
        }
        return $file;
    }
}

