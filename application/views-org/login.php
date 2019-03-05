<div id="main" class="site-main">
<header class="page-header">
<h1 class="page-title">Login</h1>
</header>
<div id="primary" class="content-area">
<div id="content" class="container" role="main">
<article id="post-1671" class="post-1671 page type-page status-publish hentry">
<div class="entry-content">
<div style="border:0px solid red; text-align: center;">
<?php if( $this->session->flashdata('message') == 'Invalid login credentails!'): ?>
	<div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('message'); ?></div>
<?php endif; ?>
<?php if($message != ''): ?>
<div class="alert alert-danger" role="alert"><?php echo $message?></div>
<?php endif; ?>
</div>
<form name="loginform" id="loginform" action="<?php echo $loginAction; ?>" method="post">
<p class="login-username">
<label for="user_login">Email</label>
<input type="email" name="email" id="email" class="input" value="<?php echo set_value('email'); ?>" size="20"/>
</p>
<p class="login-password">
<label for="user_pass">Password</label>
<input type="password" name="pwd" id="user_pass" class="input" value="" size="20"/>
</p>
<p class="has-account"><i class="icon-help-circled"></i> <a href="<?php echo $forgotPassword; ?>">Forgot Password?</a></p>
<!-- <p class="login-remember"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever" checked="checked"/> Remember Me</label></p> -->
<p class="login-submit">
<input type="hidden" name="next_url" value="<?php echo $_SERVER["HTTP_REFERER"]; ?>" >
<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Sign In"/>
</p>
</form>
</div>
</article>
<div class="row">
<div id="comments" class="comments-area col-md-9 col-md-offset-3">
</div>
</div>	</div>
<div class="paginate-links container">
</div>
</div>
</div>