<div style="width:2000px" class="wrapper">
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
                        <h1>JOB CARD</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Job Card Details</li>
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
                                <!-- <h3 class="card-title">
                                </h3> -->

                                <br>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <a class="btn btn-danger" href="<?php echo base_url('generate_job_card/') . $this->uri->segment('2'); ?>">Download JOB CARD</a>

                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                Update Lot Qty
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <label for="">Update Lot Qty <span class="text-danger">*</span> </label>
                                                            <form action="<?php echo base_url('update_job_card'); ?>" method="post">
                                                                <input type="text" required name="req_qty" value="<?php echo $job_card[0]->req_qty; ?>" class="form-control">
                                                                <input type="hidden" required name="id" value="<?php echo $job_card[0]->id; ?>" class="form-control">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Job Card Number <span class="text-danger">*</span></label>
                                            <input type="text" readonly value="<?php echo "TH/" . $customer_part_data[0]->part_family . "/0000" . $job_card[0]->id; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Customer <span class="text-danger">*</span></label>
                                            <input type="text" readonly value="<?php echo $customer_data[0]->customer_name; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Part No <span class="text-danger">*</span></label>
                                            <input type="text" readonly value="<?php echo $customer_part_data[0]->part_number; ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Part Description <span class="text-danger">*</span></label>
                                            <input type="text" readonly value="<?php echo $customer_part_data[0]->part_number; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Lot Qty <span class="text-danger">*</span></label>
                                            <input type="text" readonly value="<?php echo $job_card[0]->req_qty; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="">Job Card Status <span class="text-danger">*</span></label>
                                            <input type="text" readonly value="<?php echo $job_card[0]->status; ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-header">
                                <h3 class="card-title">
                                    Bill Of Material
                                </h3>



                            </div>

                            <div class="card-body">
                                <table id="" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Item Number</th>
                                            <th>Item Description</th>
                                            <th>Store Location</th>
                                            <th>BOM Qty</th>
                                            <th>REQ Qty</th>
                                            <th>Stock</th>

                                            <th>UOM</th>
                                            <th>GRN NO </th>
                                            <th>HOSE Make/Mfg.Date </th>
                                            <th>Relese Job Card</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Item Number</th>
                                            <th>Item Description</th>
                                            <th>Store Location</th>
                                            <th>BOM Qty</th>
                                            <th>REQ Qty</th>
                                            <th>Stock</th>

                                            <th>UOM</th>
                                            <th>GRN NO </th>
                                            <th>HOSE Make/Mfg.Date </th>
                                            <th>Relese Job Card</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $relese_po = 1;
                                        $jj = 1;

                                        if ($bom_data) {
                                            foreach ($bom_data as $b) {
                                                if (true) {
                                                    $child_part_data = $this->Crud->get_data_by_id("child_part", $b->child_part_id, "id");
                                                    $child_part_master = $this->Crud->get_data_by_id("child_part_master", $child_part_data[0]->part_number, "part_number");
                                                    // $data['toolList'] = $this->Crud->get_data_by_id("tools", "insert", "type");
                                                    $req_qty = 0;
                                                    $stock =  (int)$child_part_master[0]->stock;
                                                    $req_qty = (int)$job_card[0]->req_qty * $b->quantity;
                                                    // $stock = 3;
                                                    // $req_qty = 1;

                                        ?>
                                                    <tr>
                                                        <td><?php echo $jj ?></td>
                                                        <td><?php echo $child_part_data[0]->part_number ?></td>
                                                        <td><?php echo $child_part_data[0]->part_description ?></td>
                                                        <td><?php echo "" ?></td>

                                                        <td><?php echo $b->quantity ?></td>
                                                        <td><?php echo $req_qty ?></td>
                                                        <td><?php echo $stock ?></td>
                                                        <td><?php echo $customer_part_data[0]->uom ?></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <?php if ($req_qty >= $stock) {
                                                                echo "Please Add Stock To Relese JOB CARD";
                                                            } else {
                                                                echo $stock;
                                                                $relese_po++;
                                                            } ?>

                                                        </td>




                                                    </tr>

                                        <?php
                                                    $jj++;
                                                }
                                            }
                                        }
                                        ?>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th colspan="10"></th>
                                            <th>
                                                <?php
                                                if ($relese_po !=  $jj || $relese_po == 1) {
                                                    echo "Please Add All Stock To Relese JOB CARD";
                                                } else {

                                                    if ($job_card[0]->status == "released") {
                                                        echo "Job Card Already Released";
                                                    } else {


                                                ?>

                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#releaseJobCard">
                                                            Release Job Card
                                                        </button>
                                                <?php
                                                    }
                                                }



                                                ?>


                                                <!-- Modal -->
                                                <div class="modal fade" id="releaseJobCard" tabindex="-1" role="dialog" aria-labelledby="releaseJobCard" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Update </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <label for="">Are You Sure Want To Relese Job Card ? <span class="text-danger">*</span> </label>
                                                                <form action="<?php echo base_url('update_job_card_status'); ?>" method="post">
                                                                    <!-- <input type="text" required name="req_qty" value="<?php echo $job_card[0]->req_qty; ?>" class="form-control"> -->
                                                                    <input type="hidden" required name="id" value="<?php echo $job_card[0]->id; ?>" class="form-control">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </th>
                                        </tr>
                                    </tfoot>





                                </table>
                            </div>
                            <div class="card-header">
                                <h3 class="card-title">
                                    Operation Details
                                </h3>



                            </div>

                            <div class="card-body">
                                <table id="" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                        <tr class="text-center align-middle">
                                            <th colspan="3">Characteristics</th>
                                            <th rowspan="2" class="align-middle">Product Specification / Tolerance</th>
                                            <th rowspan="2" class="align-middle">Evaluation / Measurement Techn</th>
                                            <th rowspan="2" class="align-middle">Size</th>
                                            <th rowspan="2" class="align-middle">Frequency</th>
                                            <th colspan="2" class="align-middle">Set Up Approval</th>
                                            <th colspan="4" class="align-middle">In Process Observation</th>
                                            <th class="align-middle">Last Price</th>
                                            <th class="align-middle">Qty</th>
                                            <th class="align-middle">Qty</th>
                                            <th rowspan="2" class="align-middle" class="align-middle">Remark</th>
                                        </tr>
                                        <tr class="text-center align-middle">
                                            <th>Sr. No.</th>
                                            <th>Product</th>
                                            <th>Process</th>
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <th>5</th>
                                            <th>6</th>
                                            <th>7</th>
                                            <th>Prod</th>
                                            <th>Acc</th>
                                            <!-- <th>Acc</th> -->


                                        </tr>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        if ($customer_part_operation) {
                                            $i = 1;

                                            // foreach ($customer_part_operation as $bb) {

                                            $customer_part_operation_data = $this->Crud->get_data_by_id("customer_part_operation_data", $customer_part_operation[0]->id, "customer_part_operation_id");

                                            if ($customer_part_operation_data) {

                                                // $customer_part_operation = $this->Crud->get_data_by_id("customer_part_operation", $customer_part_operation_data[0]->customer_part_operation_id, "id");
                                                // $operations = $this->Crud->get_data_by_id("operations", $customer_part_operation_data[0]->operation_id, "id");
                                                // $data['toolList'] = $this->Crud->get_data_by_id("tools", "insert", "type");
                                                foreach ($customer_part_operation_data as $b) {

                                                    $customer_part_operation = $this->Crud->get_data_by_id("customer_part_operation", $b->customer_part_operation_id, "id");
                                                    $operations = $this->Crud->get_data_by_id("operations", $customer_part_operation[0]->operation_id, "id");
                                                    // $data['toolList'] = $this->Crud->get_data_by_id("tools", "insert", "type");

                                        ?>
                                                    <tr>

                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $b->product ?></td>
                                                        <td><?php echo $b->process ?></td>
                                                        <td><?php echo $b->specification_tolerance ?></td>
                                                        <td><?php echo $b->evalution ?></td>
                                                        <td><?php echo $b->size ?></td>
                                                        <td><?php echo $b->frequency ?></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>





                                                    </tr>

                                        <?php

                                                    $i++;
                                                }
                                            }
                                            // }
                                        }
                                        ?>
                                    </tbody>


                                </table>
                            </div>

                        </div>

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