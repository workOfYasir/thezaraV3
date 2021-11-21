<?php

include_once 'controller.php';

if (!$session->isAdmin()) {
    header("Location: " . $configs->homePage());
    exit;
}

$form_submission = (isset($_POST['form_submission']) ) ? $_POST['form_submission'] : $_GET['form_submission'];
switch ($form_submission) {

    case "activate_users" :
        activateUsers($db, $configs, $functions, $session, $logger);
        break;
    case "admin_registration" :
        adminRegister($db, $session, $configs, $functions, $logger);
        break;
    case "delete_individual_sessions" :
        deleteIndividualSessions($db, $adminfunctions, $session);
        break;
    case "delete_all_user_sessions" :
        deleteAllUserSessions($functions, $adminfunctions, $session, $logger);
        break;
    case "delete_inactive" :
        deleteInactive($db, $adminfunctions, $session);
        break;
    case "disallow_user" :
        disallowUsername($db);
        break;
    case "undisallow_user" :
        unDisallowUsername($db);
        break;
    case "group_creation" :
        groupCreation($db);
        break;
    case "edit_group" :
        editGroup($db);
        break;
    case "edit_group_membership" :
        editGroupMembership($db, $session, $adminfunctions, $functions);
        break;
    case "remove_groupmember" :
        removeFromGroup($db, $session, $adminfunctions, $functions);
        break;
    case "delete_group" :
        deleteGroup($db, $session, $adminfunctions);
        break;
    case "ban_ip" :
        banIp($db, $adminfunctions);
        break;
    case "unban_ip" :
        deleteBanIp($db, $adminfunctions);
        break;
    case "config_edit" :
        configEdit($adminfunctions, $configs, $session);
        break;
    case "registration_edit" :
        regConfigEdit($adminfunctions, $configs, $session);
        break;
    case "session_edit" :
        sessionConfigEdit($adminfunctions, $configs, $session);
        break;
    case "main_user_settings" :
        mainUserSettingsEdit($adminfunctions, $configs, $session);
        break;
    case "user_settings" :
        userSettingsEdit($adminfunctions, $configs, $session);
        break;
    case "update_userhome" :
        updateUserHomePage($db, $adminfunctions, $session);
        break;
    case "edit_user" :
        if (isset($_POST['button']) && ($_POST['button'] == "Edit Account")) {
            editAccount($adminfunctions, $session);
        }
        break;
    case "delete_user" :
        if (isset($_POST['button']) && ($_POST['button'] == "Ban User")) {
            banUser($db, $functions, $session, $logger);
        } else
        if (isset($_POST['button']) && ($_POST['button'] == "unban User")) {
            unBanUser($db, $functions, $session, $logger);
        } else


        if (isset($_POST['button']) && ($_POST['button'] == "PromotetoSuperAdmin")) {
            promoteUserToSuperAdmin($adminfunctions, $session);
        } else
        if (isset($_POST['button']) && ($_POST['button'] == "DemotefromSuperAdmin")) {
            demoteUserFromSuperAdmin($adminfunctions, $session);
        } else


        if (isset($_POST['button']) && ($_POST['button'] == "Promotetoadmin")) {
            promoteUserToAdmin($adminfunctions, $session);
        } else
        if (isset($_POST['button']) && ($_POST['button'] == "Demotefromadmin")) {
            demoteUserFromAdmin($adminfunctions, $session);
        } else
        if (isset($_POST['button']) && ($_POST['button'] == "Delete")) {
            deleteUser($db, $adminfunctions, $functions, $session, $logger);
        }
        break;
    default :
        header("Location: " . $configs->homePage());
}

/**
 * *************************************************************************
 * adminRegister - Admin process for creating users from the Admin Panel.
 * *************************************************************************
 */
