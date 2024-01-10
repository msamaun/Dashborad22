@extends('admin.layouts.app')
@section('content')
    <div class="" style="margin-left: 280px">
        <div class="card-box height-100-p overflow-hidden">
            <div class="profile-tab height-100-p">
                <div class="tab height-100-p">
                    <ul class="nav nav-tabs customtab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#setting" role="tab" aria-selected="true">Settings</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade height-100-p active show">
                            <div class="profile-setting">
                                <form>
                                    <ul class="profile-edit-list row">
                                        <li class="weight-500 col-md-6">
                                            <h4 class="text-blue h5 mb-20">Edit Your Personal Setting</h4>
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input class="form-control form-control-lg" type="text" id="firstName">
                                            </div>
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input class="form-control form-control-lg" type="text" id="lastName">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control form-control-lg" type="email" id="email">
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input class="form-control form-control-lg date-picker" type="text" id="phone">
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input class="form-control form-control-lg date-picker" type="text" id="address">
                                            </div>
                                            <div class="form-group mb-0">
                                                <input onclick="onUpdate()" type="submit" class="btn btn-primary" value="Update">
                                            </div>
                                        </li>
                                        <li class="weight-500 col-md-6">
                                            <h4 class="text-blue h5 mb-20">Edit Social Media links</h4>
                                            <div class="form-group">
                                                <label>Facebook URL:</label>
                                                <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                            </div>
                                            <div class="form-group">
                                                <label>Twitter URL:</label>
                                                <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                            </div>
                                            <div class="form-group">
                                                <label>Linkedin URL:</label>
                                                <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                            </div>
                                            <div class="form-group">
                                                <label>Instagram URL:</label>
                                                <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                            </div>
                                            <div class="form-group">
                                                <label>Dribbble URL:</label>
                                                <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                            </div>
                                            <div class="form-group">
                                                <label>Dropbox URL:</label>
                                                <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                            </div>
                                            <div class="form-group">
                                                <label>Google-plus URL:</label>
                                                <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                            </div>
                                            <div class="form-group">
                                                <label>Pinterest URL:</label>
                                                <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                            </div>
                                            <div class="form-group">
                                                <label>Skype URL:</label>
                                                <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                            </div>
                                            <div class="form-group">
                                                <label>Vine URL:</label>
                                                <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                            </div>
                                            <div class="form-group mb-0">
                                                <input type="submit" class="btn btn-primary" value="Save &amp; Update">
                                            </div>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <script>
       getProfile();

       async function getProfile(){
           showLoader()
               let res = await axios.get('/user-profile', HeaderToken());
           hideLoader()

               document.getElementById('firstName').value = res.data['firstName']
               document.getElementById('lastName').value = res.data['lastName']
               document.getElementById('email').value = res.data['email']
               document.getElementById('phone').value = res.data['phone']
               document.getElementById('address').value = res.data['address']

       }

       async function onUpdate(){
           let postData = {
               "firstName": document.getElementById('firstName').value,
               "lastName": document.getElementById('lastName').value,
               "phone": document.getElementById('phone').value,
               "address": document.getElementById('address').value
           }

           showLoader()
           let res = await axios.post('/user-profile-update', postData, HeaderToken());
           hideLoader()

           if(res.data['status'] === 'success'){
               successToast(res.data('message'))
               await getProfile();
           }
           else{
               errorToast(res.data('message'))
           }
       }
   </script>

@endsection

