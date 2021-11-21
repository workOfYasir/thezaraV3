<?php

class Adminfunctions {

    private $db;
    public $functions;
    public $configs;
    public $stop_life = '86400'; // 24 hours

    public function __construct($db, $functions, $configs, $logger) {
        $this->db = $db;
        $this->functions = $functions;
        $this->configs = $configs;
        $this->logger = $logger;
    }

    /* *******************************************************************
     * checkLevel - Returns the userlevel - used by displayStatus function
     * *******************************************************************
     */
    function checkLevel($username) {
        $query = "SELECT userlevel FROM users WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':username' => $username));
        return $row = $stmt->fetchColumn();
    }

    /* **********************************************************************************
     * checkIPFormat - Returns true if the username has been banned by the administrator.
     * **********************************************************************************
     */
    function checkIPFormat($ip) {
        if (!filter_var($ip, FILTER_VALIDATE_IP)) {
            $field = "ip_address";
            Form::setError($field, "Incorrect IP Address format");
        } else {
            return true;
        }
    }
    
    /* *********************************************************************************************************
     * demoteUserFromSuperAdmin - Demote user from admin (from level 10 to level 9 - remove from administrators group)
     * *********************************************************************************************************
     */
    function demoteUserFromSuperAdmin($username){
        if ($this->functions->getUserInfoSingular('userlevel', $username) != '10') {
            return false;
        } else {
            // Update to Level 3
            $this->functions->updateUserField($username, 'userlevel', '3');
            
            // Delete from Administrators Group
            $user_id = $this->functions->getUserInfoSingular('id', $username);
            $demote = $this->db->prepare("DELETE FROM users_groups WHERE user_id = :userid AND group_id = '1' LIMIT 1");
            $demote->execute(array(':userid' => $user_id));
            
            /* Update Log */     
            $this->logger->logAction($user_id, 'DEMOTED_FROM_SUPERADMIN');
            
            return true;
        }
    }


    /* *********************************************************************************************************
     * demoteUserFromAdmin - Demote user from admin (from level 9 to level 3 - remove from administrators group)
     * *********************************************************************************************************
     */
    function demoteUserFromAdmin($username){
        if ($this->functions->getUserInfoSingular('userlevel', $username) != '9') {
            return false;
        } else {
            // Update to Level 3
            $this->functions->updateUserField($username, 'userlevel', '3');
            
            // Delete from Administrators Group
            $user_id = $this->functions->getUserInfoSingular('id', $username);
            $demote = $this->db->prepare("DELETE FROM users_groups WHERE user_id = :userid AND group_id = '1' LIMIT 1");
            $demote->execute(array(':userid' => $user_id));
            
            /* Update Log */     
            $this->logger->logAction($user_id, 'DEMOTED_FROM_ADMIN');
            
            return true;
        }
    }





/* **************************************************************************************************
     * promoteUserToSuperAdmin - Promote user to admin (from level 3 to level 10 - add to administrators group)
     * **************************************************************************************************
     */
    function promoteUserToSuperAdmin($username){
        if ($this->functions->getUserInfoSingular('userlevel', $username) == '10') {
            return false;
        } else {
            // Update to Level 10
            $this->functions->updateUserField($username, 'userlevel', '10');
            
            // Add to Administrators Group
            $user_id = $this->functions->getUserInfoSingular('id', $username);
            $promote = $this->db->prepare("INSERT INTO users_groups (user_id, group_id) VALUES (:userid, '1')");
            $promote->execute(array(':userid' => $user_id));
            
            /* Update Log */       
            $this->logger->logAction($user_id, 'PROMOTED_TO_SUPERADMIN');
            return true;
        }
    }    
    
    /* **************************************************************************************************
     * promoteUserToAdmin - Promote user to admin (from level 3 to level 9 - add to administrators group)
     * **************************************************************************************************
     */
    function promoteUserToAdmin($username){
        if ($this->functions->getUserInfoSingular('userlevel', $username) == '9') {
            return false;
        } else {
            // Update to Level 9
            $this->functions->updateUserField($username, 'userlevel', '9');
            
            // Add to Administrators Group
            $user_id = $this->functions->getUserInfoSingular('id', $username);
            $promote = $this->db->prepare("INSERT INTO users_groups (user_id, group_id) VALUES (:userid, '1')");
            $promote->execute(array(':userid' => $user_id));
            
            /* Update Log */       
            $this->logger->logAction($user_id, 'PROMOTED_TO_ADMIN');
            
            return true;
        }
    }    

