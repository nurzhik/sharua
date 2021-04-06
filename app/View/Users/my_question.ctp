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
                    <a href="/users/my_questionnaires" class="questionnaire_inner_btn_back">Назад к выбору собрания</a>
                    <?php if(!empty($questions)): ?>
                    <form id="questions" action="/users/questionnairesend" method="POST">
                        <?=$this->Session->flash('bad')?>
                        <input id="signature" type="hidden" name="data[signature]"/>
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
                        <?php if($check_moderators): ?>
                             <span id="submit" style="cursor: pointer;" class="main_btn ">Подписать</span>
                        <?php endif ?>
                    </form>
                    <?php else: ?>
                       
                        <?php foreach ($results as $key => $item): ?>
                            <?php foreach ($item['results'] as $k => $q1): ?>
                                <div class="questionnaire_inner_blog questions">
                                    <div class="questionnaire_inner_title"> <?=$q1['question'] ?></div>
                                    <div class="questionnaire_inner_unit">
                                        <div style="color: <?=($q1['answer'] != $signature['data[Question][results]['.$k.'][answer]'])?'red':'green'?>" class="questionnaire_inner_row answer">
                                               <?=$q1['answer'] ?>
                                        </div>
                                    </div>
                                    
                                    <?php if($q1['answer'] != $signature['data[Question][results]['.$k.'][answer]']): ?>
                                        <div class="questionnaire_inner_unit">
                                            <div class="questionnaire_inner_row answer">
                                            подписанный ответ <?=$signature['data[Question][results]['.$k.'][answer]']?>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                    
                                    <div class="textarea" ><?=$q1['desc'] ?></div>
                                </div>
                            <?php endforeach ?>
                        <?php endforeach ?>
                        <hr/>
                        <div class="questionnaire_inner_title">Подпись <?=($isValidSign == true)?'Валидный':'Не валидный'?></div>
                        <?php if($isValidSign == true):?>
                            <div class="questionnaire_inner_title">от <?=$commonName?> <?=$iin?> </div>
                        <?php endif ?>
                        <textarea style="min-height: 200px" class="textarea"><?=$xmlsignature?></textarea>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="/ncalayer.js"></script> 
<script>
window.addEventListener("load", function(){
    $.fn.serializeObject = function(){
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name] !== undefined) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };

    $("#submit").click(function(){
        if(webSocket.readyState != webSocket.OPEN){
            if(confirm("Включите NCALayer и нажмите OK")){
                initNcaLayer();
            }
        }
        console.log("Click");
        $("#signature").val("");
        var signData = encodeURI(JSON.stringify($("#questions").serializeObject()));
        signXml("PKCS12", "SIGNATURE", "<root><Document>"+signData+"</Document></root>", postForm);
    });

    window.postForm = function(ev){

        if(ev.code == "200") {
            console.log("Success");
            $("#signature").val(ev.responseObject);
            $("#questions").submit();
        }else{
            alert("Ошибка подписи");
        }
    }

 
    if(webSocket.readyState != webSocket.OPEN){
        initNcaLayer();
    }
    
});

</script>