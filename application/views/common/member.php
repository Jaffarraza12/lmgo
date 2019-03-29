
<style>
    .form-control-borderless {
        border: none;
    }

    .form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
        border: none;
        outline: none;
        box-shadow: none;
    }
</style>
<section id="skill-section" class="our-skills wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s"
         style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">
    <div class="container" >
        <section id="sow-button-5" class="widget widget_sow-button">
            <div class="so-widget-sow-button so-widget-sow-button-flat-95502f6e4388">
                <div class="container">
                    <br/>
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form action="member" method="post" class="card card-sm">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input name="number"  value="<?php echo $number ?>" class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search with Card Number ">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" type="submit">Search</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                            <?php if($member) { ?>
                                <div class="alert alert-success"><i class="fa fa-check"></i> <strong><?php echo $number ?></strong> Records found.</div>
                            <div class="membership">
                                <div class="membership-header"></div>
                                <div class="detail"><a >Name :<?php echo $member->name ?></a><br/><a >Program :<?php echo $member->program ?></a></div>
                                <div class="detail">  <img src="<?php echo base_url().'uploads/certificate/'.$member->image ?>" /></div>
                                <div class="clearfix"></div>
                                <div class="membership-footer">
                                    <div class="copyright">
                                        <a>Member No : <?php echo $member->card_number ?> </a><br/>
                                        <a>Validity Date :<?php echo $member->month .' '.$member->year ?></a>
                                    </div>
                                </div>
                            </div>


                            <div class="card-body row no-gutters align-items-center hidden">
                                <div class="col" style="padding: 10px;">
                                    <ul class="list-group">
                                        <li class="list-group-item"><?php echo $member->name ?></li>
                                        <li class="list-group-item"><?php echo $member->program ?></li>
                                        <li class="list-group-item"><?php echo $member->card_number ?></li>
                                        <li class="list-group-item"><?php echo $member->month .' '.$member->year ?></li>
                                    </ul>
                                </div>
                                <?php if($member->image) { ?>
                                <div class="col">
                                        <img src="<?php echo base_url().'uploads/certificate/'.$member->image ?>" />
                                </div>
                                <?php } ?>
                            </div>
                           <?php } else if($number) {?>
                                <div class="alert alert-danger"><i class="fa fa-check"></i> <strong><?php echo $number ?></strong> No Records found.</div>

                            <?php } ?>
                        </div>
                        <!--end of col-->
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
