<section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="{{asset('form/images')}}/reset-password.png" alt="sing up image"></figure>
                <a href="{{route('login')}}" class="signup-image-link">Log in now</a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Change Your Password</h2>
                <form class="register-form">
                    <div class="form-group">
                        <label for="password"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="password"  id="password" placeholder="Enter Your Password"/>
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="password"  id="confirm password" placeholder="Enter Your Confirm Password"/>
                    </div>

                    <div class="form-group form-button">
                        <input onclick="resetPassword()" type="submit" class="form-submit" value="Reset Password"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    async function resetPassword(){
        let postData = {
            "password": document.getElementById('password').value,
        }
        showLoader();
        let response = await axios.post('/user-reset-password', postData,HeaderToken());
        hideLoader();
        if(response.status===200 && response.data['status']==='success'){
           successToast(response.data['message']);
            window.location.href = '/login';
        }else{
            errorToast(response.data['message']);

        }
    }
</script>
