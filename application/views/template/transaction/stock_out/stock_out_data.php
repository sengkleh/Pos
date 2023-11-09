
<!-- page content -->
<div class="right_col" role="main">
    <div class="">


    <div class="page-title">
        <div class="title_left">
        <h3>Form Data Stock out <small>Some</small></h3>
        
        <a href="<?php echo site_url('Ctr_stock/out/add')?>" class ="btn btn-primary btn-sm mb-2 mt-6"><i class="fa glyphicon glyphicon-arrow-left" aria-hidden="true"></i> Add Data Stock</a>
        </div>

        <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
            </span>
            </div>
        </div>
        </div>
    </div>

        <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12">
                     <div class="x_panel">
                        <div class="x_title">
                            <h2>Tabel Data User<small>!!</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                <div class="clearfix"></div>
                </div>

                <!--x content-->
                <div class="x_content">
                    <!--row-->
                    <div class="row">
                        <!--col sm 12-->
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                    <!--table-->
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr class="text-center" widte="160px">
                                                <th>No</th>
                                                <th>Barcode</th>
                                                <th>Product Item</th>
                                                <th>QTY</th>
                                                <th>Info</th>
                                                <th>Date</th>
                                                <th class="text-center" widte="160px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--perulangan-->
                                        <?php 
                                            $no = 1;
                                            foreach($row as $stock=> $data) { ?>
                                                <tr class="text-center" widte="160px">
                                                <td><?php echo $no++ ?></td>    
                                                <td><?php echo $data->barcode?></td>
                                                <td><?php echo $data->name?></td>
                                                <td><?php echo $data->qty?></td>
                                                <td><?php echo $data->info?></td>
                                                <td><?php echo indo_date($data->date)?></td>

                                                <td class="text-center" widte="160px">
                                                    <!--form action update delete-->
                                                    <Form action="<?php echo site_url(''. $data->id_stock. '/')?>>" method="POST">
                                                        <a href="<?php echo site_url('Ctr_stock/out/del/'.$data->id_stock. '/'.$data->id_item)?>" onclick="return confirm ('Apakah Anda Yakin !!!')" class ="btn btn-danger btn-sm mb-2"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                                    </form>
                                                    <!--end form action update delete-->
                                                </td>
                                                </tr>
                                            <?php } ?>
                                            <!--end perulangan-->
                                            </tbody>
                                    </table>
                                    <!--end table-->
                                </div>                           
                            </div>
                        </div>
                        <!--end col sm 12-->
                    </div>
                    <!--end row-->
                </div>
                <!--end x content-->
            </div>
        </div>
    </div>
</div>
<!-- /page content -->


            
    </div>
  </div>
</div>
<!--end title Modal pop up-->

