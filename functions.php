<?php 

function getUsersList() 
{    
    require 'data.php';    
    return $users;
}

function existsUser($login) 
{
    $users = getUsersList();    
    foreach ($users as $user) {
        if ($user['login'] === $login) {
            return $login;
        }
    }
    return null;
}

function checkPassword($login, $password) 
{    
    $users = getUsersList(); 
    foreach ($users as $user) {
        if ($user['login'] === $login && $user['password'] === $password) {
            return true;
        }         
    }
    return false;
}

function getCurrentUser() 
{
    $currentUsername = $_COOKIE['username'] ?? null;
    $currentUserPassword = $_COOKIE['password'] ?? null;

    return checkPassword($currentUsername, $currentUserPassword) ? $currentUsername : null;    
}    

function getUserBirthday($currentUsername)
{
    $users = getUsersList();
    foreach ($users as $user) {
        if ($user['login'] === $currentUsername) {
            return $user['birthday'] ?? null;
        }      
    }
}

function getDaysToBirthday() 
{
    $currentUser = getCurrentUser();
    $userBirthday = getUserBirthday($currentUser);
    $today = date('Y-m-d');

    $yy = substr($today, 0, 4);
    $mm = substr($userBirthday, 5, 2);
    $dd = substr($userBirthday, -2, 2);

    $birthdayThisYear = mktime(0, 0, 0, $mm, $dd, $yy);    
    $birthdayNextYear = mktime(0, 0, 0, $mm, $dd, $yy + 1);
    $today = strtotime($today);

    if ($today < $birthdayThisYear) {
        return round(($birthdayThisYear - $today) / (60 * 60 * 24)); 
    } elseif ($today > $birthdayThisYear) {
        return round(($birthdayNextYear - $today) / (60 * 60 * 24)); 
    } else {
        return 'today';
    }
}
