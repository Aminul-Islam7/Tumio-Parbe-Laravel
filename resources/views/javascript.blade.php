<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
</script>

<script>
  $(document).ready(function() {

    // Client-side Validation for Phone number
    $(document).on('keyup keydown change blur', '#phone-field', function() {
      let submitButton = $('#send-code-button');
      let number = $(this).val();
      let valid = true;

      if (number.length === 1 && number !== '0') {
        valid = false;
      } else if (number.length === 2 && number[1] !== '1') {
        valid = false;
      } else if (number.length >= 3 && !/^[3-9]$/.test(number[2])) {
        valid = false;
      } else if (number.length > 11) {
        valid = false;
      }

      $(this).toggleClass('is-valid', number.match(/^01[3-9]\d{8}$/));
      $(this).toggleClass('is-invalid', !valid);

      if (number.length < 11) {
        $(this).removeClass('is-valid');
      }

      // Disables the send code button unless valid
      submitButton.prop('disabled', !number.match(/^01[3-9]\d{8}$/));
    });

    $(document).on('blur', '#phone-field', function() {
      let number = $(this).val();
      if (number.length < 11) {
        $(this).addClass('is-invalid');
      }
    });

    // Send code
    $(document).on('click', '#send-code-button', function(e) {
      e.preventDefault();
      let phone = $('#phone-field').val();

      $.ajax({
        url:"{{ route('verify') }}",
        method: 'post',
        data: {phone:phone},
        success:function(response){
          $('.form-card').html(response);
        },
        error:function(err){
          let error = err.responseJSON;
          $('.errMsgContainer').html('');
          $.each(error.errors, function(index, value) {
            $('.errMsgContainer').append(value);
          });
        }
      });
    });
  });
</script>
