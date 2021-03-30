<section class="main">
    <div class="main_blog">
        <div class="container">
            <div class="main_unit">
                <div class="main_unit__center">
                    <div class="main_title"><?=$page['Setting']['main_title']?></div>
                    <div class="main_subtitle"><?=$page['Setting']['main_desc']?></div>
                    <a data-src="#zayavka" data-fancybox  href="javascript:;" class="main_btn">Подать заявку</a>
                </div>    
            </div>
            <div class="main_pos way">
              <div class="main_pos__center">
                <div class="main_pos_img apartment"><img src="/img/house-min.png" alt=""></div>
                  <div class="main_pos_img percent"><img src="/img/percent-min.png" alt=""></div>
                  <div class="main_pos_img drive"><img src="/img/car_white-min.png" alt=""></div>
              </div>
            </div>
        </div>
    </div>      
</section>
<section class="set">
    <div class="container">
        <h1>Наши преимущества</h1>
        <div class="set_blog">
            <?php foreach ($advantages as $item): ?>
                <div class="set_wrap way">
                    <div class="set_wrap_img"><img src="/img/advantages/<?=$item['Advantage']['img']?>" alt=""></div>
                    <div class="set_title"><?=$item['Advantage']['title']?></div>
                    <div class="set_subtitle"><?=$item['Advantage']['body']?></div>
                </div>
            <?php endforeach ?>
           
           
        </div>
    </div>
</section>    
<section class="info">
    <div class="container">
        <h1>Условия приобретения</h1>
        <div class="info_wrapper">
            <div class="info_blog">
                <div class="info_car"><img src="/img/car1.png" alt=""></div>
            <div class="info_think">
                <div class="info_item">
                    <div class="info_title">Условия автомобильной программы</div>                       
               </div>
               <div class="info_wrap">
                    <div class="info_thought mt">
                        <div class="info_subtitle">ТИП АВТОМОБИЛЯ</div>
                        <ul class="auto-ul">
                            <li>
                                <a href="#new" class="calc_choice active">Новая</a>
                            </li>
                            <li>    
                                <a href="#by" class="calc_choice">Б/У</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-auto">
                        <div id="new" class="tab-auto__item active">
                            <div class="info_thought">
                                <div class="info_subtitle">Вступительный взнос</div>
                                <div class="info_undertitle"><?=$page['Setting']['new_car_entrance']?></div>
                            </div>
                            <div class="info_thought">
                                <div class="info_subtitle">первоначальный взнос</div>
                                <?=$page['Setting']['new_car_initial']?>
                            </div>
                            <div class="info_thought">
                                <div class="info_subtitle info_mt">срок рассрочки</div>
                                <div class="info_undertitle info_mb"><?=$page['Setting']['new_car_time']?></div>
                            </div>
                            <div class="info_thought">
                                <div class="info_subtitle info_mt">ежемесячный членский взнос</div>
                                <div class="info_undertitle info_mb_none"><?=$page['Setting']['new_car_membership']?></div>
                            </div>
                        </div>
                        <div id="by" class="tab-auto__item">
                            <div class="info_thought"> 
                                <div class="info_subtitle">Вступительный взнос</div>
                                <div class="info_undertitle"><?=$page['Setting']['old_car_entrance']?></div>
                            </div>
                            <div class="info_thought">
                                <div class="info_subtitle">первоначальный взнос</div>
                                <?=$page['Setting']['old_car_initial']?>
                            </div>
                            <div class="info_thought">
                                <div class="info_subtitle info_mt">срок рассрочки</div>
                                <div class="info_undertitle info_mb"> <?=$page['Setting']['old_car_time']?></div>
                            </div>
                            <div class="info_thought">
                                <div class="info_subtitle info_mt">ежемесячный членский взнос</div>
                                <div class="info_undertitle info_mb_none"><?=$page['Setting']['old_car_membership']?></div>
                            </div>
                        </div>
                    </div>         
                </div>
            </div>
            </div>
            <div class="info_blog">
                <div class="info_car"><img src="img/house.png" alt=""></div>
                <div class="info_think">
                    <div class="info_item">
                        <div class="info_title">Условия жилищной программы</div>                            
                   </div>
                <div class="info_wrap">
                <div class="info_thought">
                    <div class="info_subtitle">Вступительный взнос</div>
                    <div class="info_undertitle"><?=$page['Setting']['home_entrance']?></div>
                </div>
                <div class="info_thought">
                    <div class="info_subtitle">первоначальный взнос</div>
                    <?=$page['Setting']['home_initial']?>
                </div>
                <div class="info_thought">
                    <div class="info_subtitle">срок рассрочки</div>
                    <div class="info_undertitle"> <?=$page['Setting']['home_time']?></div>
                </div>
                <div class="info_thought">
                    <div class="info_subtitle">ежемесячный членский взнос</div>
                    <div class="info_undertitle"> <?=$page['Setting']['home_membership']?></div>
                </div>
                <div class="info_strong">
                   <?=$page['Setting']['home_text']?>
                </div>
                </div>
            </div>
            </div>
        </div>
        <a data-src="#calc" data-fancybox  href="javascript:;" class="main_btn">Онлайн калькулятор</a>
    </div>
</section>    
<section class="carousel">
    <div class="container">
        <h1>Отзывы</h1>
        <div class="car_carоusel">
            <?php foreach ($reviews as $item): ?>
                 <div>
                    <a data-fancybox href="<?=$item['Review']['link']?>" class="carоusel_img"><img src="/img/reviews/<?=$item['Review']['img']?>" alt=""></a>
                </div>
            <?php endforeach ?>
        </div>
        <div class="slider_unit">
            <div class="slider_number" role="toolbar">
                <span class="count count_total">1</span>
                <span>/</span>
                <span class="coun count_current">4</span>
            </div>
        </div>
    </div>
</section>    
<section class="branch">
    <div class="container">
        <div class="branch_wrapper">
            <div class="branch_title">Наши филиалы</div>
            <div class="branch_subtitle">У нас имеется 22 филиала нашей компании по всему Казахстану, вы можете ознакомиться с их адресами перейдя по ссылке и  посетить удобный для вас филиал</div>
            <a href="javascript:;" class="main_btn">Перейти к филиалам</a>
        </div>
    </div>
</section>    
 <?=$this->element('partners') ?>