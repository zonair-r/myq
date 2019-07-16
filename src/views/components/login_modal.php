   <!-- USER Sign In Sign Up MODAL -->
   <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="userModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                </div>
                <div class="modal-body">
                    <form id = "loginForm">
                        <div class="form-group">
                            <input type="email" class="form-control mb-2" placeholder="Email" id="femail">
                            <input type="text" class="form-control mb-2" placeholder="Password" id="fpassword">
                            <!-- <input type="password" class="form-control mb-2" placeholder="Confirm password"> -->
                            <p id="info"></p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" id="loginBtn">Login</button>
                </div>
            </div>
        </div>
    </div>