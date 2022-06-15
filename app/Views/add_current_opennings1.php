<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

<style>
    

.note-editable ol li {
  list-style: decimal !important;
  list-style-position: inside !important;
  color:black;
}
.note-editable ul li {
  list-style: disc !important;
  list-style-position: inside !important;
  color:black;
}
.note-editor.note-frame.card {
    margin-bottom: 0;
    box-shadow: none;
    border: 1px solid;
    color: #ccc;
}

/* select 2 textbox border color  */
.select2-container--default .select2-selection--single .select2-selection__rendered {
    border: 1px solid #ccc;

}
</style>
<div class="container" style="padding-top:40px;">
    <section class="">
        <div class="container">
            <div class="row" style="padding-top:80px;">
                <div class="checkout-form-centre">
                    <div class="checkout-login-step">
                        <h1> Add Current Openning Detail</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xl-12 col-md-12">
                    <form action="<?= url('Home/add_current_opennings')?>" method="post" class="ajax-form-submit">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="Name">Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="companyName">Location</label>
                                <input type="text" name="location" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="companyName">Sub Title</label>
                                <input type="text" name="sub_title" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="companyName">Type Of Position</label>
                                <div class="row" style="padding-left:15px;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="full_time"
                                            id="flexCheckDefault" name="type_of_position">
                                        <label class="form-check-label" for="flexCheckDefault" style="padding-top:0">
                                            Full time
                                        </label>
                                    </div>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="part_time"
                                            id="flexCheckChecked" name="type_of_position">
                                        <label class="form-check-label" for="flexCheckChecked" style="padding-top: 0px">
                                            Part Time
                                        </label>
                                    </div>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="freelancing"
                                            id="flexCheckChecked" name="type_of_position">
                                        <label class="form-check-label" for="flexCheckChecked" style="padding-top: 0px">
                                            Freelancing
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="companyName">Description</label>
                                <textarea class="form-control" id="summernote" name="description"></textarea>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="submit-section">
                                    <button type="submit" id="save_data" class="btn btn-primary">Submit</button>
                                    <!-- <button type="submit" class="btn btn-form-submit">Clear form</button> -->
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

</div>
<?= $this->endSection() ?>

  
<?= $this->section('scripts') ?>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
$(document).ready(function() {
   
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
                window.location.href = "<?php echo url('Home/')?>";
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