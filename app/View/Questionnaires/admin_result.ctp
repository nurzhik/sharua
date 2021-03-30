
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?=$data['Questionnaire']['title_'.$l]; ?></h1>

      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
   <div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Результат</h3>

          <div class="card-tools">
            <a href="/admin/questionnaires" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
          <?php foreach ($total_results as $item): ?>

             <div class="form-group">
                <label for="inputName"><?=$item['question']?></label>
                <div class="text-muted">
                 Поддерживаю:  <?=$item['Поддерживаю']?>
                </div>
                 <div class="text-muted">
                 Не поддерживаю:  <?=(!empty($item['Не поддерживаю'])) ? $item['Не поддерживаю'] : '0'?>
                </div>
                 <div class="text-muted">
                 Воздерживаюсь от голоса: <?=(!empty($item['Воздерживаюсь от голоса'])) ? $item['Воздерживаюсь от голоса'] : '0'?>
                </div>
              </div>
          <?php endforeach ?>
         
        
        </div>
        <!-- /.card-body -->
      </div>
      <div class="card">
    <div class="card-header">
      <h3 class="card-title">Список пользоватлеей</h3>
      <!-- <div class="card-tools">
        <a href="/admin/news/add?lang=ru" class="btn  btn-success">Добавить новый материал</a>
      </div> -->
    
    </div>
    <div class="card-body p-0">
      <table class="table table-striped projects">
        <thead>
          <tr>
              <th style="width: 1%">
                  ID
              </th>
              <th style="width: 40%">
                  ФИО
              </th>
              <th>
                  Дествия
              </th>
          </tr>
        </thead>
          <tbody>
            <?php foreach ($users as $item): ?>
              <tr>
                <td>46</td>
                <td> <?=$item['User']['fio']?></td>
                <td>
                    <a class="btn btn-info btn-sm" href="/admin/questionnaires/resultview/<?=$data['Questionnaire']['id']?>/<?=$item['User']['id']?>">
                    Подробнее
                  </a>
                </td>
              </tr>
            <?php endforeach ?>  
          </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
      <!-- /.card -->
    </div>
   
  </div>


</section>


