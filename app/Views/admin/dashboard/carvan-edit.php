<?= $this->extend('admin/layout/main') ?>

<?= $this->section('admin-css') ?>
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Caravan Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Caravan Details</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Caravan Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="caravanForm" method="post" action="<?= route_to('admin.carvanEditHandeler', ['id' => $caravanDetails['id']]) ?>" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $caravanDetails['id'] ?>">

                            <div class="card-body">
                                <div class="row">

                                    <!-- Caravan Name -->
                                    <div class="col-md-6 form-group">
                                        <label for="caravanName">Caravan Name</label>
                                        <input type="text" name="caravan_name" class="form-control" id="caravanName" placeholder="Enter caravan name" value="<?= $caravanDetails['caravan_name'] ?>" required>
                                    </div>

                                    <!-- Makers Name -->
                                    <div class="col-md-6 form-group">
                                        <label for="make">Makers Name</label>
                                        <input type="text" name="make" class="form-control" id="make" placeholder="Enter makers name" value="<?= $caravanDetails['make'] ?>" required>
                                    </div>

                                    <!-- Model -->
                                    <div class="col-md-6 form-group">
                                        <label for="model">Model</label>
                                        <input type="text" name="model" class="form-control" id="model" placeholder="Enter model" value="<?= $caravanDetails['model'] ?>" required>
                                    </div>

                                    <!-- Year -->
                                    <div class="col-md-6 form-group">
                                        <label for="year">Year</label>
                                        <input type="number" name="year" class="form-control" id="year" placeholder="Enter year" value="<?= $caravanDetails['year'] ?>" min="1900" max="2099" required>
                                    </div>

                                    <!-- Registration Number -->
                                    <div class="col-md-6 form-group">
                                        <label for="registrationNumber">Registration Number</label>
                                        <input type="text" name="registration_number" class="form-control" id="registrationNumber" placeholder="Enter registration number" value="<?= $caravanDetails['registration_number'] ?>" required>
                                    </div>

                                    <!-- Color -->
                                    <div class="col-md-6 form-group">
                                        <label for="color">Color</label>
                                        <input type="color" name="color" class="form-control" id="color" placeholder="Enter color" value="<?= $caravanDetails['color'] ?>" required>
                                    </div>

                                    <!-- Mileage -->
                                    <div class="col-md-6 form-group">
                                        <label for="mileage">Mileage</label>
                                        <input type="number" name="mileage" class="form-control" id="mileage" placeholder="Enter mileage" value="<?= $caravanDetails['mileage'] ?>" min="0" step="any" required>
                                    </div>

                                    <!-- Images URL -->
                                    <div class="col-md-6 form-group">
                                        <label for="images_url">Images URL</label>
                                        <input type="file" name="images_url" class="form-control" id="images_url">
                                        <span>Current Image URL: <?= $caravanDetails['images_url'] ?></span>
                                    </div>

                                    <!-- Short Description -->
                                    <div class="col-md-6 form-group">
                                        <label for="shortDescription">Short Description</label>
                                        <textarea name="short_description" class="form-control" id="shortDescription" placeholder="Enter short description" required><?= $caravanDetails['short_description'] ?></textarea>
                                    </div>

                                    <!-- Long Description -->
                                    <div class="col-md-6 form-group">
                                        <label for="longDescription">Long Description</label>
                                        <textarea name="long_description" class="form-control" id="longDescription" placeholder="Enter long description" required><?= $caravanDetails['long_description'] ?></textarea>
                                    </div>

                                    <!-- Features -->
                                    <div class="col-md-6 form-group">
                                        <label for="features">Features</label>
                                        <textarea name="features" class="form-control" id="features" placeholder="Enter features" required><?= $caravanDetails['features'] ?></textarea>
                                    </div>

                                    <!-- Amenities -->
                                    <div class="col-md-6 form-group">
                                        <label for="amenities">Amenities</label>
                                        <textarea name="amenities" class="form-control" id="amenities" placeholder="Enter amenities" required><?= $caravanDetails['amenities'] ?></textarea>
                                    </div>

                                    <!-- Minimum Days Available -->
                                    <div class="col-md-6 form-group">
                                        <label for="minimumDaysAvailable">Minimum Days Available</label>
                                        <input type="number" name="minimum_days_available" class="form-control" id="minimumDaysAvailable" placeholder="Enter minimum days available" value="<?= $caravanDetails['minimum_days_available'] ?>">
                                    </div>

                                    <!-- Dates Availability -->
                                    <div class="col-md-6 form-group">
                                        <label for="dates_availability">Dates Availability</label>
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="dates_availability" class="form-control" id="dates_availability" placeholder="Select dates" value="<?= $caravanDetails['dates_availability'] ?>" />
                                        </div>
                                    </div>

                                    <!-- Deposit Price -->
                                    <div class="col-md-6 form-group">
                                        <label for="deposit_price">Deposit Price</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" name="deposit_price" class="form-control" id="deposit_price" placeholder="Enter deposit price" value="<?= $caravanDetails['deposit_price'] ?>" required>
                                        </div>
                                    </div>

                                    <!-- Per Day Price -->
                                    <div class="col-md-6 form-group">
                                        <label for="per_day_price">Per Day Price</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" name="per_day_price" class="form-control" id="per_day_price" placeholder="Enter per day price" value="<?= $caravanDetails['per_day_price'] ?>" required>
                                        </div>
                                    </div>

                                    <!-- Tags -->
                                    <div class="col-md-6 form-group">
                                        <label for="tags">Tags</label>
                                        <input type="text" name="tags" class="form-control" id="tags" placeholder="Enter tags" value="<?= $caravanDetails['tags'] ?>">
                                    </div>

                                    <!-- Rules & Regulations -->
                                    <div class="col-md-6 form-group">
                                        <label for="rulesRegulations">Rules & Regulations</label>
                                        <textarea name="rules_regulations" class="form-control" id="rulesRegulations" placeholder="Enter rules and regulations" required><?= $caravanDetails['rules_regulations'] ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?= $this->endSection() ?>

<?= $this->section('admin-scripts') ?>
<!-- bs-custom-file-input -->
<script src="/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- date-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script>
    $(function() {
        bsCustomFileInput.init();

        $('#dates_availability').datepicker({
            multidate: true,
            multidateSeparator: ','
        });
    });
</script>
<?= $this->endSection() ?>