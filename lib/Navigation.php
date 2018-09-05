<?php
require_once(__DIR__ . '/SiteURL.php');
require_once(__DIR__ . '/Teacher.php');
require_once(__DIR__ . '/Semester.php');

class Navigation
{
    private $site = null;
    private $sem = null;
    private $teacher = null;

    /**
     * Navigation constructor.
     */
    public function __construct()
    {
        $this->site = new SiteURL();
        $this->sem = new Semester();
        $this->teacher = new Teacher();
    }

    public function getSiteTitle(): string
    {
        $result = "<title>Appi - BZZ</title>";
        $lp = $this->teacher->getSessionValue();
        $sem = $this->sem->getSessionValue();
        if ($lp == SessionIO::INVALID){
            return $result;
        }

        if ($sem == SessionIO::INVALID){
            return $result;
        }
        return sprintf("<title>%s - BZZ</title>", strtoupper($sem));
    }

    public function clearSettings($type){

        if ($type == "all" || $type == "cookie"){
            $this->teacher->setCookieValue(CookieIO::INVALID);
            $this->sem->setCookieValue(CookieIO::INVALID);
        }

        if ($type == "all" || $type == "session"){
            $this->teacher->setSessionValue(SessionIO::INVALID);
            $this->sem->setSessionValue(SessionIO::INVALID);
        }
    }

    public function readSettings() : bool {
        //read teacher (lp) cookie
        $lp = $this->teacher->getCookieValue();
        if ($lp == CookieIO::INVALID) {
            return false;
        }
        //read semester cookie
        $sem = $this->sem->getCookieValue();
        if ($sem == CookieIO::INVALID) {
            return false;
        }

        /*  All cookies could be read.
         *  Now check if the values are allowed
        */
        $lpArray = $this->teacher->getAllowedValues();
        if (!in_array($lp, $lpArray)) {
            return false;
        }
        $semArray = $this->sem->getAllowedValues();
        if (!in_array($sem, $semArray)) {
            return false;
        }

        //set sessions
        $this->teacher->setSessionValue($lp);
        $this->sem->setSessionValue($sem);
        $this->sem->redirect($lp,$sem);
    }

    /**
     * Set top navigation
     * @return array
     */
    public function getTopNavigationSites()
    {
        $lp = $this->teacher->getSessionValue();
        $sem = $this->sem->getSessionValue();
        $base_url = sprintf("content.php?file=data/%s/%s/org",$lp, $sem);
        $topNavList = array("Home" => $base_url . "/home.md",
            "Agenda" => sprintf("content.php?inc=1&file=data/%s/%s/org/agenda.md",$lp, $sem),
            "Organisation" => $base_url . "/organisation.md",
            "Lernziele" => $base_url . "/lernziele.md",
            "Module" => "index.php?clear=all");
        return $topNavList;
    }

    public function getDropDownMenuSites()
    {
        $sem = $this->sem->getSessionValue();
        $base_url = "content.php?file=org/" . $sem;

        $topNavList = array(
            "Selfhtml" => "https://wiki.selfhtml.org",
            "Can I use" => "http://caniuse.com/"
        );
        return $topNavList;
    }

    public function setLinksOfTopNavigation()
    {
        $part = $this->site->getPartFromURL(SiteURL::QUERY);
        $siteList = $this->getTopNavigationSites();
        //to highlight the selected menu-item
        $active = "class='active'";
        foreach ($siteList as $siteCaption => $siteUrl) {
            if ($this->site->contains(strtolower($siteCaption), $part)) {
                printf("<li %s><a href='%s'>%s</a></li>", $active, $siteUrl, $siteCaption);
            } else {
                printf("<li><a href='%s'>%s</a></li>", $siteUrl, $siteCaption);
            }
        }
    }

    public function setDropDownMenuNavigation()
    {
        $siteList = $this->getDropDownMenuSites();
        foreach ($siteList as $siteCaption => $siteUrl) {
            printf("<li><a href='%s' target='_blank'>%s</a></li>", $siteUrl, $siteCaption);
        }
    }

    //Setze TopNavigation abhängig vom Content
    public function setTopNavigation()
    {
        $nav = array("inc/nav.inc", "inc/nav_cont.inc");
        $result = 0; //default
        if (isset($_GET["top"])) {
            switch ($_GET["top"]) {
                case 1:
                    $result = 1;
                    break;
            }
        }
        return $nav[$result];
    }

    /**
     * Setze Links-Navigation abhängig vom Content
     * @return mixed
     */
    public function setLeftNavigation()
    {
        $nav = array("inc/cont.inc", "inc/cont_sidebar.inc");
        $result = 0; //default
        if (isset($_GET["ct"])) {
            switch ($_GET["ct"]) {
                case 1:
                    $result = 1;
                    break;
            }
        }
        return $nav[$result];
    }



}