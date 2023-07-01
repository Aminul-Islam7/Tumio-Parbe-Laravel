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
    $(document).on('keyup change focus blur', '#phone-field', function() {
      let submitButton = $('#send-code-button');
      let number = $(this).val();
      let valid = true;

      if(
          (number.length >= 1 && number[0] !== '0') ||
          (number.length >= 2 && number[1] !== '1') ||
          (number.length >= 3 && !/^[3-9]$/.test(number[2])) ||
          (number.length > 11)
        ) {
        $(this).removeClass('is-valid');
        $(this).addClass('is-invalid');
      }
      else {
        $(this).removeClass('is-valid');
        $(this).removeClass('is-invalid');
      }

      if (number.match(/^01[3-9]\d{8}$/)) {
        $(this).addClass('is-valid');
        $(this).removeClass('is-invalid');
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
    
    
    // Code field validation
    $(document).on('keyup keydown', '#code-field', function() {
      $(this).removeClass('is-invalid');
    });

    let timerDone, timerInterval;
    function startTimer(codeSentTime) {

      let currentTime = new Date();
      codeSentTime = new Date(codeSentTime);
      let timeDifference = currentTime.getTime() - codeSentTime.getTime();
      let difference = Math.floor(timeDifference / 1000);

      let duration = 7 - difference,
      display = $('#timer');

      timerDone = false;
      let timer = duration, minutes, seconds;

      // Clear any previously running interval
      clearInterval(timerInterval);

      timerInterval = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.text(" in " + minutes + ":" + seconds);

        if (--timer < 0) {
          clearInterval(timerInterval); // Stop the interval
          $('#resendCode').prop('disabled', false);
          $('#resendCode').addClass('enabled');
          $("#timer").hide();
          timerDone = true;
        }
      }, 1000);
    }

    // Send code
    var codeSentTime
    $(document).on('click', '#send-code-button', function(e) {
      e.preventDefault();
      let phone = $('#phone-field').val();

      $('#spinner').removeClass('visually-hidden');

      $.ajax({
        url:"{{ route('verify') }}",
        method: 'post',
        data: {phone:phone},
        success:function(response){
          $('.form-card').html(response.html);
          $('#spinner').addClass('visually-hidden');
          
          codeSentTime = response.codeSentTime
          startTimer(codeSentTime);
        },
        error:function(err){
          let error = err.responseJSON;
          // console.log(error);
          $('.phoneError').html('');
          $.each(error.errors, function(index, value) {
            $('.phoneError').append(value);
          });
        }
      });
    });

    
    // Resend Code function
    $(document).on('click', '#resendCode', function(e) {
      e.preventDefault();
      let phone = $('#phone').val();

      $('#spinner').removeClass('visually-hidden');

      if (timerDone) {
        $.ajax({
          url:"{{ route('verify') }}",
          method: 'post',
          data: {phone:phone},
          success:function(response){
            $('.form-card').html(response.html);
            $('#spinner').addClass('visually-hidden');
            
            codeSentTime = response.codeSentTime
            startTimer(codeSentTime);
          }
        });
      }
    });

    
    // Submit code
    $(document).on('click', '#submit-code-button', function(e) {
      e.preventDefault();
      let phone = $('#phone').val();
      let code = $('#code-field').val();

      $('#submit-code-spinner').removeClass('visually-hidden');

      $.ajax({
        url:"{{ route('register') }}",
        method: 'post',
        data: {phone:phone, code:code},

        success:function(response){
          $('#submit-code-spinner').addClass('visually-hidden');
          $('.form-card').html(response);
        },
        error:function(err){
          $('#submit-code-spinner').addClass('visually-hidden');
          $('#code-field').addClass('is-invalid');

          let error = err.responseJSON;
          $('.codeError').html('');
          $.each(error.errors, function(index, value) {
            $('.codeError').append(value);
          });
        }
      });
    });

  });
</script>
