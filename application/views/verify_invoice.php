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
                        <h1>Verify Invoice</h1>
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
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <form action="<?php echo base_url('add_invoice_data_match') ?>" method="POST" enctype='multipart/form-data'>
                                                <label for="po_num">Invoice Barcode </label><span class="text-danger">*</span>
                                                <input type="text" name="invoice_number" required class="form-control" id="exampleInputEmail1" placeholder="Enter Invoice Barcode" aria-describedby="emailHelp">
                                        </div>
                                    </div>

                                    <!-- <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Enter Invoice Total Qty <span class="text-danger">*</span></label>
                                            <input type="number" placeholder="Total Invoice Qty" name="total_stock" required class="form-control">
                                        </div>
                                    </div> -->
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger mt-4">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->


                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>

                                            <th>Invoice Number</th>
                                            <th>View Details</th>
                                            <th>Return Invoice</th>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $i = 1;
                                        if ($invoice_match) {
                                            foreach ($invoice_match as $po) {
                                                // echo $poo->part_number;
                                                // $po = $this->Crud->get_data_by_id("customer_part", $poo->part_number, "part_number");
                                                // $customer_data = $this->Crud->get_data_by_id("customer", $po[0]->customer_id, "id");
                                                // $customer_part_data = $this->Crud->get_data_by_id("customer_part_type", $po[0]->customer_part_id, "id");
                                                // print_r($supplier_data);
                                        ?>

                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $po->invoice_number; ?></td>

                                                    <td>

                                                        <a href="<?php echo base_url('add_box_to_invoice_verify/') . $po->id; ?>" class="btn btn-primary">

                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </td>
                                                    <td>

                                                        <button type="button" class="btn btn-danger float-left" data-toggle="modal" data-target="#exampleModal<?php echo $i; ?>">
                                                            Return Invoice </button>
                                                        <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Return </h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="<?php echo base_url('return_invoice') ?>" method="POST" enctype='multipart/form-data'>
                                                                            <div class="row">
                                                                                <div class="col-lg-12">

                                                                                    <label for="">Are You Sure Want To Return This Invoice ?</label>
                                                                                    <input type="hidden" name="invoice_number" value="<?php echo $po->invoice_number ?>" class="form-control">
                                                                                    <input type="hidden" name="id" value="<?php echo $po->id ?>" class="form-control">

                                                                                </div>

                                                                            </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-danger">Save changes</button>
                                                                    </div>
                                                                    </form>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </td>




                                                </tr>
                                        <?php
                                                $i++;
                                            }
                                        }
                                        ?>
                                    </tbody>

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