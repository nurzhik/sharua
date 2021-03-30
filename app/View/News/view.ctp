<div class="container page">
    <ul class="breadcrumbs">
        <li class="bread_bg">
            <a href="/<?=$lang?>">Главная</a>
        </li>
        <li class="bread_bg">
            <a href="/<?=$lang?>news">Новости</a>
        </li>
        <li class="bg_bread">
            <span><?=$data['News']['title']?></span>
        </li>
    </ul>
</div>
<!-- news inner -->
<section class="news_inner">
    <div class="container">
        <div class="news_inner_wrapper">
            <div class="news_inner_blog">
                <div class="news_inner_img"><img src="/img/news/<?=$data['News']['img']?>" alt=""></div>
                <div class="news_inner_item">
                    <h1><?=$data['News']['title']?></h1>
                    <div class="news_inner_point">
                        <div class="news_data"><?php echo $this->Time->format($data['News']['date'], '%d.%m.%Y', 'invalid'); ?></div>
                        <div class="news_data num"><?=$data['News']['view']?></div>
                    </div>
                </div>
                <div class="news_inner_subtitle"><?=$data['News']['body']?></div>
            </div>
            <div class="news_inner_unit">
                <div class="news_inner_share">
                <div class="news_inner_shrink">
                    <a href="javascript:;" class="news_inner_shrink_img"><img src="img/shrink1.svg" alt=""></a>
                    <div class="news_inner_shrink_item">
                        <a href="javascript:;" class="news_title">101-ая обладательница нового автомобиля</a>
                        <div class="news_subtitle">Не следует, однако забывать, что новая модель организационной деятельности играет важную роль в формировании...</div>
                        <div class="news_data">16.08.2020</div>
                    </div>
                </div>
                <div class="news_inner_shrink">
                    <a href="javascript:;" class="news_inner_shrink_img"><img src="img/shrink2.svg" alt=""></a>
                    <div class="news_inner_shrink_item">
                        <a href="javascript:;" class="news_title">101-ая обладательница нового автомобиля</a>
                        <div class="news_subtitle">Не следует, однако забывать, что новая модель организационной деятельности играет важную роль в формировании...</div>
                        <div class="news_data">16.08.2020</div>
                    </div>
                </div>
                <div class="news_inner_shrink">
                    <a href="javascript:;" class="news_inner_shrink_img"><img src="img/shrink3.svg" alt=""></a>
                    <div class="news_inner_shrink_item">
                        <a href="javascript:;" class="news_title">101-ая обладательница нового автомобиля</a>
                        <div class="news_subtitle">Не следует, однако забывать, что новая модель организационной деятельности играет важную роль в формировании...</div>
                        <div class="news_data">16.08.2020</div>
                    </div>
                </div>
            </div>
            <div class="news_inner_share">
                <div class="news_inner_bottom">
                    <a href="javascript:;" class="news_inner_bottom_img"><img src="img/news4.png" alt=""></a>
                    <div class="news_data">16.08.2020</div>
                    <a href="javascript:;" class="news_title">101-ая обладательница нового автомобиля</a>
                </div>
                <div class="news_inner_bottom">
                    <a href="javascript:;" class="news_inner_bottom_img"><img src="img/news3.png" alt=""></a>
                    <div class="news_data">16.08.2020</div>
                    <a href="javascript:;" class="news_title">101-ая обладательница нового автомобиля</a>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
<!-- footer -->