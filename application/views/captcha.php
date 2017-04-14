<html>
<head>
<title>Adding a Captcha! by Rogerio Reis</title>
</head>
<body>
<h1>Captcha Example</h1>
<?php echo form_open('captcha'); ?>
<div class="formSignIn" >
  <div class="form-group">
    <input autocomplete="off" type="text" id="username" name="username" placeholder="User Email" value="<?php if(!empty($username)){ echo $username;} ?>" />
    <span class="required-server"><?php echo form_error('username','<p style="color:#F83A18">','</p>'); ?></span> </div>
  <div class="form-group">
    <input autocomplete="off" type="password" id="user_password" name="user_password" placeholder="User Password" value="" />
    <span class="required-server"><?php echo form_error('user_password','<p style="color:#F83A18">','</p>'); ?></span> </div>
  <div class="form-group">
    <label for="captcha"><?php echo $captcha['image']; ?></label>
    <br>
    <input type="text" autocomplete="off" name="userCaptcha" placeholder="Enter above text" value="<?php if(!empty($userCaptcha)){ echo $userCaptcha;} ?>" />
    <span class="required-server"><?php echo form_error('userCaptcha','<p style="color:#F83A18">','</p>'); ?></span> </div>
  <div class="form-group">
    <input type="submit" class="btn btn-success" value="Sign In" name="" />
  </div>
</div>
<?php echo form_close(); ?>
</body>
</html>
