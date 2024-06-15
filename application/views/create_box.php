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
                        <h1>Create Box</h1>
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
                                            <form action="<?php echo base_url('add_box') ?>" method="POST" enctype='multipart/form-data'>
                                                <label for="po_num">Part Name </label><span class="text-danger">*</span>
                                                <select id="box_name" class="form-control select2" name="box_name">
                                                    <?php

                                                    if ($parts) {
                                                        foreach ($parts as $po) {
                                                    ?>
                                                            <option data-qty="<?php echo $po->qty; ?>" value="<?php echo $po->part_number ?>"><?php echo $po->part_number . " / " . $po->part_description; ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <!-- <input type="text" name="box_name" required class="form-control" id="exampleInputEmail1" placeholder="Enter Part Name" aria-describedby="emailHelp"> -->
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="po_num">Box Size </label>
                                                <input type="text" name="box_size" class="form-control" id="exampleInputEmail1" placeholder="Enter Description" aria-describedby="emailHelp">
                                            </div>
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
                                                        <!-- <div class="form-group">
                                                            <label for="po_num">Box Size </label>
                                                            <input type="text" name="box_size" class="form-control" id="exampleInputEmail1" placeholder="Enter Description" aria-describedby="emailHelp">
                                                        </div> -->


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

                            <br>
                            <div class="row">
                                <div class="col-lg-2 ml-4">
                                    <div class="form-group">
                                        <form action="<?php echo base_url('create_box'); ?>" method="post">
                                            <label for="">From Date</label>
                                            <input type="date" value="<?php echo $from_date; ?>" class="form-control" required name="from_date">


                                    </div>


                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">To Date</label>
                                        <input type="date" value="<?php echo $to_date; ?>" class="form-control" required name="to_date">


                                    </div>


                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger mt-4">Search</button>
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
                                            <th>Box Name</th>
                                            <th>Part Qty</th>
                                            <th>Status</th>
                                            <th>Add Packing</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $i = 1;
                                        if ($box) {
                                            foreach ($box as $po) {
                                                // echo $poo->part_number;
                                                $box_packing = $this->Crud->get_data_by_id("box_packing", $po->id, "box_id");
                                                $part_qty = 0;
                                                if ($box_packing) {
                                                    foreach ($box_packing as $b) {
                                                        $packing_data = $this->Crud->get_data_by_id("packing", $b->pack_id, "barcode");

                                                        $part_qty = $packing_data[0]->part_qty + $part_qty;
                                                    }
                                                }
                                                // $customer_data = $this->Crud->get_data_by_id("customer", $po[0]->customer_id, "id");
                                                // $customer_part_data = $this->Crud->get_data_by_id("customer_part_type", $po[0]->customer_part_id, "id");
                                                // print_r($supplier_data);
                                        ?>

                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $po->box_name; ?></td>
                                                    <td><?php echo $part_qty; ?></td>
                                                    <td><?php echo $po->status; ?></td>

                                                    <td>

                                                        <a href="<?php echo base_url('add_packing_to_box/') . $po->id; ?>" class="btn btn-primary">

                                                            <i class="fa fa-eye"></i>
                                                        </a>
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