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
                        <h1>Financial Year</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
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
                                <h3 class="card-title">Select Financial Year</h3>
                                <!-- Button trigger modal -->
                                
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add OC Number </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo base_url('addOtherData') ?>" method="POST">


                                                    <div class="form-group">
                                                        <label for="part_name">OC Number</label><span class="text-danger">*</span>
                                                        <input type="text" name="hus_num" required class="form-control" id="hus_num" aria-describedby="emailHelp" placeholder="OC Number">
                                                        <input value="oc" name="type" type="hidden" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Machine Name">

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
                                            <th>Finanical Year</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Finanical Year</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>FY-2021</td>
                                            <td>
                                                <a    class="btn btn-info"    href="<?php echo base_url('planing_data_month/FY-2021');?>">View Details</a>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>FY-2022</td>
                                            <td>
                                                <a    class="btn btn-info"   href="<?php echo base_url('planing_data_month/FY-2022');?>">View Details</a>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>FY-2023</td>
                                            <td>
                                                <a   class="btn btn-info"    href="<?php echo base_url('planing_data_month/FY-2023');?>">View Details</a>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>FY-2024</td>
                                            <td>
                                                <a    class="btn btn-info"   href="<?php echo base_url('planing_data_month/FY-2024');?>">View Details</a>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>FY-2025</td>
                                            <td>
                                                <a   class="btn btn-info"    href="<?php echo base_url('planing_data_month/FY-2025');?>">View Details</a>
                                            </td>
                                            
                                        </tr>
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