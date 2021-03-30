<section class="page gray">
            <div class="container">
                <div class="title title_left">Личный кабинет</div>

                <div class="cabinet">
                    <div class="cabinet_sidebar_block">
                        <div class="cabinet_sidebar">
                            <a class="cab_link active" href="javascript:;">
                                <div class="cab_link_img">
                                    <img src="img/cab_icon_1.svg" alt="">
                                </div>
                                <span>Мои консультации</span>
                            </a>
                            <a class="cab_link" href="cabinet_my_doctors.html">
                                <div class="cab_link_img">
                                    <img src="img/cab_icon_2.svg" alt="">
                                </div>
                                <span>Мои врачи</span>
                            </a>
                            <a class="cab_link" href="cabinet_profile.html">
                                <div class="cab_link_img">
                                    <img src="img/cab_icon_3.svg" alt="">
                                </div>
                                <span>Профиль</span>
                            </a>
                            <a class="cab_link" href="javascript:;">
                                <div class="cab_link_img">
                                    <img src="img/cab_icon_4.svg" alt="">
                                </div>
                                <span>Выйти</span>
                            </a>
                        </div>
                    </div>
                    <div class="cab_content_block">
                        <div class="cab_sorting">
                            <div>Сортировать:</div>
                            <div class="cab_sorting_list">
                                <a class="cab_sorting_item active" href="javascript:;">Предстоящие</a>
                                <span> / </span>
                                <a class="cab_sorting_item" href="javascript:;">Прошедшие</a>
                            </div>
                        </div>
                        <div class="cab_advice_list">
                            <?php foreach ($registers as $item): ?>
                                <div class="cab_advice_item">
                                <div class="advice_left">
                                    <div class="res_item_img">
                                        <img src="/img/users/<?=$item['Doc'][0]['img']?>" alt="">
                                    </div>
                                    <div class="res_item_rating">Рейтинг <span>4.9</span></div>
                                </div>
                                <div class="advice_text">
                                    <div class="res_item_position">
                                    <?php foreach ($item['Doc'][0]['Specialist'] as $sh ):?>
                                        <?=$sh['title_'.$l]?>
                                    <?php endforeach ?></div>
                                    <div class="res_item_name"><?=$item['Doc'][0]['surname']?> <?=$item['User'][0]['name']?></div>
                                    <div class="res_item_exp">Стаж - <?php echo $this->Common->get_anketa($item['Doc'][0]['id'],'Опыт_работы');?></div>
                                    <div class="advice_pay">
                                        <a class="advice_pay_btn blue_btn" href="https://sip.a1dos.kz/<?php echo $this->Common->get_link($item['Doc'][0]['id'],$data['User']['id']);?>">Произвести оплату</a>
                                        <div class="advice_price"><span>15 000</span> тенге</div>
                                    </div>
                                </div>
                                <div class="advice_date_block">
                                    <div class="advice_date">
                                        <div class="advice_date_num"><?=$item['Register']['day']?></div>
                                        <div class="advice_date_name">ноября</div>
                                    </div>
                                    <div class="advice_time"><?=$item['Register']['time_reg']?></div>
                                </div>
                            </div>
                            <?php endforeach ?>
                            
                       
                        </div>
                    </div>
                </div>
            </div>
        </section>