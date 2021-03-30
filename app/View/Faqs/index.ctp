<div class="page">
<!-- frequently asked questions -->
    <section class="often"> 
            <div class="container">
                <h1>Часто Задаваемые вопросы</h1>
                <div class="often_wrapper">
                    <?php foreach ($faqs as $item): ?>
                        <div class="often_item">
                            <div class="often_head"><?=$item['Faq']['title']?></div>
                            <div class="often_body"><?=$item['Faq']['body']?> </div>
                        </div>
                    <?php endforeach ?>
                   
                    
                </div>
            </div>
    </section> 
</div>
<!-- request-->
    <section class="request">
        <div class="container">
            <h1>спросите что-то у нас</h1>
            <div class="request_wrapper">
                <div class="request_blog">
                    <input type="text"  name="" placeholder="Ваше имя" required="">
                    <input type="email" name="" placeholder="E-mail адрес" required="">
                </div>
                <textarea class="re_area" placeholder="Задайте ваш вопрос..." required=""></textarea>
                <button class="re_btn" type="submit">отправить</button>
            </div>
        </div>
    </section>
<!-- our partners -->
 <?=$this->element('partners') ?>