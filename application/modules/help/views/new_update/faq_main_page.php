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
</style>



    <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
        <div class="col-sm-12">
            <div class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
                <div class="containery" style="padding: 3%;">
                    <h2 class="mb-4">Frequently Ask <span>Question</span></h2>
                    

                            <?php

                                $this->load->model('mdl_help', '', TRUE);
                                foreach ($this->load->mdl_help->get_faq_main() as $value) {
                                    echo "<h3>".$value->title."</h3><br>".$value->description;
                                }

                            ?>

                    
                </div>
            </div>
        </div>
    </section>