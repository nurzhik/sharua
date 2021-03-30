
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Список Пайщиков</h1>
      </div>
      <div class="col-sm-6">
        
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Список Пайщиков</h3>
      <!-- <div class="card-tools">
        <a href="/admin/news/add?lang=ru" class="btn  btn-success">Добавить новый материал</a>
      </div> -->
		
    </div>
    <div class="card-body">
      <?php if(!empty($data)): ?>
      <div class="box-body">
          <strong>Почта</strong>
          <div class="text-muted">
            <?=$data['User']['username']?>
          </div>
        <hr>
          <strong>ФИО</strong>
          <div class="text-muted">
            <?=$data['User']['fio']?>
          </div>
        <hr>
          <strong>ИИН</strong>
          <div class="text-muted">
            <?=$data['User']['iin']?>
          </div>
        <hr>
          <strong>Город</strong>
          <div class="text-muted">
            <?=$data['User']['city']?>
          </div>
        <hr>
          <strong>Адрес</strong>
          <div class="text-muted">
            <?=$data['User']['address']?>
          </div>
        <hr>
         
          <strong>Телефон</strong>
          <div class="text-muted">
            <?=$data['User']['phone']?>
          </div>
        
        <?php if($data['User']['active']=='deactivate'):?>
          <form action="/admin/peoples/edit/<?=$data['User']['id']?>" method="POST">
            <input type="hidden" value="activate" name="data[active]">
            <button class="btn btn-success ">Активировать</button>
          </form>
        <?php endif ?>
      </div>
      <?php else: ?>
        <p class="empty-text">К сожалению в данном разделе еще не добавлена информация...</p>
      <?php endif ?>
    </div>
    <div class="col-md-12">
      <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
          <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">Транспорт</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Недвижимость</a>
            </li>
          
         
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">

              <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>Очередь</th>
                        <th>ФИО</th>
                        <th>Название</th>
                        <th>Дата</th>
                        <th>Вступительный </th>
                        <th>Первоначальный  </th>
                        <th>Остаток по первоначальному взносу </th>
                        <th>Статус </th>
                        <th>Год выпуска </th>
                        <th>Стоймость </th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($cars as $item): ?>
                        <tr>
                          <td><?=$item['Car']['order_num']?></td>
                          <td><?=$item['User']['fio']?></td>
                          <td><?=$item['Car']['title']?></td>
                          <td><?=$item['Car']['date']?></td>
                          <td><?=$item['Car']['entrance']?></td>
                          <td><?=$item['Car']['initial']?></td>
                          <td><?=$item['Car']['remainder']?></td>
                          <td><?=$item['Car']['status']?></td>
                          <td><?=$item['Car']['year']?></td>
                          <td><?=$item['Car']['price']?></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              
              

            </div>
            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
              <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>Очередь</th>
                        <th>ФИО</th>
                        <th>Название</th>
                        <th>Дата</th>
                        <th>Вступительный </th>
                        <th>Первоначальный  </th>
                        <th>Остаток по первоначальному взносу </th>
                        <th>Статус </th>
                        <th>Застройщик </th>
                        <th>Стоймость </th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($homes as $item): ?>
                        <tr>
                          <td><?=$item['Home']['order_num']?></td>
                          <td><?=$item['User']['fio']?></td>
                          <td><?=$item['Home']['title']?></td>
                          <td><?=$item['Home']['date']?></td>
                          <td><?=$item['Home']['entrance']?></td>
                          <td><?=$item['Home']['initial']?></td>
                          <td><?=$item['Home']['remainder']?></td>
                          <td><?=$item['Home']['status']?></td>
                          <td><?=$item['Home']['developer']?></td>
                          <td><?=$item['Home']['price']?></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
            </div>
            
          
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>