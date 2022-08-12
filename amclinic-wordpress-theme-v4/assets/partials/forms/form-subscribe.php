
<form class="am-theme-form" id="am-subscribe-form">

	<div class="row">
		<div class="col col-xs-12">
			<fieldset>
				<legend>Join our newsletter</legend>

				<div class="row">
					<div class="col col-xs-12 col-lg-6">
						<div class="form-group">
							<label>Name </label>
							<input id="input_name" type="text" name="am-forename" class="form-control" placeholder="Your Name" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>

					<div class="col col-xs-12 col-lg-6">
						<div class="form-group">
							<label>Email </label>
							<input type="email" name="am-email" class="input-email form-control" placeholder="eMail" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>
				</div>

				<input class="btn btn-lg btn-block btn-primary" type="submit" value="RECEIVE HEALTH NEWS" />

				<input type="hidden" name="am-newsletter-subscribe" value="1"/>
				<input type="hidden" name="form_success_msg" value="Thank you for subscribing."/>
			</fieldset>
		</div>
	</div>

</form>
