<div class="wrapper">
    <!-- Navbar -->

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Part Master</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Part Master</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">

                                </h3>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal">
                                    Add </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="<?php echo base_url('create_packing_data'); ?>">
                                                <div class="row">

                                                    <div class="col-lg-12">



                                                    <div class="form-group">
                                                    <label for="">Scan Code</label>
                                                    <input type="number" placeholder="Enter Packing Barcode" required name="scan_code" class="form-control">
                                                </div>
<!-- 
                                                        <div class="form-group">
                                                            <label> Select Part Type </label><span class="text-danger">*</span>
                                                            <select id="part_dropdown" class="form-control select2" name="part_id">
                                                                <?php

                                                                if ($parts) {
                                                                    foreach ($parts as $po) {
                                                                ?>
                                                                        <option data-qty="<?php echo $po->qty; ?>" value="<?php echo $po->id ?>"><?php echo $po->part_number . " / " . $po->part_description; ?></option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div> -->

                                                        <div class="form-group">
                                                            <label for="po_num">Part Qty </label><span class="text-danger">*</span>
                                                            <!-- <input list="part_qty" id="part_qty" name="part_qty" required class="form-control" placeholder="Enter Qty">
                                                            <datalist id="part_qty">
                                                                <option value="1">
                                                                <option value="2">
                                                                <option value="25">
                                                                <option value="30">
                                                                <option value="50">
                                                            </datalist> -->

                                                            <input list="browsers" name="part_qty" id="part_qty" required class="form-control" id="browser">
                                                            <datalist id="browsers">
                                                                <option value="1">
                                                                <option value="5">
                                                                <option value="6">
                                                                <option value="7">
                                                                <option value="9">
                                                                <option value="10">
                                                                <option value="12">
                                                                <option value="15">
                                                                <option value="15">
                                                                <option value="17">
                                                                <option value="18">
                                                                <option value="20">
                                                                <option value="25">
                                                                <option value="40">
                                                                <option value="50">
                                                                <option value="100">
                                                                <option value="150">
                                                                <option value="200">
                                                                <option value="250">
                                                                <option value="300">
                                                                <option value="500">
                                                                <option value="1000">
                                                                <option value="2000">
                                                            </datalist>

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Enter Batch Code <span class="text-danger">*</span> </label>
                                                            <input type="text" required placeholder="Enter Batch Code" name="batch_code" class="form-control">
                                                        </div>




                                                    </div>

                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>

                                    </div>

                                </div>
                            </div>


                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <!-- <th>Add Revision</th> -->

                                            <!-- <th>Revision Number</th>
                                            <th>Revision Date</th>
                                            <th>Revision Remark</th> -->
                                            <!-- <th>Customer Name</th> -->
                                            <th>Part Number</th>
                                            <th>Part Description</th>
                                            <th>Packing Qty</th>
                                            <th>Action</th>

                                            <!-- <th>Customer Part Type</th>
                                            <th>Part Family</th>
                                            <th>UOM</th>
                                            <th>HSN</th>
                                            <th>Saftey Stock</th> -->
                                            <!-- <th>BOM</th>
                                            <th>Drawing</th>
                                            <th>Model</th> -->
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <script>
        $(document).ready(function() {
            var qty = $('#part_dropdown').find(":selected").data("qty");
            //  this.data('qty');

            $('#part_qty').val(qty);
            $('#part_dropdown').on('change', function() {
                // alert(this.value);
                var qty = $('#part_dropdown').find(":selected").data("qty");
                //  this.data('qty');

                $('#part_qty').val(qty);
                // alert(qty);

            });
        });
    </script>