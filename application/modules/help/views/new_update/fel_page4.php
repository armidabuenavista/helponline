<style>
    .cen {
        text-align: center;
    }
    .rotate_sub {
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg); 
    }
</style>
    

    <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
        <div class="col-sm-12">
            <div class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
                <div class="containery" style="padding: 3%;">
                    <h2 class="mb-4">Food <span>Exchange </span>List (FEL) <span> Visual Guide</span>&nbsp;<a type="button" class="btn btn-success btn-md" href="<?=base_url();?>help/print_fel_book_all"> Overall Print </a></h2>
                    
<style>
    p, li, lu{
        color: black;
    }
.book_img {
  float: left;
    border: solid black 1px;
    margin-right: 3%;
    margin-bottom: 3%;
}
    
    
.storage_new {
  position: relative;
  margin-top: 50px;
  width: 100%;
  height: 360px;
}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0);
  transition: background 0.5s ease;
}

.storage_new:hover .overlay {
  display: block;
  background: rgba(0, 0, 0, .3);
}

img {
  position: absolute;
  width: 100%;
  height: auto;
  left: 0;
}

.title {
  position: absolute;
  width: 100%;
  left: 0;
  top: 20%;
  font-weight: 700;
  font-size: 35px;
  text-align: center;
  text-transform: uppercase;
  color: white;
  
  z-index: 1;
  transition: top .5s ease;
}
.storage_new:hover .title {
  top: 10%;
}
.button {
  position: absolute;
  width: 100%;
  left:0;
  top: 180px;
  text-align: center;
  opacity: 0;
  transition: opacity .35s ease;
}
.button a {
  width: 100%;
  padding: 2% 5%;
  text-align: center;
  color: white;
  border: solid 2px white;
  z-index: 1;
}
.storage_new:hover .button {
  opacity: 1;
}  
.data_design {
    -webkit-text-stroke: 2px black; /* width and color */
    color: white;
}
</style>                  
    <center>
        <div class="row">
              <?php foreach ($fel as $foodgrp){?>
                <div class="col-sm-3" style="padding: 2%;">
                    <div class="storage_new">
                      <img class="" src="<?php echo base_url('assets/images/fel_icons/'.$foodgrp->upload); ?>" alt="FEL Icon" width="90%" height="auto">
                      <p class="title data_design"><?php echo $foodgrp->foodgroup_th?></p>
                      <div class="overlay"></div>
                      <div class="button">
                            <a href="<?php  echo base_url("help/fel_booklet/" . $foodgrp->id); ?>"> View </a>&nbsp;
                            <a href="<?php echo base_url("help/print_fel_book/" . $foodgrp->id); ?>"> Print </a>
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
