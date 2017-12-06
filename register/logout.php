<?php
require_once ('../includes/session.php');

                //setcookie('user','', time()-(60*60*24),"/");
                foreach ($_COOKIE['user'] as $name => $value) {
                    //echo $name.' '. $value. '<br />';
                    setcookie('user['.$name.']','', time()-(60*60*24),"/");
                }
                redirect ('../index.php?logout=true');
                

?>

