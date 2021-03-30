<div class="personal-block">
    <div class="personal-inner-block">
        <?php if(!empty($login['img'])): ?>
			<img   class="personal-img" src="/img/users/$login['img']">
        <?php else: ?>
			<img  class="personal-img"  src="/img/admin_img/default.svg">
        <?php endif ?>
      
        <div class="personal__name"><?=$login['fio']?></div>
        <div class="money-block">
            <div class="money-block__item">
                <div class="money-block_t">Коэффициент:</div>
                <div class="money-block__line"></div>
                <div class="money-block-m">1</div>
            </div>
            <div class="money-block__item">
                <div class="money-block_t">Внесено:</div>
                <div class="money-block__line"></div>
                <div class="money-block-m">1 000 000 тг</div>
            </div>
        </div>
    </div>

    <div class="personal-links">
        <div class="personal-links">
            <div class="personal-links__item ">
                <a href="cabinet__plan-calculation.html">Плановые рассчеты</a>
            </div>
            <div class="personal-links__item">
                <a href="cabinet__actual-calcilation.html">Фактические рассчеты</a>
            </div>
            <div class="personal-links__item <?= ($this->request->params['action'] == 'cabinet' ) ? 'personal-links-active' : ''?>">
                <a href="/<?=$lang?>users/cabinet">Профиль</a>
            </div>
            <div class="personal-links__item">
                <a href="cabinet__news.html">Новости кооператива</a>
            </div>
            <div class="personal-links__item">
                <a href="cabinet__message.html">Сообщения</a>
            </div>
            <div class="personal-links__item">
                <a href="cabiner_oprosnik.html">Опросник</a>
            </div>
            <div class="personal-links__item">
                <a href="/">Выйти</a>
            </div>
        </div>
    </div>
</div>


