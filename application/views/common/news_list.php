<section id="blog-section" class="blog-section wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s"
         style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">
    <div class="container">
        <header class="section-header">
            <section class="widget widget_text">
                <h2 class="widget-title">News</h2>
                <div class="textwidget"><p>What's happening at EFQM? Find out here!</p>
                </div>
            </section>
        </header>

        <div class="grid">
            <?php foreach ($recent_news as $news) { ?>
            <article class="blog-post" itemscope="" itemtype="http://schema.org/Blog">
                <a href="<?php echo base_url().'get/'.$news->content_id ?>"    class="post-thumbnail">
                    <img width="370" height="240"
                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                         class="attachment-rara-business-blog size-rara-business-blog wp-post-image" alt=""
                         itemprop="image"
                         srcset="<?php echo base_url().'uploads/img/'.$news->image ?>"
                         sizes="(max-width: 370px) 100vw, 370px"> </a>
                <h3 class="entry-title" ><a
                            href="<?php echo base_url().'get/'.$news->content_id ?>">EFQM
                    <?php echo $news->title ?></a></h3>

            </article>
            <?php } ?>

        </div>
    </div>
</section>
