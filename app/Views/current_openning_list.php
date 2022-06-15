<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>


<table id="" class="table table-striped" style="width:100%">
    <thead>
        <h1 class="text-left p-3">
            <div class="row">
                <div class="col-md-6" style="">
                    Current Openning Detail
                </div>
                <div class="text-right col-md-6" style="">
                    <a class="btn btn-info" style="background:#F4A850;border:0px;" title="Edit"
                        href="<?= url('Home/add_current_opennings/');?>">Add Current opennings</a>
                </div>
        </h1>
        </div>
        <tr>
            <th>Title</th>
            <th>Location</th>
            <th>Sub-Title</th>
            <th>Type Of Position</th>
            <!-- <th>Description</th> -->
            <th colspan="3">Action</th>

        </tr>
    </thead>
    <?php foreach($current_openning as $row){ ?>
    <tr>
        <td><?= $row['title'] ?></td>
        <td><?=$row['location'] ?></td>
        <td><?=$row['sub_title'] ?></td>
        <td><?=$row['type_of_position'] ?></td>
        <!-- <td><?=$row['description']?><td> -->
        <td style="display:none"><span id="text<?=$row['id']?>"
                style=""><?= url('Home/apply_for_job/').$row['id']?></span></td>
        <td><a title="Edit" href="<?= url('Home/add_current_opennings/').$row['id']?>"><i class="fa fa-pencil"
                    style="color:#F4A850;"></i></a></td>
        <td><a title="Delete" onclick="editable_remove(this)" data-val="<?=$row['id'];?>" data-pk="<?=$row['id'];?>"
                tabindex="-1"><i class="fa fa-trash" style="color:#F4A850;"></i></a></td>
        <td><button style="border:0px;" title="Copy" onclick="copyToClipboard('#text<?=$row['id']?>')"><i
                    class="fa fa-clipboard" style="color:#F4A850;"></i></button></td>

    </tr>
    <?php } ?>


</table>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>

<script>
function copyToClipboard(element) {
    //alert(element);
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
}

function editable_remove(data_edit) {
    // alert("hello");return;
    var type = 'Remove';

    var data_val = $(data_edit).data('val');

    var ot_title = $(data_edit).attr('title');
    var pkno = $(data_edit).data('pk');
    swal.fire({
        title: "Are you sure Remove " + ot_title + " ?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel plx!",
    }).then((result) => {
        if (result.value) {
            _data = $.param({
                pk: pkno
            }) + '&' + $.param({
                val: data_val
            }) + '&' + $.param({
                type: type
            }) + '&' + $.param({
                method: "current_opennings"
            });
            if (data_val != undefined && data_val != '') {
                $.post("<?=base_url()?>/Home/Action/Update", _data, function(data) {

                    if (data.st == 'success') {
                        //datatable_load('');
                        swal.fire("Deleted!", "Your imaginary file has been deleted.", "success");
                        window.location.href = "<?php echo url('Home/current_opennings_list')?>";

                    }

                });
            }

        } else {
            swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
        // })}
    });
}
</script>
<?= $this->endSection() ?>