function adminRegister($db, $session, $configs, $functions, $logger) {
    $registration = new Registration($db, $session, $configs, $functions, $logger);

    /* Convert username to all lowercase (by option) */
    if ($configs->getConfig('ALL_LOWERCASE') == 1) {
        $_POST['user'] = strtolower($_POST['user']);
    }

    $retval = $registration->register($_POST['user'], $_POST['firstname'], $_POST['lastname'], $_POST['pass'], $_POST['conf_pass'], $_POST['email'], $_POST['conf_email'], 1);

    /* Registration Successful */
    if ($retval == 0) {
        $_SESSION['reguname'] = $_POST['user'];
        $_SESSION['regsuccess'] = 0;
        header("Location: ".BASE_URL."/summary.php");
    }

    /* Error found with form */ else if ($retval == 1) {
        $_SESSION['reguname'] = $_POST['user'];
        $_SESSION['regsuccess'] = 2;
        header("Location: ".BASE_URL."/summary.php");
    }

    /* Registration attempt failed */ else if ($retval == 2) {
        $_SESSION['reguname'] = $_POST['user'];
        $_SESSION['regsuccess'] = 2;
        header("Location: ".BASE_URL."/summary.php");
    }
}

/**
 * ****************************************************************************************
 * deleteUser - If the submitted username is correct, the user is deleted from the database.
 * ****************************************************************************************
 */
function deleteUser($db, $adminfunctions, $functions, $session, $logger) {

    /* Username error checking */
    $user = $adminfunctions->checkUsername($_POST['usertoedit']);

    /* Errors exist, have user correct them */
    if (Form::$num_errors > 0) {
        $_SESSION['value_array'] = $_POST;
        $_SESSION['error_array'] = Form::getErrorArray();
        header("Location: " . $session->referrer);
    } else {
        /* Syncronizer Token Check */
        if (isset($_POST['delete-user'])) {
            $stop = $_POST['delete-user'];
        } else {
            $stop = '';
        }
        if ($adminfunctions->verifyStop($session->username, 'delete-user', $stop) == '2') {
            
            $userid = $functions->getUserInfoSingular('id', $user);
            $admin_userid = $session->id;
            
            /* Delete from Groups First */
            $query = $db->prepare("DELETE FROM users_groups WHERE user_id = '$userid'");
            $query->execute();
            
            /* Delete from banlist */
            $query2 = $db->prepare("DELETE FROM banlist WHERE ban_userid = '$userid' LIMIT 1");
            $query2->execute();
            
            /* Delete user from database */
            $query3 = $db->prepare("DELETE FROM users WHERE username = :username LIMIT 1");
            $query3->execute(array(':username' => $user));
            
            /* Delete entries from Logs */
            $logger->purgeLogsOfUser($userid);
            
            /* Deletes all sessions for user */
            $functions->deleteAllUserSessions($userid);
            
            /* Add Deletion to Logs */
            $logger->logAction($admin_userid, "DELETED USER : ".$user );
            
            header("Location: ".BASE_URL."/useradmin.php");
        } else {
            //Syncroniser Token does not match - log user off
            header("Location: process.php");
        }
    }
}

/**
 * ********************************************************************************************************
 * deleteInactive - All inactive users are deleted from the database, not including administrators. 
 * Inactivity is defined by the number of days specified that have gone by that the user has not logged in.
 * ********************************************************************************************************
 */
function deleteInactive($db, $adminfunctions, $session) {
    
    /* Syncronizer Token Check */
    if (isset($_GET['stop'])) {
        $stop = $_GET['stop'];
    } else {
        $stop = '';
    }

    if ($adminfunctions->verifyStop($session->username, 'delete-inactive', $stop) == '2') {
        
    $time = time();
    $inact_time = $time - 30/**days**/ * 24 * 60 * 60;
    $sql = $db->prepare("DELETE FROM users WHERE timestamp < $inact_time AND userlevel != " . SUPER_ADMIN_LEVEL);
    $sql->execute();
    header("Location: ".BASE_URL."/useradmin.php");
    
    /* Syncroniser Token does not match - log user off */
    } else {
        header("Location: process.php");
    }
}

/**
 * ********************************************************************************************************
 * deleteAllUserSessions - 
 * ********************************************************************************************************
 */
function deleteAllUserSessions($functions, $adminfunctions, $session, $logger) {
    
    /* Syncronizer Token Check */
    if (isset($_GET['stop'])) {
        $stop = $_GET['stop'];
    } else {
        $stop = '';
    }

    if ($adminfunctions->verifyStop($session->username, 'delete-sessions', $stop) == '2') {
        
    $functions->deleteAllSessionsButAdmin();
    $logger->logAction($session->id, "DELETED_ALL_SESSIONS");
    header("Location: ".BASE_URL."/useradmin.php");
    
    /* Syncroniser Token does not match - log user off */
    } else {
        header("Location: process.php");
    }
}

