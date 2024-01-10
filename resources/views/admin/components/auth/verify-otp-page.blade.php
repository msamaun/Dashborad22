<section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="{{asset('form/images')}}/verify-otp.png" alt="sing up image"></figure>
                <a href="{{route('login')}}" class="signup-image-link">Log in now</a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Enter Your OTP</h2>
                <form  class="register-form"">
                    <div class="form-group">
                        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="text" id="otp" placeholder="Enter Your OTP"/>
                    </div>

                    <div class="form-group form-button">
                        <input onclick="onVerify()" type="submit" class="form-submit" value="Next"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    async function onVerify(){
        let postData = {"email":sessionStorage.getItem("email"),
            "otp":document.getElementById("otp").value};

        showLoader();
        let res = await axios.post("/verify-otp",postData);
        hideLoader();
        if(res.status===200 && res.data['status'] === 'success'){
            setToken(res.data['token']);
            window.location.href = '/reset-password';
        }
        else{
            errorToast(res.data['message']);
        }
    }
</script>
