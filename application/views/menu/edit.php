        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <!-- Form Validation Errors -->
            <div class="text-danger">
                <?= validation_errors(); ?>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <form action="<?= base_url('menu/edit/') . $edit['id']; ?>" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Menu Title</label>
                            <input type="text" class="form-control" id="menu" name="menu" value="<?=$edit['menu']; ?>">
                        </div>
                        <button type="button" class="btn btn-secondary">
                            <a href="<?= base_url('menu'); ?>" class="text-white text-decoration-none">Cancel</a>
                        </button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->