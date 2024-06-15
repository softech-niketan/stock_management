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
                        <h1>Inwarding PO Invoice Numbers</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Insert List</li>
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

                        <a class="btn btn-danger" href="<?php echo base_url('inwarding'); ?>">
                            < Back</a>

                                <!-- /.card -->

                                <div class="card">

                                    <div class="card-header">

                                        <!-- Button trigger modal -->


                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url('add_invoice_number') ?>" method="POST">
                                                            <div class="row">
                                                                <div class="col-lg-12">

                                                                    <div class="form-group">
                                                                        <label for="tool_number">Invoice Number </label><span class="text-danger">*</span>
                                                                        <input type="text" name="invoice_number" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Invoice Number">
                                                                        <input type="hidden" name="new_po_id" value="<?php echo $new_po_id ?>" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Invoice Number">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="tool_number">Invoice Date </label><span class="text-danger">*</span>
                                                                        <input type="date" name="invoice_date" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Invoice Number">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="tool_number">GRN Date </label><span class="text-danger">*</span>
                                                                        <input type="date" name="grn_date" readonly value="<?php echo date("Y-m-d"); ?>" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Invoice Number">
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
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sr No</th>

                                                    <th>Invoice Number</th>
                                                    <th>Invoice Date</th>
                                                    <th>GRN Date</th>
                                                    <th>GRN Number </th>
                                                    <th>View Details</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Sr No</th>
                                                    <th>Invoice Number</th>
                                                    <th>Invoice Date</th>
                                                    <th>GRN Date</th>
                                                    <th>GRN Number </th>
                                                    <th>View Details</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                if ($inwarding_data) {
                                                    foreach ($inwarding_data as $t) {


                                                ?>

                                                        <tr>
                                                            <td><?php echo $i ?></td>
                                                            <td><?php echo $t->invoice_number ?></td>
                                                            <td><?php echo $t->invoice_date ?></td>
                                                            <td><?php echo $t->grn_date ?></td>
                                                            <td><?php echo $t->grn_number ?></td>
                                                            <td><a href="<?php echo base_url('inwarding_details/') . $t->id . "/" . $new_po_id . "/" . $t->invoice_number ?>" class="btn btn-primary" href="">Inwarding Details</a></td>

                                                        </tr>
                                                <?php
                                                        $i++;
                                                    }
                                                }
                                                ?>
                                            </tbody>

                                        </table>

                                    </div>
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sr No</th>

                                                    <th>Part Number</th>
                                                    <th>Part Description</th>
                                                    <th>Balance QTY </th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Sr No</th>

                                                    <th>Part Number</th>
                                                    <th>Part Description</th>
                                                    <th>Balance QTY </th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                $flag = 0;
                                                if ($po_parts) {
                                                    $final_po_amount = 0;
                                                    $i = 1;
                                                    foreach ($po_parts as $p) {
                                                        $child_part_data = $this->Crud->get_data_by_id("child_part_master", $p->part_id, "id");
                                                        // $gst_structure_data = $this->Crud->get_data_by_id("gst_structure", $p->tax_id, "id");
                                                        // $uom_data = $this->Crud->get_data_by_id("uom", $p->uom_id, "id");

                                                        // $total_rate = $child_part_data[0]->part_rate * $p->qty;
                                                        // $final_po_amount = $final_po_amount + $total_rate;

                                                        // $arr = array(
                                                        //     'inwarding_id' => $inwarding_id,
                                                        //     'part_id' => $child_part_data[0]->id,
                                                        //     'po_number' => $new_po_id,
                                                        //     'invoice_number' => $inwarding_data[0]->invoice_number,
                                                        //     'grn_number' => $inwarding_data[0]->grn_number,
                                                        // );
                                                        // $grn_details_data = $this->Crud->get_data_by_id_multiple("grn_details", $arr);

                                                        // if ($grn_details_data) {
                                                        //     $data_present = "yes";
                                                        // } else {
                                                        //     $data_present = "no";
                                                        // }
                                                        $qty = 0;
                                                        $qty = $p->pending_qty;;
                                                        if (true) {
                                                            $flag = $flag + $qty;



                                                ?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $child_part_data[0]->part_number; ?></td>
                                                                <td><?php echo $child_part_data[0]->part_description; ?></td>
                                                                <td><?php echo $qty; ?></td>

                                                    <?php
                                                            $i++;
                                                        }
                                                    }
                                                } else ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="4">
                                                        <?php
                                                        if ($flag == 0) {

                                                        ?>
                                                            <div class="alert-danger">
                                                                <div class="alert">
                                                                    you can't add invoice number because all parts balance qty is zero
                                                                </div>
                                                            </div>

                                                        <?php
                                                        } else {


                                                        ?>
                                                            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                                                                Add Invoice Number</button>
                                                        <?php
                                                        } ?>
                                                    </td>
                                                </tr>
                                            </tfoot>

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