<?php
					$indications = get_the_terms($post->ID, 'mjm_clinic_indication');
					if ($indications && count($indications) > 0) {
					?>
						<div class="related-indications__section">
							<h4>Related Indications</h4>
							<div class="related-indications__block">
								<?php $tags = '';
								foreach ($indications as $indication_tag) {
									$tags .= '<a class="related-indications__link" href="' . get_term_link($indication_tag) . '">
												' . $indication_tag->name . '
												 </a>';
								}
								echo $tags;
								?>
							</div>
						</div>
					<?php } ?>

					<?php
					global $wp_query;
					$title      = isset($instance['title']) ? apply_filters('widget_title', $instance['title']) : __('Related Services', 'mjm-clinic');
					$count      = isset($instance['count']) ? $instance['count'] : -1;
					$taxonomy   = 'mjm_clinic_indication';
					$ignore_ids = array();
					if (is_tax('mjm_clinic_indication')) {
						$term  = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
						$terms = array($term);
					} else {
						$this_post  = $wp_query->post;
						$terms      = wp_get_post_terms($this_post->ID, $taxonomy);
						$ignore_ids = array($this_post->ID);
					}

					$related_conditions = mjm_clinic_get_posts_related_to_terms('mjm-clinic-condition', $taxonomy, $terms, $count, $ignore_ids);

					if (count($related_conditions) > 0) { ?>
						<div class="related-indications__section">
							<h4>Related Health Conditions</h4>
							<div class="related-indications__block">
								<?php
								$condition_tags = '';
								foreach ($related_conditions as $related_condition) {
									$condition_tags .= '<a class="related-indications__link" href="' . get_post_permalink($related_condition->ID) . '">
												' . $related_condition->post_title . '
												 </a>';
								}
								echo $condition_tags;
								?>
							</div>
						</div>
					<?php } ?>