/**
 * ********************************************************************************************************
 * deleteIndividualSessions - Deletes the selected individual sessions
 * ********************************************************************************************************
 */
function deleteIndividualSessions($db, $adminfunctions, $session) {
    
    /* Syncronizer Token Check */
    if (isset($_POST['stop'])) {
        $stop = $_POST['stop'];
    } else {
        $stop = '';
    }

    if ($adminfunctions->verifyStop($session->username, 'delete-sessions', $stop) == '2') {
        
    if (isset($_POST['id'])) {
        foreach ($_POST['id'] as $id) {
            $sql = $db->query("DELETE FROM user_sessions WHERE id = '$id'");
            $sql->execute();          
        }
        header("Location: ".BASE_URL."/useradmin.php#current_sessions"); //success
    } else {
        header("Location: ".BASE_URL."/useradmin.php"); //none selected
    }
    
    /* Syncroniser Token does not match - log user off */
    } else {
        header("Location: process.php");
    }
}

/**
 * ***********************************************************************************************
 * banUser - If the submitted username is correct the user ID is added to the banned users table.
 * ***********************************************************************************************
 */
function banUser($db, $functions, $session, $logger) {

    /* Username error checking */
    $banned_user = $_POST['usertoedit'];
    if ($functions->checkBanned($banned_user)) {
        header("Location: ".BASE_URL."/useradmin.php");
        exit;
        
    } else {

        /* Ban user from member system */
        $banuserid = $functions->getUserInfoSingular('id', $banned_user);
        $time = time();
        $sql = $db->prepare("INSERT INTO banlist (ban_userid, timestamp) VALUES ('$banuserid', $time)");
        $sql->execute();
        
        /* Add Banning to Logs */
        $admin_userid = $session->id;
        $logger->logAction($admin_userid, "BANNED USER : ".$banned_user );
        
        header("Location: ".BASE_URL."/adminuseredit.php?usertoedit=" . $banned_user);
    }
}

/* 
 * *****************************************
 * unBanUser - function that unbans users. 
 * *****************************************
 */
function unBanUser($db, $functions, $session, $logger) {

    /* Username error checking */
    $banned_user = $_POST['usertoedit'];
    if (!$functions->checkBanned($banned_user)) {
        header("Location: ".BASE_URL."/useradmin.php");
    }

    /* UnBan user from member system */
    $banuserid = $functions->getUserInfoSingular('id', $banned_user);
    $sql = $db->prepare("DELETE FROM banlist WHERE ban_userid = '$banuserid'");
    $sql->execute();
    
    /* Add Unbanning to Logs */
    $admin_userid = $session->id;
    $logger->logAction($admin_userid, "UNBANNED USER : ".$banned_user );
        
    header("Location: ".BASE_URL."/adminuseredit.php?usertoedit=" . $banned_user);
}



/* 
 * *****************************************************
 * promoteUserToSuperAdmin - Promote User to Admin Level 10. 
 * *****************************************************
 */
function promoteUserToSuperAdmin($adminfunctions, $session){
    
    if(!empty($_POST['usertoedit']) && $session->isSuperAdmin()){
        
        $user_to_promote = $_POST['usertoedit'];
        $adminfunctions->promoteUserToSuperAdmin($user_to_promote);
        header("Location: ".BASE_URL."/adminuseredit.php?usertoedit=".$user_to_promote);
    } else {       
        header("Location: ".BASE_URL."/adminuseredit.php?usertoedit=".$user_to_promote);
    }
}

/* 
 * *********************************************************************
 * demoteUserFromSuperAdmin - Demote User and return them to registered user. 
 * *********************************************************************
 */
function demoteUserFromSuperAdmin($adminfunctions, $session){
    
    if(!empty($_POST['usertoedit'])&& $session->isSuperAdmin()){      
        $user_to_demote = $_POST['usertoedit'];
        $adminfunctions->demoteUserFromSuperAdmin($user_to_demote);
        header("Location: ".BASE_URL."/adminuseredit.php?usertoedit=".$user_to_demote);
    } else {       
        header("Location: ".BASE_URL."/adminuseredit.php?usertoedit=".$user_to_demote);
    }
}


























