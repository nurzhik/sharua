<section class="personal perc">
    <div class="container">
        <h1>личный кабинет</h1>
        <div class="personal_wrapper">
             <?=$this->element('sidebar') ?>
            <div class="personal_unit">
                <div class="personal_payment">
                    <div class="personal_unit_title">ОПРОСНИК</div>
                </div>
                    <div class="table_auto">
                    <table>
                        <tbody class="tbody">
                            <?php if($check_moderators): ?>
                                <?php foreach ($questionnaires as $item): ?>

                                    <tr>
                                        <td><span><?php echo $this->Time->format($item['Questionnaire']['date'], '%d.%m.%Y', 'invalid'); ?></span></td>
                                        <td><span><?=$item['Questionnaire']['title_'.$l] ?></span></td>
                                        <td><a href="/users/moderator_question/<?=$item['Questionnaire']['id'] ?>">Подробнее</a></td>
                                    </tr>
                                <?php endforeach ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>