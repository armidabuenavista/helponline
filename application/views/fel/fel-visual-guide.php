
<link rel="stylesheet" href="<?php echo base_url('assets/styles/visualguide.css')?>"></link>

<section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
    <div class="col-sm-12">
        <div class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
            <div class="containery" style="padding: 3%;">
                <h2 class="mb-4">Food <span>Exchange </span>List (FEL) <span> Visual Guide</span>&nbsp;<a type="button" class="btn btn-success btn-md" href="<?= base_url(); ?>help/print_fel_book_all"> Overall Print </a>
                <center>   
                <div class="row">
                    <?php foreach ($felcategory as $cat){?>
                        <div class="col-sm-3" style="padding: 2%;">
                            <div class="storage_new">
                                  <img class="" src="<?php echo base_url('assets/images/fel_icons/'.$cat['upload']); ?>" alt="FEL Icon" width="90%" height="auto">
                                  <p class="title data_design"><?php echo $cat['foodgroup_th']?></p>
                                  <div class="overlay"></div>
                                  <div class="button">
                                        <a href="<?php  echo base_url("fel-booklet/" . $cat['id']); ?>"> View </a>&nbsp;
                                        <a href="<?php echo base_url("help/print_fel_book/" . $cat['id']); ?>"> Print </a>
                                  </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>   
                </center> 
            </div>
        </div>
    </div>
</section>
