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
                                                <!-- <h1></h1> -->


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

                                                                                        <label for="">PO Expiry Date <span class="text-danger">*</span> </label>
                                                                                        <input type="text" readonly value="<?php echo $new_po[0]->expiry_po_date ?>" class="form-control">


                                                                                </div>


                                                                        </div>
                                                                        <div class="col-lg-2">
                                                                                <div class="form-group">

                                                                                        <label for="">PO Remark <span class="text-danger">*</span> </label>
                                                                                        <input type="text" readonly value="<?php echo $new_po[0]->remark ?>" class="form-control">


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

                                                                </div>

                                                        </div>
                                                        <div class="card-header">

                                                                <div class="row">
                                                                        <div class="col-lg-5">
                                                                                <div class="form-group">
                                                                                        <form action="<?php echo base_url('add_po_parts'); ?>" method="post">

                                                                                                <label for="">Select Part Number // Description // Supplier // Rate // Safety Buffer Stock <span class="text-danger">*</span> </label>

                                                                                                <select name="part_id" id="" required class="form-control select2">
                                                                                                        <?php

                                                                                                        if ($child_part) {
                                                                                                                foreach ($child_part as $c) {
                                                                                                                        $array = array(
                                                                                                                                "part_number" => $c->part_number,
                                                                                                                                "supplier_id" =>  $supplier[0]->id,

                                                                                                                        );
                                                                                                                        // $array2 = array(
                                                                                                                        //         "id" => $c->supplier_id,

                                                                                                                        // );

                                                                                                                        $c = $this->Crud->get_data_by_id_multiple_condition("child_part_master", $array);
                                                                                                                        // $supplier_data = $this->Crud->get_data_by_id_multiple_condition("supplier", $array2);
                                                                                                        ?>
                                                                                                                        <option value="<?php echo $c[0]->id ?>"><?php echo $c[0]->part_number . " // " . $c[0]->part_description . " // " . $supplier[0]->supplier_name . "//" . $c[0]->part_rate . " // " . $c[0]->safty_buffer_stk ?></option>
                                                                                                        <?php
                                                                                                                }
                                                                                                        }


                                                                                                        ?>
                                                                                                </select>


                                                                                </div>


                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                                <div class="form-group">

                                                                                        <label for="">Select Tax Strucutre Code / S-GST (%) / C-GST (%) / I-GST (%) <span class="text-danger">*</span> </label>

                                                                                        <select name="tax_id" id="" required class="form-control select2">
                                                                                                <?php

                                                                                                if ($gst_structure) {
                                                                                                        foreach ($gst_structure as $c) {
                                                                                                ?>
                                                                                                                <option value="<?php echo $c->id ?>"><?php echo $c->code . " / " . $c->sgst . " / " . $c->cgst . " / " . $c->igst ?></option>
                                                                                                <?php
                                                                                                        }
                                                                                                }


                                                                                                ?>
                                                                                        </select>


                                                                                </div>


                                                                        </div>
                                                                        <!-- <div class="col-lg-2">
                                                                                <div class="form-group">

                                                                                        <label for="">Select UOM<span class="text-danger">*</span> </label>

                                                                                        <select name="uom_id" id="" required class="form-control select2">
                                                                                                <?php

                                                                                                if ($uom) {
                                                                                                        foreach ($uom as $c) {
                                                                                                ?>
                                                                                                                <option value="<?php echo $c->id ?>"><?php echo $c->uom_name ?></option>
                                                                                                <?php
                                                                                                        }
                                                                                                }


                                                                                                ?>
                                                                                        </select>


                                                                                </div>


                                                                        </div> -->
                                                                        <div class="col-lg-2">
                                                                                <div class="form-group">

                                                                                        <label for="">Select Delivery Date </label>
                                                                                        <input type="date" name="delivery_date" placeholder=" " class="form-control">
                                                                                        <input type="hidden" name="po_number" value="<?php echo $new_po[0]->po_number ?>" required class="form-control">
                                                                                        <input type="hidden" name="po_id" value="<?php echo $new_po[0]->id ?>" required class="form-control">
                                                                                        <input type="hidden" name="supplier_id" value="<?php echo $supplier[0]->id ?>" placeholder=" " required class="form-control">


                                                                                </div>


                                                                        </div>
                                                                        <div class="col-lg-2">
                                                                                <div class="form-group">

                                                                                        <label for="">Select Expiry Date </label>
                                                                                        <input type="date" name="expiry_date" placeholder="Enter QTY " class="form-control">


                                                                                </div>


                                                                        </div>
                                                                        <div class="col-lg-2">
                                                                                <div class="form-group">

                                                                                        <label for="">Enter Qty <span class="text-danger">*</span> </label>
                                                                                        <input type="number" name="qty" placeholder="Enter QTY " required class="form-control">


                                                                                </div>


                                                                        </div>

                                                                        <div class="col-lg-2">
                                                                                <div class="form-group">
                                                                                        <?php
                                                                                        if ($new_po[0]->status == "pending") {

                                                                                        ?>


                                                                                                <button type="submit" class="btn btn-info btn-lg mt-4">Add Child Part To PO</button>
                                                                                        <?php } ?>
                                                                                </div>


                                                                        </div>

                                                                        </form>

                                                                </div>

                                                        </div>
                                                        <div class="card-header">
                                                                <?php if ($po_parts) {
                                                                        if ($new_po[0]->status == "pending") {

                                                                                if ($this->session->userdata['type'] == 'admin' || $this->session->userdata['type'] == 'Admin') {
                                                                ?>
                                                                                        <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#lock">
                                                                                                Lock PO
                                                                                        </button>
                                                                <?php }
                                                                        }
                                                                } ?>
                                                                <?php if ($new_po[0]->status == "lock") {
                                                                        if ($this->session->userdata['type'] == 'admin' || $this->session->userdata['type'] == 'Admin') {
                                                                ?>
                                                                                <button type="button" class="btn btn-success ml-1" data-toggle="modal" data-target="#accpet">
                                                                                        Accept (Released) PO
                                                                                </button>
                                                                                <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#delete">
                                                                                        Reject (delete) PO
                                                                                </button>
                                                                        <?php
                                                                        }
                                                                } else {
                                                                        if ($new_po[0]->status != "pending") {
                                                                        ?>

                                                                                <button type="button" disabled class="btn btn-success ml-1" data-toggle="modal" data-target="#accpet">
                                                                                        PO Already Released
                                                                                </button>
                                                                <?php
                                                                        }
                                                                } ?>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="accpet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                                <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                        </div>
                                                                                        <div class="modal-body">

                                                                                                <div class="row">
                                                                                                        <form action="<?php echo base_url('accept_po'); ?>" method="POST">

                                                                                                                <div class="col-lg-12">
                                                                                                                        <div class="form-group">

                                                                                                                                <label for=""><b>Are You Sure Want To Released This PO?</b> </label>
                                                                                                                                <input type="hidden" name="id" value="<?php echo $new_po[0]->id ?>" required class="form-control">
                                                                                                                                <input type="hidden" name="status" value="accpet" required class="form-control">


                                                                                                                        </div>


                                                                                                                </div>


                                                                                                </div>






                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                <button type="submit" class="btn btn-primary">Update</button>

                                                                                        </div>
                                                                                </div>
                                                                                </form>
                                                                        </div>
                                                                </div>
                                                                <div class="modal fade" id="lock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                                <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                        </div>
                                                                                        <div class="modal-body">

                                                                                                <div class="row">
                                                                                                        <form action="<?php echo base_url('accept_po'); ?>" method="POST">

                                                                                                                <div class="col-lg-12">
                                                                                                                        <div class="form-group">

                                                                                                                                <label for=""><b>Are You Sure Want To Lock This PO?</b> </label>
                                                                                                                                <input type="hidden" name="id" value="<?php echo $new_po[0]->id ?>" required class="form-control">
                                                                                                                                <input type="hidden" name="status" value="lock" required class="form-control">


                                                                                                                        </div>


                                                                                                                </div>


                                                                                                </div>






                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                <button type="submit" class="btn btn-primary">Update</button>

                                                                                        </div>
                                                                                </div>
                                                                                </form>
                                                                        </div>
                                                                </div>
                                                                <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                        </div>
                                                                                        <div class="modal-body">

                                                                                                <div class="row">
                                                                                                        <form action="<?php echo base_url('delete_po'); ?>" method="POST">

                                                                                                                <div class="col-lg-12">
                                                                                                                        <div class="form-group">

                                                                                                                                <label for=""><b>Are You Sure Want To Delete This PO?</b> </label>
                                                                                                                                <input type="hidden" name="id" value="<?php echo $new_po[0]->id ?>" required class="form-control">
                                                                                                                                <input type="hidden" name="status" value="reject" required class="form-control">
                                                                                                                                <input type="hidden" name="table_name" value="new_po" required class="form-control">


                                                                                                                        </div>


                                                                                                                </div>


                                                                                                </div>






                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                <button type="submit" class="btn btn-primary">Update</button>

                                                                                        </div>
                                                                                </div>
                                                                                </form>
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
                                                                                        <th>GST Strucutre Code</th>
                                                                                        <th>UOM</th>
                                                                                        <th>Delivery Date</th>
                                                                                        <th>Expiry Date</th>
                                                                                        <th>QTY</th>
                                                                                        <th>Price</th>
                                                                                        <th>Created Date</th>
                                                                                        <th>Actions</th>
                                                                                        <th>Price</th>
                                                                                        <th>GST</th>
                                                                                        <th>Total Price</th>



                                                                                </tr>

                                                                        </thead>
                                                                        <tfoot>

                                                                                <tr>
                                                                                        <th>Sr No</th>
                                                                                        <th>Part Number</th>
                                                                                        <th>Part Description</th>
                                                                                        <th>GST Strucutre Code</th>
                                                                                        <th>UOM</th>
                                                                                        <th>Delivery Date</th>

                                                                                        <th>Expiry Date</th>
                                                                                        <th>QTY</th>
                                                                                        <th>Price</th>
                                                                                        <th>Created Date</th>
                                                                                        <th>Actions</th>
                                                                                        <th>Price</th>
                                                                                        <th>GST</th>
                                                                                        <th>Total Price</th>


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

                                                                                                $total_rate_old = $child_part_data[0]->part_rate * $p->qty;



                                                                                                $gst_structure = $this->Crud->get_data_by_id("gst_structure", $p->tax_id, "id");

                                                                                                $cgst_amount = ($total_rate_old * $gst_structure[0]->cgst) / 100;
                                                                                                $sgst_amount = ($total_rate_old * $gst_structure[0]->sgst) / 100;
                                                                                                $igst_amount = ($total_rate_old * $gst_structure[0]->igst) / 100;

                                                                                                $gst_amount = $cgst_amount + $sgst_amount + $igst_amount;

                                                                                                $total_rate = $total_rate_old + $cgst_amount + $sgst_amount + $igst_amount;
                                                                                                $final_po_amount = $final_po_amount + $total_rate;


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
                                                                                                        <td><?php echo $child_part_data[0]->part_rate; ?></td>
                                                                                                        <td><?php echo $p->created_date; ?></td>

                                                                                                        <td>
                                                                                                                <?php
                                                                                                                if ($new_po[0]->status == "pending") {
                                                                                                                ?>
                                                                                                                        <!-- Button trigger modal -->
                                                                                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $i; ?>">
                                                                                                                                Edit
                                                                                                                        </button>

                                                                                                                        <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#exampleModaldelete<?php echo $i; ?>">
                                                                                                                                Delete
                                                                                                                        </button>

                                                                                                                        <!-- Modal -->
                                                                                                                        <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                                                                <div class="modal-dialog">
                                                                                                                                        <div class="modal-content">
                                                                                                                                                <div class="modal-header">
                                                                                                                                                        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                                                        </button>
                                                                                                                                                </div>
                                                                                                                                                <div class="modal-body">

                                                                                                                                                        <div class="row">
                                                                                                                                                                <form action="<?php echo base_url('update_po_parts'); ?>" method="POST">
                                                                                                                                                                        <div class="col-lg-12">
                                                                                                                                                                                <div class="form-group">

                                                                                                                                                                                        <label for="">Select Tax Strucutre Code / S-GST (%) / C-GST (%) / I-GST (%) <span class="text-danger">*</span> </label>

                                                                                                                                                                                        <select name="tax_id" id="" required class="form-control select2">
                                                                                                                                                                                                <?php

                                                                                                                                                                                                if ($gst_structure) {
                                                                                                                                                                                                        foreach ($gst_structure as $c) {
                                                                                                                                                                                                ?>
                                                                                                                                                                                                                <option <?php if ($c->id == $p->tax_id) {
                                                                                                                                                                                                                                echo "selected";
                                                                                                                                                                                                                        } ?> value="<?php echo $c->id ?>"><?php echo $c->code . " / " . $c->sgst . " / " . $c->cgst . " / " . $c->igst ?></option>
                                                                                                                                                                                                <?php
                                                                                                                                                                                                        }
                                                                                                                                                                                                }


                                                                                                                                                                                                ?>
                                                                                                                                                                                        </select>


                                                                                                                                                                                </div>


                                                                                                                                                                        </div>
                                                                                                                                                                        <div class="col-lg-12">
                                                                                                                                                                                <div class="form-group">

                                                                                                                                                                                        <label for="">Select UOM<span class="text-danger">*</span> </label>

                                                                                                                                                                                        <select name="uom_id" id="" required class="form-control select2">
                                                                                                                                                                                                <?php

                                                                                                                                                                                                if ($uom) {
                                                                                                                                                                                                        foreach ($uom as $c) {
                                                                                                                                                                                                ?>
                                                                                                                                                                                                                <option <?php if ($c->id == $p->uom_id) {
                                                                                                                                                                                                                                echo "selected";
                                                                                                                                                                                                                        } ?> value="<?php echo $c->id ?>"><?php echo $c->uom_name ?></option>
                                                                                                                                                                                                <?php
                                                                                                                                                                                                        }
                                                                                                                                                                                                }


                                                                                                                                                                                                ?>
                                                                                                                                                                                        </select>


                                                                                                                                                                                </div>


                                                                                                                                                                        </div>
                                                                                                                                                                        <div class="col-lg-12">
                                                                                                                                                                                <div class="form-group">

                                                                                                                                                                                        <label for="">Select Delivery Date </label>
                                                                                                                                                                                        <input type="date" value="<?php echo $p->delivery_date; ?>" name="delivery_date" placeholder=" " class="form-control">
                                                                                                                                                                                        <input type="hidden" name="id" value="<?php echo $p->id ?>" required class="form-control">


                                                                                                                                                                                </div>


                                                                                                                                                                        </div>
                                                                                                                                                                        <div class="col-lg-12">
                                                                                                                                                                                <div class="form-group">

                                                                                                                                                                                        <label for="">Enter Qty <span class="text-danger">*</span> </label>
                                                                                                                                                                                        <input type="number" name="qty" value="<?php echo $p->qty ?>" placeholder="Enter QTY " required class="form-control">


                                                                                                                                                                                </div>


                                                                                                                                                                        </div>

                                                                                                                                                        </div>






                                                                                                                                                </div>
                                                                                                                                                <div class="modal-footer">
                                                                                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                                                                        <button type="submit" class="btn btn-primary">Update</button>

                                                                                                                                                </div>
                                                                                                                                        </div>
                                                                                                                                        </form>
                                                                                                                                </div>
                                                                                                                        </div>
                                                                                                                        <!-- Modal -->
                                                                                                                        <div class="modal fade" id="exampleModaldelete<?php echo $i; ?>" tabindex="-1" aria-labelledby="" aria-hidden="true">
                                                                                                                                <div class="modal-dialog">
                                                                                                                                        <div class="modal-content">
                                                                                                                                                <div class="modal-header">
                                                                                                                                                        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                                                        </button>
                                                                                                                                                </div>
                                                                                                                                                <div class="modal-body">

                                                                                                                                                        <div class="row">
                                                                                                                                                                <form action="<?php echo base_url('delete'); ?>" method="POST">

                                                                                                                                                                        <div class="col-lg-12">
                                                                                                                                                                                <div class="form-group">

                                                                                                                                                                                        <label for=""> <b>Are You Sure Want To Delete This ? </b> </label>
                                                                                                                                                                                        <input type="hidden" name="id" value="<?php echo $p->id ?>" required class="form-control">
                                                                                                                                                                                        <input type="hidden" name="table_name" value="po_parts" required class="form-control">


                                                                                                                                                                                </div>


                                                                                                                                                                        </div>


                                                                                                                                                        </div>






                                                                                                                                                </div>
                                                                                                                                                <div class="modal-footer">
                                                                                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                                                                        <button type="submit" class="btn btn-primary">Update</button>

                                                                                                                                                </div>
                                                                                                                                        </div>
                                                                                                                                        </form>
                                                                                                                                </div>
                                                                                                                        </div>


                                                                                                                <?php } else {
                                                                                                                        echo "Can't Update , This PO is " . $new_po[0]->status;
                                                                                                                }
                                                                                                                ?>


                                                                                                        </td>
                                                                                                        <td><?php echo $total_rate_old; ?></td>
                                                                                                        <td><?php echo $gst_amount; ?></td>
                                                                                                        <td><?php echo $total_rate; ?></td>

                                                                                                </tr>
                                                                                <?php
                                                                                                $i++;
                                                                                        }
                                                                                }

                                                                                ?>



                                                                        </tbody>

                                                                        <tfoot>
                                                                                <?php
                                                                                if ($po_parts) {
                                                                                ?>
                                                                                        <tr>
                                                                                                <th colspan="13">Total</th>
                                                                                                <th><?php echo $final_po_amount; ?></th>

                                                                                        </tr>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                        </tfoot>

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