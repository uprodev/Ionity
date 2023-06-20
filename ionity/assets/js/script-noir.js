jQuery(document).ready(function($){


  function ValidateCreditCardNumber(ccNum) {
    var visaRegEx = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
    var mastercardRegEx = /^(?:5[1-5][0-9]{14})$/;
    var amexpRegEx = /^(?:3[47][0-9]{13})$/;
    var discovRegEx = /^(?:6(?:011|5[0-9][0-9])[0-9]{12})$/;
    var isValid = false;
    if (visaRegEx.test(ccNum)) {
      isValid = true;
    } else if(mastercardRegEx.test(ccNum)) {
      isValid = true;
    } else if(amexpRegEx.test(ccNum)) {
      isValid = true;
    } else if(discovRegEx.test(ccNum)) {
      isValid = true;
    }

    if(isValid) {
     return true
    } else {
      return false
    }
  }

  jQuery('#cardDate').mask('00/00');


  $.validator.addMethod(
    "mobileValidation",
    function(value, element) {
      return value.match(/^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g) ? true : false ;
    },
    "Mobile number invalid"
  );

  $.validator.addMethod(
    "cartNum",
    function(value, element) {
      return ValidateCreditCardNumber(value) ;
    },
    "Cart number invalid"
  );

  $.validator.addMethod(
    "cartDate",
    function(value, element) {
      return value.match(/^(0[1-9]|1[0-2])\/?([0-9]{4}|[0-9]{2})$/) ? true : false ;
    },
    "Cart date invalid"
  );


  $(document).on('show_variation', '.single_variation_wrap', function (event, variation) {



    $('.product-price').html('$' + variation.display_price)
    $('.product-price').attr('data-price', variation.display_price)
    $('.price-total').html('$' + variation.display_price)
    $('.add-to-cart').attr('data-variation_id', variation.variation_id)

    console.log(variation)
    calc()
  });


  $(document).on('change', '.form-product-options li input', function (e) {
    e.preventDefault();
    var size = $(this).val();
    var tax = $(this).attr('data-name')
    $('#' + tax).val(size).change();

  })

  function calc() {
    var val = $('[name="quantity"]').val();
    var price =  parseInt($('.product-price').attr('data-price')) ;
    var holders = calc_holders();
    price = price + holders;
    var total = val * price;


    if (total)
      $('.price-total').html('$' + total)

    var title = $('[data-title]').attr('data-title')
    var text = '<p>' + title  + '</p>';
    $('.form-product-options li').each(function(){
      var tax = $(this).find('[data-name]').attr('data-name')
      var title = $(this).find('.title').html();
      var holder = $(this).find('.radio-holder > :checked').parent().find('.holder:checked').val();

      if (tax === 'pa_montage')
        var option = $(this).find(':checked').parent().find('label').html()
      else
        var option = $(this).find('.active label > span').html()

      if (holder > 0 )
        option += ' with holder'

      text += '<p>' + title + ': ' + option + '</p>'
    })

    $('.form-product-selected .options-list').html(text)
    $('.add-to-cart').attr('data-qty', val)
  }

  $(document).on('click', '.product-number ', function (e) {
    calc()
  })
  $(document).on('change', '.product-number input', function (e) {
    calc()
  })
  $(document).on('change', '.holder ', function (e) {
    calc()
  })



  /* add to cart */

  $(document).on('click', '.add-to-cart', function (e) {
    e.preventDefault();

    var product_id = $(this).attr('data-product_id');
    var variation_id = $(this).attr('data-variation_id');
    var qty = $(this).attr('data-qty');
    var that = $(this);
    var holders = calc_holders();


    $('.block-form').block({
      message: null,
      overlayCSS: {
        background: '#fff',
        opacity: 0.4
      }
    })
    $.ajax({
      url: wc_add_to_cart_params.ajax_url,
      data: {
        action: 'add_to_cart',
        product_id: product_id,
        variation_id: variation_id,
        qty: qty,
        holders: holders
      },
      success: function (data) {
        $('.block-form').unblock()
        location.href = data.url
      },
    });
  });


  function calc_holders() {
    var holders = 0;
    $('.holder:checked').each(function(){
      var val = parseInt($(this).val());
      if ($(this).closest('.radio-holder').find('>input').is(':checked'))
        holders += val;
    })

    return holders
  }

  let value
  $('.btn-to-3').click(function(e){
    e.preventDefault();
    let valid = true;
    let fields = ['#billing_first_name', '#billing_phone', '#billing_email'];
    $.each(fields, function(i, val){
        valid = $(val).valid() == false ? false : valid;
        value = $(val).val();
        $('[data-content="'+val+'"]').text(value)
    })

    if (valid) {
      $('[data-step]').hide();
      $('[data-step="3"]').show();
      $('.item--personal-ready').show();
      show_title(3)
    }

  })

  $('.btn-to-2').click(function(e){
    e.preventDefault();
    valid = false;

    $('[data-step]').hide();
    $('[data-step="2"]').show();
    $('.item--personal-ready').hide()
    show_title(2)
  })

  $('.btn-to-4').click(function(e){
    e.preventDefault();
    $.validator.setDefaults({
      ignore: [],
      // any other default options and/or rules
    });

    let valid = true;

    let delivery = $('.shipping input:checked').val();

   // console.log(delivery)

    let fields = 'free_shipping:1' === delivery ? ['#city1', '#street', '#building'] : ['#city_np', '#branch']

    $.each(fields, function(i, val){
      valid = $(val).valid() == false ? false : valid;
      value = $(val).val();

      let deliveryData = []
      $('.delivery-variant.active [name]').each(function(){
        let val = $(this).val();
        deliveryData.push(val)
      })
      $('.delivery-data').text(deliveryData.join(', '))
    })

    if (valid) {

      $('[data-step]').hide();
      $('[data-step="4"]').show();
      $('.item--delivery-ready').show();
      show_title(4)
    }


  })

  $('.btn-to-3-change').click(function(e){
    e.preventDefault();
    $('[data-step]').hide();
    $('[data-step="3"]').show();
    $('.item--delivery-ready').hide();
    show_title(3)
  })

  function show_title(step) {
    let title = $('[data-step="'+step+'"]').attr('data-title')
    $('.step-title').text(title)
  }


    $( ".np" ).autocomplete({
      source: function(request, response) {
        $.ajax({
          url: wc_add_to_cart_params.ajax_url + '?action=get_cities_np',
          type: 'get',
          dataType: "json",
          data: {
            search: request.term
          },
          success: function(data) {
            response(data);
       //     console.log(data)
          }
        });
      },
      select: function (event, ui) {
        $(this).val(ui.item.label); // display the selected text
        $('#city').val(ui.item.label); // save selected id to input

        $.ajax({
          url: wc_add_to_cart_params.ajax_url + '?action=get_warehouses_np',
          type: 'get',
          data: {
            city: ui.item.value
          },
          success: function(data) {
            $('#branch').html(data);
            $.jStyling.updateSelect($("select.select"));
          }
        });


        return false;
      },

      focus: function(event, ui){
        $("#autocomplete").val(ui.item.label);
        $("#selectuser_id").val(ui.item.value);
        return false;
      },

      minLength: 3,
    });



  $('.payment-list [data-target]').click(function(e){
    e.preventDefault();
    var target = $(this).attr('data-target');
    $('.pay-form').hide();
    $(target).show();

    if (target === '.liqpay-form')
      $('.form-buttons').show();
    else
      $('.form-buttons').hide();
  })

  $('.btn-wfp').click(function(e){
    e.preventDefault();
    $('.page-wrapper').block({
      message: null,
      overlayCSS: {
        background: '#fff',
        opacity: 0.4
      }
    });
    var data = $('.form-checkout').serialize();
    $.ajax({
      url: wc_add_to_cart_params.ajax_url,
      data: data,
      type: 'POST',
      success: function (data) {
        $('.page-wrapper').unblock();

        $('.result').html(data.form)

      },
    });
  })


  $('.form-checkout [type="submit"]').click(function(e) {
    e.preventDefault();

    var data = $('.form-checkout').serialize();

    let valid = true;
    let fields = ['#cardNum', '#cardDate', '#cvv'];
    $.each(fields, function(i, val){
      valid = $(val).valid() == false ? false : valid;
    })

    if (valid) {

      $('.page-wrapper').block({
        message: null,
        overlayCSS: {
          background: '#fff',
          opacity: 0.4
        }
      });
      $.ajax({
        url: wc_add_to_cart_params.ajax_url,
        data: data,
        type: 'POST',
        success: function (data) {
          $('.page-wrapper').unblock();

      //    console.log(data)

          if (data.result == 'ok') {
            location.href = data.success_url
          } else {
            $('.result').html(data.status + ': ' + data.err_description)
          }

        },
      });
    }




  })






})
