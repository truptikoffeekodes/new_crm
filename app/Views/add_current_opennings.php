<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

<style>
label {
    margin: 0 0 10px 0;
}

.form-group {
    margin: 15px 0;
}

.form-control {
    border: 1px solid #000 !important;
}

.submit-section {
    margin: 0 auto;
    text-align: center;
}

:is(.btn-submit, .btn-form-submit) {
    margin: 8px 10px 0 0;
    padding: 8px 45px !important;
    background-color: #F4A850 !important;
    border-radius: 20px !important;
    font-weight: 600 !important;
}

.note-editable ol li {
    list-style: decimal !important;
    list-style-position: inside !important;
    color: black;
}

.note-editable ul li {
    list-style: disc !important;
    list-style-position: inside !important;
    color: black;
}

.note-editor.note-frame.card {
    margin-bottom: 0;
    box-shadow: none;
    border: 1px solid;
    color: #ccc;
}
</style>

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->




<form action="<?= url('Home/add_current_opennings')?>" method="post" class="ajax-form-submit">
    <div class="container" style="padding: 25px;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h3 style="margin-bottom: 15px;font-weight: 400;">Add Current Openning Details</h3>
            </div>
            <div class="form-group col-md-6">
                <label for="Name">Title</label>
                <input type="text" value="<?=@$current_opennings['title'];?>" name="title" class="form-control" required>
                <input type="hidden" value="<?=@$current_opennings['id'];?>" name="id" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="companyName">Sub Title</label>
                <input type="text" name="sub_title" value="<?=@$current_opennings['sub_title'];?>" class="form-control" required>
            </div>
            <div class="form-group col-md-12">
                <label for="companyName">Location</label>
                <input type="text" name="location" value="<?=@$current_opennings['location'];?>" class="form-control" required>
            </div>

            <div class="form-group col-md-12">
                <label for="companyName">Type Of Position</label>
                <div class="row">
                    <div class="col-md-12 d-md-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="full_time" id="flexCheckDefault"
                                name="type_of_position"  <?=@$current_opennings['type_of_position'] == 'full_time' ?"checked":" " ?>>
                            <label class="form-check-label" for="flexCheckDefault" style="padding-top:0">
                                Full time
                            </label>
                        </div>

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="part_time" id="flexCheckChecked"
                                name="type_of_position" <?=@$current_opennings['type_of_position'] == 'part_time' ?"checked":" " ?>>
                            <label class="form-check-label" for="flexCheckChecked" style="padding-top: 0px">
                                Part Time
                            </label>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="freelancing" id="flexCheckChecked"
                                name="type_of_position" <?=@$current_opennings['type_of_position'] == 'freelancing' ?"checked":" " ?>>
                            <label class="form-check-label" for="flexCheckChecked" style="padding-top: 0px">
                                Freelancing
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="companyName">Description</label>
                <textarea class="form-control" id="summernote" name="description" value=""><?=@$current_opennings['description'];?></textarea>
            </div>

        </div>
        <div class="form_proccessing text-success"></div>
        <div class="error-msg text-danger"></div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="submit-section">
                    <button type="submit" id="save_data" class="btn btn-submit">Submit</button>
                    <a href="<?= url('Home/current_opennings_list')?>" class="btn btn-info" style="margin: 8px 10px 0 0;
    padding: 8px 45px !important;
    background-color: #F4A850 !important;
    border-radius: 20px !important;
    font-weight: 600 !important;color:black;border:0px;">cancle</a>
                </div>
            </div>
        </div>
    </div>
</form>

<?= $this->endSection() ?>


<?= $this->section('scripts') ?>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>

$(document).ready(function() {
    //alert("erkghtrjl");
   
   $('#summernote').summernote({
   
       placeholder: 'Enter Short Description',
       tabsize: 3,
       height: 200,
       toolbar: [
           // [groupName, [list of button]]
           ['style', ['bold', 'italic', 'underline', 'clear']],
           ['font', ['strikethrough', 'superscript', 'subscript']],
           ['fontsize', ['fontsize']],
           ['color', ['color']],
           ['para', ['ul', 'ol', 'paragraph']],
           ['height', ['height']]
       ]
   });
});
$('.ajax-form-submit').on('submit', function(e) {
   $('#save_data').prop('disabled', true);
   $('.error-msg').html('');
   $('.form_proccessing').html('Please wait...');
   e.preventDefault();
   var aurl = $(this).attr('action');
   var form = $(this);
   var formdata = false;
   if (window.FormData) {
       formdata = new FormData(form[0]);
   }
   $.ajax({
       type: "POST",
       url: aurl,
       cache: false,
       contentType: false,
       processData: false,
       data: formdata ? formdata : form.serialize(),
       success: function(response) {
           if (response.st == 'success') {

               swal("success!", "Your data insert successfully!", "success");
               window.location.href = "<?php echo url('Home/current_opennings_list')?>";
           } else {
               $('.form_proccessing').html('');
               $('#save_data').prop('disabled', false);
               $('.error-msg').html(response.msg);
           }
       },
       error: function() {
           $('#save_data').prop('disabled', false);
           alert('Error');
       }
   });
   return false;
});
</script>
<?= $this->endSection() ?>