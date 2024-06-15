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
                        <h1>Select Planing Month </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                                <h3 class="card-title"></h3>
                                <!-- Button trigger modal -->
                                <!-- <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                                    Add Planing</button> -->

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role=" document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Planing</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo base_url('add_planning_data') ?>" method="POST">
                                                    <div class="row">
                                                        <div class="col-lg-12">

                                                            <div class="form-group">
                                                                <label for="contractorName">Select Customer Part Number / Description  </label><span class="text-danger">*</span>
                                                                <select name="customer_part_id" id="" class="form-control select2">
                                                                    <?php 
                                                                    if($customer_part)
                                                                    {
                                                                        foreach($customer_part as $c )
                                                                        {

                                                                            ?>
                                                                            <option value="<?php echo $c->id; ?>"><?php echo $c->part_number." /".$c->part_description; ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        <div class="col-lg-12">

                                                            <div class="form-group">
                                                                <label for="contractorName">Select Month  </label><span class="text-danger">*</span>
                                                                <select name="month_id" id="" class="form-control select2">
                                                                        <option value="APR">APR</option>
                                                                        <option value="MAY">MAY</option>
                                                                        <option value="JUN">JUN</option>
                                                                        <option value="JUL">JUL</option>
                                                                        <option value="AUG">AUG</option>
                                                                        <option value="SEP">SEP</option>
                                                                        <option value="OCT">OCT</option>
                                                                        <option value="NOV">NOV</option>
                                                                        <option value="DEC">DEC</option>
                                                                        <option value="JAN">JAN</option>
                                                                        <option value="FEB">FEB</option>
                                                                        <option value="MAR">MAR</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-12">

                                                            <div class="form-group">
                                                                <label for="contractorName">Enter Schedule Qty  </label><span class="text-danger">*</span>
                                                                <input type="number" required name="schedule_qty" class="form-control">
                                                                <input type="hidden" required name="financial_year" value="<?php echo $financial_year;?>" class="form-control">
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
                                        <th>Sr. No.</th>
                                            <th>Month</th>  
                                          
                                            <th>View Details </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           
                                            <th>Month </th>
                                            <th>View Details </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>APR</td>
                                                <td>
                                                    <a class="btn btn-info" href="<?php echo base_url('planing_data/').$financial_year."/APR/0"?>">View Details</a>    
                                                  </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>MAY</td>
                                                <td>
                                                    <a class="btn btn-info" href="<?php echo base_url('planing_data/').$financial_year."/MAY/0"?>">View Details</a>    
                                                  </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>JUN</td>
                                                <td>
                                                    <a class="btn btn-info" href="<?php echo base_url('planing_data/').$financial_year."/JUN/0"?>">View Details</a>    
                                                  </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>JUL</td>
                                                <td>
                                                    <a class="btn btn-info" href="<?php echo base_url('planing_data/').$financial_year."/JUL/0"?>">View Details</a>    
                                                  </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>AUG</td>
                                                <td>
                                                    <a class="btn btn-info" href="<?php echo base_url('planing_data/').$financial_year."/AUG/0"?>">View Details</a>    
                                                  </td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>SEP</td>
                                                <td>
                                                    <a class="btn btn-info" href="<?php echo base_url('planing_data/').$financial_year."/SEP/0"?>">View Details</a>    
                                                  </td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>OCT</td>
                                                <td>
                                                    <a class="btn btn-info" href="<?php echo base_url('planing_data/').$financial_year."/OCT/0"?>">View Details</a>    
                                                  </td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>NOV</td>
                                                <td>
                                                    <a class="btn btn-info" href="<?php echo base_url('planing_data/').$financial_year."/NOV/0"?>">View Details</a>    
                                                  </td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>DEC</td>
                                                <td>
                                                    <a class="btn btn-info" href="<?php echo base_url('planing_data/').$financial_year."/DEC/0"?>">View Details</a>    
                                                  </td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>JAN</td>
                                                <td>
                                                    <a class="btn btn-info" href="<?php echo base_url('planing_data/').$financial_year."/JAN/0"?>">View Details</a>    
                                                  </td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>FEB</td>
                                                <td>
                                                    <a class="btn btn-info" href="<?php echo base_url('planing_data/').$financial_year."/FEB/0"?>">View Details</a>    
                                                  </td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>FEB</td>
                                                <td>
                                                    <a class="btn btn-info" href="<?php echo base_url('planing_data/').$financial_year."/MAR/0"?>">View Details</a>    
                                                  </td>
                                            </tr>
                                    </tbody>
                                    <!-- <tbody>
                                        <?php
                                        $i = 1;
                                        if ($planing_data) {
                                            foreach ($planing_data as $t) {

                                                $customer_part_data = $this->Crud->get_data_by_id("customer_part", $t->customer_part_id, "id");
                                                $customers_data = $this->Crud->get_data_by_id("customer", $customer_part_data[0]->customer_id, "id");

                                        ?>

                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $customer_part_data[0]->part_number ?></td>
                                                    <td><?php echo $customer_part_data[0]->part_description ?></td>
                                                    <td><?php echo $customers_data[0]->customer_name ?></td>
                                                    <td><?php echo $t->month ?></td>
                                                    <td>
                                                    <a class="btn btn-info" href="<?php echo base_url('view_planing_data/').$t->id?>">View Details</a>    
                                                  </td>
                                                    
                                                </tr>
                                        <?php
                                                $i++;
                                            }
                                        }
                                        ?>
                                    </tbody> -->
                                   
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