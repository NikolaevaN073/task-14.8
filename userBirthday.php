<?php 

if (!empty($_POST)) { 
    require 'functions.php';   

    $birthDate = $_POST['birthDate'] ?? null;

    if (null !== $birthDate) {
        $birthday = date($birthDate);            
        
        $data = 'data.php';
        $users = explode(PHP_EOL, file_get_contents($data));
        $currentUserLogin = getCurrentUser();
        $currentUserData = '';
        $key = null;
        
        foreach ($users as $user) {   
            if (str_contains($user, $currentUserLogin)) {
                if (!str_contains($user, 'birthday')) {
                    $key = array_search($user, $users);
                    $currentUserData = substr($user,0,strlen($user)-3).",'birthday' => '".$birthday."'],";                    
                }                
            }              
        }  
        $users[$key] = $currentUserData;
        $users = implode(PHP_EOL, $users);        
        file_put_contents($data, $users);
        header("Location: index.php");
    }    
}
?>

<html>
<body> 
    <div class="birthdayForm">
        <form id="userBirthday" action="userBirthday.php" method="POST">
            <label for="birthDate">Введите дату рождения: </label>
            <input name="birthDate" type="date" required>
            <input name="submit" class="btn-light" type="submit" value="Отправить">         
        </form> 
    </div>               
</body>
</html>
<script>
    const userBirthday = document.querySelector('#userBirthday');
    userBirthday.addEventListener('submit', () => {
        userBirthday.style.visibility = "hidden";
    })
</script>
