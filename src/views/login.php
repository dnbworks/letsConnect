<div class="row justify-content-center">
    <div class="col-12 col-md-6 col-lg-5">
        <h3>FindMyDate - Sign In</h3>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <div>
                    <input type="text" class="form-control <?php echo $model->hasError("username") ? 'isInvalid' : ''; ?>" id="username" placeholder="Username" name="username" value="<?php echo $model->username; ?>">
                    <p class="valid-feedback">correct</p>
                    <p class="invalid"><?php echo $model->getFirstError("username"); ?></p>
                </div>
                
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div>
                    <input type="password" class="form-control <?php echo $model->hasError("password") ? 'isInvalid' : ''; ?>" id="password" placeholder="Password" name="password" value="<?php if (!empty($password1)) echo $password1;   ?>">
                    <p class="invalid"><?php echo $model->getFirstError("password"); ?></p>
                </div>
            </div>
            
            <div class="form-group">
                <div>
                    <button type="submit" class="btn btn-primary" name="submit">Sign In</button>
                </div>
            </div>
        </form>
           
    </div>
</div>