/* 
 * *****************************************************
 * promoteUserToAdmin - Promote User to Admin Level 9. 
 * *****************************************************
 */
function promoteUserToAdmin($adminfunctions, $session){
    
    if(!empty($_POST['usertoedit']) && $session->isSuperAdmin()){
        
        $user_to_promote = $_POST['usertoedit'];
        $adminfunctions->promoteUserToAdmin($user_to_promote);
        header("Location: ".BASE_URL."/adminuseredit.php?usertoedit=".$user_to_promote);
    } else {       
        header("Location: ".BASE_URL."/adminuseredit.php?usertoedit=".$user_to_promote);
    }
}

/* 
 * *********************************************************************
 * demoteUserFromAdmin - Demote User and return them to registered user. 
 * *********************************************************************
 */
function demoteUserFromAdmin($adminfunctions, $session){
    
    if(!empty($_POST['usertoedit'])&& $session->isSuperAdmin()){      
        $user_to_demote = $_POST['usertoedit'];
        $adminfunctions->demoteUserFromAdmin($user_to_demote);
        header("Location: ".BASE_URL."/adminuseredit.php?usertoedit=".$user_to_demote);
    } else {       
        header("Location: ".BASE_URL."/adminuseredit.php?usertoedit=".$user_to_demote);
    }
}

/* 
 * *********************************************************
 * disallowUsername - Disallows a username from registration
 * *********************************************************
 */
function disallowUsername($db) {
    if (!empty($_POST['usernametoban'])) {
        $time = time();
        $usernametoban = $_POST['usernametoban'];
        $sql = $db->prepare("INSERT INTO banlist (ban_username, timestamp) VALUES ('$usernametoban', '$time')");
        $sql->execute();
    }
    header("Location: ".BASE_URL."/security.php"); // success
}

/* 
 * *****************************************************************************
 * unDisallowUsername - Removes a username from being disallowed at registration
 * *****************************************************************************
 */
function unDisallowUsername($db) {
    if (isset($_POST['username_tounban'])) {
        $ban_id = $_POST['username_tounban'];
        $sql = $db->prepare("DELETE FROM banlist WHERE ban_id = '$ban_id'");
        $sql->execute();
    }
    header("Location: ".BASE_URL."/security.php"); // success
}

/* 
 * ****************************************************************************
 * banIp - Adds an IP address to the banned ip list - checked by checkIPFormat
 * ****************************************************************************
 */
function banIp($db, $adminfunctions) {
    if (isset($_POST['ipaddress'])) {
        $ipaddress = $_POST['ipaddress'];
        if ($adminfunctions->checkIPFormat($ipaddress)) {
            $time = time();
            $sql = $db->prepare("INSERT INTO banlist (ban_ip, timestamp) VALUES ('$ipaddress', '$time')");
            $sql->execute();
            header("Location: ".BASE_URL."/security.php"); // success
        } else {
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = Form::getErrorArray();
            header("Location: ".BASE_URL."/security.php"); // failure
        }
    } header("Location: ".BASE_URL."/security.php"); // No IP, refresh page
}

/* 
 * ************************************************************
 * deleteBanIp - Removes an IP address from the banned ip list
 * ************************************************************ 
 */
function deleteBanIp($db, $adminfunctions) {
    if (isset($_POST['ipaddress'])) {
        $ipaddress = $_POST['ipaddress'];
        if ($adminfunctions->checkIPFormat($ipaddress)) {
            $sql = $db->prepare("DELETE FROM banlist WHERE ban_ip = '$ipaddress'");
            $sql->execute();
        } else {
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = Form::getErrorArray();
            header("Location: ".BASE_URL."/security.php"); // failure
        }
    } header("Location: ".BASE_URL."/security.php");
}

/**
 * *********************************************************************************************************
 * configEdit - function for updating the website configurations in the configuration table in the database.
 * *********************************************************************************************************
 */
