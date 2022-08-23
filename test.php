<div class="mt-2 mb-5" id="login_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #FFA8A8;">
          <h3 class="text-light mx-auto ">Admin LogIn</h3>
        </div>
        <div class="modal-body"style="background-color: #EEEEEE;">
           <center> <span class="text-danger"><?php if(isset($msg)){echo$msg;} ?></span></center>
          <form method="POST">
            <div class="form-group">
            <i class="fa fa-user-o" aria-hidden="true"></i>
              <label>User name </label>
              <input type="text" name="uname" class="form-control">
            </div>
            <div class="form-group mt-1">
              <i class="fa fa-lock prefix grey-text"></i>
              <label>Password </label><br>
              <input type="password" name="password"  id="pass1" onkeyup="match_regex()" class="form-control d-inline">  <i class="fa fa-eye-slash d-inline" id="eye" aria-hidden="true" style="font-size: 23px; cursor: pointer;" onclick="eye_change()"></i>
              <br>
              <span id="msg"></span>
            </div>
            <div class="form-group d-grid gap-2 col-3 mt-4 mx-auto">
               <input type="submit" name="loginbtn" value="Login" class="btn btn-primary ">
            </div>
            <div class="from-group text-center mt-3">
            <a href="admin_registration.php" class="link-primary ">Create new account</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



  <table class="table">
                <tbody>
                  <tr>
                    <td>
                     
                    </td>
                    <td>
                      

                    </td>
                  </tr>
                  <tr>
                    <td>
                     
                    </td>
                    <td>
                      
                    </td>
                  </tr>
                  <tr>
                    <td>
                      
                    </td>
                    <td>
                      
                    </td>
                  </tr>
                </tbody>
              </table>