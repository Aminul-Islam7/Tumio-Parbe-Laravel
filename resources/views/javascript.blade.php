<script>
  $(document).ready(function() {

    // Client-side validation for Phone number (also disables the send code button unless valid)
    $(document).on('keyup keydown change blur', '#phone-field', function() {
      var submitButton = $('#send-code-button');
      var number = $(this).val();
      var valid = true;

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

      submitButton.prop('disabled', !number.match(/^01[3-9]\d{8}$/));
    });
  });
</script>
