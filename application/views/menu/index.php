        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <div class="row">
                <div class="col-lg-6">

                    <!-- Form Validation Errors -->
                    <div class="text-danger">
                        <?= validation_errors(); ?>
                    </div>

                    <!-- Success message -->
                    <?= $this->session->flashdata('message'); ?>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">
                        Add New Menu
                    </button>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($menu as $m) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $m['menu']; ?></td>
                                    <td>
                                        <a href="<?= base_url('menu/edit/') . $m['id'] ?>" class="badge bg-success text-white">Edit</a>
                                        <a href="<?= base_url('menu/delete/user_menu/') . $m['id']; ?>" class="badge bg-danger text-white">Delete</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- New Menu Modal -->
        <div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="newMenuModalLabel">Add New Menu</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="<?= base_url('menu'); ?>" method="POST">
                        <div class="modal-body">
                            <div class="mb-3 form-group">
                                <label for="exampleInputEmail1" class="form-label">Menu Title</label>
                                <input type="text" class="form-control" id="menu" name="menu">
                                <p class="small text-secondary">*required</p>
                            </div>
                            <div class="mb-3 form-group">
                                <label for="exampleInputEmail1" class="form-label">Availability</label>
                                <select name="available" id="available" class="form-control">
                                    <option value="">--Select--</option>
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                    <option value="0">Everyone</option>
                                </select>
                                <p class="small text-secondary">*required</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>