function configEdit($adminfunctions, $configs, $session) {

    /* Syncronizer Token Check */
    if (isset($_POST['configs'])) {
        $stop = $_POST['configs'];
    } else {
        $stop = '';
    }
    if ($adminfunctions->verifyStop($session->username, 'configs', $stop) == '2') {

        /* Account edit attempt */
        $retval = $configs->editConfigs($_POST['sitename'], $_POST['sitedesc'], $_POST['emailfromname'], $_POST['adminemail'], $_POST['webroot'], $_POST['home_page'], $_POST['login_page'], $_POST['date_format']);

        /* Account edit successful */
        if ($retval) {
            $_SESSION['configedit'] = true;
            header("Location: ".BASE_URL."/configurations.php");
        } else {
            /* Error found with form */
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = Form::getErrorArray();
            header("Location: ".BASE_URL."/configurations.php");
        }
        /* Syncroniser Token does not match - log user off */
    } else {
        header("Location: process.php");
    }
}

/**
 * *************************************************************************************************************************
 * regConfigEdit - function for updating the website registration configurations in the configuration table in the database.
 * *************************************************************************************************************************
 */
function regConfigEdit($adminfunctions, $configs, $session) {

    if (isset($_POST['registration'])) {
        $stop = $_POST['registration'];
    } else {
        $stop = '';
    }
    if ($adminfunctions->verifyStop($session->username, 'registration', $stop) == '2') {

        /* Account edit attempt */
        $retval = $configs->editRegConfigs($_POST['activation'], $_POST['limit_username_chars'], $_POST['min_user_chars'], $_POST['max_user_chars'], $_POST['min_pass_chars'], $_POST['max_pass_chars'], $_POST['send_welcome'], $_POST['enable_capthca'], $_POST['all_lowercase']);

        /* Account edit successful */
        if ($retval) {
            $_SESSION['configedit'] = true;
            header("Location: ".BASE_URL."/registration.php");
        } else {
            /* Error found with form */
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = Form::getErrorArray();
            header("Location: ".BASE_URL."/registration.php");
        }

        /* Syncroniser Token does not match - log user off */
    } else {
        header("Location: process.php");
    }
}

/**
 * ****************************************************************************************************************
 * sessionConfigEdit - function for updating the website Session configurations in the configuration table in the database.
 * ****************************************************************************************************************
 */
function sessionConfigEdit($adminfunctions, $configs, $session) {

    if (isset($_POST['session'])) {
        $stop = $_POST['session'];
    } else {
        $stop = '';
    }
    if ($adminfunctions->verifyStop($session->username, 'session', $stop) == '2') {

        /* Account edit attempt */
        $retval = $configs->editSessConfigs($_POST['user_timeout'], $_POST['guest_timeout'],  $_POST['persist_not_expire'], $_POST['cookie_expiry'], $_POST['cookie_path']);

        /* Account edit successful */
        if ($retval) {
            $_SESSION['configedit'] = true;
            header("Location: ".BASE_URL."/session-settings.php");
        } else {
            /* Error found with form */
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = Form::getErrorArray();
            header("Location: ".BASE_URL."/session-settings.php");
        }
        /* Syncroniser Token does not match - log user off */
    } else {
        header("Location: process.php");
    }
}

/**
 * ***************************************
 * groupCreation - create a new user group
 * ***************************************
 */
function groupCreation($db){
    $int_options = array("options"=>array("min_range"=>2, "max_range"=>99));
    if (filter_var($_POST['group_level'], FILTER_VALIDATE_INT, $int_options)){
       $grouplevel = $_POST['group_level']; 
    } else {
       header("Location: ".BASE_URL."/usergroups.php");
       exit;
    }
    
    $groupname = (htmlspecialchars($_POST['group_name']));
    
    $sql = $db->prepare("INSERT INTO groups (group_name, group_level) VALUES (:groupname, :grouplevel)");
    $sql->execute(array(':groupname' => $groupname, ':grouplevel' => $grouplevel));
    header("Location: ".BASE_URL."/usergroups.php");
}

/**
 * **********************************************************************************
 * editGroup - edit a User Group's Name, User Level & Membership from editgroup page
 * **********************************************************************************
 */
