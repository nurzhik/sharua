<section class="personal perc">
    <div class="container">
        <h1>личный кабинет</h1>
        <div class="personal_wrapper">
            <?=$this->element('sidebar') ?>
            <div class="personal_unit">
                <div class="personal_payment">
                    <div class="personal_unit_title">МОЯ НЕДВИЖИМОСТЬ</div>
                </div>
                <?php foreach ($homes as $item): ?>
                    <div class="table">
                        <div class="table_head">
                            <div class="home"><?=$item['Home']['title'] ?></div>
                            <div class="table_text">Cостояние: <span><?=$item['Home']['status'] ?></span></div>
                        </div>
                        <div class="table_body">
                            <div class="table_title">Дата заключения договора:</div>
                            <div class="table_subtitle"><?php echo $this->Time->format($item['Home']['date'], '%d.%m.%Y', 'invalid'); ?></div>
                        </div>
                        <div class="table_body">
                            <div class="table_title">Вступительный взнос:</div>
                            <div class="table_subtitle"><?=$item['Home']['entrance'] ?> тг</div>
                        </div>
                        <div class="table_body">
                            <div class="table_title">Первоначальный взнос:</div>
                            <div class="table_subtitle"><?=$item['Home']['initial'] ?> тг</div>
                        </div>
                        <div class="table_body">
                            <div class="table_title">Остаток по первоначальному взносу:</div>
                            <div class="table_subtitle"><?=$item['Home']['remainder'] ?> тг</div>
                        </div>
                        <div class="table_body">
                            <div class="table_title">Застрощик:</div>
                            <div class="table_subtitle"><?=$item['Home']['developer'] ?></div>
                        </div>
                        <div class="table_body">
                            <div class="table_title">Стоймость:</div>
                            <div class="table_subtitle"><?=$item['Home']['price'] ?></div>
                        </div>
                        <a href="javascript:;" id="btn_change" data-src="#popup-smena" data-fancybox data-id="<?=$item['Home']['id'] ?>" class="main_btn main_btn--change">подать заявку на смену недвижимости</a>
                    </div>
                <?php endforeach ?>
                    
            </div>
        </div>
    </div>
</section>


<div class="fancybox-content" style="display: none;" id="popup-smena">
   <div class="popup-form">
        <span class="popup-form__heading">Сменить недвижимость</span>
        <form action="/homes/request" method="POST" class="form white-bg">
            <div class="popup-row">
                <div class="popup-title">Имя</div>
                <input type="text" required name="data[HomeRequest][fio]" value="<?=$data['fio']?>" readonly>
            </div>
            <div class="popup-row">
                <div class="popup-title">Телефон:</div>
                <input type="text" required name="data[HomeRequest][phone]" value="<?=$data['phone']?>" readonly>
            </div>
            <div class="popup-row">
                <div class="popup-title">ИИН:</div>
                <input type="text" required name="data[HomeRequest][iin]" value="<?=$data['iin']?>" readonly>
            </div>
            <input type="hidden" name="data[HomeRequest][home_id]" id="change_id" readonly>
            <div class="popup-row">
                <div class="popup-title">недвижимость:</div>
                <input type="text" required  name="data[HomeRequest][home]">
            </div> 
            <div class="popup-row">
                <div class="popup-title">Стоимость:</div>
                <input type="text" required name="data[HomeRequest][price]">
            </div>
            <input id="old-home" type="hidden" required>
            <button class="popup-sbt" type="submit">Отправить</button>
        </form>
    </div>
</div>

