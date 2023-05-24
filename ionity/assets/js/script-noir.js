jQuery(document).ready(function($){

  $(document).on('show_variation', '.single_variation_wrap', function (event, variation) {



    $('.product-price').html('$' + variation.display_price)
    $('.product-price').attr('data-price', variation.display_price)
    $('.price-total').html('$' + variation.display_price)
    $('.add-to-cart').attr('data-variation_id', variation.variation_id)

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
    var total = val * price

    if (total)
      $('.price-total').html('$' + total)

    var title = $('[data-title]').attr('data-title')
    var text = '<p>' + title  + '</p>';
    $('.form-product-options li').each(function(){
      var tax = $(this).find('[data-name]').attr('data-name')
      var title = $(this).find('.title').html();

      if (tax === 'pa_montage')
        var option = $(this).find(':checked').parent().find('label').html()
      else
        var option = $(this).find('.active label > span').html()

      text += '<p>' + title + ': ' + option + '</p>'
    })

    $('.form-product-selected .options-list').html(text)
    $('.add-to-cart').attr('data-qty', val)
  }

  $(document).on('click', '.product-number ', function (e) {
    calc()
  })


  /* add to cart */

  $(document).on('click', '.add-to-cart', function (e) {
    e.preventDefault();

    var product_id = $(this).attr('data-product_id');
    var variation_id = $(this).attr('data-variation_id');
    var qty = $(this).attr('data-qty');

    var that = $(this)

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
        qty: qty
      },
      success: function (data) {

        $('.block-form').unblock()

        location.href = data.url

      },
    });
  });


  $('.btn-to-3').click(function(e){
    e.preventDefault();

    let valid = true;
    let fields = ['#billing_first_name', '#billing_phone', '#billing_email'];
    $.each(fields, function(i, val){
        valid = $(val).valid()
    })

    console.log(valid)

    if (valid) {
      $('[data-step="2"]').hide();
      $('[data-step="3"]').show()
    }

  })




    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#city_np" ).autocomplete({
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
          }
        });
      },
      select: function (event, ui) {
        $('#city_np').val(ui.item.label); // display the selected text
        $('#shipping_city').val(ui.item.label); // save selected id to input

        console.log(ui.item)

        $.ajax({
          url: wc_add_to_cart_params.ajax_url + '?action=get_warehouses_np',
          type: 'get',
          data: {
            city: ui.item.value
          },
          success: function(data) {
            $('#branch').html(data);
            $.jStyling.createSelect($("select.select"));
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





})
