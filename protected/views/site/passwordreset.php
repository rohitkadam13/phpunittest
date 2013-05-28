<b>
<?php 
echo Yii::app()->user->getFlash('msg');
?>
</b>

<form method="POST">
Email: <input type="text" name="user_email">
<br /><br />
New Password: <input type="password" name="user_pwd">
<br /><br />
<input type="submit" value="Send">
</form>