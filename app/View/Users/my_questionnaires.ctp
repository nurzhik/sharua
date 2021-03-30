<section class="personal perc">
    <div class="container">
        <h1>личный кабинет</h1>
        <div class="personal_wrapper">
             <?=$this->element('sidebar') ?>
            <div class="personal_unit">
                <div class="personal_payment">
                    <div class="personal_unit_title">ОПРОСНИК</div>
                    <form class="personal-select" action="/users/selectmoderator" method="POST">
                        <div class="person_item">
                            <span>Отвественные лица:</span>
                            <select class="select-slide" name="data[Moderator][id]">
                                <?php foreach ($moderators as $item): ?>
                                    <option value="<?=$item['User']['id'] ?>"><?=$item['User']['fio'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <button type="submit">Отправить</button>
                    </form>
                </div>
                    <div class="table_auto">
                    <table>
                        <tbody class="tbody">
                            <?php foreach ($questionnaires as $item): ?>

                                <tr>
                                    <td><span><?php echo $this->Time->format($item['Questionnaire']['date'], '%d.%m.%Y', 'invalid'); ?></span></td>
                                    <td><span><?=$item['Questionnaire']['title_'.$l] ?></span></td>
                                    <td><a href="/users/my_question/<?=$item['Questionnaire']['id'] ?>">Подробнее</a></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>