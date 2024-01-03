<?php

?>

<div class="login">
    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <!-- Reset Password Form -->
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="title mb-4 pb-3">New Password</h4>
                                            <form method="post" action="index.php?page=newpassword"
                                                  enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-style"
                                                           placeholder="Your New password" id="password" autocomplete="off" required>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-style"
                                                           placeholder="Confirm Your New password" id="password" autocomplete="off" required>
                                                </div>
                                                <button type="submit" name="newPassword" class="login1  btn mt-4 hover:bg-blue-900 py-2 px-4">
                                                    Submit
                                                </button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Reset Password Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
