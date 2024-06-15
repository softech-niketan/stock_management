<div class="wrapper">
    <!-- Navbar -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script>
        function validateDescription() {
            var description = document.getElementById('exampleInputEmail1').value;
            var wordCount = description.trim().split(/\s+/).length;
            if (wordCount < 10) {
                alert("The short description must contain at least 10 words.");
                return false;
            }
            return true;
        }
    </script>

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
                                <?php //include 'generate.php' 
                                ?>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add1515 </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form onsubmit="return validateDescription()" action="<?php echo base_url('addcustomerpart') ?>" method="POST" enctype='multipart/form-data'>
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
                                                        <div class="form-group">
                                                            <label for="po_num">Vendor Code </label><span class="text-danger">*</span>
                                                            <input type="text" name="vendor_code" required class="form-control" id="exampleInputEmail1" placeholder="Enter" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="form-group">
                <label for="po_num">Short Description</label><span class="text-danger">*</span>
                <input type="text" name="short_description" required class="form-control" id="exampleInputEmail1" placeholder="Enter" aria-describedby="emailHelp">
            </div>

                                                        <!-- <div class="form-group">
                                                            <label for="on click url">Select Color<span class="text-danger">*</span></label> <br>
                                                            <select name="color_name" class="form-control" id="">
                                                            <option value="yellow">Yellow</option>
                                                            <option value="white">White</option>
                                                            <option value="red">Red</option>
                                                            <option value="green">Green </option>
                                                            <option value="maroon">Maroon </option>
                                                            <option value="blue">Blue </option>
                                                            </select>


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
                                            <th>Vendor Code</th>
                                            <th>Short Description</th>
                                            <th>Part Code</th>


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
                                            <th>Packing Qty</th>
                                            <th>Vendor Code</th>
                                            <th>Short Description</th>
                                            <th>Part Code</th>


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
                                                // echo $poo->part_number;
                                                // $po = $this->Crud->get_data_by_id("customer_part", $poo->part_number, "part_number");
                                                // $customer_data = $this->Crud->get_data_by_id("customer", $po[0]->customer_id, "id");
                                                // $customer_part_data = $this->Crud->get_data_by_id("customer_part_type", $po[0]->customer_part_id, "id");
                                                // print_r($supplier_data);
                                                      
                                                require 'vendor/autoload.php';
                        $code = $po->part_code;
                                                
                                                // This will output the barcode as HTML output to display in the browser
                       
                                            
                                                
                                        ?>
          

                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $po->part_number; ?></td>
                                                    <td><?php echo $po->part_description; ?></td>
                                                    <td><?php echo $po->qty; ?></td>
                                                    <td><?php echo $po->vendor_code; ?></td>
                                                    <td><?php echo $po->short_description; ?></td>
                                                    <!-- <td><?php echo  $po->part_code; ?></td> -->
                                                    <td>
                                            


                                                     <?php 
                                                     if(!$po->part_code){

                                                     }else{ ?>

                                                            <div id="my-node<?php echo $i ?>">
                                                                    <svg class="barcode<?php echo $po->part_code;?>"></svg>
                                                                        <br>
                                                                            Bar code : <?php echo $po->part_code; ?>
                                                                            <br>

                                                                <div>

                                                                <button style="margin-left:130px;" onclick="printDiv('my-node<?php echo $i ?>')" class="btn btn-danger no-print">
                Print
            </button> 


                                                            <script>


                                                                                    JsBarcode(".barcode<?php echo $po->part_code; ?>", <?php echo $po->part_code; ?>, {
                                                                                        
                                                                            lineColor: "black",
                                                                            height: 40,
                                                                            displayValue: false
                                                                            });

                                                                                    
                                                                </script>
                                                      
                                               


                                                            <?php }?>

                                                            
  <script>
                                                            function printDiv(id) {
                                                                var divContents = document.getElementById(id).innerHTML;
                                                                var a = window.open('', '', 'height=500, width=500');
                                                                a.document.write('<html>');
                                                                a.document.write('<head><style>.no-print { display: none; }</style></head>'); 

                                                                a.document.write('<body >');
                                                                a.document.write(divContents);
                                                                a.document.write('</body></html>');
                                                                a.document.close();
                                                                a.print();
                                                            }
                                                        </script>
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