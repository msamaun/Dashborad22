<section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="{{asset('form/images')}}/sent-otp.png" alt="sing up image"></figure>
                <a href="{{route('login')}}" class="signup-image-link">Log in now</a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Sent OTP</h2>
                <form  class="register-form">
                    <div class="form-group">
                        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="email"id="email" placeholder="Your  Email"/>
                    </div>

                    <div class="form-group form-button">
                        <input onclick="onSentOtp()" type="submit"  class="form-submit" value="Sent OTP"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    async function onSentOtp(){
        let postData = {
            email: document.getElementById("email").value}
        showLoader()
        let res = await axios.post("/user-send-otp",postData);
        hideLoader()
        if(res.status===200 && res.data['status'] === 'success'){
            sessionStorage.setItem("email",document.getElementById("email").value);
            window.location.href = '/verify-otp';
        }
        else{
            errorToast(res.data['message']);
        }
    }
</script>