function editGroup($db){

    $group_id = $_POST['group_id'];
    
    // administrators group will not update because group_level is disabled on editgroup.php modal
    $int_options = array("options"=>array("min_range"=>1, "max_range"=>256));
    if (filter_var($_POST['group_level'], FILTER_VALIDATE_INT, $int_options)){
       $grouplevel = $_POST['group_level']; 
    } else {
       header("Location: ".BASE_URL."/usergroups.php");
       exit;
    }
    
    // Update Group Name and Group Level
    $groupname = (htmlspecialchars($_POST['group_name']));        
    $sql = $db->prepare("UPDATE groups SET group_name = :groupname, group_level = :grouplevel WHERE group_id = '$group_id'");
    $sql->execute(array(':groupname' => $groupname, ':grouplevel' => $grouplevel));
    
    // Update members
    foreach ($_POST['add-user'] as $value) { 
        $application = $db->prepare("INSERT INTO users_groups (user_id, group_id) VALUES (:userid, :group_id)");
        $application->execute(array(':userid' => $value, ':group_id' => $group_id));
    }
    
    header("Location: ".BASE_URL."/usergroups.php");
}

/**
 * ********************************************************
 * removeFromGroup - Remove an individual user from a Group
 * ********************************************************
 */
function removeFromGroup($db, $session, $adminfunctions, $functions){
    
    // Stop Check
    if (isset($_GET['stop'])) {
        $stop = $_GET['stop'];
    } else {
        $stop = '';
    }
    
    if ($adminfunctions->verifyStop($session->username, 'delete-groupmembership', $stop) == '2') {
        
        $userid = $_GET['remove'];
        $group_id = $_GET['group_id'];
        
        if($group_id == '1') { 
            $username = $functions->getUserInfoSingularFromId('username', $userid); 
            $adminfunctions->demoteUserFromAdmin($username);
        }
    
        $delete_user_from_group = $db->prepare("DELETE FROM users_groups WHERE group_id = :group_id AND user_id = :userid");
        $delete_user_from_group->execute(array(':group_id' => $group_id, ':userid' => $userid));

        header("Location: ".BASE_URL."/usergroups.php");
 
    } else {
        header("Location: process.php");
    }
}

/**
 * ****************************************************************************************
 * editGroupMembership - edits an individual users group membership from adminuseredit page
 * ****************************************************************************************
 */
function editGroupMembership($db, $session, $adminfunctions, $functions) {
    
    // Stop Check
    if (isset($_POST['edit-groups'])) {
        $stop = $_POST['edit-groups'];
    } else {
        $stop = '';
    }
    
    if ($adminfunctions->verifyStop($session->username, 'edit-groups', $stop) == '2') {
        
        $userid = $functions->getUserInfoSingular('id', $_POST['usertoedit']);

        // Delete user from all groups before adding him to selected ones (except administrators group)
        $sql = $db->prepare("DELETE FROM users_groups WHERE user_id = '$userid' AND group_id != '1' ");
        $sql->execute();
        
        if (!empty($_POST['groups'])){
            
            foreach ($_POST['groups'] as $value) { 
            $application = $db->prepare("INSERT INTO users_groups (user_id, group_id) VALUES (:userid, '$value')");
            $application->execute(array(':userid' => $userid));
            }
            
        }
        
        header("Location: ".BASE_URL."/adminuseredit.php?usertoedit=" . $_POST['usertoedit']);
        
    } else {
        header("Location: process.php");
    }
}

/**
 * *********************************************
 * deleteGroup - deletes group specified in URL.
 * *********************************************
 */
function deleteGroup($db, $session, $adminfunctions) {

    if (isset($_GET['stop'])) {
        $stop = $_GET['stop'];
    } else {
        $stop = '';
    }

    if ($adminfunctions->verifyStop($session->username, 'delete-group', $stop) == '2') {

        $group_id = $_GET['delete'];

        $sql = $db->prepare("DELETE FROM groups WHERE group_id = :group_id");
        $done = $sql->execute(array(':group_id' => $group_id));
        if ($done) {
            $delete_users_from_group = $db->prepare("DELETE FROM users_groups WHERE group_id = :group_id");
            $delete_users_from_group->execute(array(':group_id' => $group_id));
        }
        header("Location: ".BASE_URL."/usergroups.php");
    } else {
        header("Location: process.php");
    }
}

/**
 * *******************************************************************************
 * activateUsers - function to activate users selected by Admin on the Admin Page.
 * *******************************************************************************
 */
