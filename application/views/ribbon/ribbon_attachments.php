<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Ribbons</h4>
                        <?php if ($this->session->flashdata('error')){ ?>
                            <div class="badge badge-danger"><?= $this->session->flashdata('error');?></div>
                        <?php } ?>
                        <?php if ($this->session->flashdata('success')){ ?>
                            <div class="badge badge-success"><?= $this->session->flashdata('success');?></div>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Option Type</th>
                                    <th>Multiple</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $ids = [];
                                $i=1;
                                foreach ($attachments as $key => $attachment) {

                                   foreach ($allAttachments as $k => $allAttachment){
                                       if ($allAttachment->id == $attachment->id){
                                           unset($allAttachments[$k]);
                                       }
                                   }

                                    ?>
                                    <tr>
                                        <td><?= $i;?></td>
                                        <td><?= $attachment->option_type?></td>
                                        <td><?= $attachment->multiple?></td>
                                        <td><?= $attachment->name?></td>
                                        <td class="py-1">
                                            <img style="width: 25%; height: 100%; border-radius: 0;" src="<?= base_url().$attachment->image?>" alt="image"/>
                                        </td>
                                        <td>
                                            <a href="#" type="button" class="btn-sm btn-danger btn-icon-text">Delete <i class="ti-file btn-icon-append"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Attach Attachment </h4>

                        <?php if ($this->session->flashdata('error')){ ?>
                            <div class="badge badge-danger"><?= $this->session->flashdata('error');?></div>
                        <?php }
                        if ($this->session->flashdata('success')){ ?>
                            <div class="badge badge-success"><?= $this->session->flashdata('success');?></div>
                        <?php }

                        echo validation_errors(); ?>

                        <form class="forms-sample" enctype="multipart/form-data" method="post" action="<?= base_url()?>index.php/ribbon/attachAttachmentRibbon">
                                <input name="ribbon_id" type="hidden" value="<?= $ribbon[0]->id?>">

                            <div class="form-group">
                                <label for="exampleInputUsername1">Select Ribbon Attachment</label>
                                <?php $i = 1;
                                foreach ($allAttachments as $key => $attachment) { ?>
                                    <div class="form-check form-check-flat form-check-primary">
                                        <label class="form-check-label">
                                            <input name="attachments[]" value="<?= $attachment->id ?>" type="checkbox" class="form-check-input">
                                            <?= $attachment->name; ?>
                                            <i class="input-helper"></i><img width="8%" src="<?= base_url().$attachment->image?>"> </label>
                                    </div>

                                <?php $i++; } ?>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
