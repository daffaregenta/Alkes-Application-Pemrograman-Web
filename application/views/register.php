<?php
if($this->session->flashdata('message')){ 
  echo '<div class="alert alert-success">'.$this->session->flashdata('message').'</div>'; 
}
?>
<div class="signup-form">
    <form action="<?php echo base_url('home/registerr'); ?>" method="post">
        <h2>Register</h2>
        <p class="hint-text">Create your account. It's free and only takes a minute.</p>
         <div class="form-group">
            <input type="text" class="form-control" name="nama" placeholder="Nama" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="alamat" placeholder="Alamat" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="nohp" placeholder="No HP" required="required">
        </div>
        <div class="form-group">
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="re-password" placeholder="Confirm Password" required="required">
        </div>        
        <div class="form-group">
            <label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Register Now</button>
        </div>
    </form>
    <div class="text-center">Already have an account? <a href="<?php echo site_url('home/loginn') ?>">Sign in</a></div>
</div>