    /* *************
     * displayStatus
     * *************
     */
    function displayStatus($username) {
        $level = $this->checkLevel($username);
        if ($level == 1) {
            return $status = '<span style="color:blue;">Awaiting E-mail Activation</span>';
        }
        if ($level == 2) {
            return $status = '<span style="color:blue;">Awaiting Admin Activation</span>';
        }
        if (($level == 3) && (!$this->functions->checkBanned($username))) {
            return $status = '<span style="color:green;">Registered</span>';
        }
        if ($this->functions->checkBanned($username)) {
            return $status = '<span style="color:red;">Banned</span>';
        }
        if ($level == ADMIN_LEVEL) { 
            return $status = '<span style="color:blue;">Admin</span>';
        }
        if ($level == SUPER_ADMIN_LEVEL) { 
            return $status = 'SuperAdmin';
        }
    }

    /* *************************************************************************************
     * displayDate - returns a variable formatted in the date format pulled from the configs
     * *************************************************************************************
     */
    public function displayDate($date_toedit) {
        if (isset($date_toedit)) {
            $date = $this->configs->getConfig('DATE_FORMAT');
            return date("$date", $date_toedit);
        }
    }

    /* ***********************
     * displayAdminActivation
     * ***********************
     */
    public function displayAdminActivation($orderby) {
        return $sql = $this->db->query("SELECT username, regdate, email, ip, userlevel FROM users WHERE userlevel = " . ADMIN_ACT . " OR userlevel = " . ACT_EMAIL . " ORDER BY $orderby DESC");
    }

    /* *************************************************************************
     * adminEditAccount - function for admin to edit the user's account details.
     * *************************************************************************
     */
    public function adminEditAccount($subusername, $subfirstname, $sublastname, $subnewpass, $subconfnewpass, $subemail, $subusertoedit, $subusertoeditid) {
        /* New password entered */
        if ($subnewpass) {
            /* New Password error checking */
            $field = "newpass";  //Use field name for new password
            $this->userinfo = $this->functions->getUserInfoSingular('id', $subusername);

            /* check minimum password length (default 8 characters) */
            if (strlen($subnewpass) < $this->configs->getConfig('min_pass_chars')) {
                Form::setError($field, "New Password too short");
            }
            /* check maximum password length (in an attempt to stop DOS attack for extra long password) */
            else if (strlen($subnewpass) > $this->configs->getConfig('max_pass_chars')) {
                Form::setError($field, "New Password too long");
            }
            /* Check if passwords match */ 
            else if ($subnewpass != $subconfnewpass) {
                Form::setError($field, "Passwords do not match");
            }
        }

        if (($subconfnewpass) && (!$subnewpass)) {
            $field = "conf_newpass";
            Form::setError($field, "You've only entered one new password");
        }

        /* New username entered */
        if ($subusername) {
            /* Username error checking */
            $field = "username";  //Use field name for userlevel
            if (!$this->functions->usernameRegex($subusername)) {
                Form::setError($field, "Username does not match requirements");
            }
            /* Check username length doesnt exceed database limit of 36 */
            else if (strlen($subusername) > 36) {
                Form::setError($field, "Username above 36 characters permitted by database");
            }
            /* Check if username is reserved */
             else if (strcasecmp($subusername, GUEST_NAME) == 0) {
                Form::setError($field, "Username reserved word");
            }
            /* Check if username is already in use */ 
            else if ($subusertoedit !== $subusername && $this->functions->usernameTaken($subusername)) {
                Form::setError($field, "Username already in use");
            }
        }

        /* Firstname error checking */
        $this->functions->nameCheck($subfirstname, 'firstname', 'First Name', 2, 30);

        /* Lastname error checking */
        $this->functions->nameCheck($sublastname, 'lastname', 'Last Name', 2, 30);

        /* Email error checking */
        $this->currentemail = $this->functions->getUserInfoSingularFromId('email', $subusertoeditid);
        if($this->currentemail != $subemail){
            $this->functions->emailCheck($subemail, $subemail, 'email');
        }

        /* Errors exist, have user correct them */
        if (Form::$num_errors > 0) {
            return false;  //Errors with form
        }

        /* Update firstname since there were no errors */
        if ($subfirstname) {
            $this->functions->updateUserField($subusertoedit, "firstname", $subfirstname);
        }

        /* Update lastname since there were no errors */
        if ($sublastname) {
            $this->functions->updateUserField($subusertoedit, "lastname", $sublastname);
        }

        /* Update password since there were no errors */
        if ($subnewpass) {
            $this->functions->updateUserField($subusertoedit, "password", password_hash($subnewpass, PASSWORD_DEFAULT));
            
            /* Update Log */
            //if log turned on.. do the following...
            $id = $this->functions->getUserInfoSingular('id', $subusertoedit);
            $this->logger->logAction($id, 'PWD_CHANGED BY ADMIN'); 
        }

        /* Change Email */
        if($this->currentemail != $subemail){
            $this->functions->updateUserField($subusertoedit, "email", $subemail);
            
            /* Update Log */
            $id = $this->functions->getUserInfoSingular('id', $subusertoedit);
            $this->logger->logAction($id, 'EMAIL_CHANGED BY ADMIN'); 
        }

        /* Update username - this MUST GO LAST otherwise the username 
         * will change and subsequent changes like e-mail will not be changed.
         */
        if ($subusername) {
            $this->functions->updateUserField($subusertoedit, "username", $subusername);
        }

        /* Success! */
        return true;
    }

