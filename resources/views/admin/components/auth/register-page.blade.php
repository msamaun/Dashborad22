<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                <form class="register-form">
                    <div class="form-group">
                        <label for="firstName"><i class="fa-solid fa-user"></i></label>
                        <input type="text" name="firstName" id="firstName" placeholder=" Enter Your First Name"/>
                    </div>
                    <div class="form-group">
                        <label for="lastName"><i class="fa-solid fa-user"></i></label>
                        <input type="text" name="lastName" id="lastName" placeholder=" Enter Your Last Name"/>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="fa-solid fa-envelope"></i></label>
                        <input type="email" name="email" id="email" placeholder=" Enter Your Email"/>
                    </div>
                    <div class="form-group">
                        <label for="phone"><i class="fa-solid fa-phone"></i></label>
                        <input type="text" name="phone" id="phone" placeholder=" Enter Your Phone Number"/>
                    </div>
                    <div class="form-group">
                        <label for="address"><i class="fa-solid fa-phone"></i></label>
                        <input type="text" name="address" id="address" placeholder="Enter Your Address"/>
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="fa-solid fa-lock"></i></label>
                        <input type="password" id="password" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                    </div>
                    <div class="form-group form-button">
                        <input onclick="onRegistration()" type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="{{asset('form/images')}}/signup-image.jpg" alt="sing up image"></figure>
                <a href="#" class="signup-image-link">I am already member</a>
            </div>
        </div>
    </div>
</section>
<script>
    async function onRegistration(){
        let postData = {
            "firstName": document.getElementById('firstName').value,
            "lastName": document.getElementById('lastName').value,
            "email": document.getElementById('email').value,
            "phone": document.getElementById('phone').value,
            "address": document.getElementById('address').value,
            "password": document.getElementById('password').value
        }
        showLoader();
        let res =await axios.post('/user-register', postData);
        hideLoader();

        if (res.status===200 && res.data['status'] === 'success') {
            successToast(res.data['message'])
            window.location.href = '/login'
        } else {
            alert(res.data['message'])

        }
    }
</script>
