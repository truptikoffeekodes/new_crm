<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>



    <section class="current-open" style="min-height: 100vh;">
        <div class="row">
            <div class="apply">
                <p><?=$current_openning['title'];?></p>
                <a href="#"><?=$current_openning['location'];?></a>
            </div>
            <div class="apply-btn-section" style="position: relative;right: -7%;">
                <a href="" data-toggle="modal" data-target="#exampleModal">Apply for this Job</a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="all-details">
                    <h1><?=$current_openning['title'];?> :</h1>
                    <p><?=$current_openning['sub_title'];?>:</p>
                    <h1><?=$current_openning['description'];?></h1>
                    <!--<ul>-->
                    <!--    <li> Degree in computer science, a related field, or equivalent work experience (7+ years).</li>-->
                    <!--    <li>Strong communication skills (both written and verbal).</li>-->
                    <!--    <li> Extensive experience with Java and Python.</li>-->
                    <!--    <li> Extensive experience with reactive programming (ex, Akka, Spring Reactive).</li>-->
                    <!--    <li>A deep understanding of AWS Cloud technologies and how to create scalable multi-region applications.</li>-->
                    <!--    <li>Experience with the following technologies: AWS Serverless and serverless-supported languages.</li>-->
                       
                    <!--    <li>SQL and NoSQL experience (ex, MySQL, Cassandra, DynamoDB).</li>-->
                    <!--    <li>Streaming technologies (Amazon Kinesis, Kafka).</li>-->
                    <!--    <li> Message Queues (SQS, RabbitMQ, ActiveMQ).</li>-->
                    <!--    <li> Comfort working within an agile development cycle and exposure to:</li>-->
                    <!--    <li> Linux development</li>-->
                    <!--    <li> Git and versioning software.</li>-->
                    <!--    <li>Build systems (Maven, SBT, Gradle, etc) and common build patterns.</li>-->
                    <!--    <li>Extensive experience with containerization (Docker, Kubernetes, etc).</li>-->
                    <!--    <li>Extensive experience with Micro-Service architectures.</li>-->
                    <!--</ul>-->
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3>Apply For Job</h3>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xl-12 col-md-12">
                        <form action="<?= url('Home/apply_for_job')?>" method="post"  enctype="multipart/form-data" class="ajax-form-submit" >
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="Name">Full Name <span>*</span></label>
                                        <input type="text" name="name" class="form-control" required>
                                        <input type="hidden" name="jid" class="form-control" value="<?=@$id;?>">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="companyName">Email Address <span>*</span></label>
                                        <input type="text" name="email" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="contactNumber">Phone </label>
                                        <input type="text" name="contact" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="uploadfile">Upload File </label>
                                        <!-- <div class="pt-1">
                                            <input type="file" name="image" id="file-input" class="file-browser">
                                        </div> -->
                                        <!-- <div class="pt-1"> -->
                                        <input type="file" name="image" id="file-input" class="form-control">
                                            <!-- <input type="file" name="image" id="file" class="file-control"> -->
                                        <!--</div>-->
                                        <!-- <input type="file" name="image" id="file-input" class="form-control"> -->
                                        <!-- <label for="file-input"  class="form-control" style="padding-top: 5px;font-size:20px;font-weight: 700">
                                            <i class="fa fa-paperclip" style="padding: 10px"></i>
                                        </label> -->
                                    </div>
                                </div>
                                <div class="visa">
                                    <h6>Visa Status:</h6>
                                    <div class="row">
                                        <div class="form-group">
                                            <input type="radio" id="Men" value="us citizen" name="visa">
                                            &nbsp;&nbsp;&nbsp;
                                            <span style="padding-top: 15px;">US CITIZEN</span>
                                        </div>
                                        <div class="form-group">
                                            <input type="radio" id="Boy" value="gc" name="visa">
                                            &nbsp;&nbsp;&nbsp;
                                            <span style="padding-top: 15px;">GC </span>
                                        </div>
                                        <div class="form-group">
                                            <input type="radio" id="Women" value="ead" name="visa">
                                            &nbsp;&nbsp;&nbsp;
                                            <span style="padding-top: 15px;">EAD </span>
                                        </div>
                                        <div class="form-group">
                                            <input type="radio" id="H1B" value="h1b" name="visa">
                                            &nbsp;&nbsp;&nbsp;
                                            <span style="padding-top: 15px;">H1B </span>
                                        </div>
                                        <div class="form-group">
                                            <input type="radio" id="OTHER" value="other" name="visa">
                                            &nbsp;&nbsp;&nbsp;
                                            <span style="padding-top: 15px;">OTHER </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="submit-section">
                                            <button type="submit" id="save_data" class="btn btn-form-submit">Send</button>
                                            <button type="submit" class="btn btn-form-submit">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
    afterload('');
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
            //alert(response);
            if (response.st == 'succsess') {
                //alert("vfdnfbmnv");
                swal("success!", "Your data insert successfully!", "success");
                // datatable_load('');
                // $('#save_data').prop('disabled', false);
                window.location.href = "<?php echo url('Home/current_opening')?>";
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