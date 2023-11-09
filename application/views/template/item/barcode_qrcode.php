
<!-- page content -->
<div class="right_col" role="main">
    <div class="">

    <!-- page title -->
    <div class="page-title">
        <div class="title_left">
        <h3>Data Barcode <small>Some</small></h3>
        <a href="<?php echo site_url('Ctr_item')?>" class ="btn btn-primary btn-sm mb-2 mt-6"><i class="fa fa-back" aria-hidden="true"></i> Back</a>
        </div>

        <!-- page title ringht -->
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
        <!-- end page title right-->
    </div>
    <!-- end page title -->

    <!-- clearfix -->
    <div class="clearfix">
        
    </div>
        <!-- row barcode-->
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Barcode<small>!!</small></h2><br><br><br>
                            <?php $this->view('template/messege') ?>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a href="<?php echo site_url()?>" class ="btn btn-app btn-sm mb-2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Print</a></a>
                                    </li>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>

                            <div class="clearfix">
                                <?php
                                    //ambil dari vendor/autoload dan setting di config composer
                                    require 'vendor/autoload.php';

                                    // This will output the barcode as HTML output to display in the browser
                                    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                    echo $generator->getBarcode('081231723897', $generator::TYPE_CODE_128);
                                    
                                ?>
                                
                                <!--ambil id barcode-->
                                <?php echo $row->barcode?>  
                                
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row barcode -->

        <!-- row qr-code -->        
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Barcode QR-Code<small>!!</small></h2><br><br><br>
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
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>

                            <div class="clearfix">
                                <?php
                                    
                                    //$qrCode = new Endroid\QrCode\QrCode('12345621743');
                                    //$qrCode->saveToFile('uploads/qrCode/item-'.$row->id_item.'.png');
                                    
                                ?>
                                <?php echo $row->barcode?>    
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row qr-code -->

    </div>
    <!-- end clearfix -->

</div>
<!-- /page content -->

