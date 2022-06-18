
jQuery(document).ready(function($) {

	amclinic.add_form_support();

	$('.am-theme-form').validator().on('submit', function (e) {

		if (e.isDefaultPrevented()) {
			//nowt
		} else {
			var $form = $('.am-theme-form');
			dataLayer.push({
				'event' : 'eventTracking',
				'eventCategory' : 'Form',
				'eventAction' : 'Submit',
				'eventLabel' : $form.attr('id')
			});
			$.ajax({
				type: "POST",
				url: '/',
				data: $(this).serialize()+ '&am-theme-form=' + $(this).attr('id'), // serializes the form's elements.
				success: function (response) {
					// everything looks good!
					$form.trigger("reset");
					$form.hide();
					var form_success = jQuery('#form_success');
					if(form_success.length){
						form_success.show();
					} else {
						msg_el = $('input[name="form_success_msg"]');
						msg = msg_el.length ? msg_el.val() : 'Your form submission was successful';
						amclinic.ajax_alert(msg, 'success');
					}
					dataLayer.push({
						'event' : 'eventTracking',
						'eventCategory' : 'Form',
						'eventAction' : 'Success',
						'eventLabel' : $form.attr('id')
					});
				},
				error: function (xhr, status, error) {
					amclinic.ajax_alert(error, 'danger');
					dataLayer.push({
						'event' : 'eventTracking',
						'eventCategory' : 'Form',
						'eventAction' : 'Error',
						'eventLabel' : $form.attr('id')
					});
				}
			});
			return false;
		}
	})
});