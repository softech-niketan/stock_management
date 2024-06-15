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
                        <h1>Add Box To Invoice</h1>
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
                                    <?php
                                    if ($invoice[0]->lock_status == "no" && $total_part_qty != $invoice[0]->qty) {
                                    ?>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <form action="<?php echo base_url('add_invoice_box_data') ?>" method="post">
                                                    <label for="">Scan Code</label>
                                                    <input type="number" required name="box_id" placeholder="Box Barcode" class="form-control">
                                                    <input type="hidden" value="<?Php echo $invoice_id; ?>" name="invoice_id" class="form-control">
                                                    <input type="hidden" value="<?Php echo $invoice[0]->qty; ?>" name="qty" class="form-control">
                                                    <input type="hidden" value="<?Php echo $invoice[0]->part_id; ?>" name="part_id" class="form-control">
                                                    <input type="hidden" value="<?Php echo $total_part_qty; ?>" name="total_part_qty" class="form-control">
                                                    <!-- <input type="hidden" value="<?Php echo $invoice[0]->qty; ?>" name="total_part_qty" class="form-control"> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-danger mt-4">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                        </form>

                                    <?php
                                    } else {
                                    ?>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <p>
                                                    Status :

                                                    <?php

                                                    if ($total_part_qty == $invoice[0]->qty) {
                                                        echo "Invoice Qty Matched";


                                                        if ($invoice[0]->lock_status != "yes") {

                                                    ?>
                                                            <button type="button" class="btn btn-primary float-left mt-4" data-toggle="modal" data-target="#exampleModal">
                                                                Lock Invoice </button>
                                                    <?php
                                                        }
                                                    } else {
                                                        echo "Invoice Locked !!";
                                                    } ?>
                                                </p>

                                            </div>
                                        </div>
                                    <?php
                                    }


                                    ?>
                                    <?php
                                    if ($invoice[0]->lock_status == "no") {
                                    ?>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <!-- <button type="submit" class="btn btn-info mt-4">Lock Box</button> -->


                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Lock Box </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php echo base_url('change_invoice_status') ?>" method="POST" enctype='multipart/form-data'>
                                                                    <div class="row">
                                                                        <div class="col-lg-12">

                                                                            <label for="">Are You Sure Want To Lock This Invoice ?</label>
                                                                            <input type="hidden" name="invoice_id" value="<?php echo $invoice[0]->id ?>" class="form-control">
                                                                            <input type="hidden" name="status" value="yes" class="form-control">

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
                                    <?php
                                    }


                                    ?>
                                    <!-- <div class="col-lg-2">
                                        <div class="form-group">
                                            <p>Part Name / Description</p>
                                            <input type="text" readonly value="<?php echo $parts_data[0]->part_number . " / " . $parts_data[0]->part_description; ?>" class="form-control">
                                            </form>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <p>Invoice Qty Required</p>
                                            <input type="text" readonly value="<?php echo $invoice[0]->qty; ?>" class="form-control">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <p>Added Box Qty</p>
                                            <input type="text" readonly value="<?php echo $total_part_qty; ?>" class="form-control">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <p>PO Number</p>
                                            <input type="text" readonly value="<?php echo $invoice[0]->po_number; ?>" class="form-control">
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <?php
                            if ($invoice[0]->lock_status == "yes") {
                            ?>
                                <div class="card-header float-right ">
                                    <div class="card bg-light mb-3" style="max-width: 20rem;" id="my-node" style="font-weight: bold;">
                                        <div class="card-body" style="font-weight: bold;">


                                            <p class="card-text" style="font-size:20px">Invoice Number :<?php echo $invoice[0]->invoice_number; ?>
                                                <br>
                                                <?php
                                                $code = $invoice[0]->barcode;
                                                require 'vendor/autoload.php';
                                                // This will output the barcode as HTML output to display in the browser
                                                // $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                                // echo $generator->getBarcode($code, $generator::TYPE_CODE_128);
                                                // echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode('081231723897', $generator::TYPE_CODE_128)) . '">';
                                                $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                                echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($code, $generator::TYPE_CODE_128)) . '">';

                                                ?>
                                                <br>
                                                Pkg Date : <?php echo $invoice[0]->created_time; ?>
                                                <br>
                                                Part No : <?php echo $part_number_display; ?>
                                                <br>
                                                Total Part Qty: <?php echo $total_part_qty; ?>
                                                <br>
                                                Barcode: <?php echo $invoice[0]->barcode; ?>
                                                <br>



                                                <?php
                                                $code = $invoice[0]->barcode;
                                                require 'vendor/autoload.php';
                                                $code = $invoice[0]->barcode;
                                                // This will output the barcode as HTML output to display in the browser
                                                // $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                                // echo $generator->getBarcode($code, $generator::TYPE_CODE_128);
                                                // echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode('081231723897', $generator::TYPE_CODE_128)) . '">';
                                                //$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                                //echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($code, $generator::TYPE_CODE_128)) . '">';

                                                ?>



                                                <span class="qrcode">




                                            </p>


                                        </div>
                                    </div>
                                    <script>
                                        function printDiv(id) {
                                            var divContents = document.getElementById(id).innerHTML;
                                            var a = window.open('', '', 'height=500, width=500');
                                            a.document.write('<html>');
                                            a.document.write('<body >');
                                            a.document.write(divContents);
                                            a.document.write('</body></html>');
                                            a.document.close();
                                            a.print();
                                        }
                                    </script>


                                    <button id="foo" class="btn btn-info">
                                        Download
                                    </button>
                                    <button onclick="printDiv('my-node')" class="btn btn-danger">
                                        Print
                                    </button>

                                    <script>
                                        var node = document.getElementById('my-node');
                                        var btn = document.getElementById('foo');
                                        btn.onclick = function() {
                                            // node.innerHTML = "I'm an image now."
                                            domtoimage.toBlob(document.getElementById('my-node')).then(function(blob) {
                                                window.saveAs(blob, '<?php echo $box[0]->barcode; ?>.png');
                                            });
                                        }
                                        // var qrData = 'Invoice No :';

                                        <?php
                                        $parts = "";
                                        $description = "";
                                        $vendor_code = "";
                                        $batch_code = "";
                                        if ($invoice_box) {
                                            foreach ($invoice_box as $po) {
                                                // echo $poo->part_number;
                                                $box_data = $this->Crud->get_data_by_id("box", $po->box_id, "barcode");
                                                $box_packing = $this->Crud->get_data_by_id("box_packing", $box_data[0]->id, "box_id");
                                                if ($box_packing) {
                                                    foreach ($box_packing as $po) {
                                                        $packing_data = $this->Crud->get_data_by_id("packing", $po->pack_id, "barcode");
                                                        $parts_data = $this->Crud->get_data_by_id("parts", $packing_data[0]->part_id, "id");

                                                        $parts .= $parts_data[0]->part_number . ",";
                                                        $description .= $parts_data[0]->part_description . ",";
                                                        $vendor_code = $parts_data[0]->vendor_code;
                                                        $batch_code .= $packing_data[0]->batch_code . ",";
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                        var qrData = 'Invoice No : <?php echo $invoice[0]->invoice_number; ?>' + "\n" +
                                            'part no : <?php echo $parts ?>' + "\n" +
                                            'Part Description :<?php echo $description ?>' + "\n" +
                                            'Supplier Code : <?php echo $vendor_code ?>' + "\n" +
                                            'Date : <?php echo $invoice[0]->created_time; ?>' + "\n" +
                                            'Batch Code : <?php echo $batch_code ?>' + "\n" +
                                            'PAN Number: AEDPJ2153G' + "\n" +
                                            'GSTN: 27AEDPJ2153G1ZT' + "\n" +
                                            'Manf Location : Pune' + "\n" +
                                            'PO Number:<?php echo $invoice[0]->po_number ?>' + "\n" +
                                            'Quantity : <?php echo $total_part_qty; ?>' + "\n" +
                                            'Supplier:Lakshmi Engineering';

                                        // var qrData = 'Invoice No : <?php echo $invoice[0]->invoice_number; ?>' + "\n" + 'part no : <?php echo $part_number_display; ?>' + "\n" + 'Quantity : <?php echo $total_part_qty; ?>' + "\n" + 'Date : <?php echo $invoice[0]->created_time; ?>' + "\n";

                                        var qrcode = new QRCode(document.querySelector(".qrcode"), {
                                            text: qrData,
                                            width: 128,
                                            height: 128,
                                            colorDark: "black",
                                            colorLight: "#ffffff",
                                            correctLevel: QRCode.CorrectLevel.L
                                        });

                                        JsBarcode(".barcode", <?php echo $code; ?>, {

                                            lineColor: "black",
                                            height: 40,
                                            displayValue: false
                                        });
                                    </script>



                                </div>
                            <?php } ?>
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


                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <!-- <th>Packing Name</th> -->
                                            <th>Box Name</th>
                                            <th>Total Part Qty</th>
                                            <th>View Details</th>
                                            <th>Delete</th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $i = 1;
                                        if ($invoice_box) {
                                            foreach ($invoice_box as $po) {
                                                // echo $poo->part_number;
                                                $box_data = $this->Crud->get_data_by_id("box", $po->box_id, "barcode");
                                                $box_packing = $this->Crud->get_data_by_id("box_packing", $box_data[0]->id, "box_id");
                                                $part_qty = 0;
                                                if ($box_packing) {
                                                    foreach ($box_packing as $b) {
                                                        $packing_data = $this->Crud->get_data_by_id("packing", $b->pack_id, "barcode");

                                                        $part_qty = $packing_data[0]->part_qty + $part_qty;
                                                    }
                                                }
                                                // $parts_data = $this->Crud->get_data_by_id("parts", $packing_data[0]->part_id, "id");
                                                // $customer_part_data = $this->Crud->get_data_by_id("customer_part_type", $po[0]->customer_part_id, "id");
                                                // print_r($supplier_data);
                                        ?>

                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $box_data[0]->box_name; ?></td>
                                                    <td><?php echo $part_qty; ?></td>
                                                    <td>

                                                        <a href="<?php echo base_url('add_packing_to_box/') . $box_data[0]->id; ?>" class="btn btn-primary">

                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <?php
                                                        if ($invoice[0]->lock_status == "no") {
                                                        ?>
                                                            <button type="button" class="btn btn-danger float-left" data-toggle="modal" data-target="#exampleModal<?php echo $i; ?>">
                                                                Delete </button>
                                                            <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Delete </h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="<?php echo base_url('delete') ?>" method="POST" enctype='multipart/form-data'>
                                                                                <div class="row">
                                                                                    <div class="col-lg-12">

                                                                                        <label for="">Are You Sure Want To Delete This Box ?</label>
                                                                                        <input type="hidden" name="id" value="<?php echo $po->id ?>" class="form-control">
                                                                                        <input type="hidden" name="table_name" value="invoice_box" class="form-control">

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
                                                        <?php

                                                        } else {
                                                            echo "Invoice Locked Can't Delete";
                                                        } ?>
                                                    </td>
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