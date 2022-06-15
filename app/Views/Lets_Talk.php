<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>


    <section class="lets-talk" style="min-height: 100vh">
        <div class="container">
            <div class="row">
                <div class="checkout-form-centre">
                    <div class="checkout-login-step">
                        <h1 style="font-size: 40px;font-weight: 800;">Drop a line</h1>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12 col-sm-12 col-xl-12 col-md-12">
                <form action="<?= url('Home/lets_talk')?>" method="post" class="ajax-form-submit">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="Name">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="companyName">Email Address</label>
                                <input type="text" name="email"class="form-control" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="contactNumber">Message</label>
                                <textarea type="text" class="form-control" name="message" id="inputMessage"
                                    rows="4"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="submit-section">
                                    <button type="submit" id="save_data" class="btn btn-form-submit">Submit</button>
                                    <!-- <button type="submit" class="btn btn-form-submit">Clear form</button> -->
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>


    <?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
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
                // datatable_load('');
                // $('#save_data').prop('disabled', false);
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