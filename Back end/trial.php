<?php
$action=$_REQUEST['action'];
if ($action=="") /** display the contact form */
{
?>
<form action="" method="POST" enctype="multipart/form-data">
<input type="hidden" name="action" value="submit">
Your name:<br>
<input name="name" type="text" value="" size="30"/><br>
Your email:<br>
<input name="email" type="text" value="" size="30"/><br>
Your message:<br>
<textarea name="message" rows="7" cols="30"></textarea><br>
<input type="submit" value="Send email"/>
</form>
<?php
}