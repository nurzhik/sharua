<?php 
echo $this->Form->create('Setting', array('type' => 'file'));
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Редактирование</h1>
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
          <h3 class="card-title">Данные</h3>

          <div class="card-tools">
            <a href="/admin/settings" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">

    			<div class="form-group">
    				<label for="main_title">Заголовок Главной страницы </label>
    				<input type="text" id="main_title" class="form-control"  required="required" name="data[Setting][main_title]" value=" <?=(!empty($data['Setting']['main_title'])) ? $data['Setting']['main_title'] : '' ?>" >
    			</div>
    			<div class="form-group">
    				<label for="main_desc">Текст  Главной страницы </label>
    				<textarea id="main_desc" class="form-control"  name="data[Setting][main_desc]" ><?=(!empty($data['Setting']['main_desc'])) ? $data['Setting']['main_desc'] : '' ?></textarea>
    			</div>
          <div class="form-group">
            <label for="auto_title">Заголовок  страницы Машина </label>
            <input type="text" id="auto_title" class="form-control"  required="required" name="data[Setting][auto_title]" value=" <?=(!empty($data['Setting']['auto_title'])) ? $data['Setting']['auto_title'] : '' ?>" >
          </div>
          <div class="form-group">
            <label for="auto_desc">Текст   страницы Машина</label>
            <textarea id="auto_desc" class="form-control"  name="data[Setting][auto_desc]" ><?=(!empty($data['Setting']['auto_desc'])) ? $data['Setting']['auto_desc'] : '' ?></textarea>
          </div>
          <div class="form-group">
            <label for="home_title">Заголовок  страницы Квартира</label>
            <input type="text" id="home_title" class="form-control"  required="required" name="data[Setting][home_title]" value=" <?=(!empty($data['Setting']['home_title'])) ? $data['Setting']['home_title'] : '' ?>" >
          </div>
          <div class="form-group">
            <label for="home_desc">Текст   страницы Квартира </label>
            <textarea id="home_desc" class="form-control"  name="data[Setting][home_desc]" ><?=(!empty($data['Setting']['home_desc'])) ? $data['Setting']['home_desc'] : '' ?></textarea>
          </div>
          <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="text" id="phone" class="form-control"  required="required" name="data[Setting][phone]" value=" <?=(!empty($data['Setting']['phone'])) ? $data['Setting']['phone'] : '' ?>" >
          </div>
          <div class="form-group">
            <label for="insta">Инстаграм</label>
            <input type="text" id="insta" class="form-control"  required="required" name="data[Setting][insta]" value=" <?=(!empty($data['Setting']['insta'])) ? $data['Setting']['insta'] : '' ?>" >
          </div>
          <div class="form-group">
            <label for="face">Facebook</label>
            <input type="text" id="face" class="form-control"  required="required" name="data[Setting][face]" value=" <?=(!empty($data['Setting']['face'])) ? $data['Setting']['face'] : '' ?>" >
          </div>
          <div class="form-group">
            <label for="youtube">Youtube</label>
            <input type="text" id="youtube" class="form-control"  required="required" name="data[Setting][youtube]" value=" <?=(!empty($data['Setting']['youtube'])) ? $data['Setting']['youtube'] : '' ?>" >
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <div class="col-md-12">
      <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
          <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">Условия новое авто</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Условия б/у авто</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="true">Условия жилья</a>
            </li>
         
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
              <div class="form-group">
                <label for="inputName">Вступительный взнос</label>
                <input type="text" id="inputName" class="form-control"  required="required" name="data[Setting][new_car_entrance]" value=" <?=(!empty($data['Setting']['new_car_entrance'])) ? $data['Setting']['new_car_entrance'] : '' ?>" >
              </div>
              <div class="form-group">
                <label for="new_car_initial">Первоначальный взнос</label>
                <textarea id="new_car_initial" class="form-control"  name="data[Setting][new_car_initial]" ><?=(!empty($data['Setting']['new_car_initial'])) ? $data['Setting']['new_car_initial'] : '' ?></textarea>
              </div>
              <div class="form-group">
                <label for="  new_car_time">Срок рассрочки</label>
                <input type="text" id=" new_car_time" class="form-control"  required="required" name="data[Setting][new_car_time]" value=" <?=(!empty($data['Setting']['new_car_time'])) ? $data['Setting']['new_car_time'] : '' ?>" >
              </div>
              <div class="form-group">
                <label for="new_car_membership">Ежемесячный членский взнос</label>
                <input type="text" id="new_car_membership" class="form-control"  required="required" name="data[Setting][new_car_membership]" value=" <?=(!empty($data['Setting']['new_car_membership'])) ? $data['Setting']['new_car_membership'] : '' ?>" >
              </div>

            </div>
            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
              <div class="form-group">
                <label for="old_car_entrance">Вступительный взнос</label>
                <input type="text" id="old_car_entrance" class="form-control"  required="required" name="data[Setting][old_car_entrance]" value=" <?=(!empty($data['Setting']['old_car_entrance'])) ? $data['Setting']['old_car_entrance'] : '' ?>" >
              </div>
              <div class="form-group">
                <label for="old_car_initial">Первоначальный взнос</label>
                <textarea id="old_car_initial" class="form-control"  name="data[Setting][old_car_initial]" ><?=(!empty($data['Setting']['old_car_initial'])) ? $data['Setting']['old_car_initial'] : '' ?></textarea>
              </div>
              <div class="form-group">
                <label for="  old_car_time">Срок рассрочки</label>
                <input type="text" id=" old_car_time" class="form-control"  required="required" name="data[Setting][old_car_time]" value=" <?=(!empty($data['Setting']['old_car_time'])) ? $data['Setting']['old_car_time'] : '' ?>" >
              </div>
              <div class="form-group">
                <label for="old_car_membership">Ежемесячный членский взнос</label>
                <input type="text" id="old_car_membership" class="form-control"  required="required" name="data[Setting][old_car_membership]" value=" <?=(!empty($data['Setting']['old_car_membership'])) ? $data['Setting']['old_car_membership'] : '' ?>" >
              </div>
            </div>
            <div class="tab-pane fade active show" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
              <div class="form-group">
                <label for="home_entrance">Вступительный взнос</label>
                <input type="text" id="home_entrance" class="form-control"  required="required" name="data[Setting][home_entrance]" value=" <?=(!empty($data['Setting']['home_entrance'])) ? $data['Setting']['home_entrance'] : '' ?>" >
              </div>
              <div class="form-group">
                <label for="home_initial">Первоначальный взнос</label>
                <textarea id="home_initial" class="form-control"  name="data[Setting][home_initial]" ><?=(!empty($data['Setting']['home_initial'])) ? $data['Setting']['home_initial'] : '' ?></textarea>
              </div>
              <div class="form-group">
                <label for="  home_time">Срок рассрочки</label>
                <input type="text" id=" home_time" class="form-control"  required="required" name="data[Setting][home_time]" value=" <?=(!empty($data['Setting']['home_time'])) ? $data['Setting']['home_time'] : '' ?>" >
              </div>
              <div class="form-group">
                <label for="home_membership">Ежемесячный членский взнос</label>
                <input type="text" id="home_membership" class="form-control"  required="required" name="data[Setting][home_membership]" value=" <?=(!empty($data['Setting']['home_membership'])) ? $data['Setting']['home_membership'] : '' ?>" >
              </div>
              <div class="form-group">
                <label for="home_text">Требование</label>
                <input type="text" id="home_text" class="form-control"  required="required" name="data[Setting][home_text]" value=" <?=(!empty($data['Setting']['home_text'])) ? $data['Setting']['home_text'] : '' ?>" >
              </div>
            </div>
          
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
     <!--  <a href="#" class="btn btn-secondary">Cancel</a> -->
     <?
	echo $this->Form->button('Редактировать', array('class' => 'btn btn-success float-right'));
	?>
     
    </div>
  </div>
</section>
<script type="text/javascript">
  CKEDITOR.replace( 'editor3' );
  CKEDITOR.replace( 'editor2' );
</script>