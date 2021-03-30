<section class="page">
	<div class="container">
		<div class="title title_left">О проекте</div>
		<div class="about">
			<div class="about_text">
				<div class="text_item">
					<?=$page['Setting']['about_text']?>
				</div>
			</div>
			<div class="about_video">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$page['Setting']['about_video']?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</section>

<section class="line_section">
	<div class="container">
		<div class="title">Преимущества</div>
		<div class="advantages">
			<?php foreach ($advantages as $item): ?>
				<div class="advan_item">
					<div class="advan_img">
						<img src="/img/advantages/<?=$item['Advantage']['img']?>" alt="">
					</div>
					<div class="advan_name"><?=$item['Advantage']['title']?></div>
					<div class="advan_text"><?=$item['Advantage']['body']?></div>
				</div>
			<?php endforeach ?>
			
			
		</div>
	</div>
</section>

<section class="gray">
	<div class="container">
		<div class="title">Поделиться в социальных сетях</div>
		<div class="page_share">
			<div class="share_list">
				<a class="share_link telegram_share" href="javascript:;" rel="nofollow noopener" target="_blank" title="Telegram">
					<div class="share_img">
						<img src="img/telegram.svg" alt="">
					</div>
					<div class="share_text">Telegram</div>
				</a>
				<a class="share_link wp_share" href="javascript:;" rel="nofollow noopener" target="_blank" title="WhatsApp">
					<div class="share_img">
						<img src="img/whatsapp.svg" alt="">
					</div>
					<div class="share_text">WhatsApp</div>
				</a>
				<a class="share_link vk_share" href="javascript:;" rel="nofollow noopener" target="_blank" title="ВКонтакте">
					<div class="share_img">
						<img src="img/vk.svg" alt="">
					</div>
					<div class="share_text">VKontakte</div>
				</a>
				<a class="share_link facebook_share" href="javascript:;" rel="nofollow noopener" target="_blank" title="Facebook">
					<div class="share_img">
						<img src="img/facebook_white.svg" alt="">
					</div>
					<div class="share_text">Facebook</div>
				</a>
			</div>
			<script src="https://yastatic.net/share2/share.js"></script>
			<div class="ya-share2" data-curtain data-services="vkontakte,facebook,telegram,whatsapp"></div>
		</div>
	</div>
</section>