    /* *******************************************************************************
     * checkUsername - Helper function for the above processing, it makes sure the 
     * submitted username is valid, if not, it adds the appropritate error to the form.
     * *******************************************************************************
     */
    public function checkUsername($username) {

        /* Username error checking */
        $subuser = $username;
        $field = 'user';  //Use field name for username
        if (!$subuser || strlen($subuser = trim($subuser)) == 0) {
            Form::setError($field, "Username not entered<br>");
        } else {
            /* Make sure username is in database */
            if (strlen($subuser) < $this->configs->getConfig('min_user_chars') ||
                strlen($subuser) > $this->configs->getConfig('max_user_chars') ||
                (!$this->functions->usernameRegex($subuser)) ||
                (!$this->functions->usernameTaken($subuser))) {
                    Form::setError($field, "Username does not exist<br>");
            }
        }
        return $subuser;
    }

    /* **************************************************************************************************
     * The following 3 functions are responsible for checking the validity of sensitive admin operations in 
     * an attempt at preventing CSRF attacks. They generate unique hashed IDs that are passed from the 
     * POST or GET string requesting the sensitive change, to the script carrying out the change. 
     * If the IDs do not match the change is not carried out. 
     * **************************************************************************************************
     */
    function createStop($admin, $name) {
        $session_id = $_SESSION['session_id'];
        if (isset($session_id)) {
            $stoptick = ceil(time() / ( $this->stop_life / 2 ));
            return md5($stoptick . $session_id . $name);
        }
    }

    function verifyStop($admin, $name, $stop) {
        $session_id = $_SESSION['session_id'];
        if (isset($session_id)) {
            $stoptick = ceil(time() / ( $this->stop_life / 2 ));
            if ((md5($stoptick . $session_id . $name)) == $stop) {
                return 2;
            }
        }
    }
    
    function stopField($admin, $name) {
        $stop_field = '<input type="hidden" id="' . $name . '" name="' . $name . '" value="' . $this->createStop($admin, $name) . '" />';
        return $stop_field;
    }
    
    /* **************************
     * Stat collecting functions
     * **************************
     */

    /* Returns the Previous Visit date of the submitted username */
    function previousVisit($username) {
        $lastvisit = $this->functions->getUserInfoSingular('previous_visit', $username);
        return $this->displayDate($lastvisit);
    }

    /* Users Since - returns registered users sincelast visit */
    function usersSince($username) {
        $lastvisit = $this->functions->getUserInfoSingular('previous_visit', $username);
        $query = $this->db->query("SELECT username FROM users WHERE regdate > " . $lastvisit);
        return $userssince = $query->rowCount();
    }
    
    /* Total Users - Total Users registered */
    function totalUsers() {
        $query = $this->db->query("SELECT username FROM users");
        $total_users = $query->rowCount();
        return $total_users;
    }
    
    /* recentlyOnline */
    function recentlyOnline($minutes) {
        $time = time() - ($minutes * 60);
        $query = $this->db->query("SELECT username FROM users WHERE timestamp > $time");
        $usersonline = "";
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $usersonline .= $row['username']. ", ";
        }
        $results = rtrim($usersonline, ", ");    
        return $results;
    }
    
    /* getLastUserRegisteredDetails - Returns the username OR date of the last member to sign up. 0=Username, 1=Date . */
    function getLastUserRegisteredDetails($num) {
        $result = $this->db->query("SELECT username, regdate FROM users ORDER BY regdate DESC LIMIT 0,1");
        $this->lastuser_reg = $result->fetchColumn($num);
        return $this->lastuser_reg;
    }

}
