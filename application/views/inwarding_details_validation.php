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
                        <h1>Validation Details</h1>


                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('generate_po') ?>">Home</a></li>
                            <li class="breadcrumb-item active"></li>
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

                                            <a class="btn btn-danger" href="<?php echo base_url('grn_validation'); ?>">
                                                < Back</a>


                                        </div>
                                        <div class="form-group">

                                            <label for="">GRN Number <span class="text-danger">*</span> </label>
                                            <input type="text" readonly value="<?php echo $inwarding_data[0]->grn_number ?>" class="form-control">


                                        </div>


                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">

                                            <label for="">PO Number <span class="text-danger">*</span> </label>
                                            <input type="text" readonly value="<?php echo $new_po[0]->po_number ?>" class="form-control">


                                        </div>


                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">

                                            <label for="">PO Date <span class="text-danger">*</span> </label>
                                            <input type="text" readonly value="<?php echo $new_po[0]->po_date ?>" class="form-control">


                                        </div>


                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">

                                            <label for="">Current Status <span class="text-danger">*</span> </label>
                                            <input type="text" readonly value="<?php if ($new_po[0]->status == "accpet") {
                                                                                    echo "Released";
                                                                                } else {
                                                                                    echo $new_po[0]->status;
                                                                                } ?>" class="form-control">


                                        </div>


                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">

                                            <label for="">Supplier Name <span class="text-danger">*</span> </label>
                                            <input type="text" readonly value="<?php echo $supplier[0]->supplier_name ?>" class="form-control">


                                        </div>


                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">

                                            <label for="">Supplier Number <span class="text-danger">*</span> </label>
                                            <input type="text" readonly value="<?php echo $supplier[0]->supplier_number ?>" class="form-control">


                                        </div>


                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">

                                            <label for="">Supplier GST <span class="text-danger">*</span> </label>
                                            <input type="text" readonly value="<?php echo $supplier[0]->gst_number ?>" class="form-control">


                                        </div>


                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">

                                            <label for="">Inwarding Status <span class="text-danger">*</span> </label>
                                            <input type="text" readonly value="<?php echo $inwarding_data[0]->status; ?>" class="form-control">


                                        </div>


                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">

                                            <label for="">Invoice Amount <span class="text-danger">*</span> </label>
                                            <input type="text" readonly value="<?php echo $inwarding_data[0]->invoice_amount; ?>" class="form-control">


                                        </div>


                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">

                                            <label for="">Software Calculated Amount <span class="text-danger">*</span> </label>
                                            <?php

                                            $arr = array(
                                                'inwarding_id' => $inwarding_data[0]->id,
                                                'invoice_number' => $inwarding_data[0]->invoice_number,

                                            );

                                            $invoice_amount = $inwarding_data[0]->invoice_amount;
                                            // $inwarding_data = $this->Crud->get_data_by_id_multiple("inwarding", $arr);
                                            $grn_details_data = $this->Crud->get_data_by_id_multiple("grn_details", $arr);

                                            $actual_price = 0;
                                            foreach ($grn_details_data as $g) {
                                                $actual_price = $actual_price + $g->inwarding_price;
                                            }



                                            // $cgst_amount = ($actual_price*$gst_structure[0]->cgst)/100;
                                            // $sgst_amount = ($actual_price*$gst_structure[0]->sgst)/100;
                                            // $igst_amount = ($actual_price*$gst_structure[0]->igst)/100;

                                            // $actual_price = $actual_price + $cgst_amount +$sgst_amount+$igst_amount;
                                            $minus_price = $actual_price - 1;
                                            $plus_price = $actual_price + 1;

                                            if ($actual_price != 0) {

                                                if ($invoice_amount >= $minus_price) {
                                                    if ($invoice_amount <= $plus_price) {
                                                        $status = "verifed";
                                                    } else {
                                                        $status = "not-verifed";
                                                    }
                                                } else {
                                                    $status = "not-verifed";
                                                }
                                            } else {
                                                $status = "not-verifed";
                                            }
                                            ?>
                                            <input type="text" readonly value="<?php echo $actual_price; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">

                                            <label for="">Invoice Amount Validate Status <span class="text-danger">*</span> </label>

                                            <input type="text" readonly value="<?php echo $status; ?>" class="form-control">


                                        </div>


                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">



                                            <?php

                                            if ($inwarding_data[0]->status == "validate_grn") {
                                            ?>
                                                <button type="button" disabled class="btn btn-primary mt-4" data-toggle="modal" data-target="#exampleModalgenerate">
                                                    GRN Already Validate </button>
                                            <?php

                                            } else {
                                            ?>
                                                <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#exampleModalgenerate">
                                                    Validate GRN </button>
                                            <?php

                                            }
                                            ?>




                                            <!-- <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#exampleModalgenerate">
                                                                               Validate  GRN </button> -->


                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg " role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Accept This Inwarding </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo base_url('accept_inwarding_data') ?>" method="POST">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <label> Are You Sure Want To Accept This Inwarding ? This Data can't be changed once it's Submit</label><span class="text-danger">*</span>
                                                                            <input type="hidden" name="inwarding_id" value="<?php echo $inwarding_id; ?>" class="form-control">
                                                                            <input type="hidden" name="invoice_number" value="<?php echo $invoice_number; ?>" class="form-control">
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
                                            <div class="modal fade" id="exampleModalmatch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg " role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Match Price </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo base_url('validate_invoice_amount') ?>" method="POST">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <label> Enter Invoice Amount </label><span class="text-danger">*</span>
                                                                            <input type="number" name="invoice_amount" placeholder="Enter Invoice Amount" value="" class="form-control">
                                                                            <input type="hidden" name="inwarding_id" value="<?php echo $inwarding_id; ?>" class="form-control">
                                                                            <input type="hidden" name="actual_price" value="<?php echo $actual_price; ?>" class="form-control">
                                                                            <input type="hidden" name="actual_price" value="<?php echo $status; ?>" class="form-control">
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
                                            <div class="modal fade" id="exampleModalgenerate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog " role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Change Status </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo base_url('update_status_grn_inwarding') ?>" method="POST">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <label> Are You Sure Want To Validate GRN ? </label>
                                                                            <input type="hidden" name="status" placeholder="" value="validate_grn" class="form-control">
                                                                            <input type="hidden" name="inwarding_id" value="<?php echo $inwarding_id; ?>" class="form-control">

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


                                        </div>


                                    </div>

                                </div>

                            </div>










                            <div class="card-body">
                                <table class="table table-bordered table-striped" id="example1">
                                    <thead>

                                        <tr>
                                            <th>Sr No</th>
                                            <th>Part Number</th>
                                            <th>Part Description</th>
                                            <th>Tax Strucutre Code</th>
                                            <th>UOM</th>
                                            <th>Delivery Date</th>
                                            <th>Expiry Date</th>
                                            <th>PO QTY</th>
                                            <th>Balance QTY</th>
                                            <th>Price</th>
                                            <th>Enter Inwarding Qty</th>
                                            <th>Enter GRN Validation Qty</th>
                                            <th>Submit </th>



                                        </tr>

                                    </thead>
                                    <tfoot>

                                        <tr>
                                            <th>Sr No</th>
                                            <th>Part Number</th>
                                            <th>Part Description</th>
                                            <th>Tax Strucutre Code</th>
                                            <th>UOM</th>
                                            <th>Delivery Date</th>
                                            <th>Expiry Date</th>
                                            <th>PO QTY</th>
                                            <th>Balance QTY</th>
                                            <th>Price</th>
                                            <th>Enter Inwarding Qty</th>
                                            <th>Enter GRN Validation Qty</th>
                                            <th>Submit </th>


                                        </tr>

                                    </tfoot>



                                    <tbody>

                                        <?php
                                        if ($po_parts) {
                                            $final_po_amount = 0;
                                            $i = 1;
                                            foreach ($po_parts as $p) {
                                                $child_part_data = $this->Crud->get_data_by_id("child_part_master", $p->part_id, "id");
                                                $gst_structure_data = $this->Crud->get_data_by_id("gst_structure", $p->tax_id, "id");
                                                $uom_data = $this->Crud->get_data_by_id("uom", $p->uom_id, "id");

                                                $total_rate = $child_part_data[0]->part_rate * $p->qty;
                                                $final_po_amount = $final_po_amount + $total_rate;

                                                $arr = array(
                                                    'inwarding_id' => $inwarding_id,
                                                    'part_id' => $child_part_data[0]->id,
                                                    'po_number' => $new_po_id,
                                                    'invoice_number' => $inwarding_data[0]->invoice_number,
                                                    'grn_number' => $inwarding_data[0]->grn_number,
                                                );
                                                $grn_details_data = $this->Crud->get_data_by_id_multiple("grn_details", $arr);
                                                if ($grn_details_data) {
                                                    if ($grn_details_data) {
                                                        $data_present = "yes";
                                                    } else {
                                                        $data_present = "no";
                                                    }


                                                    // if ($grn_details_data[0]->qty != "") {
                                        ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $child_part_data[0]->part_number; ?></td>
                                                        <td><?php echo $child_part_data[0]->part_description; ?></td>
                                                        <td><?php echo $gst_structure[0]->code; ?></td>
                                                        <td><?php echo $uom_data[0]->uom_name; ?></td>
                                                        <td><?php echo $p->delivery_date; ?></td>
                                                        <td><?php echo $p->expiry_date; ?></td>
                                                        <td><?php echo $p->qty; ?></td>
                                                        <td><?php echo $p->pending_qty; ?></td>
                                                        <td><?php echo $child_part_data[0]->part_rate; ?></td>
                                                        <td>

                                                            <?php

                                                            if ($inwarding_data[0]->status == "accepted") {

                                                                echo $grn_details_data[0]->qty;
                                                            } else if ($data_present == "yes") {
                                                                echo $grn_details_data[0]->qty;
                                                            } else {


                                                            ?>

                                                                <form action="<?php echo base_url('add_grn_qty') ?>" method="post">

                                                                    <input type="number" max="<?php echo $p->pending_qty; ?>" placeholder="Enter Inwarding Qty" name="qty" class="form-control">
                                                                    <input type="hidden" name="inwarding_id" value="<?php echo $inwarding_id ?>" class="form-control">
                                                                    <input type="hidden" placeholder="Enter Inwarding Qty" name="new_po_id" value="<?php echo $new_po_id ?>" class="form-control">
                                                                    <input type="hidden" placeholder="Enter Inwarding Qty" name="part_id" value="<?php echo $child_part_data[0]->id ?>" class="form-control">
                                                                    <input type="hidden" placeholder="Enter Inwarding Qty" name="invoice_number" value="<?php echo $inwarding_data[0]->invoice_number ?>" class="form-control">
                                                                    <input type="hidden" placeholder="Enter Inwarding Qty" name="grn_number" value="<?php echo $inwarding_data[0]->grn_number ?>" class="form-control">
                                                                    <input type="hidden" placeholder="Enter Inwarding Qty" name="po_part_id" value="<?php echo $p->id ?>" class="form-control">
                                                                    <input type="hidden" placeholder="Enter Inwarding Qty" name="part_rate" value="<?php echo $child_part_data[0]->part_rate ?>" class="form-control">
                                                                    <input type="hidden" placeholder="Enter Inwarding Qty" name="tax_id" value="<?php echo $p->tax_id ?>" class="form-control">
                                                                <?php
                                                            }
                                                                ?>
                                                        </td>

                                                        <td>

                                                            <?php




                                                            if (empty($grn_details_data[0]->verified_qty)) {

                                                            ?>

                                                                <form action="<?php echo base_url('update_grn_qty') ?>" method="post">

                                                                    <input type="number" max="<?php echo $grn_details_data[0]->qty; ?>" placeholder="Enter GRN Validation Qty" name="verified_qty" class="form-control">
                                                                    <input type="hidden" value="<?php echo $grn_details_data[0]->qty; ?>" placeholder="Enter GRN Validation Qty" name="privious_qty" class="form-control">
                                                                    <input type="hidden" name="grn_details_id" value="<?php echo $grn_details_data[0]->id; ?>" class="form-control">
                                                                    <input type="hidden" placeholder="Enter Inwarding Qty" name="part_rate" value="<?php echo $child_part_data[0]->part_rate ?>" class="form-control">
                                                                    <input type="hidden" placeholder="Enter Inwarding Qty" name="tax_id" value="<?php echo $p->tax_id ?>" class="form-control">
                                                                <?php

                                                            } else {
                                                                echo $grn_details_data[0]->verified_qty;
                                                            }

                                                                ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            if (empty($grn_details_data[0]->verified_qty)) {
                                                            ?>
                                                                <button type="submit" class="btn btn-info">Submit</button>
                                                                </form>

                                                            <?php


                                                            }




                                                            ?>
                                                        </td>


                                                    </tr>
                                        <?php
                                                    $i++;
                                                }
                                            }
                                        }

                                        ?>



                                    </tbody>


                                </table>

                            </div>



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