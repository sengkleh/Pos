<!-- page content -->
<div class="right_col" role="main">
    <div class="">

    <div class="page-title">
        <div class="title_left">
        <h3>Form Stock <small>Some</small></h3>
        <a href="<?php echo site_url('Ctr_stock/in')?>" class ="btn btn-primary btn-sm mb-2 mt-6"><i class="fa fa-arrow-left" aria-hidden="true"></i></i> Back</a>
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
            <h2>Form  Data Suppliers<small>!!</small></h2>
            <?php echo validation_errors(); ?>
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
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="<?php echo site_url('Ctr_stock/prosess/')?>" method="POST">
                            <div class="card-box table-responsive">
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span >*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            
                                            <input class="form-control" type="date" name="date" id="date" value="<?php echo date('y-m-d') ?>" required="required"/>
                                            <span  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="file item form-group">
                                        <label for="barcode" class="col-form-label col-md-3 col-sm-3  label-align">Barcode<span >*</span></label>
                                        <div class="input-group col-md-6 col-sm-6 form-group pull-right search">
                                            <input type="hidden" name="id_item" id="id_item">
                                            <input class="form-control" type="text" name="barcode" id="barcode" value="" required="required" />
                                            <span class="input-group-btn">
                                                <button class="btn btn-info btn-flat" type="button" name="barcode"  data-toggle="modal" data-target="#modal-item">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Item<span >*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" type="text" name="name" id="name" value="-" readonly  />
                                            <span class="fa fa-map-marker form-control-feedback right" aria-hidden="true"></span>
                                        </div>
                                    </div>  
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align"><span >Unit</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" type="text" name="unit_name" id="unit_name" value="-" placeholder="Item Unit" readonly  />
                                            <span aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Stock<span >*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" type="text" name="stock" id="stock" value="-" placeholder="Unit"   />
                                            <span aria-hidden="true"></span>
                                        </div>
                                        
                                    </div>   
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Descreption<span >*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" type="text" name="stock_description" id="stock_description" value="" />
                                            <span class="fa fa-info form-control-feedback right" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Supplier<span ></span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <select name="stock_supplier" id="stock_suppier" class="form-control">
                                                <option value="">-- Pilih --</option>
                                                    <?php 
                                                        foreach ($supplier as $key=> $data) {
                                                            echo'<option value="'.$data->id_supplier.'">'.$data->nama.'</option>';
                                                      } ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align">QTY<span >*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" type="number" name="stock_qty" id="stock_qty" value=""  />
                                            <span class="fa fa-info form-control-feedback right" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="ln_solid">
                                        <div class="form-group">
                                            <div class="col-md-6 offset-md-3 mt-3">
                                                <button type='submit' name="in_add" id="in_add" class="btn btn-app btn-md"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit</button>
                                                <button type='reset' class="btn btn-app btn-sm"><i class="fa fa-history" aria-hidden="true"></i> Reset</button>
                                            </div>
                                        </div>
                                    </div>  
                                                             
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- /page content -->                              

        </div>
    </div>
</div>
<!-- /page content -->

<!--title Modal-->
<div class="modal" tabindex="-1" role="dialog" id="modal-item">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
        </div>

        <!--modal body-->
        <div class="modal-body">
            <div class="x_content">
                <div class="row">
                    <!--col sm 12-->
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <p class="text-muted font-13 m-b-30">
                                DataTables category:
                            </p>
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                    <th>Barcode</th>
                                    <th>Nama</th>
                                    <th>Unit Name</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th class="text-center" widte="160px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach($item as $i=> $data) { ?>
                                            <tr>
                                                <td><?php echo $data->barcode?></td>
                                                <td><?php echo $data->name?></td>
                                                <td><?php echo $data->unit_name?></td><!--diambil dari tabel unit-->
                                                <td><?php echo format_number($data->price)?></td><!--format_number diambil dari helpers fungsi-->
                                                <td><?php echo $data->stock?></td>
                                                <td>
                                                    <button class ="btn btn-primary btn-sm mb-2" id="select"
                                                        data-id="<?php echo $data->id_item?>"
                                                        data-b="<?php echo $data->barcode?>"
                                                        data-n="<?php echo $data->name?>"
                                                        data-u="<?php echo $data->unit_name?>"
                                                        data-s="<?php echo $data->stock?>">
                                                        <i class="fa fa-check"></i> Select
                                                    </button>
                                                </td>
                                            </tr>                                       
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>                           
                    </div>
                </div>
            </div>           
        </div>
        <!--end modal body-->

             <!--button modal body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <!--end button modal body-->
    </div>
  </div>
</div>
<!--end title modal-->

<!--proses function select modal -->
<script>
    $(document).ready(function(){
        $(document).on('click', '#select', function(){
            var id_item = $(this).data('id');
            var barcode = $(this).data('b');
            var name = $(this).data('n');
            var unit_name = $(this).data('u');
            var stock = $(this).data('s');
            $('#id_item').val(id_item);
            $('#barcode').val(barcode);
            $('#name').val(name);
            $('#unit_name').val(unit_name);
            $('#stock').val(stock);
            $('#modal-item').modal('hide');
        })
    })
</script>
<!--End proses function select modal-->



