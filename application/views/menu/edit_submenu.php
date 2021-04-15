        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <!-- Form Validation Errors -->
            <div class="text-danger">
                <?= validation_errors(); ?>
            </div>

            <div class="row mb-5">
                <div class="col-lg-6">
                    <form action="<?= base_url('menu/edit_submenu/') . $edit['id']; ?>" method="POST">
                        <div class="mb-3 form-group">
                            <label for="titleInput" class="form-label">Submenu Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?= $edit['title']; ?>">
                            <p class="small text-secondary">*required</p>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="menuCategoriesInput" class="form-label">Menu Categories</label>
                            <!-- Looping Menu -->
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option value="">Select Menu</option>
                                <?php foreach ($menu as $m) : ?>
                                    <?php if ($edit['menu_id'] == $m['id']) : ?>
                                        <option value="<?= $m['id']; ?>" selected="selected"><?= $m['menu']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                    <?php endif; ?>

                                <?php endforeach; ?>
                            </select>
                            <p class="small text-secondary">*required</p>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="urlInput" class="form-label">Submenu URL</label>
                            <input type="text" class="form-control" id="url" name="url" value="<?= $edit['url']; ?>">
                            <p class="small text-secondary">*required</p>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="iconInput" class="form-label">Submenu Icon</label>
                            <input type="text" class="form-control" id="icon" name="icon" value="<?= $edit['icon']; ?>">
                            <p class="small text-secondary">*required</p>
                        </div>
                        <div class="mb-3 form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="is_active" checked name="is_active">
                                <label class="form-check-label" for="is_active">
                                    Is Active?
                                </label>
                            </div>
                            <p class="small text-secondary">*required</p>
                        </div>
                        <button type="button" class="btn btn-secondary">
                            <a href="<?= base_url('menu/submenu'); ?>" class="text-white text-decoration-none">Cancel</a>
                        </button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->