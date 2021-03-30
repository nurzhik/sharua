<section class="personal perc">
    <div class="container">
        <h1>личный кабинет</h1>
        <div class="personal_wrapper">
            <?=$this->element('sidebar') ?>
            <div class="personal_unit">
                <div class="personal_payment">
                    <div class="personal_unit_title">Мой транспорт</div>
                </div>
                <?php foreach ($cars as $item): ?>
                    <div class="table">
                        <div class="table_head">
                            <div class="car"><?=$item['Car']['title'] ?></div>
                            <div class="table_text">Cостояние: <span><?=$item['Car']['status'] ?></span></div>
                        </div>
                        <div class="table_body">
                            <div class="table_title">Дата заключения договора:</div>
                            <div class="table_subtitle"><?php echo $this->Time->format($item['Car']['date'], '%d.%m.%Y', 'invalid'); ?></div>
                        </div>
                        <div class="table_body">
                            <div class="table_title">Вступительный взнос:</div>
                            <div class="table_subtitle"><?=$item['Car']['entrance'] ?> тг</div>
                        </div>
                        <div class="table_body">
                            <div class="table_title">Первоначальный взнос:</div>
                            <div class="table_subtitle"><?=$item['Car']['initial'] ?> тг</div>
                        </div>
                        <div class="table_body">
                            <div class="table_title">Остаток по первоначальному взносу:</div>
                            <div class="table_subtitle"><?=$item['Car']['remainder'] ?> тг</div>
                        </div>
                        <div class="table_body">
                            <div class="table_title">Год выпуска:</div>
                            <div class="table_subtitle"><?=$item['Car']['year'] ?></div>
                        </div>
                        <div class="table_body">
                            <div class="table_title">Стоймость:</div>
                            <div class="table_subtitle"><?=$item['Car']['price'] ?></div>
                        </div>
                        <a href="javascript:;" id="btn_change" data-src="#popup-smena" data-fancybox data-id="<?=$item['Car']['id'] ?>"  class="main_btn main_btn--change" >подать заявку на смену авто</a>
                    </div>
                <?php endforeach ?>
                    
            </div>
        </div>
    </div>
</section>


<div class="fancybox-content" style="display: none;" id="popup-smena">
   <div class="popup-form">
        <span class="popup-form__heading">Сменить авто</span>
        <form action="/cars/request" method="POST" class="form white-bg">
            <div class="popup-row">
                <div class="popup-title">Имя</div>
                <input type="text" required name="data[CarRequest][fio]" value="<?=$data['fio']?>" readonly>
            </div>
            <div class="popup-row">
                <div class="popup-title">Телефон:</div>
                <input type="text" required name="data[CarRequest][phone]" value="<?=$data['phone']?>" readonly>
            </div>
            <div class="popup-row">
                <div class="popup-title">ИИН:</div>
                <input type="text" required name="data[CarRequest][iin]" value="<?=$data['iin']?>" readonly>
            </div>
            <input type="hidden" name="data[CarRequest][car_id]" id="change_id" readonly>
            <div class="popup-row">
                <div class="popup-title">Автомобиль:</div>
                <input type="text" required  name="data[CarRequest][car]">
            </div> 
            <div class="popup-row">
                <div class="popup-title">Стоимость:</div>
                <input type="text" required name="data[CarRequest][price]">
            </div>
            <input id="old-car" type="hidden" required>
            <button class="popup-sbt" type="submit">Отправить</button>
        </form>
    </div>
</div>

