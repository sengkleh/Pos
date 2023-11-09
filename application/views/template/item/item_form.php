<!-- page content -->
<div class="right_col" role="main">
    <div class="">

    <div class="page-title">
        <div class="title_left">
        <h3>Data items <small>Some</small></h3>
        <?php echo $this->session->flashdata('sukses');?>
        <a href="<?php echo site_url('Ctr_item')?>" class ="btn btn-primary btn-sm mb-2 mt-6"><i class="fa fa-arrow-left" aria-hidden="true"></i></i> Back</a>
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
            <h2>Form <?php echo ucfirst ($page)?> Data items<small>!!</small></h2>
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
                        
                        <?php echo form_open_multipart('Ctr_item/prosess/')?>

                        <div class="card-box table-responsive">
                            <input type="hidden" name="id_item" id="id_item" value="<?=$row->id_item ?>">
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Barcode<span >*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="item_barcode" value="<?php echo $row->barcode?>" required="required"/>
                                        <span class="fa fa-barcode form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Nama item<span >*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="item_name" value="<?php echo $row->name?>" required="required"/>
                                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <!--cara pertama menggunakan select-->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Category<span >*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="id_category" class="form-control">
                                            <option value="">- Pilih -</option>
                                                <?php foreach($category->result() as $key=> $data) { ?>
                                                        <option value="<?php echo $data->id_category ?>" <?php echo $data->id_category == $row->id_category ? "selected" : null ?>><?php echo $data->name ?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <!--end cara pertama menggunakan select-->

                                <!--cara kedua menggunakan select-->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Unit<span >*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <?php echo form_dropdown('unit', $unit, $selectedunit,
                                            ['class' => 'form-control','required' =>'required']) ?>
                                    </div>
                                </div>
                                <!--end cara kedua menggunakan select-->

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Price<span >*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" name="item_price" value="<?php echo $row->price?>" required="required"/>
                                        <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Foto Item<span >*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="file" name="item_foto"  />
                                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                        <div style="margin-top:20px">
                                            <?php if($page == 'Update') {
                                                if ($row->image != null) { ?>
                                                    <img src="<?php echo base_url('uploads/product/'.$row->image)?>" style="width:50px">
                                                <?php }
                                            } ?>
                                        </div>
                                        <small>(Biarkan kosong jika tidak ada) <?php echo $page == 'Update' ? 'Diganti' : 'Tambah' ?></small>
                                    </div>
                                </div>
                                
                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3 mt-3">
                                            <button type='submit' name="<?php echo $page ?>" class="btn btn-app btn-md"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit</button>
                                            <button type='reset' class="btn btn-app btn-sm"><i class="fa fa-history" aria-hidden="true"></i> Reset</button>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                        <?php echo form_close() ?>
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

