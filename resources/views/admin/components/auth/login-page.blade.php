<section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="{{asset('form/images')}}/signin-image.jpg" alt="sing up image"></figure>
                <a href="" class="signup-image-link">Forgot Password</a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Sign up</h2>
                <form  class="register-form">
                    <div class="form-group">
                        <label for="email"><i class="fa-solid fa-envelope"></i></label>
                        <input type="email" name="email" id="email" placeholder="Enter Your Email"/>
                    </div>
                    <div class="form-group">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password"  id="password" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                        <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                    </div>
                    <div class="form-group form-button">
                        <input onclick="onLogin()" type="submit" class="form-submit" value="Log in"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    async function onLogin(){
        let email = document.getElementById("email").value;
        let password = document.getElementById("password").value;

        if(email===0){
            errorToast("Please enter email");
        }
        else if(password===0){
            errorToast("Please enter password");
        }
        else{
            showLoader()
            let res = await axios.post("/user-login",{email:email,password:password});
            hideLoader()
            if(res.status===200 && res.data['status'] === 'success'){
                setToken(res.data['token']);
                window.location.href = '/profile';
            }
            else{
                errorToast(res.data['message']);
            }
        }
    }
</script>
