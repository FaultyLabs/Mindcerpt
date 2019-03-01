<div class="container">
    <form class="form-signin" enctype="multipart/form-data" method="post" action="<?php echo URL_ROOT; ?>user/login">
        <div class="text-center mb-4">
            <img class="mb-4" src="/docs/4.2/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">SEUSS</h1>
            <small>Don't have an account? <a href="user/register">Register</a></small>
        </div>
        <?php if ($result):?>
            <li class="list-group-item list-group-item-danger"><?=$result ?></li>
        <?php endif; ?> 

        <div class="form-label-group">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email address" 
            value="<?= $formData ? $formData : ''?>" required autofocus>
        </div>

        <div class="form-label-group">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <div class="checkbox mb-3">
            <label>
            <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <!-- <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p> -->
    </form>
</div>