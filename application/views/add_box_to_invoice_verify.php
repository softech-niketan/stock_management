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
                        <h1>Add Box To Invoice Verify</h1>
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
                                <?php

                                if ($checked == true) {
                                    if ($checked == true) {
                                    }
                                } else {
                                ?>
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <form action="<?php echo base_url('add_invoice_box_data_match') ?>" method="post">
                                                    <label for="">Scan Code</label>
                                                    <input type="number" required name="box_id" placeholder="Barcode Number" class="form-control">
                                                    <input type="hidden" value="<?Php echo $invoice_main[0]->id; ?>" name="invoice_id" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-danger mt-4">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } ?>

                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="form-group">

                                            <label for="">Invoice Match Status</label>
                                            <p style="font-size:20px;" class="<?php
                                                                                if ($checked == true) {
                                                                                    if ($checked == true) {
                                                                                        echo "text-success";
                                                                                    } else {
                                                                                        echo "text-danger";
                                                                                    }
                                                                                } else {
                                                                                    echo "text-danger";
                                                                                } ?>"><?php
                                                                                        if ($checked == true) {
                                                                                            if ($checked == true) {
                                                                                                echo "Invoice Matched !!!";
                                                                                            } else {
                                                                                                echo "In-Complete";
                                                                                            }
                                                                                        } else {
                                                                                            echo "In-Complete";
                                                                                        } ?></p>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <?php
                                            if ($checked == true) {
                                                if ($checked == true) {


                                            ?>

                                                    <label for="">Invoice Match Number : </label>
                                                    <p style="font-size:22px;" class="<?php
                                                                                        if ($checked == true) {
                                                                                            if ($checked == true) {
                                                                                                echo "text-dark";
                                                                                            }
                                                                                        } else {
                                                                                            echo "text-dark";
                                                                                        } ?>"><?php

                                                                                                if ($invoice_main) {
                                                                                                    echo  $invoice_main[0]->invoice_number . "4000" . $invoice[0]->id;
                                                                                                }  ?>

                                                    </p>
                                            <?php }
                                            } ?>



                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="form-group">

                                            <label for="">Invoice Qty</label>
                                            <p style="font-size:20px;" class="<?php
                                                                                if ($checked == true) {
                                                                                    if ($checked == true) {
                                                                                        echo "text-success";
                                                                                    } else {
                                                                                        echo "text-danger";
                                                                                    }
                                                                                } else {
                                                                                    echo "text-danger";
                                                                                } ?>"><?php
                                                                                        if ($checked == true) {
                                                                                            if ($checked == true) {
                                                                                                echo $invoice_main[0]->qty;
                                                                                            } else {
                                                                                                echo $invoice_main[0]->qty;
                                                                                            }
                                                                                        } else {
                                                                                            echo $invoice_main[0]->qty;
                                                                                        } ?></p>

                                        </div>
                                    </div>

                                </div>
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
                                            <form action="<?php echo base_url('add_box') ?>" method="POST" enctype='multipart/form-data'>
                                                <div class="row">
                                                    <div class="col-lg-12">


                                                        <!-- <div class="form-group">
                                                                <label for="operation_number">Operation Number</label><span class="text-danger">*</span>
                                                                <input type="text" name="operationNumber" class="form-control" required id="exampleInputPassword1" placeholder="Operation Number">

                                                        </div>-->
                                                        <div class="form-group">
                                                            <label for="po_num">Box Name </label><span class="text-danger">*</span>
                                                            <input type="text" name="box_name" required class="form-control" id="exampleInputEmail1" placeholder="Enter Part Number" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="po_num">Box Size </label>
                                                            <input type="text" name="box_size" class="form-control" id="exampleInputEmail1" placeholder="Enter Description" aria-describedby="emailHelp">
                                                        </div>


                                                    </div>
                                                    <div class="col-lg-6">

                                                        <!-- <div class="form-group">
                                                            <label for="po_num">Part Drawing </label><span class="text-danger">*</span>
                                                            <input type="file" name="part_drawing" required class="form-control" id="exampleInputEmail1" placeholder="Enter Safty/buffer stock" aria-describedby="emailHelp">
                                                        </div> -->



                                                        <!-- <div class="form-group">
                                                            <label> Customer Part Type </label><span class="text-danger">*</span>
                                                            <select class="form-control select2" name="customer_part_id" style="width: 100%;">
                                                                <?php
                                                                foreach ($customers_part_type as $c1) {
                                                                ?>
                                                                    <option value="<?php echo $c1->id; ?>"><?php echo $c1->customer_type_name; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div> -->


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