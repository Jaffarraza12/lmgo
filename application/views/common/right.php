<div class="panel">
    <div class="panel-heading">
        <h1>انضم إلى</h1>
    </div>
    <div class="panel-list">
        <iframe class="center-block" src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2Fmnzmt-alasrt-alrbyt%2F105271862861716&amp;layout=button_count&amp;show_faces=false&amp;width=120&amp;action=like&amp;font=verdana&amp;colorscheme=light&amp;height=31" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:80px; height:31px;" allowTransparency="true"></iframe>

    </div>
</div>

<div class="panel">
    <div class="panel-heading">
        <h1>جديد الموقع</h1>
    </div>
    <div class="panel-list ">
        <div class="panel-list-item"><a href="http://arabfamily.appertunity.net/get/139"><img src="<?php echo base_url() ?>/assets/img/wedi.jpg" </a></div>

    </div>
</div>
<div class="panel">
    <div class="panel-heading">
        <h1>أخبار المنظمة</h1>
    </div>
    <div class="panel-body news">
    <?php foreach ($recent_news as $content) { ?>
        <li><a href="<?php echo base_url()."get/".$content->cid ?>"><?php echo $content->title ?></a></li>
        <?php } ?>
    </div>
</div>
<?php if($articles) {  ?>
<div class="panel">
    <div class="panel-heading">
        <h1>معرض الصور و الفيديو</h1>


    </div>
    <div class="panel-body news">
        <?php foreach ($articles as $article) { ?>
            <li><a href="<?php echo base_url()."gallery/".$article->album_id ?>"><?php echo $article->name ?></a></li>
        <?php } ?>
    </div>
</div>
<?php } ?>
<div class="panel">
    <div class="panel-heading">
        <h1>قسم الاستشارات الأسرية</h1>
    </div>
    <div class="panel-body">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr ><td><a href="/2009-10-19-19-16-26" class="mainlevel" >تواصل معنا</a></td></tr>
            <tr ><td><a href="/2009-10-19-19-24-41" class="mainlevel" >نصائح أسرية</a></td></tr>
        </table>
    </div>
</div>
