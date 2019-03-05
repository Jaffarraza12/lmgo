<div class="panel">
    <div class="panel-heading">
        <h1>انضم إلى</h1>
    </div>
    <div class="panel-list">
        <div class="panel-list-item"><a href="/al-musbaka-sabika">المسابقة الخامسة والثلاثون</a></div>
        <div class="panel-list-item"><a href="/nataij-al-musabika">نتائج المسابقة الرابعة والثلاثين</a></div>

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
        <h1>معرض الصور و الفيديوة</h1>


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
    </div>
</div>