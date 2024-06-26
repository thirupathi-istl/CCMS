<div class="container">
    <div class="row d-flex justify-content-center mt-3 p-0 m-0 p-3 ">
        <div class="col-xl-4 col-md-8 col-sm-10 shadow rounded border bg-body-tertiary" >
            <div class="d-flex justify-content-center w-100 mt-3">
                <div class="d-flex justify-content-center rounded-circle p-3 border bg-body circle-logo">
                    <img id="istl-logo-login-1" src="<?php echo BASE_PATH;?>assets/logos/istl_light.png" alt="Logo" />
                </div>
            </div>
            <form class="mt-3 d-flex justify-content-center" method="post">
                <div class="w-75">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="email" placeholder="Email ID" required>
                        <label for="email" >User ID</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary w-50 mb-3" type="submit">Login</button>
                    </div>
                </div>

            </form>
            <div class="d-flex justify-content-center col-12">
                <span class="text-danger"><?php echo $login_error;   ?></span>
            </div>
            <div class="d-flex justify-content-center">
                <a href="#" id="open_fp_model" class="nav-link text-primary ">Forgot your password?</a>
            </div>
            <div class="d-flex justify-content-center mt-2">
                Don't have an account? <a href="#" class="ms-2 nav-link text-primary" id="liveToastBtn">Sign Up</a>
            </div>
            <div class="d-flex justify-content-center my-3">
                <a href="#" title="iScientific" class="brand-tag d-flex justify-content-center align-item-center" >
                    <div class="brand-img">
                        <img id="istl-logo-login" class="logo-img" src="<?php echo BASE_PATH;?>assets/logos/istl_light.png" alt="iScientific">
                    </div>
                    <div>
                        <span class="brand-title text-body-emphasis ml-2" >© iScientific TechSolutions Labs Pvt Ltd</span>
                        <span class="brand-tag ms-2 ms-sm-3"> Energizing Quality and Accountability</span>
                    </div>
                </a>
            </div>
            <div class="d-flex justify-content-center links font-small">
                <p>By Proceeding you agree to the <a href="http://istlabs.in/terms-and-conditions.html" target="_blank"  class="text-decoration-none">Terms of Use</a> and <a href="http://istlabs.in/policy.html" target="_blank"  class="text-decoration-none">Privacy Policy</a>
                </p>
            </div>

        </div>
    </div>
</div>