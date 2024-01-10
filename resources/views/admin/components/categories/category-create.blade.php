<div class="mt-30" style="margin-left: 280px">
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                </div>
            </div>
        </div>

        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-blue h4">Create Category </h4>
                    <p class="mb-30"></p>
                </div>
            </div>
            <form id="SaveCategory">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Category Name</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" id="categoryName" placeholder="Category Name">
                    </div>
                </div>

                <button type="submit" onclick="SaveCategory()"  class="btn btn-primary btn-lg justify-content-right">Add</button>
                <button type="reset" class="btn btn-secondary btn-lg justify-content-right">Cancel</button>
            </form>
        </div>


    </div>
</div>

<script>
    async function SaveCategory() {

            let categoryName = document.getElementById('categoryName').value;

            showLoader();
            let response = await axios.post('/create-category',{name:categoryName},HeaderToken())
            hideLoader();

            if(response.data['status'] === 'success'){
                successToast(response.data['message']);
                document.getElementById('SaveCategory').reset();
                location.reload();
            }
            else{
                errorToast(response.data['message']);
            }

    }
</script>
