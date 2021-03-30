<section class="personal perc">
    <div class="container">
        <h1>личный кабинет</h1>
        <div class="personal_wrapper">
             <?=$this->element('sidebar') ?>
            <div class="personal_unit">
                <div class="personal_payment">
                    <div class="personal_unit_title">Моя очередь недвижимости</div>
                </div>
                 <div class="personal-top">
                    <a class="personal-top__link personal-top__link--car <?= ($this->request->params['action'] == 'my_turn' ) ? 'personal-top__link--active' : ''?>" href="/<?=$lang?>users/my_turn">Машина</a>                 
                    <a class="personal-top__link personal-top__link--nedvizhimost <?= ($this->request->params['action'] == 'my_turn_appartaments' ) ? 'personal-top__link--active' : ''?>" href="/<?=$lang?>users/my_turn_appartaments">Недвижимость</a>                 
                                 
                </div>     
                <div class="personal_pad">
                    <div class="cab-tab">
                        <ul class="ctab-ul">
                            <?php foreach ($homes as $key => $item): ?>
                                 <li>
                                    <a class="<?=($key == 0) ? 'active' : '';?>" href="#tab<?=$key?>"><?=$item['Home']['title'] ?> </a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                        <div class="cab-tab__part">
                            <div class="table_auto">
                                    <?php $i=0; ?>
                                    <?php foreach ($homes as $key => $item): ?>
                                        <div id="tab<?=$key?>" class="cab-tab__part__item  <?=($key == 0) ? 'active' : '';?>"> 
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th><span>Очередь</span></th>
                                                        <th><span>Дата заключения договора</span></th>
                                                        <th><span>Машина</span></th>
                                                        <th><span>ФИО</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(!empty($turns[$item['Home']['id']]['prev'])): ?>
                                                        <?php foreach ($turns[$item['Home']['id']]['prev'] as $prev): ?>
                                                            <tr>
                                                                <td><span><?=$prev['homes']['order_num'] ?> </span></td>
                                                                <td><span><?=$prev['homes']['date'] ?></span></td>
                                                                <td><span><?=$prev['homes']['title'] ?></span></td>
                                                                <td><span>-</span></td>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    <?php endif ?>
                                                    <?php foreach ($turns[$item['Home']['id']]['middle'] as $middle): ?>
                                                        <tr class="active"> 
                                                            <td><span><?=$middle['Home']['order_num'] ?> </span></td>
                                                            <td><span><?=$middle['Home']['date'] ?></span></td>
                                                            <td><span><?=$middle['Home']['title'] ?></span></td>
                                                            <td><span><?=$middle['User']['fio'] ?></span></td>
                                                        </tr>
                                                    <?php endforeach ?>
                                                    <?php if(!empty($turns[$item['Home']['id']]['next'])): ?>
                                                        <?php foreach ($turns[$item['Home']['id']]['next'] as $next): ?>
                                                            <tr>
                                                                <td><span><?=$next['homes']['order_num'] ?> </span></td>
                                                                <td><span><?=$next['homes']['date'] ?></span></td>
                                                                <td><span><?=$next['homes']['title'] ?></span></td>
                                                                <td><span>-</span></td>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    <?php endif ?>
                                                    <tr>
                                                        <th colspan="4"><span><span>Примечание:</span>Ваша очередь отмечена серым цветом </span></th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</section>