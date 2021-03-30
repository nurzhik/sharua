<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Заявки на недвижимость</h1>
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
      <h3 class="card-title">Заявки на недвижимость</h3>
      <div class="card-tools">
        <!-- <a href="/admin/requesthomes/add?lang=ru" class="btn  btn-success">Добавить новый материал</a> -->
      </div>
		
    </div>
    <div class="card-body p-0">
      <?php if(!empty($data)): ?>
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        ID
                    </th>
                    <th style="width: 40%">
                        ФИО
                    </th>
                    <th >
                        ИИН
                    </th>
                    <th >
                        недвижимость
                    </th>
                    <th >
                        Новая недвижимость
                    </th>
                    <th >
                        Цена
                    </th>
                    <th style="width: 8%" class="text-center">
                        Статус
                    </th>
                </tr>
            </thead>
            <tbody>

  		
  			
  			 	  <?php foreach($data as $item): ?>
  			 	  	
    					<tr>
    						<td>
    							<?=$item['RequestHome']['id']?>
    						</td>
              
    					<td>
    						<a>
    						<?=$item['RequestHome']['fio']?>
    						</a>
    						<br/>
    						<small>
    							Дата создание  <?php echo $this->Time->format($item['RequestHome']['created'], '%d.%m.%Y', 'invalid'); ?>   
    						</small>
    					</td>
  				    	<td>
		                	<?=$item['RequestHome']['iin']?>
		                </td>
		                <td>
		                	<?=$item['Home']['title']?>
		                </td>
		                <td>
		                	<?=$item['RequestHome']['home']?>
		                </td>
		                <td>
		                	<?=$item['RequestHome']['price']?>
		                </td>
    					<td class="project-state">
    						<span class="badge badge-success">Добавлен</span>
    					</td>
    					<td class="project-actions text-right">
    						<a class="btn btn-info btn-sm" href="/admin/requesthomes/edit/<?=$item['RequestHome']['id']?>?lang=ru">
    							<i class="fas fa-pencil-alt">
    							</i>
    							Одобрение
    						</a>
            
    						<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['RequestHome']['id']), array('confirm' => 'Подтвердите удаление','value'=>'465','class' => 'btn btn-danger btn-sm')); ?>
    					</td>
    					</tr>
    				<?php endforeach ?>
  	
  			
            </tbody>
        </table>
      <?php else: ?>
        <p class="empty-text">К сожалению в данном разделе еще не добавлена информация...</p>
      <?php endif ?>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>