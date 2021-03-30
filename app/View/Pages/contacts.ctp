<div class="page">
<section class="contacts">
    <div class="container">
        <div class="contacts_wrap">
            <h1>Контакты</h1>
            <div class="pers_wrap">
            <a href="javascript:;" class="personal_payment_btn">Выберите ваш город из списка</a>
            <div class="personal_under" style="display: none;">
                <a href="javascript:;" class="personal_city">Астана</a>
                <a href="javascript:;" class="personal_city">Астана</a>
                <a href="javascript:;" class="personal_city">Астана</a>
            </div>
            </div>
        </div>
        <div class="contacts_wrapper">
        	<?php foreach ($branches as $item): ?>
        		<div class="contacts_copy">
	                <div class="contacts_list">
	                    <div class="contacts_slick">г. <?=$item['City']['title_ru']?></div>
	                </div>
	                <div class="contacts_blog">
	                    <div class="info_though">
	                        <div class="info_subtitle">адрес офиса</div>
	                        <div class="info_undertitle"><?=$item['Branche']['address_'.$l]?></div>
	                    </div>
	                    <div class="info_though">
	                        <div class="info_subtitle">представители</div>
	                        <?php foreach ($item['Branche']['managers'] as $manager): ?>
	                        	<div class="contacts_item">
		                            <div class="info_undertitle"><?=$manager['name']?></div>
		                            <a href="tel:<?=$manager['phone']?>" class="contacts_tel"><?=$manager['phone']?></a>
		                            <a href="mailto:<?=$manager['email']?>" class="contacts_tel mail"><?=$manager['email']?></a>
		                        </div>
	                        <?php endforeach ?>
	                    </div>
	                    <div class="info_though">
	                        <div class="info_subtitle">мы на карте</div>
	                        <a data-src="#popup-map" data-fancybox  href="javascript:;" class="con_btn" data-map="<?=$item['Branche']['map_code']?>">Открыть адрес на карте</a>
	                    </div>
	                </div>
	            </div>
        	<?php endforeach ?>
            
            
        </div>
        <a href="javascript:;" class="main_btn">показать весь список</a>
    </div>
</section>
 <?=$this->element('partners') ?>
</div>
<div class="popup-spisok">
    <div id="popup-map" style="display:none">
        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Aefa06dd0b8806bb7473da6141bf6c5a9be82d54666e191431c7ad56d5116f6e2&amp;source=constructor" width="791" height="556" frameborder="0"></iframe>
    </div>
</div>