function activateUsers($db, $configs, $functions, $session, $logger) {
    $mailer = new Mailer($db, $configs);
    /* Account edit attempt */
    if (isset($_POST['user_name'])) {
        foreach ($_POST['user_name'] as $username) {
            $sql = $db->prepare("UPDATE users SET USERLEVEL = '3' WHERE username = '$username'");
            $sql->execute();
            $email = $functions->getUserInfoSingular('email', $username);
            $mailer->adminActivated($username, $email);
            $logger->logAction($session->id, "ACTIVATED USER : ".$username );
        }
        header("Location: ".BASE_URL."/useradmin.php#users_activation"); //success
    } else {
        header("Location: ".BASE_URL."/useradmin.php"); //no user selected
    }
}
/**
 * *******************************************************************************
 * mainUserSettingsEdit - edit Global user settings.
 * *******************************************************************************
 */
function mainUserSettingsEdit($adminfunctions, $configs, $session) {
    
    // Stop Check
    if (isset($_POST['mainusersettings'])) {
        $stop = $_POST['mainusersettings'];
    } else {
        $stop = '';
    }
    
    if ($adminfunctions->verifyStop($session->username, 'mainusersettings', $stop) == '2') {
        
        $allow_multiple = $_POST['allow_multi_logins'];        
        $retval = $configs->mainEditUserSettings($allow_multiple);       
        header("Location: ".BASE_URL."/user-settings.php");
        
    } else {
        header("Location: process.php");
    }
}


/**
 * *********************************************
 * userSettingsEdit - edit Global user settings.
 * *********************************************
 */
function userSettingsEdit($adminfunctions, $configs, $session) {
    
    // Stop Check
    if (isset($_POST['usersettings'])) {
        $stop = $_POST['usersettings'];
    } else {
        $stop = '';
    }
    
    if ($adminfunctions->verifyStop($session->username, 'usersettings', $stop) == '2') {
        
        $turn_on_individual = $_POST['turn_on_individual'];
        $home_setbyadmin = $_POST['home_setbyadmin'];
        $user_home_path_byadmin = $_POST['user_home_path_byadmin'];
        $no_admin_redirect = $_POST['no_admin_redirect'];
        
        $retval = $configs->editUserSettings($turn_on_individual, $home_setbyadmin, $user_home_path_byadmin, $no_admin_redirect);
        
        header("Location: ".BASE_URL."/user-settings.php");
        
    } else {
        header("Location: process.php");
    }
}

/**
 * **************************************************************************
 * updateUserHomePage - update individual user homepages in the Users table.
 * **************************************************************************
 */
function updateUserHomePage($db, $adminfunctions, $session) {
    
        // Stop Check
    if (isset($_POST['update_userhome'])) {
        $stop = $_POST['update_userhome'];
    } else {
        $stop = '';
    }
    
    if ($adminfunctions->verifyStop($session->username, 'update_userhome', $stop) == '2') {
        
        $usertoedit = $_POST['usertoedit'];
        $user_home_path = $_POST['user_home_path'];
        $sql = $db->prepare("UPDATE users SET user_home_path = '$user_home_path' WHERE username = '$usertoedit'");
        $sql->execute();
        header("Location: ".BASE_URL."/adminuseredit.php?usertoedit=" . $usertoedit . "#homepage");
        
    } else {
        header("Location: process.php");
    }
    
}

/**
 * *********************************************
 * editAccount - Admin account editing function.
 * *********************************************
 */
function editAccount($adminfunctions, $session) {

    // Stop Check
    if (isset($_POST['edit-user'])) {
        $stop = $_POST['edit-user'];
    } else {
        $stop = '';
    }
    if ($adminfunctions->verifyStop($session->username, 'edit-user', $stop) == '2') {

        $username = $_POST['username'];

        /* Account edit attempt */
        $retval = $adminfunctions->adminEditAccount($_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['newpass'], $_POST['conf_newpass'], $_POST['email'], $_POST['usertoedit'], $_POST['usertoeditid']);

        /* Account edit successful */
        if ($retval) {
            $_SESSION['adminedit'] = true;
            $_SESSION['usertoedit'] = $_POST['usertoedit'];
            header("Location: ".BASE_URL."/adminuseredit.php?usertoedit=" . $username);
        }
        /* Error found with form */ 
        else {
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = Form::getErrorArray();
            header("Location: ".BASE_URL."/adminuseredit.php?usertoedit=" . $_POST['usertoedit'] ."#profile");
        }

        //STOP - Syncroniser Token does not match - log user off
    } else {
        header("Location: process.php");
    }
} // editAccount function end
    