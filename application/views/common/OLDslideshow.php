<div class="module module--horizontal">
  <div id="Carousel" class="glide">

    <div class="glide__arrows hidden">
      <button class="glide__arrow prev" data-glide-dir="<">prev</button>
      <button class="glide__arrow next" data-glide-dir=">">next</button>
    </div>

    <div class="glide__wrapper">
      <ul class="glide__track">

        <?php foreach ($slideshow as $slide) { ?>
          <li class="glide__slide" data-glide-autoplay="5000">
            <img class="lazy" src="<?php echo base_url(); ?>/uploads/slideshow/<?php echo $slide->image ?>">
          </li>
        <?php } ?>

      </ul>
    </div>

    <div class="glide__bullets"></div>

  </div>
</div>


<!--Rev Slider Wrapper Column-->
<div class="rev_slider_wrapper bannercontainer">
    <div id="slider1" class="rev_slider"  data-version="5.0">
        <ul>

            <!-- SLIDE 1 -->
            <li data-index="rs-1" data-transition="random" data-slotamount="7"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-thumb="images/bg/2.jpg"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-description="">
                <!-- MAIN IMAGE -->
                <img src="images/bg/2.jpg"  alt=""  data-bgposition="50% 90%" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                <!-- LAYERS -->

                <!-- LAYER NR. 1 -->
                <div class="hidden-xs  tp-caption tp-resizeme rs-parallaxlevel-0 text-uppercase"
                     id="rs-1-layer-1"

                     data-x="['right','right','right','right']"
                     data-hoffset="['370','50','30','17']"
                     data-y="['center','center','center','center']"
                     data-voffset="['10','110','180','160']"
                     data-fontsize="['105','100','70','60']"
                     data-lineheight="['100','90','60','60']"
                     data-width="['none','none','none','400']"
                     data-height="none"
                     data-whitespace="['nowrap','nowrap','nowrap','normal']"
                     data-transform_idle="o:1;"
                     data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                     data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                     data-mask_in="x:0px;y:[100%];"
                     data-mask_out="x:inherit;y:inherit;"
                     data-start="500"
                     data-splitin="none"
                     data-splitout="none"
                     data-basealign="slide"
                     data-responsive_offset="on"
                     style="z-index: 6; letter-spacing:-3px; white-space: nowrap;"><span class="text-thm">Lorem  </span><span class="text-white">Ipsum  </span>
                </div>

                <!-- LAYER NR. 2 -->
                <div class="hidden-xs tp-caption BigBold-SubTitle tp-resizeme rs-parallaxlevel-0"
                     id="rs-1-layer-2"

                     data-x="['right','right','right','right']"
                     data-hoffset="['370','55','33','20']"
                     data-y="['bottom','bottom','bottom','bottom']"
                     data-voffset="['260','1','74','58']"
                     data-fontsize="['15','15','15','13']"
                     data-lineheight="['24','24','24','20']"
                     data-width="['570','570','410','280']"
                     data-height="['60','100','100','100']"
                     data-whitespace="normal"
                     data-transform_idle="o:1;"
                     data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                     data-transform_out="y:50px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                     data-start="650"
                     data-splitin="none"
                     data-splitout="none"
                     data-basealign="slide"
                     data-responsive_offset="on"
                     style="z-index: 7;"><span class="text-white text-white-cap">أبجد هوز dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                </div>

                <!-- LAYER NR. 3 -->
                <div class="hidden-xs  tp-caption btn btn-default btn-lg thm-btn pl-40 pr-40 rs-parallaxlevel-0"

                     id="rs-1-layer-3"
                     data-x="['right','right','right','right']"
                     data-hoffset="['370','480','30','20']"
                     data-y="['bottom','bottom','bottom','bottom']"
                     data-voffset="['212','0','30','20']"
                     data-width="none"
                     data-height="none"
                     data-whitespace="nowrap"
                     data-transform_idle="o:1;"
                     data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                     data-transform_out="y:50px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                     data-start="650"
                     data-splitin="none"
                     data-splitout="none"
                     data-actions='[{"event":"click","action":"scrollbelow","offset":"px"}]'
                     data-basealign="slide"
                     data-responsive_offset="on"
                     style="z-index: 8; white-space: nowrap;;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;">تبرع الآن
                </div>

                <!-- LAYER NR. 4 -->
                <div class="hidden-xs tp-caption btn btn-default btn-lg thm-btn inverse pl-40 pr-40 rs-parallaxlevel-0"

                     id="rs-1-layer-4"
                     data-x="['right','right','right','right']"
                     data-hoffset="['590','480','30','20']"
                     data-y="['bottom','bottom','bottom','bottom']"
                     data-voffset="['212','0','30','20']"
                     data-width="none"
                     data-height="none"
                     data-whitespace="nowrap"
                     data-transform_idle="o:1;"
                     data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                     data-transform_out="y:50px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                     data-start="650"
                     data-splitin="none"
                     data-splitout="none"
                     data-actions='[{"event":"click","action":"scrollbelow","offset":"px"}]'
                     data-basealign="slide"
                     data-responsive_offset="on"
                     style="z-index: 8; white-space: nowrap;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;">READ MORE
                </div>

            </li>

            <!-- SLIDE 2 -->
            <li data-index="rs-2" data-transition="random" data-slotamount="7"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-thumb="images/bg/3.jpg"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-description="">
                <!-- MAIN IMAGE -->
                <img src="images/bg/3.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                <!-- LAYERS -->

                <!-- LAYER NR. 1 -->
                <div class="hidden-xs tp-caption tp-resizeme rs-parallaxlevel-0 text-uppercase"
                     id="rs-2-layer-1"

                     data-x="['right','right','right','right']"
                     data-hoffset="['370','200','30','17']"
                     data-y="['center','center','center','center']"
                     data-voffset="['10','110','180','160']"
                     data-fontsize="['78']"
                     data-lineheight="['60']"
                     data-width="['none','none','none','400']"
                     data-height="none"
                     data-whitespace="['nowrap','nowrap','nowrap','normal']"
                     data-transform_idle="o:1;"
                     data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                     data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                     data-mask_in="x:0px;y:[100%];"
                     data-mask_out="x:inherit;y:inherit;"
                     data-start="500"
                     data-splitin="none"
                     data-splitout="none"
                     data-basealign="slide"
                     data-responsive_offset="on"
                     style="z-index: 6; white-space: nowrap;"><span class="text-thm">Lorem</span> <span class="text-white">ipsum dolor</span>
                </div>

                <!-- LAYER NR. 2 -->
                <div class="hidden-xs tp-caption BigBold-SubTitle tp-resizeme text-white rs-parallaxlevel-0"
                     id="rs-2-layer-2"

                     data-x="['right','right','right','right']"
                     data-hoffset="['370','55','33','20']"
                     data-y="['bottom','bottom','bottom','bottom']"
                     data-voffset="['260','1','74','58']"
                     data-fontsize="['15','15','15','13']"
                     data-lineheight="['24','24','24','20']"
                     data-width="['570','570','410','280']"
                     data-height="['60','100','100','100']"
                     data-whitespace="normal"
                     data-transform_idle="o:1;"
                     data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                     data-transform_out="y:50px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                     data-start="650"
                     data-splitin="none"
                     data-splitout="none"
                     data-basealign="slide"
                     data-responsive_offset="on"
                     style="z-index: 7; min-width: 570px; max-width: 570px; max-width: 60px; max-width: 60px; white-space: normal;">أبجد هوز dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>

                <!-- LAYER NR. 3 -->
                <div class="hidden-xs tp-caption btn btn-default btn-lg thm-btn pl-40 pr-40 rs-parallaxlevel-0"

                     id="rs-2-layer-3"
                     data-x="['right','right','right','right']"
                     data-hoffset="['370','480','30','20']"
                     data-y="['bottom','bottom','bottom','bottom']"
                     data-voffset="['212','0','30','20']"
                     data-width="none"
                     data-height="none"
                     data-whitespace="nowrap"
                     data-transform_idle="o:1;"
                     data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                     data-transform_out="y:50px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                     data-start="650"
                     data-splitin="none"
                     data-splitout="none"
                     data-actions='[{"event":"click","action":"scrollbelow","offset":"px"}]'
                     data-basealign="slide"
                     data-responsive_offset="on"
                     style="z-index: 8; white-space: nowrap;;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;">تبرع الآن
                </div>

                <!-- LAYER NR. 4 -->
                <div class="hidden-xs tp-caption btn btn-default btn-lg thm-btn inverse pl-40 pr-40 rs-parallaxlevel-0"

                     id="rs-2-layer-4"
                     data-x="['right','right','right','right']"
                     data-hoffset="['590','480','30','20']"
                     data-y="['bottom','bottom','bottom','bottom']"
                     data-voffset="['212','0','30','20']"
                     data-width="none"
                     data-height="none"
                     data-whitespace="nowrap"
                     data-transform_idle="o:1;"
                     data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                     data-transform_out="y:50px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                     data-start="650"
                     data-splitin="none"
                     data-splitout="none"
                     data-actions='[{"event":"click","action":"scrollbelow","offset":"px"}]'
                     data-basealign="slide"
                     data-responsive_offset="on"
                     style="z-index: 8; white-space: nowrap;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;">READ MORE
                </div>

            </li>

            <!-- SLIDE 3 -->
            <li data-index="rs-3" data-transition="random" data-slotamount="7"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-thumb="images/bg/4.jpg"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-description="">
                <!-- MAIN IMAGE -->
                <img src="images/bg/4.jpg"  alt=""  data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                <!-- LAYERS -->

                <!-- LAYER NR. 1 -->
                <div class="hidden-xs tp-caption tp-resizeme text-white rs-parallaxlevel-0"
                     id="rs-3-layer-1"

                     data-x="['right','right','right','right']"
                     data-hoffset="['370','50','30','17']"
                     data-y="['center','center','center','center']"
                     data-voffset="['10','110','180','160']"
                     data-fontsize="['110','100','70','60']"
                     data-lineheight="['100','90','60','60']"
                     data-width="['none','none','none','400']"
                     data-height="none"
                     data-whitespace="['nowrap','nowrap','nowrap','normal']"
                     data-transform_idle="o:1;"
                     data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                     data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                     data-mask_in="x:0px;y:[100%];"
                     data-mask_out="x:inherit;y:inherit;"
                     data-start="500"
                     data-splitin="none"
                     data-splitout="none"
                     data-basealign="slide"
                     data-responsive_offset="on"
                     style="z-index: 6; white-space: nowrap;"><span class="text-thm">Lorem</span> ipsum
                </div>

                <!-- LAYER NR. 2 -->
                <div class="hidden-xs tp-caption BigBold-SubTitle tp-resizeme text-white rs-parallaxlevel-0"
                     id="rs-3-layer-2"

                     data-x="['right','right','right','right']"
                     data-hoffset="['370','55','33','20']"
                     data-y="['bottom','bottom','bottom','bottom']"
                     data-voffset="['260','1','74','58']"
                     data-fontsize="['15','15','15','13']"
                     data-lineheight="['24','24','24','20']"
                     data-width="['570','570','410','280']"
                     data-height="['60','100','100','100']"
                     data-whitespace="normal"
                     data-transform_idle="o:1;"
                     data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                     data-transform_out="y:50px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                     data-start="650"
                     data-splitin="none"
                     data-splitout="none"
                     data-basealign="slide"
                     data-responsive_offset="on"
                     style="z-index: 7; min-width: 570px; max-width: 570px; max-width: 60px; max-width: 60px; white-space: normal;">أبجد هوز dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>

                <!-- LAYER NR. 3 -->
                <div class="hidden-xs tp-caption btn btn-default btn-lg thm-btn pl-40 pr-40 rs-parallaxlevel-0"

                     id="rs-3-layer-3"
                     data-x="['right','right','right','right']"
                     data-hoffset="['370','480','30','20']"
                     data-y="['bottom','bottom','bottom','bottom']"
                     data-voffset="['212','0','30','20']"
                     data-width="none"
                     data-height="none"
                     data-whitespace="nowrap"
                     data-transform_idle="o:1;"
                     data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                     data-transform_out="y:50px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                     data-start="650"
                     data-splitin="none"
                     data-splitout="none"
                     data-actions='[{"event":"click","action":"scrollbelow","offset":"px"}]'
                     data-basealign="slide"
                     data-responsive_offset="on"
                     style="z-index: 8; white-space: nowrap;;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;">تبرع الآن
                </div>

                <!-- LAYER NR. 4 -->
                <div class="hidden-xs tp-caption btn btn-default btn-lg thm-btn inverse pl-40 pr-40 rs-parallaxlevel-0"

                     id="rs-3-layer-4"
                     data-x="['right','right','right','right']"
                     data-hoffset="['590','480','30','20']"
                     data-y="['bottom','bottom','bottom','bottom']"
                     data-voffset="['212','0','30','20']"
                     data-width="none"
                     data-height="none"
                     data-whitespace="nowrap"
                     data-transform_idle="o:1;"
                     data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                     data-transform_out="y:50px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                     data-start="650"
                     data-splitin="none"
                     data-splitout="none"
                     data-actions='[{"event":"click","action":"scrollbelow","offset":"px"}]'
                     data-basealign="slide"
                     data-responsive_offset="on"
                     style="z-index: 8; white-space: nowrap;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;">READ MORE
                </div>

            </li>
        </ul>
    </div>
</div>