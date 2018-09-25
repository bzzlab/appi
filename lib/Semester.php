<?php
require_once(__DIR__ . '/CookieIO.php');
require_once(__DIR__ . '/SessionIO.php');
require_once(__DIR__ . '/Konstanten.php');
require_once(__DIR__ . '/Teacher.php');

/**
 * Created by PhpStorm.
 * User: dgar
 * Date: 06.07.17
 * Time: 20:39
 */
class Semester
{

    private $cookieIO = null;
    private $sess = null;
    private $teacher = null;

    const ENTITY_ID = "sem";
    const SUBMIT_VAL = "Continue";
    const SUBMIT_ID = "contStep02";


    /**
     * Semester constructor.
     */
    public function __construct()
    {
        $this->cookieIO = new CookieIO();
        $this->sess = new SessionIO();
        $this->teacher = new Teacher();
    }


    public function processForm(){
        if (isset($_POST[self::ENTITY_ID])) {
            $sem = $_POST[self::ENTITY_ID];
            $lp = $this->teacher->getSessionValue();
            if ($lp == SessionIO::INVALID) {
                header("Location: index.php");
            }
            $this->setSessionValue($sem);
            if (isset($_POST["cookie"])){
                if ($_POST["cookie"]  == "true"){
                    $this->setCookieValue($sem);
                    $this->teacher->setCookieValue($lp);
                }
            }
            $this->redirect($lp, $sem);
        }
    }


    public function dumpValues(){
        printf("teacher, cookie: %s, session: %s<br/>",
            $this->teacher->getCookieValue(),$this->teacher->getSessionValue());

        printf("Semester, cookie: %s, session: %s<br/>",
            $this->getCookieValue(),$this->getSessionValue());
    }

    /**
     * All possible semester
     * @return array
     */
    public function getAllowedValues(){
        //Return all possible semester
        return array("m150", "m152", "m306");
    }

    public function setCookieValue($value){
        $this->cookieIO->setCookie(self::ENTITY_ID, $value);
    }

    public function setSessionValue($value){
        $this->sess->set(self::ENTITY_ID, $value);
    }

    public function getCookieValue(){
        $value = $this->cookieIO->getCookie(self::ENTITY_ID);
        if ($value == CookieIO::INVALID) {
            return Konstanten::LEER_STRING;
        }
        return $value;
    }

    public function getSessionValue(){
        return $this->sess->get(self::ENTITY_ID);
    }


    /**
     * Redirect with $teacher and $semester
     * @param $teacher
     * @param $semester
     *
     */
    public function redirect($teacher, $semester){
        $url = sprintf("Location: content.php?file=data/%s/%s/org/home.md",
            $teacher, $semester);
        header($url);
    }


    public function setHiddenSessions(){
        $teacher = $this->teacher->getSessionValue();
        if (strlen($teacher) > 0){
            echo "<input type='hidden' id='lp_key' value='".$teacher."'/>";
        }
        $semester = $this->getSessionValue();
        if (strlen($semester) > 0){
            echo "<input type='hidden' id='sem_key' value='".$semester."'/>";
        }
    }

}