
<!-- page content -->
<div class="right_col" role="main">
    <div class="">

    <div class="page-title">
        <div class="title_left">
            <h3>Data items <small>Some</small></h3>
            <a href="<?php echo site_url('Ctr_item/tambahitem')?>" class ="btn btn-primary btn-sm mb-2 mt-6"><i class="fa fa-plus" aria-hidden="true"></i> Add item</a>
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
                <h2>Tabel Data items<small>!!</small></h2>
                <?php $this->view('template/messege') ?>
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
                    <li>
                        <a class="close-link"><i class="fa fa-close"></i></a>
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
                                <p class="text-muted font-13 m-b-30">
                                    DataTables item:
                                </p>
                                    <!--<?php print_r($row->result())?>-->

                                    <!--table-->
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr class="text-center" widte="160px">
                                                <th>No</th>
                                                <th>Barcode</th>
                                                <th>Nama item</th>
                                                <th>Category</th>
                                                <th>Unit</th>
                                                <th>Stock</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                                <th class="text-center" widte="160px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <!--perulangan-->
                                            <?php 
                                            $no = 1;
                                            foreach($row->result() as $key=> $data) { ?>
                                                <tr class="text-center" widte="160px">
                                                <td><?php echo $no++ ?></td>    
                                                <td class="text-center" widte="160px">
                                                    <?php echo $data->barcode?><br>
                                                    <a href="<?php echo site_url('Ctr_item/barcode_qrcode/'. $data->id_item)?>" class ="btn btn-app btn-sm mb-2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Barcode</a>
                                                </td>
                                                <td><?php echo $data->name?></td>
                                                <td><?php echo $data->category_name?></td>
                                                <td><?php echo $data->unit_name?></td>
                                                <td><?php echo $data->stock?></td>
                                                <td><?php echo $data->price?></td>
                                                <td class="text-center" widte="160px">
                                                    <?php if ($data->image != null) { ?>
                                                        <img src="<?php echo base_url('uploads/product/'.$data->image)?>" style="width:50px">
                                                    <?php } ?>
                                                </td>
                                                <td class="text-center" widte="160px">
                                                <!--form action update delete-->
                                                    <Form action="<?php echo site_url('Ctr_item/deletitem')?>" method="POST">
                                                        <a href="<?php echo site_url('Ctr_item/edititem/'. $data->id_item)?>" class ="btn btn-info btn-sm mb-2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update</a>
                                                        <input type="hidden" name="id_item" value="<?php echo $data->id_item?>">
                                                        <button onclick="return confirm ('Apakah Anda Yakin !!!')" class ="btn btn-danger btn-sm mb-2"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
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