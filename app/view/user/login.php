<?php
if(!empty($_SESSION['userName']) && !empty($_SESSION['id'])){
    echo "<p class='hello'>Logined</p>";
}
else{
    include BASE_PATH . '/app/view/authForm.php';  
}
?>