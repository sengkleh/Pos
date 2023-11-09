<!-- page content -->
<div class="right_col" role="main">
    <div class="">

    <div class="page-title">
        <div class="title_left">
        <h3>Data categorys <small>Some</small></h3>
        <a href="<?php echo site_url('Ctr_category')?>" class ="btn btn-primary btn-sm mb-2 mt-6"><i class="fa fa-arrow-left" aria-hidden="true"></i></i> Back</a>
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
            <h2>Form <?php echo ucfirst ($page)?> Data categorys<small>!!</small></h2>
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
                        <form action="<?php echo site_url('Ctr_category/prosess/')?>" method="POST">
                        <div class="card-box table-responsive">
                        <input type="hidden" name="id_category" value="<?=$row->id_category ?>">
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Nama category<span >*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        
                                        <input class="form-control" name="category_name" value="<?php echo $row->name?>" required="required"/>
                                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
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

