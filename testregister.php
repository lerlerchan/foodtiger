<?php
include "connection.php";
// 想知道以下字符从哪里来，可参见 password_hash() 的例子
$hash = '$2y$10$bIw3AWv0zXacU1JEWELMq.9.nVOZHQtQm3TGzgZ8Yxfxsm6LSp4d2';

if (password_verify('1', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>