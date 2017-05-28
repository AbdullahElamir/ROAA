			<?php 
				// WP custom header
				$header_image = $header_image2 = $header_color = '';
				if ($top_panel_style=='dark') {
					if (($header_image = get_header_image()) == '') {
						$header_image = axiom_get_custom_option('top_panel_bg_image');
					}
					if (file_exists(axiom_get_file_dir('skins/'.($theme_skin).'/images/bg_over.png'))) {
						$header_image2 = axiom_get_file_url('skins/'.($theme_skin).'/images/bg_over.png');
					}
					$header_color = apply_filters('axiom_filter_get_link_color', axiom_get_custom_option('top_panel_bg_color'));
				}

				$header_color = '#ffffff';

				$header_style = $top_panel_opacity!='transparent' && ($header_image!='' || $header_image2!='' || $header_color!='') 
					? ' style="background: ' 
						. ($header_image2!='' ? 'url('.esc_url($header_image2).') repeat-x center bottom' : '')
						. ($header_image!=''  ? ($header_image2!='' ? ',' : '') . 'url('.esc_url($header_image).') repeat center top' : '') 
						. ($header_color!=''  ? ' '.esc_attr($header_color).';' : '')
						.'"' 
					: '';
			?>

			<div class="top_panel_fixed_wrap"></div>

			<header class="top_panel_wrap bg_tint_<?php echo esc_attr($top_panel_style); ?>" <?php echo ($header_style); ?>>
				
				<?php if (axiom_get_custom_option('show_menu_user')=='yes') { ?>
					<div class="menu_user_wrap">
						<div class="content_wrap clearfix">

							<?php if (axiom_get_custom_option('show_left_panel')=='yes') { ?>
								<div class="sidemenu_button"><i class="icon-menu-1"></i></div>
							<?php } ?>

							<div class="menu_user_area menu_user_right menu_user_nav_area">
                                <div class="usermenu_socials copy_socials socPage">
                                    <?php
                                    $socials = axiom_get_theme_option('social_icons');
                                    foreach ($socials as $s) {
                                        if (empty($s['url'])) continue;
                                        $sn = basename($s['icon']);
                                        ?>
                                        <a class="social_icons <?php echo esc_attr($sn); ?>" target="_blank" href="<?php echo esc_url($s['url']); ?>"></a>
                                    <?php
                                    }
                                    ?>
                                </div>
							</div>

                            <div class="menu_user_area menu_user_left menu_user_contact_area">
                                <?php

                                echo '<div class="contact_phone">'. axiom_get_theme_option('contact_phone') . '</div>';echo '<div class="contact_email">'. axiom_get_theme_option('contact_email') . '</div>';
                                ?>
                            </div>


						</div>
					</div>
				<?php } ?>

				<div class="menu_main_wrap logo_<?php echo esc_attr(axiom_get_custom_option('logo_align')); ?><?php echo ($AXIOM_GLOBALS['logo_text'] ? ' with_text' : ''); ?>">
					<div class="content_wrap clearfix">
						<div class="logo">
							<a href="<?php echo esc_url(home_url()); ?>"><?php echo !empty($AXIOM_GLOBALS['logo_'.($logo_style)]) ? '<img src="'.esc_url($AXIOM_GLOBALS['logo_'.($logo_style)]).'" class="logo_main" alt=""><img src="'.esc_url($AXIOM_GLOBALS['logo_fixed']).'" class="logo_fixed" alt="">' : ''; ?><?php echo ($AXIOM_GLOBALS['logo_text'] ? '<span class="logo_text">'.($AXIOM_GLOBALS['logo_text']).'</span>' : ''); ?><?php echo ($AXIOM_GLOBALS['logo_slogan'] ? '<span class="logo_slogan">' . esc_html($AXIOM_GLOBALS['logo_slogan']) . '</span>' : ''); ?></a>
						</div>

                        <?php if (axiom_get_custom_option('menu_align')!='center') { ?>
						
						<?php if (axiom_get_custom_option('show_search')=='yes') echo do_shortcode('[trx_search open="no" title=""]'); ?>
		
						<a href="#" class="menu_main_responsive_button icon-menu-1"></a>

						<nav role="navigation" class="menu_main_nav_area">
							<?php
							if (empty($AXIOM_GLOBALS['menu_main'])) $AXIOM_GLOBALS['menu_main'] = axiom_get_nav_menu('menu_main');
							if (empty($AXIOM_GLOBALS['menu_main'])) $AXIOM_GLOBALS['menu_main'] = axiom_get_nav_menu();
							echo ($AXIOM_GLOBALS['menu_main']);
							?>
						</nav>

                        <?php } ?>

                        <?php if (axiom_get_custom_option('menu_align')=='center') { ?>

                            <?php if (axiom_get_custom_option('show_search')=='yes') echo do_shortcode('[trx_search open="no" class="mobile_search" title=""]'); ?>

                            <a href="#" class="menu_main_responsive_button icon-menu-1"></a>
                            <nav role="navigation" class="menu_main_nav_area">
                                <?php
                                if (empty($AXIOM_GLOBALS['menu_main'])) $AXIOM_GLOBALS['menu_main'] = axiom_get_nav_menu('menu_main');
                                if (empty($AXIOM_GLOBALS['menu_main'])) $AXIOM_GLOBALS['menu_main'] = axiom_get_nav_menu();
                                echo ($AXIOM_GLOBALS['menu_main']);
                                ?>
                                <?php if (axiom_get_custom_option('show_search')=='yes') echo do_shortcode('[trx_search open="no" title=""]'); ?>
                            </nav>

                        <?php } ?>


					</div>
				</div>

			</header>
