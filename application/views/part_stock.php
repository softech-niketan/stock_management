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
                        <h1>Part Stock</h1>
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
                                <?php //include 'generate.php' 
                                ?>
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
                                            <form action="<?php echo base_url('addcustomerpart') ?>" method="POST" enctype='multipart/form-data'>
                                                <div class="row">
                                                    <div class="col-lg-12">


                                                        <!-- <div class="form-group">
                                                                <label for="operation_number">Operation Number</label><span class="text-danger">*</span>
                                                                <input type="text" name="operationNumber" class="form-control" required id="exampleInputPassword1" placeholder="Operation Number">

                                                        </div>-->
                                                        <div class="form-group">
                                                            <label for="po_num">Part Number </label><span class="text-danger">*</span>
                                                            <input type="text" name="part_number" required class="form-control" id="exampleInputEmail1" placeholder="Enter Part Number" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="po_num">Part Description </label><span class="text-danger">*</span>
                                                            <input type="text" name="part_desc" required class="form-control" id="exampleInputEmail1" placeholder="Enter Description" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="po_num">Packing Qty </label><span class="text-danger">*</span>
                                                            <input type="number" name="qty" required class="form-control" id="exampleInputEmail1" placeholder="Enter Qty" aria-describedby="emailHelp">
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
                                            <th>FG Rack stock</th>
                                            <th>Box pack stock</th>
                                            <th>Invoice Barcode Generated stock </th>

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
                                    <tfoot>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <!-- <th>Add Revision</th> -->

                                            <!-- <th>Revision Number</th>
                                            <th>Revision Date</th>
                                            <th>Revision Remark</th> -->
                                            <!-- <th>Customer Name</th> -->
                                            <th>Part Number</th>
                                            <th>Part Description</th>
                                            <th>FG Rack stock</th>
                                            <th>Box pack stock</th>
                                            <th>Invoice Barcode Generated stock </th>

                                            <!-- <th>Customer Part Type</th>
                                            <th>Part Family</th>

                                            <th>UOM</th>
                                            <th>HSN</th>
                                            <th>Saftey Stock</th> -->
                                            <!-- <th>BOM</th>
                                            <th>Drawing</th>
                                            <th>Model</th> -->
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        if ($parts) {

                                            foreach ($parts as $po) {
                                                // $part_stock = 0;
                                                // // echo $poo->part_number;
                                                // // $po = $this->Crud->get_data_by_id("customer_part", $poo->part_number, "part_number");

                                                // $packing_data = $this->Crud->get_data_by_id("packing", $po->id, "part_id");
                                                // if ($packing_data) {
                                                //     foreach ($packing_data as $pp) {
                                                //         $part_stock = $pp->part_qty;
                                                //     }
                                                // }

                                                $array = array(
                                                    "part_id" => $po->id,
                                                    "status" => "pending"
                                                );

                                                $fg = 0;
                                                $packing_data_count = $this->Common_admin_model->get_data_by_id_multiple_condition("packing", $array);
                                                if ($packing_data_count) {
                                                    foreach ($packing_data_count as $pp) {
                                                        $fg = $fg + $pp->part_qty;
                                                    }
                                                }

                                                $array22 = array(
                                                    "part_id" => $po->id,
                                                    "status" => "pending"
                                                );

                                                $bp = 0;
                                                $box_packing_data = $this->Common_admin_model->get_data_by_id_multiple_condition("box_packing", $array22);
                                                if ($box_packing_data) {
                                                    foreach ($box_packing_data as $pp) {
                                                        $bp = $bp + $pp->part_qty;
                                                    }
                                                }

                                                $array33 = array(
                                                    "part_id" => $po->id,
                                                    "status" => "pending"
                                                );

                                                $in = 0;
                                                $invoice_data_Db = $this->Common_admin_model->get_data_by_id_multiple_condition("invoice", $array33);
                                                if ($invoice_data_Db) {
                                                    foreach ($invoice_data_Db as $pp) {
                                                        $in = $in + $pp->qty;
                                                    }
                                                }

                                        ?>

                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $po->part_number; ?></td>
                                                    <td><?php echo $po->part_description; ?></td>
                                                    <td><?php echo $fg; ?></td>
                                                    <td><?php echo $bp; ?></td>
                                                    <td><?php echo $in; ?></td>




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