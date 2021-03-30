<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Заявки на машины</h1>
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
      <h3 class="card-title">Заявки на машины</h3>
      <div class="card-tools">
        <!-- <a href="/admin/requestcars/add?lang=ru" class="btn  btn-success">Добавить новый материал</a> -->
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
                        Машина
                    </th>
                    <th >
                        Новая машина
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
    							<?=$item['RequestCar']['id']?>
    						</td>
              
    					<td>
    						<a>
    						<?=$item['RequestCar']['fio']?>
    						</a>
    						<br/>
    						<small>
    							Дата создание  <?php echo $this->Time->format($item['RequestCar']['created'], '%d.%m.%Y', 'invalid'); ?>   
    						</small>
    					</td>
  				    	<td>
		                	<?=$item['RequestCar']['iin']?>
		                </td>
		                <td>
		                	<?=$item['Car']['title']?>
		                </td>
		                <td>
		                	<?=$item['RequestCar']['car']?>
		                </td>
		                <td>
		                	<?=$item['RequestCar']['price']?>
		                </td>
    					<td class="project-state">
    						<span class="badge badge-success">Добавлен</span>
    					</td>
    					<td class="project-actions text-right">
    						<a class="btn btn-info btn-sm" href="/admin/requestcars/edit/<?=$item['RequestCar']['id']?>?lang=ru">
    							<i class="fas fa-pencil-alt">
    							</i>
    							Одобрение
    						</a>
            
    						<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['RequestCar']['id']), array('confirm' => 'Подтвердите удаление','value'=>'465','class' => 'btn btn-danger btn-sm')); ?>
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