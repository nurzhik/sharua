<section class="personal perc">
    <div class="container">
        <h1>личный кабинет</h1>
        <div class="personal_wrapper">
             <?=$this->element('sidebar') ?>
            <div class="personal_unit">
                <div class="personal_payment">
                    <div class="personal_unit_title"><?=$data['Questionnaire']['title_'.$l]?></div>
                </div>
                <div class="questionnaire_inner">
                    <a href="javascript:;" class="questionnaire_inner_btn_back">Назад к выбору собрания</a>
                    <?php if(!empty($questions)): ?>
                    <form action="/users/questionnairesend" method="POST">
                        <input type="hidden" name="data[Question][questionnaire_id]"  value="<?=$data['Questionnaire']['id']?>">
                        <?php if(!empty($check_moderators)): ?>
                            <input type="hidden" name="data[Question][moderator_id]"  value="<?=$check_moderators['Responsible']['moderator_id']?>">
                            <input type="hidden" name="data[Question][moderator_fio]"  value="<?=$check_moderators['Responsible']['moderator_fio']?>">
                        <?php endif ?>
                        <?php foreach ($questions as $key => $item): ?>
                            <div class="questionnaire_inner_blog">
                                <div class="questionnaire_inner_title"><?=$item['Question']['title_'.$l] ?> </div>
                                <div class="questionnaire_inner_unit">
                                    <input type="hidden" name="data[Question][results][q<?=$key+1?>][question]" value="<?=$item['Question']['title_ru'] ?>">
                                    <div class="questionnaire_inner_row">
                                        <input id="q<?=$key?>a1" type="radio" name="data[Question][results][q<?=$key+1?>][answer]" value="Поддерживаю">
                                        <label for="q<?=$key?>a1">Поддерживаю</label>
                                    </div>
                                    <div class="questionnaire_inner_row">
                                        <input id="q<?=$key?>a2" type="radio" name="data[Question][results][q<?=$key+1?>][answer]" value="Не поддерживаю">
                                        <label for="q<?=$key?>a2">Не поддерживаю</label>
                                    </div>
                                    <div class="questionnaire_inner_row">
                                        <input id="q<?=$key?>a3" type="radio" name="data[Question][results][q<?=$key+1?>][answer]" value="Воздерживаюсь от голоса">
                                        <label for="q<?=$key?>a3">Воздерживаюсь от голоса</label>
                                    </div>
                                </div>
                                
                                    <textarea name="data[Question][results][q<?=$key+1?>][desc]" id="" cols="3" rows="1" class="textarea" placeholder="Добавить комментарий к ответу"></textarea>
                                
                             
                            </div>
                        <?php endforeach ?>
                       
                        <?php if(!$check_moderators): ?>
                             <button type="submit" class="main_btn ">Подписать</button>
                        <?php endif ?>
                    </form>
                    <?php else: ?>
                       
                        <?php foreach ($results as $key => $item): ?>
                            <?php foreach ($item['results'] as $q1): ?>
                                <div class="questionnaire_inner_blog">
                                    <div class="questionnaire_inner_title"> <?=$q1['question'] ?></div>
                                    <div class="questionnaire_inner_unit">
                                        <div class="questionnaire_inner_row">
                                               <?=$q1['answer'] ?>
                                        </div>
                                    </div>
                                    <div class="textarea" ><?=$q1['desc'] ?></div>
                                </div>
                            <?php endforeach ?>
                        <?php endforeach ?>
                
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</section>