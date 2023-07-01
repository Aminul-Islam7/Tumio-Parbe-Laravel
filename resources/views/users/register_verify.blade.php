<form method="POST" action="">
  @csrf

  <input type="hidden" name="phone" id="phone" value="{{ $phone }}">
  <div class="mb-2">
    <label for="code">Enter code</label>
    <div class="form-text bangla mb-2">{{ $phone }} নম্বরে পাঠানো ৫ সংখ্যার কোডটি লিখুন</div>
    <input type="text" class="form-control" name="code" placeholder="▢▢▢▢▢" id="code-field" required>
    <div class="invalid-feedback codeError bangla"></div>
  </div>

  <button type="submit" id="resendCode" disabled>
    Resend Code <span id="timer"></span>
    <div class="spinner-border spinner-border-sm ms-1 visually-hidden" id="spinner"></div>
  </button>

  <button type="submit" class="btn btn-primary col-12 mt-2" id="submit-code-button">
    Submit
    <div class="spinner-border spinner-border-sm ms-1 visually-hidden" id="submit-code-spinner"></div>
  </button>

</form>


<script>

  $(document).ready(function() {

    

    
  });

</script>