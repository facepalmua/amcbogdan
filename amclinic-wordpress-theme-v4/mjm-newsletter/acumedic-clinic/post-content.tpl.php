<!--post_content-->
<table align="center" class="wrapper content float-center" style="Margin: 0 auto; background: #fff; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%;">
	<tr style="padding: 0; text-align: left; vertical-align: top;">
		<td class="wrapper-inner" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #0a0a0a; font-family: Verdana, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
			<table align="center" class="container" style="Margin: 0 auto; background: #fefefe; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 752px;">
				<tbody>
					<tr style="padding: 0; text-align: left; vertical-align: top;">
						<td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #0a0a0a; font-family: Verdana, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">

							<?php if($featured_image && $post_content_count==1){?>
								<table class="row" style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;">
									<tbody>
									<tr style="padding: 0; text-align: left; vertical-align: top;">
										<th class="small-12 large-12 columns first last" style="Margin: 0 auto; color: #0a0a0a; font-family: Verdana, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 16px; padding-right: 16px; text-align: left; width: 736px;">
											<table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
												<tr style="padding: 0; text-align: left; vertical-align: top;">
													<th style="Margin: 0; color: #0a0a0a; font-family: Verdana, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left;">
														<div class="image" style="font-size: 0;Margin-bottom: 27px" align="center">
															<img style="border: 0;-ms-interpolation-mode: bicubic;display: block; width:100%" src="<?php echo $featured_image ?>" alt="" />
														</div>
													</th>
												</tr>
											</table>
										</th>
									</tr>
									</tbody>
								</table>
							<?php } else { ?>
								<table class="spacer" style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
									<tbody>
									<tr style="padding: 0; text-align: left; vertical-align: top;">
										<td height="70px" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #0a0a0a; font-family: Verdana, Helvetica, Arial, sans-serif; font-size: 70px; font-weight: normal; hyphens: auto; line-height: 70px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
											&#xA0;
										</td>
									</tr>
									</tbody>
								</table>
							<?php } ?>

							<table class="row" style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;">
								<tbody>
									<tr style="padding: 0; text-align: left; vertical-align: top;">
										<th class="small-12 large-12 columns first last" style="Margin: 0 auto; color: #0a0a0a; font-family: Verdana, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 16px; padding-right: 16px; text-align: left; width: 736px;">
											<table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
												<tr style="padding: 0; text-align: left; vertical-align: top;">
													<th style="Margin: 0; color: #0a0a0a; font-family: Verdana, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left;">
														<?if($post_content_count == 1){?>
															<h1 style="Margin-top: 0;color: #353638;font-weight: 400;font-size: 32px;Margin-bottom: 24px;"><?php echo $nl->post_title?></h1>
														<?php } ?>
														<?php echo $output ?>
													</th>
													<th class="expander" style="Margin: 0; color: #0a0a0a; font-family: Verdana, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;"></th>
												</tr>
											</table>
										</th>
									</tr>
								</tbody>
							</table>

							<table class="spacer" style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
								<tbody>
									<tr style="padding: 0; text-align: left; vertical-align: top;">
										<td height="70px" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #0a0a0a; font-family: Verdana, Helvetica, Arial, sans-serif; font-size: 70px; font-weight: normal; hyphens: auto; line-height: 70px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
											&#xA0;
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</td>
	</tr>
</table>
<!--end:post_content-->