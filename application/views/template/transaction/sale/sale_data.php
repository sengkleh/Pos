
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
    <div class="page-title">
        <div class="title_left">
        <h3>Sales <small>/ Penjualan</small></h3>
        </div>

    <div class="page-title">
        <div class="title_left">
        </div>

        <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            
        </div>
        </div>
    </div>
</div>

    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <?php $this->view('template/messege') ?>
                    <div class="clearfix"></div>
                    </div>

                    <!--x content-->
                    <div class="x_content">
                        <div class="col-md-4 col-sm-4  ">
                            <div class="x_panel">
                                <div class="x_title">
                                <!--<h2>Pie Graph</h2>-->
                                    
                    <div class="clearfix"></div>
                    </div>
                    
                        <div class="x_content">
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span >*</span></label>
                                <div class="col-md-9 col-sm-9">                
                                    <input class="form-control" type="date" name="date" id="date" value="<?php echo date('Y-m-d') ?>" required="required" readonly/>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Kasir<span >*</span></label>
                                <div class="col-md-9 col-sm-9">                                   
                                    <input class="form-control" name="kasir" id="kasir" value="<?php echo $this->fungsi->user_login()->name ?>" required="required" readonly />
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Costumer<span >*</span></label>
                                <div class="col-md-9 col-sm-9">   
                                    <select class="form-control" name="costumer" id="costumer">umum
                                        <?php foreach ($costumer as $cust =>$value){
                                            echo '<option value ="'.$value->id_costumer.'">'.$value->name.'</option>';
                                        } ?>
                                    </select> 
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                
                    <div class="col-md-4 col-sm-4 ">
                        <div class="x_panel">
                            <div class="x_title">
                               <!--<h2>Pie Graph</h2>-->
                            <div class="clearfix"></div>
                        </div>

                    <div class="x_content">
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Barcode<span >*</span></label>
                                <div class="col-md-9 col-sm-9">                                    
                                    <input class="form-control" name="barcode" id="barcode" value="" required="required"/>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Qty<span >*</span></label>
                                <div class="col-md-9 col-sm-9">                                    
                                    <input class="form-control" name="qty" id="qty" value="" required="required"/><br>
                                    <button class="btn btn-app" ><i class="fa fa-trash"></i>Add</button> 
                                </div>
                                
                            </div> 
                                
                        </div>
                    </div>
                </div>

                    <div class="col-md-4 col-sm-4 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <!--<h2>Pie Graph</h2>-->
                        <div class="clearfix"></div>
                        </div>
                    
                        <div class="x_content">
                            <div class="field item form-group">
                                <label class="col-form-label  label-align"><span >*</span></label>
                                <div class="col-md-12 col-sm-12">
                                    
                                    <input class="form-control" name="supplier_name" value="" required="required"/>
                                </div>
                            </div>
                            
                        </div>
                </div>
            </div>
        </div>
    </div>




    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <?php $this->view('template/messege') ?>
                    <div class="clearfix"></div>
                    <!--table-->
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Nama Supplier</th>
                                            <th>Phone</th>
                                            <th>Description</th>
                                            <th>Create</th>
                                            <th class="text-center" widte="160px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        

                                    </tbody>
                                </table>
                                <!--end table-->
                </div>
            </div>
        </div>
    </div>





    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <?php $this->view('template/messege') ?>
                           
                    <div class="clearfix"></div>
                    </div>

                    <!--x content-->
                    <div class="x_content">
                        <div class="col-md-4 col-sm-4  ">
                            <div class="x_panel">
                                <div class="x_title">
                                    
                    <div class="clearfix"></div>
                    </div>
                    
                        <div class="x_content">
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Sub Total<span >*</span></label>
                                <div class="col-md-9 col-sm-9">
                                    
                                    <input class="form-control" name="subtotal" id="subtotal" value="" required="required"/>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Discont<span >*</span></label>
                                <div class="col-md-9 col-sm-9">
                                    
                                    <input class="form-control" name="discont" id="discont" value="" required="required"/>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Grand Total<span >*</span></label>
                                <div class="col-md-9 col-sm-9">
                                    
                                    <input class="form-control" name="grand_total" id="grand_total" value="" required="required"/>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                
                    <div class="col-md-4 col-sm-4 ">
                        <div class="x_panel">
                            <div class="x_title">
                                
                            <div class="clearfix"></div>
                        </div>

                    <div class="x_content">
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Cash<span >*</span></label>
                                <div class="col-md-9 col-sm-9">
                                    
                                    <input class="form-control" name="cash" id="cash" value="" required="required"/>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Change<span >*</span></label>
                                <div class="col-md-9 col-sm-9">                    
                                    <input class="form-control" name="change" id="change" value="" required="required"/>
                                </div>
                            </div>      
                        </div>
                    </div>
                </div>

                    <div class="col-md-4 col-sm-4 ">
                        <div class="x_panel">
                            <div class="x_title">
                               
                        <div class="clearfix"></div>
                        </div>
                    
                        <div class="x_content">
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Note<span >*</span></label>
                                <div class="col-md-9 col-sm-9">
                                    
                                    <input class="form-control" name="note" id="note" type="textarea" value="" required="required"/><br>
                                    <button class="btn btn-primary btn-sm" >Buton</button> 
                                    <button class="btn btn-primary btn-sm" >Buton</button> 
                                </div>
                                
                            </div>
                            
                        </div>
                </div>
            </div>
        </div>
    </div>



                
                </div>
            <!--end x content-->
            </div>
        </div>
    </div>
</div>
<!-- /page content -->