document.addEventListener('DOMContentLoaded', function () {
  var didntDecide = document.querySelector('#id3');
  var treatmentSelect = document.querySelector('#select--treatment');
  function disableTreatmentSelect() {
    if (didntDecide.checked) {
      treatmentSelect.disabled = true;
    } else {
      treatmentSelect.disabled = false;
    }
  }
  jQuery(document).on('change', '.radio-group input', function () {
    disableTreatmentSelect();
  });
  disableTreatmentSelect();
});

var booking_form = {
  embeddedData: null,

  loadEmbeddedData: function () {
    this.embeddedData = JSON.parse(document.getElementById('service_data').innerHTML);
    console.log(this.embeddedData);
    return this.embeddedData;
  },

  initServiceSelect: function () {
    var _this = this;
    var data = _this.embeddedData;
    var $baseSelect = jQuery('#buttons-container');
    let key = 0;
    jQuery.each(data, function (category_id, category_data) {
      // $baseSelect.append('<option value='+category_id+'>'+category_data.name+'</option>');
      $baseSelect.prepend(`<div class="radio-group">
			<input type="radio" value="${category_id}" id="id${key}" name="treatment_type">
			<label for="id${key++}" class="form-input">${category_data.name}</label>
		</div>`);
    });
  },

  setTreatmentType: function (id) {
    var _this = this;
    var data = _this.embeddedData;
    var $treatmentSelect = jQuery('#select--treatment');
    $treatmentSelect.empty();
    $treatmentSelect.append('<option>- please select -</option>');
    jQuery.each(data, function (category_id, category_data) {
      if (id == category_id) {
        jQuery.each(category_data.services, function (service_id, service_data) {
          $treatmentSelect.append(
            '<option value=' + service_id + '>' + service_data.name + '</option>',
          );
        });
      }
    });
  },

  displayTreatmentPrice: function () {},

  isFormValid: function () {
    return false;
  },

  getFormFieldVal: function (fieldname) {
    var $field = jQuery('#input--' + fieldname);
    var val = $field.length ? $field.val() : null;
    return val;
  },

  populateHiddenFields: function () {
    var _this = this;
    var $hiddenField = null;
    var customerName =
      _this.getFormFieldVal('salutation') +
      ' ' +
      _this.getFormFieldVal('forename') +
      ' ' +
      _this.getFormFieldVal('surname');

    $hiddenField = jQuery('#mjm_clinic_bf_name');
    if ($hiddenField.length) {
      $hiddenField.val(customerName);
    }
  },

  formSubmit: function ($form) {
    this.populateHiddenFields();
    dataLayer.push({
      event: 'eventTracking',
      eventCategory: 'Form',
      eventAction: 'Submit',
      eventLabel: 'Booking',
    });
    jQuery.ajax({
      type: 'POST',
      url: '/',
      data: $form.serialize(), // serializes the form's elements.
      success: function (response) {
        // everything looks good!
        jQuery('#booking_success').show();
        booking_form.form_reset(false);
        dataLayer.push({
          event: 'eventTracking',
          eventCategory: 'Form',
          eventAction: 'Success',
          eventLabel: 'Booking',
        });
      },
      error: function (xhr, status, error) {
        alert(error);
        dataLayer.push({
          event: 'eventTracking',
          eventCategory: 'Form',
          eventAction: 'Error',
          eventLabel: 'Booking',
        });
      },
    });
    return false;
  },

  form_reset: function form_reset(fade) {
    jQuery('#booking_form').fadeOut();
  },

  init: function () {
    this.loadEmbeddedData();
    this.initServiceSelect();
  },
};

jQuery(document).ready(function ($) {
  amclinic.add_form_support();
  booking_form.init();

  var $selectTreatmentType = jQuery('.radio-group input');
  $selectTreatmentType.on('change', function (e) {
    booking_form.setTreatmentType($(this).val());
    $('.prices').removeClass('active');
  });

  jQuery(document).on('change', '#select--treatment', function () {
    const currentTreatmentTypeValue = $('.radio-group input:checked').val();
    const currentTrearmentValue = $(this).find(':selected').val();
    let parsedJSON = JSON.parse(document.getElementById('service_data').innerHTML);
    let priceData =
      parsedJSON[currentTreatmentTypeValue]['services'][currentTrearmentValue]['price'];
    let html = $.parseHTML(priceData);
    priceData = priceData
      .toString()
      .replace(/&lt;/g, '<')
      .replace(/&gt;/g, '>')
      .replace(/&quot;/g, '"');


    $('.prices').html(priceData);
    if (priceData.length > 0) {
      $('.prices').addClass('active');
    } else {
      $('.prices').removeClass('active');
    }
  });

  var $formControl = jQuery('.form-control');
  $formControl.on('change', function (e) {
    if (booking_form.isFormValid()) {
      //grey submit button
    } else {
      //colour submit button
    }
  });

  jQuery('#booking_form')
    .validator()
    .on('submit', function (e) {
      if (e.isDefaultPrevented()) {
        //nada
      } else {
        var $form = $(this);
        booking_form.formSubmit($form);
      }
      return false;
    });
});

document.addEventListener('DOMContentLoaded', function () {
  const currentLinks = document.querySelectorAll('.nav-link');
  console.log(currentLinks);
  const currentLocation = window.location.href;
  for (i = 0; i < currentLinks.length; i++) {
    console.log('testing');
    let linkLocation = currentLinks[i].getAttribute('href');
    if (linkLocation === currentLocation) {
      console.log(currentLinks[i]);
      currentLinks[i].classList.add('active');
    } else {
      currentLinks[i].classList.remove('active');
    }
  }
});
