        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <div class="row">
                <div class="col">

                    <!-- Form Validation Errors -->
                    <div class="text-danger">
                        <?= validation_errors(); ?>
                    </div>

                    <!-- Success message -->
                    <?= $this->session->flashdata('message'); ?>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubmenuModal">
                        Add New Submenu
                    </button>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Url</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Active</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($subMenu as $sm) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $sm['title']; ?></td>
                                    <td><?= $sm['menu']; ?></td>
                                    <td><?= $sm['url']; ?></td>
                                    <td><?= $sm['icon']; ?></td>
                                    <td><?= $sm['is_active']; ?></td>
                                    <td>
                                        <a href="<?= base_url('menu/edit_submenu/') . $sm['id'];; ?>" class="badge bg-success text-white">Edit</a>
                                        <a href="<?= base_url('menu/delete/user_sub_menu/') . $sm['id']; ?>" class="badge bg-danger text-white">Delete</a>
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
        <div class="modal fade" id="newSubmenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubmenuModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="newSubmenuModalLabel">Add New Submenu</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="<?= base_url('menu/submenu'); ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label">Submenu Title</label>
                                <input type="text" class="form-control" id="title" name="title">
                                <p class="small text-danger">*required</p>
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label">Select Menu</label>
                                <select name="menu_id" id="menu_id" class="form-control">
                                    <option value="">Select Menu</option>
                                    <?php foreach ($menu as $m) : ?>
                                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <p class="small text-danger">*required</p>
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label">Url</label>
                                <input type="text" class="form-control" id="url" name="url">
                                <p class="small text-danger">*required</p>
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label">Icon</label>
                                <input type="text" class="form-control" id="icon" name="icon">
                                <p class="small text-danger">*required</p>
                            </div>
                            <div class="form-group mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="is_active" checked name="is_active">
                                    <label class="form-check-label" for="is_active">
                                        Is Active?
                                    </label>
                                </div>
                                <p class="small text-danger">*required</p>
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