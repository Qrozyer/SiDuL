<div class="container mt-4">
        <div class="row">
            <div class="text-center col-md-6 offset-md-3">
                <?php Flasher::flash(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs" id="tabContent">
                            <li class="nav-item">
                                <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab">Register</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body tab-content" id="myTabContent">
                        <!-- Login Form -->
                        <div class="tab-pane fade show active" id="login" role="tabpanel">
                            <h4 class="card-title m-2">Login</h4>
                            <form id="loginForm" action="<?= BASEURL; ?>/user/login" method="post">
                                <div class="form-group m-2">
                                    <label for="loginEmail">Email</label>
                                    <input type="email" class="form-control" id="loginEmail" name="email" placeholder="Enter email" required>
                                </div>
                                <div class="form-group m-2">
                                    <label for="loginPassword">Password</label>
                                    <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Enter password" required>
                                </div>
                                <button type="submit" name="login" class="btn btn-primary m-2">Login</button>
                            </form>
                        </div>
                        <!-- Registration Form -->
                        <div class="tab-pane fade" id="register" role="tabpanel">
                            <h4 class="card-title m-2">Register</h4>
                            <form id="registerForm" action="<?= BASEURL; ?>/user/signup" method="post">
                                <div class="form-group m-2">
                                    <label for="registerUsername">Username</label>
                                    <input type="text" class="form-control" id="registerUsername" name="username" placeholder="Enter username" required autocomplete="off">
                                </div>
                                <div class="form-group m-2">
                                    <label for="registerEmail">Email</label>
                                    <input type="email" class="form-control" id="registerEmail" name="email" placeholder="Enter email" required autocomplete="off">
                                </div>
                                <div class="form-group m-2">
                                    <label for="registerPassword">Password</label>
                                    <input type="password" class="form-control" id="registerPassword" name="password" placeholder="Enter password" required>
                                </div>
                                <div class="form-group m-2">
                                    <label for="registerConfirmPassword">Confirmation Password</label>
                                    <input type="password" class="form-control" id="registerConfirmPassword" name="password2" placeholder="Enter confirmation password" required>
                                </div>
                                <button type="submit" name="signup" class="btn btn-success m-2">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>