<section class="page gray">
	<div class="container">
		<div class="title title_left">Личный кабинет</div>

		<div class="cabinet doc_cabinet">
			<div class="doc_sidebar_block">
				<div class="doc_sidebar">
					<div class="res_item_img">
						<img src="img/doctor_4.png" alt="">
					</div>
					<div class="res_item_name"><?php echo $data['User']['name']; ?>   <?php echo $data['User']['surname']; ?> </div>
					<div class="res_item_rating">Рейтинг <span>5</span></div>
					<div class="res_item_balans">Баланс: <span>50 000 тенге</span></div>
					<div class="doctor_buttons">
						<a class="doctor_btn blue_btn" href="javascript:;">Снять деньги</a>
						<a class="doctor_btn gray_btn" href="javascript:;">Выйти</a>
					</div>
				</div>
			</div>
			<div class="cab_content_block">
				<div class="doc_cab_buttons">
					<a class="doc_cab_btn gray_btn" href="javascript:;">Консультации</a>
					<a class="doc_cab_btn yellow_btn sms_btn" href="chat_with_pacient.html">Сообщения <span class="sms_count">2</span></a>
					<a class="doc_cab_btn gray_btn doc_edit_btn" href="/users/editdoccabinet">Редактировать профиль</a>
				</div>
				<div class="cab_sorting">
					<div>Сортировать:</div>
					<div class="cab_sorting_list">
						<a class="cab_sorting_item active" href="javascript:;">Предстоящие</a>
						<span> / </span>
						<a class="cab_sorting_item" href="javascript:;">Прошедшие</a>
					</div>
				</div>
				<div class="cab_advice_list doc_advice_list">
					<?php foreach ($registers as $item): ?>
						<?php foreach ($item['User'] as $item): ?>
							
						
						<div class="cab_advice_item">
							<div class="advice_left">
								<div class="res_item_img">
									<img src="/img/users/<?=$item['img']?>" alt="">
								</div>
							</div>
							<div class="advice_text doc_advice">
								<div class="advice_info">
									<div class="res_item_name"><?=$item['surname']?> <?=$item['name']?></div>
									<div class="advice_info_item advice_med">Симптомы: <span> <?=$item['Register']['body']?> </span></div>
									<div class="advice_info_item advice_summ">Сумма: <span>15 000 тенге</span></div>
									<div class="advice_info_item advice_status">Статус: <span class="paid">оплачено</span></div>
								</div>
								<div class="advice_pay">
									<a class="advice_pay_btn blue_btn" href="https://sip.a1dos.kz/<?php echo $this->Common->get_link($user_id,$item['id']);?>" target="_blank">Открыть чат</a>
								</div>
							</div>
							<?php endforeach ?>
							<div class="advice_date_block">
								<div class="advice_date">
									<div class="advice_date_num"><?=$item['Register']['day']?> </div>
									<div class="advice_date_name">ноября</div>
								</div>
								<div class="advice_time"> <?=$item['Register']['time_reg']?> </div>
							</div>
						</div>
					<?php endforeach ?>
					
					
				</div>
			</div>
		</div>
	</div>
</section>